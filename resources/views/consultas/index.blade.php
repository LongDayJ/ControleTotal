<x-appBarAdmin title="Consultas - {{$userInfo['name']}}">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Informações Pessoais</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-12 pt-4">
				<div class="row">
					<div class="col-6">
						<p class="text-break"><strong>Nome:</strong> {{ $userInfo['name'] }}</p>
					</div>
					<div class="col-6">
						<p class="text-break"><strong>E-mail:</strong> {{ $userInfo['email'] }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<p class="text-break"><strong>CPF:</strong> {{ substr($userInfo['cpf'], 0, 3) . '.***.***-' . substr($userInfo['cpf'], -2) }}</p>
					</div>
					<div class="col-6">
						<p class="text-break"><strong>Telefone:</strong> {{ $userInfo['telefone'] }}</p>
						<a href="https://wa.me/+55{{ preg_replace('/\D/', '', $userInfo['telefone']) }}" target="_blank" class="btn btn-success">Conversar no WhatsApp</a>
					</div>
				</div>
				<div class="row">
					<p class="text-break"><strong>Observações:</strong> {{ $userInfo['descricao'] }}</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Endereço</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-6">
				<p class="text-break"><strong>Logradouro:</strong> {{ $userInfo['logradouro'] }}</p>
			</div>
			<div class="col-6">
				<p class="text-break"><strong>Número:</strong> {{ $userInfo['numero'] }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<p class="text-break"><strong>Bairro:</strong> {{ $userInfo['bairro'] }}</p>
			</div>
			<div class="col-6">
				<p class="text-break"><strong>Cidade:</strong> {{ $userInfo['cidade'] }}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<p class="text-break"><strong>Estado:</strong> {{ $userInfo['uf'] }}</p>
			</div>
			<div class="col-6">
				<p class="text-break"><strong>CEP:</strong> {{ $userInfo['cep'] }}</p>
			</div>
		</div>
		<h1>Consultas</h1>
		<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createConsultaModal">Nova Consulta</button>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Queixa</th>
					<th>Medicação Pré-Consulta</th>
					<th>Alergia</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($consultas as $consulta)
				<tr>
					<td>{{ $consulta->id }}</td>
					<td>{{ $consulta->queixa }}</td>
					<td>{{ $consulta->medicacao_pre_consulta }}</td>
					<td>{{ $consulta->alergia }}</td>
					<td>
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#consultaModal" data-id="{{ $consulta->id }}">Ver</button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editConsultaModal" data-id="{{ $consulta->id }}">Editar</button>
						<form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" style="display:inline-block;">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Deletar</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<!-- Modal para criação de consulta -->
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
						<input type="hidden" name="user_id" value="{{ $userInfo['id'] }}">
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

	<!-- Modal -->
	<div class="modal fade" id="consultaModal" tabindex="-1" role="dialog" aria-labelledby="consultaModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="consultaModalLabel">Detalhes da Consulta</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p><strong>Queixa:</strong> <span id="modal-queixa"></span></p>
					<p><strong>Medicação Pré-Consulta:</strong> <span id="modal-medicacao_pre_consulta"></span></p>
					<p><strong>Alergia:</strong> <span id="modal-alergia"></span></p>
					<p><strong>Cirurgia:</strong> <span id="modal-cirurgia"></span></p>
					<p><strong>Sangramento:</strong> <span id="modal-sangramento"></span></p>
					<p><strong>Cicatrização:</strong> <span id="modal-cicatrizacao"></span></p>
					<p><strong>Falta de Ar:</strong> <span id="modal-falta_ar"></span></p>
					<p><strong>Gestante:</strong> <span id="modal-gestante"></span></p>
					<p><strong>Semanas:</strong> <span id="modal-semanas"></span></p>
					<p><strong>Observações:</strong> <span id="modal-observacoes"></span></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		$('#consultaModal').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget);
			var consultaId = button.data('bs-id');

			var modal = $(this);
			modal.find('.modal-body').html('Carregando...');

			$.ajax({
				url: '/consultas/' + consultaId,
				method: 'GET',
				success: function(data) {
					console.log(data);
					modal.find('#modal-queixa').text(data.queixa);
					modal.find('#modal-medicacao_pre_consulta').text(data.medicacao_pre_consulta);
					modal.find('#modal-alergia').text(data.alergia);
					modal.find('#modal-cirurgia').text(data.cirurgia);
					modal.find('#modal-sangramento').text(data.sangramento);
					modal.find('#modal-cicatrizacao').text(data.cicatrizacao);
					modal.find('#modal-falta_ar').text(data.falta_ar);
					modal.find('#modal-gestante').text(data.gestante);
					modal.find('#modal-semanas').text(data.semanas);
					modal.find('#modal-observacoes').text(data.observacoes);
				}
			});
		});
	</script>
</x-appbarAdmin>