<?php

namespace App\Http\Controllers;
//importamos para las excepciones
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\grado;

class gradocontroller extends Controller
{
    //LISTADO DE LOS GRADOS DISPONIBLES
    public function listado(){
        try {
        $data['grado']=grado::paginate(75);
        return view('Grado.listagradok',$data);

        } catch (\Exception $e) {
            log::debug($e->getMessage());
            return view('Errors.errorvista');
        }
    }

    //FORMULARIO PARA CREAR NUEVO GRADO
    public function gradoform()
    {
        try {

            return view('Grado.lol');

        } catch (\Exception $e) {
            log::debug($e->getMessage());
            return view('Errors.errorvista');
        }
    }

    //GUARDAR NUEVO GRADO
    public function save(Request $request){
        $validator=$this->validate($request,[
            'id'=>'required',
            'descripcion'=>'required',

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
