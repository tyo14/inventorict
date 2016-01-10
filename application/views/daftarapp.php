<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar App
            <small>Data - Data App</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">Daftar App</li>
          </ol>
        </section>
        <section class="content-header">
          <a href="<?php echo base_url(); ?>index.php/app/tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah data</a>
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
                        <th>Kode App</th>
                        <th>Nama App</th>
                        <th class="text-center">Bit</th>
                        <th>Kategori App</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 0;
                    foreach ($app as $fetchdata) {
                      $no++;

                      $kategori = $this->global_model->find_by('kategoriapp', array('kode_kategoriapp' => $fetchdata['kode_kategoriapp']));
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $fetchdata['kode_app']; ?></td>
                        <td><?php echo $fetchdata['nama_app']; ?></td>
                        <td class="text-center"><?php echo $fetchdata['bit']; ?></td>
                        <td><?php echo $kategori['nama_kategoriapp']; ?></td>
                        <td class="text-center"><a href="<?php echo base_url();?>index.php/app/ubah/<?php echo $fetchdata['kode_app'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url();?>index.php/app/hapus/<?php echo $fetchdata['kode_app'];?>" onclick="return confirm_delete()" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></td>                        
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Kode App</th>
                        <th>Nama App</th>
                        <th class="text-center">Bit</th>
                        <th>Kategori App</th>
                        <th class="text-center">Aksi</th>
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