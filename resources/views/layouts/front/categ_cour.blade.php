
{{-- list course --}}


			<div class="our-course course-list">

				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-md-8 col-xs-12 popular-course float-right">

                            @livewireStyles

                            @livewire('search')

                            @livewireScripts

						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<div class="course-sidebar">
								<div class="sidebar-categories">
									<h4>@lang('front.Categories')</h4>
									<div class="panel-group theme-accordion" id="accordion">
                                        @foreach($categList as $cat)
                                      <div class="panel" >
									    <div class="panel-heading {{$loop->first?'active-panel':''}} {{$cat->id==request()->cat?'active-panel':''}}">
									      <h6 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#{{$cat->id}}"  data-id="{{$cat->id}}" >
									        {{$cat->name}}</a>
									      </h6>
									    </div>
									    <div id="{{$cat->id}}" class="panel-collapse collapse {{$loop->first?'in':''}}{{$cat->id==request()->cat?'in':''}}" aria-expanded="false">
									      <div class="panel-body">
									      	<ul id="subcat">
                                                @foreach($cat->subcategorie as $subcat)
									      		<li  value="{{$subcat->id}}"><a  class="tran3s"><span>{{$subcat->courses->count()}}</span>{{$subcat->name}}</a></li>
                                                  @endforeach
									      	</ul>
									      </div>
									    </div>
									  </div>
                                        @endforeach





									</div>
								</div>

								<div class="course-filter">
									<h4>@lang('front.Search By Filters')</h4>
									<form  onsubmit="return false"class="main-wrapper">

										<div class="course-price-filter">
											<h5>@lang('front.Price Range')</h5>
											<div class="price-ranger">
												<div class="ranger-min-max-block">
													<ul class="clearfix">
														<li class="float-left">
															<label for="min">@lang('front.From')</label>
															<input type="text" name="pricemin" class="min" placeholder="10" readonly>
														</li>
														<li class="float-left">
															<label for="max">@lang('front.To')</label>
															<input type="text" name="pricemax" class="max" placeholder="1000" readonly>
														</li>
													</ul>
												</div>
												<div id="slider-range"></div>
											</div>
										</div>

										<div class="course-work-level">
											<h5>@lang('front.Target Audiance')</h5>
											<ul class="clearfix">
                                                @foreach($targets as $target)
                                                <li>
                                                    <input  id ="#{{$target->id}}#" value="{{$target->id}}" name="target" type="checkbox" >
                                                    <label for="#{{$target->id}}#">{{$target->name}}</label>
                                                </li>
                                                @endforeach
											</ul>
										</div>


										<div class="course-location">
											<h5>@lang('front.Country')</h5>
											<div class="form-group">
										      <div>
										        <select id="country" class="selectpicker show-tick form-control" data-live-search="true">
										          <option value="">@lang('front.All')</option>
										     @foreach($countries as $country)
										          <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
										        </select>
										      </div>
										    </div>
										</div>

                                        <div class="course-location">
											<h5>@lang('front.City')</h5>
											<div class="form-group">
										      <div>
										        <select id="city" class="selectpicker show-tick form-control" data-live-search="true">
										          <option value="">@lang('front.All')</option>
                                                  @foreach($citiesList as $citie)
										          <option value="{{$citie->id}}">{{$citie->name}}</option>
                                                @endforeach
										        </select>
										      </div>
										    </div>
										</div>
										<div class="button-wrapper"><input type="submit" id ="appfiltre" value="@lang('front.Apply filters')" class="p-bg-color tran3s"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


{{-- list course --}}
