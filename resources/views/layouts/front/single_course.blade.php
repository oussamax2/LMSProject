{{-- single course --}}
			<div class="inner-banner-coursedetails">
				<div class="opacity">
					<div class="container">
						<ul>
							<li><a href="index.html" class="tran3s">@lang('front.Home')</a></li>
							<li>/</li>
							<li>@lang('front.Courses')</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="course-details">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div style="border: 1px solid rgba(0,0,0,0.06);border-radius: 3px;margin-bottom: 65px;padding: 21px;">
							<h6 style="font-family: 'Lato', sans-serif;font-weight: 700;font-size: 18px;margin-bottom: 40px;">@lang('front.Other sessions:')</h6>

								<ul class="info-list row">
											
									@foreach (App\Models\sessions::where('course_id',$sessions->course_id)->where('id','!=' ,$sessions->id)->get() as $sessions)
									<li class="col-xs-12">
										<p style="padding-bottom: 16px;">
											<a href="{{ url('singlsession') }}/{{$sessions->id}}"><i class="icon flaticon-clock"></i>{{Carbon\Carbon::parse($sessions->start)->isoFormat(' Do MMMM  YYYY ')}}  @lang('front.To')  {{Carbon\Carbon::parse($sessions->end)->isoFormat(' Do MMMM  YYYY ')}}</a>
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
											<button class="btn btn-default"  type ="submit">@lang('front.Register')</button>
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
											<ul>
											@if(isset($sessions->companies->fcburl))
											<li><a href="{{ $sessions->companies->fcburl }}" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											@endif
											@if(isset($sessions->companies->twitturl))
											<li><a href="{{ $sessions->companies->twitturl }}" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											@endif
											@if(isset($sessions->companies->linkdinurl))
											<li><a href="{{ $sessions->companies->linkdinurl }}" class="tran3s"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
											@endif
											@if(isset($sessions->companies->dribbleurl))
											<li><a href="{{ $sessions->companies->dribbleurl }}" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
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
