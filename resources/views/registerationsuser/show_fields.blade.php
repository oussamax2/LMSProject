
<div class="list-field-detalssessions row">
<!-- Id Field -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('course_id', 'Course') !!}
    <p>{{ $registerations->sessions->courses->title}}</p>
</div>
<!-- description -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon icon-book-open"></i>
    {!! Form::label('description', 'Description') !!}
    <p>{{ $registerations->sessions->courses->companies->description}}</p>
</div>
<!-- Location -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon icon-location-pin"></i>
    {!! Form::label('location', 'Location') !!}
    <p>{{ $registerations->sessions->countries->name}}</p>
</div>
<!-- fee -->
<div class="form-group col-sm-6 col-md-12 col-lg-6">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('price', 'Price') !!}
    <p>{{ $registerations->sessions->fee}}</p>
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
    <p>{{Carbon\Carbon::parse($registerations->sessions->start)->isoFormat(' Do MMMM  YYYY ')}}</p>
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
    <div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">BOT</div>
          <div class="msg-info-time">12:45</div>
        </div>

        <div class="msg-text">
          Hi, welcome to SimpleChat! Go ahead and send me a message. 😄
        </div>
      </div>
    </div>

    <div class="msg right-msg">
      <div
       class="msg-img"
       style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">Sajad</div>
          <div class="msg-info-time">12:46</div>
        </div>

        <div class="msg-text">
          You can change your name in JS section!
        </div>
      </div>
    </div>
  </main>

  <form class="msger-inputarea">

    <input type="text" class="msger-input" placeholder=" @lang('front.Enter your message...')">
    <input class="uploader__input" id="file-upload" type="file" name="fileUpload" accept="image/*" />
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
<!-- messagerie-->


