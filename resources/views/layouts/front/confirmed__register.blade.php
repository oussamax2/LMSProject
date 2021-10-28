<section class="confirmed-sec">

    <div class="container">
        <div class="row list-field-detalssessions">
            <div class="col-md-12">
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-graduation"></i>
                    <label for="course_id">Course</label>
                    <p>{{$sessions->courses->title}}</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-location-pin"></i>
                    <label for="course_id">Location</label>
                    <p>Afghanistan</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-user"></i>
                    <label for="course_id">Student</label>
                    <p>{{auth()->user()->name}}</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-book-open"></i>
                    <label for="course_id">Description</label>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon flaticon-bookmark"></i>
                    <label for="course_id">Price</label>
                    <p>{{$sessions->fee}}</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-clock"></i>
                    <label for="course_id">Session Start</label>
                    <p>{{Carbon\Carbon::parse($sessions->start)->isoFormat('llll')}}</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-target"></i>
                    <label for="course_id">target Audience</label>
                    @foreach($sessions->courses->target_audiance as $trgetaudce)
                     <p>  {{$trgetaudce->name}},</p>
                    @endforeach
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-clock"></i>
                    <label for="course_id">Session End</label>
                    <p>Mon, Oct 11, 2021 12:00 AM</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-list"></i>
                    <label for="course_id">Category</label>
                    <p>{{$sessions->courses->categories->name}}</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-list"></i>
                    <label for="course_id">Sub Category</label>
                    <p>{{isset($sessions->courses->subcategorie['name']) ?$sessions->courses->subcategorie['name']: null}}</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-globe"></i>
                    <label for="course_id">Country</label>
                    <p>{{$sessions->countries->name}}</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-drawer"></i>
                    <label for="course_id">City</label>
                    <p>{{$sessions->states->name}}</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-organization"></i>
                    <label for="course_id">Company</label>
                    <p>{{$sessions->companies->lastname}}</p>
                </div>
                <div class="form-group col-md-12 col-sm-6 col-lg-6">
                    <i class="icon icon-organization"></i>
                    <label for="course_id">Cancel period</label>

                    <p>
                    <span style="color: red;font-weight: bold;">If you want, you must cancel your register before:</span>
                    {{Carbon\Carbon::parse($sessions->start->subDays($sessions->companies->cancelpd))->isoFormat('llll')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="condition__session">
            <form action="{{ route('registsess')}}"  method="post">
                {{ csrf_field() }}
                <input type="hidden" name="session" value="{{ $sessions->id }}" />
                <div class="col-md-12">
                    <label for="chk-1">
                        <input id="chk-1" type="checkbox" />
                        <div class="title" style="display:flex">
                        <label class="label__check">
                            <input class="agreecheck" name="agreetrm[]" type="checkbox" value="canceltrm" >
                            <span></span>
                        </label>
                            <h3 class="title__acc">Cancel term</h3>
                        </div>
                        <div class="content">
                            <p>{{$sessions->companies->canceltrm}}</p>
                        </div>
                    </label>
                    <label for="chk-2">
                    <input id="chk-2" type="checkbox"  />
                    <div class="title" style="display:flex">
                        <label class="label__check">
                            <input class="agreecheck" name="agreetrm[]"  type="checkbox"  value="paymenttrm">
                            <span></span>
                        </label>
                        <h3 class="title__acc">Payement term</h3>
                    </div>
                    <div class="content">
                    <input type="checkbox">
                        {!!$sessions->companies->paymenttrm!!}
                    </div>
                    </label>
                    <label for="chk-3">
                    <input id="chk-3"  type="checkbox" />
                    <div class="title" style="display:flex">
                        <label class="label__check">
                            <input class="agreecheck" name="agreetrm[]"  type="checkbox" value="generaltrm">
                            <span></span>
                        </label>
                        <h3 class="title__acc">General term</h3>
                    </div>
                    <div class="content">
                        <p>{{$sessions->companies->generaltrm}}</p>
                    </div>
                    </label>
                    <label for="course_id">**Check all Condition & Terms</label>
                    <button id="agreebtn" type ="submit" class="button btn-default__confirm" disabled>Confirm</button>
                </div>
            </form>
        </div>
    </div>
</section>
@section('js')
	<script>
        var checkBoxes = $('input.agreecheck'),
            submitButton = $('#agreebtn');

        checkBoxes.change(function () {
            submitButton.attr("disabled", checkBoxes.is(":not(:checked)"));
            if(checkBoxes.is(":not(:checked)")) {
                submitButton.addClass('disabled');
            } else {
                submitButton.removeClass('disabled');
            }
        });
    </script>
@endsection
