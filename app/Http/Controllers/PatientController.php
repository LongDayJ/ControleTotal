<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\User;
use App\Models\Agendamento;
use App\Models\Procedimento;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $userInfo = [
            'name' => $user->name,
            'email' => $user->email,
            'cpf' => $user->cpf,
            'descricao' => $user->descricao,
        ];

        $address = Endereco::where('user_id', $id)->first();
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

        $agendamentos = Agendamento::where('user_id', $id)->get();
        $userInfo['dentistas'] = [];

        $userInfo['agendamentos'] = [];
        if ($agendamentos) {
            $userInfo['agendamentos'] = $agendamentos->map(function ($agendamento) {
                $dentista = User::find($agendamento->dentista_id);
                $procedimento = Procedimento::find($agendamento->procedimento_id);
                return [
                    'procedimento' => $procedimento->nome,
                    'dentista' => $dentista->name,
                    'data' => $agendamento->data,
                    'hora' => $agendamento->hora,
                    'status' => $agendamento->status,
                    'observacao' => $agendamento->observacao,
                ];
            })->toArray();
        }
        if ($user) {
            return view('patient.show')->with('patient', $userInfo);
        } else {
            abort(404, 'Paciente não encontrado');
        }
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
