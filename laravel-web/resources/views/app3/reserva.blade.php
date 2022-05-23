@extends('app3')
@section('content')



<div class="container-fluid  w-25 p-4 mt-5 navbar-dark">
    <span class="text-light"><h2>Reservas</h2></span>

<h1><?php 
$tlf = session('tlf');
echo $tlf;
?></h1>
<table class="table table-dark table-striped table-hover table-borderless">
    <tr>
        <td>Numero</td>
        <td>Capacidad</td>
        <td>Estado</td>
        <td>Email</td>
    </tr>

    <?php
    use App\Models\mesas;
    $tables = mesas::all();
    ?>
    @foreach($tables as $table)
    <tr>
    <td>{{ $table->numero }}</td>
    <td>{{ $table->capacidad }}</td>
    <form action="{{ url('update-mesa/'.$table->id) }}" method="post">
    @csrf
   <td> <button class="btn btn-dark btn-sm">{{ $table->estado }}</button></td>
</form>
<td>{{ $table->usuario }}</td>
    </tr>
    
@endforeach
    </table>

    </div>
    
@endsection


