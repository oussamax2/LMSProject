{{-- gallery --}}
			<div class="our-portfolio Portfolio-4-column">
				<div class="container">
					<div class="mixitUp-menu">
	        			<ul>
	        				<li class="filter active tran3s" data-filter="all">@lang('front.All')</li>
							<li class="filter tran3s" data-filter=".event">@lang('front.Events')</li>
							<li class="filter tran3s" data-filter=".presentation">@lang('front.Presentation')</li>
							<li class="filter tran3s" data-filter=".seminar">@lang('front.Seminar')</li>
							<li class="filter tran3s" data-filter=".workshop">@lang('front.Workshop')</li>
	        			</ul>
	        		</div>
	        		<div class="row" id="mixitUp-item">
					@foreach ($citiesList as $citList)
						<div class="col-md-3 col-sm-4 col-xs-6 mix">
							<div class="single-item">
								@if(isset($citList->picture))
								<img src="{{ asset("storage/".$citList->picture) }}" alt="">
								@else
								<img src="{{ asset('images/citiesdefault.svg') }}" alt="">
								@endif
								<div class="opacity tran3s">
									<div>
										<h6><a href="#">{{ $citList->states->countries->continent }} {{ $citList->name }}</a></h6>
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
