
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Great Emperor Casino Database</title>

  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css')}}">
 
     <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fullcalendar/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
    <!-- Theme style -->

  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/skin-yellow.min.css')}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  </head>
 
  <body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

         <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>P</b>TD</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Tournament</b>Director</span>
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
             
<?php
/*
?>


              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li><!-- end notification -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              
  <?php 
  */
  ?>


              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="{{asset('Emperor City Poker Header.jpg')}}" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                   <!--<span class="hidden-xs">{{ Auth::user()->name }}</span> -->
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{asset('Emperor City Poker Header.jpg')}}" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->name }}
                      <small></small>
                      <small>Member since {{ Auth::user()->created_at }}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                <!--   <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat" style="color:black;"><i class="glyphicon glyphicon-podlock"></i> Sign Out</a>                   
                    </div>
                  </li>
                </ul>
              </li>
             
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->

          <div class="user-panel">
            <span class="pull-center">
              <center><img style="height: 150px; width: 150px;" src="{{asset('Emperor City Poker Header.jpg')}}"class="avatar img-circle img-thumbnail" alt="avatar"></center>
            </span>
        
          </div>

          <!-- search form (Optional) -->
        <!--   <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="/tournament"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-hourglass-start"></i> <span>Dialy Tournament</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">Players</a></li>
                <li><a href="#">Buyin</a></li>
                <li><a href="#">Chips</a></li>
                <li><a href="#">Level</a></li>
                <li><a href="#">Pot Money</a></li>
             
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-hourglass-start"></i> <span>Saturday Tournament</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">Players</a></li>
                <li><a href="#">Buyin</a></li>
                <li><a href="#">Chips</a></li>
                <li><a href="#">Level</a></li>
                <li><a href="#">Pot Money</a></li>
              </ul>
            </li>
            
            <!--<li class=""><a href="/event"><i class="fa fa-calendar"></i> <span>Events</span></a></li>
            <li class=""><a href="#"><i class="fa fa-cog"></i> <span>Setting</span></a></li>
          </ul> --><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>





      

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @yield('contentheader')
       
   
        </section>



        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->

               @yield('content')

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->




















      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Version 1.1.0
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#">Emperor City Poker</a>.</strong> All rights reserved.
      </footer>

     
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    
    <!-- jQuery 2.2.3 -->
<script src="{{ asset('adminlte/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/app.min.js')}}"></script>

     <!-- fullCalendar 2.2.5 -->
      <script src="{{ asset('adminlte/plugins/moment.min.js')}}"></script>
      <script src="{{ asset('adminlte/plugins/fullcalendar/fullcalendar.min.js')}}"></script>


  </body>
</html>
