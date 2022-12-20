<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enquiry Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin-dashboard');?>">Home</a></li>
              <li class="breadcrumb-item active">Enquiry category</li>
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
                <h3 class="card-title"><i class="fas fa-plus"></i><?= (isset($editCategoryData)) ? " Edit" : " Add new";?> enquiry category</h3>
              </div>
              <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>

              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($editCategoryData)){ ?>
              <form method="post" action="<?= base_url();?>/academic/inqCategory/update" class="form-horizontal">
                <?php } else { ?>
              <form method="post" action="<?= base_url('/academic/inqCategory/create');?>" class="form-horizontal">
                <?php } ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="enquiry_category_id" value="<?= (isset($editCategoryData['enquiry_category_id'])) ? $editCategoryData['enquiry_category_id'] : "";?>">
                      <input type="text" class="form-control" name="category" value="<?= (isset($editCategoryData['category'])) ? $editCategoryData['category'] : set_value('category');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Purpose</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="purpose" value="<?= (isset($editCategoryData['purpose'])) ? $editCategoryData['purpose'] : set_value('purpose');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Whom</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="whom" value="<?= (isset($editCategoryData['whom'])) ? $editCategoryData['whom'] : set_value('whom');?>">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <?php if(isset($editCategoryData)){ ?>
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