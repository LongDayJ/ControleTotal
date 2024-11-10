<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Estoque;
use App\Models\Procedimento;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obter o número de consultas do dia
        $consultasDoDia = Agendamento::whereDate('data', today())->count();

        // Obter o número de produtos com quantidade mínima
        $produtosQuantidadeMinima = Estoque::whereColumn('quantidade', 'quantidadeMinima')->count();

        $procedimentosCadastrados = Procedimento::all()->count();

        $pacientesCadastrados = User::where('perfil_id', 3)->count();

        // Passar as variáveis para a view
        return view('dashboard.index', compact('consultasDoDia', 'produtosQuantidadeMinima', 'procedimentosCadastrados', 'pacientesCadastrados'));
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
