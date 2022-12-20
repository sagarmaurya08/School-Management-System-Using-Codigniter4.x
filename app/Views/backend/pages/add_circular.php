<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Circular</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin-dashboard');?>">Home</a></li>
              <li class="breadcrumb-item active">Circular</li>
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
                <h3 class="card-title"><i class="fas fa-plus"></i><?= (isset($editCircularData['title'])) ? " Edit" : " Add new";?> circular</h3>
              </div>
              <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>

              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($editCircularData)){ ?>
              <form method="post" action="<?= base_url();?>/academic/circular/update/<?= $editCircularData['circular_id'];?>" class="form-horizontal">
                <?php } else { ?>
              <form method="post" action="<?= base_url('/academic/circular/save');?>" class="form-horizontal">
                <?php } ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="title" value="<?= (isset($editCircularData['title'])) ? $editCircularData['title'] : set_value('title');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Reference</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="reference" value="<?= (isset($editCircularData['reference'])) ? $editCircularData['reference'] : set_value('reference');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="content" value="<?= (isset($editCircularData['content'])) ? $editCircularData['content'] : set_value('content');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="date" value="<?= (isset($editCircularData['date'])) ? $editCircularData['date'] : set_value('date');?>">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <?php if(isset($editCircularData)){ ?>
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