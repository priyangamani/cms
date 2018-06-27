<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
      {{ HTML::image('img/download.png', 'User Image',  array('class' => 'img-circle')) }}
      </div>
      <div class="pull-left info">
        <p>
        <!-- Status -->
        <span class="hide-menu fa fa-user">    {{Auth::user()->name}}
        <br>
        <center>{{Auth::user()->roles()->pluck('name')->implode(' ')}}</center></span>
        </p>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

      <!-- sidebar menu: : style can be found in s
      idebar.less -->
      <ul class="sidebar-menu " data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li> <a href="{{route('welcome')}}"><i class="fa fa-tachometer"></i>
          <span class="hide-menu">Dashboard</span></a>
        </li>

        <li> <a href="{{route('announcement')}}"><i class="fa fa-bullhorn"></i>
          <span class="hide-menu">Announcement</span></a>
        </li>

        <li> <a href="{{route('manappform')}}"><i class="fa fa-cart-plus"></i>
              <span class="hide-menu">Order Overview</span></a>
        </li>
        <li> <a href="{{route('manappformdetails')}}"><i class="fa fa-wpforms"></i>
          <span class="hide-menu">App-Form</span></a>
        </li>
        <li class=" hide-menu treeview">
          <a href="#">
            <i class="fa fa-tree"></i>
            <span class="hide-menu">Sales Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
			<li> <a href="{{route('status')}}"><i class="fa fa-comments"></i>
			  <span class="hide-menu">Processing Status</span></a>
			</li>
			<li> <a href="{{route('salesactivity')}}"><i class="fa fa-credit-card"></i>
			  <span class="hide-menu">Sales Activity</span></a>
			</li>
			<li> <a href="{{route('intpackage')}}"><i class="fa fa-cube"></i>
			  <!-- <span class="hide-menu">Internet Package</span></a> -->
			  <span class="hide-menu">Product Management</span></a>
			</li>
          </ul>
        </li>

        <li> <a href="{{route('user')}}"><i class="fa fa-user-plus"></i>
          <span class="hide-menu">User Management</span></a>
        </li>
<!--
        <li class=" hide-menu treeview">
          <a href="#">
            <i class="fa fa-user-circle"></i>
            <span class="hide-menu">User Type</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li> <a href="{{route('agent')}}"><i class="fa fa-user-secret"></i>
          <span class="hide-menu">Agent Management</span></a>
        </li>

        <li> <a href="{{route('admin')}}"><i class="fa fa-user-circle"></i>
          <span class="hide-menu">Admin Management</span></a>
        </li>

        <li> <a href="{{route('supervisor')}}"><i class="fa fa-users"></i>
          <span class="hide-menu">Supervisor Management</span></a>
        </li>

        <li> <a href="{{route('runner')}}"><i class="fa fa-motorcycle"></i>
          <span class="hide-menu">Runner Management</span></a>
        </li>

        <li> <a href="{{route('user')}}"><i class="fa fa-user-plus"></i>
          <span class="hide-menu">All User</span></a>
        </li>

          </ul>
        </li> 
-->

        <li> <a href="{{route('state')}}"><i class="fa fa-flag-checkered"></i>
          <span class="hide-menu">State Management</span></a>
        </li>

        <li> <a href="{{route('branch')}}"><i class="fa fa-tree"></i>
          <span class="hide-menu">Branch Management</span></a>
        </li>

        <li> <a href="{{route('roles')}}"><i class="fa fa-genderless"></i>
          <span class="hide-menu">Roles Management</span></a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
