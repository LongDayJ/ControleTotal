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
				<option value="CONCLUIDO" {{ old('status', $agendamento->status) == 'CONCLUIDO' ? 'selected' : '' }}>Concluído</option>
				<option value="CANCELADO" {{ old('status', $agendamento->status) == 'CANCELADO' ? 'selected' : '' }}>Cancelado</option>
			</select>
		</div>
		<div class="form-group">
			<label for="data">Data</label>
			<input type="date" name="data" id="data" class="form-control" value="{{ old('data', $agendamento->data) }}">
		</div>
		<div class="form-group">
			<label for="hora">Horário</label>
			<select class="form-control" id="hora" name="hora" required>
				@for ($i = 8; $i < 12; $i++)
					<option value="{{ sprintf('%02d:00', $i) }}" {{ old('hora', $agendamento->hora) == sprintf('%02d:00', $i) ? 'selected' : '' }}>
					{{ sprintf('%02d:00', $i) }}
					</option>
					<option value="{{ sprintf('%02d:30', $i) }}" {{ old('hora', $agendamento->hora) == sprintf('%02d:30', $i) ? 'selected' : '' }}>
						{{ sprintf('%02d:30', $i) }}
					</option>
					@endfor
					@for ($i = 14; $i < 19; $i++)
						<option value="{{ sprintf('%02d:00', $i) }}" {{ old('hora', $agendamento->hora) == sprintf('%02d:00', $i) ? 'selected' : '' }}>
						{{ sprintf('%02d:00', $i) }}
						</option>
						<option value="{{ sprintf('%02d:15', $i) }}" {{ old('hora', $agendamento->hora) == sprintf('%02d:15', $i) ? 'selected' : '' }}>
						{{ sprintf('%02d:15', $i) }}
						</option>
						<option value="{{ sprintf('%02d:30', $i) }}" {{ old('hora', $agendamento->hora) == sprintf('%02d:30', $i) ? 'selected' : '' }}>
							{{ sprintf('%02d:30', $i) }}
						</option>
					@endfor
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Salvar</button>
	</form>
</x-appbarAdmin>