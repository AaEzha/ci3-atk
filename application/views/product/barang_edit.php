<div class="card shadow bg-white mb-4">

    <div class="pull-right d-flex justify-content-between mb-4 card-header py-3">
        <h6 class="mb-4 justify">Edit Data</h6 justify-content-end>

        <a href="<?= site_url('barang') ?>" class="btn btn-warning btn-flat  py-2 ">
            <i class="fas fa-undo"></i>
            back
        </a>
    </div>

    <div class="form mb-5">
        <div class="row">
            <div class="col-md-6 offset-md-3  ">
                <form action="" method="post">

                    <!-- kode klasifikasi -->
                    <div class="form-group ">
                        <label for="nama">Kode Klasifikasi * </label>
                        <input type="text" name="jenis_barang" class="form-control" value="<?= $row->jenis_barang_id; ?> " id="klasifikasi">
                        <?= form_error('jenis_barang_id'); ?>
                    </div>

                    <div class="form-group ">
                        <label for="nama">Kode Barang * </label>
                        <input type="hidden" value="<?= $row->barang_id; ?>" name="id">
                        <input type="number" value="<?= $row->barang_id; ?>" name="barang_id" class="form-control" required>


                    </div>

                    <div class="form-group ">
                        <label for="nama">barang_id * </label>
                        <input type="text" name="barang_id" class="form-control" value="<?= $row->barang_id ?>">
                        <?= form_error('barang_id'); ?>
                    </div>
                    <div class="form-group ">
                        <label for="name">Nama barang * </label>
                        <input type="text" name="nama_barang" class="form-control" value="<?= $row->nama_barang; ?>" required>
                    </div>
                    <!-- <div class="form-group">

                        <label for="jenis_barang">
                            Jenis_barang *
                        </label>
                        <select name="jenis_barang" id="jenis_barang" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ($jenis_barang->result() as $key => $data) : ?>
                                <option value="<?= $data->jenis_barang_id ?>" <?= $data->jenis_barang_id == $row->jenis_barang_id ? 'selected' : null ?>><?= $data->name ?></option>

                            <?php endforeach; ?>

                        </select>
                    </div> -->
                    <div class="form-group">

                        <label for="satuan">
                            Satuan *
                        </label>
                        <select name="satuan" id="satuan" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ($satuan->result() as $key => $data) : ?>
                                <option value="<?= $data->satuan_id ?>" <?= $data->satuan_id == $row->satuan_id ? 'selected' : null ?>><?= $data->name ?></option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Foto</label>
                        <?php if($row->gambar != null) { ?>
                            <div style="margin-bottom:5px">
                            <img src="<?= base_url('assets/img/' .$row->gambar)?>" style="width:100px">
                            </div>
                        <?php } ?>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
                        <small>(biarkan kosong jika tidak <?=$page == 'edit' ? 'diganti' : 'ada'?>)</small>
                        </div>

                    <button type="submit" class=" btn btn-success ml-auto" name="edit">
                        Simpan
                    </button>
                    <button class="btn btn-primary ml-2" type="reset">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>


