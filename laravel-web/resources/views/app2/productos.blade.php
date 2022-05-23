@extends('app2')
@section('content')



<div class="container-fluid  w-25 p-4 mt-5 navbar-dark">
    <span class="text-light"><h2>Productos</h2></span>


<table class="table table-dark table-striped table-hover table-borderless">

    <?php
    use App\Models\productos;
   $idpro=$_GET['id'];
    session(['idpro' => $idpro]);
    $tables = Productos::where('idcategoria','=',$idpro)->get();
    ?>
    @foreach($tables as $table)
    <tr>

    <?php
 

      echo" <td> <a href='#' class='btn btn-dark'>".$table['nombre']."</a></td>";
      echo" <td> <a href='#' class='btn btn-dark'>".$table['precio']."€</a></td>";
     ?>


    </tr>
    
@endforeach
    </table>
  
    <a href="{{ route('menu2') }}" class="btn btn-primary">Volver</a>
    </div>
    
@endsection


