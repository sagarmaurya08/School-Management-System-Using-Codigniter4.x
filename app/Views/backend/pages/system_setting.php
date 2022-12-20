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
              <li class="breadcrumb-item active"><?= ($page_name) ? $page_name : 'System Settings'; ?></li>
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
                <h3 class="card-title">System Setting Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($system_data) && !empty($system_data)){ ?>
              <form method="post" action="<?= base_url('/system/setting');?>" class="form-horizontal">
                <?php foreach($system_data as $system_data) { ?>
                <?php if($system_data['type']=='session') { ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"><?= ucfirst($system_data['type']); ?></label>
                    <div class="col-sm-10">
                      <select class="form-control" name="<?= $system_data['type']; ?>">
                        <option>Select running session</option>
                        <?php 
                          for($i = 1; $i < 10; $i++): ?>
                            <option value="<?= (2017+$i).'-'.(2017+$i+1);?>" 
                              <?= ($system_data['description']==(2017+$i).'-'.(2017+$i+1)) ? 'selected' : '';?>>
                              <?= (2017+$i).'-'.(2017+$i+1); ?>
                            </option>
                            <?php endfor; ?>
                      </select>
                    </div>
                  </div>
                </div>
                  <?php }else { ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"><?= ucfirst($system_data['type']); ?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="<?= $system_data['type']; ?>" value="<?= $system_data['description']; ?>" id="inputEmail3">
                    </div>
                  </div>
                </div>
                <?php }
                } ?>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Update Settings</button>
                </div>
                
                <!-- /.card-footer -->
              </form>
              <?php }
              else{ ?>

            <?php  } ?>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
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