<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Barang
            <small>Input Data Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Dashboard</li>
            <li class="active">Input Data Barang</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- SELECT2 EXAMPLE -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Data Barang</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/barang/simpan">
                <div class="col-md-7">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="inputUnit" class="col-sm-3 control-label">Unit</label>
                          <div class="col-sm-8">
                            <select class="form-control select2" style="width: 100%;" onChange="showCustomer(this.value)">
                              <?php foreach ($dataunit as $unit) {
                              ?>
                              <option value="<?php echo $unit['nama_unit'];?>"><?php echo $unit['nama_unit'];?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputKodeBarang" class="col-sm-3 control-label">Kode Barang</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtHint" readonly="" name="kode_barang" required />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalBeli" class="col-sm-3 control-label">VI/VU(Tanggal beli)</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="tgl_beli" required>
                            </div><!-- /.input group -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputNamaBarang" class="col-sm-3 control-label">Nama Barang</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputDeskripsi" class="col-sm-3 control-label">Deskripsi</label>
                          <div class="col-sm-8">
                            <textarea class="form-control" rows="3" placeholder="Deskripsi barang" name="deskripsi"></textarea>
                          </div>
                        </div>
                      </div><!-- /.box-body -->              
                </div><!-- /.col -->
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="inputKodeBarang" class="col-sm-4 control-label">Kondisi Barang</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" max="100" min="0" step="1" name="kondisi_barang" required>
                      <small>* % Health</small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputKodeBarang" class="col-sm-4 control-label">Status Stok</label>
                    <div class="col-sm-6">
                      <div class="radio">
                        <label>
                          <input name="status_stok" id="optionsRadios1" value="used" checked="" type="radio">
                          Used
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="status_stok" id="optionsRadios1" value="not used" checked="" type="radio">
                          Not used
                        </label>
                      </div>
                    </div>
                  </div>
                </div><!-- /.col -->
              </div><!-- /.row -->
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
        </section>  
        
</div>
<script type="text/javascript">
      function showCustomer(str) {
        var xhttp;    
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        }
        var url="http://localhost/inventorict/index.php/barang/ajaxbarang/"


        url=url+str
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("txtHint").innerHTML = xhttp.responseText
            document.getElementById("txtHint").value = xhttp.responseText
          }
        };
        xhttp.open("GET",url, true);
        xhttp.send(null);

      }

</script>