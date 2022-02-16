<?php

namespace App\Http\Controllers;

use App\Models\estudiantes;
use Illuminate\Http\Request;


class estudiantescontroller extends Controller
{
    //LISTADO DE USUARIOS
    public function listado(){
        $data['estudiantes']=estudiantes::paginate(3);
        return view('Estudiantes.lista',$data);
    }

    //FORMULARIO CREAR ESTUDIANTES
    public function estudiform(){
        return view('Estudiantes.estudiform');
    }

    //GUARDAR NUEVO ESTUDIANTES
    public function save(Request $request){
        $validator=$this->validate($request,[
            'nombre'=>'required',
            'email'=>'required|email|unique:estudiantes',
            'edad'=>'required',
            'direccion'=>'required'
        ]);
        $userdata = request()->except('_token');
        estudiantes::insert($userdata);
        return back() ->with('estudianteguardado', 'Estudiante guardado con exito');
    }
}
