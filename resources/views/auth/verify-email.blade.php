<div class="email-verify-lms">
    <div class="email-verify-content" style="text-align:center;">
        <div class="logo" style="margin:2rem 0;">
        <a href="/"><a href="{{ route ('Campus') }}"><img src="{{ asset('images/logo/logo3.png') }}" alt="Logo"></a></a>
        </div>
                <div class="mb-4 text-sm text-gray-600 text-center" style="padding: 2rem 5rem;">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 text-center">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between text-center" style="display: flex; text-align: center; justify-content: center; align-items: center;">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <button style="background: #292929;color: #fff;border: none; padding: 10px; text-transform: uppercase; margin-right: 50px;">
                        {{ __('Resend Verification Email') }}
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900" style="background: #ddd; border: none; padding: 10px; text-transform: uppercase;">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
</div>
</div>
