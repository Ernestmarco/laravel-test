<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Blog DWES IESME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link  {{ setActivo('inicio') }}" href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActivo('posts.*') }}" href="{{ route('posts.index') }}">Posts</a>
                </li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ setActivo('login') }}" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ setActivo('posts.*') }}" href="{{ route('posts.create') }}">Crear post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ setActivo('login') }}" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<div class="bg-light py-2">
    <div class="container text-end text-muted small">
        <?= fechaActual('d/m/Y') ?>
    </div>
</div>
