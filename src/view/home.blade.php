@extends('layout')

@section('title', 'Spectrum')

@section('body')

    @php
    //     print_r($_SESSION);
    //     var_dump($_SESSION['user']['pic']);
    @endphp

        <div class="content bg-primary d-flex align-items-center justify-content-center" style="height: fit-content; background-image: linear-gradient(180deg, black, transparent);">
            <!-- aq vem o card de boas vindas-->
            <div class="bg-light content m-2" style="height: fit-content%; width: 90%; border-radius: 0px 25px 0px 25px">

                

                @if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] )
                @php
                    
                    $fotoPerfil = $_SESSION['user']['pic'] != null ? $_SESSION['user']['pic'] : 'person.svg';
                    $nome = $_SESSION['user']['name'] != null ? $_SESSION['user']['name'] : null
                @endphp


                <div class="container p-5">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-5 ">
                            <img src="/Spectrum/archives/users/{{$fotoPerfil}}" class="img-fluid border rounded-circle w-50" alt="Sua Imagem">
                        </div>
                        <div class="col-md-7" style="width: fit-content">
                            <h1 class="m-2 mx-auto">
                                <span class="d-none d-md-inline " style="font-size: 84px">Olá, {{ucfirst($_SESSION['user']['name'] . '!')}}</span>
                                <span class="d-md-none" style="font-size: 36px">Olá, {{ucfirst($_SESSION['user']['name'] . '!')}}</span>
                            </h1>
                            <a class=" btn btn-dark text-white mt-5 float-end" href="/Spectrum/profile/{{ $_SESSION['user']['name'] }}">Acessar perfil</a>

                        </div>
                        
                    </div>
                </div>
                    
                @else
                    
                    <h1 class="text-center pt-4">
                        <span class="d-none d-md-inline" style="font-size: 84px">Spectrum</span>
                        <span class="d-md-none" style="font-size: 50px">Spectrum</span>
                    </h1>

                    <div class="row pt-5">
                        <div class="col w-50 p-2 border-dark border-end d-flex flex-column justify-content-center align-items-center" style="height: 65%">
                            <h4 class="text-center">Ainda não é cadastrado?</h4>
                            
                            <div style="height: 10vh;"></div>

                            <a class="text-center btn btn-dark text-white link-dark" href="./register">Cadastre-se</a>

                            <div style="height: 5vh;"></div>

                        </div>
                        <div class="col w-50 p-2 border-dark  d-flex flex-column justify-content-center align-items-center" style="height: 65%">
                            <h4 class="text-center">Já possui cadastro?</h4>

                            <div style="height: 10vh;"></div>

                            <a class="text-center  btn btn-dark text-white link-dark" href="./login">Entrar</a>
                        </div>
                    </div>
                
                @endif

                

            </div>

        </div>

        <div class="container p-5 text-center" style="height: 35vh">
            <article>
                <h2 class="mb-4">O que é Spectrum?</h2>
                <p class="lead">Spectrum é uma galeria virtual, projetada para pessoas que buscam um lugar para organizar e publicar suas fotos de maneira simples e intuitiva.</p>
            </article>
        </div>
        



@endsection

