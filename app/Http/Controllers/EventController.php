<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getEvents()
    {
        $events = Agendamento::all();
        foreach ($events as $event) {
            $event->title = $event->user->name;
            $event->start = $event->data . 'T' . $event->hora;
            $event->end = $event->data . 'T' . $event->horaFinal;
            unset($event->user);
        }
        return response()->json($events);
    }
}
