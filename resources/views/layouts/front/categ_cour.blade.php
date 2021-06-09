
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
									  <div class="panel">
									    <div class="panel-heading active-panel">
									      <h6 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
									        Web Develoment</a>
									      </h6>
									    </div>
									    <div id="collapse1" class="panel-collapse collapse in">
									      <div class="panel-body">
									      	<ul>
									      		<li><a href="#" class="tran3s"><span>3</span>Html/Css</a></li>
									      		<li><a href="#" class="tran3s"><span>5</span>jQuery</a></li>
									      		<li><a href="#" class="tran3s">Sass/less</a></li>
									      	</ul>
									      </div>
									    </div>
									  </div>
									  <div class="panel">
									    <div class="panel-heading">
									      <h6 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
									        Graphics Design</a>
									      </h6>
									    </div>
									    <div id="collapse2" class="panel-collapse collapse">
									      <div class="panel-body">
									      	<ul>
									      		<li><a href="#" class="tran3s">Html/Css</a></li>
									      		<li><a href="#" class="tran3s">jQuery</a></li>
									      		<li><a href="#" class="tran3s">Sass/less</a></li>
									      	</ul>
									      </div>
									    </div>
									  </div>
									  <div class="panel">
									    <div class="panel-heading">
									      <h6 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
									        Web Design</a>
									      </h6>
									    </div>
									    <div id="collapse3" class="panel-collapse collapse">
									      <div class="panel-body">
									      	<ul>
									      		<li><a href="#" class="tran3s">Html/Css</a></li>
									      		<li><a href="#" class="tran3s">jQuery</a></li>
									      		<li><a href="#" class="tran3s">Sass/less</a></li>
									      	</ul>
									      </div>
									    </div>
									  </div>
									  <div class="panel">
									    <div class="panel-heading">
									      <h6 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
									        IOS/Android Development</a>
									      </h6>
									    </div>
									    <div id="collapse4" class="panel-collapse collapse">
									      <div class="panel-body">
									      	<ul>
									      		<li><a href="#" class="tran3s">Html/Css</a></li>
									      		<li><a href="#" class="tran3s">jQuery</a></li>
									      		<li><a href="#" class="tran3s">Sass/less</a></li>
									      	</ul>
									      </div>
									    </div>
									  </div>
									  <div class="panel">
									    <div class="panel-heading">
									      <h6 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
									        Others</a>
									      </h6>
									    </div>
									    <div id="collapse5" class="panel-collapse collapse">
									      <div class="panel-body">
									      	<ul>
									      		<li><a href="#" class="tran3s">Html/Css</a></li>
									      		<li><a href="#" class="tran3s">jQuery</a></li>
									      		<li><a href="#" class="tran3s">Sass/less</a></li>
									      	</ul>
									      </div>
									    </div>
									  </div>
									</div>
								</div>

								<div class="course-filter">
									<h4>@lang('front.Search By Filters')</h4>
									<form  onsubmit="return false" class="main-wrapper">

										<div class="course-price-filter">
											<h5>@lang('front.Price Range')</h5>
											<div class="price-ranger">
												<div class="ranger-min-max-block">
													<ul class="clearfix">
														<li class="float-left">
															<label for="min">@lang('front.From')</label>
															<input type="text" class="min" placeholder="$99" readonly>
														</li>
														<li class="float-left">
															<label for="max">@lang('front.To')</label>
															<input type="text" class="max" placeholder="$1035" readonly>
														</li>
													</ul>
												</div>
												<div id="slider-range"></div>
											</div>
										</div>

										<div class="course-work-level">
											<h5>@lang('front.Target Audiance')</h5>
											<ul class="clearfix">
												<li>
													<input type="checkbox" id="starting">
													<label for="starting">CEO</label>
												</li>
												<li>
													<input type="checkbox" id="begainer">
													<label for="begainer">GM/Directors</label>
												</li>
												<li>
													<input type="checkbox" id="expert" checked>
													<label for="expert">Managers</label>
												</li>
												<li>
													<input type="checkbox" id="intermediate">
													<label for="intermediate">Supervisors/Leaders</label>
												</li>
												<li>
													<input type="checkbox" id="advance">
													<label for="advance">Staff</label>
												</li>
											</ul>
										</div>

										<div class="course-location">
											<h5>@lang('front.Country')</h5>
											<div class="form-group">
										      <div>
										        <select id="loaction" class="selectpicker show-tick form-control" data-live-search="true">
										          <option>@lang('front.All')</option>
										          <option>Bab Ezzouar</option>
										          <option>Baguio</option>
										          <option>London</option>
										          <option>Paris</option>
										          <option>Dubai</option>
										          <option>New York</option>
										          <option>Singapore</option>
										          <option>Kuala Lumpur</option>
										          <option>Istanbul</option>
										          <option>Tokyo</option>
										          <option>Seoul</option>
										          <option>Amsterdam</option>
										          <option>Osaka</option>
										          <option>Vienna</option>
										        </select>
										      </div>
										    </div>
										</div>

                                        <div class="course-location">
											<h5>@lang('front.City')</h5>
											<div class="form-group">
										      <div>
										        <select id="loaction" class="selectpicker show-tick form-control" data-live-search="true">
										          <option>@lang('front.All')</option>
										          <option>Bab Ezzouar</option>
										          <option>Baguio</option>
										          <option>London</option>
										          <option>Paris</option>
										          <option>Dubai</option>
										          <option>New York</option>
										          <option>Singapore</option>
										          <option>Kuala Lumpur</option>
										          <option>Istanbul</option>
										          <option>Tokyo</option>
										          <option>Seoul</option>
										          <option>Amsterdam</option>
										          <option>Osaka</option>
										          <option>Vienna</option>
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
