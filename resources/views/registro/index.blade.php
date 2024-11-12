<x-appBarAdmin title="Registros">
	<h1>Tela de Registros</h1>
	@if(session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
	@endif
	<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<a class="nav-link active" id="colaborador-tab" data-toggle="tab" href="#colaborador" role="tab" aria-controls="colaborador" aria-selected="true">
				Colaboradores
			</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="paciente-tab" data-toggle="tab" href="#paciente" role="tab" aria-controls="paciente" aria-selected="false">
				Pacientes
			</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="procedimento-tab" data-toggle="tab" href="#procedimento" role="tab" aria-controls="procedimento" aria-selected="false">
				Procedimentos
			</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="dentista-tab" data-toggle="tab" href="#dentista" role="tab" aria-controls="dentista" aria-selected="false">
				Dentistas
			</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="colaborador" role="tabpanel" aria-labelledby="colaborador-tab">
			<!-- Modal -->
			<div class="modal fade" id="registerCollaboratorModal" tabindex="-1" aria-labelledby="registerCollaboratorModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="registerCollaboratorModalLabel">Registrar Colaborador</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{ route('registerCollaborator.create') }}" method="POST">
								@csrf
								<label for="colaboradorNome">Nome:</label>
								<input type="text" id="colaboradorNome" name="colaboradorNome" required>
								<label for="colaboradorCargo">Cargo:</label>
								<input type="text" id="colaboradorCargo" name="colaboradorCargo" required>
								<button type="submit" class="btn btn-primary">Registrar</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- TODO Colaboradores -->
			<div class="row my-5">
				<div class="col-4 text-start">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerCollaboratorModal">
						Registrar Colaborador
					</button>
				</div>
				<div class="col-4 text-center">
					<h2>Lista de Colaboradores</h2>
				</div>
				<div class="col-4 text-end">
					<form class="d-flex" role="search" method="GET" action="">
						<input class="form-control me-2" type="search" name="search" placeholder="Digite o nome do Colaborador" aria-label="Search" value="{{ request('search') }}">
						<button class="btn btn-secondary justify-content-center" type="submit">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
							</svg>
						</button>
					</form>
					</form>
				</div>
			</div>
			<table class="table text-center">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Cargo</th>
						<th>CPF</th>
					</tr>
				</thead>
				<tbody>
					@foreach($colaboradores as $colaborador)
					@if($colaborador->perfil_id == 2)
					<tr>
						<td>{{ $colaborador->name }}</td>
						<td>{{ $colaborador->perfil_id == 2 ? 'Colaborador' : 'Sem Cargo' }}</td>
						<td>{{ substr($colaborador['cpf'], 0, 3) . '.***.***-' . substr($colaborador['cpf'], -2) }}</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>

		<!-- TODO Pacientes -->
		<div class="tab-pane fade" id="paciente" role="tabpanel" aria-labelledby="paciente-tab">
			<h2>Paciente</h2>
			<form action="" method="POST">
				@csrf
				<label for="pacienteNome">Nome:</label>
				<input type="text" id="pacienteNome" name="pacienteNome" required>
				<label for="pacienteIdade">Idade:</label>
				<input type="number" id="pacienteIdade" name="pacienteIdade" required>
				<button type="submit">Registrar</button>
			</form>
		</div>
		<div class="tab-pane fade" id="procedimento" role="tabpanel" aria-labelledby="procedimento-tab">
			<h2>Procedimento</h2>
			<form action="" method="POST">
				@csrf
				<label for="procedimentoNome">Nome:</label>
				<input type="text" id="procedimentoNome" name="procedimentoNome" required>
				<button type="submit">Registrar</button>
			</form>
		</div>
		<div class="tab-pane fade" id="dentista" role="tabpanel" aria-labelledby="dentista-tab">
			<h2>Dentistas</h2>
			<form action="" method="POST">
				@csrf
				<label for="dentistaNome">Nome:</label>
				<input type="text" id="dentistaNome" name="dentistaNome" required>
				<button type="submit">Registrar</button>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-appBarAdmin>