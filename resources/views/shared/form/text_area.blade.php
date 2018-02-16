<div class="form-group {{ !empty($errors) ? 'has-error' : '' }}">
    <label for="{{ $slug }}" class="control-label col-lg-12">{{ $label }}</label>
    <div class="col-lg-12">
        <textarea name="{{ $slug }}" class="form-control">{{ $value }}</textarea>
        @foreach($errors as $error)
            <div class="help-block">{{ $error }}</div>
        @endforeach
    </div>
</div>
