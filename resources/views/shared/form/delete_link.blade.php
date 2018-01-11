<form class="inline" action="{{ $action }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="DELETE">
    <a href="#delete" class="glyphicon glyphicon-trash"></a>
</form>
