<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Rakitan
            <small>Ubah Data Rakitan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>index.php/rakitan/">Rakitan</a></li>
            <li>Ubah data</li>
            <li class="active"><?php echo $rakitanheader['kode_rakit']; ?></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- select2 EXAMPLE -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data Rakitan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/rakitan/simpan">
                <div class="col-md-7">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="inputUnit" class="col-sm-3 control-label">Divisi</label>
                          <div class="col-sm-8">
                            <select class="form-control select2" style="width: 100%;" onChange="showKodeRakit(this.value)">
                              <?php foreach ($datadivisi as $divisi) {
                              ?>
                              <option value="<?php echo $divisi['nama_divisi'];?>"><?php echo $divisi['nama_divisi'];?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputKodeBarang" class="col-sm-3 control-label">Kode Rakit</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtHint" readonly="" name="kode_rakit" value="<?php echo $rakitanheader['kode_rakit']; ?>" required />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalBeli" class="col-sm-3 control-label">Tanggal Rakit</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'"
                               value="
                               <?php
                               list($tahun,$bulan,$tanggal) = explode('-', $rakitanheader['tanggal_rakit']);
                               $rakitanheader['tanggal_rakit'] = $bulan.'/'.$tanggal.'/'.$tahun;
                               echo $rakitanheader['tanggal_rakit'];
                                ?>
                               "
                               data-mask name="tanggal_rakit" required>
                            </div><!-- /.input group -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputNamaBarang" class="col-sm-3 control-label">Pengguna</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Pengguna" name="pengguna" value="<?php echo $rakitanheader['pengguna']; ?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputKodeBarang" class="col-sm-3 control-label">Unit Health</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" max="100" min="0" step="1" name="unit_health" value="<?php echo $rakitanheader['unit_health']; ?>" required>
                            <small>* % Health</small>
                          </div>
                        </div>
                      </div><!-- /.box-body -->              
                </div><!-- /.col -->

                <div class="col-md-5">
                    <table class="table table-bordered table-striped">
                        <thead>
                          <th>No.</th>
                          <th>Nama Barang</th>
                          <th class="text-center">Aksi</th>
                        </thead>
                        <tbody>
                        <?php
                        $no = 0;
                         foreach ($rakitandetail as $datarakitan) {
                          $no++;
                        ?>
                          <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $datarakitan['nama_barang'];?></td>
                            <td><a href="<?php echo base_url();?>index.php/rakitan/hapusbarang/<?php echo $datarakitan['kode_rakit'];?>" onclick="return confirm_delete()">Hapus</a></td>
                          </tr>
                          <?php }?>
                        </tbody>
                    </table>
                </div><!-- /.col -->

                <div class="col-md-12">
                <div class="btn-group">
                  <input type="button" class="btn btn-default" onclick="addRow('dataTable');" value="Add Konfigurasi" />
                </div>
                <div class="btn-group">
                  <input type="button" class="btn btn-default" onclick="deleteRow('dataTable');" value="Hapus Konfigurasi" />
                </div><br /><br />
                <table id="dataTable" class="table table-hovered table-striped">
                    <tr>
                        <td><input type="checkbox"/></td>
                        <td><input type="text" class="form-control" name="konfigurasi[]" placeholder="Konfigurasi" required/></td>
                        <td>
                            <select class="form-control" style="width: 100%;" name="kode_barang[]">
                              <?php foreach ($databarang as $barang) {
                              ?>
                              <option value="<?php echo $barang['kode_barang'];?>"><?php echo $barang['kode_barang'];?> - <?php echo $barang['nama_barang'];?></option>
                              <?php } ?>
                            </select>
                        </td>
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

</script>

<script language="javascript">
        function addRow(tableID) {
          var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
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
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
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
<script type="text/javascript">
function confirm_delete() {
  return confirm('apa anda yakin ingin menghapus ?');
}
</script>