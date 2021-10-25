 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="<?php echo base_url('assets/images/users/') . $this->session->userdata('gambar'); ?>" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block"><?php echo $this->session->userdata('username') ?></a>
       </div>
     </div>
     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <!-- <li class="nav-item">
           <a href="<?php echo base_url('Dashboard'); ?>" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
               <!-- <span class="right badge badge-danger">New</span> -->
         </p>
         </a>
         </li> -->
         <li class="nav-item">
           <a href="<?= base_url('DataKtp') ?>" class="nav-link">
             <i class="nav-icon fas fa-database"></i>
             <p>
               Data Penduduk
               <!-- <span class="right badge badge-danger">New</span> -->
             </p>
           </a>
         </li>
         <!-- <li class="nav-item">
           <a href="<?php echo base_url('BarangKeluar'); ?>" class="nav-link">
             <i class="nav-icon fas fa-bus"></i>
             <p>
               Barang Keluar
               <!-- <span class="badge badge-info right">6</span> -->
         </p>
         </a>
         </li> -->
         <!-- <li class="nav-item">
           <a href="<?php echo base_url('Customer') ?>" class="nav-link">
             <i class="nav-icon fas fa-id-card"></i>
             <p>
               Data Customer
             </p>
           </a>
         </li> -->
         <!-- <li class="nav-item">
           <a href="<?php echo base_url('User') ?>" class="nav-link">
             <i class="nav-icon fas fa-user"></i>
             <p>
               Data User
             </p>
           </a>
         </li> -->
         <!-- <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-cogs"></i>
             <p>
               Setting
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?php echo base_url('User/edit/' . $this->session->userdata('id_user')) ?>" class="nav-link">
                 <i class="fas fa-id-badge"></i>
                 <p>Edit Profile</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo base_url('Auth/logout') ?>" class="nav-link">
                 <i class="fas fa-sign-out-alt"></i>
                 <p>Logout</p>
               </a>
             </li>
           </ul>
         </li> -->
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>