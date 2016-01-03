<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Unit
            <small>Data - Data Unit</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Daftar Unit</li>
          </ol>
        </section>
        <section class="content-header">
          <a href="<?php echo base_url(); ?>index.php/unit/tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah data</a>
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
                            <a href="<?php echo base_url();?>index.php/unit/hapus/<?php echo $fetchdata['kode_unit'];?>" onclick="return confirm_delete()">Hapus</a> | 
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
<script type="text/javascript">
function confirm_delete() {
  return confirm('apa anda yakin ingin menghapus ?');
}
</script>