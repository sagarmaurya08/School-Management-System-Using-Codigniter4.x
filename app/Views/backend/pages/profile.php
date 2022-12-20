<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= ($page_name) ? $page_name : 'System Settings'; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= ($page_name) ? $page_name : 'Manage profile'; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-7">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Manage profile Details</h3>
              </div>
              <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>

              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($profileData) && !empty($profileData)) { ?>
              <form method="post" action="<?= base_url('/admin-profile');?>" enctype="multipart/form-data" class="form-horizontal">
               
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="<?= $profileData['name']; ?>" id="inputEmail3">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" value="<?= $profileData['email']; ?>" id="inputEmail3">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone" value="<?= $profileData['phone']; ?>" id="inputEmail3">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                      <select name="status" class="form-control">
                        <option  value='1' <?= ($profileData['status']=='1') ? "selected" : ""; ?>>Active</option>
                        <option value='0' <?= ($profileData['status']=='0') ? "selected" : ""; ?>>Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="profile_pic" id="inputEmail3">
                    </div>
                  </div>
                </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update Profile</button>
                </div>
                
                <!-- /.card-footer -->
              </form>
              <?php } ?>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-5">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Profile image</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-10">
                    <img src="<?= base_url();?>/backend/uploads/profile/<?= ($profileData['profile_pic']) ? $profileData['profile_pic'] : 'demo.png';?>" alt="Profile Image">
                  </div>
                </div>
              </div>
                <!-- /.card-body -->
                <!-- /.card-footer -->
              
            </div>
            <!-- /.card -->

          </div>
          <!-- <div class="col-md-6">
          </div> -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?= $this->endSection() ?>