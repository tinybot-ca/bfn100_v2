<footer class="text-muted">

    <div class="container-fluid dark-bg pt-4 pb-4">

        <div class="container mono">
            <p>&copy; {{ now()->year }} Tinybot. All rights reserved.</p>
            @if (Auth::check())
                <p>Logged in: TRUE - {{ Auth::user()->name }}</p>
            @else
                <p>Logged in: FALSE</p>
            @endif
            <p>Local timezone: UNKNOWN</p>
            <p>Version: 2.0.0</p>
        </div>

    </div>

</footer>
