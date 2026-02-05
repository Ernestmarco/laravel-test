@extends('plantilla')
@section('titulo', 'Login')
@section('contenido')
    <h1>Login</h1>
    @error('login')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group" class="mb-4">
            <label for="login">Login:</label>
            <input type="text" class="form-control" name="login" id="login" value="{{ old('login') }}" />
        </div>
        <div class="form-group" class="mb-4">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password" />
        </div>
        <input type="submit" name="enviar" value="Enviar" class="btn btn-dark
btn-block mt-4">
    </form>


@endsection
