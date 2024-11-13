<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\User;
use App\Models\Dentista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterCollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $cadastroSuccesso = $request->session()->get('cadastrado.sucesso');
        return view('registerCollaborator.create')->with('cadastroSuccesso', $cadastroSuccesso);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataUser = $request->except('_token', 'cep', 'complemento', 'logradouro', 'bairro', 'numeroCasa', 'cidade', 'uf', 'phone');

        $dataUser['password'] = Hash::make($dataUser['password']);
        $dataUser['confirmPassword'] = Hash::make($dataUser['confirmPassword']);
        $dataUser['perfil_id'] = 2;
        $user = User::create($dataUser);
        $dataAddress = $request->only('cep', 'complemento', 'logradouro', 'bairro', 'numeroCasa', 'cidade', 'uf');
        $dataAddress['user_id'] = $user->id;
        $dataAddress['telefone'] = $request->phone;
        $address = Endereco::create($dataAddress);
        if ($request->has('cro')) {
            $dentistaData = $request->only('cro');
            $dentistaData['cro'] = "CRO{$dentistaData['cro']}";
            $dentistaData['nome'] = $user->name;
            $dentistaData['descricao'] = $request->descricao;
            $dentistaData['status'] = 'ativo';
            $dentista = Dentista::create($dentistaData);
        }
        return to_route('registerCollaborator.create')
        ->with('cadastrado.sucesso', "Cadastro de {$user->name} realizado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
