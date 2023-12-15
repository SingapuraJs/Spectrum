@extends('layout')

@section('title', 'Profile')

@section('body')

    @php

    $foto = $userData['foto'] === null ? 'person.svg' : $userData['foto'];
        $nome = $userData['nome'];
        $bio = $userData['bio'] === null ? 'nada ainda -_-' : $userData['bio'];
        $uid = $userData['id'];
        $posts = $userData['posts'];
//        print_r($posts);
//        echo "<pre>";
//         print_r($userData);
//         echo "</pre>";

    
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

{{-- --------------------------------------------------POSTAGENS-------------------------------------------------- --}}
@if (isset($_SESSION['authenticated']) && $uid === $_SESSION['user']['id'])
    
    <div class=" mx-auto " style="width: 90%; height: fit-content;">
        
        <button type="button" class="text-center btn btn-dark text-white my-1" data-bs-toggle="modal" data-bs-target="#newPost">
            Criar novo post
        </button>
    </div>
@endif


  
  <!-- Modal -->
    <div class="modal fade" id="newPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Criar novo post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="/WebSiteOliver/profile/{{ $nome }}/post" method="POST" enctype="multipart/form-data">
                        <label>Adicione uma imagem</label>
                        <div class="w-100 d-flex justify-content-center align-items-center py-3" style="min-height: 200px; max-height: fit-content">
                            <input type="file" id="newPostImage" required name="img" accept="image/png, image/jpeg, image/gif, image/jpg" style="display: none;">
                            <label for="newPostImage">
                                <img id="previewPost" src="/WebSiteOliver/archives/plus-lg.svg" class="p-1 border-dark img-fluid w-100 h-100 object-fit-contain mx-auto" style="min-height: 200px;">
                            </label>
                        </div>
    

                        <div class="mb-3">
                            <label for="campoTexto" class="form-label">Descrição</label>
                            <textarea class="form-control" id="campoTexto" name="desc" placeholder="Insira a descrição aqui" rows="5" style="resize: none;"></textarea>
                        </div>
                        
            
                        <button type="submit" class="btn btn-dark">Enviar</button>
                    
                    </form>

                </div>
            
            </div>
        
        </div>
    
    </div>
  


<div class="mx-auto " style="width: 90%">
  

    <div class="border border border rounded border-dark border-dark">
                <div class="row m-1" style="min-height:300px; ">
                    

            @if (empty($posts))
                
                @if (isset($_SESSION['authenticated']) && $uid === $_SESSION['user']['id'])
                    <h3 class="text-center">Você ainda não postou nada :(</h3>
                @else
                    
                    <h3 class="text-center">Este usuário não tem postagens :(</h3>

                @endif

            @else
                
                @foreach ($posts as $post)
                <div class="col-sm-12 col-md-4" style="height: 50vh;">
                    <img src="/WebSiteOliver/archives/posts/{{ $post['imagem'] }}" class="img-fluid rounded p-1" alt="Imagem 1" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                @endforeach
            @endif


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

    <script>
         document.getElementById('newPostImage').addEventListener('change', function(event) {
        // Obtém o elemento de imagem de preview
        var previewPost = document.getElementById('previewPost');

        // Obtém o arquivo selecionado
        var arquivo = event.target.files[0];

        // Verifica se um arquivo foi selecionado
        if (arquivo) {

            if (!/^image\//.test(arquivo.type)) {
                // Alerta o usuário sobre o tipo de arquivo não permitido
                Swal.fire({
                    title: 'Erro',
                    text: 'Você selecionou um tipo inválido de imagem.',
                    icon: 'warning'
                })
                // Limpa o campo de upload de arquivo
                event.target.value = '';
                return;
            }

            var leitor = new FileReader();
            leitor.onload = function(e) {
                previewPost.src = e.target.result;
            };
            leitor.readAsDataURL(arquivo);
        }
    });
    </script>

@endsection
