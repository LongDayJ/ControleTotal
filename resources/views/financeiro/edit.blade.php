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
        <div class="mb-3">
            <label for="data_vencimento" class="form-label">Data de Vencimento:</label>
            <input type="date" name="data_vencimento" id="data_vencimento" class="form-control" value="{{ $financeiro->data_vencimento }}" required>
            <div class="invalid-feedback">
                Por favor, insira uma data de vencimento.
            </div>
        </div>
        <div class="mb-3">
            <label for="data_pagamento" class="form-label">Data de Pagamento:</label>
            <input type="date" name="data_pagamento" id="data_pagamento" class="form-control" value="{{ $financeiro->data_pagamento }}" required>
            <div class="invalid-feedback">
                Por favor, insira uma data de pagamento.
            </div>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="PENDENTE" {{ $financeiro->status == 'PENDENTE' ? 'selected' : '' }}>PENDENTE</option>
                <option value="PAGO" {{ $financeiro->status == 'PAGO' ? 'selected' : '' }}>PAGO</option>
                <option value="CANCELADO" {{ $financeiro->status == 'CANCELADO' ? 'selected' : '' }}>CANCELADO</option>
            </select>
            <div class="invalid-feedback">
                Por favor, selecione um status.
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
