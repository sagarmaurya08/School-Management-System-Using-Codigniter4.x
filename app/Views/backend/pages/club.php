<?= $this->extend('backend/master') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage clubs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Club</li>
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
                <h3 class="card-title"><i class="fas fa-plus"></i><?= (isset($editClubData)) ? " Edit Club" : " Add Club";?></h3>
              </div>
              <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif;?>

              <!-- /.card-header -->
              <!-- form start -->
              <?php if(isset($editClubData)){ ?>
                <form method="post" action="<?= base_url();?>/academic/club/update/<?= $editClubData['club_id'];?>" class="form-horizontal">
                <?php } else { ?>
                  <form method="post" action="<?= base_url('/academic/club/save');?>" class="form-horizontal">
                <?php } ?>
              
               
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3">Name</label>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="club_id" value="<?= (isset($editClubData['club_id'])) ? $editClubData['club_id'] : "";?>" >
                      <input type="text" class="form-control" name="club_name" value="<?= (isset($editClubData['club_name'])) ? $editClubData['club_name'] : set_value('club_name');?>" >
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group ">
                    <label for="inputEmail3">Description</label>
                    <div class="col-sm-10">
                      <textarea type="email" class="form-control" name="description"><?= (isset($editClubData['description'])) ? $editClubData['description'] : set_value('description');?></textarea>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group ">
                    <label for="inputEmail3">Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="date" value="<?= (isset($editClubData['date'])) ? $editClubData['date'] : set_value('date');?>" >
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Save</button>
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
                <h3 class="card-title"><i class="fas fa-bars"></i> Club List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php if(isset($clubData) && !empty($clubData)) { 
                    foreach ($clubData as $clubData):   ?>
                  <tr>
                    <td><?= $clubData['club_name']?></td>
                    <td><?= $clubData['description']?></td>
                    <td><?= $clubData['date']?></td>
                    <td>
                        <a href="<?= base_url();?>/academic/club/edit/<?=$clubData['club_id']?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url();?>/academic/club/delete/<?=$clubData['club_id']?>" onclick="return confirm('Are you really want to delete?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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