<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Rakitan
            <small>Data - Data Rakitan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Daftar Rakitan</li>
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
                        <th>Divisi</th>
                        <th>Kode Rakit</th>
                        <th>Pengguna</th>
                        <th>Tanggal</th>
                        <th>Health</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rakitan as $fetchdata) {
                      list($tahun,$bulan,$tanggal) = explode("-", $fetchdata['tanggal_rakit']);

                      $fetchdata['tanggal_rakit'] = $bulan."/".$tanggal."/".$tahun;

                      list($huruf,$digit) = explode("-", $fetchdata['kode_rakit']);

                      $row = $this->global_model->find_by('divisi', array('kode_divisi' => $huruf));

                    ?>
                      <tr>
                        <td><?php echo $row['nama_divisi']; ?></td>
                        <td><?php echo $fetchdata['kode_rakit']; ?></td>
                        <td><?php echo $fetchdata['pengguna']; ?></td>
                        <td><?php echo $fetchdata['tanggal_rakit']; ?></td>
                        <td><?php echo $fetchdata['unit_health']." %";  ?></td>
                        <td><a href="<?php echo base_url();?>index.php/rakitan/ubah/<?php echo $fetchdata['kode_rakit'];?>">Edit</a> | 
                        <a href="<?php echo base_url();?>index.php/rakitan/hapus/<?php echo $fetchdata['kode_rakit'];?>" onclick="return confirm_delete()">Hapus</a> | 
                        <a>Detail</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>UI / VO</th>
                        <th>Kondisi</th>
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