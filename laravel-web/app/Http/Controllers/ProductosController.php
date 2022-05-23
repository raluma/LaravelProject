<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\productos;

use Auth;


class ProductosController extends Controller
{
  

    public function storepro(Request $request){
        $idpro = session('idpro');
        $request->validate([
            'nombre' => 'required|min:3',
            'precio' => 'required|min:1',
            'stock' => 'required|min:1'
    
        ]);

       $productos = new Productos;
       $productos->nombre = $request->nombre;
       $productos->precio = $request->precio;
       $productos->stock = $request->stock;
       $productos->idcategoria =$idpro;
       $productos->save();
        return redirect()->route('crearpro')->with('success','Producto insertado con exito');
    }


    public function destroypro($id){

        $productos =Productos::where('id',$id)->first();

        if ($productos != null) {
            $productos->delete();
            return redirect()->route('menu3')->with(['message'=> 'Successfully deleted!!']);
        }
      
        return redirect()->route('menu3')->with(['message'=> 'Wrong ID!!']);irect()->route('menu3');
        
       }

}
