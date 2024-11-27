<x-appBarAdmin title="Financeiro">
<h1>Editar Financeiro</h1>
    <form action="{{ route('financeiro.update', $financeiro->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo">
            <option value="ENTRADA" {{ $financeiro->tipo == 'ENTRADA' ? 'selected' : '' }}>ENTRADA</option>
            <option value="SAIDA" {{ $financeiro->tipo == 'SAIDA' ? 'selected' : '' }}>SAIDA</option>
        </select>
        <label for="valor">Valor:</label>
        <input type="number" name="valor" id="valor" value="{{ $financeiro->valor }}">
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao">{{ $financeiro->descricao }}</textarea>
        <button type="submit">Salvar</button>
    </form>
</x-appBarAdmin>