@extends('app')

@section('content')

    <div class="container w-25 border p-4 mt-5">
        <form action="{{ route('user.login') }}" method="POST">
          @csrf
            <div class="mb-3">
              <input type="text" name="correo"class="form-control @error('correo') is-invalid @enderror" placeholder="Correo" value="{{old('correo')}}">
              @error('correo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
            @enderror
            </div>

            <div class="mb-3">
              <input type="password" name="password"class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" value="{{old('password')}}"> 
              @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
            </div>
          
            <button type="submit" class="btn btn-primary">Acceder</button>
            <a href="{{ route('registrar') }}" class="btn btn-primary">Registrar</a>

          </form>
    </div>

@endsection
