@extends ('layout')

@section('body')

<button onclick="mostrarAlerta()">Clique aqui</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
     function mostrarAlerta() {
      Swal.fire({
        title: 'Olá!',
        text: 'Isso é um exemplo de SweetAlert.',
        icon: 'success',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.isConfirmed) {
          console.log('Usuário clicou em OK');
        }
      });
    }
</script>

{{ "GABIRU PERFEITO" }}
@endsection


