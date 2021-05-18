<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            @if(auth()->user()->hasRole('admin'))
            @include('layouts.menu')
            @endif
            @if(auth()->user()->hasRole('company'))
            @include('layouts.menu-vondor')
            @endif
            @if(auth()->user()->hasRole('user'))
            @include('layouts.menu-user')
            @endif
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button">
    </button>
</div>
