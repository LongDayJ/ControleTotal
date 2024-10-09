<x-appBarAdmin title="Cadastro de Funcionário">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#cpf').mask('000.000.000-00');
			$('#phone').mask('(00) 00000-0000');
		});
	</script>
	<script>
		$(document).ready(function() {
			// Aplica a máscara ao campo de CEP
			$('#cep').mask('00000-000');

			$('#cep').blur(function() {
				var cep = $(this).val().replace(/\D/g, '');

				if (cep != "") {
					var validacep = /^[0-9]{8}$/;

					if (validacep.test(cep)) {
						$.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
							if (!("erro" in dados)) {
								$('#cidade').val(dados.localidade);
								$('#uf').val(dados.uf);
							} else {
								alert("CEP não encontrado.");
							}
						});
					} else {
						alert("Formato de CEP inválido.");
					}
				}
			});
		});
	</script>
	<div class="container pt-5">
		<div class="row pt-5">
			<div class="col-12">
				<h1 class="text-center">Cadastro de Colaborador</h1>
			</div>
		</div>
		<div class="row justify-content-center align-items-center align-content-center d-flex pb-5">
			<div class="col-8">
				<form action="/register" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="name" class="form-label">Nome Completo</label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>
						<div class="col-md-6 mb-3">
							<label for="email" class="form-label">Email:</label>
							<input type="email" class="form-control" id="email" name="email" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="cpf" class="form-label">CPF:</label>
							<input type="text" class="form-control" id="cpf" name="cpf" required>
						</div>
						<div class="col-md-6 mb-3">
							<div class="mb-3">
								<label for="phone" class="form-label">Telefone:</label>
								<input type="text" class="form-control" id="phone" name="phone" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="mb-3">
								<label for="cro" class="form-label">CRO:</label>
								<input type="text" class="form-control" id="cro" name="cro" required>
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="mb-3">
								<label for="password" class="form-label">Senha:</label>
								<input type="password" class="form-control" id="password" name="password" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="mb-3">
								<label for="cep" class="form-label">CEP:</label>
								<input type="text" class="form-control" id="cep" name="cep" required>
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="mb-3">
								<label for="complemento" class="form-label">Complemento:</label>
								<input type="text" class="form-control" id="complemento" name="complemento">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="mb-3">
								<label for="logradouro" class="form-label">Logradouro:</label>
								<input type="text" class="form-control" id="logradouro" name="logradouro" required>
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="mb-3">
								<label for="numeroCasa" class="form-label">Nº da Casa:</label>
								<input type="text" class="form-control" id="numeroCasa" name="numeroCasa" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="mb-3">
								<label for="bairro" class="form-label">Bairro:</label>
								<input type="text" class="form-control" id="bairro" name="bairro" required>
							</div>
							<div class="col-md-6 mb-3">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<div class="mb-3">
									<label for="cidade" class="form-label">Cidade:</label>
									<input type="text" class="form-control" id="cidade" name="cidade" required>
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<div class="mb-3">
									<label for="uf" class="form-label">Estado:</label>
									<input type="text" class="form-control" id="uf" name="uf" required>
								</div>
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