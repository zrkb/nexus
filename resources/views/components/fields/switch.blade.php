@php
    $checked = false;

    if (old()) {
        $checked = null;
    } else {
        if (isset($model) && $model) {
            $checked = (bool) $model->{$field};
        } else {
            $checked = $default ?? null;
        }
    }
@endphp

<div class="row">
    <div class="col-12 col-md-6">
        @isset($title)
            {{ form()->label($field, $title, ['class' => 'control-label']) }}
        @endisset

        @isset($description)
            <small class="form-text text-muted">
                {{ $description }}
            </small>
        @endisset
    </div>
    <!-- END col -->

    <div class="col-12 col-md-6 text-right d-flex align-items-center justify-content-end">
        <!-- Switch -->
        <div class="custom-control custom-switch d-inline-block">
            {{ form()->checkbox($field, $value ?? 1, $checked, ['class' => 'custom-control-input', 'id' => $field]) }}
            <label class="custom-control-label" for="{{ $field }}"></label>
        </div>
    </div>
    <!-- END col -->
</div>
<!-- END row -->
