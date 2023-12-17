@extends('layout')

@section('title', 'Profile')

@section('body')

    @php

    $foto = $userData['foto'] === null ? 'person.svg' : $userData['foto'];
        $nome = $userData['nome'];
        $bio = $userData['bio'] === null ? 'nada ainda -_-' : $userData['bio'];
        $uid = $userData['id'];
        $posts = $userData['posts'];
        // echo "<pre>";
        //     //         print_r($userData);
        //     print_r($posts);
        // echo "</pre>";

    
    @endphp


    <div class="bg-light m-1">

        <div class="d-flex justify-content-center pt-3" style="height: fit-content">
            <img src="/Spectrum/archives/users/{{ $foto }}" class="shadow-lg p-3 img-fluid"
                style=" height: 250px; width:250px; background-color: white; border-radius: 50%">{{-- foto de perfil  --}}

                @if (isset($_SESSION['authenticated']) && $uid === $_SESSION['user']['id'])
                <button type="button" style="height: fit-content" class="border-0"  data-bs-toggle="modal" data-bs-target="#updatePicture">
                    <i class="bi bi-upload"></i>
                </button>
                @endif

            </div>

            <div class="modal fade" id="updatePicture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
        
                        <div class="modal-header">
                            <h5 class="modal-title">Atualizar foto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
        
                        <div class="modal-body">
                            <form action="/Spectrum/profile/{{ $nome }}/image" method="POST" enctype="multipart/form-data">
                                <label>Adicione uma imagem</label>
                                <div class="w-100 d-flex justify-content-center align-items-center py-3" style="min-height: 200px; max-height: fit-content">
                                    <input type="file" id="newImage" name="newPicture" required name="img" accept="image/png, image/jpeg, image/gif, image/jpg" style="display: none;">
                                    <label for="newImage">
                                        <img id="previewPicture" src="/Spectrum/archives/plus-lg.svg" class="p-3 border rounded-circle img-fluid " style="height: 250px; width:250px;">
                                    </label>
                                </div>
                        
                                <button type="submit" class="btn btn-dark">Enviar</button>
                            </form>
                        </div>

                    
                    </div>
                
                </div>
            
            </div>
        

        

        <h1 class="text-center">
            <span class="d-none d-md-inline" style="font-size: 36px">{{ $userData['nome'] }}</span>
            <span class="d-md-none" style="font-size: 24px">{{ $userData['nome'] }}</span>
        </h1>


        <div class="row justify-content-center ">
            <div class="col-xs-12 col-sm-12 col-md-4  ">
                <div class="content mx-auto border rounded border-dark d-flex flex-column align-items-center text-center"
                    style="min-width: 250px; min-height: 135px;">
                    {{-- <small class="bg-dark border rounded  w-100 m-0 p-0 text-white">Bio <button data-bs-toggle="modal" data-bs-target="#updateBio">atualizar</button> </small> --}}
                    <small class="bg-dark border rounded w-100 m-0 p-0 text-white">Bio 
                        @if (isset($_SESSION['authenticated']) && $uid === $_SESSION['user']['id'])
                        <button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#updateBio">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                          <path d="M12.854 0l2.793 2.793-10.646 10.647-2.792-2.792L12.854 0zm1.28 3.182-1.06 1.06-1.188-1.187 1.06-1.06 1.188 1.188zM2.646 12.354l-1.5 4.5 4.5-1.5 9.75-9.75-3-3-9.75 9.75z"/>
                        </svg>
                      </button>
                    @endif
                    </small>
                    <span class="text-justify">{{ $bio }}</span>
                </div>

            </div>
        </div>

@if (isset($_SESSION['authenticated']) && $uid === $_SESSION['user']['id'])
    
    <div class=" mx-auto " style="width: 90%; height: fit-content;">
        
        <button type="button" class="text-center btn btn-dark text-white my-1   " data-bs-toggle="modal" data-bs-target="#newPost">
            <i class="bi bi-plus"></i>  Criar novo post
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
                    <form action="/Spectrum/profile/{{ $nome }}/post" method="POST" enctype="multipart/form-data">
                        <label>Adicione uma imagem</label>
                        <div class="w-100 d-flex justify-content-center align-items-center py-3" style="min-height: 200px; max-height: fit-content">
                            <input type="file" id="newPostImage" required name="img" accept="image/png, image/jpeg, image/gif, image/jpg" style="display: none;">
                            <label for="newPostImage">
                                <img id="previewPost" src="/Spectrum/archives/plus-lg.svg" class="p-1 border-dark img-fluid w-100 h-100 object-fit-contain mx-auto" style="min-height: 200px;">
                            </label>
                        </div>
    

                        <div class="mb-3">
                            <label for="campoTexto" class="form-label">Descrição</label>
                            <textarea class="form-control" id="campoTexto" name="desc" placeholder="Insira a descrição aqui" maxlength="255" rows="5" style="resize: none;"></textarea>
                        </div>
                        
            
                        <button type="submit" class="btn btn-dark">Enviar</button>
                    
                    </form>

                </div>
            
            </div>
        
        </div>
    
    </div>










  
 <!-- Modal -->
 <div class="modal fade" id="updateBio" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Atualizar Biografia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="/Spectrum/profile/{{ $nome }}/bio" method="POST">
                         


                    <div class="mb-3">
                        <label for="campoTexto" class="form-label">Biografia</label>
                        <textarea class="form-control" id="campoTexto" name="bio" placeholder="Digite aqui!" rows="5" style="resize: none;" maxlength="200"></textarea>
                        
                    </div>
                    
        
                    <button type="submit" class="btn btn-dark">Atualizar</button>
                
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

                @php
                        usort($posts, function ($a, $b) {
        return strtotime($b['dataCriacao']) - strtotime($a['dataCriacao']);
    });
                @endphp
                
                @foreach ($posts as $post)
                
                @php
                    
                  $dateString = $post['dataCriacao'];
                  $dateTime = new DateTime($dateString);
                  $formatedDate = $dateTime->format('d/m/Y \à\s H:i');
                  $date = $formatedDate;
                @endphp

                <div class="col-sm-12 col-md-4" style="height: 50vh;">
                    <img src="/Spectrum/archives/posts/{{ $post['imagem'] }}" class="img-fluid rounded p-1" alt="Imagem 1" style="width: 100%; height: 100%; object-fit: cover;" data-bs-toggle="modal" data-bs-target="#imagemModal{{ $post['id'] }}">
                </div>
                
                <div class="modal fade" id="imagemModal{{ $post['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xs modal-sm modal-md modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$date}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <span class="p-3">{{$post['descricao']}}</span>

                            <div class="modal-body d-flex justify-content-center align-items-center">
                                <img src="/Spectrum/archives/posts/{{ $post['imagem'] }}" class="img-fluid rounded" alt="Imagem {{ $post['id'] }}">
                                
                            </div>
                        </div>
                    </div>
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
                        <img src="/Spectrum/archives/users/{{ $foto }}" class="img-fluid m-0 w-100 h-100" alt="Imagem 1">
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

    document.getElementById('newImage').addEventListener('change', function(event) {
        // Obtém o elemento de imagem de preview
        var previewPic = document.getElementById('previewPicture');

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
                previewPic.src = e.target.result;
            };
            leitor.readAsDataURL(arquivo);
        }
    });

    </script>

@endsection
