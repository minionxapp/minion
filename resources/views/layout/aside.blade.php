<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/minion/minion3.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MinionxApp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/minion/minion5.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item has-treeview {!! Request::is(['dashboard']) ? 'menu-open' : '' !!}">   
                 @if(in_array(Auth::user()->role,['ADM','USR']))  
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Dashboard 
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                  @endif

                  @if(in_array(Auth::user()->role,['ADM','USR']))  
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../dashboard" class="nav-link {!! Request::is('dashboard') ? 'active' : '' !!}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard v1</p>
                      </a>
                    </li>                                 
                  </ul>
                  @endif
              </li>
              
              
              <li class="nav-item has-treeview">
                @if(in_array(Auth::user()->role,['ADM']))                  
                  <li class="nav-item has-treeview  {!! Request::is(['admin/*']) ? 'menu-open' : '' !!}">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-chart-pie"></i>
                      <p>
                        Admin
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="/admin/user" class="nav-link {!! Request::is('admin/user') ? 'active' : '' !!}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>User</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/admin/divisi" class="nav-link {!! Request::is('admin/divisi') ? 'active' : '' !!}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Divisi</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="/admin/departement" class="nav-link {!! Request::is('admin/departement') ? 'active' : '' !!}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Departement</p>
                        </a>
                      </li>
                    </ul>
                    @endif 
                </li>







                
            <li class="nav-item has-treeview {!! Request::is(['walet/*']) ? 'menu-open' : '' !!}">        
              @if(in_array(Auth::user()->role,['ADM','USR']))            
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Learning Wallet
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
              @endif
              <ul class="nav nav-treeview">
                    @if(in_array(Auth::user()->role,['ADM'])) 
                      <li class="nav-item">
                        <a href="/walet/wperiode" class="nav-link {!! Request::is('walet/wperiode') ? 'active' : '' !!}" >
                          <i class="far fa-circle nav-icon"></i>
                          <p>Setup Periode</p>
                        </a>
                      </li>
                    @endif
                    @if(in_array(Auth::user()->role,['ADM']))              
                      <li class="nav-item">
                        <a href="/walet/wmember" class="nav-link {!! Request::is('walet/wmember') ? 'active' : '' !!}" >
                          <i class="far fa-circle nav-icon"></i>
                          <p>Wallet Member</p>
                        </a>
                      </li>
                    @endif
                    @if(in_array(Auth::user()->role,['USR']))
                      <li class="nav-item">
                        <a href="/walet/wtransaksiuser" class="nav-link {!! Request::is('walet/wtransaksiuser') ? 'active' : '' !!}" >
                          <i class="far fa-circle nav-icon"></i>
                          <p>Pengajuan LW </p>
                        </a>
                      </li>
                    @endif

                    @if(in_array(Auth::user()->role,['ADM','USR'])) 
                      <li class="nav-item">
                        <a href="/walet/wtransaksiadmin" class="nav-link {!! Request::is('walet/wtransaksiadmin') ? 'active' : '' !!}" >
                          <i class="far fa-circle nav-icon"></i>
                          <p>Approval LW</p>
                        </a>
                      </li>
                    @endif

                    @if(in_array(Auth::user()->role,['ADM','USR'])) 
                      <li class="nav-item">
                        <a href="/walet/wtranstanggungjawab" class="nav-link {!! Request::is('walet/wtranstanggungjawab') ? 'active' : '' !!}" >
                          <i class="far fa-circle nav-icon"></i>
                          <p>Pertanggung Jawab LW</p>
                        </a>
                      </li>
                    @endif

                    @if(in_array(Auth::user()->role,['ADM'])) 
                      <li class="nav-item">
                        <a href="/walet/wtransjwbverifikasi" class="nav-link {!! Request::is('walet/wtransjwbverifikasi') ? 'active' : '' !!}" >
                          <i class="far fa-circle nav-icon"></i>
                          <p>Verifikasi LW</p>
                        </a>
                      </li>
                    @endif

                    @if(in_array(Auth::user()->role,['ADM'])) 
                    <li class="nav-item">
                      <a href="/walet/wdaftarbayar" class="nav-link {!! Request::is('walet/wdaftarbayar') ? 'active' : '' !!}" >
                        <i class="far fa-circle nav-icon"></i>
                        <p>Daftar Pembayaran</p>
                      </a>
                    </li>
                    @endif

                    

                    @if(in_array(Auth::user()->role,['ADM','USR'])) 
                    <li class="nav-item">
                      <a href="/walet/wtranshistori" class="nav-link {!! Request::is('walet/wtranshistori') ? 'active' : '' !!}" >
                        <i class="far fa-circle nav-icon"></i>
                        <p>Histori LW</p>
                      </a>
                    </li>
                  @endif


              </ul>
            </li>

            <li class="nav-item has-treeview   {!! Request::is(['corpuevent*']) ? 'menu-open' : '' !!}">
              @if(in_array(Auth::user()->role,['ADM'])) 
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Akademik
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
              @endif
              @if(in_array(Auth::user()->role,['ADM'])) 
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/corpuevent" class="nav-link  {!! Request::is('corpuevent') ? 'active' : '' !!}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Event</p>
                    </a>
                  </li>
                </ul>
              @endif
            </li>
          




          @if(in_array(Auth::user()->role,['ADM','USR'])) 
              <li class="nav-header">MISCELLANEOUS</li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Eksternal Link
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="https://g-leads.disprz.com" class="nav-link" target="_blank">
                      <i class="far fa-circle nav-icon"></i>
                      <p>G-Leads</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="https://docs.google.com/spreadsheets/d/1zRZL6ye45KGTf0SZIoZlvDsUaV0K_frWy0Tzv7vovUY/edit#gid=667268145" class="nav-link" target="_blank">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Digital</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="https://kms.pegadaian.co.id/login" class="nav-link" target="_blank">
                      <i class="far fa-circle nav-icon"></i>
                      <p>KMS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="https://sites.google.com/pegadaian.co.id/cmstore/" class="nav-link" target="_blank">
                      <i class="far fa-circle nav-icon"></i>
                      <p>CM-Store</p>
                    </a>
                  </li>              
                </ul>
                
              </li>
              @endif
              @if(in_array(Auth::user()->role,['ADM'])) 
                <li class="nav-item">
                  <a href="https://adminlte.io/docs/3.0" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Documentation</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="/calendar" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Calendar</p>
                  </a>
                </li>          
              @endif
              <li class="nav-item">
                <a href="/logout" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Logout</p>
                </a>
              </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>