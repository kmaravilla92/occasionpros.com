<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/backoffice/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{$currentUser->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <!-- <li class="header">MAIN NAVIGATION</li> -->
      <li class="treeview">
        <a href="{{route('admin.dashboard')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview {{Request::is(config('app.admin_uri').'/users*') ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-users"></i> <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('backoffice.users.index') }}"><i class="fa fa-list"></i> List</a></li>
          <li><a href="{{ route('backoffice.users.create') }}"><i class="fa fa-plus"></i> Add</a></li>
        </ul>
      </li>
      <li class="treeview {{Request::is(config('app.admin_uri').'/event-posts*') ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-calendar"></i> <span>Event Posts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('backoffice.event-posts.index') }}"><i class="fa fa-list"></i> List</a></li>
          <li><a href="{{ route('backoffice.event-posts.create') }}"><i class="fa fa-plus"></i> Add</a></li>
        </ul>
      </li>
      <li class="treeview {{Request::is(config('app.admin_uri').'/blog-posts*') ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-file"></i> <span>Blog Posts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('blog-posts.index') }}"><i class="fa fa-list"></i> List</a></li>
          <li><a href="{{ route('blog-posts.create') }}"><i class="fa fa-plus"></i> Add</a></li>
        </ul>
      </li>
      <li class="treeview {{Request::is(config('app.admin_uri').'/ad-posts*') ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-newspaper-o"></i> <span>Pros Ads</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('backoffice.ad-posts.index') }}"><i class="fa fa-list"></i> List</a></li>
          <li><a href="{{ route('backoffice.ad-posts.create') }}"><i class="fa fa-plus"></i> Add</a></li>
        </ul>
      </li>
      <li class="{{Request::is(config('app.admin_uri').'/transactions*') ? 'active' : ''}}">
        <a href="{{route('backoffice.transactions.index')}}">
          <i class="fa fa-paypal"></i> <span>Payment Transactions</span>
        </a>
      </li>
      <li class="treeview {{Request::is(config('app.admin_uri').'/cms/pages*') || Request::is(config('app.admin_uri').'/cms/html-modules*') ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-file"></i> <span>CMS</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{Request::is(config('app.admin_uri').'/cms/pages*') ? 'active' : ''}}">
                <a href="{{route('backoffice.cms.page.index')}}"><i class="fa fa-list"></i> Page List</a>
            </li>
            <li class="{{Request::is(config('app.admin_uri').'/cms/html-modules*') ? 'active' : ''}}">
                <a href="{{route('backoffice.cms.html-modules.index')}}"><i class="fa fa-list"></i> HTML Modules List</a>
            </li>
        </ul>
      </li>
      <li class="treeview {{Request::is(config('app.admin_uri').'/marketing*') ? 'active' : ''}}">
        <a href="#">
          <i class="fa fa-users"></i> <span>Marketing</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{Request::is(config('app.admin_uri').'/marketing*') ? 'active' : ''}}">
                <a href="{{route('backoffice.marketing.email-blast')}}"><i class="fa fa-envelope"></i> Email Blast</a>
            </li>
        </ul>
      </li>
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-gears"></i> <span>Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active">
            <a href="#"><i class="fa fa-list"></i> Cache</a>
            </li>
        </ul>
      </li> -->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
