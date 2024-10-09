<x-appBarAdmin title="Produtos">
	<!-- Modal -->
	<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="createProductModalLabel">Criar Produto</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="/produtos" method="POST">
						@csrf
						<div class="mb-3">
							<label for="nome" class="form-label">Nome do Produto:</label>
							<input type="text" id="nome" name="nome" class="form-control" required>
						</div>
						<div class="row">
							<div class="mb-3 col-6">
								<label for="qtyMin" class="form-label">Quantidade Mínima:</label>
								<input type="number" id="qtyMin" name="qtyMin" class="form-control" step="1" required>
							</div>
							<div class="mb-3 col-6">
								<label for="qtyAtual" class="form-label">Quantidade Atual:</label>
								<input type="number" id="qtyAtual" name="qtyAtual" class="form-control" step="1" required>
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
			<div class="container pt-5">
				<div class="row">
					<div class="col-12 pt-5">
						<h1 class="text-center">Produtos</h1>
					</div>
				</div>
				<div class="row justify-content-between">
					<div class="col-3">
						<!-- Botão para abrir o modal -->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProductModal">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
								<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
								<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
							</svg>
							Criar Produto
						</button>
					</div>
					<div class="col-4">
						<form class="d-flex" role="search" method="GET" action="{{ route('product.index') }}">
							<input class="form-control me-2" type="search" name="search" placeholder="Digite o nome do Produto" aria-label="Search" value="{{ request('search') }}">
							<button class="btn btn-outline-success" type="submit">
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
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr>
										<td>{{ $product['nome'] }}</td>
										<td>{{ $product['quantidadeMinima'] }}</td>
										<td>{{ $product['quantidade'] }}</td>
										<td>{{ $product['updated_at'] }}</td>
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
	</x-layout>