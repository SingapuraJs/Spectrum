<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sua Página</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Adicione aqui os seus estilos personalizados, se necessário -->
</head>
<body>

    <header>
        <div class="p-3 text-white content" style="background-color: #000000;">

            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand text-white" href="./" >Início</a>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="./about">Info</a>
                        </li>
                    </ul>
                </div>


                    <div class="ml-auto">
                        <a href="./login" class="btn btn-outline-light">Login</a>
                        <a href="./register" class="btn btn-outline-light">Registro</a>
                    </div>

            </nav>
        </div>
    </header>
  
    <main class="container mt-2">
        <!-- Conteúdo dinâmico -->
        @yield('body')
    </main>

<footer class="bg-success" style="height: 35vh">
    <div class="container">aaaa
    </div>
  </footer>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>


</body>
</html> 