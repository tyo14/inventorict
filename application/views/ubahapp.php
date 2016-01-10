<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form App
            <small>Ubah Data App</small>
          </h1><br>
          <p>
            <a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a> &nbsp;>  
            <a href="<?php echo base_url(); ?>index.php/app/"> App</a> &nbsp;>
            <a> &nbsp;Ubah data</a> &nbsp;>
            <a> &nbsp;<?php echo $app['kode_app'];?></a>
          </p>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <!-- SELECT2 EXAMPLE -->
          <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data App</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              
              <!-- form start -->
              <form method="POST" action="" class="form-horizontal">
              <div class="form-group">
                  <label for="inputUnit" class="col-sm-3 control-label">Kategori App</label>
                  <div class="col-sm-8">
                      <select class="form-control select2" style="width: 100%;" name="kode_kategoriapp" onChange="showKodeApp(this.value)">
                      <?php foreach ($kategoriapp as $datakategoriapp) {
                      ?>
                        <option value="<?php echo $datakategoriapp['kode_kategoriapp'];?>" <?php if($app['kode_kategoriapp'] == $datakategoriapp['kode_kategoriapp']){ echo "selected"; }?> ><?php echo $datakategoriapp['nama_kategoriapp'];?></option>
                      <?php } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Kode App</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtHint" readonly="" name="kode_app" value="<?php echo $app['kode_app'];?>" required />
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Nama App</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_app" required value="<?php echo $app['nama_app'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Bit</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="bit" required value="<?php echo $app['bit'];?>"/>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Deskripsi</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi"><?php echo $app['deskripsi'];?></textarea>
                  </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <input type="reset" class="btn btn-default" value="Cancel" />
                </div>
                <div class="btn-group">
                  <input type="submit" class="btn btn-primary" value="Simpan" name="saveapp" />
                </div>
              </div>  
            </div>
            </form>
            </div><!-- /.box -->
            </div><!-- /.cols -->
          </div><!-- /.row -->
        </section>        
</div>  
<script type="text/javascript">
      function showKodeApp(str) {
        var xhttp;    
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        }
        var url="http://localhost/inventorict/index.php/kategoriapp/ajaxkategoriapp/"


        url=url+str
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            //document.getElementById("txtHint").innerHTML = xhttp.responseText
            document.getElementById("txtHint").value = xhttp.responseText
          }
        };
        xhttp.open("GET",url, true);
        xhttp.send(null);

      }

</script>
