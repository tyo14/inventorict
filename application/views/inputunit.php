<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Unit
            <small>Input Data Unit</small>
          </h1><br>
          <p>
            <a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a> &nbsp;>  
            <a href="<?php echo base_url(); ?>index.php/unit/"> Unit</a> &nbsp;>
            <a> &nbsp;Tambah data</a>
          </p>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <!-- SELECT2 EXAMPLE -->
          <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Data Unit</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <form method="POST" action="" class="form-horizontal">
              <div class="form-group">
                  <label for="inputUnit" class="col-sm-3 control-label">Kategori</label>
                  <div class="col-sm-8">
                      <select class="form-control select2" style="width: 100%;" name="kode_kategori">
                      <option></option>
                      <?php foreach ($kategori as $kategoridata) {

                        list($kode,$digit) = explode('-', $kategoridata['kode_kategori']);
                        $divisi = $this->global_model->find_by('divisi', array('kode_divisi' => $kode));
                      ?>
                        <option value="<?php echo $kategoridata['kode_kategori'];?>"><?php echo $kategoridata['nama_kategori'].' - '.$divisi['nama_divisi'];?></option>
                      <?php } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Kode Unit</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" maxlength="3" style="text-transform:uppercase;" name="kode_unit" required />
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Nama Unit</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_unit" required />
                  </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <input type="reset" class="btn btn-default" value="Cancel" />
                </div>
                <div class="btn-group">
                  <input type="submit" class="btn btn-primary" value="Simpan" name="saveunit" />
                </div>
              </div>  
            </div>
            </form>
            </div><!-- /.box -->
            </div><!-- /.cols -->
          </div><!-- /.row -->
        </section>  
        
</div>        