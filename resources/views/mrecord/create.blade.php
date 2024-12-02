<x-appbarAdmin title="Prontuario">
	<form action="{{ route('prontuario.store') }}" method="POST">
		@csrf
		<input type="hidden" name="consulta_id" value="{{ $consulta_id }}">
		<input type="hidden" name="user_id" value="{{ $user_id }}">

		<div class="form-group">
			<label for="user_name">Nome do Paciente:</label>
			<input type="text" id="user_name" name="user_name" class="form-control" value="{{ $user_name }}" readonly>
		</div>

		<div class="form-group">
			<label for="medicamento">Medicamento:</label>
			<input type="text" id="medicamento" name="medicamento" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="metodo">Método:</label>
			<input type="text" id="metodo" name="metodo" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="cuidado">Cuidado:</label>
			<input type="text" id="cuidado" name="cuidado" class="form-control" required>
		</div>

		<button type="submit" class="btn btn-primary">Salvar</button>
	</form>
</x-appbarAdmin>