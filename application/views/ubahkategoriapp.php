<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Kategori App
            <small>Ubah Data Kategori App</small>
          </h1><br>
          <p>
            <a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a> &nbsp;>  
            <a href="<?php echo base_url(); ?>index.php/kategoriapp/"> Kategori App</a> &nbsp;>
            <a> &nbsp;Ubah data</a> &nbsp;>
            <a> &nbsp;<?php echo $kategoriapp['kode_kategoriapp']; ?></a>
          </p>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <!-- SELECT2 EXAMPLE -->
          <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data Kategori App</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              
              <!-- form start -->
              <form method="POST" action="">
                <div class="form-group">
                    <label for="inputKodeDevisi">Kode Kategori</label>                          
                    <input type="text" name="kode_kategoriapp" class="form-control" placeholder="Kode Kategori App" maxlength="3" style="text-transform:uppercase;" value="<?php echo $kategoriapp['kode_kategoriapp']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="inputNamaDevisi">Nama Kategori</label>
                    <input type="text" name="nama_kategoriapp" class="form-control" placeholder="Nama Kategori App" value="<?php echo $kategoriapp['nama_kategoriapp']; ?>" required>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <input type="reset" class="btn btn-default" value="Cancel" />
                </div>
                <div class="btn-group">
                  <input type="submit" class="btn btn-primary" value="Simpan" name="savekategori" />
                </div>
              </div>  
            </div>
            </form>
            </div><!-- /.box -->
            </div><!-- /.cols -->
          </div><!-- /.row -->
        </section>  
        
</div>       