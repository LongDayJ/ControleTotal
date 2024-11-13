<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('registerPatient.index');
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
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        $data['confirmPassword'] = Hash::make($data['confirmPassword']);
        $data['perfil_id'] = 3;
        $user = User::create($data);
        return to_route('registros.index')
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
