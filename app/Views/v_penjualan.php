<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penjualan - Kasir JMK48</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('public/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="<?= base_url('public/AdminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public/AdminLTE/dist/css/adminlte.min.css') ?>">

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('public/AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('public/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('public/AdminLTE/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('public/AdminLTE/dist/js/adminlte.min.js') ?>"></script>

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url('public/AdminLTE/dist/img/jmk48.jpg') ?>" class="navbar-brand">
                    <img src="<?= base_url('public/AdminLTE/dist/img/jmk48.jpg') ?>" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light" style="font-size: 1.5rem; font-weight: 600;"> <i
                            class="fas fa-shopping-cart text-primary"></i> <b>Penjualan</b></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php if (session()->get('level') == '1') { ?>
                            <a class="nav-link" href="<?= base_url('public/admin') ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        <?php } else { ?>
                            <a class="nav-link" href="<?= base_url('public/home/LogOut') ?>">
                                <i class="fas fa-sign-out-alt"></i>Log Out
                            </a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                <div class="row">

                    <div class="col-lg-7">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>No Faktur</label>
                                            <label
                                                class="form-control form-control-lg text-danger"><?= $no_faktur ?></label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <label class="form-control form-control-lg"><?= date('d M Y') ?></label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Jam</label>
                                            <label class="form-control form-control-lg" id="jam"></label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Nama Kasir</label>
                                            <label
                                                class="form-control form-control-lg text-primary"><?= session()->get('nama_user') ?></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0"></h5>
                            </div>
                            <div class="card-body bg-black collor-palette text-right">
                                <h1 class="display-4 text-green" style="font-weight: 600;">Rp 0</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input name="kode_produk" id="kode_produk" class="form-control"
                                                placeholder="Barcode/Kode Produk">
                                            <div class="input-group-append">
                                                <button id="btn-search" class="btn btn-primary btn-flat" type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <button id="btn-clear" class="btn btn-danger btn-flat" type="button">
                                                    <i class="fas fa-times"></i>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <input name="nama_produk" class="form-control" placeholder="Nama Produk">
                                    </div>
                                    <div class="col-1">
                                        <input name="nama_kategori" class="form-control" placeholder="Kategori">
                                    </div>
                                    <div class="col-1">
                                        <input name="nama_satuan" class="form-control" placeholder="Satuan">
                                    </div>
                                    <div class="col-1">
                                        <input name="harga_jual" class="form-control" placeholder="Harga">
                                    </div>
                                    <div class="col-1">
                                        <input id="qty" type="number" min="1" name="qty" class="form-control"
                                            placeholder="QTY">
                                    </div>

                                    <div class="row">
                                        <div class="col-1">
                                            <button id="btn-add" class="btn btn-flat btn-primary">
                                                <i class="fas fa-cart-plus"></i> Add
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-1">
                                            <button class="btn btn-flat btn-warning"><i
                                                    class="fas fa-sync">Clear</i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Kode/Barcode</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Harga Jual</th>
                                    <th width="100px">Qty</th>
                                    <th>Total Harga</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="cart-body">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"></td>
                                    <td class="text-center"></td>
                                    <td class="text-right"></td>
                                    <td class="text-center">
                                        <button class="btn btn-danger btn-sm"
                                            onclick="DeleteCart('${item.kode_produk}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body bg-black text-right">

                                <h1 class="display-4 text-green mb-3" id="grand-total">Rp 0</h1>

                                <input type="number" id="dibayar" class="form-control form-control-lg mb-2"
                                    placeholder="Jumlah Dibayar">

                                <input type="text" id="kembalian" class="form-control form-control-lg mb-2"
                                    placeholder="Kembalian" readonly>

                                <button type="submit" id="btn-bayar" class="btn btn-success btn-lg btn-block" disabled>
                                    <i class="fas fa-cash-register"></i> BAYAR
                                </button>


                            </div>
                        </div>
                    </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->


    <script>
        $(document).ready(function () {

            // Enter dari barcode
            $('#kode_produk').keydown(function (e) {
                if (e.keyCode == 13) {
                    e.preventDefault();
                    CekProduk();
                }
            });

            // Klik search
            $('#btn-search').click(function () {
                CekProduk();
            });

            // Klik clear
            $('#btn-clear').click(function () {
                ClearProduk();
            });

        });

        function CekProduk() {
            let kode = $('#kode_produk').val();

            if (kode == '') {
                Swal.fire('Kode produk belum diisi!');
                return;
            }

            $.ajax({
                type: "POST",
                url: "<?= base_url('public/penjualan/CekProduk') ?>",
                data: {
                    kode_produk: kode
                },
                dataType: "JSON",
                success: function (response) {
                    if (!response || response.nama_produk == '') {
                        Swal.fire('Produk tidak ditemukan!');
                        ClearProduk();
                    } else {
                        $('[name="nama_produk"]').val(response.nama_produk);
                        $('[name="nama_kategori"]').val(response.nama_kategori);
                        $('[name="nama_satuan"]').val(response.nama_satuan);
                        $('[name="harga_jual"]').val(response.harga_jual);
                        $('#qty').val(1).focus();
                    }
                }
            });
        }

        function ClearProduk() {
            $('#kode_produk').val('').focus();
            $('[name="nama_produk"]').val('');
            $('[name="nama_kategori"]').val('');
            $('[name="nama_satuan"]').val('');
            $('[name="harga_jual"]').val('');
            $('#qty').val('');
        }
    </script>


    <script>
        window.onload = function () {
            startTime();
        }

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
            var t = setTimeout(function () {
                startTime();
            }, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }
            return i;
        }
    </script>

    <script>
        $('#btn-add').click(function () {
            AddCart();
        });

        function AddCart() {
            let kode = $('#kode_produk').val();
            let qty = $('#qty').val();

            if (kode == '' || qty == '' || qty <= 0) {
                Swal.fire('Kode & Qty wajib diisi!');
                return;
            }

            $.ajax({
                type: "POST",
                url: "<?= base_url('public/penjualan/AddCart') ?>",
                data: {
                    kode_produk: kode,
                    qty: qty
                },
                dataType: "JSON",
                success: function (response) {
                    if (response.error) {
                        Swal.fire(response.error);
                    } else {
                        renderCart(response.cart);
                        ClearProduk();
                    }
                }
            });
        }


    </script>
    <script>
        let grandTotal = 0;

        function renderCart(cart) {
            let html = '';
            grandTotal = 0;

            cart.forEach(item => {
                grandTotal += item.total;

                html += `
        <tr>
            <td>${item.kode_produk}</td>
            <td>${item.nama_produk}</td>
            <td>${item.kategori}</td>
            <td class="text-right">Rp ${item.harga_jual.toLocaleString()}</td>
            <td class="text-center">${item.qty}</td>
            <td class="text-right">Rp ${item.total.toLocaleString()}</td>
            <td class="text-center">
                <button class="btn btn-danger btn-sm"
                    onclick="DeleteCart('${item.kode_produk}')">
                    <i class="fa fa-times"></i>
                </button>
            </td>
        </tr>`;
            });

            $('#cart-body').html(html);
            $('#grand-total').text('Rp ' + grandTotal.toLocaleString());

            hitungKembalian();
        }
    </script>

    <script>
    const cartSession = <?= json_encode($cart ?? []) ?>;
        if (cartSession.length > 0) {
            renderCart(cartSession);
        }
    </script>


    <script>
        $('#dibayar').on('input', function () {
            hitungKembalian();
        });

        function hitungKembalian() {
            let dibayar = parseInt($('#dibayar').val()) || 0;
            let kembali = dibayar - grandTotal;

            if (kembali >= 0 && grandTotal > 0) {
                $('#kembalian').val('Rp ' + kembali.toLocaleString());
                $('#btn-bayar').prop('disabled', false);
            } else {
                $('#kembalian').val('Rp 0');
                $('#btn-bayar').prop('disabled', true);
            }
        }
    </script>


    <script>
        function DeleteCart(kode_produk) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('pulic/penjualan/DeleteCart') ?>",
                data: {
                    kode_produk: kode_produk
                },
                dataType: "JSON",
                success: function (response) {
                    renderCart(response.cart);
                }
            });
        }
    </script>

    <script>
        $('#btn-bayar').click(function () {
            $.ajax({
                type: "POST",
                url: "<?= base_url('public/penjualan/Bayar') ?>",
                data: { dibayar: $('#dibayar').val() },
                dataType: "JSON",
                success: function (res) {
                    if (!res.success) {
                        Swal.fire(res.error);
                        return;
                    }

                    let html = `
                <p>No Faktur: <b>${res.no_faktur}</b></p>
                <hr>
            `;

                    res.cart.forEach(item => {
                        html += `
                    ${item.nama_produk} (${item.qty})<br>
                    Rp ${item.total.toLocaleString()}<hr>
                `;
                    });

                    html += `
                <b>Total:</b> Rp ${res.total.toLocaleString()}<br>
                <b>Dibayar:</b> Rp ${res.dibayar.toLocaleString()}<br>
                <b>Kembalian:</b> Rp ${res.kembalian.toLocaleString()}
            `;

                    $('#struk-body').html(html);
                    $('#modalStruk').modal('show');
                }
            });
        });

        function closeStruk() {
            $('#modalStruk').modal('hide');
            location.reload();
        }


    </script>


    <div class="modal fade" id="modalStruk">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Struk Pembayaran</h5>
                </div>
                <div class="modal-body" id="struk-body"></div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-block" onclick="closeStruk()">Tutup</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>