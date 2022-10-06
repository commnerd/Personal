<div class="panel widget center bgimage col-12" style="margin-bottom:0;height:355px;overflow:hidden;background-image:url('{{ $image }}');">
    <div class="dimmer"></div>
    <div class="panel-content">
        @if (isset($icon))<i class='{{ $icon }}'></i>@endif
        <h4>{!! $title !!}</h4>
        <div class="col-sm-12">
            <div class="list-group">
                <span class="list-group-item">
                    <span class="item-label">Uptime:</span>
                    <span class="item-value">{{ $uptime }}</span>
                </span>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="list-group">
                <span class="list-group-item">
                    <span class="item-label">OS:</span>
                    <span class="item-value">{{ $os }}</span>
                </span>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="list-group">
                <span class="list-group-item">
                    <span class="item-label">Disk Usage:</span>
                    <span class="item-value">{{ $diskUsage }}</span>
                </span>
            </div>
        </div>
    </div>
</div>
