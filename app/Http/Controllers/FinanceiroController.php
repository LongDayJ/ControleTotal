<?php

namespace App\Http\Controllers;

use App\Models\Financeiro;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    public function index()
    {
        $financeiros = Financeiro::all();
        return view('financeiro.index', compact('financeiros'));
    }

    public function create()
    {
        return view('financeiro.create');
    }

    public function store(Request $request)
    {
        $financeiroData = $request->except("_token");
        if (empty($financeiroData['descricao'])) {
            $financeiroData['descricao'] = 'default description';
        }
        Financeiro::create($financeiroData);
        return redirect()->route('financeiro.index');
    }

    public function show($id)
    {
        $financeiro = Financeiro::findOrFail($id);
        return view('financeiro.show', compact('financeiro'));
    }

    public function edit($id)
    {
        $financeiro = Financeiro::findOrFail($id);
        return view('financeiro.edit', compact('financeiro'));
    }

    public function update(Request $request, $id)
    {
        $financeiro = Financeiro::findOrFail($id);
        $financeiro->update($request->all());
        return redirect()->route('financeiro.index');
    }

    public function destroy($id)
    {
        $financeiro = Financeiro::findOrFail($id);
        $financeiro->delete();
        return redirect()->route('financeiro.index');
    }
}
