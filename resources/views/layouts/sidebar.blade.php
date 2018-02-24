
<div class="sidebar">
    <nav class="sidebar-nav">
        @if (Auth::user()->id_role == '1')
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
                        <a class="nav-link" href="{{ url('admin/field') }}"><i class="fa fa-map-o"></i> Lapangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/ship') }}"><i class="fa fa-ship"></i> Kapal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/container') }}"><i class="fa fa-truck"></i> Container</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/generator') }}" target="_top"><i class="fa fa-flash"></i> Generator</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users') }}"><i class="icon-people"></i> Users</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-circle"></i> Configuration</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/configuration') }}"><i class="icon-people"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/service') }}"><i class="icon-people"></i> Our Services</a>
                    </li>
                </ul>
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
                        <a class="nav-link" href="{{ url('admin/double-check') }}" target="_top"><i class="fa fa-user-secret"></i> Double Check</a>
                    </li>
                    
                </ul>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/fuelStock') }}" target="_top"><i class="fa fa-user-secret"></i> Solar Masuk (Stock)</a>
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
            <!-- <li class="nav-item nav-dropdown"> -->
                <!-- <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-circle"></i> Harian</a> -->
                <!-- <ul class="nav-dropdown-items"> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/refeerContainer/report') }}" target="_top"><i class="fa fa-file"></i> Harian</a>
                    </li>
                    
                <!-- </ul>
            </li> -->
            <!-- <li class="nav-item nav-dropdown"> -->
                <!-- <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-circle"></i> Mingguan</a> -->
                <!-- <ul class="nav-dropdown-items"> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/refeerContainer/weekly-report') }}" target="_top"><i class="fa fa-file"></i> Mingguan</a>
                    </li>
                    
                <!-- </ul>
            </li> -->
        </ul>
        @endif

        @if (Auth::user()->id_role == '2')
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
                        <a class="nav-link" href="{{ url('admin/field') }}"><i class="fa fa-map-o"></i> Lapangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/ship') }}"><i class="fa fa-ship"></i> Kapal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/container') }}"><i class="fa fa-truck"></i> Container</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/generator') }}" target="_top"><i class="fa fa-flash"></i> Generator</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users') }}"><i class="icon-people"></i> Users</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-circle"></i> Configuration</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/configuration') }}"><i class="icon-people"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/service') }}"><i class="icon-people"></i> Our Services</a>
                    </li>
                </ul>
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
                        <a class="nav-link" href="{{ url('admin/fuelStock') }}" target="_top"><i class="fa fa-user-secret"></i> Solar Masuk (Stock)</a>
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
            <!-- <li class="nav-item nav-dropdown"> -->
                <!-- <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-circle"></i> Harian</a> -->
                <!-- <ul class="nav-dropdown-items"> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/refeerContainer/report') }}" target="_top"><i class="fa fa-file"></i> Harian</a>
                    </li>
                    
                <!-- </ul>
            </li> -->
            <!-- <li class="nav-item nav-dropdown"> -->
                <!-- <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-circle"></i> Mingguan</a> -->
                <!-- <ul class="nav-dropdown-items"> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/refeerContainer/weekly-report') }}" target="_top"><i class="fa fa-file"></i> Mingguan</a>
                    </li>
                    
                <!-- </ul>
            </li> -->
        </ul>
        @endif

        @if (Auth::user()->id_role == '3')
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}"><i class="icon-speedometer"></i> Dashboard 
                <!-- <span class="badge badge-info">NEW</span> -->
                </a>
            </li>
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
                        <a class="nav-link" href="{{ url('admin/fuelStock') }}" target="_top"><i class="fa fa-user-secret"></i> Solar Masuk (Stock)</a>
                    </li>
                    
                </ul>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/fuelUsage') }}" target="_top"><i class="fa fa-user-secret"></i> Bon Pemakaian Solar</a>
                    </li>
                    
                </ul>
            </li>
            <li class="divider"></li>
        </ul>
        @endif
    </nav>
</div>