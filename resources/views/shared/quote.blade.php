<div class="section container-fluid quote">
    @include('shared.section-header', ['label' => $quote->source])
    <blockquote>
        <p>{!! $quote->quote !!}</p>
    </blockquote>
</div>
