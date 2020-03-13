@extends('nexus::auth/container')

@section('auth')

	<div class="card card-body">
		<!-- Heading -->
		<h1 class="display-5 text-center mb-3">
			@lang('nexus::register.welcome-title')
		</h1>

		<!-- Subheading -->
		<p class="text-muted text-center mb-5">
			@lang('nexus::register.welcome-slogan')
		</p>
		<!-- Form -->
		<form action="{{ admin_base_path('register') }}" method="POST">
			@csrf
			<!-- Name -->
			<div class="form-group">
				<!-- Label -->
				<label>
					@lang('nexus::register.name-label')
				</label>
				<!-- Input -->
				{{ form()->text('firstname', null, ['class' => 'form-control', 'placeholder' => trans('nexus::register.name-placeholder') ]) }}
			</div>
			<!-- Email address -->
			<div class="form-group">
				<!-- Label -->
				<label>
					@lang('nexus::register.user-label')
				</label>
				<!-- Input -->
				{{ form()->email('email', null, ['class' => 'form-control', 'placeholder' => trans('nexus::register.user-placeholder') ]) }}
			</div>
			<!-- Password -->
			<div class="form-group">
				<!-- Label -->
				<label>
					@lang('nexus::register.password-label')
				</label>
				<!-- Input -->
				{{ form()->password('password', ['class' => 'form-control', 'placeholder' => trans('nexus::register.password-placeholder') ]) }}
			</div>
			<!-- Password Confirmation -->
			<div class="form-group">
				<!-- Label -->
				<label>
					@lang('nexus::register.password-confirmation-label')
				</label>
				<!-- Input -->
				{{ form()->password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('nexus::register.password-confirmation-placeholder') ]) }}
			</div>
			<!-- Submit -->
			<button class="btn btn-block btn-primary mb-3">
				@lang('nexus::register.submit-label')
			</button>
		</form>
	</div>

	<!-- Link -->
	<div class="text-center mt-4">
		<span class="text-muted text-center">
			@lang('nexus::register.footer')
		</span>
	</div>

@endsection
