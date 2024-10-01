<x-layout title="Agendamento">
	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap JS and dependencies -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<div id="carouselExampleIndicators" class="carousel slide carousel-fade align-content-center align-items-center text-center justify-content-center" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="https://via.placeholder.com/800x225" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="https://via.placeholder.com/800x226" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="https://via.placeholder.com/800x227" alt="Third slide">
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

	<div class="container mt-4">
		<div class="card text-center">
			<div class="card-body">
				<h5 class="card-title">Entre em contato conosco pelo WhatsApp</h5>
				<p class="card-text">Clique no botão abaixo para iniciar uma conversa no WhatsApp.</p>
				<a href="https://wa.me/+5581984088317" class="btn btn-success" target="_blank">
					<i class="fab fa-whatsapp"></i> Conversar no WhatsApp
				</a>
			</div>
		</div>
	</div>
</x-layout>