<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\User;
use App\Models\Endereco;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index(Request $request, $paciente_id)
    {
        $paciente = User::find($paciente_id);
        if (!$paciente) {
            return redirect()->back()->with('error', 'Paciente não encontrado.');
        }
        $consultas = Consulta::where('user_id', $paciente_id)->get();

        $userInfo = [
            'id' => $paciente->id,
            'name' => $paciente->name,
            'email' => $paciente->email,
            'cpf' => $paciente->cpf,
            'descricao' => $paciente->descricao,
        ];
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
        return view('consultas.index', compact('consultas', 'userInfo'));
    }

    public function show($id)
    {
        $consulta = Consulta::find($id);
        if (!$consulta) {
            return response()->json(['error' => 'Consulta não encontrada.'], 404);
        }
        return response()->json($consulta);
    }

    public function create()
    {
        $users = User::all();
        return view('consultas.create', compact('users'));
    }

    public function store(Request $request)
    {
        Consulta::create($request->except(['_token', '_method', 'created_at', 'updated_at']));

        return redirect()->back()->with('success', 'Consulta criada com sucesso.');
    }

    public function edit(Consulta $consulta)
    {
        $users = User::all();
        return view('consultas.edit', compact('consulta', 'users'));
    }

    public function update(Request $request, Consulta $consulta)
    {
        $request->validate([
            'queixa' => 'required',
            'medicacao_pre_consulta' => 'required',
            'alergia' => 'required',
            'cirurgia' => 'required',
            'sangramento' => 'required',
            'cicatrizacao' => 'required',
            'falta_ar' => 'required',
            'gestante' => 'required',
            'semanas' => 'required',
            'observacoes' => 'required',
            'agendamento_id' => 'required|exists:agendamentos,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $consulta->update($request->all());

        return redirect()->route('consultas.index')->with('success', 'Consulta atualizada com sucesso.');
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->delete();

        return redirect()->route('consultas.index')->with('success', 'Consulta deletada com sucesso.');
    }
}
