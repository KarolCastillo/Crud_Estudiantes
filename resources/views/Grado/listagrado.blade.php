@extends('diseños.base')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <h2 class="text-center mb-5"> LISTADO DE LOS GRADOS </h2>
            <a type="button " href="{{ url('/CREAR_GRADO')}}" class="btn btn-success mb-3 mt-3 mr-2 md-3 offset float-left">NUEVO </a>
            <table class="table table-bordered table-strpied text-center">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">GRADO</th>
                    <th scope="col">OPCIONES</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($grado as $grados)
                    <tr>

                        <td class=" border px-4 py-2">{{$grados->id}}</td>
                        <td class=" border px-4 py-2">{{$grados->descripcion}}</td>

                        <td class=" border px-4 py-2">
                            <div class="btn-group flex justify-center rounded-lg text-lg">
                            <form action="{{ route('delete_grado',$grados->id)}}" class="eliminar-registro" method="POST">
                                  @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Esta seguro de eliminar registro de grado');" class=" btn btn-danger" >
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div
            {{$grado->links()}}

        </div>
    </div>
</div>
@endsection

<!--seccion de la alerta-->
@section('alert')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $('.eliminar-registro').submit(function(r){
        r.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })

    });


    </script>
@endsection
