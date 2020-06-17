<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }} | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('icon/'.Auth::user()->thumbnail) }}" class="user-image img-circle elevation-2" alt="User Image">
              <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <!-- User image -->
              <li class="user-header bg-dark">
                <img src="{{ asset('icon/'.Auth::user()->thumbnail) }}" class="img-circle elevation-2" alt="User Image">

                <p>
                  {{ Auth::user()->name }} - {{ Auth::user()->level['name'] }}
                  <small>Membro desde: {{ Auth::user()->CreatedFm }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                <a href="#" class="btn btn-default btn-flat float-right">Sair</a>
              </li>
            </ul>
          </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard Vendas -->
          <li class="nav-item has-treeview {{ (strpos(Request::route()->getName(), 'dashboard') === 0) ? 'menu-open ' : 'false' }}">
          <a href="{{ route('dashboard.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('dashboard.index') }}" class="nav-link {{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.divulgation.index') }}"
                 class="nav-link  {{ Route::currentRouteName() == 'dashboard.divulgation.index' ? 'active' : ''}}">
                  <i class="fas fa-bullhorn nav-icon"></i>
                  <p>Divulgação</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Treinamentos</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('dashboard.information.index') }}" class="nav-link {{ Route::currentRouteName() =='dashboard.information.index' ? 'active' : ''}}">
                  <i class="fas fa-info nav-icon"></i>
                  <p>Informações</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard.support.index') }}" class="nav-link {{Route::currentRouteName() == 'dashboard.support.index' ? 'active' : ''}}">
                  <i class="fas fa-headset nav-icon"></i>
                  <p>Contato/Suporte</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Marketing -->
          <li class="nav-item has-treeview {{ (strpos(Request::route()->getName(), 'mkt') === 0) ? 'menu-open ' : 'false' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-lightbulb"></i>
              <p>
                Marketing
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                      <i class="fas fa-bullhorn nav-icon"></i>
                      <p>
                        Campanhas
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <!-- Campanhas -->
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                      <a href="{{ route('mkt.campaigns.create') }}" class="nav-link {{ Route::currentRouteName() == 'mkt.campaigns.create' ? 'active' : '' }}">
                          <i class="fas fa-plus  nav-icon"></i>
                          <p>Criar campanha</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('mkt.campaigns.index') }}" class="nav-link {{ Route::currentRouteName() == 'mkt.campaigns.index' ? 'active' : '' }}">
                          <i class="fas fa-list nav-icon"></i>
                          <p>Visualizar campanhas</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <!-- E-mail marketing -->
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="fas fa-envelope-open-text nav-icon"></i>
                      <p>
                        E-mail Marketing
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('mkt.email.create') }}" class="nav-link {{ Route::currentRouteName() == 'mkt.email.create' ? 'active' : '' }}">
                          <i class="fas fa-plus  nav-icon"></i>
                          <p>Criar e-mail marketing</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('mkt.email.index') }}" class="nav-link {{ Route::currentRouteName() == 'mkt.email.index' ? 'active' : '' }}">
                          <i class="fas fa-list nav-icon"></i>
                          <p>Visualizar e-mails</p>
                        </a>
                      </li>
                    </ul>
                  </li>
            </ul>
          </li>
          <!-- Gerenciar -->
          <li class="nav-item has-treeview {{ (strpos(Request::route()->getName(), 'admin') === 0) ? 'menu-open ' : 'false' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Gerenciar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
                 <!-- Usuários -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="fas fa-users nav-icon"></i>
                    <p>
                        Usuários
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.users.create') }}" class="nav-link {{ Route::currentRouteName() == 'admin.users.create' ? 'active' : '' }}">
                        <i class="fas fa-plus  nav-icon"></i>
                        <p>Criar usuário</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }}">
                        <i class="fas fa-list nav-icon"></i>
                        <p>Visualizar usuários</p>
                        </a>
                    </li>
                    </ul>
                </li>
                 <!-- Usuários -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="fas fa-lock nav-icon"></i>
                    <p>
                        Níveis de acesso
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.levels.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.levels.index' ? 'active' : '' }}">
                        <i class="fas fa-plus  nav-icon"></i>
                        <p>Criar nível</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.levels.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.levels.index' ? 'active' : '' }}">
                        <i class="fas fa-list nav-icon"></i>
                        <p>Visualizar níveis</p>
                        </a>
                    </li>
                    </ul>
                </li>
                  <!-- Undades -->
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="fas fa-building nav-icon"></i>
                      <p>
                        Unidades
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('admin.units.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.units.index' ? 'active' : '' }}">
                          <i class="fas fa-plus  nav-icon"></i>
                          <p>Criar unidade</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.units.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.units.index' ? 'active' : '' }}">
                          <i class="fas fa-list nav-icon"></i>
                          <p>Visualizar unidades</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <!-- Templates -->
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="fas fa-layer-group nav-icon"></i>
                      <p>
                        Templates
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('admin.templates.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.templates.index' ? 'active' : '' }}">
                          <i class="fas fa-plus  nav-icon"></i>
                          <p>Criar template</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.templates.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.templates.index' ? 'active' : '' }}">
                          <i class="fas fa-list nav-icon"></i>
                          <p>Visualizar templates</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <!-- Layouts -->
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="fas fa-columns nav-icon"></i>
                      <p>
                        Layout
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('admin.layouts.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.layouts.index' ? 'active' : '' }}">
                          <i class="fas fa-plus  nav-icon"></i>
                          <p>Criar layout</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.layouts.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.layouts.index' ? 'active' : '' }}">
                          <i class="fas fa-list nav-icon"></i>
                          <p>Visualizar layouts</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <!-- Layouts -->
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="fas fa-folder nav-icon"></i>
                      <p>
                        Relatórios
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fas fa-plus  nav-icon"></i>
                          <p>Gerar relatório</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fas fa-list nav-icon"></i>
                          <p>Relatórios gerados</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fas fa-bug nav-icon"></i>
                          <p>Logs do sistema</p>
                        </a>
                      </li>
                    </ul>
                  </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-alt mr-2"></i>
              <p>
                Meu perfil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
              <p>
                 Sair
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{$title}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">{{ config('app.name', 'Laravel') }}</a>.</strong>
    Todos os direitos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Versão</b> 1.0
    </div>
  </footer>



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@yield('toast')
<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('AdminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('AdminLTE/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>
@yield('script')
</body>
</html>
