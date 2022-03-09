<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\grado;

class gradocontroller extends Controller
{
    //LISTADO DE LOS GRADOS DISPONIBLES
    public function listado(){
        $data['grado']=grado::paginate(75);
        return view('Grado.listagrado',$data);
    }

    //FORMULARIO PARA CREAR NUEVO GRADO
    public function gradoform(){
        return view('Grado.gradoform');
    }

    //GUARDAR NUEVO GRADO
    public function save(Request $request){
        $validator=$this->validate($request,[
            'nombre'=>'required',

        ]);
        $userdata = request()->except('_token');
        grado::insert($userdata);
        return back() ->with('gradoguardado', 'Grado guardado con exito');
    }

    //ELIMINAR GRADO
    public function delete($id){
        grado::destroy($id);
        return back() ->with('gradoeliminado', 'Grado eliminado con exito');
    }


}
