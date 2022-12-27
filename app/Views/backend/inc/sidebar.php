<?php helper('custom_helper'); 
$id = session()->get('id');
  $authData = getAdminDetails($id);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('/admin-dashboard'); ?>" class="brand-link">
      <img src="<?php echo base_url();?>/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">School Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>/backend/uploads/profile/<?= $authData['profile_pic'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block"><?= ucfirst($authData['name']); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <?php
      $uri = new \CodeIgniter\HTTP\URI(current_url());
      $segment1 = $uri->getSegment(1);
      $segment2 = $uri->getSegment(2);
      ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item <?=($segment1=='admin') ? "menu-open" : "";?>">
            <a href="<?= base_url('/admin/dashboard'); ?>" class="nav-link <?=($segment1=='admin') ? "active" : "";?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?=($segment1=='academic') ? "menu-open" : "";?>">
            <a href="#" class="nav-link <?=($segment1=='academic') ? "active" : "";?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Manage Academics
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('/academic/inqCategory');?>" class="nav-link <?=($segment2=='inqCategory') ? "active" : "";?>">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Enquiry Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/academic/enquiry');?>" class="nav-link <?=($segment2=='enquiry') ? "active" : "";?>">
                <i class="fas fa-angle-double-right"></i>
                  <p>View Enquiries</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/academic/club');?>" class="nav-link <?=($segment2=='club') ? "active" : "";?>">
                  <i class="fas fa-angle-double-right"></i>
                  <p>School Clubs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/academic/circular');?>" class="nav-link <?=($segment2=='circular') ? "active" : "";?>">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Manage Circular</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('');?>" class="nav-link">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Manage Holidays</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Manage Moraltalk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Syllabus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Manage Helplink</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Manage Helpdesk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Registration code</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Approve Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Student Result PIN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Market Place</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?=($segment1=='employee') ? "menu-open" : "";?>">
            <a href="#" class="nav-link <?=($segment1=='employee') ? "active" : "";?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Manage Employees
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('/employee/librarian');?>" class="nav-link <?=($segment2=='librarian') ? "active" : "";?>">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Librarians</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/employee/accountant');?>" class="nav-link <?=($segment2=='accountant') ? "active" : "";?>">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Accountants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/employee/hostel');?>" class="nav-link <?=($segment2=='hostel') ? "active" : "";?>">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Hostel Manager</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/employee/hrm');?>" class="nav-link <?=($segment2=='hrn') ? "active" : "";?>">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Human Resources</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('/parent')?>" class="nav-link <?=($segment1=='parent') ? "active" : "";?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Manage Parents
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('/alumni')?>" class="nav-link <?=($segment1=='alumni') ? "active" : "";?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Manage Alumni
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item <?=($segment1=='system') ? "menu-open" : "";?>">
            <a href="#" class="nav-link <?=($segment1=='system') ? "active" : "";?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                System Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('/system/setting');?>" class="nav-link <?=($segment2=='setting') ? "active" : "";?>">
                  <i class="fas fa-angle-double-right"></i>
                  <p>General Settings</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?=($segment1=='hr') ? "menu-open" : "";?>">
            <a href="#" class="nav-link <?=($segment1=='hr') ? "active" : "";?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Human Resources
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('/hr/department');?>" class="nav-link <?=($segment2=='department') ? "active" : "";?>">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Department</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?=($segment1=='expenses') ? "menu-open" : "";?>">
            <a href="#" class="nav-link <?=($segment1=='expenses') ? "active" : "";?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Expenses
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('/expenses/expense');?>" class="nav-link <?=($segment2=='expense') ? "active" : "";?>">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Expense</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('/expenses/category');?>" class="nav-link <?=($segment2=='category') ? "active" : "";?>">
                  <i class="fas fa-angle-double-right"></i>
                  <p>Expense Category</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>