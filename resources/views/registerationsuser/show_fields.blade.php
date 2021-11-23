
<div class="list-field-detalssessions row">
<!-- Id Field -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('course_id', __('front.course')) !!}
    @if(auth()->user()->hasRole('company'))
      <a  style="color: #36d64c;font-size: 18px; font-weight: 700;" href="{{ route('detailcourses',$registerations->sessions->courses->id )}}">{{ $registerations->sessions->courses->title}}</a>
    @else
      <p>{{ $registerations->sessions->courses->title}}</p>
    @endif
</div>

<!-- Company Field -->
@if($registerations->status == 2)
<div class="form-group col-sm-6 col-md-12 col-lg-6" style="border: 2px solid #ff7417;padding-top: 15px;">
<i class="icon icon-wallet"></i>
    {!! Form::label('Company', __('front.Payment details')) !!}<br>
    <p>{{ $registerations->sessions->companies->paymentinfo}}<br>
        @if(auth()->user()->hasRole('user'))
     {{-- <a href="{{ route('actionpay',$registerations->id)}}" ><button type="submit" class="msger-send-btn"> Pay Now</button></a>--}}
        @endif
    </p>

</div>


@endif
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon flaticon-bookmark"></i>

    {!! Form::label('Company', __('front.Company')) !!}
    <p>{{ $registerations->sessions->companies->lastname}}</p>

</div>

<!-- description -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon icon-book-open"></i>
    {!! Form::label('description', __('forms.Description')) !!}
    <p>{{ isset($registerations->sessions->courses->companies->description) ?$registerations->sessions->courses->companies->description: "no description" }}</p>
</div>
<!-- Location -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon icon-location-pin"></i>
    {!! Form::label('location', __('forms.Location')) !!}
    <p>{{ $registerations->sessions->countries->name}}</p>
</div>
<!-- Session startDate Field -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
  <i class="icon icon-clock"></i>
    {!! Form::label('start', __('forms.Session Start')) !!}
    @if(auth()->user()->hasRole('company'))
    <a  style="color: #36d64c;font-size: 18px; font-weight: 700;" href="{{ route('sessions.show',$registerations->sessions->id )}}"> <p>{{Carbon\Carbon::parse($registerations->sessions->start)->isoFormat('llll')}}</p></a>
@else
<p>{{Carbon\Carbon::parse($registerations->sessions->start)->isoFormat('llll')}}</p>
@endif
</div>

<!-- User Id Field -->
@if(!auth()->user()->hasRole('user'))
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon icon-user"></i>
    {!! Form::label('user_id', __('forms.Student')) !!}
    <a  style="color: #36d64c;font-size: 18px; font-weight: 700;" href="{{ route('detailuser',$registerations->user['id'] )}}"> {{ $registerations->user['name'] }}</a>

</div>
@endif


<!-- Session endDate Field -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
  <i class="icon icon-clock"></i>
    {!! Form::label('end', __('forms.Session endDate')) !!}
    <p>{{Carbon\Carbon::parse($registerations->sessions->end)->isoFormat('llll')}}</p>
</div>

<!-- fee -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('price', __('forms.Price')) !!}
    <p>{{ $registerations->sessions->fee}} <strong>USD</strong></p>
</div>
<!-- fee -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('sess_type', __('forms.Session Type')) !!}
    <p>{{ $registerations->sessions->sess_type}}</p>


</div>
<div class="form-group col-sm-6 col-md-12 col-lg-6">
    <i class="icon flaticon-bookmark"></i>
    {!! Form::label('target_audiance', __('front.Target Audiance :')) !!}
    <p>{{ implode(", ",json_decode($registerations->sessions->courses->target_audiance->pluck('name'))) }}</p>


</div>
<div class="form-group col-sm-6 col-md-12 col-lg-6">
    <i class="icon flaticon-bookmark"></i>
    {!! Form::label('Category', __('front.Category :')) !!}
    <p>{{$registerations->sessions->courses->categories->name}}</p>


</div>
<div class="form-group col-sm-6 col-md-12 col-lg-6">
    <i class="icon flaticon-bookmark"></i>
    {!! Form::label('Sub category', __('front.Sub category:')) !!}
    <p>{{isset($registerations->sessions->courses->subcategorie['name']) ?$registerations->sessions->courses->subcategorie['name']: null}}</p>


