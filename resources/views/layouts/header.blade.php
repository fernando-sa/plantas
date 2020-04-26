<div class="mb-5">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase" id="mainNav">

        <div class="container">

            <a class="navbar-brand js-scroll-trigger" href="/">Plantas!</a>

            <button onclick="showNavbarResponsive()" class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button">
                Menu
                <i class="fas fa-bars"></i>
            </button>


            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Quero cuidar de plantas</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Preciso que cuidem das minhas plantinhas</a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('login')  }}">Entrar</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('newPlantCare')  }}">Preciso que cuidem das minhas plantinhas!</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div style="top: 0; position:fixed;width:100%;z-index: 999">
        <div class="col-12 py-2 px-4 @if(! Session::has('errors')) d-none @endif" style="background-color: #F77" id="sessionErrorsDisplay">
            @if (isset($errors) && $errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            {{ session()->forget('errors') }}
            @endif            
        </div>
        <div class="col-12 py-2 px-4 " style="background-color: #F77; display: none" id="alertsErrorsDisplay">
            <ul id="alertsErrorsList">

            </ul>
        </div>
    </div>
</div>

<script>
    function showNavbarResponsive(){
        let navbar = document.getElementById('navbarResponsive');
        if(navbar.classList.contains('show'))
            navbar.classList.remove('show');
        else
            navbar.classList.add('show');
    }
</script>