<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Unit
            <small>Input Data Unit</small>
          </h1>
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
              
              <!-- form start -->
              <form method="POST" action="<?php echo base_url();?>index.php/unit/simpan">
                <div class="form-group">
                    <label for="inputKodeUnit">Kode Unit</label>                          
                    <input type="text" name="kode_unit" class="form-control" placeholder="Kode Unit" maxlength="3" style="text-transform:uppercase;" required>
                </div>
                <div class="form-group">
                    <label for="inputNamaUnit">Nama Unit</label>
                    <input type="text" name="nama_unit" class="form-control" placeholder="Nama Unit" required>
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