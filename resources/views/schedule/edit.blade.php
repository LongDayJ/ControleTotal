<x-appbarAdmin>
	<x-slot name="title">
		Agendamento
	</x-slot>
	<form action="{{ route('agendamento.update', $agendamento->id) }}" method="post">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="user_id">Paciente</label>
			<select name="user_id" id="user_id" class="form-control">
				@foreach($pacientes as $paciente)
				<option value="{{ $paciente->id }}" {{ old('user_id', $agendamento->user_id) == $paciente->id ? 'selected' : '' }}>{{ $paciente->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="dentista_id">Dentista:</label>
			<select name="dentista_id" id="dentista_id" class="form-control">
				@foreach($medicos as $professional)
				<option value="{{ $professional->id }}" {{ old('dentista_id', $agendamento->dentista_id) == $professional->id ? 'selected' : '' }}>{{ $professional->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="procedimento_id">Procedimento</label>
			<select name="procedimento_id" id="procedimento_id" class="form-control">
				@foreach($procedimentos as $procedimento)
				<option value="{{ $procedimento->id }}" {{ old('procedimento_id', $agendamento->procedimento_id) == $procedimento->id ? 'selected' : '' }}>{{ $procedimento->nome }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="status">Status</label>
			<select name="status" id="status" class="form-control">
				<option value="AGENDADO" {{ old('status', $agendamento->status) == 'AGENDADO' ? 'selected' : '' }}>Agendado</option>
				<option value="CONFIRMADO" {{ old('status', $agendamento->status) == 'CONFIRMADO' ? 'selected' : '' }}>Confirmado</option>
				<option value="CONCLUIDO" {{ old('status', $agendamento->status) == 'CONCLUIDO' ? 'selected' : '' }}>Concluído</option>
				<option value="CANCELADO" {{ old('status', $agendamento->status) == 'CANCELADO' ? 'selected' : '' }}>Cancelado</option>
			</select>
		</div>
		<div class="form-group">
			<label for="data">Data</label>
			<input type="date" name="data" id="data" class="form-control" value="{{ old('data', $agendamento->data) }}">
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="eventStartTimeHour">Hora</label>
				<select class="form-control" id="eventStartTimeHour" name="hora" required>
					@for ($i = 8; $i < 13; $i++)
						<option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ old('hora', $agendamento->hora) == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
						{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
						</option>
						@endfor
						@for ($i = 14; $i < 19; $i++)
							<option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ old('hora', $agendamento->hora) == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
							{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
							</option>
							@endfor
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="eventStartTimeMinute">Minuto</label>
				<select class="form-control" id="eventStartTimeMinute" name="minuto" required>
					@foreach ([0, 15, 30, 45] as $minute)
					<option value="{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}" {{ old('minuto', $agendamento->minuto) == str_pad($minute, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
						{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}
					</option>
					@endforeach
				</select>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Salvar</button>
	</form>
	@if (Auth::user()->perfil_id == 1 or Auth::user()->perfil_id == 4)
	<form action="{{ route('prontuario.create') }}" method="GET">
		<input type="hidden" name="agendamento_id" value="{{ $agendamento->id }}">
		<input type="hidden" name="user_id" value="{{ $agendamento->user_id }}">
		<button type="submit" class="btn btn-secondary">Adicionar Prontuário</button>
	</form>
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createConsultaModal">
		Anamnese
	</button>
	@endif
	<div class="modal fade" id="createConsultaModal" tabindex="-1" role="dialog" aria-labelledby="createConsultaModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="createConsultaModalLabel">Nova Consulta</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="createConsultaForm" action="{{ route('consultas.store') }}" method="POST">
						@csrf
						<input type="hidden" name="agendamento_id" value="{{ $agendamento->id }}">
						<input type="hidden" name="user_id" value="{{ $agendamento->user_id }}">
						@includeIf('consultas.form')
					</form>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" form="createConsultaForm">Salvar</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
</x-appbarAdmin>