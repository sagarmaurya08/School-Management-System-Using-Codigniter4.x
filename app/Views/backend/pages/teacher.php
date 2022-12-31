<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Teacher</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Teacher</li>
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
                <h3 class="card-title">List Teachers</h3>
                <a href="<?=base_url('/hr/teacher/add');?>" class="btn btn-xs btn-primary float-right"><i class="fas fa-plus"></i> Add teacher</a>
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
                <?php if(isset($teacherData) && !empty($teacherData)) { 
                    foreach ($teacherData as $teacherData):   ?>
                  <tr>
                    <td>
                        <img src="<?=base_url();?>/backend/uploads/teacher/<?=$teacherData['file_name']?>" class="img-circle img-size-32 mr-3" alt="User Image">
                    </td>
                    <td><?= $teacherData['name']?></td>
                    <td><?= $teacherData['email']?></td>
                    <td><?= $teacherData['sex']?></td>
                    <td><?= $teacherData['address']?></td>
                    <td>
                        <a href="<?= base_url();?>/hr/teacher/edit/<?=$teacherData['teacher_id']?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url();?>/hr/teacher/delete/<?=$teacherData['teacher_id']?>" onclick="return confirm('Are you really want to delete?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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