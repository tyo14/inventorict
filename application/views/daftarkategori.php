<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Kategori
            <small>Data - Data Kategori</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">Daftar Kategori</li>
          </ol>
        </section>
        <section class="content-header">
          <a href="<?php echo base_url(); ?>index.php/kategori/tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah data</a>
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
                        <th>Divisi</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 0;
                    foreach ($kategori as $kategoridata) {
                      $no++;

                      list($kodedivisi,$urutan) = explode('-', $kategoridata['kode_kategori'] );

                      $divisi = $this->global_model->find_by('divisi',array('kode_divisi' => $kodedivisi));
                    ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $kategoridata['kode_kategori'];?></td>
                      <td><?php echo $kategoridata['nama_kategori'];?></td>
                      <td><?php echo $divisi['nama_divisi'];?></td>
                      <td class="text-center"><a href="<?php echo base_url();?>index.php/kategori/ubah/<?php echo $kategoridata['kode_kategori'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                      <a href="<?php echo base_url();?>index.php/kategori/hapus/<?php echo $kategoridata['kode_kategori'];?>" onclick="return confirm_delete()" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></td>
                    </tr>
                    <?php }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Divisi</th>
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