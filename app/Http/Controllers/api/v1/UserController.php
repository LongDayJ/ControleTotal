<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Lista todos os usuários
    public function index()
    {
        $users = UserResource::collection(User::all());  
        return response()->json($users, 200);
        /* lembrar, aprendi que por aqui eu poderia fazer a requisição dos usuarios, mas consigo fazer de uma forma, mais segura e organizada
            atraves do resource*/
    }

    // Exibe um único usuário pelo ID
    public function show($id)
    {
    $user = User::find($id);

    if ($user) {
        return new UserResource($user); // Usando o resource para formatar a resposta
    } else {
        return response()->json(['message' => 'User not found'], 404);
    }
    }

    // Armazena um novo usuário
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return new UserResource($user);
    }

    // Atualiza um usuário existente
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $validatedData = $request->validate([
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
                'password' => 'sometimes|string|min:6',
            ]);

            $user->update($validatedData);
            return response()->json($user, 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    // Remove um usuário pelo ID
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
