<footer>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        @if(\App\PortfolioEntry::count() > 0)
            <a href="{{ route('portfolio.index') }}">Portfolio</a>
        @endif
    </nav>
    <div class="copyright">
        &copy; {{ \Carbon\Carbon::now()->year }} Michael J. Miller. All rights reserved.
    </div>
    <nav class="social">
        <a href="#"><i class="fas fa-camera-retro"></i></a>
    </nav>
</footer>
