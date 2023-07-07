<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="{{url('/asset/customer/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>   
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">   
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>   
  </ul>
</nav>
<!-- /.navbar -->

<style>
  .nav-sidebar li.active{
    background: #007bff;
  }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('/asset/customer/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">          
          <li class="nav-item">
            <a href="{{url('dashboard/admin')}}" class="nav-link {{ Request::is('dashboard/admin') ? 'active' : '' }}">
              <i class="far fa fa-home nav-icon"></i>
              <p>
                Dashboard
                <span style="display:none;" class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/admin/users/list') ? 'active' : '' }}">
            <a href="{{url('dashboard/admin/users/list')}}" class="nav-link">
              <i class="far fa fa-list nav-icon"></i>
              <p>
                All Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('dashboard/admin/users/subscription/list')}}" class="nav-link {{ Request::is('dashboard/admin/users/subscription/list') ? 'active' : '' }}">
              <i class="far fa fa-list nav-icon"></i>
              <p>
                All Users Subscription
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{url('dashboard/admin/quotes')}}" class="nav-link {{ Request::is('dashboard/admin/quotes') ? 'active' : '' }}">
              <i class="far fa fa-list nav-icon"></i>
              <p>
                All Quotes Request
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('dashboard/admin/chat')}}" class="nav-link {{ Request::is('dashboard/admin/chat') ? 'active' : '' }}">
              <i class="far fa fa-list nav-icon"></i>
              <p>
                Messages
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('dashboard/admin/contactus/list')}}" class="nav-link {{ Request::is('dashboard/admin/contactus/list') ? 'active' : '' }}">
              <i class="far fa fa-list nav-icon"></i>
              <p>
               All Contact Us
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('dashboard/admin/appointments/list')}}" class="nav-link {{ Request::is('dashboard/admin/appointments/list') ? 'active' : '' }}">
              <i class="far fa fa-list nav-icon"></i>
              <p>
               All Appointments
              </p>
            </a>
          </li>

          <li class="nav-item" style="display: none;">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('logout2.perform')}}" class="nav-link">
              <i class="far fa fa-list nav-icon"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>