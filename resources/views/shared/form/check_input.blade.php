<div class="form-group {{ !empty($errors) ? ' has-error' : '' }}">
    <label for="{{ $slug }}" class="col-lg-12">
        <input type="checkbox" name="{{ $slug }}" value="{{ $value }}">
        {{ $label }}
    </label>
    @foreach($errors as $error)
        <div class="help-block">{{ $error }}</div>
    @endforeach
</div>
