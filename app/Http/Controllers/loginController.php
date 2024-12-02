<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tentativa de autenticação
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors('Usuário e/ou senha incorretos');
        }

        // pegar o usuário do banco de dados
        $user = User::where('email', $request['email'])->first();

        // redirecionar para a página correta
        if ($user['perfil_id'] == 1 || $user['perfil_id'] == 2) {
            return to_route('dashboard.index');
        } else if ($user['perfil_id'] == 3) {
            return to_route('patient.show', ['id' => $user['id']]);
        } else if ($user['perfil_id'] == 4) {
            return to_route('agendamento.index');
        } else {
            return to_route('login.index');
        }
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
