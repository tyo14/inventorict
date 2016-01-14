<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Divisi
            <small>Data - Data Divisi</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>  
            <li class="active">Daftar Divisi</li>
          </ol>
        </section>
        <section class="content-header">
          <a href="<?php echo base_url(); ?>index.php/devisi/tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah data</a>
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
                        <th>No.</th>
                        <th>Kode Divisi</th>
                        <th>Nama Divisi</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 0;
                    foreach ($devisi as $fetchdata) {
                      $no++;
                    ?>
                      <tr class="btnDelete" data-id="<?php echo $fetchdata['kode_divisi'];?>">
                        <td><?php echo $no; ?></td>
                        <td><?php echo $fetchdata['kode_divisi']; ?></td>
                        <td><?php echo $fetchdata['nama_divisi']; ?></td>
                        <td class="text-center"><a href="<?php echo base_url();?>index.php/devisi/ubah/<?php echo $fetchdata['kode_divisi'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                        <button class="btnDelete" href="">delete</button></td>                        
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Kode Divisi</th>
                        <th>Nama Divisi</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!--/table-collapse -->
              <!-- start: Delete Coupon Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                               <h3 class="modal-title" id="myModalLabel">Perhatian !</h3>

                          </div>
                          <div class="modal-body">
                               <h4> Apa kamu yakin ingin menghapus ?</h4>

                          </div>
                          <!--/modal-body-collapse -->
                          <div class="modal-footer">
                              <button type="button" class="btn btn-danger" id="btnDelteYes" href="#">Yes</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
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
    $('#myModal').data('id', id).modal('show');
});

$('#btnDelteYes').click(function () {
    var id = $('#myModal').data('id');
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url();?>index.php/devisi/hapus/'+id
    }).done(function(data){
      $('#message').html(data);
    });
    $('[data-id=' + id + ']').remove();
    $('#myModal').modal('hide');
});
</script>