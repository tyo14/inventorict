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
            <li class="active">Input Data Barang</li>
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
              <form method="POST" action="">
                <div class="form-group">
                    <label for="inputKodeUnit">Kode Unit</label>                          
                    <input type="text" class="form-control" placeholder="Kode Unit">
                </div>
                <div class="form-group">
                    <label for="inputNamaUnit">Nama Unit</label>
                    <input type="text" class="form-control" placeholder="Nama Unit">
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <a class="btn btn-default" href="#">Cancel</a>
                </div>
                <div class="btn-group">
                  <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" />
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
              <form method="POST" action="">
                <div class="form-group">
                    <label for="inputKodeUnit">Kode Divisi</label>                          
                    <input type="text" class="form-control" placeholder="Kode Unit">
                </div>
                <div class="form-group">
                    <label for="inputNamaUnit">Nama Unit</label>
                    <input type="text" class="form-control" placeholder="Nama Unit">
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <a class="btn btn-default" href="#">Cancel</a>
                </div>
                <div class="btn-group">
                  <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" />
                </div>
              </div>  
            </div>
            </form>
            </div><!-- /.box -->
            </div>
          </div><!-- /.row -->
        </section>  
        
</div>        