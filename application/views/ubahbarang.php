<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Barang
            <small>Ubah Data Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/barang/">Barang</a></li>
            <li class="active">Ubah data</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- SELECT2 EXAMPLE -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data Barang</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
            <div id="message"></div>
              <div class="row">
              <!-- form start -->
              <form id="myform" class="form-horizontal" method="POST" action="<?php echo base_url(); ?>index.php/barang/simpanubah/<?php echo $all['kode_barang']; ?>">
                <div class="col-md-7">
                      <div class="box-body">
                      <div class="form-group">
                          <label for="inputUnit" class="col-sm-3 control-label">Divisi</label>
                          <div class="col-sm-8">
                            <select class="form-control select2" style="width: 100%;" onChange="showOptionUnit(this.value)" required>
                            <option></option>
                              <?php foreach ($divisi as $divisidata) {
                              ?>
                              <option value="<?php echo $divisidata['kode_divisi'];?>" <?php if($all['kode_divisi'] == $divisidata['kode_divisi']){ echo "selected"; } ?> ><?php echo $divisidata['nama_divisi'];?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputUnit" class="col-sm-3 control-label">Unit</label>
                          <div class="col-sm-8">
                            <select class="form-control select2" style="width: 100%;" name="kode_unit" onChange="showKodeBarang(this.value)" id="txtUnit" required >                               
                              <?php foreach ($dataunit as $unitdata) {
                              ?>
                              <option value="<?php echo $unitdata['kode_unit'];?>" <?php if($all['kode_unit'] == $unitdata['kode_unit']){ echo "selected"; } ?> ><?php echo $unitdata['nama_unit'];?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputKodeBarang" class="col-sm-3 control-label">Kode Barang</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtHint" readonly="" name="kode_barang" value="<?php echo $all['kode_barang']; ?>" required />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalBeli" class="col-sm-3 control-label">VI/VU(Tanggal beli)</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="tgl_beli"
                               value="<?php
                               list($tahun,$bulan,$tanggal) = explode('-', $all['tgl_beli']);
                               $all['tgl_beli'] = $bulan.'/'.$tanggal.'/'.$tahun;
                               echo $all['tgl_beli'];
                                ?>" required>
                            </div><!-- /.input group -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputNamaBarang" class="col-sm-3 control-label">Nama Barang</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" value="<?php echo $all['nama_barang']; ?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputDeskripsi" class="col-sm-3 control-label">Deskripsi</label>
                          <div class="col-sm-8">
                            <textarea class="form-control" rows="3" placeholder="Deskripsi barang" name="deskripsi"><?php echo $all['deskripsi']; ?></textarea>
                          </div>
                        </div>
                      </div><!-- /.box-body -->              
                </div><!-- /.col -->
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="inputKodeBarang" class="col-sm-4 control-label">Kondisi Barang</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" name="kondisi_barang" value="<?php echo $all['kondisi_barang']; ?>" onkeyup="this.value = minmax(this.value, 0, 100)" required>
                      <small>* % Health</small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputKodeBarang" class="col-sm-4 control-label">Status Stok</label>
                    <div class="col-sm-6">
                      <div class="radio">
                        <label>
                          <input name="status_stok" id="optionsRadios1" value="used" <?php if($all['status_stok'] == "used") { echo "checked"; }  ?> type="radio">
                          Used
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="status_stok" id="optionsRadios1" value="not used" <?php if($all['status_stok'] == "not used") { echo "checked"; }  ?> type="radio">
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
                  <button type="reset" class="btn btn-default">Cancel</button>
                </div>
                <div class="btn-group">
                  <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>  
            </div>
            </form>
          </div><!-- /.box -->
        </section>  
        
</div>
<script type="text/javascript">
    $("#submit").click(function (){ 
      $.post( $("#myform").attr("action"),
        $("#myform :input").serializeArray(),
        function(info){
          $("#message").empty();
          $("#message").html(info);            
        });

      $("#myform").submit(function (){
          return false;
      });
    });

    function clear()  {
      $("#myform :input").each(function (){
        $(this).val("");
      });
    }
</script>
<script type="text/javascript">
      function showKodeBarang(str) {
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

      function showOptionUnit(str) {
        document.getElementById("txtHint").value = "";

        var xhttp;    
        if (str == "") {
          document.getElementById("txtUnit").innerHTML = "";
          return;
        }
        var url="http://localhost/inventorict/index.php/devisi/ajaxunit/"


        url=url+str
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("txtUnit").innerHTML = xhttp.responseText
            document.getElementById("txtUnit").value = xhttp.responseText
          }
        };
        xhttp.open("GET",url, true);
        xhttp.send(null);

      }
</script>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}    
</script>
<script type="text/javascript">
function minmax(value, min, max) 
{
    if(parseInt(value) < min || isNaN(value)) 
        return 0; 
    else if(parseInt(value) > max) 
        return 100; 
    else return value;
}
</script>