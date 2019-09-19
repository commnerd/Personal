<div class="section">
    @include('shared.section-header', ['label' => $title])
    <iframe src="{{ $url }}"></iframe>
    <p class="col-sm-6">
        {!! $details !!}
    </p>
</div>
