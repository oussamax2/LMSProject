{{-- single course --}}
			<div class="inner-banner-coursedetails">
				<div class="opacity">
					<div class="container">
						<ul>
							<li><a href="index.html" class="tran3s">Home</a></li>
							<li>/</li>
							<li>Courses</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="course-details">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-xs-12">
							<div class="details-wrapper">
								<div class="course-title">
									<h2>7 Habits of Highly Effective People.</h2>
									<span>Posted on {{ $sessions->start }}</span>
								</div>
								<div class="course-info row">
									<div class="col-xs-4">
										<div>
											<i class="flaticon-bookmark"></i>
											<p>Sub Categories</p>
											<b>Java Development</b>
										</div>
									</div>
									<div class="col-xs-4">
										<div>
											<i class="flaticon-bookmark"></i>
											<p>Categories</p>
											<b>Human Resources</b>
										</div>
									</div>
									<div class="col-xs-4">
										<div>
											<i class="flaticon-time"></i>
											<p>Duration</p>
                                            <b>4 days</b>
										</div>
									</div>
								</div>
							</div>
							<div class="curriculum-panel">
								<div class="clearfix">
									<h3 class="float-left">Session</h3>
									<ul class="float-right">
										<li>1 Classes</li>
									</ul>
								</div>
							</div>
							<div class="curriculum-panel-date">
								<div class="clearfix">
									<b class="title-curr-panel float-left"><i class="flaticon-clock"></i>{{ $sessions->start }}  To  {{ $sessions->end }}</b>
									<ul class="local-sec float-right">
										<i class="flaticon-placeholder"></i>
										<li class="title-curr-panel">{{ var_dump($sessions->countries) }}</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="course-sidebar">
								<div class="sidebar-course-information">
									<ul class="price clearfix">
										<li class="float-left"><strong class="s-color"><b style="color:#222;">Price:</b>  $79<sup>.99</sup></strong></li>
									</ul>
									<ul class="info-list row">
										<li class="col-xs-12"><b>Target Audiance :</b><br><br>CEO, Executives, Managers</li>
									</ul>
								</div>

								<div class="sidebar-instructor-info">
									<h4>Company</h4>
									<div class="wrapper">
										<div class="name">
											<h6>Meirc</h6>
											<ul>
												<li><a href="" class="tran3s"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="" class="tran3s"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li><a href="" class="tran3s"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
											</ul>
										</div>
										<p>Lorem ipsum dolor sit amet, duo vide etiam periculis ei, ius inumian lorem iuvaret. Cum nemro assum copiosae despite</p>
										<a href="#" class="tran3s p-bg-color follow hvr-trim">Follow Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            {{var_dump($sessions)}}
{{-- single course --}}
