<div class="form-group {{ !empty($errors) ? 'has-error' : '' }}">
    <label for="{{ $slug }}" class="control-label col-md-2">{{ $label }}</label>
    <div class="col-md-10">
        <textarea name="{{ $slug }}" class="form-control">{{ $value }}</textarea>
    </div>
</div>
