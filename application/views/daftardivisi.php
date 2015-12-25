<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Divisi
            <small>Data - Data Divisi</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">Daftar Divisi</li>
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
                        <th>Kode Divisi</th>
                        <th>Nama Divisi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 0;
                    foreach ($devisi as $fetchdata) {
                      $no++;
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $fetchdata['kode_divisi']; ?></td>
                        <td><?php echo $fetchdata['nama_divisi']; ?></td>
                        <td><a href="<?php echo base_url();?>index.php/devisi/ubah/<?php echo $fetchdata['kode_divisi'];?>">Edit</a> | 
                        <a href="<?php echo base_url();?>index.php/devisi/hapus/<?php echo $fetchdata['kode_divisi'];?>" onclick="return confirm_delete()">Hapus</a> | 
                        <a>Detail</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Kode Divisi</th>
                        <th>Nama Divisi</th>
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