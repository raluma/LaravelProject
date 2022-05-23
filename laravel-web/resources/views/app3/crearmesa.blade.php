@extends('app3')

@section('content')

<div class="container w-25 border p-4 mt-5">
<form action="{{ route('crearmesa') }}"method="POST">
          @csrf
          @if (session('success'))  
                <h6 class="alert alert-success">{{session('success')}}</h6>
          @endif
          @error('numero')
            <h6 class="alert alert-danger">{{$message}}</h6>
          @enderror
          @error('capacidad')
            <h6 class="alert alert-danger">{{$message}}</h6>
          @enderror
            <div class="mb-3">
              <input type="text" name="numero"class="form-control" placeholder="numero">
            </div>
            <div class="mb-3">
              <input type="text" name="capacidad"class="form-control" placeholder="capacidad">
            </div>
            <button type="submit" class="btn btn-primary">crear</button>
            <a href="{{ route('mesas') }}" class="btn btn-primary">Volver</a>
          </form>
    </div>


@endsection