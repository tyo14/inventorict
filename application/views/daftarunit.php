<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Unit
            <small>Data - Data Unit</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Dashboard</li>
            <li class="active">Daftar Unit</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Kode Unit</th>
                        <th>Nama Unit</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 0;
                    foreach ($unit as $fetchdata) {
                      $no++;
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $fetchdata['kode_unit']; ?></td>
                        <td><?php echo $fetchdata['nama_unit']; ?></td>
                        <td><a href="<?php echo base_url();?>index.php/unit/ubah/<?php echo $fetchdata['kode_unit'];?>">Edit</a> | 
                            <a href="<?php echo base_url();?>index.php/unit/hapus/<?php echo $fetchdata['kode_unit'];?>">Hapus</a> | 
                            <a href="<?php echo base_url();?>index.php/unit/detail/<?php echo $fetchdata['kode_unit'];?>">Detail</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Kode Unit</th>
                        <th>Nama Unit</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section>  
</div>        