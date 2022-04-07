<?php

namespace App\Http\Controllers;
//use App\Models\jornada;
use App\Models\grado;
use App\Models\estudiantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


class estudiantescontroller extends Controller
{
    //LISTADO DE USUARIOS
    public function listado(){
        try{
        $estudiantes = DB::table('estudiantes')
            ->join('grado', 'estudiantes.grado', '=', 'grado.id')
            ->select('estudiantes.*', 'grado.descripcion')
            ->paginate(10);


        return view('Estudiantes.lista', compact('estudiantes'));

        } catch (\Exception $excep) {
            $message=$excep->getMessage();
            $tipoError=" Excepción General Vista ";
            return view('Errors.errorvista', compact('message', 'tipoError'));

        }

       // $data['estudiantes']=estudiantes::paginate(75);
     //   return view('Estudiantes.lista',$data);
    }

    //FORMULARIO CREAR ESTUDIANTES
    public function estudiform(){
        try{
        $grado = grado::all();
        return view('Estudiantes.estudiform',compact('grado'));

        } catch (\Exception $excep) {
        $message=$excep->getMessage();
        $tipoError=" Excepción General Vista ";
        return view('Errors.errorvista', compact('message', 'tipoError'));
        }

        }

    //GUARDAR NUEVO ESTUDIANTES
    public function save(Request $request){
        $validator=$this->validate($request,[
            'nombre'=>'required',
            'email'=>'required|email|unique:estudiantes',
            'edad'=>'required',
            'grado'=>'required',
            'direccion'=>'required',
            //
        ]);
        //$userdata = request()->except('_token');
        //estudiantes::insert($userdata);
        //return back() ->with('estudianteguardado', 'Estudiante guardado con exito');
        /* Guardamos en la Base de datos */
        try {
        estudiantes::create([
            'nombre' =>$validator['nombre'],
            'email'=>$validator['email'],
            'edad'=>$validator['edad'],
            'grado'=>$validator['grado'],
            'direccion'=>$validator['direccion'],
            //'idjornada'=>$validator['jornada'],
        ]);
        //si funciona este
        } catch (\Exception $excep) {
            $message=$excep->getMessage();
            $tipoError=" Excepción General Vista ";
            return view('Errors.errorvista', compact('message', 'tipoError'));

            //los dos catch estan pendiente
        }catch (QueryException $queryException){
            $message= $queryException->getMessage();
            $tipoError=" Excepción General Vista ";
            return view('Errors.404', compact('message', 'tipoError'));

        }catch (ModelNotFoundException $modelNotFoundException){
            $message=$modelNotFoundException->getMessage();
            $tipoError=" Excepción en el Servidor ";
            return view('errors.404', compact('message', 'tipoError'));
        }
        // return redirect('/')->with('guardar', 'ok');
        return back()->with('estudianteguardado', 'Estudiante guardado con exito');
    }

    //ELIMINAR ESTUDIANTES
    public function delete($id){
        estudiantes::destroy($id);
        return back() ->with('estudianteguardado', 'Estudiante guardado con exito');
    }

    //FORMULARIO PARA EDITAR ESTUDIANTES
    public function modificar($id){
        $estudiante=estudiantes::findorfail($id);
        $grado = grado::all();
        return view('Estudiantes.editform', compact('estudiante', 'grado'));

      //  $cript = criptomoneda::findOrFail($id);
      //  $lenguaje= Lenguaje::all();
      //  return view('archivo.editar', compact('cript', 'lenguaje'));
    }

    //EDITAR ESTUDIANTES
    public function edit(Request $request,$id){
        $datosestudiante=request()->except((['_token','_method']));
        estudiantes::where('id','=', $id)->update($datosestudiante);
        return back() ->with('estudiantemodificado', 'Estudiante modificado con exito');



    }

}
