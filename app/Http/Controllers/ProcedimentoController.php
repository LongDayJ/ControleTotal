<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedimento;


class ProcedimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $existingProcedimento = Procedimento::where('nome', $request->input('nome'))->first();

        if ($existingProcedimento) {
            return redirect()->back()->with('procedimento.erro', 'Esse procedimento já está cadastrado.');
        }
        $procedimento = Procedimento::create($request->except('_token'));
        return redirect()->route('registro.index');
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
        $procedimento = Procedimento::findOrFail($id);
        $procedimento->update($request->all());
        return redirect()->route('registro.index')->with('procedimentoSuccess', 'Procedimento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $procedimento = Procedimento::findOrFail($id);
        $procedimento->delete();
        return redirect()->route('registro.index')->with('procedimentoSuccess', 'Procedimento deletado com sucesso!');
    }
}
