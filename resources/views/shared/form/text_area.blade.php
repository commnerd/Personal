<div class="form-group {{ !empty($errors) ? 'has-error' : '' }}">
    <label for="{{ $slug }}" class="control-label col-lg-12">{{ $label }}</label>
    <div class="col-lg-12">
        <div class="quill-editor form-control">{!! $value !!}</div>
        <input type="hidden" name="{{ $slug }}" value="{!! $value !!}" class="quill-contents" />
        @foreach($errors as $error)
            <div class="help-block">{{ $error }}</div>
        @endforeach
    </div>
</div>
