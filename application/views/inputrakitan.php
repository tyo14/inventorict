<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Rakitan
            <small>Input Data Rakitan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/rakitan/">Rakitan</a></li>
            <li class="active">Tambah data</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- select2 EXAMPLE -->
          <div class="box box-primary">
            <div class="box-body">
            <div id="message">
                <?php 
                    if($this->session->flashdata('messagemode','messagetext','messageactive') && $this->session->flashdata('messageactive') == "tambahrakitan"){
                      echo "<div class='alert alert-".$this->session->flashdata('messagemode')." alert-dismissable'>";
                       echo"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";             
                       echo "<label>Informasi ! </label> ".$this->session->flashdata('messagetext');
                      echo "</div>";
                    }
                  ?>
              </div>
              <div class="row">
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="">
                <div class="col-md-12">
                      <div class="col-md-6">
                      <h4>1. Personal Data</h4>
                      <hr />
                        <div class="form-group">
                          <label for="inputNamaBarang" class="col-sm-3 control-label">Pengguna</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Pengguna" name="pengguna" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalBeli" class="col-sm-3 control-label">Tanggal Rakit</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask name="tanggal_rakit" required>
                            </div><!-- /.input group -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputKodeBarang" class="col-sm-3 control-label">Unit Health</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="unit_health" onkeypress="return isNumberKey(event)" onkeyup="this.value = minmax(this.value, 0, 100)" required>
                            <small>* % Health</small>
                          </div>
                        </div>
                      </div><!-- /.box-body --> 
                      <div class="col-md-6">
                      <h4>2. Network Configuration </h4>
                      <hr />
                        <div class="form-group">
                          <label for="inputNamaBarang" class="col-sm-3 control-label">IP Address</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="IP Address" name="ip_address" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputNamaBarang" class="col-sm-3 control-label">Workgroup</label>
                          <div class="col-sm-8">
                            <select class="form-control" style="width: 100%;" name="kode_barang[]">
                              <?php foreach ($lab as $datalab) {
                              ?>
                              <option value="<?php echo $datalab['kode_lab'];?>"><?php echo $datalab['kode_lab'];?> (<?php echo $datalab['nama_lab'];?>)</option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputNamaBarang" class="col-sm-3 control-label">Computer Name</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Computer Name" name="computer_name" required>
                          </div>
                        </div>
                      </div>
                </div><!-- /.col -->

                <div class="col-md-12">
                <h4>3. Specification of computer equipment</h4>
                <hr />
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Nama unit</label>
                    <div class="col-sm-8">
                      <select class="form-control" style="width: 100%;" name="kode_barang[]">
                        <?php foreach ($lab as $datalab) {
                        ?>
                        <option value="<?php echo $datalab['kode_lab'];?>"><?php echo $datalab['kode_lab'];?> (<?php echo $datalab['nama_lab'];?>)</option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Merek / Type</label>
                    <div class="col-sm-8">
                      <select class="form-control" style="width: 100%;" name="kode_barang[]">
                        <?php foreach ($lab as $datalab) {
                        ?>
                        <option value="<?php echo $datalab['kode_lab'];?>"><?php echo $datalab['kode_lab'];?> (<?php echo $datalab['nama_lab'];?>)</option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Spesifikasi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Spesifikasi" name="spesifikasi" readonly="" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-8">
                      <div class="btn-group pull-right">
                      <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah item</button>
                      </div>
                    </div>
                  </div><br/>
                </div>
                <table class="table table-bordered">
                  <tr>
                    <th>Nama Unit</th>
                    <th>Merek/Type</th>
                    <th>Spesifikasi</th>
                    <th>Option</th>
                  </tr>
                </table>
                </div>

                <div class="col-md-12">
                <h4>4. Support Device</h4>
                <hr />
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Nama unit</label>
                    <div class="col-sm-8">
                      <select class="form-control" style="width: 100%;" name="kode_barang[]">
                        <?php foreach ($lab as $datalab) {
                        ?>
                        <option value="<?php echo $datalab['kode_lab'];?>"><?php echo $datalab['kode_lab'];?> (<?php echo $datalab['nama_lab'];?>)</option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Merek / Type</label>
                    <div class="col-sm-8">
                      <select class="form-control" style="width: 100%;" name="kode_barang[]">
                        <?php foreach ($lab as $datalab) {
                        ?>
                        <option value="<?php echo $datalab['kode_lab'];?>"><?php echo $datalab['kode_lab'];?> (<?php echo $datalab['nama_lab'];?>)</option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Spesifikasi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Spesifikasi" name="spesifikasi" readonly="" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-8">
                      <div class="btn-group pull-right">
                      <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah item</button>
                      </div>
                    </div>
                  </div><br/>
                </div>
                <table class="table table-bordered">
                  <tr>
                    <th>Nama Unit</th>
                    <th>Merek/Type</th>
                    <th>Spesifikasi</th>
                    <th>Option</th>
                  </tr>
                </table>
                </div>

                <div class="col-md-12">
                <h4>5. Operating System</h4>
                <hr />
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Nama unit</label>
                    <div class="col-sm-8">
                      <select class="form-control" style="width: 100%;" name="kode_barang[]">
                        <?php foreach ($lab as $datalab) {
                        ?>
                        <option value="<?php echo $datalab['kode_lab'];?>"><?php echo $datalab['kode_lab'];?> (<?php echo $datalab['nama_lab'];?>)</option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Merek / Type</label>
                    <div class="col-sm-8">
                      <select class="form-control" style="width: 100%;" name="kode_barang[]">
                        <?php foreach ($lab as $datalab) {
                        ?>
                        <option value="<?php echo $datalab['kode_lab'];?>"><?php echo $datalab['kode_lab'];?> (<?php echo $datalab['nama_lab'];?>)</option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Spesifikasi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Spesifikasi" name="spesifikasi" readonly="" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-8">
                      <div class="btn-group pull-right">
                      <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah item</button>
                      </div>
                    </div>
                  </div><br/>
                </div>
                <table class="table table-bordered">
                  <tr>
                    <th>Nama Unit</th>
                    <th>Merek/Type</th>
                    <th>Spesifikasi</th>
                    <th>Option</th>
                  </tr>
                </table>
                </div>

                <div class="col-md-12">
                <h4>6. Installed Application</h4>
                <hr />
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Nama unit</label>
                    <div class="col-sm-8">
                      <select class="form-control" style="width: 100%;" name="kode_barang[]">
                        <?php foreach ($lab as $datalab) {
                        ?>
                        <option value="<?php echo $datalab['kode_lab'];?>"><?php echo $datalab['kode_lab'];?> (<?php echo $datalab['nama_lab'];?>)</option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Merek / Type</label>
                    <div class="col-sm-8">
                      <select class="form-control" style="width: 100%;" name="kode_barang[]">
                        <?php foreach ($lab as $datalab) {
                        ?>
                        <option value="<?php echo $datalab['kode_lab'];?>"><?php echo $datalab['kode_lab'];?> (<?php echo $datalab['nama_lab'];?>)</option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputNamaBarang" class="col-sm-3 control-label">Spesifikasi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Spesifikasi" name="spesifikasi" readonly="" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-8">
                      <div class="btn-group pull-right">
                      <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah item</button>
                      </div>
                    </div>
                  </div><br/>
                </div>
                <table class="table table-bordered">
                  <tr>
                    <th>Nama Unit</th>
                    <th>Merek/Type</th>
                    <th>Spesifikasi</th>
                    <th>Option</th>
                  </tr>
                </table>
                </div>
              </div><!-- /.row -->
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <input type="reset" class="btn btn-default" value="Cancel" />
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

<script type="text/javascript">
      function showKodeRakit(str) {
        var xhttp;    
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        }
        var url="http://localhost/inventorict/index.php/rakitan/ajaxrakitan/"


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

      function showMerekspek(str) {
        document.getElementById("txtspek").value = "";
        var xhttp;    
        if (str == "") {
          document.getElementById("txtMerek").innerHTML = "";
          return;
        }
        var url="http://localhost/inventorict/index.php/rakitan/ajaxmerek/"


        url=url+str
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("txtMerek").innerHTML = xhttp.responseText
            document.getElementById("txtMerek").value = xhttp.responseText
          }
        };
        xhttp.open("GET",url, true);
        xhttp.send(null);

      }

      function showSpesifkasi(str) {
        var xhttp;    
        if (str == "") {
          document.getElementById("txtspek").innerHTML = "";
          return;
        }
        var url="http://localhost/inventorict/index.php/rakitan/ajaxspek/"


        url=url+str
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("txtspek").innerHTML = xhttp.responseText
            document.getElementById("txtspek").value = xhttp.responseText
          }
        };
        xhttp.open("GET",url, true);
        xhttp.send(null);

      }

</script>

<script language="javascript">
        function addRow(tableID) {
          var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[1].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            newcell.childNodes[0].value = rowCount-1;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }

        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=1; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                row.cells[0].childNodes[0].value = i-1;
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 2) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
    </script>