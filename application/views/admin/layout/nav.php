  <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link ">
      <img src="<?= base_url() ?>/assets/adminlte/dist/img/logo_db.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class=" brand-text font-weight-bold" > <?= $konfigurasi2["namaweb"] ?> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-2 pb-2 mb-2 d-flex">
            <div class="image">
              <img src="<?= base_url()?>assets/upload/image/<?= $konfigurasi2['logo'] ?>" class="img-circle elevation-2 " alt="SAS">
            </div>
            <div class="info">
              <a  class="d-block font-weight-bold"><?= strtoupper($this->session->userdata('nama')); ?></a>
            </div>
         </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             

              <!-- Dashboard -->
              <li class="nav-item" >
                <a href="<?= base_url()?>admin/dashboard" class="nav-link font-weight-bold">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>DASHBOARD</p>
                </a>
              </li>

               <!-- Transaksi -->
              <li class="nav-item has-treeview ">
                  <a class="nav-link font-weight-bold" href="#">
                    <i class="nav-icon fas fa-hand-holding-usd"></i>
                      <p>TRANSAKSI <i class="right fas fa-angle-left"></i></p>
                  </a>

                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/transaksi" class="nav-link">
                          <i class="nav-icon fa fa-dollar-sign "></i>
                          <p>PESANAN DIBAYAR</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/transaksi/packing" class="nav-link">
                          <i class=" nav-icon fa fa-box"></i>
                          <p>PESANAN DIKEMAS</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/transaksi/kirim" class="nav-link">
                          <i class=" nav-icon fa fa-shipping-fast"></i>
                          <p>PESANAN DIKIRIM</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/transaksi/diterima" class="nav-link">
                          <i class=" nav-icon fa fa-check-circle"></i>
                          <p>PESANAN DITERIMA</p>
                        </a>
                      </li>

                     
                  </ul> 
               </li>

               <!-- Rekening -->
               <li class="nav-item has-treeview ">
                  <a  class="nav-link font-weight-bold" href="">
                    <i class="nav-icon fas fa-credit-card"></i>
                      <p>DATA REKENING <i class="right fas fa-angle-left"></i></p>
                  </a>

                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/rekening" class="nav-link">
                          <i class="nav-icon fa fa-table "></i>
                          <p>DATA REKENING</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/rekening/tambah" class="nav-link">
                          <i class=" nav-icon fa fa-plus "></i>
                          <p>TAMBAH REKENING</p>
                        </a>
                      </li>

                  </ul> 
               </li>

              <!-- Produk-->
              <li class="nav-item has-treeview ">
                  <a class="nav-link font-weight-bold" href="#">
                    <i class="nav-icon fas fa-sitemap"></i>
                      <p>PRODUK <i class="right fas fa-angle-left"></i></p>
                  </a>

                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/produk" class="nav-link">
                          <i class="nav-icon fa fa-table "></i>
                          <p>DATA PRODUK</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/produk/tambah" class="nav-link">
                          <i class=" nav-icon fa fa-plus "></i>
                          <p>TAMBAH PRODUK</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/kategori" class="nav-link">
                          <i class=" nav-icon fa fa-tags "></i>
                          <p>KATEGORI PRODUK</p>
                        </a>
                      </li>

                  </ul> 
               </li>

              <!-- User -->
               <li class="nav-item has-treeview ">
                  <a  class="nav-link font-weight-bold" href="">
                    <i class="nav-icon fas fa-user"></i>
                      <p>PENGGUNA <i class="right fas fa-angle-left"></i></p>
                  </a>

                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/user" class="nav-link">
                          <i class="nav-icon fa fa-table "></i>
                          <p>DATA PENGGUNA</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/user/tambah" class="nav-link">
                          <i class=" nav-icon fa fa-plus "></i>
                          <p>TAMBAH PENGGUNA</p>
                        </a>
                      </li>

                  </ul> 
               </li>

               <!-- Konfigurasi-->
               <li class="nav-item has-treeview ">
                  <a  class="nav-link font-weight-bold" href="">
                    <i class="nav-icon fas fa-cogs"></i>
                      <p>KONFIGURASI <i class="right fas fa-angle-left"></i></p>
                  </a>

                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/konfigurasi" class="nav-link">
                          <i class="nav-icon fa fa-folder "></i>
                          <p>DATA WEBSITE</p>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/konfigurasi/icon" class="nav-link">
                          <i class=" nav-icon fa fa-info-circle"></i>
                          <p>ICON</p>
                        </a>
                      </li>


                      <li class="nav-item">
                        <a href="<?= base_url()?>admin/konfigurasi/logo" class="nav-link">
                          <i class=" nav-icon fa fa-file-image"></i>
                          <p>LOGO</p>
                        </a>
                      </li>

                    
                  </ul> 
               </li>

         
            
          </nav>
          <!-- /.sidebar-menu -->
     </div>
    <!-- /.sidebar -->
 </aside>
 <!-- / Main Sidebar Container -->

   