@extends('nexus::auth/container')

@section('auth')

    <div class="card card-body">
		<!-- Heading -->
		<h1 class="display-5 text-center mb-3">
			@lang('nexus::login.welcome-title')
		</h1>

		<!-- Subheading -->
		<p class="text-muted text-center mb-5">
			@lang('nexus::login.welcome-slogan')
		</p>
		<!-- Form -->
		<form action="{{ admin_base_path('login') }}" method="POST">
			@csrf
			<!-- Email address -->
			<div class="form-group">
				<!-- Label -->
				<label>
					@lang('nexus::login.user-label')
				</label>
				<!-- Input -->
				<input
					name="email"
					type="email"
					class="form-control"
					placeholder="@lang('nexus::login.user-placeholder')">
			</div>
			<!-- Password -->
			<div class="form-group">
				<!-- Label -->
				<label>
					@lang('nexus::login.password-label')
				</label>
				<!-- Input -->
				<input
					name="password"
					type="password"
					class="form-control"
					placeholder="@lang('nexus::login.password-placeholder')">
			</div>
			<!-- Submit -->
			<button class="btn btn-block btn-primary mb-3">
				@lang('nexus::login.submit-label')
			</button>
		</form>
	</div>

	@if (config('nexus.registration_enabled'))
		<!-- Link -->
		<div class="text-center mt-4">
			<span class="text-muted text-center">
				@lang('nexus::login.footer')
			</span>
		</div>
	@endif

@endsection
