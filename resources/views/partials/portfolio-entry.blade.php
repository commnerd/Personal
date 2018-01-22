<div class="section container-fluid">
    @include('partials.section-header', ['label' => $title])
    <iframe src="{{ $url }}"></iframe>
    <p class="col-md-6">
        {!! $details !!}
    </p>
</div>
