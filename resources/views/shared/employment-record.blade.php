<div class="container-fluid record">
    <div class="col-lg-12 bold">
        {{ $position }}, {{ $employer }}
    </div>
    <div class="col-lg-12">
        {{ $location }} | {{ $start_date}} - {{ $end_date ?? "Present" }}
    </div>
    <div class="col-lg-12">
        {!! nl2br($bullets) !!}
    </div>
</div>
