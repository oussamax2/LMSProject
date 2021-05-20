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
									<div class="image"><img src="{{ asset("storage/".$categList->picture) }}" alt="">
										<div class="categorytitle">
											<h3>{{ $categList->name }}</h3>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						
					</div>
				
				</div>
			</div>
{{-- Browse sessions by category --}}