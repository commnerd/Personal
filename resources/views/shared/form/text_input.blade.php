<div class="form-group {{ !empty($errors) ? ' has-error' : '' }}">
    <label for="{{ $slug }}" class="control-label col-lg-12">{{ $label }}</label>
    <div class="col-lg-12">
        <input type="text" name="{{ $slug }}" value="{{ $value }}" class="form-control">
        @foreach($errors as $error)
            <div class="help-block">{{ $error }}</div>
        @endforeach
    </div>
</div>
