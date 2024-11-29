<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Dentista;
use App\Models\Procedimento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index()
    {
        $pacientes = User::where('perfil_id', 3)->get();
        $medicos = User::where('perfil_id', 4)->get();
        $procedimentos = Procedimento::all();
        $events = Agendamento::all();
        return view('schedule.index', compact('pacientes', 'medicos', 'events', 'procedimentos'));
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
        if ($request->input('date') < now()->setTimezone('America/Sao_Paulo')->toDateString()) {
            return response()->json(['success' => false, 'message' => 'Não é possível agendar para uma data que já passou.'], 400);
        }
        $agendamento = new Agendamento();
        $agendamento->data = $request->input('date');
        $agendamento->hora = $request->input('start');
        $agendamento->status = "AGENDADO";
        $agendamento->observacao = $request->input('description');
        
        $pacienteNome = $request->input('paciente');
        $paciente = User::where('name', $pacienteNome)->firstOrFail();
        $agendamento->user_id = $paciente->id;
        $dentistaNome = $request->input('dentista');
        $dentista = User::where('name', $dentistaNome)->firstOrFail();
        $agendamento->dentista_id = $dentista->id;
        $agendamento->color = $request->input('color');

        $agendamento->save();
    
        return response()->json($agendamento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Agendamento::find($id);
        return view('schedule.index', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $pacientes = User::where('perfil_id', 3)->get();
        $medicos = User::where('perfil_id', 4)->get();
        $procedimentos = Procedimento::all();
        list($agendamento->hora, $agendamento->minuto) = explode(':', substr($agendamento->hora, 0, 5));
        return view('schedule.edit', compact('agendamento', 'pacientes', 'medicos', 'procedimentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hora = $request->input('hora');
        $minuto = $request->input('minuto');
        $segundo = $request->input('segundo');
        $request->merge(['hora' => sprintf('%02d:%02d:%02d', $hora, $minuto, $segundo)]);
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->update($request->except('_token', '_method', 'minuto'));
        $agendamento->updated_at = now();
        $agendamento->save();
        return redirect()->route('agendamento.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Agendamento::findOrFail($id);
        if ($event) {
            if ($event->data < now()->toDateString()) {
            return response()->json(['success' => false, 'message' => 'Não é possível excluir um evento que já passou.']);
            }
            $event->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Evento não encontrado.']);
        }
    }
}
