<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class MrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */public function index(Request $request, $paciente_id)
{
    // Buscar o paciente pelo ID
    $paciente = User::find($paciente_id);
    
    // Verificar se o paciente existe
    if (!$paciente) {
        return redirect()->back()->with('error', 'Paciente não encontrado.');
    }

    // Buscar o prontuário do paciente
    // $prontuarios = Prontuario::where('paciente_id', $paciente_id)->get();

    // Montar as informações do paciente
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
    return view('mrecord.index', compact( 'userInfo'));
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
