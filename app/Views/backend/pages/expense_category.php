<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Expense Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expense category</li>
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
                <h3 class="card-title"><i class="fas fa-plus"></i><?= (isset($editExpCategoryData)) ? " Edit " : " Add ";?> Expense Category</h3>
              </div>
              <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>

              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($editExpCategoryData)){ ?>
                <form method="post" action="<?= base_url();?>/expenses/category/update/<?= $editExpCategoryData['expense_category_id'];?>" class="form-horizontal">
                <?php } else { ?>
                  <form method="post" action="<?= base_url('/expenses/category/save');?>" class="form-horizontal">
                <?php } ?>
              
               
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3">Expense Category Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="<?= (isset($editExpCategoryData['name'])) ? $editExpCategoryData['name'] : set_value('name');?>" >
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i> <?= (isset($editExpCategoryData)) ? " Update " : " Save ";?> category</button>
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
                <h3 class="card-title"><i class="fas fa-bars"></i> Expense category List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php if(isset($expCategoryData) && !empty($expCategoryData)) { 
                  $i =1;
                    foreach ($expCategoryData as $expCategoryData):   ?>
                  <tr>
                    <td><?= $i++;?></td>
                    <td><?= $expCategoryData['name']?></td>
                    <td>
                        <a href="<?= base_url();?>/expenses/category/edit/<?=$expCategoryData['expense_category_id']?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url();?>/expenses/category/delete/<?=$expCategoryData['expense_category_id']?>" onclick="return confirm('Are you really want to delete?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php endforeach;
                    } ?>
                  </tbody>
                </table>
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