@extends('app3')

@section('content')

<div class="container w-25 border p-4 mt-5">
<form action="{{ route('crearpro') }}"method="POST">
          @csrf
          @if (session('success'))  
                <h6 class="alert alert-success">{{session('success')}}</h6>
          @endif
          @error('nombre')
            <h6 class="alert alert-danger">{{$message}}</h6>
          @enderror
          @error('precio')
            <h6 class="alert alert-danger">{{$message}}</h6>
          @enderror
          @error('stock')
            <h6 class="alert alert-danger">{{$message}}</h6>
          @enderror
            <div class="mb-3">
              <input type="text" name="nombre"class="form-control" placeholder="Nombre">
            </div>
            <div class="mb-3">
              <input type="text" name="precio"class="form-control" placeholder="Precio">
            </div>
            <div class="mb-3">
              <input type="text" name="stock"class="form-control" placeholder="stock">
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="{{ route('menu3') }}" class="btn btn-primary">Volver</a>
          </form>
    </div>


@endsection