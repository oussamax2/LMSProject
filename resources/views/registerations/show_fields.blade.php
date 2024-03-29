
<div class="list-field-detalssessions row">
<!-- Id Field -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('course_id', __('forms.Course Title')) !!}
    <p>{{ $registerations->sessions->courses->}}</p>
</div>
<!-- description -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon icon-book-open"></i>
    {!! Form::label('description', __('forms.Description')) !!}
    <p>{{ $registerations->sessions->courses->companies->description}}</p>
</div>
<!-- Location -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon icon-location-pin"></i>
    {!! Form::label('location', __('forms.Location')) !!}
    <p>{{ $registerations->sessions->countries->name}}</p>
</div>
<!-- fee -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('price', __('forms.Price')) !!}
    <p>{{ $registerations->sessions->fee}} <strong>USD</strong></p>
</div>
<!-- User Id Field -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon icon-user"></i>
    {!! Form::label('user_id', __('forms.Student')) !!}
    <p>{{ $registerations->user['name'] }}</p>

</div>
<!-- Session Id Field -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
  <i class="icon icon-clock"></i>
    {!! Form::label('session_id', __('forms.Session Start')) !!}
    <p>{{Carbon\Carbon::parse($registerations->sessions->start)->isoFormat('llll')}}</p>
</div>
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
     style="background-image: url({{ asset('images/logo/video-tutorials.png')}})"
     @else
     style="background-image: url({{ asset('images/logo/programmer.png')}})"
     @endif
    ></div>

    <div class="msg-bubble">
      <div class="msg-info">
        <div class="msg-info-name">{{$messaging->user->name}}</div>
        <div class="msg-info-time">{{Carbon\Carbon::parse($messaging->created_at)->diffForHumans()}}</div>
      </div>

      <div class="msg-text">
        {{$messaging->message}}
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



