
<br/><br/>
<li class="nav-item" style="background-color: #143455; height: 43px;padding: 10px 25px 10px 0px;">

        <span class="menu-item-dsh">@lang('front.Courses')</span><br/>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">
                <span class="icon icon-speedometer"></span>
                <span class="menu-item-dsh">@lang('front.Dashboard')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admincourses*') ? 'active' : '' }}">
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
        <li class="nav-item {{ Request::is('adminregisterations*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('registerations.index') }}">
                <span class="icon icon-user-following"></span>
                <span class="menu-item-dsh">@lang('front.Registerations')</span>
            </a>
        </li>




        <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <span class="icon icon-list"></span>
                <span class="menu-item-dsh">@lang('front.Categories')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('subcategories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('subcategories.index') }}">
                <span class="icon icon-list"></span>
                <span class="menu-item-dsh">@lang('front.Subcategories')</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('target_audiances*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('targetAudiances.index') }}">
                <span class="icon icon-target"></span>
                <span class="menu-item-dsh">@lang('front.target_audiances')</span>
            </a>
        </li>





</li>


<li class="nav-item" style="background-color: #143455; height: 43px;padding: 0px 25px 10px 0px;"><br/>
    <span class="icon menu-item-dsh">@lang('front.User')</span><br/>
    <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('indexadmins') }}">
            <span class="icon icon-people"></span>
            <span class="menu-item-dsh">@lang('admin.Admins')</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
            <span class="icon icon-people"></span>
            <span class="menu-item-dsh">@lang('front.Users')</span>
        </a>
    </li>
    
    <li class="nav-item {{ Request::is('companies*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('companies.index') }}">
        <span class="icon icon-organization"></span>
        <span class="menu-item-dsh">@lang('front.Companies')</span>
    </a>
   </li>
   <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('roles.index') }}">
        <span class="icon icon-lock-open"></span>
        <span class="menu-item-dsh">@lang('front.Roles')</span>
    </a>
</li>

</li>
<li class="nav-item" style="background-color: #143455; height: 43px;padding: 0px 25px 10px 0px;"><br/>
    <span class="menu-item-dsh">@lang('front.Settings')</span><br/>
    <li class="nav-item {{ Request::is('tags*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tags.index') }}">
            <span class="icon icon-tag"></span>
            <span class="menu-item-dsh">@lang('front.Tags')</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('countries*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('countries.index') }}">
            <span class="icon icon-globe"></span>
            <span class="menu-item-dsh">@lang('front.Countries')</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('states*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('states.index') }}">
            <span class="icon icon-layers"></span>
            <span class="menu-item-dsh">@lang('front.States')</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('cities*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('cities.index') }}">
            <span class="icon icon-drawer"></span>
            <span class="menu-item-dsh">@lang('front.Cities')</span>
        </a>
    </li>
</li>


<li class="nav-item {{ Request::is('contacts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contacts.index') }}">
        <span class="icon icon-envelope-letter"></span>
        <span class="menu-item-dsh">@lang('front.Contacts')</span>
    </a>
</li>

<li class="nav-item {{ Request::is('languages*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('languages.index') }}">
    <span class="icon icon-flag"></span>
    <span class="menu-item-dsh">@lang('front.Languages')</span>
    </a>
</li>
