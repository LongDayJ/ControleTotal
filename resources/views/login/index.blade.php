<x-layout title="Login">
	<div class="container pt-5">
		<div class="row pt-5">
			<div class="col-12">
				<h1 class="text-center">Login</h1>
			</div>
		</div>
		<div class="row justify-content-center align-items-center align-content-center d-flex">
			<div class="col-4">
				<form action="/login" method="POST">
					@csrf
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Senha</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<label class="form-label">Tipo de Login</label>
					<div class="mb-3">
						<div class="form-check d-inline-block me-3">
							<input class="form-check-input" type="radio" id="admin" name="role" value="admin" required>
							<label class="form-check-label" for="admin">Admin</label>
						</div>
						<div class="form-check d-inline-block me-3">
							<input class="form-check-input" type="radio" id="colaborador" name="role" value="colaborador" required>
							<label class="form-check-label" for="colaborador">Colaborador</label>
						</div>
						<div class="form-check d-inline-block">
							<input class="form-check-input" type="radio" id="paciente" name="role" value="paciente" required>
							<label class="form-check-label" for="paciente">Paciente</label>
						</div>
					</div>
					<div class="d-grid gap-2">
						<!-- <button type="submit" class="btn btn-primary">Entrar</button> -->
						<!-- <a href="/register-colaborador" class="btn btn-primary">Registrar</a> -->
						<a href="/dashboard" class="btn btn-primary">Entrar</a>
						<a href="/patient/1" class="btn-btn-prim">Entrar Paciente</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-layout>