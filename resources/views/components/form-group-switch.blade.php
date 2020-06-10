<div class="row">
    <div class="col-12 col-md-6">

        <div class="form-group">

            @isset($title)
                {{ form()->label($field, $title, ['class' => 'control-label']) }}
            @endisset

            @isset($description)
                <small class="form-text text-muted">
                    {{ $description }}
                </small>
            @endisset
        </div>
        <!-- END form-group -->

    </div>
    <!-- END col -->

    <div class="col-12 col-md-6 text-right d-flex align-items-center justify-content-end">
        <div class="form-group">
            <!-- Switch -->
            <div class="custom-control custom-switch d-inline-block">
                {{ form()->checkbox($field, $value ?? 1, old() ? ($default ?? null) : (isset($model) && $model ? $model->{$field} : ($default ?? null)), ['class' => 'custom-control-input', 'id' => $field]) }}
                <label class="custom-control-label" for="{{ $field }}"></label>
            </div>
        </div>
        <!-- END form-group -->

    </div>
    <!-- END col -->
</div>
<!-- END row -->
