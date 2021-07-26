<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <?php if ($this->fungsi->user_login()->level == 1) { ?>
                <!-- row satu  -->
                <div class="col-15">
                    <div class="card">
                        <div class="card-header">
                            Data Pengambilan Barang
                        </div>
                        <!--id formfilter adalah nama form untuk filter-->
                        <form id="formfilter">
                            <div class="card-body card-block">
                                <input name="valnilai" type="hidden">
                                <div class="row form-group">
                                    <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">Filter By</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="periode" id="periode" class="form-control form-control-user" title="Pilih Filter">
                                            <option value="">-PILIH-</option>
                                            <option value="tanggal">Tanggal</option>
                                            <option value="nama_barang">Nama Barang</option>
                                            <option value="divisi">Divisi</option>
                                        </select>
                                        <small class="help-block form-text"></small>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">

                                <!--ketika di klik tombol Proses, maka akan mengeksekusi fungsi javascript prosesPeriode() , untuk menampilkan form-->

                                <button id="btnproses" type="button" onclick="prosesPeriode()" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Proses</button>

                                <!--ketika di klik tombol Reset, maka akan mengeksekusi fungsi javascript prosesReset() , untuk menyembunyikan form-->
                                <button onclick="prosesReset()" type="button" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                                <a href="<?php echo site_url('transaksi'); ?>" class="btn btn-sm btn-info"><i class="fa fa-ban"></i> Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- row kedua  -->
                <div class="col-lg-8" id="tanggalfilter" style="display:none">
                    <div class="card">
                        <div class="card-header">
                            Filter by Tanggal
                        </div>
                        <form action="<?php echo site_url(); ?>transaksi" method="POST">
                            <input type="hidden" name="nilaifilter" value="1">

                            <input name="valnilai" type="hidden">
                            <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Dari tanggal</label>
                                    </div>
                                    <div class="col col-md-3">
                                        <input name="tanggalawal" value="" type="date" class="form-control" id="tanggalawal" required="">
                                    </div>
                                    <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Sampai tanggal</label>
                                    </div>
                                    <div class="col col-md-3">
                                        <input name="tanggalakhir" value="" type="date" class="form-control" id="tanggalakhir" required="">
                                    </div>
                                    <div class="col col-md-2">
                                        <button type="submit" name="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                    <small class="help-block form-text"></small>
                                </div>

                            </div>
                            <!--<div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-file-download"></i> print</button>  
                        </div> -->
                        </form>
                    </div>
                </div>

                <!-- row ketiga  -->
                <div class="col-lg-7" id="namabarangfilter" style="display:none">
                    <div class="card">
                        <div class="card-header">
                            Filter by Nama Barang
                        </div>
                        <form action="<?php echo base_url(); ?>transaksi" method="POST">
                            <input type="hidden" name="nilaifilter" value="2">

                            <input name="valnilai" type="hidden">
                            <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Nama Barang</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input name="nama_barang" value="" type="text" class="form-control" placeholder="Inputkan Nama Barang" id="nama_barang" required="">
                                        <small class="help-block form-text"></small>
                                    </div>
                                    <div class="col col-md-2">
                                        <button type="submit" name="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-file-download"></i> print</button>
                        </div> -->
                        </form>
                    </div>
                </div>

                <!-- row keempat  -->
                <div class="col-lg-7" id="divisifilter" style="display:none">
                    <div class="card">
                        <div class="card-header">
                            Filter by divisi
                        </div>
                        <form action="<?php echo site_url(); ?>transaksi" method="POST">
                            <input type="hidden" name="nilaifilter" value="3">

                            <input name="valnilai" type="hidden">
                            <div class="card-body card-block">

                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Divisi</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <input name="divisi" value="" type="text" class="form-control" placeholder="Inputkan Divisi" id="divisi" required="">
                                    </div>
                                    <div class="col col-md-2">
                                        <button type="submit" name="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-file-download"></i> print</button>
                        </div> -->
                        </form>
                    </div>
                </div>


                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <script type="text/javascript">
                    /*digunakan untuk menyembunyikan form tanggal, namabarang dan divisi saat halaman di load */
                    $(document).ready(function() {

                        $("#tanggalfilter").hide();
                        $("#namabarangfilter").hide();
                        $("#divisifilter").hide();
                        $("#cardbayar").hide();

                    });

                    /*digunakan untuk menampilkan form tanggal, namabarang dan divisi*/

                    function prosesPeriode() {
                        var periode = $("[name='periode']").val();

                        if (periode == "tanggal") {
                            $("#btnproses").hide();
                            $("#tanggalfilter").show();
                            $("[name='valnilai']").val('tanggal');

                        } else if (periode == "nama_barang") {
                            $("#btnproses").hide();
                            $("#namabarangfilter").show();
                            $("[name='valnilai']").val('nama_barang');

                        } else if (periode == "divisi") {
                            $("#btnproses").hide();
                            $("#divisifilter").show();
                            $("[name='valnilai']").val('divisi');
                        }
                    }

                    /*digunakan untuk menytembunyikan form tanggal, namabarang dan divisi*/

                    function prosesReset() {
                        $("#btnproses").show();

                        $("#tanggalfilter").hide();
                        $("#namabarangfilter").hide();
                        $("#divisifilter").hide();
                        $("#cardbayar").hide();

                        $("#periode").val('');
                        $("#tanggalawal").val('');
                        $("#tanggalakhir").val('');
                        $("#nama_barang").val('');
                        $("#divisi").val('');
                        $("#targetbayar").empty();

                    }
                </script>
                <?php $this->load->view('script') ?>
        </div>
    </div>
<?php } ?>

