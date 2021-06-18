
<li class="nav-item">
    <a class="nav-link" href="{{ url('/dashboarduser') }}">
        <span class="icon icon-speedometer"></span>
        <span class="menu-item-dsh">@lang('front.Dashboard')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('registerationsuser*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('registerationsuser.index') }}">
        <span class="icon icon-login"></span>
        <span class="menu-item-dsh">@lang('front.Registerations')</span>
    </a>
</li>


