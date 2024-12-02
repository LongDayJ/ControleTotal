<x-appbarAdmin title="Financeiro">
	<div class="container mt-4">
		<h1 class="mb-4">Financeiro</h1>
		<a href="{{ route('financeiro.create') }}" class="btn btn-primary mb-3">Adicionar</a>

		<!-- Formulário de Pesquisa -->
		<form method="GET" action="{{ route('financeiro.index') }}" class="mb-4">
			<div class="row">
				<div class="col">
					<select name="tipo" class="form-control">
						<option value="">Tipo de Entrada</option>
						<option value="ENTRADA" {{ request('tipo') == 'ENTRADA' ? 'selected' : '' }}>ENTRADA</option>
						<option value="SAIDA" {{ request('tipo') == 'SAIDA' ? 'selected' : '' }}>SAIDA</option>
					</select>
				</div>
				<div class="col">
					<input type="text" name="descricao" class="form-control" placeholder="Descrição" value="{{ request('descricao') }}">
				</div>
				<div class="col">
					<input type="text" name="valor" class="form-control" placeholder="Valor" value="{{ request('valor') }}">
				</div>
				<div class="col">
					<input type="date" name="data_vencimento" class="form-control" placeholder="Data de Vencimento" value="{{ request('data_vencimento') }}">
				</div>
				<div class="col">
					<input type="date" name="data_pagamento" class="form-control" placeholder="Data de Pagamento" value="{{ request('data_pagamento') }}">
				</div>
				<div class="col">
					<select name="status" class="form-control">
						<option value="">Status</option>
						<option value="PENDENTE" {{ request('status') == 'PENDENTE' ? 'selected' : '' }}>PENDENTE</option>
						<option value="PAGO" {{ request('status') == 'PAGO' ? 'selected' : '' }}>PAGO</option>
						<option value="CANCELADO" {{ request('status') == 'CANCELADO' ? 'selected' : '' }}>CANCELADO</option>
					</select>
				</div>
				<div class="col">
					<button type="submit" class="btn btn-primary">Pesquisar</button>
				</div>
			</div>
		</form>

		<ul class="list-group">
			<li class="list-group-item d-flex justify-content-between align-items-center">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Tipo de Entrada</th>
							<th scope="col">Descrição</th>
							<th scope="col">Valor</th>
							<th scope="col">Data de Vencimento</th>
							<th scope="col">Data de Pagamento</th>
							<th scope="col">Status</th>
							<th scope="col">Ações</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($financeiros as $financeiro)
						<tr>
							<td class="{{ $financeiro->tipo == 'ENTRADA' ? 'text-success font-weight-bold' : ($financeiro->tipo == 'SAIDA' ? 'text-danger font-weight-bold' : '') }}"><strong>{{ $financeiro->tipo }}</strong></strong></td>
							<td>{{ $financeiro->descricao }}</td>
							<td>R$ {{ number_format($financeiro->valor, 2, ',', '.') }}</td>
							<td>{{ \Carbon\Carbon::parse($financeiro->data_vencimento)->format('d/m/Y') }}</td>
							<td>{{ \Carbon\Carbon::parse($financeiro->data_pagamento)->format('d/m/Y') }}</td>
							<td>{{ $financeiro->status }}</td>
							<td>
								<a href="{{ route('financeiro.edit', $financeiro->id) }}" class="btn btn-sm btn-warning">Editar</a>
								<form action="{{ route('financeiro.destroy', $financeiro->id) }}" method="POST" style="display:inline;">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-sm btn-danger">Excluir</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</li>
		</ul>
	</div>
</x-appbarAdmin>