<?php if ($this->fungsi->user_login()->level == 2) { ?>
    <div class="col-6">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengambilan Barang</h6>
    </div>
    <div class="col-6 d-flex justify-content-end">
        <a href="<?= base_url('transaksi/tambah') ?>" class="btn btn-primary px-1 py-1"><i class="fas fa-barang-plus"></i> Tambah Transaksi</a>
    </div>
</div>
</div>
<?php } ?>
<div class="card-body">
    <?php $this->view('messages') ?>

    <div class="table-responsive">

        <table id="transaksi" class="table table-bordered" width=" 100%">

            <thead>
                <tr>

                    <th class="th-sm">Username</th>
                    <th>Divisi</th>
                    <th class="th-sm">Nama Barang
                    </th>
                    <th class="th-sm">Volume
                    </th>
                    <th class="th-sm">Satuan
                    </th>
                    <th class="th-sm">Gambar
                    </th>
                    <!--<th class="th-sm">Keterangan
                    </th>-->
                    <th class="th-sm">Tanggal
                    </th>

                    <!--<th class="th-sm">Action
                    </th> -->
                </tr>
            </thead>
            <tbody>

                <?php foreach ($row->result() as $key => $data) : ?>

                    <td class="th-sm">
                        <?= $data->username ?>
                    </td>

                    <td class="th-sm">
                        <?= $data->divisi ?>
                    </td>

                    <td class="th-sm">

                        <?= $data->nama_barang ?>
                    </td>
                    <td class="th-sm">
                        <?= $data->volume ?>
                    </td>
                    <td class="th-sm">
                        <?= $data->satuan_nama ?>
                    </td>
                    <td>
                        <?php if($data->gambar != null) { ?>
                            <img src="<?= base_url('assets/img/' .$data->gambar)?>" style="width:100px">
                        <?php } ?>
                    </td>
                    <!--<td class="th-sm">
                        <?= $data->nama_pengambil ?>
                    </td>-->

                    <td class="th-sm">
                        <?= $data->created ?>
                    </td>


                    <!--<td>

                        <a href="<?= site_url('transaksi/edit/' . $data->id_transaksi) ?>" class="btn btn-sm btn-success">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?')" href="<?= site_url('transaksi/hapus/' . $data->id_transaksi) ?>">
                            <i class="fas fa-trash"></i>
                        </a>

                    </td> -->

                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>

    </div>
</div>
</div>

<script>
    var role = '<?php echo $this->fungsi->user_login()->level ?>',
        doms = role == 1 ? 'LBfrtip' : 'lfrtip';
    $(document).ready(function() {
        $('#transaksi').DataTable({

            "order": [
                [5, "asc"]
            ],
            dom: doms,
            buttons: [
                'excel', 'csv', 'pdf'
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
    });
</script>