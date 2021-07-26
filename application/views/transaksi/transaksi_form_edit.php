<style>
    .box {
        width: 100%;
        max-width: 650px;
        margin: 0 auto;
    }

    .typeahead,
    .tt-query,
    .tt-hint {
        /* width: 396px; */
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



<div class="card shadow bg-white mb-4">

    <div class="pull-right d-flex justify-content-between mb-4 card-header py-3">
        <h6 class="mb-4 justify">Pengambilan Barang</h6 justify-content-end>
    </div>

    <div class="form mb-5">
        <div class="row">
            <div class="col-md-6 offset-md-3  ">
                <form action="<?= site_url('transaksi/process') ?>" method="post">
                    <div class="form-group ">
                        <!-- <label for="name">Username * </label> -->
                        <input type="hidden" value="<?= $row->id_transaksi; ?>" name="id">
                        <input type="hidden" name="user_id" class="form-control" value="<?= $this->fungsi->user_login()->user_id ?>">
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nama Pengambil </label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama pengambil" value="<?= $row->nama_pengambil ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nama Barang</label>
                        <div class="col-sm-9" id="prefetch">
                            <input type="text" name="nama_barang" class="form-control typeahead" placeholder="Masukkan nama barang" value="<?= $row->barang_id ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenisbarang" class="col-sm-3 col-form-label">Jenis Barang</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control technical_unit_id" id="jenis_barang_id" name="jenis_barang_display" placeholder="Jenis barang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="satuan" class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control company_id" id="id_satuan" name="satuan_display" placeholder="Satuan">
                        </div>
                    </div>
                    <div class="form-group row secret">
                        <label for="jenisbarang" class="col-sm-3 col-form-label">Jenis Barang</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control company_id" id="temp_jenis_barang" name="jenis_barang" placeholder="Jenis Barang">
                        </div>
                    </div>
                    <div class="form-group row secret">
                        <label for="satuan" class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control company_id" id="temp_satuan" name="satuan" placeholder="Satuan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Jumlah Barang* </label>
                        <div class="col-sm-9">
                            <input type="text" name="jumlah" class="form-control" placeholder="Masukkan jumlah barang" value="<?= $row->volume ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Tanggal* </label>
                        <div class="col-sm-9">
                            <input type="date" name="created" class="form-control" value="<?= $row->transaksi_created ?>" required>
                        </div>
                    </div>


                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class=" btn btn-primary ml-auto" name="<?= $page ?>">Simpan</button>
                        <button class="btn btn-danger ml-2" type="reset">Reset</button>
                    </div>

                </form>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <input type="hidden" value="<?= $row->id_transaksi; ?>" name="id">
                                <input type="hidden" name="user_id" class="form-control" value="<?= $this->fungsi->user_login()->user_id ?>">
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Nama Pengambil </label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama pengambil" value="<?= $row->nama_pengambil ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Tanggal* </label>
                                <div class="col-sm-9">
                                    <input type="date" name="created" class="form-control" value="<?= $row->transaksi_created ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>

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
    function checkOut() {
        let idBarang = $('#idBarang').val();
        if (idBarang == undefined) {
            alert('Barang Harus Diisi!');
        } else {
            $('#modal-default').modal("show");
        }
    }

    var site_url = '<?= site_url() ?>';
    $(document).ready(function() {
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
            display: 'name',
            source: sample_data,
            limit: 10,
            templates: {
                suggestion: Handlebars.compile(`<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"><img src="../assets/img/{{image}}" class="img-thumbnail" width="48" /></div><div class="col-md-10" style="padding-right:5px; padding-left:5px;">{{name}}</div></div>`)
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