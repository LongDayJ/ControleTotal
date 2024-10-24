<x-appBarAdmin title="Cadastro de Colaborador">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const password = document.getElementById('password');
			const confirmPassword = document.getElementById('confirmPassword');
			const form = password.closest('form');

			function validatePassword() {
				if (password.value !== confirmPassword.value) {
					confirmPassword.setCustomValidity('As senhas não coincidem.');
				} else {
					confirmPassword.setCustomValidity('');
				}
			}

			password.addEventListener('input', validatePassword);
			confirmPassword.addEventListener('input', validatePassword);

			form.addEventListener('submit', function(event) {
				validatePassword();
				if (!form.checkValidity()) {
					event.preventDefault();
					event.stopPropagation();
				}
			});
			const fields = form.querySelectorAll('input, select, textarea');
			fields.forEach(field => {
				const value = localStorage.getItem(field.id);
				if (value) {
					field.value = value;
				}
			});

			// Salvar valores no localStorage
			fields.forEach(field => {
				field.addEventListener('input', function() {
					localStorage.setItem(field.id, field.value);
				});
			});

			document.getElementById('clearForm').addEventListener('click', function() {
				fields.forEach(field => {
					field.value = '';
					localStorage.removeItem(field.id);
				});
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#cpf').mask('000.000.000-00');
			$('#phone').mask('(00) 00000-0000');
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#cep').mask('00000-000');

			$('#cep').blur(function() {
				var cep = $(this).val().replace(/\D/g, '');

				if (cep != "") {
					var validacep = /^[0-9]{8}$/;

					if (validacep.test(cep)) {
						$.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
							if (!("erro" in dados)) {
								$('#logradouro').val(dados.logradouro);
								$('#bairro').val(dados.bairro);
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
		@isset($cadastroSuccesso)
		<div class="alert alert-success">
			{{ $cadastroSuccesso }}
		</div>
		@endisset
		<div class="row justify-content-center align-items-center align-content-center d-flex pb-5">
			<div class="col-8">
				<form action="{{ route('registerCollaborator.store') }}" method="POST">
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
								<label for="cro" class="form-label">CRO: (caso seja dentista)</label>
								<input type="text" class="form-control" id="cro" name="cro">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="mb-3">
								<label for="password" class="form-label">Senha:</label>
								<input type="password" class="form-control" id="password" name="password" required>
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="mb-3">
								<label for="confirmPassword" class="form-label">Confirmar Senha:</label>
								<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
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
						<div class="row">
							<div class="col-11 mb-3">
								<button type="submit" class="btn btn-primary col-12">Cadastrar</button>
							</div>
							<div class="col-1 mb-3">
								<button id="clearForm" type="button" class="btn btn-secondary">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
										<path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
									</svg>
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-appBarAdmin>