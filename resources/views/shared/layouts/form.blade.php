<form method="get" action="@yield('action')">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="@yield('method')">
    @yield('content')
</form>
