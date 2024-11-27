<x-appbarAdmin title="Financeiro">
    <h1>Financeiro</h1>
    <a href="{{ route('financeiro.create') }}">Adicionar</a>
    <ul>
        @foreach ($financeiros as $financeiro)
        <li>{{ $financeiro->descricao }} - {{ $financeiro->valor }} - <a href="{{ route('financeiro.edit', $financeiro->id) }}">Editar</a> - <form action="{{ route('financeiro.destroy', $financeiro->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </li>
        @endforeach
    </ul>
</x-appbarAdmin>