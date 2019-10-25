<div class="panel widget center bgimage" style="margin-bottom:0;height:355px;overflow:hidden;background-image:url('{{ $image }}');">
    <div class="dimmer"></div>
    <div class="panel-content">
        @if (isset($icon))<i class='{{ $icon }}'></i>@endif
        <h4>{!! $title !!}</h4>
        <a href="{{ $button['link'] }}" class="btn btn-primary">{!! $button['text'] !!}</a>
    </div>
</div>
