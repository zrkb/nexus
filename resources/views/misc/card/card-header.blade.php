<div class="card-header">
    <div class="row align-items-center">
        <div class="col">
            @isset ($title)
                <!-- Title -->
                <h4 class="card-header-title">
                    {!! $title !!}
                </h4>
            @endisset
        </div>
        
        @isset($extra)
            <div class="col-auto">
                {{ $extra }}
            </div>
        @endisset
    </div>
</div>