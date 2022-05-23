@extends('app3')

@section('content')



<div class="container-fluid  w-25 p-4 mt-5 navbar-dark">
    <span class="text-light"><h2>Usuarios</h2></span>


<table class="table table-dark table-striped table-hover table-borderless">
    <tr>
        <th>correo</th>
        <th>telefono</th>
        <th>Rol</th>
        <th>Eliminar</th>
      <!--  <th>Modificar</th> -->
    </tr>
    <?php
    use App\Models\clientes; 
    $tables = clientes::all();
    ?>
    @foreach($tables as $table)
    <tr>
    <?php
      echo" <td>".$table['correo']."</td>";
      echo" <td>".$table['telefono']."</td>";
      echo" <td>".$table['rol']."</td>";
     ?>
    <form action="{{ route('destroy', <?php 
    $id=$table['id'];
    echo $id;?>) }}" method="post">
    @method('post')
    @csrf
   <td> <button class="btn btn-danger btn-sm">Eliminar</button></td>
</form>
<!--
<form action="{{ route('editar'),'id'=><?php /*
    $id=$table['id'];
    echo $id;*/?> }}" method="post">
    @method('PATCH')
    @csrf
   <td> <button class="btn btn-primary btn-sm">Editar</button></td>
</form>
-->
    </tr>
    
@endforeach
    </table>
  
    <a href="{{ route('crear') }}" class="btn btn-primary">Crear usuarios</a>
    </div>
    
@endsection


