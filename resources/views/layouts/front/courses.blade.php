{{-- Courses --}}
			<div class="teachers-course popular-course">
				<div class="container">
                    <div class="theme-title">
                    <h3>@lang('front.Courses by') {{ $companies->user->name }}</h3>
                    <a href="{{ route ('course') }}?comp={{$companies->id}}" class="profcourse">@lang('front.See All Course')</a>
                    </div>
					<div class="row">

					@if($countsessions>0)
						<div class="teachers-course-slider">
						@foreach ($companies->courses as $coursesList)
						@foreach ($coursesList->sessions as $sessList)

							<div class="item">
								<div class="single-course">
									<div class="text">
										<div class="image">
											@if(isset($companies->picture))
											<img src="{{ asset("storage/".$companies['picture']) }}" alt="">
											@else
											<img src="{{ asset('images/companydefault.svg') }}" alt="">
											@endif
										</div>
										<div class="name clearfix">
											<h6 class="float-left">{{ $companies->user->name }}</h6>

											@if($sessList->fee == 0)
                                           <span class="p-bg-color float-right">@lang('front.free')</span>
										@else
										   <strong class="s-color float-right">${{$sessList->fee}}</strong>
										@endif
										</div>
										<h5><a href="{{ url('/singlsession',$sessList->id) }}" class="tran3s">{{ $sessList->courses->title }}</a></h5>
										<ul class="clearfix">
											<li class="float-left">
												<i class="flaticon-people"></i>
												<a href="#" class="tran3s">{{Carbon\Carbon::parse($sessList->start)->isoFormat(' Do MMMM  YYYY ')}}</a>
											</li>
											<li class="float-right">
												<i class="flaticon-heart"></i>
												<a href="#" class="tran3s">{{ $sessList->countries->name }},{{substr_replace($sessList->states->name, " ...", 3)}}</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						@endforeach
						@endforeach
						</div>
						@else
						<p class="msginfocrs">@lang('front.There are no courses')</p>
						@endif
					</div>
				</div>
			</div>
{{-- Courses --}}
