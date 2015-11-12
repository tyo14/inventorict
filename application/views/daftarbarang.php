<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Barang
            <small>Data - Data Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Dashboard</li>
            <li class="active">Daftar Barang</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Status Stock</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>UI / VO</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($barang as $fetchdata) {
                    ?>
                      <tr>
                        <td><?php echo $fetchdata['kode_barang']; ?></td>
                        <td><?php echo $fetchdata['nama_barang']; ?></td>
                        <td><?php echo $fetchdata['tgl_beli']; ?></td>
                        <td>Baik</td>
                        <td><a>Edit</a> | <a>Hapus</a> | <a>Detail</a></td>
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