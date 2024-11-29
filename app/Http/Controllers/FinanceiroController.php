<?php

namespace App\Http\Controllers;

use App\Models\Financeiro;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    public function index(Request $request)
    {
        $query = Financeiro::query();
    
        if ($request->filled('tipo')) {
            $query->where('tipo', 'like', '%' . $request->tipo . '%');
        }
    
        if ($request->filled('descricao')) {
            $query->where('descricao', 'like', '%' . $request->descricao . '%');
        }
    
        if ($request->filled('valor')) {
            $query->where('valor', $request->valor);
        }
    
        if ($request->filled('data_vencimento')) {
            $query->whereDate('data_vencimento', $request->data_vencimento);
        }
    
        if ($request->filled('data_pagamento')) {
            $query->whereDate('data_pagamento', $request->data_pagamento);
        }
    
        if ($request->filled('status')) {
            $query->where('status', 'like', '%' . $request->status . '%');
        }
    
        $financeiros = $query->get();
    
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
        $financeiro->update(['ativo' => false]);
        return redirect()->route('financeiro.index');
    }
}
