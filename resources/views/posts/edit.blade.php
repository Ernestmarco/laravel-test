@extends('plantilla')
@section('titulo', 'Nuevo post')
@section('contenido')


    <div class="">
        <h2 class="card-header d-flex justify-content-between my-2"> Editar post {{ $post->titol }} <span class=" small">
        </h2>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titol" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titol" id="titol"
                    value="{{ old('titol') ?? $post->titol }}">
                @error('titol')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contingut" class="form-label">Contenido:</label>
                <textarea name="contingut" id="contingut" class="form-control" rows="5">{{ old('contingut') ?? $post->contingut }}</textarea>
                @error('contingut')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>
        </form>
    </div>






@endsection
