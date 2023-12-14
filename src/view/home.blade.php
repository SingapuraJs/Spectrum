@extends('layout')

@section('title', 'Spectrum')

@section('body')

    @php
        // print_r($_SESSION);
    @endphp

        <div class="content bg-primary d-flex align-items-center justify-content-center" style="height: fit-content; background-image: linear-gradient(180deg, black, transparent);">
            <!-- aq vem o card de boas vindas-->
            <div class="bg-light content m-2" style="height: fit-content%; width: 90%; border-radius: 0px 25px 0px 25px">

                

                @if (isset($_SESSION['authenticated']))

                <div class="container p-5">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-5 ">
                            <img src="/WebSiteOliver/archives/users/{{$_SESSION['user']['pic']}}" class="img-fluid border rounded-circle w-50" alt="Sua Imagem">
                        </div>
                        <div class="col-md-7">
                            <h1 class="m-2 mx-auto">
                                <span class="d-none d-md-inline " style="font-size: 84px">Olá {{ucfirst($_SESSION['user']['name'] . '!')}}</span>
                                <span class="d-md-none" style="font-size: 36px">Olá {{ucfirst($_SESSION['user']['name'] . '!')}}</span>
                            </h1>
                            <a class=" btn btn-dark text-white mt-5" href="/WebSiteOliver/profile/{{ $_SESSION['user']['name'] }}">Acessar perfil</a>

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

                            <a class="text-center btn btn-dark text-white link-dark" href="#">Cadastre-se</a>

                            <div style="height: 5vh;"></div>

                        </div>
                        <div class="col w-50 p-2 border-dark  d-flex flex-column justify-content-center align-items-center" style="height: 65%">
                            <h4 class="text-center">Já possui cadastro?</h4>

                            <div style="height: 10vh;"></div>

                            <a class="text-center  btn btn-dark text-white link-dark" href="#">Entrar</a>
                        </div>
                    </div>
                
                @endif

                

            </div>

        </div>

        <div class="container my-5 " >
            <div class="row">

                <div class="col-12 col-sm-4">

                    <div class="mx-2 my-2" style="background-color: rgb(29, 137, 137); height: 50vh;"></div>

                </div>

                <div class="col-12 col-sm-4">

                    <div class="mx-2 my-2" style="background-color: blueviolet; (2, 2, 2); height: 50vh;"></div>

                </div>

                <div class="col-12 col-sm-4">

                    <div class="mx-2 my-2" style="background-color: brown; height: 50vh;"></div>

                </div>

            </div>

        </div>



@endsection

