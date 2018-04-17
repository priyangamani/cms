<header class="main-header">

  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>C</b>SP</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Certifymy-Sales</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            

            
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><center>{{ HTML::image('img/download.png', 'User Image',  array('class' => 'user-image')) }}
              {{Auth::user()->name}}</center></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->

              <li class="user-header">
                {{ HTML::image('img/test.jpg', 'User Image',  array('class' => 'img-circle')) }}
                
                
                <p>{{Auth::user()->roles()->pluck('name')->implode(' ')}}
                  <br>
                  <small>Member since {{Auth::user()->created_at}}</small></p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>