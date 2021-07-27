<style>
	.box {
		width: 100%;
		max-width: 650px;
		margin: 0 auto;
	}

	.typeahead,
	.tt-query,
	.tt-hint {
		width: 506px;
		height: 40px;
		padding: 8px 12px;
		font-size: 24px;
		line-height: 30px;
		/* border: 2px solid #ccc; */
		-webkit-border-radius: 8px;
		-moz-border-radius: 8px;
		border-radius: 5px;
		outline: none;
	}


	table,
	thead,
	tr,
	th {
		text-align: center;
	}
</style>

<div class="row">
	<div class="col-lg-12">
		<!-- Default Card Example -->
		<div class="card shadow mb-4">
			<div class="card-header">
				Pencarian Barang
				<div class="float-right">
					<a href="<?= site_url('dashboard') ?>" class="btn btn-warning btn-flat  py-2 ">
						<i class="fas fa-undo"></i>
						back
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="form">
					<div class="row">
						<div class="col-md-12">
							<form action="<?= site_url('transaksi/process') ?>" method="post">
								<div class="form-group">
									<input type="hidden" value="<?= $row->id_transaksi; ?>" name="id">
									<input type="hidden" name="user_id" class="form-control" value="<?= $this->fungsi->user_login()->user_id ?>">
								</div>

								<div class="form-group row nama-barang">
									<label for="name" class="col-sm-4 col-form-label">Nama Barang</label>
									<div class="col-sm-8" id="prefetch">
										<input type="text" name="nama_barang" class="form-control input-lg typeahead" placeholder="Masukkan nama barang" value="<?= $row->barang_id ?>" required>
									</div>
								</div>
								<div class="form-group row jenis-barang" style="display:none;">
									<label for="name" class="col-sm-4 col-form-label">Jenis Barang</label>
									<div class="col-sm-8" id="prefetch2">
										<input type="text" name="jenis_barang" class="form-control input-lg typeahead-jenis" placeholder="Masukkan Jenis Barang" value="<?= $row->barang_id ?>" required>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="card shadow mb-4">
			<!-- Card Header - Accordion -->
			<div class="card-header">
				List Pengambilan Barang
			</div>
			<!-- Card Content - Collapse -->
			<div class="collapse show" id="collapseCardExample">
				<div class="card-body">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Nama Barang</th>
								<th>Jenis</th>
								<th>Satuan</th>
								<th>Jumlah</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$qty = 0;
							if (!empty($this->cart->contents())) :
								foreach ($this->cart->contents() as $items) :
									$qty += $items['qty'];
							?> <tr>
										<td><?php echo $items['name'] ?></td>
										<td><?php echo $items['jenis'] ?></td>
										<td><?php echo $items['satuan']  ?></td>
										<td>
											<?php echo form_open('transaksi/ubah_qty'); ?>
											<input type="hidden" id="idBarang" name="id" value="<?= $items['id']; ?>">
											<input type="hidden" name="rowid" value="<?= $items['rowid']; ?>">
											<input type="number" class="total" max="500" min="0" value="<?= $items['qty']; ?>" name="qty" size="5">
											<button type="submit" class="btn btn-success btn-sm">
												<i class="fas fa-check"></i>
											</button>
											<?php echo form_close() ?>
										</td>
										<td>
											<a href="<?= site_url("transaksi/delete_cart/{$items['rowid']}") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
												<i class="fas fa-window-close"></i>
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php else : ?>
							<?php endif; ?>
							<tr>
								<th colspan="3">
									Total Pengambilan Barang
								</th>
								<th>
									<?php echo $qty; ?>
								</th>
								<th>
									<a href="javascript:;" onclick="checkOut()" class="btn btn-success btn-flat btn-simpan">Simpan</a>
									<a href="<?php echo site_url('transaksi/cancel') ?>" class="btn btn-danger btn-flat" onclick="return confirm('Apakah Anda yakin ingin membatalkan?')">Cancel</a>
								</th>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Transaksi</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form action="<?= site_url('transaksi/simpan_transaksi') ?>" method="post">
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	var site_url = '<?= site_url() ?>';

	function checkOut() {
		if (!confirm("Apakah Anda yakin untuk menyimpan?")) {
			return false;
		}
		
		let idBarang = $('#idBarang').val();
		if (idBarang == undefined) {
			alert('Barang Harus Diisi!');
		} else {
			window.location.href = `${site_url}transaksi/simpan_transaksi`;
		}
	}

	$(document).ready(function() {



		// pencarian barang
		var sample_data = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			prefetch: '<?php echo base_url(); ?>transaksi/fetch',
			remote: {
				url: '<?php echo base_url(); ?>transaksi/fetch/%QUERY',
				wildcard: '%QUERY'
			}
		});

		$('#prefetch .typeahead').typeahead(null, {
			name: 'sample_data',
			display: 'search',
			source: sample_data,
			limit: 10,
			templates: {
				suggestion: Handlebars.compile(`<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"><img src="../assets/img/{{image}}" class="img-thumbnail" width="48" /></div><div class="col-md-10" style="padding-right:5px; padding-left:5px;">{{name}} - {{jenis_barang}}</div></div>`)
			}
		});
		var $jenis_barang;
		var $satuan;
		var selectedDatum;
		var url;
		$('.typeahead').on('typeahead:selected', function(event, datum) {
			console.log(datum)
			url = `${site_url}transaksi/add_barang/${datum.id}/1`;
			window.location.href = url;
			// $jenis_barang = datum.jenis_barang.name;
			// $satuan = datum.satuan;
			// $('#jenis_barang_id').val($jenis_barang);
			// $('#id_satuan').val($satuan);
			// $('#temp_jenis_barang').val(datum.jenis_barang_id);
			// $('#temp_satuan').val(datum.satuan_id);
		});

		$('.secret').css("display", "none");
	});
</script>

<!--suggestion:handlebars.compile('<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"><img src="gambar_barang/{{gambar}}" class="img-thumbnail" width="48" /> </div><div class="col-md-10" style="[padding-right:5px; padding-left;5px;">{{name}}</div></div>'); -->
