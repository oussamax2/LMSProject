{{-- Courses --}}
			<div class="teachers-course popular-course">
				<div class="container">
                    <div class="theme-title">
                    <h3>@lang('front.Courses by') {{ $companies->lastname }}</h3>
                    <a href="course-grid.html" class="profcourse">@lang('front.See All Course')</a>
                    </div>
					<div class="row">
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
											<strong class="s-color float-right">$ {{ $sessList->fee }}</strong>
										</div>
										<h5><a href="course-details.html" class="tran3s">{{ $sessList->courses->title }}</a></h5>
										<ul class="clearfix">
											<li class="float-left">
												<i class="flaticon-people"></i>
												<a href="#" class="tran3s">{{Carbon\Carbon::parse($sessList->start)->isoFormat(' Do MMMM  YYYY ')}}</a>
											</li>
											<li class="float-right">
												<i class="flaticon-heart"></i>
												<a href="#" class="tran3s">{{ $sessList->countries->name }},{{ $sessList->states->name }}</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						@endforeach
						@endforeach
						</div>
					</div>
				</div>
			</div>
{{-- Courses --}}