<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Human Resources</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Human Resources</li>
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
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">List Human Resources</h3>
                <a href="<?=base_url('/employee/hrm/add');?>" class="btn btn-xs btn-primary float-right"><i class="fas fa-plus"></i> Add hrm</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Photo</th>
                    <th>Nmae</th>
                    <th>Email</th>
                    <th>Sex</th>
                    <th>Adress</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php if(isset($hrmData) && !empty($hrmData)) { 
                    foreach ($hrmData as $hrmData):   ?>
                  <tr>
                    <td>
                        <img src="<?=base_url();?>/backend/uploads/hrm/<?=$hrmData['file_name']?>" class="img-circle img-size-32 mr-3" alt="User Image">
                    </td>
                    <td><?= $hrmData['name']?></td>
                    <td><?= $hrmData['email']?></td>
                    <td><?= $hrmData['sex']?></td>
                    <td><?= $hrmData['address']?></td>
                    <td>
                        <a href="<?= base_url();?>/employee/hrm/edit/<?=$hrmData['hrm_id']?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url();?>/employee/hrm/delete/<?=$hrmData['hrm_id']?>" onclick="return confirm('Are you really want to delete?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php endforeach;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?= $this->endSection() ?>