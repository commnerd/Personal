<div class="form-group {{ !empty($errors) ? ' has-error' : '' }}">
    <label for="{{ $slug }}" class="control-label col-lg-12">{{ $label }}</label>
    <div class="col-lg-12">
        <select name="{{ $slug }}" class="form-control">
            @foreach($options as $oKey => $oValue)
                <option value="{{ $oKey }}" {{ ($value ?? '') === $oValue ? 'selected' : ''}}>{{$oValue}}</option>
            @endforeach
        </select>
        @foreach($errors as $error)
            <div class="help-block">{{ $error }}</div>
        @endforeach
    </div>
</div>
