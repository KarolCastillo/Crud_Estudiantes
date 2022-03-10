@extends('diseños.base')
@section('content')
<div class="container mt-6">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <!--MENSAJE FLASH-->
            @if(session('estudianteguardado'))
                <div class="alert alert-success">
                   {{ session('estudianteguardado') }}
                </div>
            @endif

            <!--VALIDACION DE ERRORES-->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <form action="{{route('save')}}" mathod="POST">
                    @csrf
                    <div class="card-header text-center text-white bg-dark">INGRESAR ESTUDIANTE</div>
                        <div class="card-body">
                            <div class=" form-group col-md-12 ">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control border border-success" name="nombre" placeholder="Inserte un nombre">
                            </div>

                            <div class=" form-group col-md-12 ">
                                <label for="">Email</label>
                                <input type="text" class="form-control border border-success " name="email" placeholder="Ejemplo@gmail.com">
                            </div>


                            <div class="form-group col-md-12">
                                <label for="">Direccion Casa</label>
                                <input type="text" class="form-control border border-success" name="direccion"  placeholder="Inserte una direccion">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label for="">Edad</label>
                                <input type="text" class="form-control border border-success" name="edad" placeholder="Edad">
                            </div>

                            <div class="form-row col-md-12">

                                <div class="form-group col-md-6 font-italic">
                                    <label for="">Grado</label>
                                    <select name="grado" class="form-control border border-success">
                                        <option value="" >Seleccione Grado...</option>
                                        @foreach( $grado as $grados)
                                            <option value="{{$grados->id}}"> {{$grados->descripcion}}  </option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <div class="row form-group justify-content-center">
                                <button type="submit" class="btn btn-success col-md-3 mt-3 mr-2 offset">GUARDAR</button>
                                <a type="button " href="{{ url('/LISTADO')}}" class="btn btn-primary col-md-3 mt-3 mr-2 offset float-right">VOLVER </a>
                                <a type="button " href="{{ url('/LISTADO')}}" class="btn btn-danger col-md-3 mt-3 offset float-right">CANCELAR </a>
                            </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
