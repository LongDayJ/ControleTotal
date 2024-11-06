<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Estoque;


class ProductController extends Controller
{
    public function incrementar($id)
    {
        $product = Produto::find($id);
        if ($product && $product->estoque) {
            $product->estoque->quantidade += 1;
            $product->estoque->save();
        }
        return redirect()->back();
    }

    public function decrementar($id)
    {
        $product = Produto::find($id);
        if ($product && $product->estoque && $product->estoque->quantidade > 0) {
            $product->estoque->quantidade -= 1;
            $product->estoque->save();
        }
        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Produto::query()
            ->when($search, function ($query, $search) {
                return $query->where('nome', 'like', "%{$search}%");
            })
            ->get();

        $estoque = Estoque::all(); // Buscar todos os dados da tabela estoque

        // Compactar os dados do estoque dentro de cada produto
        $products->each(function ($product) use ($estoque) {
            $product->estoque = $estoque->where('produto_id', $product->id)->first();
        });

        // Ordenar os produtos por ordem alfabética
        $products = $products->sortBy('nome');
        
        // Ordenar os produtos com quantidade igual ou menor à quantidade mínima para o topo
        $products = $products->sortByDesc(function ($product) {
            return $product->estoque && $product->estoque->quantidade <= $product->estoque->quantidadeMinima;
        });
        return view('products.index', compact('products')); // Passar os dados compactados para a view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidadeMinima' => 'required|integer',
            'quantidade' => 'required|integer',
        ]);

        // Criar um novo produto
        $produto = Produto::create([
            'nome' => $validatedData['nome'],
            'descricao' => $validatedData['descricao'] ?? '',
        ]);

        // Adicionar os dados de estoque
        $estoque = Estoque::create([
            'produto_id' => $produto->id,
            'quantidadeMinima' => $validatedData['quantidadeMinima'],
            'quantidade' => $validatedData['quantidade'],
        ]);

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
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
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $estoque = Estoque::where('produto_id', $produto->id)->first();
        return view('products.edit', compact('produto', 'estoque'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidadeMinima' => 'required|integer',
            'quantidade' => 'required|integer',
        ]);

        // Encontrar o produto e atualizar seus dados
        $produto = Produto::findOrFail($id);
        $produto->update([
            'nome' => $validatedData['nome'],
            'descricao' => $validatedData['descricao'] ?? '',
        ]);

        // Encontrar ou criar os dados de estoque
        $estoque = Estoque::firstOrCreate(
            ['produto_id' => $produto->id],
            ['quantidadeMinima' => $validatedData['quantidadeMinima'], 'quantidade' => $validatedData['quantidade']]
        );

        // Atualizar os dados de estoque
        $estoque->update([
            'quantidadeMinima' => $validatedData['quantidadeMinima'],
            'quantidade' => $validatedData['quantidade'],
        ]);

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
