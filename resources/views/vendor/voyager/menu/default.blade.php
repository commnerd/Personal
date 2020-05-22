@php

    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }

@endphp

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
        @foreach ($items as $item)

          @php

            $originalItem = $item;
            if (Voyager::translatable($item)) {
                $item = $item->translate($options->locale);
            }

            $isActive = null;
            $styles = null;
            $icon = null;

            // Background Color or Color
            if (isset($options->color) && $options->color == true) {
                $styles = 'color:'.$item->color;
            }
            if (isset($options->background) && $options->background == true) {
                $styles = 'background-color:'.$item->color;
            }

            // Check if link is current
            if(url($item->link()) == url()->current()){
                $isActive = 'active';
            }

            // Set Icon
            if(isset($options->icon) && $options->icon == true){
                $icon = '<i class="' . $item->icon_class . '"></i>';
            }

          @endphp

          <li class="{{ $isActive }}">
              <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}">
                  {!! $icon !!}
                  <span>{{ $item->title }}</span>
              </a>
              @if(!$originalItem->children->isEmpty())
                  @include('voyager::menu.default', ['items' => $originalItem->children, 'options' => $options])
              @endif
          </li>

        @endforeach
        @if(Auth::check())
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tools <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @if(Auth::user()->hasPermission('browse_admin'))
                    <li><a href="{{ url('/admin') }}">Admin</a></li>
                    <li role="separator" class="divider"></li>
                @endif
                <li><p class="navbar-text">Food</p></li>
                <li><a href="{{ route('restaurants.index') }}">Edit</a></li>
                <li><a href="{{ route('food.search') }}">Search</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
