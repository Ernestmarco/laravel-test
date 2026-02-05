@extends('plantilla')
@section('titulo', 'Ficha post')
@section('contenido')


<div class="">
    <h2 class="card-header d-flex justify-content-between my-2"> {{ $post->titol }} <span class=" small"> </h2> 
    
    <p class="card-text">{{ $post->contingut }}</p>
    <div class="d-flex justify-content-between"><a href="{{ route('posts.index') }}" class="card-link"><i class="bi bi-arrow-left-circle"></i></a><span class="text-body-secondary">{{ $post->created_at?->format('d/m/Y') }} | <i class="bi bi-person-square"></i> <strong>{{ $post->usuari->login}}</strong></span></div>
    
</div>

<div>
    <div class="my-4">
        <h3>Comentaris</h3>
        @forelse($post->comentaris as $comentari)
        <div class="card my-4">
            <p class="card-header d-flex justify-content-between"><strong>{{ $comentari->usuari->login}}</strong> <span class=" text-body-secondary">{{ $post->created_at?->format('d/m/Y') }}</span></p>
            <div class="card-body">
                <p class="card-text">{{ $comentari->contingut }}</p>
            </div>
        </div>
        @empty
        Ningú ha comentat encara
        @endforelse
    </div>
</div>




@endsection
