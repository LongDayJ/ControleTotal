<x-layout title="Home">
	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap JS and dependencies -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<div class="container col-10">
		<div id="carouselExampleIndicators" class="carousel slide carousel-fade align-content-center align-items-center text-center justify-content-center" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" style="max-height: 60vh;" src="{{ asset('banner1.jpeg') }}" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="https://via.placeholder.com/500x156" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="https://via.placeholder.com/500x157" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<div class="container col-10 mt-4">
		<div class="row">
			<div class="col-12 text-center">
				<h1>Reviews dos Pacientes</h1>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Paciente 1</h5>
						<p class="card-text">"Ótimo atendimento, recomendo a todos!"</p>
						<p class="card-text"><small class="text-muted">- João Silva</small></p>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Paciente 2</h5>
						<p class="card-text">"Equipe muito atenciosa e profissional."</p>
						<p class="card-text"><small class="text-muted">- Maria Oliveira</small></p>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Paciente 3</h5>
						<p class="card-text">"Ambiente acolhedor e tratamento eficaz."</p>
						<p class="card-text"><small class="text-muted">- Carlos Pereira</small></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container col-6 mt-4">
		<div class="card text-center">
			<div class="card-body">
				<h5 class="card-title">Entre em contato conosco pelo WhatsApp</h5>
				<p class="card-text">Clique no botão abaixo para iniciar uma conversa no WhatsApp.</p>
				<a href="https://wa.me/+5581984088317" class="btn btn-success" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
						<path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
					</svg> Conversar no WhatsApp
				</a>
			</div>
		</div>
	</div>

	<div class="container col-10">
		<div class="row">
			<div class="col-12 mt-4 text-center">
				<h1>Equipe</h1>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-3">
				<x-team.card />
			</div>
			<div class="col-3">
				<x-team.card />
			</div>
			<div class="col-3">
				<x-team.card />
			</div>
			<div class="col-3">
				<x-team.card />
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-3">
				<x-team.card />
			</div>
			<div class="col-3">
				<x-team.card />
			</div>
			<div class="col-3">
				<x-team.card />
			</div>
			<div class="col-3">
				<x-team.card />
			</div>
		</div>
	</div>

	<div class="container col-10 mt-3">
		<div class="row">
		<div class="col-12 mt-4 text-center">
				<h1>Localização</h1>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d987.4613386226262!2d-35.29517233044305!3d-8.117223699494495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7aa54af77e61a65%3A0x285e2e6c10c2e556!2sDentistas%20Cl%C3%ADnica%20Thalyta%20Santos%20-%20Odontologia%20especializada!5e0!3m2!1spt-BR!2sbr!4v1731269725069!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>

	</div>


</x-layout>