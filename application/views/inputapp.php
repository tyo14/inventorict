<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form App
            <small>Input Data App</small>
          </h1><br>
          <p>
            <a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a> &nbsp;>  
            <a href="<?php echo base_url(); ?>index.php/app/"> App</a> &nbsp;>
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
              <h3 class="box-title">Input Data App</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div id="message">
                <?php 
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "tambahapp"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                       echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                       echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                  ?>
              </div>
              <!-- form start -->
              <form method="POST" action="" class="form-horizontal" >
              <div class="form-group">
                  <label for="inputUnit" class="col-sm-3 control-label">Kategori App</label>
                  <div class="col-sm-8">
                      <select class="form-control select2" style="width: 100%;" name="kode_kategoriapp" onChange="showKodeApp(this.value)">
                      <?php foreach ($kategoriapp as $datakategoriapp) {
                      ?>
                        <option value="<?php echo $datakategoriapp['kode_kategoriapp'];?>"><?php echo $datakategoriapp['nama_kategoriapp'];?></option>
                      <?php } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Kode App</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtHint" readonly="" name="kode_app" required />
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Nama App</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_app" required placeholder="Nama aplikasi"/>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Bit</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="bit" required placeholder="Bit" />
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Deskripsi</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi"></textarea>
                  </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <input type="reset" class="btn btn-default" value="Cancel"/>
                </div>
                <div class="btn-group">
                  <input type="submit" class="btn btn-primary" name="saveapp" value="Simpan" />
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