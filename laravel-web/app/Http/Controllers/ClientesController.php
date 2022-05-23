<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\clientes;
use Auth;

class ClientesController extends Controller
{
    /*

    * index para mostrar todos los usuarios
    * store para guardar un usuario
    * update para actualizar un usuario
    * destroy para eliminar un usuarioS
    * edit para mostrar el formulario de edicion

    */


    public function index()
    {
        $clientes=Clientes::all();
        return $clientes;
    }




    public function store(Request $request){

        $request->validate([
            'correo' => 'required|min:4',
            'password' => 'required|min:6',
            'telefono' => 'required|min:9'
        ]);
        //$aux=['correo', 'password', 'telefono'];
        $clientes = new Clientes;
        $clientes->correo = $request->correo;
        $clientes->password = $request->password;
        $clientes->telefono = $request->telefono;
        $clientes->rol = 'c';
        $clientes->save();
        return redirect()->route('registro')->with('success','usuario insertado con exito');
    }

        public function login(Request $request)
        {
            $data=request()->validate([
                'correo' => 'required|min:4',
                    'password' => 'required|min:6'
            ],
            [
                'correo.required'=>'Ingrese Usuario',
                'password.required'=>'Ingrese Contraseña',
            ]);

            $correo=$request->get('correo');
            $consultacorreo=Clientes::where('correo','=',$correo)->get();
          if (count($consultacorreo)==0) {
            return back()->withErrors(['correo'=>'correo no valido'])->withInput([request('correo')]);
          }else {
              # code...
          
         // echo $consultacorreo[0]['correo'];
            $password=$request->get('password');
          //  echo $correo;
            $correovalido=false;
            $passwordvalida=false;
            if ($consultacorreo[0]['correo']==$correo) {
             $correovalido=true;
            }else {
                
                return back()->withErrors(['correo'=>'correo no valido'])->withInput([request('correo')]);
            }
            if ($consultacorreo[0]['password']==$password) {
                $passwordvalida=true;
            }else {
                return back()->withErrors(['password'=>'contraseña no valida'])->withInput([request('password')]);
            }
        if ($correovalido==true && $passwordvalida==true) {
                if ($consultacorreo[0]['rol']=='s') {
                    session(['usu' => $request->get('correo')]);
                    return redirect()->route('menu3');
                }
                if ($consultacorreo[0]['rol']=='c') {
                    session(['usu' => $request->get('correo')]);
                    
                    return redirect()->route('menu2');
                }
                
            }
            /*
            if ($correovalido==false || $passwordvalida==false) {
                return redirect()->route('login');
            }*/
        }

        }

        public function store2(Request $request){

            $request->validate([
                'correo' => 'required|min:4',
                'password' => 'required|min:6',
                'telefono' => 'required|min:9',
                'rol' => 'required'
            ]);
            //$aux=['correo', 'password', 'telefono'];
            $clientes = new Clientes;
            $clientes->correo = $request->correo;
            $clientes->password = $request->password;
            $clientes->telefono = $request->telefono;
            $clientes->rol = $request->rol;
            $clientes->save();
            return redirect()->route('crear')->with('success','usuario insertado con exito');
        }


        public function get(){
            $types = clientes::all();
            return view('selectview')->with('types', $types);
        }

        public function destroy($id){
         //  echo $id;
           $id=str_replace("{{ route('destroy', ","",$id);
            $id=str_replace(") }}","",$id);
            //echo $id;
          $clientes=Clientes::where('id','=',$id)->get();
          $clientes->each->delete();

          return redirect()->route('administrar');
        }
        /*
       public function edit($id){

              $id=str_replace("{{ route('edit'), ['id'=>","",$id);
               $id=str_replace("] }}","",$id);
               echo $id;
             $clientes=Clientes::where('id','=',$id)->get();
             $clientes->correo=$request->correo;
             $clientes->telefono=$request->telefono;
             $clientes->rol=$request->rol;
             $clientes->save();
             return redirect()->route('edit',$id);
           }
*/


public function storecat(Request $request){

    $request->validate([
        'nombre' => 'required|min:3'
    ]);
    //$aux=['correo', 'password', 'telefono'];
    $categorias = new categorias;
    $categorias->correo = $request->nombre;
    $categorias->save();
    return redirect()->route('crearcat')->with('success','categoria insertada con exito');
}


}
