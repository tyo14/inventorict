<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Divisi
            <small>Input Data Divisi</small>
          </h1><br>
          <p>
            <a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a> &nbsp;>  
            <a href="<?php echo base_url(); ?>index.php/devisi/"> Divisi</a> &nbsp;>
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
              <h3 class="box-title">Input Data Divisi</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
            <div id="message">
              <?php 
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "tambahdevisi"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                       echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                       echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
            ?>
            </div>
              <!-- form start -->
              <form method="post" action="">
                <div class="form-group">
                    <label for="inputKodeDevisi">Kode divisi</label>                          
                    <input type="text" name="kode_divisi" class="form-control" placeholder="Kode Divisi" maxlength="3" style="text-transform:uppercase;" required>
                </div>
                <div class="form-group">
                    <label for="inputNamaDevisi">Nama Divisi</label>
                    <input type="text" name="nama_divisi" class="form-control" placeholder="Nama Divisi" required>
                </div>

            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <input type="reset" class="btn btn-default" value="Cancel"/>
                </div>
                <div class="btn-group">
                  <input type="submit" class="btn btn-primary" name="savedivisi" value="Simpan" />
                </div>
              </div>  
            </div>
            </form>
            </div><!-- /.box -->
            </div><!-- /.cols -->
          </div><!-- /.row -->
        </section>  
        
</div>