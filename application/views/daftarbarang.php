<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Barang
            <small>Data - Data Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Daftar Barang</li>
          </ol>
        </section>
        <section class="content-header">
          <a href="<?php echo base_url(); ?>index.php/barang/tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah data</a>
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
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th class="text-center">UI / VO</th>
                        <th class="text-center">Kondisi</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($barang as $fetchdata) {
                      list($tahun,$bulan,$tanggal) = explode("-", $fetchdata['tgl_beli']);

                      $fetchdata['tgl_beli'] = $bulan."/".$tanggal."/".$tahun;

                      $row = $this->global_model->find_by('status_barang', array('kode_barang' => $fetchdata['kode_barang']));

                    ?>
                      <tr>
                        <td><?php echo $fetchdata['kode_barang']; ?></td>
                        <td><?php echo $fetchdata['nama_barang']; ?></td>
                        <td class="text-center"><?php echo $fetchdata['tgl_beli']; ?></td>
                        <td class="text-center"><?php echo $fetchdata['kondisi_barang']." %";  ?></td>
                        <td class="text-center"><?php echo $row['status_stok']; ?></td>
                        <td class="text-center"><a href="<?php echo base_url();?>index.php/barang/ubah/<?php echo $fetchdata['kode_barang'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a> 
                        <a href="<?php echo base_url();?>index.php/barang/hapus/<?php echo $fetchdata['kode_barang'];?>" onclick="return confirm_delete()" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th class="text-center">UI / VO</th>
                        <th class="text-center">Kondisi</th>
                        <th class="text-center">Status</th>
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