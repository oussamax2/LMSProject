{{-- registrations --}}
			<div class="registration-banner">
				<div class="opacity">
					<div class="container">
						<div class="row">
							<div class="col-md-5 col-xs-12">
								<div class="registration-form" >
									<form method="POST" action="{{ route('register_user') }}" enctype="multipart/form-data">

                                        {{ csrf_field() }}
										<h2>Register Now</h2>
										<p>Create  your account and browse thousand of courses!!</p>
										<div class="form-wrapper">
                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
											<h6>Your Full Name</h6>

										

											<input type="text" name='name' placeholder="Your Name" value="{{ old('name') }}"  required>
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
											<h6>Your EMail</h6>
											<input type="email" name="email" placeholder="sample@gmail.com" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                            <h6>Password</h6>
											<input type="password" name="password" placeholder="password" required>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
											<h6>Confirm Password</h6>
											<input type="password" name="password_confirmation"  placeholder="confirm password" required>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                            @endif
                                            <button type="submit"  class="tran3s hvr-trim">SIGN UP NOW!!</button>
											<a class="register-company" href="{{ route ('register_vendor') }}">register as a company</a>
										</div>
									</form>
								</div>
							</div>

							<div class="col-md-7 col-xs-12">
								<div class="text-wrapper">
									<h2>We Have More <br>Than <span class="p-color">28,690+Student</span> Currently Useing Campus</h2>

									<ul class="clearfix">
										<li class="float-left">
											<div class="single-box">
						        				<h3><span class="counter">8,759</span></h3>
						        				<p>Currently Use</p>
						        			</div>
										</li>
										<li class="float-left">
											<div class="single-box">
						        				<h3><span class="counter">42</span>M</h3>
						        				<p>Total Students</p>
						        			</div>
										</li>
										<li class="float-left">
											<div class="single-box">
						        				<h3><span class="counter">70,593</span></h3>
						        				<p>Finished Course</p>
						        			</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
{{-- registrations --}}
