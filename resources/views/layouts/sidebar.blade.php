<aside class="main-sidebar sidebar-light-primary elevation-4 text-sm">
    <!-- Brand Logo -->
    <a href="{{ url('./home') }}" class="brand-link">
      <img src="{{ url('./img/logo.png')}}" alt="Intech Network" class="brand-image "
           style="opacity: .8">
      <span class="brand-text font-weight-bold">InTech Network</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ url('./home') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <!-- Human Resource -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="far  fas fa-money-check"></i>
                    <p>
                    Human Resource
                    <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('employee-list')
                    <li class="nav-item has-treeview" id="manning">
                        <a href="{{ route('employees.index')}}" class="nav-link">
                            <i class="far  fa-angle-right nav-icon"></i>
                            <p>Employee List</p>
                            </a>
                    </li>
                    @endcan
                    @can('employee-accountability-list')
                    <li class="nav-item">
                        <a href="{{ route('employeeaccountability.index') }}" class="nav-link">
                            <i class="far  fa-angle-right nav-icon"></i>
                            <p>Employee Management</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>

            <!-- Payroll -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="far  fas fa-money-check"></i>
                    <p>
                    Payroll
                    <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    {{-- @can('user-accounts-menu') --}}
                    <li class="nav-item">
                    <a href="{{ route('payslips.index') }}" class="nav-link">
                        <i class="far  fa-angle-right nav-icon"></i>
                        <p>Payslip</p>
                    </a>
                    </li>
                    {{-- @endcan --}}

                    @can('cash-advance-list')
                    <li class="nav-item">
                    <a href="{{ route('cashadvances.index') }}" class="nav-link">
                        <i class="far  fa-angle-right nav-icon"></i>
                        <p>Cash Advance</p>
                    </a>
                    </li>
                    @endcan

                </ul>
            </li>

            <!-- Attendance -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fa fa-clock"></i>
                    <p>
                    Attendance
                    <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('attendance-log-list')
                    <li class="nav-item">
                    <a href="{{ route('timeattendanceslog.index') }}" class="nav-link">
                        <i class="far  fa-angle-right nav-icon"></i>
                        <p>Attendance Log</p>
                    </a>
                    </li>
                    @endcan

                    @can('project-list')
                    <li class="nav-item">
                        <a href="{{ route('projects.index') }}" class="nav-link">
                        <i class="far  fa-angle-right nav-icon"></i>
                        <p>Projects</p>
                    </a>
                    </li>
                    @endcan

                </ul>
            </li>
            <!-- Maintenance -->
            <li class="nav-item has-treeview" id="maintenance">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                    Maintenance
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    @can('department-list')
                        <li class="nav-item">
                            <a href="{{ route('departments.index') }}" class="nav-link">
                                <i class="far  fa-angle-right nav-icon"></i>
                                <p>Departments</p>
                            </a>
                        </li>
                    @endcan

                    @can('position-list')
                        <li class="nav-item">
                            <a href="{{ route('positions.index') }}" class="nav-link">
                                <i class="far  fa-angle-right nav-icon"></i>
                                <p>Positions</p>
                            </a>
                        </li>
                    @endcan
                    @can('deduction-list')
                        <li class="nav-item">
                            <a href="{{ route('deductions.index') }}" class="nav-link">
                                <i class="far  fa-angle-right nav-icon"></i>
                                <p>Deductions</p>
                            </a>
                        </li>
                    @endcan
                    @can('accountability-list')
                        <li class="nav-item">
                            <a href="{{ route('accountabilities.index') }}" class="nav-link">
                                <i class="far  fa-angle-right nav-icon"></i>
                                <p>Equipments</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            <!-- Security -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-lock"></i>
                    <p>
                    Security
                    <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('user-list')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="far  fa-angle-right nav-icon"></i>
                                <p>User Accounts</p>
                            </a>
                        </li>
                    @endcan
                    @can('role-list')
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="far  fa-angle-right nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
