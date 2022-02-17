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
            'grado'=>'required',
            'direccion'=>'required',
            'jornada'=>'required'
        ]);
        $userdata = request()->except('_token');
        estudiantes::insert($userdata);
        return back() ->with('estudianteguardado', 'Estudiante guardado con exito');
    }

    //ELIMINAR ESTUDIANTES
    public function delete($id){
        estudiantes::destroy($id);
        return back() ->with('estudianteguardado', 'Estudiante guardado con exito');
    }

    //FORMULARIO PARA EDITAR ESTUDIANTES
    public function modificar($id){
        $estudiante=estudiantes::findorfail($id);
        return view('Estudiantes.editform', compact('estudiante'));
    }

    //EDITAR ESTUDIANTES
    public function edit(Request $request,$id){
        $datosestudiante=request()->except((['_token','_method']));
        estudiantes::where('id','=', $id)->update($datosestudiante);
        return back() ->with('estudiantemodificado', 'Estudiante modificado con exito');
    }

}
