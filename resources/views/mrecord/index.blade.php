<x-appBarAdmin title="Prontuário - Paciente">
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
				<p class="text-break"><strong>Observações:</strong> {{ $userInfo['descricao'] }}</p>
			</div>
		</div>

		<div class="row"></div>
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
</x-appBarAdmin>