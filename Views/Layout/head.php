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
        <div class="p-3 text-white content" style="background-color: #343a40;">

            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand text-white" href="./index.php" >Início</a>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="?pagina=info">Info</a>
                        </li>
                    </ul>
                </div>

                <?php if (!isset($_SESSION['logged']) || !($_SESSION['logged'])) : ?>
                    <div class="ml-auto">
                        <a href="?pagina=login" class="btn btn-outline-light">Login</a>
                        <a href="?pagina=register" class="btn btn-outline-light">Registro</a>
                    </div>
                <?php else : ?>
                    <div class="ml-auto">
                        <a href="Views/User/logout.php" class="btn btn-outline-danger">Logout</a>
                        <a href="Views/User/profile.php" class="btn btn-outline-info">Meu perfil</a>
                    </div>
                <?php endif; ?>

            </nav>
        </div>
    </header>
  

