 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Aplikasi Pos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->username}}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->is('categories') ? 'active' : '' }}" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Kategori
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link {{ request()->is('categories') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categories.create')}}" class="nav-link {{ request()->is('categories/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah kategori</p>
                </a>
              </li>

              
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->is('products') ? 'active' : '' }}" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Produk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link {{ request()->is('products') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semua Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products.create')}}" class="nav-link {{ request()->is('products/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Produk</p>
                </a>
              </li>

              
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->is('customers') ? 'active' : '' }}" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Kostumer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customers.index')}}" class="nav-link {{ request()->is('customers') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kostumer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('customers.create')}}" class="nav-link {{ request()->is('customers/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Kostumer</p>
                </a>
              </li>
            </ul>
            </li>


              <li class="nav-item menu-open">
                <a href="#" class="nav-link {{ request()->is('transactions') ? 'active' : '' }}" >
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Transaksi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('transactions.index')}}" class="nav-link {{ request()->is('transactions') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Transaksi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('transactions.create')}}" class="nav-link {{ request()->is('transactions/create') ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Tambah Transaksi</p>
                    </a>
                  </li>

              
            </ul>
         

          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Users
              </p>
            </a>
          </li>



{{-- ---------------------------------------------------- --}}
         
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>