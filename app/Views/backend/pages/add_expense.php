<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Expenses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard');?>">Home</a></li>
              <li class="breadcrumb-item active">Expenses</li>
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
                <h3 class="card-title"><i class="fas fa-plus"></i><?= (isset($editExpenseData)) ? " Edit" : " Add new";?> expenses</h3>
              </div>
              <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>

              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($editExpenseData)){ ?>
              <form method="post" action="<?= base_url();?>/expenses/expense/update/<?= $editExpenseData['payment_id'];?>" enctype="multipart/form-data" class="form-horizontal">
                <?php } else { ?>
              <form method="post" action="<?= base_url('/expenses/expense/save');?>" enctype="multipart/form-data" class="form-horizontal">
                <?php } ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" value="<?= (isset($editExpenseData['title'])) ? $editExpenseData['title'] : set_value('title');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="expense_category_id">
                        <option disabled>Select category</option>  
                        <?php if(isset($expCategoryData)):
                          foreach($expCategoryData as $expCategoryData):?>
                        <option <?php if(isset($editExpenseData['expense_category_id'])) echo ($editExpenseData['expense_category_id']==$expCategoryData['expense_category_id']) ? 'selected' : '';?> value="<?=$expCategoryData['expense_category_id'];?>"><?=$expCategoryData['name'];?></option>
                        <?php endforeach;
                      endif; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="5" name="description"><?= (isset($editExpenseData['title'])) ? $editExpenseData['title'] : set_value('title');?></textarea>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Method</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="method">
                        <option disabled>Select method</option> 
                        <option <?php if(isset($editExpenseData['method'])) echo ($editExpenseData['method']=='1') ? 'selected' : '';?> value="1">Cheque</option>
                        <option <?php if(isset($editExpenseData['method'])) echo ($editExpenseData['method']=='2') ? 'selected' : '';?> value="2">Debit card</option>
                        <option <?php if(isset($editExpenseData['method'])) echo ($editExpenseData['method']=='3') ? 'selected' : '';?> value="3">Credit card</option>
                        <option <?php if(isset($editExpenseData['method'])) echo ($editExpenseData['method']=='4') ? 'selected' : '';?> value="4">Cash</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Amount</label>
                    <div class="col-sm-10">
                      <input type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  step="0.01" class="form-control" name="amount" value="<?= (isset($editExpenseData['amount'])) ? $editExpenseData['amount'] : set_value('amount');?>">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="year" value="<?= (isset($editExpenseData['year'])) ? $editExpenseData['year'] : set_value('year');?>">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <?php if(isset($editExpenseData)){ ?>
                    <button type="submit" class="btn btn-info">Update expense</button>
                    <?php } else { ?>
                  <button type="submit" class="btn btn-info">Save expense</button>
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