<div class="form-group">
    @isset($title)
        <label class="text-muted">
            {{ $title }}
        </label>
    @endisset

    <p class="form-control-static form-property-static mt-2 font-weight-normal">
        {{ $slot }}
    </p>
</div>
