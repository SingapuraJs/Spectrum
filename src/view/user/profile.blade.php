@extends('layout')

@section('title', 'Profile')

@section('body')

    @php

        $foto = $userData['foto'] === null ? 'person.svg' : $userData['foto'];
        $bio = $userData['bio'] === null ? 'nada ainda -_-' : $userData['bio'];
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";

    @endphp

    <div class="border border-dark bg-light m-1">

        <div class="d-flex justify-content-center pt-3" style="height: fit-content">
            <img src="/WebSiteOliver/archives/users/{{ $foto }}" class="shadow-lg " data-bs-toggle="modal" data-bs-target="#minhaModal"
                style="img-fluid height: 250px; width:250px; background-color: white; border-radius: 50%">{{-- foto de perfil  --}}
        </div>

        <h1 class="text-center">
            <span class="d-none d-md-inline" style="font-size: 36px">{{ $userData['nome'] }}</span>
            <span class="d-md-none" style="font-size: 24px">{{ $userData['nome'] }}</span>
        </h1>


        <div class="row justify-content-center ">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="content mx-auto border border-dark d-flex flex-column align-items-center text-center"
                    style="min-width: 250px; min-height: 135px; max-width: fit-content;">
                    <small class="bg-dark w-100 m-0 p-0 text-white">Bio</small>

                    <p>{{ $bio }}</p>
                </div>

            </div>
        </div>

        <div class="w-50 mx-auto ">
            <div class="border border-dark mt-2 mb-5">
                <div class="row m-1">
                    <div class="col-sm-12 col-md-6 col-lg-4  mb-1 border border-black">
                        <img src="/WebSiteOliver/archives/plus.svg" class="img-fluid m-0 w-100 h-100" alt="Imagem 1">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Botão Bootstrap -->
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#minhaModal">
        Editar perfil
    </button>

    <!-- Modal Bootstrap -->
    <div class="modal fade" id="minhaModal" tabindex="-1" aria-labelledby="minhaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="minhaModalLabel">Editar perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    
                        <form action="/WebSiteOliver/profile/{{ $userData['nome'] }}/post" method="POST">
                            <div class="form-group">
                              <label for="image">img test</label>
                              <input type="text" class="form-control" id="img" name="img">
                            </div>

                            <div class="form-group">
                              <label for="desc">desc</label>
                              <input type="text" class="form-control" id="desc" name="desc">
                            </div>
                            <br>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>



                </div>
            </div>
        </div>
    </div>

@endsection
