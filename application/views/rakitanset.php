<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Setting Rakitan
            <small>Setting Data Rakitan</small>
          </h1><br>
          <p>
            <a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a> &nbsp;>  
            <a> &nbsp;Setting Rakitan</a>
          </p>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <!-- SELECT2 EXAMPLE -->
          <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Setting data penginputan rakitan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
            <div id="message">
              <?php 
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "ubahrakitanset"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                       echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                       echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                ?>
            </div>
              <form method="POST" action="" class="form-horizontal">
              <div class="form-group">
                  <label for="inputUnit" class="col-sm-3 control-label">Specification of Computer</label>
                  <div class="col-sm-8">
                      <select class="form-control" style="width: 100%;" name="spek">
                      <?php foreach ($kategori as $datakategori) {
                      ?>
                        <option value="<?php echo $datakategori['kode_kategori'];?>" <?php if($setting['spek'] == $datakategori['kode_kategori']){ echo "selected";}?> ><?php echo $datakategori['nama_kategori'];?></option>
                      <?php } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Support Device</label>
                  <div class="col-sm-8">
                    <select class="form-control" style="width: 100%;" name="sup_device">
                      <?php foreach ($kategori as $datakategori) {
                      ?>
                        <option value="<?php echo $datakategori['kode_kategori'];?>" <?php if($setting['sup_device'] == $datakategori['kode_kategori']){ echo "selected";}?> ><?php echo $datakategori['nama_kategori'];?></option>
                      <?php } ?>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Operating System</label>
                  <div class="col-sm-8">
                    <select class="form-control" style="width: 100%;" name="os">
                      <?php foreach ($kategori as $datakategori) {
                      ?>
                        <option value="<?php echo $datakategori['kode_kategori'];?>" <?php if($setting['os'] == $datakategori['kode_kategori']){ echo "selected";}?> ><?php echo $datakategori['nama_kategori'];?></option>
                      <?php } ?>
                    </select>
                  </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <input type="reset" class="btn btn-default" value="Cancel"/>
                </div>
                <div class="btn-group">
                  <input type="submit" class="btn btn-primary" name="saverakitanset" value="Simpan" />
                </div>
              </div>  
            </div>
            </form>
            </div><!-- /.box -->
            </div><!-- /.cols -->
          </div><!-- /.row -->
        </section>  
        
</div>