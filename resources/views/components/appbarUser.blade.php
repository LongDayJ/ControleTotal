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
	<div vw class="enabled">
		<div vw-access-button class="active"></div>
		<div vw-plugin-wrapper>
			<div class="vw-plugin-top-wrapper"></div>
		</div>
	</div>

	<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
	<script>
		new window.VLibras.Widget('https://vlibras.gov.br/app');
	</script>
	<header>
		<nav
			class="navbar navbar-expand-sm navbar-dark bg-light">
			<div class="col-12 container-fluid d-flex justify-content-between">
				<div>
					<p class="navbar-brand align-items-center">Controle Total</p>
				</div>
				<div class="size-controller mb-3">
				<div class="d-flex justify-content-center">
					<button id="decreaseFont" class="btn btn-light mx-1" aria-label="Diminuir tamanho da fonte">A-</button>
					<button id="resetFont" class="btn btn-light mx-1" aria-label="Redefinir tamanho da fonte">A</button>
					<button id="increaseFont" class="btn btn-light mx-1" aria-label="Aumentar tamanho da fonte">A+</button>
				</div>
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
								<div class="dropdown">
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
		crossorigin="anonymous"></script>
	<style>
		.navbar {
			background-color: #0154a2 !important;
		}
	</style>
		<script>
		document.addEventListener('DOMContentLoaded', () => {
			const decreaseButton = document.getElementById('decreaseFont');
			const resetButton = document.getElementById('resetFont');
			const increaseButton = document.getElementById('increaseFont');
			// Recuperar o tamanho de fonte da sessão, se existir
			let fontSize = localStorage.getItem('fontSize') ? parseInt(localStorage.getItem('fontSize')) : 16; // 16px como padrão
			// Função para atualizar a fonte
			const updateFontSize = (newSize) => {
				fontSize = newSize;
				// Alterar o tamanho da fonte global
				document.documentElement.style.fontSize = `${fontSize}px`;
				// Salvar a preferência no localStorage
				localStorage.setItem('fontSize', fontSize);
			};
			// Inicializa a fonte com o tamanho salvo na sessão (se houver)
			updateFontSize(fontSize);
			// Eventos dos botões
			decreaseButton.addEventListener('click', () => {
				if (fontSize > 10) updateFontSize(fontSize - 1); // Limite mínimo
			});
			resetButton.addEventListener('click', () => {
				updateFontSize(16); // Resetar para o padrão
			});
			increaseButton.addEventListener('click', () => {
				if (fontSize < 24) updateFontSize(fontSize + 1); // Limite máximo
			});
		});
	</script>
</body>

</html>