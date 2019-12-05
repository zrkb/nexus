<div class="form-group">
	<a href="{{ $cancelRoute ?? resource('index') }}" class="btn btn-white mr-2">
		{{ $cancelTitle ?? trans('nexus::resource.cancel-form-button') }}
	</a>

	<button type="submit" class="btn btn-primary btn-activity">
		{{ $submit ?? trans('nexus::resource.submit-form-button') }}
	</button>
</div>