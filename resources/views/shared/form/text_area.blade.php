<div class="form-group {{ !empty($errors) ? 'has-error' : '' }}">
    <label for="{{ $slug }}" class="control-label col-sm-2">{{ $label }}</label>
    <div class="col-sm-10">
        <textarea name="{{ $slug }}" class="form-control">{{ $value }}</textarea>
    </div>
</div>
