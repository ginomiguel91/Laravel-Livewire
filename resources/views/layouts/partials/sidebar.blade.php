<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if (Auth::check())
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>

                <div class="info">

                    <a href="#" class="d-block">

                        {{ Auth::user()->username }}
                    </a>


                </div>


            </div>
        @endif
        <!-- SidebarSearch Form
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>-->
                @role('administrador')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                <!--  Simple Link
                    <span class="right badge badge-danger">Dashboard</span>-->
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                <!--  Simple Link
                    <span class="right badge badge-danger">Dashboard</span>-->
                                Permissions and Roles
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users/index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                <!--  Simple Link
                    <span class="right badge badge-danger">Dashboard</span>-->
                                Users
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link {{ request()->is('roles/index') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-lock"></i>
                            <p>
                                <!--  Simple Link
                    <span class="right badge badge-danger">Dashboard</span>-->
                                Roles
                            </p>
                        </a>
                    </li>
                @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
