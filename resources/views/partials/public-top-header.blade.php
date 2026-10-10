<div class="top-bar">
    <div class="container top-bar-content">
        <div class="top-bar-contact d-none d-md-flex">
            <span><i class="fas fa-phone-alt"></i> +591 12345678</span>
            <span><i class="fas fa-envelope"></i> secretaria@colegio.edu.bo</span>
        </div>
        <div class="top-bar-action">
            @auth
                <a href="{{ route('home') }}"><i class="fas fa-th-large"></i> Panel principal</a>
            @else
                <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
            @endauth
        </div>
    </div>
</div>
