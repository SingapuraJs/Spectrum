@extends('layout')

@section('title', 'Registro')


@section('body')

<div class="my-5 d-flex justify-content-center" style="height: 100vh">

    <div class="border border-dark rounded p-5" style="height: fit-content">

        <form action="./register" method="POST" enctype="multipart/form-data">



            <div class="row  mb-4 d-flex align-items-center justify-content-center">
                <div class="col-5 ">
                    <div class="w-100 justify-content-center align-items-center">
                        <input type="file" id="imgToUpload" name="profile_pic" accept="image/png, image/jpeg, image/gif, image/jpg" style="display: none;">
                        <label for="imgToUpload">
                        <img id="previewImagem" src="/Spectrum/archives/users/person.svg" class="p-1 border rounded-circle border-dark" style="min-width: 80px; min-height: 80px; max-width: 80px; max-height: 80px;">
                        </label>
                    </div>
                </div>
                <div class="col-7 ">
                    <small class="text-center" style="font-style: italic">foto de perfil*</small>
                </div>
            </div>

            
    
            <div class="form-group">
    
                <label>Usuário*</label>
                <input type="text" class="form-control" name="username" required onkeypress="return event.charCode != 32">
    
            </div>
    
            <div class="form-group">
                
                <label>E-mail*</label>
                <input type="email" class="form-control" name="email" required onkeypress="return event.charCode != 32">
    
            </div>
            
            <div class="form-group">
             
                <label>Senha*</label>
                <input type="password" class="form-control" name="password" pattern=".{6,}" required title="Sua senha deve ter no minimo 6 caracteres." senha." onkeypress="return event.charCode != 32">
    
            </div>
    
            <div class="float-end">
                <button type="submit" class="btn btn-dark mt-4">Enviar</button>
            </div>
            
        </form>

    </div>

</div>

<script>
    // Adiciona um evento de alteração ao campo de upload de arquivo
    document.getElementById('imgToUpload').addEventListener('change', function(event) {
        // Obtém o elemento de imagem de preview
        var previewImagem = document.getElementById('previewImagem');

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
                previewImagem.src = e.target.result;
            };
            leitor.readAsDataURL(arquivo);
        }
    });

</script>


@endsection