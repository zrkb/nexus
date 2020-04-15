<div class="row">
    <div class="col-12 col-md-6">

        <div class="form-group">

            <!-- Label -->
	        {{ form()->label($field->attribute, $field->name, ['class' => 'control-label']) }}

            @if ($field->helpText)
            <!-- Text -->
            <small class="form-text text-muted">
                {{ $field->helpText }}
            </small>
            @endif
        </div>
        <!-- END form-group -->

    </div>
    <!-- END col -->

    <div class="col-12 col-md-6 text-right d-flex align-items-center justify-content-end">

        <div class="form-group">
            <!-- Switch -->
            <div class="custom-control custom-switch d-inline-block">
                <input type="hidden" name="{{ $field->attribute }}" value="0" />
                {{ form()->checkbox($field->attribute, 1, old() ? null : (isset($item) ? $item->getAttribute($field->attribute) : null), ['class' => 'custom-control-input', 'id' => $field->attribute]) }}
                <label class="custom-control-label" for="{{ $field->attribute }}"></label>
            </div>
        </div>
        <!-- END form-group -->

    </div>
    <!-- END col -->
</div>
<!-- END row -->
