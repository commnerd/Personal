<footer>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="footer-nav">
          <ul class="nav navbar-nav navbar-center">
            <li><a href="{{ route('home') }}">Home</a></li>
            @if(\App\Work\PortfolioEntry::count() > 0)
                <li><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
            @endif
            @if(\App\Work\EmploymentRecord::count() > 0)
                <li><a href="{{ route('resume.index') }}">Resume</a></li>
            @endif
            @if(!Auth::check())
            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="copyright">
        &copy; {{ \Carbon\Carbon::now()->year }} Michael J. Miller. All rights reserved.
    </div>
    <!-- nav class="social">
        <a href="#"><i class="fas fa-camera-retro"></i></a>
    </nav -->
</footer>
