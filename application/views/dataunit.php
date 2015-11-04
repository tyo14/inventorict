<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Data Unit</h2>
	<form method="post" action="<?php echo base_url();?>index.php/dashboard/insertunit">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Kode Unit</label>
	    <input type="text" name="Kode_Unit" class="form-control" placeholder="Insert Unit Code">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Nama Unit</label>
	    <input type="text" name="Nama_Unit" class="form-control" placeholder="Insert Unit Name">
	  </div>
	  <input type="submit" name="simpan" class="btn btn-default" value="Simpan"/>
	  <button type="submit" class="btn btn-default">Cancel</button>
	</form>
	  