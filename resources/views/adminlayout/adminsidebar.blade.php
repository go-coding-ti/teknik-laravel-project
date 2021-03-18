<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a style="height:50px !important;" class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
          <div class="sidebar-brand-icon">
            <img style="height: 37px;" src="{{asset('assets/admin/img/unud.png')}}">
          </div>
          <div style="font-size: 20px" class="sidebar-brand-text mx-3">SIM Dosen</div>
        </a>
        
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <div class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
          <div class="sidebar-brand-icon">
            <img class="border" style="height:60px;width:50px;" src="{{asset('assets/admin/img/4x6.jpg')}}">
          </div>
          <div style="font-size: 10px !important;margin-left:10px;" class="sidebar-brand-text my-3">
            I Wayan Wahyu Ivan Mahendra Jaya, S.Kom., M.T.
          </div>
        </div>
        <!-- Divider -->
        <hr style="margin-top: 20px" class="sidebar-divider my-0">
  
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-user"></i>
            <span>Master Data Dosen</span></a>
        </li>
  
        <!-- Divider -->
        <!--<hr class="sidebar-divider">-->
  
        <!-- Heading -->
        <!--<div class="sidebar-heading">
          Interface
        </div>-->
  
        <!-- Nav Item - Pages Collapse Menu 
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Riwayat</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Components:</h6>
              <a class="collapse-item" href="buttons.html">Buttons</a>
              <a class="collapse-item" href="cards.html">Cards</a>
            </div>
          </div>
        </li> -->
  
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Data Karya Ilmiah</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{route('penelitian-list')}}">Penelitian</a>
              <a class="collapse-item" href="utilities-border.html">Pengabdian</a>
            </div>
          </div>
        </li>
  
        <!-- Divider -->
        <!--<hr class="sidebar-divider">-->
  
        <!-- Heading -->
        <!--<div class="sidebar-heading">
          Addons
        </div>-->
  
        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRemu" aria-expanded="true" aria-controls="collapseRemu">
            <i class="fas fa-fw fa-money-check"></i>
            <span>Pengabdian Masyarakat</span>
          </a>
          <div id="collapseRemu" class="collapse" aria-labelledby="headingRemu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Login Screens:</h6>
              <a class="collapse-item" href="login.html">Login</a>
              <a class="collapse-item" href="register.html">Register</a>
              <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
              <div class="collapse-divider"></div>
              <h6 class="collapse-header">Other Pages:</h6>
              <a class="collapse-item" href="404.html">404 Page</a>
              <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
          </div>
        </li> -->
  
        <!-- Nav Item - Charts -->
        <!--<li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>-->
  
        <!-- Nav Item - Tables -->
        <!--<li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>-->
        <!--<li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSkp" aria-expanded="true" aria-controls="collapseSkp">
            <i class="fas fa-fw fa-folder"></i>
            <span>SKP</span>
          </a>
          <div id="collapseSkp" class="collapse" aria-labelledby="headingSkp" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Utilities:</h6>
              <a class="collapse-item" href="utilities-color.html">Colors</a>
              <a class="collapse-item" href="utilities-border.html">Borders</a>
              <a class="collapse-item" href="utilities-animation.html">Animations</a>
              <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
          </div>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" href="{{Route('kompetensi-list')}}">
            <i class="fas fa-fw fa-list"></i>
            <span>Kompetensi</span></a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKI" aria-expanded="true" aria-controls="collapseKI">
            <i class="fas fa-fw fa-list"></i>
            <span>Kompetensi</span>
          </a>
          <div id="collapseKI" class="collapse" aria-labelledby="headingKI" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Utilities:</h6>
              <a class="collapse-item" href="utilities-color.html">Colors</a>
              <a class="collapse-item" href="utilities-border.html">Borders</a>
              <a class="collapse-item" href="utilities-animation.html">Animations</a>
              <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
          </div>
        </li> --}}
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
  
        <!-- Sidebar Toggler (Sidebar) -->
        <!--<div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>-->
  
      </ul>
      <!-- End of Sidebar -->