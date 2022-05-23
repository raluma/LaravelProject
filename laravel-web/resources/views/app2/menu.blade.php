@extends('app2')
@section('content')
<div class="container-fluid  w-25 p-4 mt-5 navbar-dark">
    <span class="text-light"><h2>Categorías</h2></span>


<table class="table table-dark table-striped table-hover table-borderless">

    <?php
    use App\Models\categorias;
    $tables = categorias::all();
    ?>
    @foreach($tables as $table)
    <tr>

    <?php
    $id=$table['id'];

      echo" <td> <a href='productos2?id=$id' class='btn btn-dark'>".$table['nombre']."</a></td>";
     ?>


    </tr>
    
@endforeach
    </table>
  
    </div>      
    
@endsection
