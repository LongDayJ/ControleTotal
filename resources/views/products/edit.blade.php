<x-appBarAdmin title="Editar Produto">
    <h1>Editar Produto</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ $produto->descricao }}</textarea>
        </div>
        <div class="form-group">
            <label for="quantidadeMinima">Quantidade Mínima</label>
            <input type="number" class="form-control" id="quantidadeMinima" name="quantidadeMinima" value="{{ $produto->estoque ? $produto->estoque->quantidadeMinima : 0  }}" required>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $produto->estoque ? $produto->estoque->quantidade : 0 }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Produto</button>
    </form>
</x-appBarAdmin>