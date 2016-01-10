<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Kategori App
            <small>Data Kategori App</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">Daftar Kategori App</li>
          </ol>
        </section>
        <section class="content-header">
          <a href="<?php echo base_url(); ?>index.php/kategoriapp/tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah data</a>
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
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 0;
                    foreach ($kategoriapp as $fetchdata) {
                      $no++;
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $fetchdata['kode_kategoriapp']; ?></td>
                        <td><?php echo $fetchdata['nama_kategoriapp']; ?></td>
                        <td class="text-center"><a href="<?php echo base_url();?>index.php/kategoriapp/ubah/<?php echo $fetchdata['kode_kategoriapp'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url();?>index.php/kategoriapp/hapus/<?php echo $fetchdata['kode_kategoriapp'];?>" onclick="return confirm_delete()" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></td>                        
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
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