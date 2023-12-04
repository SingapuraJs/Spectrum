@extends('layout')

@section('body')

<div class="my-5 d-flex align-items-center justify-content-center">

    <div class="border border-dark rounded p-5">

        <form action="./register" method="POST">
    
            <div class="form-group">
    
                <label>Usuário</label>
                <input type="text" class="form-control" name="username" required placeholder="Digite seu usuário.">
    
            </div>
    
            <div class="form-group">
                
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" required placeholder="Digite seu E-mail.">
    
            </div>
            
            <div class="form-group">
             
                <label>Senha</label>
                <input type="password" class="form-control" name="password" required placeholder=" Digite sua senha.">
    
            </div>
    
            <div class="form-group">
    
                <label for="phoneNumber">Telefone</label>
                <input type="tel" class="form-control" name="tel" placeholder="(00) 91234-4567">
      
            </div>
    
            <div class="float-end">
                <button type="submit" class="btn btn-dark mt-4">Enviar</button>
            </div>
            
        </form>

    </div>

</div>


@endsection