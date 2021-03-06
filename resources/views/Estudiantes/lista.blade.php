@extends('diseños.base')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <h2 class="text-center mb-5"> LISTADO DE ESTUDIANTES INSCRITOS </h2>

            <table class="table table-bordered table-strpied text-center">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">DIRECCION</th>
                    <th scope="col">EDAD</th>
                    <th scope="col">GRADO</th>

                    <th scope="col">OPCIONES</th>
                </tr>
                </thead>

                <tbody>
                    @foreach($estudiantes as $estudiante)
                    <tr>

                        <td class=" border px-4 py-2">{{$estudiante->nombre}}</td>
                        <td class=" border px-4 py-2">{{$estudiante->email}}</td>
                        <td class=" border px-4 py-2">{{$estudiante->direccion}}</td>
                        <td class=" border px-4 py-2">{{$estudiante->edad}}</td>
                        <td class=" border px-4 py-2">{{$estudiante->descripcion}}</td>

                        <td class=" border px-4 py-2">
                            <div class="btn-group flex justify-center rounded-lg text-lg">
                            <a href="{{ route('modificar',$estudiante->id)}}" class=" mr-2 btn btn-primary">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('delete',$estudiante->id)}}" id="{{$estudiante->id}}" method="POST">
                                  @csrf @method('DELETE')
                            <button type="button" onclick="EliminarEstudiante({{$estudiante->id}})" class=" btn btn-danger" >
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
            {{$estudiantes->links()}}

        </div>
    </div>
</div>
@endsection
@section('content')

    <!--seccion de la alerta-->
@section('alert')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function EliminarEstudiante(Estudiante){
            Swal.fire({
                title: 'Estas seguro de eliminar al estudiante?',
                text: "No podras revertir esta accion!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(Estudiante).submit()
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

