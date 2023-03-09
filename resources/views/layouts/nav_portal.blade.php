 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-white text-sm ">
    <div class="container">
      <a href="{{ url('./home') }}" class="navbar-brand">
        <img src="{{ asset('img/logo2.png')}}" alt="InTech" class="brand-image"
             style="opacity: .8">
        <span class="brand-text font-weight-bold">Intech Network</span>
      </a>
      {{-- <a href="{{ url('./home') }}" class="brand-link">
        <img src="{{ asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image "
             style="opacity: .8">
        <span class="brand-text font-weight-bold">NEPTUNE</span>
      </a> --}}
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ url('/portal')}}" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('portal.show',Auth::user()->id)}}" class="nav-link">Profile</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Payslip</a>
          </li>

        </ul>


      </div>


    </div>
  </nav>
  <!-- /.navbar -->
