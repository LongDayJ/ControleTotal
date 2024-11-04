<!doctype html>
<html lang="pt-br">

<head>
	<title>{{$title}} - Controle Total</title>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<!-- Bootstrap CSS v5.2.1 -->
	<link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
		rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
		crossorigin="anonymous" />
</head>

<body>
	<header>
		<nav
			class="navbar navbar-expand-sm navbar-light bg-light">
			<div class="col-12 container-fluid d-flex justify-content-between">
				<div>
					<a class="navbar-brand align-items-center" href="/">Controle Total</a>
				</div>
				<div>
					<button
						class="navbar-toggler d-lg-none"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#collapsibleNavId"
						aria-controls="collapsibleNavId"
						aria-expanded="false"
						aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse align-items-end" id="collapsibleNavId">
						<ul class="navbar-nav mt-2 mt-lg-0 d-flex justify-content-end">
							<li class="nav-item">
								<a href="/equipe" class="nav-link mx-1">Equipe</a>
							</li>
							<li class="nav-item">
								<a href="/login" class="btn btn-info text-light mx-1">Login</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<main>
		{{$slot}}
	</main>

	<footer class="bg-light text-center text-lg-start mt-4">
		<div class="container p-4">
			<div class="row text-center">
				<div class="col-lg-6 col-md-12 mb-4 mb-md-0">
					<h5 class="text-uppercase">Clínica Thalyta Santos</h5>
					<p>
						Endereço: R. Prof. José Dionísio de Barros, 37 - Matriz, Vitória de Santo Antão - PE, 55610-420
					</p>
					<p>
						Telefone: (11) 1234-5678[EDITAR O NÚMERO DEPOIS]
					</p>
				</div>
				<div class="col-lg-6 col-md-12 mb-4 mb-md-0">
					<h5 class="text-uppercase">Horário de Funcionamento</h5>
					<p>
						Segunda a Sexta: 8:00 - 18:00
					</p>
					<p>
						Sábado: 8:00 - 12:00
					</p>
				</div>
			</div>
		</div>
		<div class="text-center p-3 bg-light text-white">
			&copy; 2023 Casual Group. Todos os direitos reservados.
		</div>
	</footer>
	<!-- Bootstrap JavaScript Libraries -->
	<script
		src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>

	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
		integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
		crossorigin="anonymous"></script>
</body>

</html>