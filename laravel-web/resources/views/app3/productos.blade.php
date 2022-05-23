@extends('app3')
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
     ?>
    <form action="{{ url('borrar-producto/'.$table->id) }}" method="post">
    @csrf
   <td> <button class="btn btn-danger btn-sm">Eliminar</button></td>
</form>

    </tr>
    
@endforeach
    </table>
  
    <a href="{{ route('crearpro') }}" class="btn btn-primary">Crear Producto</a>
    <a href="{{ route('menu3') }}" class="btn btn-primary">Volver</a>
    </div>
    
@endsection


