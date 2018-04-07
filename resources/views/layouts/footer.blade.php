<footer class="text-muted">
    <div class="container">
        <p>&copy; {{ now()->year }} Tinybot. All rights reserved.</p>
        @if (Auth::check())
            <p>Logged in: TRUE - {{ Auth::user()->name }}</p>
        @else
            <p>Logged in: FALSE</p>
        @endif
        <p>Local timezone: UNKNOWN</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>