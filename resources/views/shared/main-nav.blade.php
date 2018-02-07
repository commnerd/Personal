<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}"><img height="100%" alt="Michael J. Miller" src="/storage/michael-j-miller-logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="main-nav">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('home') }}">Home</a></li>
        @if(\App\Work\EmploymentRecord::count() > 0)
            <li><a href="{{ route('resume') }}">Resume</a></li>
        @endif
        @if(\App\Work\PortfolioEntry::count() > 0)
            <li><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
        @endif
        @if(Auth::check())
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tools <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('admin') }}">Admin</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('restaurants.index') }}">Food</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
