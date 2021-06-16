<div class="analytic-lms">
<div class="container-fluid">
    <div class="row">
    @if(isset($countcompanies))
        <div class="col-md-6 col-lg-3">
            <div class="card" style="background:linear-gradient(30deg, #36d64c 10%, #fff 0%);">
                <div class="card-body">
                    <span class="icon icon-user-following"></span>
                    <h3><a href="{{ route('companies.index') }}">@lang('front.Registered companies')</a></h3>
                    <p>{{$countcompanies}}</p>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6 col-lg-3">
            
        </div>
    @endif   
    <div class="col-md-6 col-lg-3">
        <div class="card" style="background:linear-gradient(30deg, #36d64c 10%, #fff 0%);">
            <div class="card-body">
                <span class="icon icon-briefcase"></span>
                <h3><a href="{{ route('sessions.index') }}">@lang('front.Sessions')</a></h3>
                <p>{{$countsessions}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card" style="background:linear-gradient(30deg, #36d64c 10%, #fff 0%);">
            <div class="card-body">
                <span class="icon icon-docs"></span>
                <h3><a href="{{ route('courses.index') }}">@lang('front.Courses')</a></h3>
                <p>{{$countcourses}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="card" style="background:linear-gradient(30deg, #36d64c 10%, #fff 0%);">
            <div class="card-body">
            <span class="icon icon-user-following"></span>
                <h3><a href="{{ route('registerations.index') }}">@lang('front.Registered Users')</a></h3>
                <p>{{$countregisterations}}</p>
            </div>
        </div>
    </div>
    </div>
</div>
</div>