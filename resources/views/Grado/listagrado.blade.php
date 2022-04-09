@extends('diseños.base')
@section('content')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <h2 class="text-center mb-5"> LISTADO DE LOS GRADOS </h2>
                <a type="button " href="{{ url('/CREAR_GRADO')}}" class="btn btn-success mb-3 mt-3 mr-2 md-3 offset float-left">NUEVO  <i class="fas fa-plus"></i></a>
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
                                    <form action="{{ route('delete_grado',$grados->id)}}" id="{{$grados->id}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="button" onclick="eliminarGrado({{$grados->id}})" class="btn btn-danger" >
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
        function eliminarGrado(grado){
            Swal.fire({
                title: 'Estas seguro de eliminar el grado?',
                text: "No podras revertir esta accion!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(grado).submit()
                    Swal.fire(
                        'Eliminado!',
                        'El grado desaparecio.',
                        'success'
                    )
                }
            })
        }
    </script>
@endsection
