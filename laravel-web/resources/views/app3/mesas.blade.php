@extends('app3')
@section('content')



<div class="container-fluid  w-25 p-4 mt-5 navbar-dark">
    <span class="text-light"><h2>Mesas</h2></span>


<table class="table table-dark table-striped table-hover table-borderless">
    <tr>
        <td>Numero</td>
        <td>Capacidad</td>
        <td>Borrar</td>
    </tr>

    <?php
    use App\Models\mesas;
    $tables = mesas::all();
    ?>
    @foreach($tables as $table)
    <tr>

    <?php
    $id=$table['id'];

      echo" <td> ".$table['numero']."</td>";
      echo" <td> ".$table['capacidad']."</td>";
     ?>
       <form action="{{ url('borrar-mesa/'.$table->id) }}" method="post">
    @csrf
   <td> <button class="btn btn-danger btn-sm">Eliminar</button></td>
</form>

    </tr>
    
@endforeach
    </table>
  
    <a href="{{ route('crearmesa') }}" class="btn btn-primary">Crear mesa</a>
    </div>
    
@endsection



