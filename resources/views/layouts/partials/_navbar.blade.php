<nav class="navbar navbar-expand-md navbar-light bg-white px-2">
    <a class="navbar-brand" href="/">
        <img src="{{asset('logo.jpg')}}" alt="Footy Finder Logo" class="navbar-brand-logo">
        <span>Footy Finder PH</span>
    </a>
    <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
        <ul class="navbar-nav">
            @auth
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-gear-fill"></i> Dashboard</a></li>
                <li class="nav-item">
                    <form method="POST" action="{{route('user.logout')}}" id="logout-form">
                        @csrf
                        <a href="javascript:logout()" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </form>
                </li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-person-circle"></i></li>
            @else
                <li class="nav-item"><a href="{{route('register.create')}}" class="nav-link">Register</a></li>
                <li class="nav-item"><a href="{{route('user.login')}}" class="nav-link">Login</a></li>
            @endauth
        </ul>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>