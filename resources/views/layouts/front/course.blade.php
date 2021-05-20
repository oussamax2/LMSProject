{{-- Latest Course --}}

			<div class="popular-course">
				<div class="container">
					<div class="theme-title">
						<h2>@lang('front.Latest added')</h2>
						<a href="course-grid.html" class="tran3s">@lang('front.See All Course')</a>
					</div>

					<div class="row">

					@foreach ($sessionList as $sessionList)

						<div class="col-md-4 col-xs-6 wow fadeInLeft">
							<div class="single-course">
								<div class="text">
									<div class="image"><img src="{{ asset("storage/".$sessionList->companies['picture']) }}" alt=""></div>
									<div class="name clearfix">
										<h6 class="float-left">{{$sessionList->companies->user->name}}</h6>
										@if($sessionList->fee == 0)
                                           <strong class="p-pg-color float-right">FREE</strong>
										@else
										   <strong class="s-color float-right">${{$sessionList->fee}}</strong>
										@endif

									</div>
									<h5><a href="{{ url('singlsession/1') }}" class="tran3s">{{$sessionList->courses->title}}</a></h5>
									<ul class="clearfix">
										<li class="float-left">
											<i class="flaticon-people"></i>


											<a href="#" class="tran3s">{{Carbon\Carbon::parse($sessionList->start)->locale('en')->isoFormat(' Do MMMM  YYYY ')}}</a>
										</li>
										<li class="float-right">
											<i class="flaticon-heart"></i>
											<a href="#" class="tran3s">{{$sessionList->countries->name}}, {{$sessionList->states->name}}</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach


					</div>

				</div>
			</div>
{{-- Latest Course --}}
