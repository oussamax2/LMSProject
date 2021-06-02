{{-- training organizer company --}}
			<div class="our-instructor">
				<div class="container">
					<div class="theme-title text-center">
						<h2>@lang('front.Training Organizer Company')</h2>
						<p>@lang('front.Search training from training organizer companies')</p>
						<a href="{{ route ('partners') }}" class="tran3s">@lang('front.See All Companies')</a>
					</div>
					<div class="row">
						<div class="instructor-slider">
							@foreach ($companies as $compList) 
							<div class="item">
								<div class="single-member">
									<div class="image">
										@if(isset($compList->picture))
										<img src="{{ asset("storage/".$compList->picture) }}" alt="">
										@else
										<img src="{{ asset('images/companydefault.svg') }}" alt="">
										@endif
									</div>
									<h6><a href="{{ url('/profilecompany/{id}') }}" class="tran3s">{{ $compList->lastname }}</a></h6>
									<p>{{ $compList->shortDescription }}</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
{{-- training organizer company --}}
