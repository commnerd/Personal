<footer>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="footer-nav">
          <ul class="nav navbar-nav navbar-center">
            <li><a href="{{ route('home') }}">Home</a></li>
            @if(\App\Models\Work\PortfolioEntry::count() > 0)
                <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
            @endif
            @if(\App\Models\Work\EmploymentRecord::count() > 0)
                <li><a href="{{ route('resume') }}">Resume</a></li>
            @endif
            @if(\App\Models\Quote::count() > 0)
                <li><a href="{{ route('quotes') }}">Quotes</a></li>
            @endif
            @if(!Auth::check())
            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
            @endif
          </ul>
          <ul class="nav navbar-nav navbar-center">
            <li><a href="https://github.com/commnerd"><i class="fab fa-github fa-2x"></i></a></li>
            <li><a href="https://www.linkedin.com/in/michaeljmiller79/"><i class="fab fa-linkedin fa-2x"></i></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="copyright">
        &copy; {{ \Carbon\Carbon::now()->year }} Michael J. Miller. All rights reserved.
    </div>
</footer>
