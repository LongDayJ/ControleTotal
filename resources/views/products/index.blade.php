<x-appBarAdmin title="Produtos">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<!-- Modal -->
	<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="createProductModalLabel">Criar Produto</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="{{ route('products.store') }}" method="POST">
						@csrf
						<div class="mb-3">
							<label for="nome" class="form-label">Nome do Produto:</label>
							<input type="text" id="nome" name="nome" class="form-control" required>
						</div>
						<div class="row">
							<div class="mb-3 col-6">
								<label for="quantidadeMinima" class="form-label">Quantidade Mínima:</label>
								<input type="number" id="quantidadeMinima" name="quantidadeMinima" class="form-control" step="1" required>
							</div>
							<div class="mb-3 col-6">
								<label for="quantidade" class="form-label">Quantidade Atual:</label>
								<input type="number" id="quantidade" name="quantidade" class="form-control" step="1" required>
							</div>
						</div>
						<div class="mb-3 d-grid gap-2 pb-5">
							<button type="submit" class="btn btn-primary">Cadastrar Produto</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="content">
			<div class="container pt-2">
				<div class="row">
					<div class="col-12">
						<h1 class="text-center">Produtos</h1>
					</div>
				</div>
				<div class="row justify-content-between mb-3">
					<div class="col-3">
						<!-- Botão para abrir o modal -->
						<button type="button" class="btn btn-primary my-5" data-bs-toggle="modal" data-bs-target="#createProductModal">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
								<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
								<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
							</svg>
							Criar Produto
						</button>
					</div>
					<div class="col-12">
						<form class="d-flex mb-4" role="search" method="GET" action="{{ route('products.index') }}">
							<input class="form-control me-2" type="search" name="nome" placeholder="Nome" aria-label="Search" value="{{ request('nome') }}">
							<input class="form-control me-2" type="number" name="quantidade_minima" placeholder="Quantidade Mínima" aria-label="Search" value="{{ request('quantidade_minima') }}">
							<input class="form-control me-2" type="number" name="quantidade" placeholder="Quantidade" aria-label="Search" value="{{ request('quantidade') }}">
							<input class="form-control me-2" type="date" name="ultimo_restoque" placeholder="Último Reestoque" aria-label="Search" value="{{ request('ultimo_restoque') }}">
							<button class="btn btn-secondary" type="submit">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
									<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
								</svg>
							</button>
						</form>
					</div>
				</div>
				<div>
					<div class="row">
						<div class="col-12">
							<table class="table text-center">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Quantidade Mínima</th>
										<th>Quantidade</th>
										<th>Último Reestoque</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr @if($product->estoque && $product->estoque->quantidadeMinima >= $product->estoque->quantidade) class="table-danger" @endif>
										<td>{{ $product->nome }}</td>
										<td>{{ $product->estoque ? $product->estoque->quantidadeMinima : 'N/A' }}</td>
										<td>
											<form action="{{ route('estoque.incrementar', $product->id) }}" method="POST" style="display:inline;">
												@csrf
												<button type="submit" class="btn btn-secondary"><strong>+</strong></button>
											</form>
											{{ $product->estoque ? $product->estoque->quantidade : 'N/A' }}
											<form action="{{ route('estoque.decrementar', $product->id) }}" method="POST" style="display:inline;">
												@csrf
												<button type="submit" class="btn btn-secondary"><strong>-</strong></button>
											</form>
										</td>
										<td>{{ $product->estoque->updated_at }}</td>
										<td>
											<a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
													<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
												</svg>
											</a>
											<form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');" style="display:inline;">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
														<path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
													</svg>
												</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-appBarAdmin>