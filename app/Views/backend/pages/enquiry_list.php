<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enquiries</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enquiries</li>
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
                <h3 class="card-title">List enquiries</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category</th>
                    <th>Mobile</th>
                    <th>Purpose</th>
                    <th>Name</th>
                    <th>Whom To Meet</th>
                    <th>Email</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php if(isset($enquiryData) && !empty($enquiryData)) { 
                    foreach ($enquiryData as $enquiryData):   ?>
                  <tr>
                    <td><?= $enquiryData['category']?></td>
                    <td><?= $enquiryData['mobile']?></td>
                    <td><?= $enquiryData['purpose']?></td>
                    <td><?= $enquiryData['name']?></td>
                    <td><?= $enquiryData['whom_to_meet']?></td>
                    <td><?= $enquiryData['email']?></td>
                    <td><?= $enquiryData['content']?></td>
                    <td><?= $enquiryData['created_at']?></td>
                    <td>
                        <a href="<?= base_url();?>/academic/enquiry/delete/<?=$enquiryData['enquiry_id']?>" onclick="return confirm('Are you really want to delete?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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