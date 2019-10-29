@php
$count = $dimmers->count();
$classes = [
    'col-xs-12',
    'col-sm-'.($count >= 2 ? '6' : '12'),
    'col-md-'.($count >= 3 ? '4' : ($count >= 2 ? '6' : '12')),
];
$class = $class ?? implode(' ', $classes);
$prefix = "<div class='{$class}'>";
$surfix = '</div>';
$indexOffset = 0;
@endphp
@if ($dimmers->count() > 0)
    @foreach($dimmers as $index => $dimmer)
        @if(($index - $indexOffset) % 3 == 0)
            <div class="clearfix container-fluid row">
        @endif
        @if($dimmer instanceof \App\Voyager\Widgets\SpanningDimmer)
            @php
                $indexOffset = ($index + 1) % 3;
            @endphp
            @if(($index - $indexOffset) % 3 > 0)
                <div class="clearfix container-fluid row">
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12">
                {!! $dimmer->run() !!}
            </div>
            @if(($index - $indexOffset) % 3 < 2 || $index >= $count - 1)
                </div>
            @endif
        @else
            {!! $prefix.$dimmer->run().$surfix !!}
        @endif
        @if(($index - $indexOffset) % 3 == 2 || $index >= $count - 1)
            </div>
        @endif
    @endforeach
@endif
