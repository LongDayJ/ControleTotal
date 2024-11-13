<x-appBarAdmin title="Dashboard">
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-4 mb-4">
				<div class="card text-center">
					<div class="card-body">
						<h3 class="card-title">{{ $consultasDoDia }}</h3>
						<p class="card-text">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar m-2" viewBox="0 0 16 16">
								<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
							</svg>
							Consultas do dia
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card text-center">
					<div class="card-body">
						<h3 class="card-title">{{ $produtosQuantidadeMinima }}</h3>
						<p class="card-text">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-boxes m-2" viewBox="0 0 16 16">
								<path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z" />
							</svg>
							Produtos com Quantidade Mínima
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card text-center">
					<div class="card-body">
						<h3 class="card-title">{{ $procedimentosCadastrados }}</h3>
						<p class="card-text">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clipboard-fill m-2" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2" />
							</svg>
							Procedimentos Cadastrados
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card text-center">
					<div class="card-body">
						<h3 class="card-title">{{ $pacientesCadastrados }}</h3>
						<p class="card-text">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-people-fill m-2" viewBox="0 0 16 16">
								<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
							</svg>
							Pacientes Cadastrados
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card text-center">
					<div class="card-body">
						<h3 class="card-title">{{ $dentistasCadastrados }}</h3>
						<p class="card-text">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-clipboard2-pulse-fill m-2" viewBox="0 0 16 16">
								<path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
								<path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z" />
							</svg>
							Dentistas Cadastrados
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<div class="card text-center">
					<div class="card-body">
						<h5 class="card-title">Card Genérico 4</h5>
						<p class="card-text">Informações adicionais aqui.</p>
					</div>
				</div>
			</div>
			<!-- <div id="paleta-original" style="background-color: #0154a2; width: 100px; height: 100px;"></div> -->
			<!-- <div id="paleta-protanopia" style="background-color: #0154a2; width: 100px; height: 100px;"></div>
			<div id="paleta-deuteranopia" style="background-color: #0154a2; width: 100px; height: 100px;"></div>
			<div id="paleta-tritanopia" style="background-color: #0154a2; width: 100px; height: 100px;"></div> -->
		</div>
		<!-- <div class="row mt-4">
			<div class="col-md-12 text-center">
				<button id="trocar-paleta" class="btn btn-primary">Trocar Paleta de Cores</button>
			</div>
		</div> -->
	</div>
	<!-- <script>
		// Inicializar variável de controle do filtro
		let filtroAtual = '';

		// Função para alternar a paleta de cores
		function trocarPaleta() {
			// Referência a todos os elementos de cor e cards
			const elementos = document.querySelectorAll('#paleta-original, #paleta-protanopia, #paleta-deuteranopia, #paleta-tritanopia, .card');

			// Remover classes anteriores
			elementos.forEach(el => el.classList.remove('protanopia', 'deuteranopia', 'tritanopia'));

			// Alternar para o próximo filtro
			if (filtroAtual === '') {
				filtroAtual = 'protanopia';
			} else if (filtroAtual === 'protanopia') {
				filtroAtual = 'deuteranopia';
			} else if (filtroAtual === 'deuteranopia') {
				filtroAtual = 'tritanopia';
			} else {
				filtroAtual = '';
			}

			// Aplicar o filtro atual
			if (filtroAtual) {
				elementos.forEach(el => el.classList.add(filtroAtual));
			}
		}

		// Adicionar evento de clique ao botão
		document.getElementById('trocar-paleta').addEventListener('click', trocarPaleta);
	</script> -->
	<!-- <style>
		/* Filtros de daltonismo (aplicados de forma aproximada) */
		.protanopia {
			filter: brightness(0.9) contrast(1.1) sepia(1) hue-rotate(-30deg) saturate(0.7);
		}

		.deuteranopia {
			filter: brightness(0.9) contrast(1.1) sepia(1) hue-rotate(-30deg) saturate(0.6);
		}

		.tritanopia {
			filter: brightness(0.95) contrast(1.1) sepia(1) hue-rotate(100deg) saturate(0.7);
		}
	</style> -->
</x-appBarAdmin>