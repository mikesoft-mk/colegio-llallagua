<div class="top-bar bg-white border-bottom">

    <div class="container">

        <div class="row align-items-center">

            <!-- Contacto -->

            <div class="col-lg-6 col-md-7 text-center text-md-left d-none d-md-block">

                <small>

                    <i class="fas fa-phone-alt text-primary mr-2"></i>

                    +591 12345678

                    <span class="mx-3 text-muted">|</span>

                    <i class="fas fa-envelope text-primary mr-2"></i>

                    info@empresa.com

                </small>

            </div>

            <!-- Botones -->

            <div class="col-lg-6 col-md-5 text-center text-md-right mt-2 mt-md-0">

                @auth

                    <a href="{{ route('home') }}"
                       class="btn btn-sm btn-outline-primary">

                        Panel principal

                    </a>

                @else

                    <a href="{{ route('login') }}"
                       class="btn btn-sm btn-primary">

                        Iniciar Sesión

                    </a>

                @endauth

            </div>

        </div>

    </div>

</div>