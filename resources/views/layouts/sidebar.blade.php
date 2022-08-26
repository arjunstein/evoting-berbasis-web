<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="menu-sidebar"><a href="/beranda"><span class="fa fa-home"></span> Dashboard</span></a></li>

        @if(\Auth::user()->role == 'admin')
        <li class="menu-sidebar"><a href="/pemilih"><span class="fa fa-user-circle"></span> Kelola Peserta</span></a></li>
        
        <li class="menu-sidebar"><a href="/kandidat"><span class="fa fa-users"></span> Kelola Kandidat</span></a></li>

        <li class="menu-sidebar"><a href="/periode"><span class="fa fa-clock-o"></span> Atur periode</span></a></li>

        @endif

        <li class="menu-sidebar"><a href="/pemilihan"><span class="glyphicon glyphicon-log-out"></span> Voting</span></a></li>

        <li class="menu-sidebar"><a href="/ubah-password"><span class="fa fa-key"></span> Ubah Password</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/keluar') }}" onclick="return confirm('Yakin keluar?')"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>

      </ul>
    </section>