<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My-Kasir JMK48 | <?= $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public/AdminLTE/dist/css/adminlte.min.css') ?>">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <b>
                            <i class="fas fa-shopping-cart"></i> My-Kasir JMK48
                            
                        </b>
                    </h2>
                </div>
                <div class="col-12">
                    <label><?= $judul ?></label>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->

            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <?php if ($page) {
                    echo view($page);
                }?>
            </div>
            <!-- /.row -->

            
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>