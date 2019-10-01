@extends('laramie::layouts/app')

@section('content')
<div class="mb-4">
	<div class="superactions float-right">
	</div>

	<h2 class="page-title">
		Bienvenido
	</h2>
</div>
	<div class="jumbasdd">
		<p class="lead mb-5 col-10 m-0 p-0">@lang('laramie::messages.splash-message')</p>
		<p>
			<a href="{{ route('admins.index') }}">
				<i data-feather="chevron-right" class="feather"></i>
				@lang('laramie::messages.splash-admins-menu')
			</a>
		</p>
		<p>
			<a href="{{ route('roles.index') }}">
				<i data-feather="chevron-right" class="feather"></i>
				@lang('laramie::messages.splash-rbac-menu')
			</a>
		</p>
		<p>
			<a href="javascript:;">
				<i data-feather="chevron-right" class="feather"></i>
				@lang('laramie::messages.splash-settings-menu')
			</a>
		</p>
	</div>
@endsection
