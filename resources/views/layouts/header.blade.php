<meta name="csrf-token" content="{{ csrf_token() }}">

<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
    <a class="navbar-brand" href="#">e-genset</a>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item">
            <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
        </li>

        <!-- <li class="nav-item px-3">
            <a class="nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Settings</a>
        </li> -->
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <!-- <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-list"></i></a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
        </li> -->
        <li class="nav-item dropdown nav-profile">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="/assets/img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                <span class="d-md-down-none">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-header text-center">
                    <strong>Settings</strong>
                </div>

                <a class="dropdown-item" href="{{ route('users.profile', Auth::user()->id) }}"><i class="fa fa-user"></i>Profile</a>
                <a class="dropdown-item" href="{{ url('admin/logout') }}"><i class="fa fa-lock"></i>Logout</a>
                <!-- <i class="fa fa-lock" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"></i> Logout</a> -->

                <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form> -->
            </div>
        </li>
        <li class="nav-item d-md-down-none">
            <!-- <a class="nav-link navbar-toggler aside-menu-toggler" href="#">☰</a> -->
        </li>

    </ul>
</header>

<script src="/assets/datatables/jquery/dist/jquery.js"></script>
<script src="/assets/datatables/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready( function() {
        $(".nav-profile").on('click', 'a', function(e){
           
            if ($.ajaxLoad) {
                e.preventDefault();
            }
            
            $(this).parent().toggleClass('open');

        });
    });
</script>