
<li class="nav-item {{ Request::is('countries*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('countries.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Countries</span>
    </a>
</li>

<li class="nav-item {{ Request::is('states*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('states.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>States</span>
    </a>
</li>
<li class="nav-item {{ Request::is('cities*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('cities.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Cities</span>
    </a>
</li>
<li class="nav-item {{ Request::is('registerations*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('registerations.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Registerations</span>
    </a>
</li>
<li class="nav-item {{ Request::is('companies*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('companies.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Companies</span>
    </a>
</li>


<li class="nav-item {{ Request::is('courses*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('courses.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Courses</span>
    </a>
</li>

<li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('categories.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Categories</span>
    </a>
</li>
<li class="nav-item {{ Request::is('sessions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('sessions.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Sessions</span>
    </a>
</li>

<li class="nav-item {{ Request::is('tags*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tags.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Tags</span>
    </a>
</li>
<li class="nav-item {{ Request::is('subcategories*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('subcategories.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Subcategories</span>
<li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('roles.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Roles</span>
    </a>
</li>
