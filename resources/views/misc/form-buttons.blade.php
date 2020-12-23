<div class="form-group d-flex justify-content-end">
    <a href="{{ $cancelRoute ?? resource('index') }}" class="btn btn-link text-muted">
        {{ $cancelTitle ?? trans('nexus::resource.cancel-form-button') }}
    </a>

    <button type="submit" class="btn btn-primary btn-activity">
        {{ $submitTitle ?? trans('nexus::resource.submit-form-button') }}
    </button>
</div>
