<x-layout title="Login">
	<div class="container pt-5">
		<div class="row pt-5">
			<div class="col-12">
				<h1 class="text-center">Login</h1>
			</div>
		</div>
		@isset($error)
		<div class="alert alert-danger">
			<p>{{ $error }}</p>
		</div>
		@endisset
		<div class="row justify-content-center align-items-center align-content-center d-flex">
			<div class="col-4">
				<form action="{{ route('login.store') }}" method="POST">
					@csrf
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Senha</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<div class="mb-3">
					</div>
					<div class="d-grid gap-2">
						<button type="submit" class="btn btn-primary">Entrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-layout>