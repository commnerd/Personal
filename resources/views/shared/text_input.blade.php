<div class="form-group has-error">
    <label for="{{ $slug }}" class="control-label col-md-2">{{ $label }}</label>
    <div class="{{$classes}}">
        <input type="text" name="{{ $slug }}" class="form-control">
        @if(isset($help))<span class="help-block">{{ $help }}</span>@endif
    </div>
</div>
