@php
$count = $dimmers->count();
$classes = [
    'col-xs-12',
    'col-sm-'.($count >= 2 ? '6' : '12'),
    'col-md-'.($count >= 3 ? '4' : ($count >= 2 ? '6' : '12')),
];
$class = implode(' ', $classes);
$prefix = "<div class='{$class}'>";
$surfix = '</div>';
@endphp
@if ($dimmers->count() > 0)
<div class="clearfix container-fluid row">
    @foreach($dimmers as $index => $dimmer)
        {!! $prefix.$dimmer->run().$surfix !!}
        @if($index % 4 && $index < $dimmers->count() - 2)
            </div><div class="row">
        @endif
    @endforeach
</div>
@endif
