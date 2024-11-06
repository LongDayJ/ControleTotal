<x-appBarAdmin title="Cadastro de Usuário">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');
            $('#phone').mask('(00) 00000-0000');

            $('#userType').change(function() {
                var userType = $(this).val();
                if (userType == 'colaborador') {
                    $('#colaboradorFields').show();
                    $('#pacienteFields').hide();
                } else {
                    $('#colaboradorFields').hide();
                    $('#pacienteFields').show();
                }
            });
        });
    </script>
    <div class="container pt-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Cadastro de Usuário</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center align-content-center d-flex pb-5">
            <div class="col-4">
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="userType" class="form-label">Tipo de Usuário</label>
                        <select class="form-control" id="userType" name="userType" required>
                            <option value="paciente">Paciente</option>
                            <option value="colaborador">Colaborador</option>
                        </select>
                    </div>
                    <div id="pacienteFields">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div id="colaboradorFields" style="display:none;">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Cargo:</label>
                            <input type="text" class="form-control" id="position" name="position" required>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-appBarAdmin>