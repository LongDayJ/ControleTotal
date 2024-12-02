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
        // Obter o número de consultas do mês
        $consultasDoMes = Agendamento::whereMonth('data', now()->month)->count();
        
        $consultasCanceladasMes = Agendamento::whereMonth('data', now()->month)
        ->where('status', 'CANCELADO') // Ajuste o valor do status conforme necessário
        ->count();

        $consultasConfirmadasMes = Agendamento::whereMonth('data', now()->month)
        ->where('status', 'CONFIRMADO') // Ajuste o valor do status conforme necessário
        ->count();
        

        $produtosQuantidadeMinima = Estoque::whereColumn('quantidadeMinima', '>=', 'quantidade')->count();

        $pacientesNovos = User::where('perfil_id', 3)
            ->whereMonth('created_at', now()->month)
            ->count();

        // Passar as variáveis para a view
        return view('dashboard.index', compact(
            'consultasDoDia',
            'consultasDoMes',
            'consultasCanceladasMes',
            'consultasConfirmadasMes',
            'produtosQuantidadeMinima',
            'pacientesNovos'
    ));
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
