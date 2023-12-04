@extends('layout')

@section('body')

        <div class="content bg-primary d-flex align-items-center justify-content-center" style="height: 70vh;">
            <!-- aq vem o card de boas vindas-->
            <div class="bg-light content border rounded w-75 h-75">
                @php
                    print_r($_SESSION);
                @endphp
            </div>
        </div>

        <div class="container my-5 " >
            <div class="row">

                <div class="col-12 col-sm-4">

                    <div class="mx-2 my-2" style="background-color: #000000; height: 50vh;"></div>

                </div>

                <div class="col-12 col-sm-4">

                    <div class="mx-2 my-2" style="background-color: #000000; (2, 2, 2); height: 50vh;"></div>

                </div>

                <div class="col-12 col-sm-4">

                    <div class="mx-2 my-2" style="background-color: #000000; height: 50vh;"></div>

                </div>

            </div>

        </div>



@endsection

