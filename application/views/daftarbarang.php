<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Daftar Barang</h2>
	<form method="post" action="<?php echo base_url();?>index.php/dashboard/insertapply">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Unit</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Insert Unit">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Kode Barang</label>
	    <input type="text" name="Kode_Barang" class="form-control" id="exampleInputPassword1" placeholder="Insert Item Code">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Tanggal Beli</label>
	    <input type="text" name="Tgl_Beli" class="form-control" id="exampleInputEmail1" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Nama Barang</label>
	    <input type="text" name="Nama_Barang" class="form-control" id="exampleInputPassword1" placeholder="Insert Item Name">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Diskripsi</label>
	    <textarea type="text" name="Diskripsi" class="form-control" rows="3"></textarea>
	  </div>
	  <button type="submit" class="btn btn-default">Cancel</button>
	  <button type="submit" class="btn btn-default">Simpan</button>
	</form>