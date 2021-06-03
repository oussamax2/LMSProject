{{-- gallery --}}
			<div class="our-portfolio Portfolio-4-column">
				<div class="container">
					<div class="mixitUp-menu">
	        			<ul>
	        				<li class="filter active tran3s" data-filter="all">@lang('front.All')</li>
							<li class="filter tran3s" data-filter=".europe">@lang('front.Europe')</li>
							<li class="filter tran3s" data-filter=".africa">@lang('front.Africa')</li>
							<li class="filter tran3s" data-filter=".north_america">@lang('front.North_america')</li>
							<li class="filter tran3s" data-filter=".asia">@lang('front.Asia')</li>
							<li class="filter tran3s" data-filter=".south_america">@lang('front.South_america')</li>
	        			</ul>
	        		</div>
	        		<div class="row" id="mixitUp-item">
					@foreach ($citiesList as $citList)
						<div class="col-md-3 col-sm-4 col-xs-6 mix {{ $citList->states->countries->continent }}">
							<div class="single-item">
								@if(isset($citList->picture))
								<img src="{{ asset("storage/".$citList->picture) }}" alt="">
								@else
								<img src="{{ asset('images/citiesdefault.svg') }}" alt="">
								@endif
								<div class="opacity tran3s">
									<div>
										<h6><a href="#"> {{ $citList->name }}</a></h6>
										<p>{{ $citList->states->countries->name }}</p>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
{{-- gallery --}}
