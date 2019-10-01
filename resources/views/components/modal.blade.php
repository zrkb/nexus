<div
	id="station-modal-picker"
	class="modal fade"
	tabindex="-1"
	role="dialog"
	aria-labelledby="station-modal-picker-title"
	aria-hidden="true"
	data-backdrop="static"
	@if (isset($show) && is_null($show) == false && $show == 'true')
		data-show="true"
	@endif>

	<div class="modal-dialog {{ $size ?? '' }} modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="station-modal-picker-title">{{ $title }}</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{{ $slot }}
			</div>
			<div class="modal-footer d-block">
				{{ $footer ?? '' }}
			</div>
		</div>
	</div>
</div>