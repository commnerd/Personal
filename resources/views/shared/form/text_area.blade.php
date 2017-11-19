<div class="form-group has-error">
    <label for="{{ $slug }}" class="control-label col-md-2">{{ $label }}</label>
    <div class="col-md-10">
        <textarea name="{{ $slug }}" class="form-control">{{ $value }}"</textarea>
        @if(isset($help))<span class="help-block">{{ $help }}</span>@endif
    </div>
</div>
