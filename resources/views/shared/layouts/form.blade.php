<form method="POST" action="@yield('action')">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="@yield('method')">
    @yield('form_content')
</form>
