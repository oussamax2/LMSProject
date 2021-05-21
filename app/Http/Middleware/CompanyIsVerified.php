<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
if(Auth::user()->hasRole('admin'))
        return $response;
        if(isset(Auth::user()->email_verified_at )){
  if (Auth::check() && (! Auth::user()->companies->status  )) {
            $isActive = Auth::user()->companies->status;
            Auth::logout();

            return redirect('login')->withErrors(__('validation.Your account is not active. Please contact to administrator.'));

        }}

        return $response;
    }
}
