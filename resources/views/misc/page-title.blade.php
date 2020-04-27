<!-- HEADER -->
<div class="header">
    <!-- Body -->
    <div class="header-body">
        <div class="row align-items-center">

            @isset($start)
                <div class="col-auto pr-0">
                    {{ $start }}
                </div>
                <!-- END col -->
            @endisset

            <div class="col">
                @isset($preTitle)
                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                        {{ $preTitle }}
                    </h6>
                @endisset

                <!-- Title -->
                <h1 class="header-title">
                    {{ $slot }}
                </h1>
            </div>
            <!-- END col -->

            @isset($superactions)
                <div class="col-auto">
                    {{ $superactions }}
                </div>
                <!-- END col -->
            @endisset
        </div>
        <!-- END row -->

        {{ $segments ?? '' }}
    </div>
    <!-- END header-body -->
</div>
<!-- END header -->
