@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- Users, Roles Permissions -->
@can('view_admin')
  <li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
      <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
      <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
    </ul>
  </li>
@endcan
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>

          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
@can('view_talent')
           <li><a href="{{ url('/carian') }}"><i class="fa fa-files-o"></i> <span>Seek Talent!</span></a></li>
           @endcan
@can('view_crud')
    
          <li><a href="{{ url('/addme') }}"><i class="fa fa-files-o"></i> <span>Add Me</span></a></li>

<li><a href="{{ url('/appointed_positions') }}"><i class="fa fa-files-o"></i> <span>Latest Position</span></a></li>
<li><a href="{{ url('/cocurriculars') }}"><i class="fa fa-files-o"></i> <span>The Best Cocuricular</span></a></li>

             <li><a href="{{ url('/people') }}"><i class="fa fa-files-o"></i> <span>Candidates</span></a></li>
              <li><a href="{{ url('/strengths') }}"><i class="fa fa-files-o"></i> <span>Strengths</span></a></li>
            <li><a href="{{ url('/competences') }}"><i class="fa fa-files-o"></i> <span>Competence</span></a></li>
          <li><a href="{{ url('/education') }}"><i class="fa fa-files-o"></i> <span>Education</span></a></li>
          
          <li><a href="{{ url('/rujukans') }}"><i class="fa fa-files-o"></i> <span>References </span></a></li>
          <li><a href="{{ url('/generate/cv') }}"><i class="fa fa-files-o"></i> <span>Generate CV </span></a></li>
         
@endcan
          
          
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
