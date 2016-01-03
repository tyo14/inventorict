<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/barang/">Barang</a></li>
            <li class="active">Tambah data</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- SELECT2 EXAMPLE -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata pengguna</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="">
                <div class="col-md-7">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="inputUnit" class="col-sm-3 control-label">Nama Lengkap</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_pengguna" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputKodeBarang" class="col-sm-3 control-label">Email</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Email" name="email" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputNamaBarang" class="col-sm-3 control-label">Username</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputNamaBarang" class="col-sm-3 control-label">Kata Sandi</label>
                          <div class="col-sm-8">
                            <input type="password" class="form-control" placeholder="Kata Sandi" name="password" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputDeskripsi" class="col-sm-3 control-label">Deskripsi</label>
                          <div class="col-sm-8">
                            <textarea class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputDeskripsi" class="col-sm-3 control-label"></label>
                          <div class="col-sm-8">
                            <div class="btn-group">
                              <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" />
                            </div>
                            <div class="btn-group">
                              <input type="reset" class="btn btn-default" value="Cancel" />
                            </div>
                          </div>
                        </div>
                      </div><!-- /.box-body -->              
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.box-body -->
            </form>
          </div><!-- /.box -->
        </section>  
        
</div>