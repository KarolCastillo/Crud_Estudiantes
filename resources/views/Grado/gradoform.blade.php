@extends('diseños.base')
@section('content')
<div class="container mt-6">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <!--MENSAJE FLASH-->
            @if(session('gradoguardado'))
                <div class="alert alert-success">
                   {{ session('gradoguardado') }}
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
                <form action="{{route('save_grado')}}" mathod="POST">
                    @csrf
                    <div class="card-header text-center text-white bg-dark">INGRESAR NUEVO GRADO</div>
                        <div class="card-body">
                            <div class=" form-group col-md-12 ">
                                <label for="">ID</label>
                                <input type="text" class="form-control " name="id" placeholder="Inserte un nombre">
                            </div>

                            <div class=" form-group col-md-12 ">
                                <label for="">Grado</label>
                                <input type="text" class="form-control " name="descripcion" placeholder="Inserte un nombre">
                            </div>

                            </div>
                            <!--div class="form-group col-md-12">
                                <label for="">Asignar Grado</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Seleccione grado</option>
                                    <option>...</option>
                                </select>
                            </div-->

                            <div class="row form-group justify-content-center">
                                <button type="submit" class="btn btn-success col-md-3 mt-3 mr-2 offset">GUARDAR</button>
                                <a type="button " href="{{ url('/LISTADO_GRADO')}}" class="btn btn-primary col-md-3 mt-3 mr-2 offset float-right">VOLVER </a>
                                <a type="button " href="{{ url('/LISTADO_GRADO')}}" class="btn btn-danger col-md-3 mt-3 offset float-right">CANCELAR </a>
                            </div>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection
