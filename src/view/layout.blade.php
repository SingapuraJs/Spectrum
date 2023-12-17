<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
    <script src="/Spectrum/node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="/Spectrum/node_modules/sweetalert2/dist/sweetalert2.js"></script>
    <link rel="stylesheet" href="/Spectrum/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Spectrum/node_modules/sweetalert2/dist/sweetalert2.css">
    <link rel="stylesheet" href="/Spectrum/node_modules/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>


    <header>
        <div class="p-3 text-white content" style="background-color: #000000;">

            <nav class="navbar navbar-light navbar-expand">



                <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="navbar-brand text-white" href="/Spectrum/home"><i class="bi bi-house-fill"></i> Início</a>
                </div>
                <div class="ml-auto">
                
                    @if (isset($_SESSION['authenticated']))
                        <a href="/Spectrum/logout" class="btn btn-outline-danger"><i class="bi bi-box-arrow-left"></i> Sair</a>
                        <a href="/Spectrum/profile/{{ $_SESSION['user']['name'] }}" class="btn btn-outline-light">Perfil <i class="bi bi-person-bounding-box"></i></a>
                        
                        
                    @else
                    <a href="/Spectrum/login" class="btn btn-outline-light"><i class="bi bi-person-circle"></i> Login</a>


                    <a href="/Spectrum/register" class="btn btn-outline-light"><i class="bi bi-person-plus"></i> Registro</a>
                        
                    @endif
                
                </div>
            </nav>
            
        </div>
    </header>
    
  
        <!-- Conteúdo dinâmico -->
        @yield('body')

<footer class="d-flex align-items-center justify-content-center" style="height: 35vh; background-color:#000000">
    <div class="container">
        <div class="row row-cols-3">
            <a class="text-white col-12" href="https://github.com/SingapuraJs/Spectrum/">
                
                <span><i class="bi bi-github"></i> GitHub</span>
            </a>
            
            <a class="text-white col-12" href="https://www.instagram.com/ifpecampusigarassu/">
                
                <span><i class="bi bi-instagram"></i> Instagram</span>
            </a>
            <br>
            <br>
            <span class="text-white col-12"><i class="bi bi-geo"></i> Rodovia BR-101 Norte, Km 29, Engenho Ubu, Igarassu Pernambuco.</span>
       

        </div>
    </div>
</footer>


<script async src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script async src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script async src="/Spectrum/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>


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
            @php
              unset($_SESSION['feedback']);
            @endphp    
        @break

        @case('incorrect')
            <script>
                Swal.fire({
                    tittle: 'Erro.',
                    text: 'Login ou senha incorretos.',
                    icon: 'error'
                })
            </script>
            @php
                unset($_SESSION['feedback']);
            @endphp    
        @break

        @case('expired')
            <script>
                Swal.fire({
                    tittle: 'Erro.',
                    text: 'Sessão expirada.',
                    icon: 'error'
                })
            </script>
            @php
                unset($_SESSION['feedback']);
            @endphp    

            @case('nofile')
            <script>
                Swal.fire({
                    tittle: 'Erro.',
                    text: 'Imagem não inserida !',
                    icon: 'error'
                })
            </script>
            @php
                unset($_SESSION['feedback']);
            @endphp    

        @default
        
    @endswitch
@endif

</body>
</html> 