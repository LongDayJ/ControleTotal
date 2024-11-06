<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Dentista;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index()
    {
        $pacientes = User::where('perfil_id', 3)->get();
        $dentistas = Dentista::all();
        $events = Agendamento::all();
        return view('schedule.index', compact('pacientes', 'dentistas', 'events'));
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
        // Exibir o conteúdo da requisição e interromper a execução
    
        $agendamento = new Agendamento();
        $agendamento->data = $request->input('date');
        $agendamento->hora = $request->input('start');
        $agendamento->horaFinal = $request->input('end');
        $agendamento->status = "AGENDADO";
        $agendamento->observacao = $request->input('description');
        
        $pacienteNome = $request->input('paciente');
        $paciente = User::where('name', $pacienteNome)->firstOrFail();
        $agendamento->user_id = $paciente->id;
        
        $dentistaNome = $request->input('dentista');
        $dentista = Dentista::where('nome', $dentistaNome)->firstOrFail();
        $agendamento->dentista_id = $dentista->id;
    
        // Salvar o agendamento no banco de dados
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->update($request->all());
        return response()->json($agendamento, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Agendamento::find($id);
        if ($event) {
            $event->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Evento não encontrado.']);
        }
    }
}
