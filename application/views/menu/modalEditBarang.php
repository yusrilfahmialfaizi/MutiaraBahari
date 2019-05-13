	<form action="<?php echo base_url().'admin/tambahBarang'?>" method="post">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group form-group-default">
					<label>Kode Barang</label>
					<input id="id" name="id" type="text" class="form-control" readonly="readonly">
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group form-group-default">
					<label>Nama Barang</label>
					<input id="namabarang" name="nama_barang" type="text" class="form-control" placeholder="Nama Barang ....." required="required">
				</div>
			</div>
			<div class="col-md-6 pr-0">
				<div class="form-group form-group-default">
					<label>Harga Rp.</label>
					<input id="hargastn" name="harga" type="number" min="0" class="form-control" placeholder="Harga ..." required="required">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group form-group-default">
					<label>Stok</label>
					<input id="stokbarang" name="stok" type="number" min="0" class="form-control" placeholder="Jumlah Stok" required="required">
				</div>
			</div>
		</div>
	</form>