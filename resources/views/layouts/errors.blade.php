@if ($errors->any())
	<div class="alert alert-danger my-5">
		<button type="button" class="close px-2" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>

		@if ($errors->count() == 1)
			{{ $errors->first() }}
		@else
			<ul class="m-0">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
	</div>
@endif
