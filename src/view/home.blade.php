@extends('layout')

@section('title', 'Spectrum')

@section('body')

        <div class="content bg-primary d-flex align-items-center justify-content-center" style="height: 70vh; background-image: linear-gradient(180deg, black, transparent);">
            <!-- aq vem o card de boas vindas-->
            <div class="bg-light content" style="height: 90%; width: 90%; border-radius: 0px 25px 0px 25px">

                <h1 class="text-center pt-4">
                    <span class="d-none d-md-inline" style="font-size: 84px">Spectrum</span><span class="d-md-none" style="font-size: 50px">Spectrum</span>
                </h1>


                <div class="row pt-5">
                    <div class="col w-50 p-2 border-dark border-end d-flex flex-column justify-content-center align-items-center" style="height: 65%">
                        <h4 class="text-center">Ainda não é cadastrado?</h4>
                        
                        <div style="height: 10vh;"></div>

                        <a class="text-center  mb-5 pb-5 link-dark" href="#">Cadastre-se</a>
                    </div>
                    <div class="col w-50 p-2 border-dark  d-flex flex-column justify-content-center align-items-center" style="height: 65%">
                        <h4 class="text-center">Já possui cadastro?</h4>

                        <div style="height: 10vh;"></div>

                        <a class="text-center  mb-5 pb-5 link-dark" href="#">Entrar</a>
                    </div>
                </div>
                



            </div>

        </div>

        <div class="container my-5 " >
            <div class="row">

                <div class="col-12 col-sm-4">

                    <div class="mx-2 my-2" style="background-color: azure; height: 50vh;"></div>

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

