@extends('layout')

@section('title', 'Login')

@section('body')

<div class="my-5 d-flex  justify-content-center " style="height: 100vh">

    <div class=" border border-dark rounded p-5" style="height: fit-content">

        <form action="./login" method="POST">
    
            <div class="form-group">
    
                <label>Usuário</label>
                <input type="text" class="form-control" name="username" required >
    
            </div>
            
            
            <div class="form-group">
             
                <label>Senha</label>
                <input type="password" class="form-control" name="password" required >
    
            </div>
    
            <div class="">
                <button type="submit" class="btn btn-dark mt-4">Entrar</button>
            </div>
            
        </form>

    </div>

</div>

@endsection