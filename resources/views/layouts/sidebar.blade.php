
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}"><i class="icon-speedometer"></i> Dashboard 
                <!-- <span class="badge badge-info">NEW</span> -->
                </a>
            </li>

            <li class="nav-title">
                Master
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-circle"></i> Master</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/customer') }}"><i class="icon-people"></i> Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/container') }}"><i class="fa fa-truck"></i> Container</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/generator') }}" target="_top"><i class="fa fa-flash"></i> Generator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/ship') }}"><i class="fa fa-ship"></i> Kapal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/field') }}"><i class="fa fa-map-o"></i> Lapangan</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users') }}"><i class="icon-people"></i> Users</a>
            </li>
            <li class="divider"></li>
            <li class="nav-title">
                Transaction
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-circle"></i> Transaction</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/rent') }}" target="_top"><i class="fa fa-user-secret"></i> Recooling & Monitoring</a>
                    </li>
                    
                </ul>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/fuelUsage') }}" target="_top"><i class="fa fa-user-secret"></i> Bon Pemakaian Solar</a>
                    </li>
                    
                </ul>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/invoice') }}" target="_top"><i class="fa fa-file-o"></i> Invoice</a>
                    </li>
                    
                </ul>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/spka') }}" target="_top"><i class="fa fa-file-o"></i> SPKA</a>
                    </li>
                    
                </ul>
            </li>
            <li class="divider"></li>
            <li class="nav-title">
                Laporan
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-circle"></i> Harian</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/rent/refeerContainer/show') }}" target="_top"><i class="fa fa-file"></i> RM Refeer Container</a>
                    </li>
                    
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-circle"></i> Mingguan</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/rent/refeerContainer/show') }}" target="_top"><i class="fa fa-file"></i> Recooling &amp; Monitoring</a>
                    </li>
                    
                </ul>
            </li>
        </ul>
    </nav>
</div>