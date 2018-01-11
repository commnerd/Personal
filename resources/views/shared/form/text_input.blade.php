<div class="form-group {{ !empty($errors) ? 'has-error' : '' }}">
    <label for="{{ $slug }}" class="control-label col-md-2">{{ $label }}</label>
    <div class="col-md-10">
        <input type="text" name="{{ $slug }}" value="{{ $value }}" class="form-control">
        @foreach($errors as $error)
            <div class="help-block">{{ $error }}</div>
        @endforeach
    </div>
</div>
