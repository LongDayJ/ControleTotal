<x-appBarAdmin title="Financeiro">
<h1>Adicionar Financeiro</h1>
    <form action="{{ route('financeiro.store') }}" method="POST">
        @csrf
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo">
            <option value="ENTRADA">ENTRADA</option>
            <option value="SAIDA">SAIDA</option>
        </select>
        <label for="valor">Valor:</label>
        <input type="number" name="valor" id="valor" required>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required></textarea>
        <button type="submit">Salvar</button>
    </form>
</x-appBarAdmin>