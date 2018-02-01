<div class="section container-fluid">
    @include('shared.section-header', ['label' => $title])
    <iframe src="{{ $url }}"></iframe>
    <p class="col-sm-6">
        {!! $details !!}
    </p>
</div>
