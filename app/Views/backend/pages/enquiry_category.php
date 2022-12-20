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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <h3 class="card-title">List categories</h3>
                <a href="<?=base_url('/academic/inqCategory/create');?>" class="btn btn-xs btn-primary float-right"><i class="fas fa-plus"></i> Add category</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Purpose</th>
                    <th>Whom</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php if(isset($enquiryData) && !empty($enquiryData)) { 
                    foreach ($enquiryData as $enquiryData):   ?>
                  <tr>
                    <td><?= $enquiryData['enquiry_category_id']?></td>
                    <td><?= $enquiryData['category']?></td>
                    <td><?= $enquiryData['purpose']?></td>
                    <td><?= $enquiryData['whom']?></td>
                    <td>
                        <a href="<?= base_url();?>/academic/inqCategory/edit/<?=$enquiryData['enquiry_category_id']?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url();?>/academic/inqCategory/delete/<?=$enquiryData['enquiry_category_id']?>" onclick="return confirm('Are you really want to delete?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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