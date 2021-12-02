<div>
    <div class="find-coursecatg">
        <div class="opacity color-one">
            <div class="container-fluid">
                <div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                            <div class="single-input">
                                <h2 class="searchcoursecampus">@lang('front.Find a course')</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="single-input">
                                <input type="text" name="keywords" wire:model="searchTerm" placeholder="@lang('front.Subject or qualification, eg. IT')"  id="searchTerm">

                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12"><button wire:click="resetsearch" id="resetsearch" class="action-button tran3s">@lang('front.Reset Filter')</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="course-style-filter clearfix">
        <ul class="float-left clearfix">
            <li><a href="javascript:void(0);" wire:click="resetsearch" class="tran3s {{$all ? "active" : ""}}">@lang('front.All')</a></li>
            <li><a href="javascript:void(0);" wire:click="classroom" class="tran3s {{$classroom ? "active" : ""}}">Classroom</a></li>
            <li><a href="javascript:void(0);" wire:click="online" class="tran3s {{$online ? "active" : ""}}">Online</a></li>
            <li><a href="javascript:void(0);" wire:click="elearning" class="tran3s {{$elearning ? "active" : ""}}">E-learning</a></li>
        </ul>

    </div>

    <div>
     @if(count($sessionList) >0)
        @foreach($sessionList as $session)
        <div class="single-course clearfix trending">

            <div class="text float-left">
                <div class="name clearfix">
                        <div class="image">
                            @if(isset($session->companies->picture))
                            <img src="{{ asset("storage/".$session->companies['picture']) }}" alt="">
                            @else
                            <img src="{{ asset('images/companydefault.svg') }}" alt="">
                            @endif
                        </div>
                    <div class="float-left">
                        <h6>{{$session->companies->user->name}}</h6>

                    </div>
                    @if($session->fee == 0)
                    <span class="p-bg-color float-right">@lang('front.free')</span>
                 @else
                    <strong class="s-color float-right">{{$session->fee}} USD</strong>
                 @endif

                </div>
                <h5><a href="{{ url('/') }}/{{$session->slug}}" class="tran3s">{{$session->courses->title}}</a></h5>

                <ul class="clearfix">
                    <li class="float-left">
                        <i class="flaticon-clock"></i>
                        <a  class="tran3s">{{Carbon\Carbon::parse($session->start)->isoFormat(' Do MMMM  YYYY ')}}</a>
                    </li>
                    <li class="float-left">
                        <i class="flaticon-time"></i>
                        <a  class="tran3s">{{ Carbon\Carbon::parse($session->end)->longAbsoluteDiffForHumans($session->start) }}</a>
                    </li>
                    <li class="float-left">
                        <i class="flaticon-comments"></i>
                        <a class="tran3s">@lang('front.Category:') {{isset($session->courses->categories)?$session->courses->categories->name:"NAN" }}</a>
                    </li>
                    <li class="float-right">
                        <i class="flaticon-placeholder"></i>
                        <a  class="tran3s">{{ $session->countries->name }}{{isset($session->cities->name)?','.$session->cities->name:""}}</a>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
     @else
        <div class="single-course clearfix trending">

           <div class="float-left">

                <h6>@lang('front.no data available')</h6>

            </div>
        </div>
     @endif

    </div>

    {{ $sessionList->links() }}

</div>

</div>
@section('js')
<script type="text/javascript">
    $(document).ready(function() {

        $('select[name="country_id"]').on('change', function() {

            var stateID = $(this).val();

            if(stateID) {
                $.ajax({
                    url: '/state/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="state"]').empty();
                        $('select[name="state"]').append('<option value="">All</option>');
                        $('select[name="city"]').empty();
                        $('select[name="city"]').append('<option value="">All</option>');
                        $.each(data, function(key, value) {
                            $('select[name="state"]').append('<option value="'+ key +'">'+ value +'</option>');

                        });

                        $('select[name="state"]').selectpicker('refresh');
                        $('select[name="city"]').selectpicker('refresh');
                    }

                });
            }else{
                $('select[name="state"]').empty();
            }
        });

        $('select[name="state"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/city/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                        $('select[name="state"]').selectpicker('refresh');
                        $('select[name="city"]').selectpicker('refresh');

                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });

    });
</script>
<script>
$(document).ready(function() {
 @this.set('searchTerm', "{{request()->keywords}}");
 @this.set('category', "{{request()->cat}}");
 @this.set('city', "{{request()->cities}}");
 @this.set('company', "{{request()->comp}}");
});
/** app filtre **/
$( "#appfiltre" ).on( "click", function() {
    var myArray=Array();
$("input[name=target]:checkbox:checked").each(function(){ myArray.push($(this).val()); })
 @this.set('target', myArray);
 @this.set('city', $("#city" ).val());
 @this.set('country', $("#country" ).val());
 @this.set('price',1);
 @this.set('pricemin', $("input[name=pricemin]" ).val());
 @this.set('pricemax', $("input[name=pricemax]" ).val());
 @this.set('datemin', $("input[name=datemin]" ).val());
 @this.set('datemax', $("input[name=datemax]" ).val());


});
/** chose category **/
    $( "#subcat li" ).on( "click", function() {
    @this.set('subcategory', this.value); // get id of clicked li
    @this.set('category', "");
});
$( ".panel-title a" ).on( "click", function() {
    @this.set('category', $(this).attr('data-id'));
    @this.set('subcategory', ""); // get id of clicked li
    @this.set('city', "");
});
$( "#resetsearch" ).on( "click", function() {
    $('input[name="target"]').each(function() {
			this.checked = false;
		});
});

</script>


@endsection
