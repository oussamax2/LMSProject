
<div class="registration-banner-company">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="registration-form">

                    <form   enctype="multipart/form-data">
                      {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-wrapper">
                                    <h6>@lang('front.Your Name')</h6>
                                    <input type="text" wire:model="name" placeholder="@lang('front.Your Name')" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                    <h6>@lang('front.Your EMail')</h6>
                                    <input type="email" wire:model="email" placeholder="@lang('front.sample@gmail.com')" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    <h6>@lang('front.Password')</h6>
                                    <input type="password" wire:model="password" placeholder="@lang('front.Password')" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <h6>@lang('front.Confirm Password')</h6>
                                    <input type="password" wire:model="password_confirmation" placeholder="@lang('front.Confirm Password')" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                    <h6>@lang('front.Short Description')</h6>
                                    <textarea wire:model="shortDescription" id=""></textarea>
                                    <h6>@lang('front.Facebook Url')</h6>
                                    <input type="text"  wire:model="fcburl" placeholder="@lang('front.Facebook Url')" value="{{ old('fcburl') }}">
                                    @if ($errors->has('fcburl'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('fcburl') }}</strong>
                                        </span>
                                    @endif
                                    <h6>@lang('front.Twitter Url')</h6>
                                    <input type="text" wire:model="twitturl"  placeholder="@lang('front.Twitter Url')" value="{{ old('twitturl') }}">
                                    @if ($errors->has('twitturl'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('twitturl') }}</strong>
                                        </span>
                                    @endif
                                </div> <!-- /.form-wrapper -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrapper">
                                    <h6>@lang('front.Your LastName')</h6>
                                    <input type="text" wire:model="lastname"  placeholder="@lang('front.Your LastName')" value="{{ old('lastname') }}" required>
                                    @if ($errors->has('lastname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                                    <h6>@lang('front.Mobile Number')</h6>
                                    <input type="text" wire:model="telephone"  placeholder="@lang('front.+880 854 875 971')" value="{{ old('telephone') }}">
                                    @if ($errors->has('telephone'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('telephone') }}</strong>
                                        </span>
                                    @endif
                                    <h6>@lang('front.Your WebSite')</h6>
                                    <input type="text"  wire:model="website" placeholder="@lang('front.Your WebSite')" value="{{ old('website') }}">
                                    @if ($errors->has('website'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </span>
                                    @endif
                                    <h6>@lang('front.Your Picture')</h6>
                                    @error('picture') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    @if($picture && in_array($picture->getClientOriginalExtension(), array("png", "jpg", "jpeg", "Cleveland"))  )
                                    <br>
                                    <image src="{{$picture->temporaryUrl()}}" style="width: 200px;">
                                        <br>
                                    @endif
                                    <input type="file" accept="image/*"  wire:model="picture" >
                                    <h6>@lang('front.Description')</h6>
                                    <textarea wire:model="description" ></textarea>
                                    <h6>@lang('front.Linkedin Url')</h6>
                                    <input type="text" wire:model="linkdinurl"  placeholder="@lang('front.Linkedin Url')" value="{{ old('linkdinurl') }}">
                                    @if ($errors->has('linkdinurl'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('linkdinurl') }}</strong>
                                        </span>
                                    @endif
                                    <h6>@lang('front.Dribble Url')</h6>
                                    <input type="text" wire:model="dribbleurl"  placeholder="@lang('front.Dribble Url')" value="{{ old('dribbleurl') }}">
                                    @if ($errors->has('dribbleurl'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('dribbleurl') }}</strong>
                                        </span>
                                    @endif
                                </div> <!-- /.form-wrapper -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                            <button wire:click.prevent="register" class="tran3s hvr-trim">@lang('front.SIGN UP NOW!!')</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- /.registration-form -->
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>

