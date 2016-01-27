<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Form Workgroup
            <small>Input Data Workgroup</small>
          </h1><br>
          <p>
            <a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a> &nbsp;>  
            <a href="<?php echo base_url(); ?>index.php/lab/"> Workgroup</a> &nbsp;>
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
              <h3 class="box-title">Input Data Workgroup</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div id="message"></div>
              <!-- form start -->
              <form id="myform" method="POST" action="<?php echo base_url();?>index.php/lab/simpan">
                <div class="form-group">
                    <label for="inputKodeDevisi">Kode Workgroup</label>                          
                      <input type="text" name="kode_lab" class="form-control" placeholder="Kode Workgroup" maxlength="10" onkeypress="return isNumberKey(event)"  required>
                </div>
                <div class="form-group">
                    <label for="inputNamaDevisi">Nama Workgroup</label>
                    <input type="text" name="nama_lab" class="form-control" placeholder="Nama Workgroup" required>
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
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}    
</script>

<script type="text/javascript">
    $("#submit").click(function (){ 
      $.post( $("#myform").attr("action"),
        $("#myform :input").serializeArray(),
        function(info){
          $("#message").empty();
          $("#message").html(info);
            clear();
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