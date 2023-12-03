@extends('layout')

@section('body')

<style>
    .div_informacoes {
        width: 30%;
        background-color: red;
    }
</style>


<div style="height: 100vh;">

    <div class="content bg-primary" style="height: 60%; display: flex; align-items: center;">
        <!-- aq vem o card de boas vindas-->
        <div class="bg-light content border rounded" style="height: 80%; width: 35%; margin-left: 3vw; max-width: 400px;">

        </div>
    </div>

    <div class="content bg-secondary" style="height: 60%; width: 100%;">
        <!-- aq vem O INFO--> 
        <p style="text-align: center;">INFORMACOES</p>
        <div style=" width: 100%; height: 90%; display: flex; justify-content: space-around;">
            <div class="div_informacoes">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore saepe necessitatibus corrupti nesciunt omnis quae facilis dicta deserunt voluptates incidunt ullam dignissimos quidem nemo blanditiis, at vitae pariatur molestiae aliquid?

            </div>

            <div class="div_informacoes">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore saepe necessitatibus corrupti nesciunt omnis quae facilis dicta deserunt voluptates incidunt ullam dignissimos quidem nemo blanditiis, at vitae pariatur molestiae aliquid?

            </div>

            <div class="div_informacoes">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore saepe necessitatibus corrupti nesciunt omnis quae facilis dicta deserunt voluptates incidunt ullam dignissimos quidem nemo blanditiis, at vitae pariatur molestiae aliquid?

            </div>

        </div>
    </div>
</div>



@endsection