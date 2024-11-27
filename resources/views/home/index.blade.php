<x-layout title="Home">
	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap JS and dependencies -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Thalytta Santos</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
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
</head>
<body>
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
	<html>
<head>
    <title>Nossos Serviços</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
</head>
<body>
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
                    <h5>Tratamento De Canal Dentário</h5>
                    <p>Procedimento essencial para preservar dentes que foram severamente afetados por cáries profundas, traumas ou infecções.</p>
                </div>
            </div>
            <!-- Serviço 3 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="icone3.png" alt="Ícone Tratamento" class="service-icon">
                    <h5>Tratamento De Canal Dentário</h5>
                    <p>Procedimento essencial para preservar dentes que foram severamente afetados por cáries profundas, traumas ou infecções.</p>
                </div>
            </div>
            <!-- Serviço 4 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="icone4.png" alt="Ícone Tratamento" class="service-icon">
                    <h5>Tratamento De Canal Dentário</h5>
                    <p>Procedimento essencial para preservar dentes que foram severamente afetados por cáries profundas, traumas ou infecções.</p>
                </div>
            </div>
            <!-- Serviço 5 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="icone5.png" alt="Ícone Aparelhos" class="service-icon">
                    <h5>Aparelhos Dentários</h5>
                    <p>Equipe especializada para corrigindo problemas de alinhamento e mordida que impactam tanto a estética quanto a funcionalidade dos dentes.</p>
                </div>
            </div>
            <!-- Serviço 6 -->
            <div class="col-md-4">
                <div class="service-card">
                    <img src="icone6.png" alt="Ícone Implante" class="service-icon">
                    <h5>Implante Dentário</h5>
                    <p>Solução moderna e eficaz para a reposição de dentes perdidos, proporcionando estética, funcionalidade e conforto semelhantes aos de um dente natural.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
	
</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews Pacientes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <!-- Título -->
        <h1 class="section-title text-center">Reviews <span class="highlight">Pacientes</span></h1>

        <!-- Cards -->
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
            <!-- Card 1 -->
            <div class="col">
                <div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase fw-bold">PACIENTE NOME</h5>
                        <p class="card-text"><strong>Elogio</strong></p>
                        <p class="card-text">
                            ========================== <br>
                            ========================== <br>
                            ========================== <br>
                            ===
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col">
                <div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase fw-bold">PACIENTE NOME</h5>
                        <p class="card-text"><strong>Elogio</strong></p>
                        <p class="card-text">
                            ========================== <br>
                            ========================== <br>
                            ========================== <br>
                            ===
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col">
                <div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase fw-bold">PACIENTE NOME</h5>
                        <p class="card-text"><strong>Elogio</strong></p>
                        <p class="card-text">
                            ========================== <br>
                            ========================== <br>
                            ========================== <br>
                            ===
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col">
                <div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase fw-bold">PACIENTE NOME</h5>
                        <p class="card-text"><strong>Elogio</strong></p>
                        <p class="card-text">
                            ========================== <br>
                            ========================== <br>
                            ========================== <br>
                            ===
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col">
                <div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase fw-bold">PACIENTE NOME</h5>
                        <p class="card-text"><strong>Elogio</strong></p>
                        <p class="card-text">
                            ========================== <br>
                            ========================== <br>
                            ========================== <br>
                            ===
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col">
                <div class="card border-0 shadow-sm" style="background-color: #e9f8ff;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase fw-bold">PACIENTE NOME</h5>
                        <p class="card-text"><strong>Elogio</strong></p>
                        <p class="card-text">
                            ========================== <br>
                            ========================== <br>
                            ========================== <br>
                            ===
                        </p>
                    </div>
                </div>
            </div>
        </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

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

	
<head>
    <title>Equipe Médica</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
</head>
<body>
    <div class="container mt-5">
        <h2 class="section-title text-center">Conheça Nossa <span class="highlight">Equipe Médica</span></h2>
        <div class="row mt-4">
            <!-- Membro 1 -->
            <div class="col-md-3 col-sm-6 mb-4-4">	
                <div class="team-card">
                    <img src="profile1.png" alt="Médico 1">
                    <h5>Doutor Kratos Atreus	</h5>
                    <p>Ortodontista</p>
                </div>
            </div>
            <!-- Membro 2 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="team-card">
                    <img src="profile2.png" alt="Médico 2">
                    <h5>Doutor Jaime</h5>
                    <p>Odontopediatra</p>
                </div>
            </div>
            <!-- Membro 3 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="team-card">
                    <img src="profile3.png" alt="Médico 3">
                    <h5>Doutor Joao</h5>
                    <p>Implantodentista</p>
                </div>
            </div>
            <!-- Membro 4 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="team-card">
                    <img src="profile4.png" alt="Médico 4">
                    <h5>Doutor Marquinhos</h5>
                    <p>Odontologia estética</p>
                </div>
            </div>
            <!-- Membro 5 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="team-card">
                    <img src="profile5.png" alt="Médico 5">
                    <h5>Doutora Lara</h5>
                    <p>Cirurgia e Traumatologia Buco-Maxilo-Facial</p>
                </div>
            </div>
            <!-- Membro 6 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="team-card">
                    <img src="profile6.png" alt="Médico 6">
                    <h5>Kratos</h5>
                    <p>Médico A</p>
                </div>
            </div>
            <!-- Membro 7 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="team-card">
                    <img src="profile7.png" alt="Médico 7">
                    <h5>Kratos</h5>
                    <p>Médico A</p>
                </div>
            </div>
            <!-- Membro 8 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="team-card">
                    <img src="profile8.png" alt="Médico 8">
                    <h5>Kratos</h5>
                    <p>Médico A</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


	<div class="container col-10 mt-3">
		<div class="row">
		<h1 class="section-title text-center">Nossa <span class="highlight">Serviços</span></h1>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d987.4613386226262!2d-35.29517233044305!3d-8.117223699494495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7aa54af77e61a65%3A0x285e2e6c10c2e556!2sDentistas%20Cl%C3%ADnica%20Thalyta%20Santos%20-%20Odontologia%20especializada!5e0!3m2!1spt-BR!2sbr!4v1731269725069!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>

	</div>


</x-layout>