{{-- footer --}}
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="footer-logo">
								<a href="index.html"><img src="images/logo/logo2.png" alt="Logo"></a>
								<p>@lang('front.It was some time before he obtained any answer, and the reply, when made, was unpropitious.')</p>
								<ul>
									<li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="" class="tran3s"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
									<li><a href="" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-4 col-sm-3 footer-list">
							<h6>@lang('front.Company')</h6>
							<ul>
								<li><a href="{{ route ('Campus') }}" class="tran3s">@lang('front.Home')</a></li>
								<li><a href="{{ route ('course') }}" class="tran3s">@lang('front.Course')</a></li>
								<li><a href="{{ route ('partners') }}" class="tran3s">@lang('front.Organizers')</a></li>
								<li><a href="{{ route ('contact') }}" class="tran3s">@lang('front.Contact us')</a></li>
							</ul>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 footer-subscribe">
							<h6>@lang('front.Subscribe Us')</h6>
							<p>@lang('front.This sounded a very good reason, and Alice was quite pleased.')</p>
							<form action="#">
								<input type="text" placeholder="@lang('front.Your Email')">
								<button class="tran3s s-bg-color"><i class="flaticon-envelope-back-view-outline"></i></button>
							</form>
						</div>
					</div>
				</div>

				<div class="bottom-footer">
					<div class="container">
						<ul class="float-right">

							<li><h3><span class="counter p-color">{{$footer['courses']}}</span> @lang('front.Courses')</h3></li>
							<li><h3><span class="counter p-color">{{$footer['sessions']}}</span> @lang('front.Sessions')</h3></li>
							<li><h3><span class="counter p-color">{{$footer['companies']}}</span> @lang('front.Company')</h3></li>
						</ul>
						<p class="float-left">&copy; 2021 @lang('front.All rights reserved')</p>
					</div>
				</div>
			</footer>
{{-- footer --}}
