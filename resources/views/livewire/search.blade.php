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
            <li><a href="#" class="tran3s active">@lang('front.All')</a></li>
            <li><a href="#" class="tran3s">@lang('front.free')</a></li>
        </ul>
    </div>

    <div>
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
                    <strong class="p-pg-color float-right">FREE</strong>
                 @else
                    <strong class="s-color float-right">$ {{$session->fee}}</strong>
                 @endif

                </div>
                <h5><a href="{{ url('singlsession') }}/{{$session->id}}" class="tran3s">{{$session->courses->title}}</a></h5>

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
                        <a  class="tran3s">{{ $session->countries->name }}{{isset($session->states->name)?','.$session->states->name:""}}</a>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach


    </div>

    {{ $sessionList->links() }}

</div>

</div>
@section('js')
<script>
$(document).ready(function() {
 @this.set('searchTerm', "{{request()->keywords}}");
 @this.set('category', "{{request()->cat}}");
 @this.set('city', "{{request()->cities}}");
});
/** app filtre **/
$( "#appfiltre" ).on( "click", function() {
    var myArray=Array();
$("input[name=target]:checkbox:checked").each(function(){ myArray.push($(this).val()); })
 @this.set('target', myArray);
 @this.set('city', $("#city" ).val());
 @this.set('country', $("#country" ).val());
 @this.set('pricemin', $("input[name=pricemin]" ).val());
 @this.set('pricemax', $("input[name=pricemax]" ).val());


});
/** chose category **/
    $( "#subcat li" ).on( "click", function() {
    @this.set('subcategory', this.value); // get id of clicked li
});
$( ".panel-title a" ).on( "click", function() {
    //alert( $(this).attr('data-id'));
    // alert($(this).data("id"));
    @this.set('category', $(this).attr('data-id')); // get id of clicked li

});
$( "#resetsearch" ).on( "click", function() {
    $('input[name="target"]').each(function() {
			this.checked = false;
		});
});

</script>
@endsection
