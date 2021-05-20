			<!-- 
			=============================================
				Theme Inner Banner
			============================================== 
			-->
			<div class="inner-banner">
				<div class="opacity">
					<div class="container">
						<h2>Contact Us</h2>
						<ul>
							<li><a href="index.html" class="tran3s">Home</a></li>
							<li>/</li>
							<li>Contact</li>
						</ul>
					</div> <!-- /.container -->
				</div> <!-- /.opacity -->
			</div> <!-- /.inner-banner -->



			<!-- 
			=============================================
				Contact Form
			============================================== 
			-->
	   		<div class="container contact-us-page">
	        	<div class="row">
	        		<div class="col-md-6 col-sm-12 col-xs-12 wow fadeInLeft">
					@include('flash::message')
	        			<div class="contact-us-form">
	        				<h2>Send a Message</h2>

	        				<form action="{{route('sendcontact')}}" class="form-validation" autocomplete="off">
							{{ csrf_field() }}
	        					<div class="row">
	        						<div class="col-xs-12">
	        							<div class="single-input">
	        								<input type="text" placeholder="You Name*" name="name" required>
	        							</div> <!-- /.single-input -->
										@if ($errors->has('name'))
											<span class="invalid-feedback">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										@endif
	        						</div> <!-- /.col- -->
	        						<div class="col-sm-6 col-xs-12">
	        							<div class="single-input">
	        								<input type="email" placeholder="Enter Email here*" name="email" required>
	        							</div> <!-- /.single-input -->
										@if ($errors->has('email'))
											<span class="invalid-feedback">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
	        						</div> <!-- /.col- -->
	        						<div class="col-sm-6 col-xs-12">
	        							<div class="single-input">
	        								<input type="text" placeholder="Phone Number" name="phone" required>
	        							</div> <!-- /.single-input -->
										@if ($errors->has('phone'))
											<span class="invalid-feedback">
												<strong>{{ $errors->first('phone') }}</strong>
											</span>
										@endif
	        						</div> <!-- /.col- -->
	        						<div class="col-xs-12">
	        							<div class="single-input">
	        								<textarea placeholder="Your Message" name="message" required></textarea>
	        							</div> <!-- /.single-input -->
										@if ($errors->has('message'))
											<span class="invalid-feedback">
												<strong>{{ $errors->first('message') }}</strong>
											</span>
										@endif
	        						</div> <!-- /.col- -->
	        					</div> <!-- /.row -->
	        					<input type="submit" value="Send Message" class="tran3s p-bg-color">
	        				</form>

	        				<!-- Contact Form Validation Markup -->
							<!-- Contact alert -->
							<div class="alert-wrapper" id="alert-success">
								<div id="success">
									<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
									<div class="wrapper">
						               	<p>Your message was sent successfully.</p>
						             </div>
						        </div>
						    </div> <!-- End of .alert_wrapper -->
						    <div class="alert-wrapper" id="alert-error">
						        <div id="error">
						           	<button class="closeAlert"><i class="fa fa-times" aria-hidden="true"></i></button>
						           	<div class="wrapper">
						               	<p>Sorry!Something Went Wrong.</p>
						            </div>
						        </div>
						    </div> <!-- End of .alert_wrapper -->
	        			</div> <!-- /.contact-us-form -->
	        		</div> <!-- /.col- -->

	        		<div class="col-md-6 col-sm-12 col-xs-12 wow fadeInRight">
	        			<div class="contactUs-address">
							<h2>Contact Information</h2>
			        		<p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form,</p>
			        		<div class="single-address clearfix">
			        			<div class="icon float-left"><i class="flaticon-placeholder"></i></div>
			        			<div class="text float-left">
			        				<h6>Address</h6>
			        				<span>San Francisco, CA 560 Bush St &amp; 20th Ave, Apt <br>5 San Francisco, 230909</span>
			        			</div>
			        		</div> <!-- End of .single-address -->
			        		<div class="single-address clearfix">
			        			<div class="icon float-left"><i class="flaticon-envelope"></i></div>
			        			<div class="text float-left">
			        				<h6>Email</h6>
			        				<span>denis@getcraftwork.com</span>
			        			</div>
			        		</div> <!-- End of .single-address -->
			        		<div class="single-address clearfix">
			        			<div class="icon float-left"><i class="flaticon-phone-call"></i></div>
			        			<div class="text float-left">
			        				<h6>Phone &amp; Fax</h6>
			        				<span>(732) 803-01 03, (732) 806-01 04</span>
			        			</div>
			        		</div> <!-- End of .single-address -->
						</div> <!-- /.our-address -->
	        		</div>
	        	</div> <!-- /.row -->
	        </div> <!-- /.container -->