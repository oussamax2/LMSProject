{{-- registrations --}}
			<div class="registration-banner">
				<div class="opacity">
					<div class="container">
						<div class="row">
							<div class="col-md-5 col-xs-12">
								<div class="registration-form" >

                                    @livewireStyles

                                    @livewire('registeruser')

                                    @livewireScripts
								</div>
							</div>

							<div class="col-md-7 col-xs-12">
								<div class="text-wrapper">
									<h2>@lang('front.We are targeting millions of users over the world')</h2>

									<ul class="clearfix">
										<li class="float-left">
											<div class="single-box">
						        				<h3><span class="counter">{{$footer['courses']}}</span></h3>
						        				<p>@lang('front.Courses')</p>
						        			</div>
										</li>
										<li class="float-left">
											<div class="single-box">
						        				<h3><span class="counter">{{$footer['sessions']}}</span></h3>
						        				<p>@lang('front.Sessions')</p>
						        			</div>
										</li>
										<li class="float-left">
											<div class="single-box">
						        				<h3><span class="counter">{{$footer['companies']}}</span></h3>
						        				<p>@lang('front.Company')</p>
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
