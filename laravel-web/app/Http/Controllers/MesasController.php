<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mesas;
use Auth;


class MesasController extends Controller
{


  public function storemesa(Request $request){

    $request->validate([
        'numero' => 'required|min:1',
        'capacidad' => 'required|min:1'

    ]);
    //$aux=['correo', 'password', 'telefono'];
   $mesas = new Mesas;
   $mesas->numero = $request->numero;
   $mesas->estado = "a";
   $mesas->capacidad = $request->capacidad;
   $mesas->usuario ="libre";
   $mesas->save();
    return redirect()->route('crearmesa')->with('success','Mesa insertada con exito');
}


public function destroymesa($id){

  $mesas =Mesas::where('id',$id)->first();

  if ($mesas != null) {
      $mesas->delete();
      return redirect()->route('mesas')->with(['message'=> 'Successfully deleted!!']);
  }

  return redirect()->route('mesas')->with(['message'=> 'Wrong ID!!']);

 }

       
       public function update($id)
       {
          $mesas = Mesas::find($id);
          $usu = session('usu');
          $tlf   = session('tlf ');
          if (  $mesas->estado === "a") {
            $mesas->estado = "r";
            $mesas->usuario=$usu;
          }else {
            $mesas->estado = "a";
            $mesas->usuario="libre";
          }
           
           
           $mesas->update();
           return redirect()->back()->with('status','mesa actualizada');
       }

}



