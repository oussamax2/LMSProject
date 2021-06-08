<div>
    <div class="find-coursecatg">
        <div class="opacity color-one">
            <div class="container-fluid">
                <form action="#">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                            <div class="single-input">
                                <h2 class="searchcoursecampus">@lang('front.Find a course')</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="single-input">
                                <input type="text" name="name" wire:model="searchTerm" value="aa" >
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12"><button class="action-button tran3s">@lang('front.Search courses')</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <div class="course-style-filter clearfix">
        <ul class="float-left clearfix">
            <li><a href="#" class="tran3s active">@lang('front.All')</a></li>
            <li><a href="#" class="tran3s">@lang('front.free')</a></li>
        </ul>
    </div>

    <div>
        @foreach($sessionList as $session)
        <div class="single-course clearfix trending">

            <div class="text float-left">
                <div class="name clearfix">
                    <div class="image"><img src="images/course/6.jpg" alt=""></div>
                    <div class="float-left">
                        <h6>Foqrul Islam</h6>

                    </div>
                    <strong class="s-color float-right">$1998.8</strong>
                </div>
                <h5><a href="course-details.html" class="tran3s">{{$session->courses->title}}</a></h5>

                <ul class="clearfix">
                    <li class="float-left">
                        <i class="flaticon-clock"></i>
                        <a href="#" class="tran3s">12 May 2018</a>
                    </li>
                    <li class="float-left">
                        <i class="flaticon-time"></i>
                        <a href="#" class="tran3s">For 0 Days</a>
                    </li>
                    <li class="float-left">
                        <i class="flaticon-comments"></i>
                        <a href="#" class="tran3s">@lang('front.Category:') Human Resources</a>
                    </li>
                    <li class="float-right">
                        <i class="flaticon-placeholder"></i>
                        <a href="#" class="tran3s">Egypt</a>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach


    </div>
    {{ $sessionList->links() }}
    **
    <ul class="theme-pagination clearfix">
        <li><a href="" class="tran3s active">1</a></li>
        <li><a href="" class="tran3s">2</a></li>
        <li><a href="" class="tran3s">3</a></li>
        <li><a href="#" class="tran3s">@lang('front.Next')</a></li>
    </ul>
</div>

</div>
