<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Accountants</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard');?>">Home</a></li>
              <li class="breadcrumb-item active">Accountants</li>
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
                <h3 class="card-title"><i class="fas fa-plus"></i><?= (isset($editAccountantsData)) ? " Edit" : " Add new";?> accountants</h3>
              </div>
              <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>

              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($editAccountantData)){ ?>
              <form method="post" action="<?= base_url();?>/employee/accountant/update/<?= $editAccountantData['accountant_id'];?>" enctype="multipart/form-data" class="form-horizontal">
                <?php } else { ?>
              <form method="post" action="<?= base_url('/employee/accountant/save');?>" enctype="multipart/form-data" class="form-horizontal">
                <?php } ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?= (isset($editAccountantData['name'])) ? $editAccountantData['name'] : set_value('name');?>">
                    <input type="hidden" class="form-control" name="accountant_number" value="<?= (isset($editAccountantData['accountant_number'])) ? $editAccountantData['accountant_number'] : substr(md5(uniqid(rand(), true)),0,10);;?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" value="<?= (isset($editAccountantData['email'])) ? $editAccountantData['email'] : set_value('email');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Birthday</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="birthday" value="<?= (isset($editAccountantData['birthday'])) ? $editAccountantData['birthday'] : set_value('birthday');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone" value="<?= (isset($editAccountantData['phone'])) ? $editAccountantData['phone'] : set_value('phone');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sex</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="sex">
                        <option <?= (isset($editAccountantData['sex'])=='male') ? 'selected' : '';?> value='male'>Male</option>
                        <option <?= (isset($editAccountantData['sex'])=='female') ? 'selected' : '';?> value='female'>female</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" value="<?= (isset($editAccountantData['address'])) ? $editAccountantData['address'] : set_value('address');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Religion</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="religion" value="<?= (isset($editAccountantData['religion'])) ? $editAccountantData['religion'] : set_value('religion');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Blood group</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="blood_group" value="<?= (isset($editAccountantData['blood_group'])) ? $editAccountantData['blood_group'] : set_value('blood_group');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Qualification</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="qualification" value="<?= (isset($editAccountantData['qualification'])) ? $editAccountantData['qualification'] : set_value('qualification');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sex</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="sex">
                        <option <?php if(isset($editAccountantData['sex'])) echo ($editAccountantData['sex']=='male') ? 'selected' : '';?> value='male'>Male</option>
                        <option <?php if(isset($editAccountantData['sex'])) echo ($editAccountantData['sex']=='female') ? 'selected' : '';?> value='female'>female</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="facebook" value="<?= (isset($editAccountantData['facebook'])) ? $editAccountantData['facebook'] : set_value('facebook');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="twitter" value="<?= (isset($editAccountantData['twitter'])) ? $editAccountantData['twitter'] : set_value('twitter');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">GooglePlus</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="google_plus" value="<?= (isset($editAccountantData['google_plus'])) ? $editAccountantData['google_plus'] : set_value('google_plus');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Linkedin</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="linkedin" value="<?= (isset($editAccountantData['linkedin'])) ? $editAccountantData['linkedin'] : set_value('linkedin');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image(Accountant cv or any document)</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="file_name">
                    </div>
                  </div>
                </div>
                <?php if(!isset($editAccountantData)){ ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" value="">
                    </div>
                  </div>
                </div>
                <?php }?>
                <div class="card-footer">
                  <?php if(isset($editAccountantData)){ ?>
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

<?= $this->endSection() ?>