<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Kategori
            <small>Ubah Data Kategori</small>
          </h1><br>
          <p>
            <a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a> &nbsp;>  
            <a href="<?php echo base_url(); ?>index.php/kategori/"> Kategori</a> &nbsp;>
            <a> &nbsp;Ubah data</a>
          </p>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
          <!-- SELECT2 EXAMPLE -->
          <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data Kategori</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div id="message"></div>
              <!-- form start -->
              <form id="myform" method="POST" action="<?php echo base_url();?>index.php/kategori/simpanubah/<?php echo $kategori['kode_kategori'];?>" class="form-horizontal">
              <div class="form-group">
                  <label for="inputUnit" class="col-sm-3 control-label">Unit</label>
                  <div class="col-sm-8">
                      <select class="form-control select2" style="width: 100%;" onChange="showKodeKategori(this.value)" name="kode_divisi">
                      <?php foreach ($devisi as $divisi) {
                      ?>
                        <option value="<?php echo $divisi['kode_divisi'];?>" <?php if($kategoridivisi == $divisi['kode_divisi']){ echo "selected"; }?> ><?php echo $divisi['nama_divisi'];?></option>
                      <?php } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Kode Kategori</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="txtHint" readonly="" name="kode_kategori" value="<?php echo $kategori['kode_kategori'];?>" required />
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputKodeBarang" class="col-sm-3 control-label">Nama Kategori</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_kategori" value="<?php echo $kategori['nama_kategori'];?>" required />
                  </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <div class="btn-group">
                  <button type="reset" class="btn btn-default">Cancel</button>
                </div>
                <div class="btn-group">
                  <button id="submit" class="btn btn-primary">Simpan</button>
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
    $("#submit").click(function (){ 
      $.post( $("#myform").attr("action"),
        $("#myform :input").serializeArray(),
        function(info){
          $("#message").empty();
          $("#message").html(info);
            //clear();
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
      function showKodeKategori(str) {
        var xhttp;    
        if (str == "") {
          document.getElementById("txtHint").innerHTML = "";
          return;
        }
        var url="http://localhost/inventorict/index.php/devisi/ajaxdevisi/"


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
