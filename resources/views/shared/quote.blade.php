<div class="section quote">
    @include('shared.section-header', ['label' => $quote->source])
    <blockquote>
        <p>{!! $quote->quote !!}</p>
    </blockquote>
</div>
