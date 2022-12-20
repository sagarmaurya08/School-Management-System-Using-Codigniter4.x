<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Alumni</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard');?>">Home</a></li>
              <li class="breadcrumb-item active">Alumni</li>
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
                <h3 class="card-title"><i class="fas fa-plus"></i><?= (isset($editAlumniData)) ? " Edit" : " Add new";?> alumni</h3>
              </div>
              <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>

              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($editAlumniData)){ ?>
              <form method="post" action="<?= base_url();?>/alumni/update/<?= $editAlumniData['alumni_id'];?>" enctype="multipart/form-data" class="form-horizontal">
                <?php } else { ?>
              <form method="post" action="<?= base_url('/alumni/save');?>" enctype="multipart/form-data" class="form-horizontal">
                <?php } ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?= (isset($editAlumniData['name'])) ? $editAlumniData['name'] : set_value('name');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" value="<?= (isset($editAlumniData['email'])) ? $editAlumniData['email'] : set_value('email');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="phone" value="<?= (isset($editAlumniData['phone'])) ? $editAlumniData['phone'] : set_value('phone');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sex</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="sex">
                        <option <?php if(isset($editAlumniData['sex'])) echo ($editAlumniData['sex']=='male') ? 'selected' : '';?> value='male'>Male</option>
                        <option <?php if(isset($editAlumniData['sex'])) echo ($editAlumniData['sex']=='female') ? 'selected' : '';?> value='female'>female</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="address"><?= (isset($editAlumniData['address'])) ? $editAlumniData['address'] : set_value('address');?></textarea>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Profession</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="profession" value="<?= (isset($editAlumniData['profession'])) ? $editAlumniData['profession'] : set_value('profession');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Graduation Year</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="g_year" value="<?= (isset($editAlumniData['g_year'])) ? $editAlumniData['g_year'] : set_value('g_year');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Marital status</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="marital_status">
                        <option <?php if(isset($editAlumniData['marital_status'])) echo ($editAlumniData['marital_status']=='married') ? 'selected' : '';?> value='married'>Married</option>
                        <option <?php if(isset($editAlumniData['marital_status'])) echo ($editAlumniData['marital_status']=='single') ? 'selected' : '';?> value='single'>Single</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Club</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="club" value="<?= (isset($editAlumniData['club'])) ? $editAlumniData['club'] : set_value('club');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Interest</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="interest" value="<?= (isset($editAlumniData['interest'])) ? $editAlumniData['interest'] : set_value('interest');?>">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <?php if(isset($editAlumniData)){ ?>
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