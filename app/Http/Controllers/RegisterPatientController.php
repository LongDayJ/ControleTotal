<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterPatientController extends Controller
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
        $cadastroErro = $request->session()->get('cadastrado.erro');
        return view('registerPatient.create')
        ->with('cadastroSuccesso', $cadastroSuccesso)
        ->with('cadastroErro', $cadastroErro);
    }
    function validarCPF($cpf) {
        // Remove caracteres especiais
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se todos os dígitos são iguais
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Calcula os dígitos verificadores para verificar se o CPF é válido
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
    
        return true;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataUser = $request->except('_token', 'cep', 'complemento', 'logradouro', 'bairro', 'numeroCasa', 'cidade', 'uf', 'phone');
        if (!$this->validarCPF($dataUser['cpf'])) {
            return to_route('registerPatient.create')
                ->with('cadastrado.erro', 'O CPF informado é inválido.');
        }
        if (User::where('email', $dataUser['email'])->exists()) {
            return to_route('registerPatient.create')
            ->with('cadastrado.erro', 'O e-mail já está cadastrado.');
        }
        $dataUser['password'] = substr($dataUser['cpf'], 0, 3) . substr($dataUser['cpf'], 4, 3);
        $dataUser['password'] = Hash::make($dataUser['password']);
        $dataUser['perfil_id'] = 3;
        $user = User::create($dataUser);
        $dataAddress = $request->only('cep', 'complemento', 'logradouro', 'bairro', 'numeroCasa', 'cidade', 'uf');
        $dataAddress['user_id'] = $user->id;
        $dataAddress['telefone'] = $request->phone;
        $address = Endereco::create($dataAddress);
        return to_route('registerPatient.create')
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
