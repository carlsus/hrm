<aside class="main-sidebar sidebar-light-primary elevation-4 text-sm">
    <!-- Brand Logo -->
    <a href="{{ url('./home') }}" class="brand-link">
      <img src="{{ url('./img/logo2.png')}}" alt="Intech Network" class="brand-image "
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
            <li class="nav-item">
                <a href="{{ url('./home') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-times"></i>
                    <p>
                        Time Attendance
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('payslip') }}" class="nav-link">
                    <i class="nav-icon fas fa-print"></i>
                    <p>
                        Payslip
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('cashadvance') }}" class="nav-link">
                    <i class="nav-icon fas fa-money-check"></i>
                    <p>
                        Cash Advance
                    </p>
                </a>
            </li>

   </ul>
</li>




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
