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

        // Obter os agendamentos do mês e separar pelos dias da semana
        $agendamentosPorDiaDaSemana = Agendamento::whereBetween('data', [now()->startOfWeek(), now()->endOfWeek()])
            ->with('user:id,name') // Carregar apenas o nome do usuário
            ->get(['data', 'hora', 'user_id']) // Obter apenas a data, hora e user_id
            ->groupBy(function($agendamento) {
            return \Carbon\Carbon::parse($agendamento->data)->format('l'); // Agrupar pelo nome do dia da semana
            })
            ->map(function($agendamentos) {
            return $agendamentos->map(function($agendamento) {
                $agendamento->user_name = $agendamento->user->name; // Adicionar o nome do usuário
                return $agendamento;
            });
            });
  

        // Obter o número de produtos com quantidade mínima
        $produtosQuantidadeMinima = Estoque::whereColumn('quantidadeMinima', '>=', 'quantidade')->count();

        $procedimentosCadastrados = Procedimento::all()->count();

        $pacientesCadastrados = User::where('perfil_id',  3)->count();

        $pacientesNovos = User::where('perfil_id', 3)
            ->whereMonth('created_at', now()->month)
            ->count();
        function calcularDiasUteis($mes, $ano)
        {
            $inicioDoMes = now()->setYear($ano)->setMonth($mes)->startOfMonth();
            $fimDoMes = now()->setYear($ano)->setMonth($mes)->endOfMonth();

            $diasUteis = 0;

            while ($inicioDoMes->lte($fimDoMes)) {
                // Verifica se o dia não é sábado (6) ou domingo (7)
                if (!$inicioDoMes->isWeekend()) {
                    $diasUteis++;
                }
                $inicioDoMes->addDay();
            }

            return $diasUteis;
        }

        $totalHorariosPorDia = 16; // Exemplo: 8 horas * 2 consultas por hora

        $totalDiasUteis = calcularDiasUteis(now()->month, now()->year);

        // Cálculo do total de horários disponíveis no mês
        $totalHorariosMes = $totalDiasUteis * $totalHorariosPorDia;

  // Consultas preenchidas no mês
        $consultasPreenchidasMes = Agendamento::whereMonth('data', now()->month)->count();

        // Taxa de ocupação do mês
        $taxaOcupacaoMes = $totalHorariosMes > 0
            ? ($consultasPreenchidasMes / $totalHorariosMes) * 100
            : 0;

        // Consultas preenchidas no dia
        $consultasPreenchidasDia = Agendamento::whereDate('data', today())->count();

        // Taxa de ocupação do dia
        $taxaOcupacaoDia = $totalHorariosPorDia > 0
            ? ($consultasPreenchidasDia / $totalHorariosPorDia) * 100
            : 0;
        // Passar as variáveis para a view
        return view('dashboard.index', 
        compact('consultasDoDia',
        'consultasDoMes',
        'agendamentosPorDiaDaSemana',
        'produtosQuantidadeMinima',
        'procedimentosCadastrados',
        'pacientesCadastrados',
        'pacientesNovos',
        'consultasDoMes',
        'agendamentosPorDiaDaSemana',
        'taxaOcupacaoDia',
        'taxaOcupacaoMes',
        'consultasPreenchidasDia',
        'totalHorariosPorDia',
        'consultasPreenchidasMes',
        'totalHorariosMes'
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
