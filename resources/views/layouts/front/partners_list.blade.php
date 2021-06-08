{{-- partner list --}}
			<div class="our-instructor">
				<div class="container">
					<div class="row">
						<div class="clearfix" id="partners">
							@foreach ($companies as $compList)
							<div class="col-md-3 col-sm-4 col-xs-6">
								<div class="single-member">
									<div class="image">
										@if(isset($compList->picture))
										<img src="{{ asset("storage/".$compList->picture) }}" alt="">
										@else
										<img src="{{ asset('images/companydefault.svg') }}" alt="">
										@endif
									</div>
									<h6><a href="{{ url('/profilecompany',$compList->id) }}" class="tran3s">{{ $compList->lastname }}</a></h6>
									<p>{{substr_replace($compList->shortDescription, " ...", 30)}}</p>
								</div>
							</div>
							@endforeach
						</div>
					</div>

					<button type="button" id ="load-more" class="load-more tran3s">@lang('front.Load More')</button>
					<div class="load-more tran3s" id="no-more" style="display:none;"></div>

				</div>
			</div>


@section('js')
	<script>

		var page = 1;
        $(document).ready(function() {
			$('#load-more').on('click', function() {
				// alert('ok');
				   page++;
				//    console.log(page);
					$.ajax({
						url: '/getpartners?page='+page,
						type: "GET",
						data : {"_token":"{{ csrf_token() }}"},
						dataType: "json",
						success:function(data) {
							console.log(data.current_page);
							if(data.current_page > data.last_page)
							{
								var x = document.getElementById("load-more");
								x.style.display = "none";
								var nomore = document.getElementById('no-more');

								nomore.innerHTML += 'no more data';
								nomore.style.display = "block";
							}
						    if(data){

								$('#partners').focus;
								var urlcomp = "{{ url('/profilecompany') }}";
								var urlimage = "{{ asset('storage/') }}";
								$.each(data.data, function(key, value){


									$('#partners').append('<div class="col-md-3 col-sm-4 col-xs-6"><div class="single-member"><div class="image">@if('+value.picture+'!= null)<img src="'+urlimage+'/'+value.picture+'" alt="">@else<img src="{{ asset("images/companydefault.svg") }}" alt="">  @endif</div><h6><a href="'+urlcomp+'/'+value.id+'" class="tran3s">'+value.lastname+'</a></h6><p>'+value.shortDescription+ '</p></div></div>');


								});
							}else{
								console.log("no data");
							}
						}
					});

				});
		});
    </script>
@endsection

