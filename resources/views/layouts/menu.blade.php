
<li class="nav-item {{ Request::is('courses*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('courses.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Courses</span>
    </a>
</li>
