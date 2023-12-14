@extends('layout')

@section('title', 'Profile')

@section('body')

    @php

        $foto = $userData['foto'] === null ? 'person.svg' : $userData['foto'];
        $bio = $userData['bio'] === null ? 'nada ainda -_-' : $userData['bio'];
        // echo "<pre>";
        // var_dump($_SESSION);
        // echo "</pre>";

    @endphp

    <div class="bg-light m-1">

        <div class="d-flex justify-content-center pt-3" style="height: fit-content">
            <img src="/WebSiteOliver/archives/users/{{ $foto }}" class="shadow-lg p-3"
                style="img-fluid height: 250px; width:250px; background-color: white; border-radius: 50%">{{-- foto de perfil  --}}
        </div>

        <h1 class="text-center">
            <span class="d-none d-md-inline" style="font-size: 36px">{{ $userData['nome'] }}</span>
            <span class="d-md-none" style="font-size: 24px">{{ $userData['nome'] }}</span>
        </h1>


        <div class="row justify-content-center ">
            <div class="col-xs-12 col-sm-12 col-md-4  ">
                <div class="content mx-auto border rounded border-dark d-flex flex-column align-items-center text-center"
                    style="min-width: 250px; min-height: 135px; max-width: fit-content;">
                    <small class="bg-dark border rounded  w-100 m-0 p-0 text-white">Bio</small>

                    <p>{{ $bio }}</p>
                </div>

            </div>
        </div>



        <div class="mx-auto border border rounded border-dark my-2" style="width: 90%">
            <div class="border-0 border-dark m-0">
                <div class="row m-1">
                    

            {{-- AQUI DENTRO VIRÁ UM LOOP, QUE RENDERIZARÁ TODAS OS POSTS DO USUARIO (SE ELE TIVER POSTS) --}}

                    <div class="col-sm-12 col-md-4 " style="height: 50vh;">
                        <img src="/WebSiteOliver/archives/users/{{ $foto }}" class="img-fluid rounded p-1" alt="Imagem 1" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    
                    <div class="col-sm-12 col-md-4 " style="height: 50vh;">
                        <img src="/WebSiteOliver/archives/users/{{ $foto }}" class="img-fluid rounded p-1" alt="Imagem 1" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    
                    <div class="col-sm-12 col-md-4 " style="height: 50vh;">
                        <img src="/WebSiteOliver/archives/users/{{ $foto }}" class="img-fluid rounded p-1" alt="Imagem 1" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    
                    <div class="col-sm-12 col-md-4 " style="height: 50vh;">
                        <img src="/WebSiteOliver/archives/users/{{ $foto }}" class="img-fluid rounded p-1" alt="Imagem 1" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    
                    <div class="col-sm-12 col-md-4 " style="height: 50vh;">
                        <img src="/WebSiteOliver/archives/users/{{ $foto }}" class="img-fluid rounded p-1" alt="Imagem 1" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    


                </div>
            </div>
        </div>
        
        
        


        {{-- <div class="w-50 mx-auto ">
            <div class="border border-dark mt-2 mb-5">
                <div class="row m-1">
                    <div class="col-sm-12 col-md-6 col-lg-4  mb-1 border border-black container">
                        <img src="/WebSiteOliver/archives/users/{{ $foto }}" class="img-fluid m-0 w-100 h-100" alt="Imagem 1">
                    </div>
                </div>
            </div>
        </div> --}}
    
    
    
    
    </div>



@endsection
