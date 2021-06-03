

<li class="nav-item {{ Request::is('courses*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('courses.index') }}">
        <span class="icon icon-docs"></span>
        <span class="menu-item-dsh">Courses</span>
    </a>
</li>
<li class="nav-item {{ Request::is('sessions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('sessions.index') }}">
        <span class="icon icon-briefcase"></span>
        <span class="menu-item-dsh">Sessions</span>
    </a>
</li>
<li class="nav-item {{ Request::is('registerations*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('registerations.index') }}">
        <span class="icon icon-login"></span>
        <span class="menu-item-dsh">Registerations</span>
    </a>
</li>


