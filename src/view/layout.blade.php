<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.css">
    <!-- Adicione aqui os seus estilos personalizados, se necessário -->
</head>
<body>

    <header>
        <div class="p-3 text-white content" style="background-color: #000000;">

            <nav class="navbar navbar-light navbar-expand">


                <a class="navbar-brand text-white" href="./">Início</a>

                <div class="collapse navbar-collapse" id="navbarNav">
                            <a class="navbar-brand text-white" href="./about">Info</a>
                </div>
                <div class="ml-auto">
                
                    @if (isset($_SESSION['authenticated']))
                    <a href="./logout" class="btn btn-outline-danger">Sair</a>


                    <a href="./profile" class="btn btn-outline-light">Perfil</a>
                        
                        
                    @else
                    <a href="./login" class="btn btn-outline-light">Login</a>


                    <a href="./register" class="btn btn-outline-light">Registro</a>
                        
                    @endif
                
                </div>
            </nav>
            
        </div>
    </header>
  
    <main class="container mt-2">
        <!-- Conteúdo dinâmico -->
        @yield('body')
    </main>

<footer class="d-flex align-items-center justify-content-center" style="height: 35vh; background-color: #000000bf">
    <div class="container">
        <a href="">
            github;
        </a>
        <a href="">
            IFPE Campus Igarassu;
        </a>
        <p>Rodovia BR-101 Norte, Km 29, Engenho Ubu, Igarassu Pernambuco.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.js"></script>

@if (isset($_SESSION['feedback']))

    @switch($_SESSION['feedback'])
        @case('exists')
            
            <script>
                Swal.fire({
                    title: 'Usuário ou E-mail já cadastrados',
                    text: 'Você foi redirecionado para o Login.',
                    icon: 'warning'
                })
            </script>
            @php
                unset($_SESSION['feedback']);
            @endphp      

        @break

        @case('unexpected')
        
            <script>
                Swal.fire({
                    title: 'Ops',
                    text: 'Algo inesperado aconteceu, tente novamente.',
                    icon: 'question'
                })
            </script>
            @php
                unset($_SESSION['feedback']);
            @endphp    

        @break

        @case('created')
            <script>
                Swal.fire({
                    tittle: 'Sucesso!',
                    text: 'Sua conta foi criada.',
                    icon: 'sucess'
                })
            </script>
        @break
        @default
        
    @endswitch
@endif





</body>
</html> 