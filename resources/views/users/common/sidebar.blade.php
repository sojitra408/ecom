<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-0">
          <img src="{{asset('public/assets/img/plogo.png')}}" class="" width="90%">
        </div>
        <div class="sidebar-brand-text mx-3">Vendor Panel</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item   {{ Request::is('myaccount.html') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('page.myaccount')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      
      <!-- <li class="nav-item {{ Request::is('company-details.html') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('page.company')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Company Details</span></a>
      </li>

 <li class="nav-item {{ Request::is('documentation.html') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('page.documentation')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Documentation</span></a>
      </li>
      
       <li class="nav-item {{ Request::is('founder.html') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('page.founder')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Founder Details</span></a>
      </li>
      
    <li class="nav-item {{ Request::is('bank-details.html') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('page.bank')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Banking Details</span></a>
      </li>
       --> 
       
     
      <!-- Nav Item - Pages Collapse Menu
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>My Progress</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Registeration:</h6>
            <a class="collapse-item" href="{{route('admin.registration')}}">Register</a>
            
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Utilities Collapse Menu-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-search-plus"></i>
          <span>KYC</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">KYC Details:</h6>
            <a class="collapse-item" href="{{route('page.company')}}">Company Details</a>
            <a class="collapse-item" href="{{route('page.documentation')}}">Documentation</a>
            <a class="collapse-item" href="{{route('page.founder')}}">Founder Details</a>
            <a class="collapse-item" href="{{route('page.bank')}}">Bank Details</a>
			  
          </div>
		  
        </div>
      </li>
       <li class="nav-item {{ Request::is('brand-details.html') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('page.brand')}}">
          <i class="fa fa-fw fa-sun-o"></i>
          <span>Brand Details</span></a>
      </li>
 
 <li class="nav-item {{ Request::is('messaging.html') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('page.messaging')}}">
          <i class="fa fa-fw fa-sun-o"></i>
          <span>Message</span></a>
      </li>
      <!-- Divider 
      <hr class="sidebar-divider">
-->
      <!-- Heading 
      <div class="sidebar-heading">
        Addons
      </div>
-->
      <!-- Nav Item - Pages Collapse Menu 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
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
      </li>-->

      <!-- Nav Item - Charts
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
 -->
      <!-- Nav Item - Tables 
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>-->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
