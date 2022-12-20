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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <h3 class="card-title"><i class="fas fa-list"></i> List Expenses</h3>
                <a href="<?=base_url('/expenses/expense/add');?>" class="btn btn-xs btn-primary float-right"><i class="fas fa-plus"></i> Add expense</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php if(isset($expenseData) && !empty($expenseData)) { 
                  $i = 1;
                    foreach ($expenseData as $expenseData):   ?>
                  <tr>
                    <td><?= $i++;?></td>
                    <td><?= $expenseData['title']?></td>
                    <td><?= $expenseData['name']?></td>
                    <td>
                      <?php
                      if($expenseData['method']=='1') echo 'Cheque';
                      if($expenseData['method']=='2') echo 'Debit card';
                      if($expenseData['method']=='3') echo 'Credit card';
                      if($expenseData['method']=='4') echo 'Cash';
                      ?>
                    
                    </td>
                    <td><?= $expenseData['amount']?></td>
                    <td><?= $expenseData['year']?></td>
                    <td>
                        <a href="<?= base_url();?>/expenses/expense/edit/<?=$expenseData['payment_id']?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url();?>/expenses/expense/delete/<?=$expenseData['payment_id']?>" onclick="return confirm('Are you really want to delete?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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