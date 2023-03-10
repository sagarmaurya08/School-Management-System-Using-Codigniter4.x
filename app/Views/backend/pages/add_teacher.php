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
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard');?>">Home</a></li>
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
                <h3 class="card-title"><i class="fas fa-plus"></i><?= (isset($editTeacherData)) ? " Edit" : " Add new";?> Teacher</h3>
              </div>
              <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>

              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($editTeacherData)){ ?>
              <form method="post" action="<?= base_url();?>/hr/teacher/update/<?= $editTeacherData['teacher_id'];?>" enctype="multipart/form-data" class="form-horizontal">
                <?php } else { ?>
              <form method="post" action="<?= base_url('/hr/teacher/save');?>" class="form-horizontal" enctype="multipart/form-data">
                <?php } ?> 
                <div class="row">
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="<?= (isset($editTeacherData['name'])) ? $editTeacherData['name'] : set_value('name');?>">
                        <input type="hidden" class="form-control" name="teacher_number" value="<?= (isset($editTeacherData['teacher_number'])) ? $editTeacherData['teacher_number'] : substr(md5(uniqid(rand(), true)),0,10);?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Role</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="role">
                            <option <?php if(isset($editTeacherData['role'])) echo ($editTeacherData['role']=='class_teacher') ? 'selected' : '';?> value='class_teacher'>Class teacher</option>
                            <option <?php if(isset($editTeacherData['role'])) echo ($editTeacherData['role']=='subject_teacher') ? 'selected' : '';?> value='subject_teacher'>Subject teacher</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" value="<?= (isset($editTeacherData['email'])) ? $editTeacherData['email'] : set_value('email');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Birthday</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="birthday" value="<?= (isset($editTeacherData['birthday'])) ? $editTeacherData['birthday'] : set_value('birthday');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class=" col-form-label">Gender</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="sex">
                            <option <?php if(isset($editTeacherData['sex'])) echo ($editTeacherData['sex']=='male') ? 'selected' : '';?> value='male'>Male</option>
                            <option <?php if(isset($editTeacherData['sex'])) echo ($editTeacherData['sex']=='female') ? 'selected' : '';?> value='female'>female</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Address</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="address" value="<?= (isset($editTeacherData['address'])) ? $editTeacherData['address'] : set_value('address');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Religion</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="religion" value="<?= (isset($editTeacherData['religion'])) ? $editTeacherData['religion'] : set_value('religion');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Blood group</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="blood_group" value="<?= (isset($editTeacherData['blood_group'])) ? $editTeacherData['blood_group'] : set_value('blood_group');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Qualification</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="qualification" value="<?= (isset($editTeacherData['qualification'])) ? $editTeacherData['qualification'] : set_value('qualification');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Marital status</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="marital_status">
                            <option <?php if(isset($editTeacherData['marital_status'])) echo ($editTeacherData['marital_status']=='married') ? 'selected' : '';?> value='married'>Married</option>
                            <option <?php if(isset($editTeacherData['marital_status'])) echo ($editTeacherData['marital_status']=='single') ? 'selected' : '';?> value='single'>Single</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Facebook</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="facebook" value="<?= (isset($editTeacherData['facebook'])) ? $editTeacherData['facebook'] : set_value('facebook');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Twitter</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="twitter" value="<?= (isset($editTeacherData['twitter'])) ? $editTeacherData['twitter'] : set_value('twitter');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">GooglePlus</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="google_plus" value="<?= (isset($editTeacherData['google_plus'])) ? $editTeacherData['google_plus'] : set_value('google_plus');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Linkedin</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="linkedin" value="<?= (isset($editTeacherData['linkedin'])) ? $editTeacherData['linkedin'] : set_value('linkedin');?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone" value="<?= (isset($editTeacherData['phone'])) ? $editTeacherData['phone'] : set_value('phone');?>">
                        </div>
                      </div>
                    </div>
                    <?php if(!isset($editTeacherData)){ ?>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password" value="">
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="file_name">
                        </div>
                      </div>
                    </div>
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Human Resources Info</h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Department</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="department_id" onchange="get_designation_val(this.value)">
                            <?php if(isset($departmentData)){ ?>
                              <option>Select department</option>
                              <?php
                              foreach($departmentData as $dData): ?>
                            <option <?php if(isset($editTeacherData['department_id'])) echo ($editTeacherData['department_id']==$dData['department_id']) ? 'selected' : '';?> value="<?= $dData['department_id']?>"><?= $dData['name']?></option>
                              <?php endforeach;
                              }else{
                                ?> <option>No department</option>
                                <?php
                              }?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Designation</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" name="designation_id" id="designation_holder">
                          <option>Select a department first</option>
                          <?php if(isset($designationData)){ ?>
                            <option <?php if(isset($editTeacherData['designation_id'])) echo ($editTeacherData['designation_id']==$designationData['designation_id']) ? 'selected' : '';?> value="<?= $designationData['designation_id']?>"><?= $designationData['name']?></option>
                              <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Date of joining</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="date_of_join" value="<?= (isset($editTeacherData['date_of_join'])) ? $editTeacherData['date_of_join'] : set_value('date_of_join');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Joining salary</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="joining_salary" value="<?= (isset($editTeacherData['joining_salary'])) ? $editTeacherData['joining_salary'] : set_value('joining_salary');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-form-label">Status</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="status">
                            <option <?php if(isset($editTeacherData['status'])) echo ($editTeacherData['status']=='1') ? 'selected' : '';?> value='1'>Active</option>
                            <option <?php if(isset($editTeacherData['status'])) echo ($editTeacherData['status']=='0') ? 'selected' : '';?> value='0'>Inactive</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Bank Account Details</h3>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Account Holder Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="account_holder_name" value="<?= (isset($bankData['account_holder_name'])) ? $bankData['account_holder_name'] : set_value('account_holder_name');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Account Number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="account_number" value="<?= (isset($bankData['account_number'])) ? $bankData['account_number'] : set_value('account_number');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Bank Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="bank_name" value="<?= (isset($bankData['bank_name'])) ? $bankData['bank_name'] : set_value('bank_name');?>">
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-form-label">Branch</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="branch" value="<?= (isset($bankData['branch'])) ? $bankData['branch'] : set_value('branch');?>">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <?php if(isset($editTeacherData)){ ?>
                    <button type="submit" class="btn btn-info">Update</button>
                    <?php } else { ?>
                  <button type="submit" class="btn btn-info">Save</button>
                  <?php } ?>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
   function get_designation_val(department_id) {
    if(department_id!=''){
      $.ajax({
        url:'<?= base_url()?>/ajax/get_designation/'+ department_id,
        success:function(response){
          console.log(response);
          jQuery('#designation_holder').html(response);
        }
      })
    }
    else{
      jQuery('#designation_holder').html('<option>Select a department first</option>');
    }
   }
  </script>

<?= $this->endSection() ?>