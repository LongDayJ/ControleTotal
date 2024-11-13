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
	<div class="container pt-3">
		<div class="row">
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
				<form id="formStep1" action="{{ route('registerCollaborator.store') }}" method="POST">
					@csrf
					<div id="step1">
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
								<label for="cro" class="form-label">CRO: (caso seja dentista)</label>
								<input type="text" class="form-control" id="cro" name="cro">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="password" class="form-label">Senha:</label>
								<input type="password" class="form-control" id="password" name="password" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="confirmPassword" class="form-label">Confirmar Senha:</label>
								<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
							</div>
						</div>
						<div class="d-grid gap-2">
							<div class="row">
								<div class="col-11 mb-3">
									<button type="button" class="btn btn-primary col-12" id="nextStep">Avançar</button>
								</div>
								<div class="col-1 mb-3">
									<button id="clearForm" type="button" class="btn btn-secondary">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
											<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
										</svg>
									</button>
								</div>
							</div>
						</div>
					</div>
					<div id="step2" style="display: none;">
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="cep" class="form-label">CEP:</label>
								<input type="text" class="form-control" id="cep" name="cep" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="complemento" class="form-label">Complemento:</label>
								<input type="text" class="form-control" id="complemento" name="complemento">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="logradouro" class="form-label">Logradouro:</label>
								<input type="text" class="form-control" id="logradouro" name="logradouro" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="numeroCasa" class="form-label">Nº da Casa:</label>
								<input type="text" class="form-control" id="numeroCasa" name="numeroCasa" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="bairro" class="form-label">Bairro:</label>
								<input type="text" class="form-control" id="bairro" name="bairro" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="phone" class="form-label">Telefone:</label>
								<input type="text" class="form-control" id="phone" name="phone" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="cidade" class="form-label">Cidade:</label>
								<input type="text" class="form-control" id="cidade" name="cidade" required>
							</div>
							<div class="col-md-6 mb-3">
								<label for="uf" class="form-label">Estado:</label>
								<input type="text" class="form-control" id="uf" name="uf" required>
							</div>
						</div>
						<div class="d-grid gap-2">
							<div class="row">
								<div class="col-1 mb-3">
									<button type="button" class="btn btn-primary" id="previousStep">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
											<path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
										</svg>
									</button>
								</div>
								<div class="col-10 mb-3">
									<button type="submit" class="btn btn-primary col-12">Cadastrar</button>
								</div>
								<div class="col-1 mb-3">
									<button id="clearForm" type="button" class="btn btn-secondary">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
											<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
										</svg>
									</button>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
		</form>
	</div>
	</div>

	<script>
		document.getElementById('previousStep').addEventListener('click', function() {
			document.getElementById('step1').style.display = 'block';
			document.getElementById('step2').style.display = 'none';
		});
		document.getElementById('nextStep').addEventListener('click', function() {
			document.getElementById('step1').style.display = 'none';
			document.getElementById('step2').style.display = 'block';
		});
	</script>
	</div>
</x-appBarAdmin>