<x-appBarAdmin title="Registros">
	<h1>Tela de Registros</h1>
	@isset($procedimentoErro)
	<div class="alert alert-danger">
		{{ $procedimentoErro }}
	</div>
	@endisset
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

			<!-- TODO Colaboradores -->
			<div class="row my-5">
				<div class="col-4 text-start">
					<a href="{{ route('registerCollaborator.create') }}" class="btn btn-primary">
						Registrar Colaborador
					</a>
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
			<h2>Pacientes</h2>
			<div class="col-4 text-start">
				<a href="{{ route('registerPatient.create') }}" class="btn btn-primary">
					Registrar Paciente
				</a>
			</div>
			<table class="table text-center">
				<thead>
					<tr>
						<th>Paciente</th>
						<th>Email</th>
						<th>Telefone</th>
					</tr>
				</thead>
				<tbody>
					@foreach($pacientes as $paciente)
					<tr>
						<td>{{ $paciente->name }}</td>
						<td>{{ $paciente->email }}</td>
						<td>{{ $paciente->telefone}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="tab-pane fade" id="procedimento" role="tabpanel" aria-labelledby="procedimento-tab">
			<h2>Procedimento</h2>
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerProcedimentoModal">
				Registrar Procedimento
			</button>

			<!-- Modal -->
			<div class="modal fade" id="registerProcedimentoModal" tabindex="-1" aria-labelledby="registerProcedimentoModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form method="POST" action="{{ route('procedimentos.store') }}">
							@csrf
							<div class="modal-header">
								<h5 class="modal-title" id="registerProcedimentoModalLabel">Registrar Procedimento</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="nome">Nome</label>
									<input type="text" class="form-control" id="nome" name="nome" required>
								</div>
								<div class="form-group">
									<label for="descricao">Descrição</label>
									<textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
								</div>
								<div class="form-group">
									<label for="procedimento_pai">Procedimento Pai</label>
									<select class="form-control" id="procedimento_pai" name="procedimento_pai">
										<option value="">Nenhum</option>
										@foreach($procedimentos as $procedimento)
										<option value="{{ $procedimento->id }}">{{ $procedimento->nome }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary">Salvar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal fade" id="editProcedimentoModal" tabindex="-1" role="dialog" aria-labelledby="editProcedimentoModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editProcedimentoModalLabel">Editar Procedimento</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="editProcedimentoForm" method="POST" action="">
							@csrf
							@method('PUT')
							<div class="modal-body">
								<div class="form-group">
									<label for="nome">Nome</label>
									<input type="text" class="form-control" id="editNome" name="nome" required>
								</div>
								<div class="form-group">
									<label for="descricao">Descrição</label>
									<textarea class="form-control" id="editDescricao" name="descricao" required></textarea>
								</div>
								<div class="form-group">
									<label for="nome_procedimento_pai">Depende de</label>
									<input type="text" class="form-control" id="editNomeProcedimentoPai" name="nome_procedimento_pai">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary">Salvar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<table class="table text-center">
				<thead>
					<tr>
						<th>Procedimento</th>
						<th>Descricao</th>
						<th>Depende de</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($procedimentos as $procedimento)
					<tr>
						<td>{{ $procedimento->nome }}</td>
						<td>{{ $procedimento->descricao }}</td>
						<td>{{ $procedimento->nome_procedimento_pai }}</td>
						<td>
							<!-- <a href="{{ route('procedimentos.update', $procedimento->id) }}" class="btn btn-warning btn-sm">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
									<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
								</svg>
							</a> -->
							<form action="{{ route('procedimentos.destroy', $procedimento->id) }}" method="POST" style="display:inline;">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger btn-sm">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
										<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
									</svg>
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="tab-pane fade" id="dentista" role="tabpanel" aria-labelledby="dentista-tab">
			<h2>Dentistas</h2>
			<table class="table text-center">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Descricao</th>
						<th>Status</th>
						<th>CRO</th>
					</tr>
				</thead>
				<tbody>
					@foreach($dentistas as $dentista)
					<tr>
						<td>{{ $dentista->nome }}</td>
						<td>{{ $dentista->descricao }}</td>
						<td>{{ $dentista->status }}</td>
						<td>{{ $dentista->cro }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script>
		$('#editProcedimentoModal').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget);
			var id = button.data('id');
			var nome = button.data('nome');
			var descricao = button.data('descricao');
			var nome_procedimento_pai = button.data('nome_procedimento_pai');

			var modal = $(this);
			modal.find('#editNome').val(nome);
			modal.find('#editDescricao').val(descricao);
			modal.find('#editNomeProcedimentoPai').val(nome_procedimento_pai);

			var form = modal.find('#editProcedimentoForm');
			form.attr('action', '/procedimentos/' + id);
		});
	</script>
</x-appBarAdmin>