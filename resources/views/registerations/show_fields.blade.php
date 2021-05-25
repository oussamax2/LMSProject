<!-- timeline registrations -->
<ul class="vcv-timeline">
  <li class="vcv-timeline-item vcv-step-done" data-step="1" data-step-title="Download"><span>Download</span></li>
  <li class="vcv-timeline-item vcv-step-done" data-step="2"><span>Install</span></li>
  <li class="vcv-timeline-item" data-step="3"><span>Activate</span></li>
  <li class="vcv-timeline-item" data-step="4"><span>Go Premium</span></li>
</ul>
<!-- timeline registrations -->
<!-- Id Field -->

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $registerations->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('forms.User Name')) !!}
    <p>{{ $registerations->user['name'] }}</p>
</div>

<!-- Session Id Field -->
<div class="form-group">
    {!! Form::label('session_id', __('forms.Course Title')) !!}
    <p>{{ $registerations->sessions->courses->title }}</p>
</div>
<!-- Session Id Field -->
<div class="form-group">
    {!! Form::label('session_id', __('forms.Session startDate')) !!}
    <p>{{ $registerations->sessions->start }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $registerations->created_at }}</p>
</div>

<!-- messagerie-->
<section class="msger">
  <header class="msger-header">
    <div class="msger-header-title">
      <i class="fas fa-comment-alt"></i> messaging
    </div>
    <div class="msger-header-options">
      <span><i class="fas fa-cog"></i></span>
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
    <input type="text" class="msger-input" placeholder="Enter your message...">
    <button type="submit" class="msger-send-btn">Send</button>
  </form>
</section>
<!-- messagerie-->



