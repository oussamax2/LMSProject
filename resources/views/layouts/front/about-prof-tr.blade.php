{{-- information session --}}
			<div class="our-instructor-profile">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
						@if(isset($companies->picture))
						<img src="{{ asset("storage/".$companies['picture']) }}" alt="">
						@else
						<img src="{{ asset('images/companydefault.svg') }}" alt="">
						@endif
                        <ul class="content-info-center">
                            <li class="item-info">@lang('front.WebSite:') {{ $companies->website }}</li>
                            <li class="item-info">@lang('front.E-mail:') {{ $companies->user->email }}</li>
                            <li class="item-info">@lang('front.Telephone:') {{ $companies->telephone }}</li>
                        </ul>
                        </div>
						<div class="col-md-8 col-xs-12">
							<div class="text">
								<div class="title">
									<h4>{{ $companies->user->name }}</h4>
									<span>{{ $companies->shortDescription }}</span>
								</div>
								<ul class="social-media">
									@if(isset($companies->fcburl))
										<li><a href="{{ $companies->fcburl }}" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									@endif
									@if(isset($companies->twitturl))
										<li><a href="{{ $companies->twitturl }}" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									@endif
									@if(isset($companies->linkdinurl))
										<li><a href="{{ $companies->linkdinurl }}" class="tran3s"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									@endif
									@if(isset($companies->dribbleurl))
										<li><a href="{{ $companies->dribbleurl }}" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
									@endif
								</ul>
								<p>{{ $companies->shortDescription }}</p> <br>
								<ul class="instructor-achivement clearfix">
									<li>@lang('front.Total Courses')<h3>{{ count($companies->courses) }}</h3></li>
									<li>@lang('front.Total Session')<h3>{{$countsessions}}</h3></li>
									<li>@lang('front.Registrations')<h3>{{$countregisterations}}</h3></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

{{-- information session --}}
