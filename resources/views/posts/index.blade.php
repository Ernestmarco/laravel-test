@extends('plantilla')
@section('titulo', 'Listado de posts')
@section('contenido')
    <h1>Listado de posts</h1>
    @if (session()->has('mensaje_ok'))
        <div class="alert alert-success">
            {{ session('mensaje_ok') }}
        </div>
    @endif
    @forelse ($posts as $post)
        <div class="card my-2">
            <div class="card-body">

                <a class="btn btn-dark" href="{{ route('posts.show', $post) }}"><i class="bi bi-eyeglasses"></i></a>
                @if(auth()->check() && auth()->user()->id == $post->usuari->id)
                    <a class="btn btn-dark" href="{{ route('posts.edit', $post) }}"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="bi bi-trash "></i></button>
                    </form>
                @endif
                {{ $post->titol }} | <span class="small"> <i class="bi bi-person-square"></i>
                    <strong>{{ $post->usuari->login }}</strong></span>
            </div>
        </div>
    @empty
        <h2>Encara no hi ha cap post publicat</h2>
    @endforelse
    <div class="my-4">
        {{ $posts->links() }}
    </div>


@endsection
