<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Laporan Harian</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9 input-group">
                        <input type="date" id="tgl" class="form-control">

                        <div class="input-group-append">
                            <button type="button"
                                    class="btn btn-primary"
                                    onclick="ViewTabelLaporan()">
                                <i class="fas fa-file-alt"></i> View
                            </button>

                            <button type="button"
                                    class="btn btn-danger"
                                    onclick="PrintLaporan()">
                                <i class="fas fa-print"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="tabel"></div>
    </div>
</div>



<script>
function ViewTabelLaporan() {
    $.ajax({
        type: "POST",
        url: "<?= base_url('view-laporan-harian') ?>",
        data: {
            tgl: $('#tgl').val(),
        },
        dataType: "json",
        success: function (response) {
            if (response.data) {
                $('.tabel').html(response.data);
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
}
</script>
