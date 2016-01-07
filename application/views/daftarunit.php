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
                        <th>Kode Unit</th>
                        <th>Nama Unit</th>
                        <th>Kategori</th>
                        <th>Divisi</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach ($unit as $unitdata) {

                      list($kodekategori,$urutan) = explode('-', $unitdata['kode_kategori']);

                      $divisi = $this->global_model->find_by('divisi',array('kode_divisi' => $kodekategori));
                      $kategori = $this->global_model->find_by('kategori',array('kode_kategori' => $unitdata['kode_kategori']));
                      ?>
                      <tr>                        
                        <td><?php echo $unitdata['kode_unit'];?></td>
                        <td><?php echo $unitdata['nama_unit'];?></td>
                        <td><?php echo $kategori['nama_kategori'];?></td>
                        <td><?php echo $divisi['nama_divisi'];?></td>
                        <td class="text-center"><a href="<?php echo base_url();?>index.php/unit/ubah/<?php echo $unitdata['kode_unit'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url();?>index.php/unit/hapus/<?php echo $unitdata['kode_unit'];?>" onclick="return confirm_delete()" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></td>
                      </tr>
                      <?php }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Kode Unit</th>
                        <th>Nama Unit</th>
                        <th>Kategori</th>
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