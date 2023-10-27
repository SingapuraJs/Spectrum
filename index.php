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

     include 'paginas/info.php'; // página de informações

} elseif ($pagina == 'login'){

     include 'paginas/login.php'; // página de login

} elseif ($pagina == 'cadastro'){

     include 'paginas/cadastro.php'; // página de cadastro

} 


else{
     include 'paginas/home.php'; // página home(inicial)

};

// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------

include 'footer.php'; //rodapé da página




