<x-layout title="Clínica Thalytta Santos">
	<style>
		.header-section {
			margin-top: 50px;
		}

		.header-title {
			font-weight: bold;
			font-size: 2.5rem;
		}

		.subheader-title {
			font-size: 2rem;
			font-weight: bold;
		}

		.highlight-text {
			text-decoration: underline;
			text-decoration-color: #00aaff;
		}

		.description-text {
			font-size: 1.1rem;
			color: #606060;
		}

		.btn-custom {
			background-color: #007bff;
			color: white;
			border-radius: 25px;
			padding: 10px 20px;
			text-transform: uppercase;
			font-weight: bold;
		}

		.image-section {
			position: relative;
		}

		.circle-decoration {
			position: absolute;
			top: 10%;
			right: -15%;
			border: 2px dashed #00aaff;
			border-radius: 50%;
			height: 300px;
			width: 300px;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.circle-icon {
			height: 60px;
			width: 60px;
		}

		@media (max-width: 768px) {
			.circle-decoration {
				height: 200px;
				width: 200px;
				top: 0;
				right: 0;
			}

			.circle-icon {
				height: 40px;
				width: 40px;
			}
		}
	</style>
	<div class="container header-section">
		<div class="row align-items-center">
			<!-- Texto da seção -->
			<div class="col-md-6 text-left">
				<h1 class="header-title">Clínica Thalytta Santos –</h1>
				<h2 class="subheader-title">Clínica Odontológica</h2>
				<p class="description-text mt-3">
					Na <span class="highlight-text">Clínica Odontológica Thalytta Santos</span>, somos especializados em oferecer tratamentos odontológicos de alta qualidade, sempre com um atendimento acolhedor e personalizado. Nossa missão é cuidar da saúde bucal de nossos pacientes, proporcionando-lhes sorrisos saudáveis e confiantes.
				</p>
				<a href="#" class="btn btn-custom mt-4">Marcar uma consulta</a>
			</div>
			<!-- Imagem com círculo decorativo -->
			<div class="col-md-6 image-section text-center">
				<img src="thallyta.png" alt="Equipes clínica" class="img-fluid">

			</div>
		</div>
	</div>
	<style>
		.service-card {
			background-color: #f5faff;
			padding: 20px;
			border-radius: 10px;
			text-align: center;
			margin-bottom: 20px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		}

		.service-icon {
			width: 50px;
			height: 50px;
			margin-bottom: 10px;
		}

		.section-title {
			font-weight: bold;
			margin-bottom: 30px;
		}

		.highlight {
			color: #5bc0de;
		}
	</style>
	<div class="container mt-5">
		<h1 class="section-title text-center">Nossos <span class="highlight">Serviços</span></h1>
		<div class="row">
			<!-- Serviço 1 -->
			<div class="col-md-4">
				<div class="service-card">
					<img src="icone1.png" alt="Ícone Tratamento" class="service-icon">
					<h5>Tratamento De Canal Dentário</h5>
					<p>Procedimento essencial para preservar dentes que foram severamente afetados por cáries profundas, traumas ou infecções.</p>
				</div>
			</div>
			<!-- Serviço 2 -->
			<div class="col-md-4">
				<div class="service-card">
					<img src="icone2.png" alt="Ícone Tratamento" class="service-icon">
					<h5>Limpeza Dental</h5>
					<p>Procedimento preventivo realizado para remover placas bacterianas, tártaros e manchas dos dentes, ajudando a prevenir cáries e doenças gengivais.</p>
				</div>
			</div>
			<!-- Serviço 3 -->
			<div class="col-md-4">
				<div class="service-card">
					<img src="icone3.png" alt="Ícone Tratamento" class="service-icon">
					<h5>Tratamento de Cáries</h5>
					<p>Processo de remoção do tecido dentário danificado por cáries, seguido do preenchimento do espaço com materiais restauradores para devolver a funcionalidade do dente.</p>
				</div>
			</div>
			<!-- Serviço 4 -->
			<div class="col-md-4">
				<div class="service-card">
					<img src="icone4.png" alt="Ícone Tratamento" class="service-icon">
					<h5>Clareamento Dental</h5>
					<p>Tratamento estético que utiliza agentes químicos para clarear a coloração dos dentes, proporcionando um sorriso mais branco e brilhante.</p>
				</div>
			</div>
			<!-- Serviço 5 -->
			<div class="col-md-4">
				<div class="service-card">
					<img src="icone5.png" alt="Ícone Aparelhos" class="service-icon">
					<h5>Aparelhos Ortodônticos</h5>
					<p>Dispositivos utilizados para corrigir desalinhamentos dentários e problemas de mordida, melhorando a funcionalidade e a estética do sorriso.</p>
				</div>
			</div>
			<!-- Serviço 6 -->
			<div class="col-md-4">
				<div class="service-card">
					<img src="icone6.png" alt="Ícone Implante" class="service-icon">
					<h5>Extração Dentária</h5>
					<p>Procedimento cirúrgico para remover dentes comprometidos, seja por cáries extensas, fraturas ou falta de espaço, como no caso dos sisos.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container my-5">
		<!-- Título -->
		<h1 class="section-title text-center">Comentários dos <span class="highlight">Pacientes</span></h1>

		<!-- Cards -->
		<div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
			<!-- Card 1 -->
			<div class="col">
				<div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
					<div class="card-body">
						<h5 class="card-title text-uppercase fw-bold">Jorge Amado</h5>
						<p class="card-text text-break">
							Fiquei impressionado com a qualidade do atendimento! O consultório é super limpo e moderno, e o dentista foi muito paciente ao explicar cada etapa do tratamento. Eu estava nervoso com o procedimento, mas tudo foi feito de forma tão tranquila que até esqueci do medo. Definitivamente recomendo!
						</p>
					</div>
				</div>
			</div>

			<!-- Card 2 -->
			<div class="col">
				<div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
					<div class="card-body">
						<h5 class="card-title text-uppercase fw-bold">Mariana Lima</h5>
						<p class="card-text text-break">
							Fiz uma restauração e fiquei muito satisfeito com o resultado. Ele foi super detalhista e garantiu que eu saísse do consultório sem dor. Além disso, o horário foi respeitado, e o atendimento foi rápido e eficiente. Excelente trabalho!
						</p>
					</div>
				</div>
			</div>

			<!-- Card 3 -->
			<div class="col">
				<div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
					<div class="card-body">
						<h5 class="card-title text-uppercase fw-bold">Roberto Carlos</h5>
						<p class="card-text">
							Se você procura um dentista de confiança, pode marcar aqui sem medo! Fiz extração do siso e o procedimento foi tão rápido e indolor que nem acreditei. Estou me recuperando super bem, sem complicações.
						</p>
					</div>
				</div>
			</div>

			<!-- Card 4 -->
			<div class="col">
				<div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
					<div class="card-body">
						<h5 class="card-title text-uppercase fw-bold">Suzane Almeida</h5>
						<p class="card-text">
							Consultório bem localizado, ambiente confortável e uma equipe extremamente educada. Fiz manutenção do aparelho e fui muito bem atendido. Eles explicam tudo de forma clara e tiram todas as dúvidas. Recomendo!
						</p>
					</div>
				</div>
			</div>

			<!-- Card 5 -->
			<div class="col">
				<div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
					<div class="card-body">
						<h5 class="card-title text-uppercase fw-bold">Antonio Mario</h5>
						<p class="card-text">
							Melhor experiência com um dentista até agora! Fiz uma limpeza e um clareamento dental, e o resultado foi incrível. O profissional é muito cuidadoso, e toda a equipe é muito simpática. Com certeza voltarei para outros procedimentos.
						</p>
					</div>
				</div>
			</div>

			<!-- Card 6 -->
			<div class="col">
				<div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
					<div class="card-body">
						<h5 class="card-title text-uppercase fw-bold">Genario Alquime</h5>
						<p class="card-text">
						Nunca imaginei que uma consulta ao dentista poderia ser tão tranquila. A equipe é muito profissional, e o ambiente é acolhedor. Fiz uma extração e mal senti desconforto. Com certeza virei cliente fiel!
						</p>
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
		<style>
			.team-section {
				text-align: center;
				margin: 50px 0;
			}

			.team-section h2 {
				font-weight: bold;
			}

			.team-section .highlight {
				color: #5bc0de;
			}

			.team-card {
				background-color: #f5faff;
				border-radius: 10px;
				padding: 10px;
				text-align: center;
				box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
			}

			.team-card img {
				width: 100%;
				border-radius: 10px;
			}

			.team-card h5 {
				margin: 10px 0 5px;
				font-weight: bold;
			}

			.team-card p {
				margin: 0;
				color: #666;
			}
		</style>
		<div class="container mt-5">
			<h2 class="section-title text-center">Conheça Nossa <span class="highlight">Equipe de Especialistas</span></h2>
			<div class="row mt-4">
				<!-- Membro 1 -->
				<div class="col-md-3 col-sm-6 mb-4-4">
					<div class="team-card">
					<img src="{{ asset('css/home/equipe/Depositphotos_13042582_m-2015.jpg-1-700x467.jpeg') }}" alt="Nome do Profissional">
					<h5>Dr Jaime Cabral </h5>
						<p>Ortodontista</p>
					</div>
				</div>
				<!-- Membro 2 -->
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="team-card">
					<img src="{{ asset('css/home/equipe/como-ser-um-dentista-de-sucesso.png') }}" alt="Nome do Profissional">
						<h5>Dr'a Thalyta Santos</h5>
						<p>Ortodontista</p>
					</div>
				</div>
				<!-- Membro 3 -->
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="team-card">
					<img src="{{ asset('css/home/equipe/Ser-proativo-na-profissao-418x400.jpg') }}" alt="Nome do Profissional">
						<h5>Dr Edmilson Zacarias</h5>
						<p>Dentista Cirurgião</p>
					</div>
				</div>
				<!-- Membro 4 -->
				<div class="col-md-3 col-sm-6 mb-4">
					<div class="team-card">
					<img src="{{ asset('css/home/equipe/Especial-Dia-da-Mulher-As-mulheres-na-odontologia.jpg') }}" alt="Nome do Profissional">
						<h5>Dr'a Marina</h5>
						<p>Ortondontista Pediatra</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container col-10 mt-3">
			<div class="row">
				<h1 class="section-title text-center">Nossa <span class="highlight">Localização</span></h1>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d987.4613386226262!2d-35.29517233044305!3d-8.117223699494495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7aa54af77e61a65%3A0x285e2e6c10c2e556!2sDentistas%20Cl%C3%ADnica%20Thalyta%20Santos%20-%20Odontologia%20especializada!5e0!3m2!1spt-BR!2sbr!4v1731269725069!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
</x-layout>