
<br/><br/>
<li class="nav-item" style="background-color: #72808e;height: 43px;padding: 10px 25px 10px 0px;">

        <span class="menu-item-dsh">Courses</span><br/>
        <li class="nav-item {{ Request::is('courses*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('courses.index') }}">
                <span class="icon icon-docs"></span>
                <span class="menu-item-dsh">Courses</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('registerations*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('registerations.index') }}">
                <span class="icon icon-login"></span>
                <span class="menu-item-dsh">Registerations</span>
            </a>
        </li>




        <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <span class="icon icon-wallet"></span>
                <span class="menu-item-dsh">Categories</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('subcategories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('subcategories.index') }}">
                <span class="icon icon-wallet"></span>
                <span class="menu-item-dsh">Subcategories</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('sessions*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('sessions.index') }}">
                <span class="icon icon-briefcase"></span>
                <span class="menu-item-dsh">Sessions</span>
            </a>
        </li>




</li>


<li class="nav-item" style="background-color: #72808e;height: 43px;padding: 0px 25px 10px 0px;"><br/>
    <span class="menu-item-dsh">User</span><br/>
    <li class="nav-item {{ Request::is('companies*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('companies.index') }}">
        <span class="icon icon-drawer"></span>
        <span class="menu-item-dsh">Companies</span>
    </a>
   </li>
   <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('roles.index') }}">
        <span class="icon icon-graduation"></span>
        <span class="menu-item-dsh">Roles</span>
    </a>
</li>

</li>
<li class="nav-item" style="background-color: #72808e;height: 43px;padding: 0px 25px 10px 0px;"><br/>
    <span class="menu-item-dsh">Settings</span><br/>
    <li class="nav-item {{ Request::is('tags*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tags.index') }}">
            <span class="icon icon-tag"></span>
            <span class="menu-item-dsh">Tags</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('countries*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('countries.index') }}">
            <span class="icon icon-globe"></span>
            <span class="menu-item-dsh">Countries</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('states*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('states.index') }}">
            <span class="icon icon-layers"></span>
            <span class="menu-item-dsh">States</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('cities*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('cities.index') }}">
            <span class="icon icon-drawer"></span>
            <span class="menu-item-dsh">Cities</span>
        </a>
    </li>
</li>


<li class="nav-item {{ Request::is('contacts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('contacts.index') }}">
        <span class="icon icon-envelope-open"></span>
        <span class="menu-item-dsh">Contacts</span>
    </a>
</li>
