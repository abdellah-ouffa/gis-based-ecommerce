@extends('frontend.layouts.master')

@section('content')
<div class="breadcrumb-area pt-35 pb-35 bg-gray-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{ route('front.home') }}">Home</a>
                </li>
                <li class="active">Register</li>
            </ul>
        </div>
    </div>
</div>
<div class="login-register-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class=" {{ $form != 'register' ? 'active' : '' }}" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a class=" {{ $form == 'register' ? 'active' : '' }}" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane  {{ $form != 'register' ? 'active' : '' }}">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="{{ route('front.storeCustomer') }}" method="post">
                                    	@csrf
                                        <input type="text" name="user-name" placeholder="Username">
                                        <input type="password" name="user-password" placeholder="Password">
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
                        <div id="lg2" class="tab-pane {{ $form == 'register' ? 'active' : '' }}">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="{{ route('front.frontStoreCustomer') }}" method="post">
                                    	@csrf
                                    	<div class="row">
                                    		<div class="col-md-6">
                                    			<div class="form-group">
	                                    			<label for="first_name">First Name</label>
	                                    			<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                    			</div>
                                    		</div>
                                    		<div class="col-md-6">
                                    			<div class="form-group">
	                                    			<label for="last_name">Last Name</label>
                                        			<input type="text" name="last_name" id="last_name" placeholder="Last Name">
                                    			</div>
                                    		</div>
                                    	</div>
                                    	<div class="row">
                                    		<div class="col-md-6">
                                    			<div class="form-group">
	                                    			<label for="gender">Gender</label>
			                                        <select name="gender" class="form-control" id="gender">
														<option value="Female">Female</option>
														<option value="Male">Male</option>
						                            </select>
                                    			</div>
                                    		</div>
                                    		<div class="col-md-6">
                                    			<div class="form-group">
	                                    			<label for="birth_date">Birth Date</label>
                                        			<input type="date" name="birth_date" id="birth_date" placeholder="Birth Date">
                                    			</div>
                                    		</div>
                                    	</div>
                                    	<div class="row">
                                    		<div class="col-md-6">
		                            			<div class="form-group">
		                                			<label for="tel">Phone Number</label>
		                                			<input type="tel" name="tel" id="tel" placeholder="Phone Number">
		                            			</div>
                                    		</div>
                                    		<div class="col-md-6">
                                    			<div class="form-group">
	                                    			<label for="email">E-mail</label>
                                    				<input type="email" name="email" id="email" placeholder="E-mail">
                                    			</div>
                                    		</div>
                                    	</div>
                                    	<div class="row">
                                    		<div class="col-md-6">
		                            			<div class="form-group">
		                                			<label for="password">Password</label>
                                        			<input type="password" name="password" id="password" placeholder="Password">
		                            			</div>
                                    		</div>
                                    		<div class="col-md-6">
		                            			<div class="form-group">
		                                			<label for="confirmation_password">Confirmation Password</label>
                                        			<input type="password" name="confirmation_password" id="confirmation_password" placeholder="Confirmation Password">
		                            			</div>
                                    		</div>
                                    	</div>
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
