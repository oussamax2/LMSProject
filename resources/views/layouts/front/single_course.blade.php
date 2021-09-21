{{-- single course --}}
			<div class="inner-banner-coursedetails">
				<div class="opacity">
					<div class="container">
						<ul>
							<li><a href="index.html" class="tran3s">@lang('front.Home')</a></li>
							<li>/</li>
							<li>@lang('front.Courses')</li>
                            <li>/</li>
							<li>{{ $sessions->courses->title }}</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="course-details">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="sessionleft">
							<h6 class="sessiontitle">@lang('front.Other Sessions')</h6>
								<ul class="info-list row">
									@foreach (App\Models\sessions::where('course_id',$sessions->course_id)->where('id','!=' ,$sessions->id)->limit(6)->orderBy('created_at', 'desc')->get() as $sessionss)
									<li class="col-xs-12 hoversessionlms">
										<p style="padding-bottom: 16px;">
											<a style="color: rgba(0,0,0,0.65); font-size: 14px; font-weight:600;" href="{{ url('singlsession') }}/{{$sessionss->id}}"><i class="icon flaticon-clock" style="font-size: 17px; margin-right: 10px;"></i>{{Carbon\Carbon::parse($sessions->start)->isoFormat(' Do MMMM  YYYY ')}}  @lang('front.To')  {{Carbon\Carbon::parse($sessions->end)->isoFormat(' Do MMMM  YYYY ')}}</a>
										</p>
									</li>

									@endforeach
								</ul>
							</div>
						</div>
						<div class="col-md-6 col-xs-12">
							<div class="details-wrapper">
                                @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            @endif
								<div class="course-title">
									<h2>{{ $sessions->courses->title }}</h2>
									<span>@lang('front.Posted on') {{Carbon\Carbon::parse($sessions->courses->created_at)->isoFormat(' Do MMMM  YYYY ')}}</span>
								</div>
								<div class="course-info row">
									<div class="col-xs-4">
										<div>
										@if(isset($sessions->courses->subcategorie->name))
											<i class="flaticon-bookmark"></i>
											<p>@lang('front.Sub Categories')</p>
											<b>{{ $sessions->courses->subcategorie->name }}</b>
										@else
											<i class="flaticon-bookmark"></i>
											<p>@lang('front.Sub Categories')</p>
											<b>@lang('front.There is no subcategory')</b>
										@endif
										</div>
									</div>
									<div class="col-xs-4">
										<div>
											<i class="flaticon-bookmark"></i>
											<p>@lang('front.Categories')</p>
											<b>{{ $sessions->courses->categories->name }}</b>
										</div>
									</div>
									<div class="col-xs-4">
										<div>
											<i class="flaticon-time"></i>
											<p>@lang('front.Duration')</p>
                                            <b>{{ Carbon\Carbon::parse($sessions->end)->longAbsoluteDiffForHumans($sessions->start) }}</b>

										</div>
									</div>
								</div>
							</div>
							<div class="curriculum-panel">
								<div class="clearfix">
									<h3 class="float-left">@lang('front.Session')</h3>
									<ul class="float-right">
										<li>1 Classes</li>
									</ul>
								</div>
							</div>
							<div class="curriculum-panel-date">
								<div class="clearfix">
									<b class="title-curr-panel float-left"><i class="icon flaticon-clock"></i>{{Carbon\Carbon::parse($sessions->start)->isoFormat(' Do MMMM  YYYY ')}}  @lang('front.To')  {{Carbon\Carbon::parse($sessions->end)->isoFormat(' Do MMMM  YYYY ')}}</b>
									<ul class="local-sec float-right">
										<i class="flaticon-placeholder"></i>
										<li class="title-curr-panel">{{ $sessions->countries->name }}</li>
									</ul>
								</div>
							</div>

							@if(auth()->user() && !($registuser))
								<form action="{{ route('registsess')}}"  method="post">
									{{ csrf_field() }}
									<input type="hidden" name="session" value="{{ $sessions->id }}" />
									<div class="curriculum-panel-buttonregister float-right">
                                        @if($sessions->status && $sessions->courses->status)
											<button data-toggle="modal" id="smallButton" data-target="#smallModal" class="btn btn-default show_confirm"  type ="submit">@lang('front.Register')</button>
                                            @else

											<button class="btn btn-default" style="background: #d22323; color: #fff; border-radius: 3px; text-decoration: none; font-size: 20px; margin: 0 0 0 15px; padding: 6px 10px; border: none; text-transform: uppercase; cursor: default;">@lang('front.Closed')</button>
									@endif
                                        </div>
								</form>
							@elseif(!(auth()->user()))
							<div class="curriculum-panel-buttonregister float-right">
									<a class="tran3s" data-toggle="modal" data-target=".signInModal" class="btn btn-default">@lang('front.Register')</a>
							</div>
							@endif
							@if(auth()->user() && $registuser)
							<div class="check-register-session">
                                <a href="{{ route('registerationsuser.show', $registuser->id) }}"><h3><i class="icon flaticon-tick"></i>you have already registered in this session</h3></a>
							</div>
							@endif

						</div>

						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="course-sidebar">
								<div class="sidebar-course-information">
									<ul class="price clearfix">
										<li class="float-left"><strong class="s-color"><b style="color:#222;">@lang('front.Price:')</b>  {{ $sessions->fee }}</strong></li>
									</ul>
									<ul class="info-list row">

										<li class="col-xs-12"><b>@lang('front.Target Audiances')</b><br><br>{{ implode(", ",json_decode($sessions->courses->target_audiance->pluck('name'))) }}</li>
									</ul>
								</div>

								<div class="sidebar-instructor-info">
									<h4>@lang('front.Company')</h4>
									<div class="wrapper">
										<div>
											<h6 style="font-family: 'Lato', sans-serif;font-weight: 700;font-size: 18px;margin-bottom: 20px;">{{ $sessions->companies->lastname }}</h6>
											<ul class="sociallmsup">
											@if(isset($sessions->companies->fcburl))
											<li><a href="{{ $sessions->companies->fcburl }}" class="tran3s"><i class="icon fa fa-facebook" aria-hidden="true"></i></a></li>
											@endif
											@if(isset($sessions->companies->twitturl))
											<li><a href="{{ $sessions->companies->twitturl }}" class="tran3s"><i class="icon fa fa-twitter" aria-hidden="true"></i></a></li>
											@endif
											@if(isset($sessions->companies->linkdinurl))
											<li><a href="{{ $sessions->companies->linkdinurl }}" class="tran3s"><i class="icon fa fa-linkedin" aria-hidden="true"></i></a></li>
											@endif
											@if(isset($sessions->companies->dribbleurl))
											<li><a href="{{ $sessions->companies->dribbleurl }}" class="tran3s"><i class="icon fa fa-dribbble" aria-hidden="true"></i></a></li>
											@endif
											</ul>
										</div>
										<p>{{ $sessions->companies->shortDescription }}</p>
										<a href="{{ url('/profilecompany',$sessions->companies->id) }}" class="tran3s p-bg-color follow hvr-trim">@lang('front.see profile')</a>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

{{-- single course --}}
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to register in this course?`,
              text: "",
              icon: "info",
              buttons: true,
              dangerMode: false,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>
@endsection
