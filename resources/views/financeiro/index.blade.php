<x-appbarAdmin title="Financeiro">
	<div class="container mt-4">
		<h1 class="mb-4">Financeiro</h1>
		<a href="{{ route('financeiro.create') }}" class="btn btn-primary mb-3">Adicionar</a>
		<ul class="list-group">
			@foreach ($financeiros as $financeiro)
			<li class="list-group-item d-flex justify-content-between align-items-center">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Tipo de Entrada</th>
							<th scope="col">Descrição</th>
							<th scope="col">Valor</th>
							<th scope="col">Ações</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($financeiros as $financeiro)
						<tr>
							<td class="{{ $financeiro->tipo == 'ENTRADA' ? 'text-success font-weight-bold' : '' }}">{{ $financeiro->tipo }}</td>
							<td>{{ $financeiro->descricao }}</td>
							<td>R$ {{ number_format($financeiro->valor, 2, ',', '.') }}</td>
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
			@endforeach
		</ul>
	</div>
</x-appbarAdmin>