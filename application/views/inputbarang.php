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
              <form class="form-horizontal">
                <div class="col-md-7">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="inputUnit" class="col-sm-3 control-label">Unit</label>
                          <div class="col-sm-8">
                            <select class="form-control select2" style="width: 100%;">
                              <option selected="selected">Alabama</option>
                              <option>Alaska</option>
                              <option>California</option>
                              <option>Delaware</option>
                              <option>Tennessee</option>
                              <option>Texas</option>
                              <option>Washington</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputKodeBarang" class="col-sm-3 control-label">Kode Barang</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Kode Barang" disabled="">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputTanggalBeli" class="col-sm-3 control-label">VI/VU(Tanggal beli)</label>
                          <div class="col-sm-8">
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                            </div><!-- /.input group -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputNamaBarang" class="col-sm-3 control-label">Nama Barang</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Nama Barang">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputDeskripsi" class="col-sm-3 control-label">Deskripsi</label>
                          <div class="col-sm-8">
                            <textarea class="form-control" rows="3" placeholder="Deskripsi barang"></textarea>
                          </div>
                        </div>
                      </div><!-- /.box-body -->              
                </div><!-- /.col -->
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="inputKodeBarang" class="col-sm-4 control-label">Kondisi Barang</label>
                    <div class="col-sm-6">
                      <input type="number" class="form-control" max="100" min="0" placeholder="0">
                      <small>* % Health</small>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputKodeBarang" class="col-sm-4 control-label">Status Stok</label>
                    <div class="col-sm-6">
                      <div class="radio">
                        <label>
                          <input name="optionsRadios" id="optionsRadios1" value="used" checked="" type="radio">
                          Used
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="optionsRadios" id="optionsRadios1" value="not used" checked="" type="radio">
                          Not used
                        </label>
                      </div>
                    </div>
                  </div>
                </div><!-- /.col -->
              </form>
              </div><!-- /.row -->
            </div><!-- /.box-body -->
            <div class="box-footer">
              Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about the plugin.
            </div>
          </div><!-- /.box -->
        </section>  
        
</div>        