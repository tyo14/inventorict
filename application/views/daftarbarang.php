<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Barang
            <small>Data - Data Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Daftar Barang</li>
          </ol>
        </section>
        <section class="content-header">
          <a href="<?php echo base_url(); ?>index.php/barang/tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah data</a>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                <div id="message"></div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Unit</th>
                        <th>Nama Barang</th>
                        <th class="text-center">UI / VO</th>
                        <th class="text-center">Kondisi</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($barang as $fetchdata) {
                      list($tahun,$bulan,$tanggal) = explode("-", $fetchdata['tgl_beli']);

                      $fetchdata['tgl_beli'] = $bulan."/".$tanggal."/".$tahun;

                      $row = $this->global_model->find_by('status_barang', array('kode_barang' => $fetchdata['kode_barang']));

                      $sql = $this->global_model->find_by('unit', array('kode_unit' => $fetchdata['kode_unit']));

                    ?>
                      <tr class="btnDelete" data-id="<?php echo $fetchdata['kode_barang'];?>">
                        <td name="id"><?php echo $fetchdata['kode_barang']; ?></td>
                        <td><?php echo $sql['nama_unit']; ?></td>
                        <td><?php echo $fetchdata['nama_barang']; ?></td>
                        <td class="text-center"><?php echo $fetchdata['tgl_beli']; ?></td>
                        <td class="text-center"><?php echo $fetchdata['kondisi_barang']." %";  ?></td>
                        <td class="text-center"><?php echo $row['status_stok']; ?></td>
                        <td class="text-center">
                        <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>index.php/barang/ubah/<?php echo $fetchdata['kode_barang'];?>" data-placement="top" data-toggle="tooltip" title="Ubah"><span class="glyphicon glyphicon-pencil"></span></a>
                        <button class="btnDelete btn btn-danger btn-xs" href="" data-placement="top" data-toggle="tooltip" title="Hapus"><span class="glyphicon glyphicon-trash"></span></button>
                        <a onclick="open_container()" class="btn btn-success btn-xs"><i class="fa fa-book"></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Unit</th>
                        <th>Nama Barang</th>
                        <th class="text-center">UI / VO</th>
                        <th class="text-center">Kondisi</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            <!--/table-collapse -->
              <!-- start: Delete Coupon Modal -->
              <div class="modal modal-primary fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                               <h3 class="modal-title" id="myModalLabel">Konfirmasi Hapus</h3>
                          </div>
                          <div class="modal-body">                               
                               <h4><span class="glyphicon glyphicon-warning-sign">&nbsp;</span> Apakah anda yakin ingin menghapus data tersebut ?</h4>
                          </div>
                          <!--/modal-body-collapse -->
                          <div class="modal-footer">
                              <button type="button" class="btn btn-outline" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                              <button type="button" class="btn btn-outline" id="btnDelteYes" href="#"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                          </div>
                          <!--/modal-footer-collapse -->
                      </div>
                      <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

          <!-- Modal form-->
                <div class="modal fade modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Daftar Barang</h4>
                      </div>
                      <div class="modal-body" id="modalbodyku">
                      <div class="row">
                        <!-- form start -->
                        <form class="form-horizontal">
                          <div class="col-md-12">
                                <div class="box-body">
                                <div class="form-group">
                                    <label for="inputUnit" class="col-sm-3 control-label">Divisi</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" readonly=""/>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="inputUnit" class="col-sm-3 control-label">Unit</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" readonly=""/>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputKodeBarang" class="col-sm-3 control-label">Kode Barang</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" readonly=""/>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputNamaBarang" class="col-sm-3 control-label">Nama Barang</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" readonly=""/>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputTanggalBeli" class="col-sm-3 control-label">Tanggal beli</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" readonly=""/>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputDeskripsi" class="col-sm-3 control-label">Deskripsi</label>
                                    <div class="col-sm-8">
                                      <textarea class="form-control" rows="3" readonly=""></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputTanggalBeli" class="col-sm-3 control-label">Kondisi barang</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" readonly=""/>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputTanggalBeli" class="col-sm-3 control-label">Status Stock</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" readonly=""/>
                                    </div>
                                  </div>
                                </div><!-- /.box-body -->              
                          </div><!-- /.col -->
                          </form>
                      </div><!-- /.row -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end of modal -->
          </div>
        </section>  
</div>        
<script type="text/javascript">
$('button.btnDelete').on('click', function (e) {
    e.preventDefault();
    var id = $(this).closest('tr').data('id');
    //$('#validasi').html(id);
    $('#deleteModal').data('id', id).modal('show');

});

$('#btnDelteYes').click(function () {
    var id = $('#deleteModal').data('id');
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url();?>index.php/barang/hapus/'+id
    }).done(function(data){
      $('#message').html(data);
    });
    $('[data-id=' + id + ']').remove();
    $('#deleteModal').modal('hide');
});
</script>

<script type="text/javascript">
function open_container()
{
  $('#myModal').modal('show');
}
</script>