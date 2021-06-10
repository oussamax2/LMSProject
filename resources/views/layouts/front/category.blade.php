{{-- Browse sessions by category --}}
			<div class="testimonial-styleOne">
				<div class="container">
					<div class="theme-title text-center">
						<h2>@lang('front.Browse by Categories')</h2>
						
						<p>@lang('front.You can start search by Categories that meet your requirements')</p>
					</div>

					<div class="row" style="margin-bottom: 20px;">
						@foreach ($categList as $categList) 
							<div class="col-md-4 col-sm-4">
								<div class="single-blog">
									<div class="image">
										@if(isset($categList->picture))
										<img src="{{ asset("storage/".$categList->picture) }}" alt="">
										@else
										<img src="{{ asset('images/categorydefault.svg') }}" alt="">
										@endif
										<div class="categorytitle">
											
											<a href="{{route('course')}}?cat={{$categList->id}}" name="cat"><h3>{{ $categList->name }}</h3></a> 
										</div>
									</div>
								</div>
							</div>
						@endforeach
						
					</div>
				
				</div>
			</div>
{{-- Browse sessions by category --}}