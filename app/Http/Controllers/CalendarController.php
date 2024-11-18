<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('schedule.index');
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
    public function criar(Request $request)
    {
        /*$item = new Agendamento();
        $item->eventTitle = $request->eventTitle;
        $item->eventDate = $request->eventDate;
        $item->eventStartTime = $request->eventStartTime;
        $item->eventEndTime = $request->eventEndTime;
        $item->save();*/
    }
    public function getEvents()
    {
        $schedules = Agendamento::all();
        return response()->json($schedules);
    }

    public function deleteEvent($id)
    {
        $schedule = Agendamento::findOrFail($id);
        $schedule->delete();

        return response()->json(['message' => 'Evento deletado com sucesso']);
    }
        public function atualizar(Request $request, $id)
    {
        $schedule = Agendamento::findOrFail($id);

        $schedule->update([
            'start' => Carbon::parse($request->input('start_date'))->setTimezone('UTC'),
            'end' => Carbon::parse($request->input('end_date'))->setTimezone('UTC'),
        ]);

        return response()->json(['message' => 'Event moved successfully']);
    }
    public function resize(Request $request, $id)
    {
        $schedule = Agendamento::findOrFail($id);

        $newEndDate = Carbon::parse($request->input('end_date'))->setTimezone('UTC');
        $schedule->update(['end' => $newEndDate]);

        return response()->json(['message' => 'Event resized successfully.']);
    }

    public function search(Request $request)
    {
        $searchKeywords = $request->input('title');

        $matchingEvents = Agendamento::where('title', 'like', '%' . $searchKeywords . '%')->get();

        return response()->json($matchingEvents);
    }




}
