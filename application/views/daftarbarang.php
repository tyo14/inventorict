<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Daftar Barang</h2>
<<<<<<< HEAD
	<form method="post" action="<?php echo base_url();?>index.php/dashboard/insertapply">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Unit</label>
	    <select class="form-control">
	    	<?php foreach ($kodeunit as $row) { ?>
		  <option value="<?php echo $row['Kode_Unit'];?>"><?php echo $row['Kode_Unit'];?></option>
		  <?php } ?>
		</select>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Kode Barang</label>
	    <input type="text" name="Kode_Barang" class="form-control" placeholder="Insert Item Code">
	  </div>
	  <div class="form-group date">
	    <label>Tanggal Beli</label>
	    <input type="date" name="Tgl_Beli" class="form-control"/>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Nama Barang</label>
	    <input type="text" name="Nama_Barang" class="form-control" placeholder="Insert Item Name">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Diskripsi</label>
	    <textarea type="text" name="Deskripsi" class="form-control" rows="3"></textarea>
	  </div>
	  <input type="submit" name="simpan" class="btn btn-default" value="Simpan" />
	  <button type="submit" class="btn btn-default">Cancel</button>
	</form>
=======
	<form>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Unit</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Insert Unit">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Kode Barang</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Insert Item Code">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Tanggal Beli</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Nama Barang</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Insert Item Name">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Diskripsi</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Discripsion">
	  </div>
>>>>>>> 3b30cc9f0613087d0e245ea12ebb97e6d7f1afe3
