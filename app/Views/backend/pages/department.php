<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Departments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Departments</li>
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
          <div class="col-md-5">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus"></i><?= (isset($editDepartmentData)) ? " Edit " : " Add ";?>Department</h3>
              </div>
              <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>

              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($editDepartmentData)){ ?>
                <form method="post" action="<?= base_url();?>/hr/department/update/<?= $editDepartmentData['department_id'];?>" class="form-horizontal">
                <?php } else { ?>
                  <form method="post" action="<?= base_url('/hr/department/save');?>" class="form-horizontal">
                <?php } ?>
              
               
                <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo ucwords('department name');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" value="" required autofocus />
                    </div>
                </div>
                <span id="designation">
                    <div class="form-group">
                       <label class="col-md-12" for="example-text">Designation</label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="designation[]" value="" required placeholder= "designation here">
                        </div>
                    </div>
                </span>
                
                <span id="designation_input">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-12">
                            <input type="text" class="form-control" name="designation[]"  value="" placeholder= "designation here">
                        </div>
                        
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-danger btn-circle btn-xs" onclick="deleteParentElement(this)">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                </span>
                
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="button" class="btn btn-info btn-sm btn-rounded" onClick="add_designation()">
                           <i class="fa fa-plus"></i>&nbsp; <?php echo ucwords('add designation'); ?>
                            
                        </button>
                    </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i><?= (isset($editDepartmentData)) ? " Update" : " Save";?></button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-7">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-bars"></i> Department List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Total Employees</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php if(isset($departmentData) && !empty($departmentData)) { 
                  $i = 1;
                    foreach ($departmentData as $departmentData):   ?>
                  <tr>
                    <td><?= $i++;?></td>
                    <td><?= $departmentData['name']?></td>
                    <td><?php
                    ?></td>
                    <td><?php
                    
                    ?></td>
                    <td>
                        <a href="<?= base_url();?>/hr/department/edit/<?=$departmentData['department_id']?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url();?>/hr/department/delete/<?=$departmentData['department_id']?>" onclick="return confirm('Are you really want to delete?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php endforeach;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script>    
  $('#designation_input').hide();
  
  // CREATING BLANK DESIGNATION INPUT
  var blank_designation = '';
  $(document).ready(function () {
      blank_designation = $('#designation_input').html();
  });

  function add_designation()
  {
      $("#designation").append(blank_designation);
  }

  // REMOVING DESIGNATION INPUT
  function deleteParentElement(n) {
      n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
  }

</script>

<?= $this->endSection() ?>