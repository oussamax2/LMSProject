						<!--
			=============================================
				Theme Inner Banner
			==============================================
			-->
			<div class="inner-banner">
				<div class="opacity">
					<div class="container">
						<h2>Register Company</h2>
					</div> <!-- /.container -->
				</div> <!-- /.opacity -->
			</div> <!-- /.inner-banner -->

			<!--
			=============================================
				Registration Banner
			==============================================
			-->
			<div class="registration-banner-company">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<div class="registration-form">

									<form  method="POST" action="{{ route('registervendor') }}" enctype="multipart/form-data">
                                      {{ csrf_field() }}
										<div class="row">
											<div class="col-md-6">
												<div class="form-wrapper">
													<h6>Your Name</h6>
													<input type="text" name="name" placeholder="Your Name">
													@if ($errors->has('name'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('name') }}</strong>
														</span>
													@endif
													<h6>Your EMail</h6>
													<input type="email" name="email" placeholder="sample@gmail.com">
													@if ($errors->has('email'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('email') }}</strong>
														</span>
													@endif
													<h6>Your Password</h6>
													<input type="password" name="password" placeholder="password">
													@if ($errors->has('password'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('password') }}</strong>
														</span>
													@endif
													<h6>Confirm Password</h6>
													<input type="password" name="password_confirmation" placeholder="Confirm password">
													@if ($errors->has('password_confirmation'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('password_confirmation') }}</strong>
														</span>
													@endif
													<h6>Short Description</h6>
													<textarea name="shortDescription" id=""></textarea>
													<h6>Facebook Url</h6>
													<input type="text"  name="fcburl" placeholder="facebook url">
													@if ($errors->has('fcburl'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('fcburl') }}</strong>
														</span>
													@endif
													<h6>Twitter Url</h6>
													<input type="text" name="twitturl"  placeholder="twitter url">
													@if ($errors->has('twitturl'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('twitturl') }}</strong>
														</span>
													@endif
												</div> <!-- /.form-wrapper -->
											</div>
											<div class="col-md-6">
												<div class="form-wrapper">
													<h6>Your LastName</h6>
													<input type="text" name="lastname"  placeholder="Your LastName">
													<h6>Mobile Number</h6>
													<input type="text" name="telephone"  placeholder="+880 854 875 971">
													@if ($errors->has('telephone'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('telephone') }}</strong>
														</span>
													@endif
													<h6>Your WebSite</h6>
													<input type="text"  name="website" placeholder="website">
													@if ($errors->has('website'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('website') }}</strong>
														</span>
													@endif
													<h6>Your Picture</h6>
													<input type="file"  name="picture" accept="image/*">
													<h6>Description</h6>
													<textarea name="description" id=""></textarea>
													<h6>Linkedin Url</h6>
													<input type="text" name="linkdinurl"  placeholder="linkedin url">
													@if ($errors->has('linkdinurl'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('linkdinurl') }}</strong>
														</span>
													@endif
													<h6>Dribble Url</h6>
													<input type="text" name="dribbleurl"  placeholder="dribble url">
													@if ($errors->has('dribbleurl'))
														<span class="invalid-feedback">
															<strong>{{ $errors->first('dribbleurl') }}</strong>
														</span>
													@endif
												</div> <!-- /.form-wrapper -->
											</div>
										</div>
										<div class="row">
											<div class="col-md-4 col-md-offset-4">
											<button type="submit" class="tran3s hvr-trim">SIGN UP NOW!!</button>
											</div>
										</div>
									</form>
								</div> <!-- /.registration-form -->
							</div>
						</div> <!-- /.row -->
					</div> <!-- /.container -->
			</div> <!-- /.registration-banner -->
