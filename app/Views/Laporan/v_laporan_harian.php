<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Laporan Harian</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group row">
                        <label class="col-sm-2.5 col-form-label">Tanggal :</label>
                        <div class="col-sm-10 input-group">
                            <input type="date" name="tgl" id="tgl" class="form-control" placeholder="Tanggal">
                                <div class="input-group-append">
                                    <button onclick="ViewTabelLaporan()" class="btn btn-primary btn-flat" type="button">
                                        <i class="fas fa-file-alt"></i> view laporan
                                    </button>
                                    <button class="btn btn-danger btn-flat" type="button">
                                        <i class="fas fa-print"></i> print
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
        <div class="col-sm-12">
            <hr>
            <div class="tabel">

            </div>
        </div>
    </div>
</div>    


<script>
    function ViewTabelLaporan() {
        $.ajax({
            type: "post",
            url: "<?= base_url('view-laporan-harian') ?>",
            data: {
                tgl: $('#tgl').val(),
            },
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $('.tabel').html(response.data);
                }
            },
            
        })
    }
</script>