@extends('frontend.layouts.master')

@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
	<div class="container">
		<div class="breadcrumb-content text-center">
			<ul>
				<li>
					<a href="index.html">Home</a>
				</li>
				<li class="active">Login / Register </li>
			</ul>
		</div>
	</div>
</div>
<div class="login-register-area pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-12 ml-auto mr-auto">
				<div class="login-register-wrapper">
					<div class="login-register-tab-list nav">
						<a class="active" data-toggle="tab" href="#lg1">
							<h4> login </h4>
						</a>
						<a data-toggle="tab" href="#lg2">
							<h4> register </h4>
						</a>
					</div>
					<div class="tab-content">
						<div id="lg1" class="tab-pane active">
							<div class="login-form-container">
								<div class="login-register-form">
									@if(isset($error))
										<div class="alert alert-danger">
											<p>{{ $error }}</p>
										</div>
									@endif
									<form action="{{ route('front.authenticate') }}" method="post">
										@csrf
										<input type="text" name="email" placeholder="Email" value="{{ isset($email) ? $email : "" }}">
										<input type="password" name="password" placeholder="Password">
										<div class="button-box">
											<div class="login-toggle-btn">
												<input type="checkbox">
												<label>Remember me</label>
												<a href="#">Forgot Password?</a>
											</div>
											<button type="submit"><span>Login</span></button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div id="lg2" class="tab-pane">
							<div class="login-form-container">
								<div class="login-register-form">
									<form action="#" method="post">
										<input type="text" name="user-name" placeholder="Username">
										<input type="password" name="user-password" placeholder="Password">
										<input name="user-email" placeholder="Email" type="email">
										<div class="button-box">
											<button type="submit"><span>Register</span></button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection