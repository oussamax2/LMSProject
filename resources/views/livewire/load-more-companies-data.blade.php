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
  </div>
@if(!$companies->hasMorePages())
  
    <div class="load-more tran3s">no more data</div>
@endif  
</div>
