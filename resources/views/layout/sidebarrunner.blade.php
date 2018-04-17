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

        <li> <a href="{{route('runnerdashboard',['user_id'=>$runners->user_id])}}"><i class="fa fa-tachometer"></i>
          <span class="hide-menu">Dashboard</span></a>
        </li>

        <!-- <li> <a href="#"><i class="fa fa-wpforms"></i>
          <span class="hide-menu">App-Form</span></a>
        </li> -->

        <li> <a href="{{route('runnerappforms',['user_id'=>$runners->user_id])}}"><i class="fa fa-cart-plus"></i>
          <span class="hide-menu">Order Overview</span></a>
        </li>

        

        <!-- <li> <a href="#"><i class="fa fa-table"></i>
          <span class="hide-menu">Data Profile</span></a>
        </li> -->

        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>