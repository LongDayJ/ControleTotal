<x-appBarAdmin title="Financeiro">
    <h1 class="mb-4">Editar Financeiro</h1>
    <form action="{{ route('financeiro.update', $financeiro->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo:</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <option value="ENTRADA" {{ $financeiro->tipo == 'ENTRADA' ? 'selected' : '' }}>ENTRADA</option>
                <option value="SAIDA" {{ $financeiro->tipo == 'SAIDA' ? 'selected' : '' }}>SAIDA</option>
            </select>
            <div class="invalid-feedback">
                Por favor, selecione um tipo.
            </div>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor:</label>
            <input type="number" name="valor" id="valor" class="form-control" value="{{ $financeiro->valor }}" required>
            <div class="invalid-feedback">
                Por favor, insira um valor.
            </div>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3" required>{{ $financeiro->descricao }}</textarea>
            <div class="invalid-feedback">
                Por favor, insira uma descrição.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-appBarAdmin>

<script>
    (function () {
        'use strict';

        var forms = document.querySelectorAll('.needs-validation');

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
    })();
</script>
