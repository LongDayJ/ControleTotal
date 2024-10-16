<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function create()
    {
        return view('registerCollaborator.create');
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
        $data['perfil_id'] = 2;
        $user = User::create($data);
        Auth::login($user);
        return to_route('registerCollaborator.create');
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
