<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Procedimento;
use App\Models\Dentista;

class RegistroController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		$procedimentoErro = $request->session()->get('procedimento.erro');
		$colaboradores = User::whereIn('perfil_id', [2, 4])->get();
		$procedimentos = Procedimento::all();
		foreach ($procedimentos as $procedimento) {
			if ($procedimento->id_procedimento_pai) {
				$procedimento->nome_procedimento_pai = Procedimento::find($procedimento->id_procedimento_pai)->nome;
			} else {
				$procedimento->nome_procedimento_pai = null;
			}
		}
		$pacientes = User::where('perfil_id', 3)->get();
		$telefones = User::where('perfil_id', 3)
			->join('enderecos', 'users.id', '=', 'enderecos.user_id')
			->select('users.id as user_id', 'enderecos.telefone')
			->get();
		foreach ($pacientes as $paciente) {
			$paciente->telefone = $telefones->firstWhere('user_id', $paciente->id)->telefone ?? null;
		}
		$dentistas = Dentista::all();
		return view('registro.index', compact('colaboradores', 'procedimentos', 'pacientes', 'dentistas'))
		->with('procedimentoErro', $procedimentoErro);
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
