<style>
    .nav-item > .active {
        color: rgb(151 29 82) !important;
        background-color: #fff !important;
    }
</style>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{url('user/dashboard')}}" class="nav-link {{ (request()->is('user/dashboard*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/user/profile')}}" class="nav-link {{ (request()->is('user/profile*')) ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Profile</p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="#" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>Logout</p>
            </a>
        </li>
    </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
</form>
