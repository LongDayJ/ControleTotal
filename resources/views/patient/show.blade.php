<x-appbarUser title="Paciente">
	<div class="container mt-5">

		<div class="row mb-4">
			<div class="col-12">
				<h1 class="text-center">Informações Pessoais</h1>
			</div>
		</div>

		<div class="row mb-4">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row mb-3">
							<div class="col-md-6">
								<p class="text-break"><strong>Nome:</strong> {{ $patient['name'] }}</p>
							</div>
							<div class="col-md-6">
								<p class="text-break"><strong>E-mail:</strong> {{ $patient['email'] }}</p>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<p class="text-break"><strong>CPF:</strong> {{ substr($patient['cpf'], 0, 3) . '.***.***-' . substr($patient['cpf'], -2) }}</p>
							</div>
							<div class="col-md-6">
								<p class="text-break"><strong>Telefone:</strong> {{ $patient['telefone'] }}</p>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<p class="text-break"><strong>UF:</strong> {{ $patient['uf'] }}</p>
							</div>
							<div class="col-md-6">
								<p class="text-break"><strong>Cidade:</strong> {{ $patient['cidade'] }}</p>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<p class="text-break"><strong>Bairro:</strong> {{ $patient['bairro'] }}</p>
							</div>
							<div class="col-md-6">
								<p class="text-break"><strong>Logradouro:</strong> {{ $patient['logradouro'] }}</p>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<p class="text-break"><strong>CEP:</strong> {{ $patient['cep'] }}</p>
							</div>
							<div class="col-md-6">
								<p class="text-break"><strong>Número:</strong> {{ $patient['numero'] }}</p>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<p class="text-break"><strong>Complemento:</strong> {{ $patient['complemento'] }}</p>
							</div>
						</div>
						<p class="text-break"><strong>Descrição:</strong> {{ $patient['descricao'] }}</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-4">
			<div class="col-12">
				<h1 class="text-center">Procedimentos Realizados</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover text-center">
						<thead class="thead-dark">
							<tr>
								<th class="text-break">Procedimento</th>
								<th>Dentista</th>
								<th>Descrição</th>
								<th class="text-break">Status</th>
								<th class="text-break">Data</th>
								<th class="text-break">Horário</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($patient['agendamentos'] as $agendamento)
								<tr>
									<td>{{ $agendamento['procedimento'] }}</td>
									<td>{{ $agendamento['dentista'] }}</td>
									<td>{{ $agendamento['observacao'] }}</td>
									<td>{{ $agendamento['status'] }}</td>
									<td>{{ \Carbon\Carbon::parse($agendamento['data'])->format('d/m/Y') }}</td>
									<td>{{ \Carbon\Carbon::parse($agendamento['hora'])->format('H:i') }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</x-appbarUser>