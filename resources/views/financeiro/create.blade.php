<x-appBarAdmin title="Financeiro">
    <h1 class="mb-4 text-center">Adicionar Financeiro</h1>
    <div class="col-8 justify-content-center align-items-center align-content-center d-flex">
            <form action="{{ route('financeiro.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo:</label>
                    <select name="tipo" id="tipo" class="form-select" required>
                        <option value="ENTRADA">ENTRADA</option>
                        <option value="SAIDA">SAIDA</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecione um tipo.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="valor" class="form-label">Valor (R$):</label>
                    <input type="number" name="valor" id="valor" class="form-control" step="0.01" min="0" required>
                    <div class="invalid-feedback">
                        Por favor, insira um valor válido.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea name="descricao" id="descricao" class="form-control" required></textarea>
                    <div class="invalid-feedback">
                        Por favor, insira uma descrição.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
    </div>
</x-appBarAdmin>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>