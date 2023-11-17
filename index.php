<?php 

if(!isset($_SESSION)){
     session_start();
}


// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
include 'head.php'; // cabeçalho da página
// --------------------------------------------------------------------------


/*----------ESTRUTURA PARA MUDAR A PÁGINA----------*/ 

if(isset($_GET['pagina'])){

    $pagina = $_GET['pagina'];

}else{

    $pagina = 'home';

};


if ($pagina == 'info'){

     include 'views/info.php'; // página de informações

} elseif ($pagina == 'login'){

     include 'views/login.php'; // página de login

} elseif ($pagina == 'cadastro'){

     include 'views/register.php'; // página de cadastro

} 


else{
     include 'views/home.php'; // página home(inicial)

};

// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------

include 'footer.php'; //rodapé da página