</div>
<div class="form-group col-sm-6 col-md-12 col-lg-6">
    <i class="icon flaticon-bookmark"></i>
    {!! Form::label('Country', __('front.Country:')) !!}
    <p>{{$registerations->sessions->countries->name}}</p>


</div>
<div class="form-group col-sm-6 col-md-12 col-lg-6">
    <i class="icon flaticon-bookmark"></i>
    {!! Form::label('City', __('front.City:')) !!}
    <p>{{$registerations->sessions->states->name}}</p>


</div>
@if($registerations->status != 4)
  @if(1)
    <!-- Limit cancellation day -->
    <div class="form-group col-sm-6 col-md-12 col-lg-6 alert alert-danger">
    <i class="icon flaticon-bookmark"></i>
        {!! Form::label('sess_type', ('If you want, you must cancel your register before:')) !!}

        <p>{{ Carbon\Carbon::parse($registerations->sessions->start->subDays($registerations->sessions->companies->cancelpd))->isoFormat('llll')}}</p>
    </div>
    </div>
  @endif
@endif
</div>

<!-- messagerie-->
<section class="msger">
  <header class="msger-header">
    <div class="msger-header-title">
      <i class="icon icon-bubbles"></i> @lang('front.messaging')
    </div>
  </header>

  <main class="msger-chat">

   @foreach ($registerations->messaging as $messaging )
   <div class="msg {{(auth()->user()->id == $messaging->user->id) ? 'left-msg' : 'right-msg'}}">
    <div
     class="msg-img"
     @if($messaging->user->hasAnyRole('company'))
     style="background-image: url({{ asset("storage/".$messaging->user->companies['picture']) }}"
     @else
     style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"
     @endif
    ></div>

    <div class="msg-bubble">
      <div class="msg-info">
        <div class="msg-info-name">{{$messaging->user->name}}</div>
        <div class="msg-info-time">{{Carbon\Carbon::parse($messaging->created_at)->diffForHumans()}} </div>
      </div>

      <div class="msg-text">
        {!!$messaging->message!!}
      </div>
    </div>
  </div>
   @endforeach
  </main>
  <form class="msger-inputarea" action="{{ route('sendmsg')}}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
    <input type="text" class="msger-input" name="message"placeholder=" @lang('front.Enter your message...')" required>
    <input type="text" hidden name="idr" value="{{$registerations->id}}">
    <div id="file-upload-filename"></div>
    <input class="uploader__input" id="file-upload" type="file" name="file_send" accept="image/*,.doc,.docx,.pdf" />
    <label class="uploader__label" for="file-upload">
      <div class="uploader__wrapper">
        <img class="uploader__file hidden" src="#" alt="">
        <svg class="uploader__svg" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 98 90">
          <path class="uploader__clipalt" d="M47.559,12.453L9.966,50.05 c0,0-16.188,15.611-0.892,30.908c15.297,15.301,30.995-0.804,30.995-0.804l50.666-50.669c0,0,10.814-10.891-0.268-21.981 c-11.087-11.088-21.97-0.288-21.97-0.288L24.221,51.486c0,0-10.736,8.541-2.432,16.921c8.307,8.384,16.832-2.521,16.832-2.521 l32.535-32.531"/>
          <path class="uploader__clip" d="M47.559,12.453L9.966,50.05 c0,0-16.188,15.611-0.892,30.908c15.297,15.301,30.995-0.804,30.995-0.804l50.666-50.669c0,0,10.814-10.891-0.268-21.981 c-11.087-11.088-21.97-0.288-21.97-0.288L24.221,51.486c0,0-10.736,8.541-2.432,16.921c8.307,8.384,16.832-2.521,16.832-2.521 l32.535-32.531"/>
        </svg>
      </div>
    </label>
    <button type="submit" class="msger-send-btn"> @lang('front.Send')</button>
  </form>
</section>

@push('scripts')
<script>
var input = document.getElementById( 'file-upload' );
var infoArea = document.getElementById( 'file-upload-filename' );
input.addEventListener( 'change', showFileName );
function showFileName( event ) {
var input = event.srcElement;
var fileName = input.files[0].name;
  infoArea.textContent =  fileName;
}
</script>
@endpush
<!-- messagerie-->



