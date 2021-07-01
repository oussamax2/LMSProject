{{-- banner home --}}
			<div id="theme-main-banner">
				<div>
					<div class="camera_caption">
						<div class="container">
							<h1 class="wow fadeInUp animated" data-wow-delay="0.2s">@lang('front.Looking for a') <span class="p-color">@lang('front.course')</span></h1>
							<h3 class="wow fadeInUp animated">@lang('front.never been easy as it is to day')</h3>
							<div class="find-course">
								<div class="opacity color-one">
									<div class="container-fluid">
										<form action="{{route('course')}}" method="get">
											<div class="row">
												<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
													<div class="single-input">
														<h2 class="searchcoursecampus">@lang('front.Find a course')</h2>
													</div>
												</div>
												<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
													<div class="single-input">
														<input type="text" name="keywords" placeholder="@lang('front.Subject or qualification, eg. IT')" required>
													</div>
												</div>
												<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12"><button class="action-button tran3s">@lang('front.Search courses')</button></div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

{{-- banner home --}}
