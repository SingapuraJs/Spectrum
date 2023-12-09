@extends('layout')

@section('title', 'Profile')

@section('body')

    <div class="border border-dark bg-light m-1">

        <div class="d-flex justify-content-center pt-3" style="height: fit-content">
            <img src="./archives/example.svg" class="shadow "
                style="img-fluid height: 250px; width:250px; background-color: white; border-radius: 50%">
            {{-- foto de perfil  --}}
        </div>

        <h1 class="text-center">
            <span class="d-none d-md-inline" style="font-size: 36px">Minotauro L. Rosa</span>
            <span class="d-md-none" style="font-size: 24px">Minotauro L. Rosa</span>
        </h1>

        <div class="row justify-content-end ">

            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="content mx-auto border border-dark d-flex flex-column align-items-center text-center"
                    style="width: 300px; min-height: 135px;">
                    <small class="bg-dark w-100 m-0 p-0 text-white">Bio</small>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nulla autem quae laborum magnam?
                        Molestiae eligendi quaerat hic est voluptatum odio nam</p>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 ">
                <div class="  border border-dark" style="width: 150px; min-height: 135px;">aqui viria links? talvez?</div>
            </div>

        </div>



        

        <div class="w-75 mx-auto border border-dark mt-2 mb-5 containers">
            <div class="row m-1">
                <div class="col-sm-12 col-md-6 col-lg-4 mb-1 border border-black">
                    <img src="./archives/example.svg" class="img-fluid m-0" alt="Imagem 1">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4  mb-1 border border-black">
                    <img src="./archives/example.svg" class="img-fluid m-0" alt="Imagem 1">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4  mb-1 border border-black">
                    <img src="./archives/example.svg" class="img-fluid m-0" alt="Imagem 1">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4  mb-1 border border-black">
                    <img src="./archives/example.svg" class="img-fluid m-0" alt="Imagem 1">
                </div>
            </div>


        </div>



    </div>
    </div>

    </div>
@endsection



