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
	<script src="https://cdn.jsdelivr.net/npm/mousetrap@1.6.5/mousetrap.min.js"></script>
	<script>
		Mousetrap.bind('d', function() {
			window.location.href = "{{ route('dashboard.index') }}";
		});

		Mousetrap.bind('a', function() {
			window.location.href = "{{ route('agendamento.index') }}";
		});

		Mousetrap.bind('e', function() {
			window.location.href = "{{ route('products.index') }}";
		});

		Mousetrap.bind('p', function() {
			window.location.href = "{{ route('registerPatient.create') }}";
		});

		Mousetrap.bind('c', function() {
			window.location.href = "{{ route('registerCollaborator.create') }}";
		});

		Mousetrap.bind('r', function() {
			window.location.href = "{{ route('registro.index') }}";
		});
	</script>
	<main>
		<div class="d-flex flex-column flex-md-row min-vh-100">
			<!-- Drawer -->
			<div class="sidebar d-flex flex-column p-3 bg-primary flex-shrink-0" style="max-width: 20vw;">
				<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bullseye m-2" viewBox="0 0 16 16">
						<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
						<path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10m0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
						<path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8" />
						<path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
					</svg>
					<span class="fs-4 text-light">Controle Total</span>
				</a>
				<hr>
				<ul class="nav nav-pills flex-column mb-auto">
					<li>
						<a href="{{ route('dashboard.index')}}" class="nav-link {{ request()->routeIs('dashboard.index') ? 'active link-dark' : 'link-light' }}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-speedometer2 m-2" viewBox="0 0 16 16">
								<path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z" />
								<path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3" />
							</svg>
							Dashboard
						</a>
					</li>
					<li>
						<a href="{{ route('registerPatient.create') }}" class="nav-link link-light {{ request()->routeIs('registerPatient.create') ? 'active link-dark' : 'link-light' }}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-add m-2" viewBox="0 0 16 16">
								<path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
								<path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
							</svg>
							Pacientes
						</a>
					</li>
					<li>
						<a href="{{ route('agendamento.index') }}" class="nav-link link-light {{ request()->routeIs('agendamento.index') ? 'active link-dark' : 'link-light' }}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar m-2" viewBox="0 0 16 16">
								<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
							</svg>
							Agendamento
						</a>
					</li>
					<li>
						<a href="{{ route('products.index') }}" class="nav-link link-light {{ request()->routeIs('products.index') ? 'active link-dark' : 'link-light' }}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-boxes m-2" viewBox="0 0 16 16">
								<path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
							</svg>
							Estoque
						</a>
					</li>
					@if(Auth::user()->perfil_id == 1)
					<li>
						<a href="{{ route('registerCollaborator.create') }}" class="nav-link link-light {{ request()->routeIs('registerCollaborator.create') ? 'active link-dark' : 'link-light' }}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-vcard-fill m-2" viewBox="0 0 16 16">
								<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
							</svg>
							Colaboradores
						</a>
					</li>
					@endif
					<li>
						<a href="{{ route('registro.index') }}" class="nav-link link-light {{ request()->routeIs('registro.index') ? 'active link-dark' : 'link-light' }}">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-badge-fill m-2" viewBox="0 0 16 16">
								<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6m5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z" />
							</svg>
							Registros
						</a>
					</li>
					@if (Auth::user()->perfil_id == 1)
					<li>
						<a href="{{ route('financeiro.index')}}" class="nav-link link-light {{ request()->routeIs('financeiro.index') ? 'active link-dark' : 'link-light'}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack m-2" viewBox="0 0 16 16">
								<path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
								<path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z" />
							</svg>
							Financeiro
						</a>
					</li>
					@endif
				</ul>
				<hr>
				<div class="">
					<p class="text-light text-center">{{ \Carbon\Carbon::now()->setTimezone('America/Sao_Paulo')->format('d/m/Y') }}</p>
				</div>
			</div>

			<div class="page-content-wrapper flex-grow-1">
				<nav
					class="navbar navbar-expand-sm navbar-dark bg-primary">
					<div class="col-12 container-fluid d-flex justify-content-end">
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
									<div class="dropdown">
										<a href="#" class="d-flex align-items-center link-light text-decoration-none my-2" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
											<strong>Olá, {{ Auth::user()->name }}</strong>
										</a>
										<ul class="dropdown-menu dropdown-menu-end text-small shadow" aria-labelledby="dropdownUser2">
											<li><a class="dropdown-item" href="#">Settings</a></li>

											<li><a class="dropdown-item" href="{{ route('profile.show', ['id' => Auth::user()->id]) }}">Perfil</a></li>
											<li>
												<hr class="dropdown-divider">
											</li>
											<li>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
												</form>
												<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
													Sair
												</a>
											</li>
										</ul>
									</div>
								</ul>
							</div>
						</div>
					</div>
				</nav>
				<div style="border: 1px solid #ccc;">
					{{$slot}}
				</div>
			</div>
		</div>
	</main>
	<footer>
		<!-- place footer here -->
	</footer>
	<!-- Bootstrap JavaScript Libraries -->
	<script
		src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>

	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
		integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
		crossorigin="anonymous">
	</script>
	<style>
		.nav-link.active {
			background-color: white !important;
		}

		.sidebar {
			background-color: #0154a2 !important;
		}

		.navbar {
			background-color: #0154a2 !important;
		}
	</style>
</body>

</html>