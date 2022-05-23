<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\categorias;
use App\Models\productos;

use Auth;
class CategoriasController extends Controller
{
    public function storecat(Request $request){

        $request->validate([
            'nombre' => 'required|min:4'
        ]);
        $categorias = new Categorias;
        $categorias->nombre = $request->nombre;
        $categorias->save();
        return redirect()->route('crearcat')->with('succses','categoria insertada con exito');
    }


    public function destroycat($id){
        //  echo $id;
          $id=str_replace("{{ route('destroycat', ","",$id);
           $id=str_replace(") }}","",$id);
           //echo $id;
         $categorias=Categorias::where('id','=',$id)->get();
         $productos=Productos::where('idcategoria','=',$id)->get();
         $categorias->each->delete();
         $productos->each->delete();

         return redirect()->route('menu3');
       }


}
