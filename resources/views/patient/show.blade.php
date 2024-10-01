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
						<p class="text-break"><strong>CPF:</strong> {{ $patient['cpf'] }}</p>
					</div>
					<div class="col-4">
						<p class="text-break"><strong>Código do Paciente:</strong> {{ $patient['codigoPaciente'] }}</p>
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
							<td>Consulta</td>
							<td>01/01/2021</td>
							<td>R$ 100,00</td>
							<td>Pendente</td>
						</tr>
						<tr>
							<td>Manutenção de Aparelho</td>
							<td>01/01/2021</td>
							<td>R$ 150,00</td>
							<td>Pago</td>
						</tr>
						<tr>
							<td>Limpeza de Tartáro</td>
							<td>01/01/2021</td>
							<td>R$ 350,00</td>
							<td>Pago</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</x-layout>