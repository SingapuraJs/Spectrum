<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

session_start();

use Controller\BaseController;

Flight::route('/', function () {
     $controller = new BaseController();
     echo $controller->blade->render('home');
 });
 
require __DIR__ . '/routes/UserRoutes.php';

 
 Flight::start();

/*
if(!isset($_SESSION)){
     session_start();
     session_regenerate_id(true);
}
*/


// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// include 'Views/Layout/head.php'; // cabeçalho da página
// --------------------------------------------------------------------------


/*----------ESTRUTURA PARA MUDAR A PÁGINA----------*/ 
/*
if(isset($_GET['pagina'])){
    $pagina = $_GET['pagina'];
}else{
    $pagina = 'home';
};

if ($pagina == 'info') {
     include 'Views/Home/info.php'; // página de informações
} elseif ($pagina == 'login') {
     include 'Views/Home/login.php'; // página de login
} elseif ($pagina == 'register') {
     include 'Views/Home/register.php'; // página de cadastro
} elseif ($pagina == 'profile') {
     include 'Views/User/profile.php'; // página de cadastro
} else {
     include 'Views/Home/home.php'; // página home(inicial)
};

// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------

include 'Views/Layout/footer.php'; // rodapé

*/

?>