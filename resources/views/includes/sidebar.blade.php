<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('AdminLTELogo.png')}}" alt="Mowater Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AlHakeema</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('default-user.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('users.edit',auth('web')->user()->id)}}"
                   class="d-block">{{auth('web')->user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(auth('web')->user()->is_admin == 1)
                    {{--Users details toggle start --}}
                    <li class="nav-item {{ request()->routeIs('users.*') ? 'menu-open' : '' }}">
                        <a href="#"
                           class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                                <i class="{{app()->getLocale() == 'ar' ? 'left fas fa-angle-right' :  'right fas fa-angle-left'}}"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview level">
                            <li class="nav-item">
                                <a href="{{route('users.index')}}"
                                   class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>Show All</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('users.create')}}"
                                   class="nav-link {{ request()->routeIs('users.create') ? 'active' : '' }}">
                                    <i class="fas fa-folder-plus"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--Users details toggle end --}}
                @endif

                    {{--Tasks details toggle start --}}
                    <li class="nav-item {{ request()->routeIs('tasks.*') ? 'menu-open' : '' }}">
                        <a href="#"
                           class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
                            <i class="fas fa-tasks"></i>
                            <p>
                                Tasks
                                <i class="{{app()->getLocale() == 'ar' ? 'left fas fa-angle-right' :  'right fas fa-angle-left'}}"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview level">
                            <li class="nav-item">
                                <a href="{{route('tasks.myTasks')}}"
                                   class="nav-link {{ request()->routeIs('tasks.myTasks') ? 'active' : '' }}">
                                    <i class="fas fa-check"></i>
                                    <p>My Tasks</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('tasks.index')}}"
                                   class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>Show All</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('tasks.create')}}"
                                   class="nav-link {{ request()->routeIs('tasks.create') ? 'active' : '' }}">
                                    <i class="fas fa-folder-plus"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--Tasks details toggle end --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
