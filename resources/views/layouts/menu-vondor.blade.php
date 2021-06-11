

<li class="nav-item {{ Request::is('courses*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('courses.index') }}">
        <span class="icon icon-graduation"></span>
        <span class="menu-item-dsh">@lang('front.Courses')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('sessions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('sessions.index') }}">
        <span class="icon icon-calendar"></span>
        <span class="menu-item-dsh">@lang('front.Sessions')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('registerations*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('registerations.index') }}">
        <span class="icon icon-user-following"></span>
        <span class="menu-item-dsh">@lang('front.Registerations')</span>
    </a>
</li>


