

<li class="nav-item {{ Request::is('registerationsuser*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('registerationsuser.index') }}">
        <span class="icon icon-login"></span>
        <span class="menu-item-dsh">@lang('front.Registerations')</span>
    </a>
</li>


