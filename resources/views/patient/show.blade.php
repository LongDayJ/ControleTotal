<x-appbarUser title="Paciente">
	<div class="container">

		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Informações Pessoais</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-4 text-center align-content-center">
				<img src="https://via.placeholder.com/200" alt="Foto do Paciente" class="img-fluid">
			</div>
			<div class="col-8 pt-4">
				<div class="row">
					<div class="col-4">
						<p class="text-break"><strong>Nome:</strong> {{ $patient['name'] }}</p>
					</div>
					<div class="col-4">
						<p class="text-break"><strong>E-mail:</strong> {{ $patient['email'] }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<p class="text-break"><strong>CPF:</strong> {{ substr($patient['cpf'], 0, 3) . '.***.***-' . substr($patient['cpf'], -2) }}</p>
					</div>
					<div class="col-4">
						<p class="text-break"><strong>Telefone:</strong> {{ $patient['telefone'] }}</p>
					</div>
				</div>
				<p class="text-break"><strong>Descrição:</strong> {{ $patient['descricao'] }}</p>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Procedimentos Realizados</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<table class="table text-center">
					<thead>
						<tr>
							<th class="text-break">Procedimento</th>
							<th>Data</th>
							<th>Valor</th>
							<th class="text-break">Status do Pagamento</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</x-layout>