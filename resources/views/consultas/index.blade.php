<x-appBarAdmin title="Prontuario - {{$userInfo['name']}}">
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
			</div>
		</div>

		<h2>Prontuários</h2>
        @if(isset($userInfo['prontuarios']) && count($userInfo['prontuarios']) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Consulta ID</th>
                        <th>Medicamento</th>
                        <th>Método</th>
                        <th>Cuidado</th>
                        <th>Data de Criação</th>
                        <th>Data de Atualização</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userInfo['prontuarios'] as $prontuario)
                    <tr>
                        <td>{{ $prontuario['consulta_id'] }}</td>
                        <td>{{ $prontuario['medicamento'] }}</td>
                        <td>{{ $prontuario['metodo'] }}</td>
                        <td>{{ $prontuario['cuidado'] }}</td>
                        <td>{{ $prontuario['created_at'] }}</td>
                        <td>{{ $prontuario['updated_at'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhum prontuário encontrado.</p>
        @endif
	</div>
</x-appBarAdmin>