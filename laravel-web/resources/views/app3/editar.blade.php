@extends('app3')

@section('content')


<div class="container w-25 border p-4 mt-5">
<form action="" method="POST">
          @method('PATCH')
          @csrf
          @if (session('success'))  
                <h6 class="alert alert-success">{{session('success')}}</h6>
          @endif
          @error('correo')
            <h6 class="alert alert-danger">{{$message}}</h6>
          @enderror
          @error('password')
            <h6 class="alert alert-danger">{{$message}}</h6>
          @enderror
          @error('telefono')
            <h6 class="alert alert-danger">{{$message}}</h6>
          @enderror
            <div class="mb-3">
              <input type="text" name="correo"class="form-control" placeholder="Correo">
            </div>
            <div class="mb-3">
              <input type="password" name="password"class="form-control" placeholder="Contraseña">
            </div>
            <div class="mb-3">
              <input type="text" name="telefono"class="form-control" placeholder="telefono">
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="rol">
                    <option selected>Seleciona un rol</option>
                    <option value="e">Empleado</option>
                    <option value="s">Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="{{ route('administrar') }}" class="btn btn-primary">Volver</a>
          </form>
    </div>

@endsection
