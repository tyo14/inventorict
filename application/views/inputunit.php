<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Unit & Divisi
            <small>Input Data Unit dan Divisi</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Dashboard</li>
            <li class="active">Input Data Unit dan Divisi</li>
          </ol>
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
              <form method="POST" action="<?php echo base_url();?>index.php/unitdiv/simpanunit">
                <div class="form-group">
                    <label for="inputKodeUnit">Kode Unit</label>                          
                    <input type="text" name="kode_unit" class="form-control" placeholder="Kode Unit" maxlength="3" style="text-transform:uppercase;">
                </div>
                <div class="form-group">
                    <label for="inputNamaUnit">Nama Unit</label>
                    <input type="text" name="nama_unit" class="form-control" placeholder="Nama Unit">
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
            <div class="col-md-6">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Data Divisi</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              
              <!-- form start -->
              <form method="POST" action="<?php echo base_url();?>index.php/unitdiv/simpandevisi">
                <div class="form-group">
                    <label for="inputKodeDivisi">Kode Divisi</label>                          
                    <input type="text" name="kode_devisi" class="form-control" placeholder="Kode Divisi" maxlength="3" style="text-transform:uppercase;">
                </div>
                <div class="form-group">
                    <label for="inputNamaDivisi">Nama Divisi</label>
                    <input type="text" name="nama_devisi" class="form-control" placeholder="Nama Divisi">
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <input type="reset" class="btn btn-default" value="Cancel" />
                </div>
                <div class="btn-group">
                  <input type="submit" class="btn btn-primary" value="Simpan" name="savedevisi" />
                </div>
              </div>  
            </div>
            </form>
            </div><!-- /.box -->
            </div>
          </div><!-- /.row -->
        </section>  
        
</div>        