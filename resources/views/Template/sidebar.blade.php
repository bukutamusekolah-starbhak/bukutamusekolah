<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="/" class="brand-link">
    <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="/home" class="d-block">{{Auth::user()->name}}</a>
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
            Tamu
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <router-link to="data_tamus" class="nav-link">
                <i class="fas fa-user-tie green"></i>
                <p>Data Tamu</p>
            </router-link>
            </li>
        </ul>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-door-open"></i>
            <p>
                Ruangan
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="ruangan" class="nav-link">
                        <i class="fas fa-school blue"></i>
                        <p>Data Ruangan</p>
                    </router-link>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
                Display Tamu 
                <i class="fas fa-angle-left right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="scantamu" class="nav-link">
                        <i class="fas fa-address-card orange"></i>
                        <p>Scan Tamu</p>
                    </router-link>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Rekap Tamu
                <i class="fas fa-angle-left right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="rekaptamu" class="nav-link">
                        <i class="fas fa-book-open pink"></i>
                        <p>laporan tamu</p>
                    </router-link>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="/charts" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>
                Chart-Tamu dan excel
            </p>
            </a>
        </li>
        </li>
        </li>
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>