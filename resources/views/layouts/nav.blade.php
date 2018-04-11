<header>
    <nav class="navbar bg-dark navbar-dark navbar-expand-sm">
        <div class="container">
            <a href="/" class="navbar-left"><img src="{{ asset('images/toilet_sign.png') }}" class="toilet img-responsive"></a>
            <a class="navbar-brand" href="/">BFN100</a>
            <button class="navbar-toggler" type="button"
                data-toggle="collapse"
                data-target="#myTogglerNav"
                aria-controls="myTogglerNav"
                aria-expanded="false"
                aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="myTogglerNav">
                <div class="navbar-nav ml-auto">
                    @if (! Auth::check())
                        <a class="nav-item nav-link" href="/login">Login</a>
                        <a class="nav-item nav-link" href="/register">Register</a>
                    @else
                        <a class="nav-item nav-link" href="/pushups/create">Submit</a>
                        <a class="nav-item nav-link" href="/users/">Users</a>
                        <a class="nav-item nav-link" href="/logout">Logout</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>