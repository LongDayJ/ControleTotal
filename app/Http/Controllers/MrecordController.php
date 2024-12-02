<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\User;
use App\Models\Prontuario;
use App\Models\Consulta;
use Illuminate\Http\Request;

class MrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */ public function index(Request $request, $paciente_id)
    {
        // Buscar o paciente pelo ID
        $paciente = User::find($paciente_id);

        // Verificar se o paciente existe
        if (!$paciente) {
            return redirect()->back()->with('error', 'Paciente não encontrado.');
        }

        $userInfo = [
            'name' => $paciente->name,
            'email' => $paciente->email,
            'cpf' => $paciente->cpf,
            'descricao' => $paciente->descricao,
        ];

        // Buscar o endereço do paciente
        $address = Endereco::where('user_id', $paciente_id)->first();
        if ($address) {
            $userInfo['uf'] = $address->uf;
            $userInfo['cidade'] = $address->cidade;
            $userInfo['bairro'] = $address->bairro;
            $userInfo['logradouro'] = $address->logradouro;
            $userInfo['telefone'] = $address->telefone;
            $userInfo['cep'] = $address->cep;
            $userInfo['numero'] = $address->numeroCasa;
            $userInfo['complemento'] = $address->complemento;
        }

        $prontuarios = Prontuario::where('user_id', $paciente_id)->get();
        $userInfo['prontuarios'] = [];
        dd($userInfo);

        if ($prontuarios) {
            $userInfo['prontuarios'] = $prontuarios->map(function ($prontuario) {
                return [
                    'consulta_id' => $prontuario->consulta_id,
                    'medicamento' => $prontuario->medicamento,
                    'metodo' => $prontuario->metodo,
                    'cuidado' => $prontuario->cuidado,
                    'created_at' => $prontuario->created_at,
                    'updated_at' => $prontuario->updated_at,
                ];
            })->toArray();
        }

        return view('consultas.index', compact('userInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $agendamento_id = $request->input('agendamento_id');
        $consulta_id = Consulta::where('agendamento_id', $agendamento_id)->value('id');
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $user_name = $user ? $user->name : 'Paciente não encontrado';

        return view('mrecord.create', compact('consulta_id', 'user_id', 'user_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prontuario = new Prontuario();
        $prontuario->user_id = $request->input('user_id');
        $prontuario->consulta_id = $request->input('consulta_id');
        $prontuario->medicamento = $request->input('medicamento');
        $prontuario->metodo = $request->input('metodo');
        $prontuario->cuidado = $request->input('cuidado');
        $prontuario->save();

        return redirect()->route('agendamento.index', ['paciente_id' => $prontuario->user_id])
            ->with('success', 'Prontuário criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $userInfo = [
            'name' => $user->name,
            'email' => $user->email,
            'cpf' => $user->cpf,
        ];
        $address = Endereco::where('user_id', $id)->first();
        if ($address) {
            $userInfo['uf'] = $address->uf;
            $userInfo['cidade'] = $address->cidade;
            $userInfo['logradouro'] = $address->logradouro;
            $userInfo['telefone'] = $address->telefone;
            $userInfo['cep'] = $address->cep;
            $userInfo['numeroCasa'] = $address->numeroCasa;
            $userInfo['complemento'] = $address->complemento;
        }
        $prontuarios = Prontuario::where('user_id', $id)->get();
        $userInfo['prontuarios'] = [];

        if ($prontuarios) {
            $userInfo['prontuarios'] = $prontuarios->map(function ($prontuario) {
                return [
                    'consulta_id' => $prontuario->consulta_id,
                    'medicamento' => $prontuario->medicamento,
                    'metodo' => $prontuario->metodo,
                    'cuidado' => $prontuario->cuidado,
                    'created_at' => $prontuario->created_at,
                    'updated_at' => $prontuario->updated_at,
                ];
            })->toArray();
        }
        return redirect()->route('prontuario.show', ['userInfo' => $userInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
