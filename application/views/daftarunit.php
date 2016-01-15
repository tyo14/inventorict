<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Unit
            <small>Data - Data Unit</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Daftar Unit</li>
          </ol>
        </section>
        <section class="content-header">
          <a href="<?php echo base_url(); ?>index.php/unit/tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah data</a>
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
                        <th>Kode Unit</th>
                        <th>Nama Unit</th>
                        <th>Kategori</th>
                        <th>Divisi</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach ($unit as $unitdata) {

                      list($kodekategori,$urutan) = explode('-', $unitdata['kode_kategori']);

                      $divisi = $this->global_model->find_by('divisi',array('kode_divisi' => $kodekategori));
                      $kategori = $this->global_model->find_by('kategori',array('kode_kategori' => $unitdata['kode_kategori']));
                      ?>
                      <tr class="btnDelete" data-id="<?php echo $unitdata['kode_unit'];?>">                        
                        <td><?php echo $unitdata['kode_unit'];?></td>
                        <td><?php echo $unitdata['nama_unit'];?></td>
                        <td><?php echo $kategori['nama_kategori'];?></td>
                        <td><?php echo $divisi['nama_divisi'];?></td>
                        <td class="text-center">
                          <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>index.php/unit/ubah/<?php echo $unitdata['kode_unit'];?>" data-placement="top" data-toggle="tooltip" title="Ubah"><span class="glyphicon glyphicon-pencil"></span></a>
                          <button class="btnDelete btn btn-danger btn-xs" href="" data-placement="top" data-toggle="tooltip" title="Hapus"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                      </tr>
                      <?php }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Kode Unit</th>
                        <th>Nama Unit</th>
                        <th>Kategori</th>
                        <th>Divisi</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              <!--/table-collapse -->
              <!-- start: Delete Coupon Modal -->
              <div class="modal modal-primary fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

            </div>
          </div>
        </section>  
</div>        
<script type="text/javascript">
$('button.btnDelete').on('click', function (e) {
    e.preventDefault();
    var id = $(this).closest('tr').data('id');
    //$('#validasi').html(id);
    $('#myModal').data('id', id).modal('show');

});

$('#btnDelteYes').click(function () {
    var id = $('#myModal').data('id');
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url();?>index.php/unit/hapus/'+id
    }).done(function(data){
      $('#message').html(data);
    });
    $('[data-id=' + id + ']').remove();
    $('#myModal').modal('hide');
});
</script>