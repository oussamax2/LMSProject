<!-- timeline registrations -->
<ul class="vcv-timeline">
  <li class="vcv-timeline-item vcv-step-done" data-step="1" data-step-title="Download"><span>Download</span></li>
  <li class="vcv-timeline-item vcv-step-done" data-step="2"><span>Install</span></li>
  <li class="vcv-timeline-item" data-step="3"><span>Activate</span></li>
  <li class="vcv-timeline-item" data-step="4"><span>Go Premium</span></li>
</ul>
<!-- timeline registrations -->
<div class="list-field-detalssessions">
<!-- Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('course_id', 'Course') !!}
    <p>{{ $registerations->sessions->courses->title}}</p>
</div>

<!-- description -->
<div class="form-group">
<i class="icon icon-book-open"></i>
    {!! Form::label('description', 'Description') !!}
    <p>{{ $registerations->sessions->courses->companies->description}}</p>
</div>
<!-- Location -->
<div class="form-group">
<i class="icon icon-location-pin"></i>
    {!! Form::label('location', 'Location') !!}
    <p>{{ $registerations->sessions->countries->name}}</p>
</div>
<!-- fee -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('price', 'Price') !!}
    <p>{{ $registerations->sessions->fee}}</p>
</div>
<!-- User Id Field -->
<div class="form-group">
<i class="icon icon-user"></i>
    {!! Form::label('user_id', __('forms.Student')) !!}
    <p>{{ $registerations->user['name'] }}</p>
</div>
<!-- Session Id Field -->
<div class="form-group">
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
    <button type="submit" class="msger-send-btn"> @lang('front.Send')</button>
  </form>
</section>
<!-- messagerie-->



