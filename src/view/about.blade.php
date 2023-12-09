@extends ('layout')

@section('title', 'Sobre')


@section('body')

<form action="teste" method="post" enctype="multipart/form-data">
  <input type="file" name="file[]" multiple>
   <button>Upload</button>
</form>

<div style="height: 100vh">
  <div class="my-5 d-flex justify-content-center my-5" style="height: fit-content">
    <div class="border border-dark p-5" style="height: fit-content ">
      
      <h1 class="font-weight-bold border-bottom" >Spectrum</h1>
     
    </div>
  
  
  </div>
</div>

@endsection



