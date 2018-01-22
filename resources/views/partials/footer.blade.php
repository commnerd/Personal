<footer>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('portfolio.index') }}">Portfolio</a>
    </nav>
    <div class="copyright">
        &copy; {{ \Carbon\Carbon::now()->year }} Michael J. Miller. All rights reserved.
    </div>
    <nav class="social">
        <a href="#"><i class="fas fa-camera-retro"></i></a>
    </nav>
</footer>
