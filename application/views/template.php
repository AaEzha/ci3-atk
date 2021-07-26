<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>
    <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>">




    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>DataTables/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>DataTables/Bootstrap4/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/') ?>DataTables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/') ?>DataTables/Buttons/css/buttons.bootstrap4.min.css" />

    <!-- jquery autocomplete UI -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css" /> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
 <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
 <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />

    <!-- daterangepicker -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>daterangepicker/daterangepicker.css" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="<?= base_url('dashboard') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user"></i>
                </div>
                <!-- <div class="sidebar-brand-text mx-3"><?= $this->fungsi->user_login()->level == 1 ? "ADMIN" : "Pegawai";  ?> </div> -->

                <div class="sidebar-brand-text mx-3"> SNAPPY Pusyantek </div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 mb-2">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>




            <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-archive"></i>
                    <span>Manajemen Data Barang</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="<?= site_url('jenis_barang') ?>">Jenis Barang</a>
                        <a class="collapse-item" href="<?= site_url('satuan') ?>">Satuan Barang</a>
                        <a class="collapse-item" href="<?= site_url('barang') ?>">Barang</a>
                        <!--<a class="collapse-item" href="<?= site_url('import') ?>">Import</a> -->
                    </div>
                </div>
            </li>
            <!--<li class="nav-item">
                    <a class="nav-link" href="<?= site_url('data_pengambilan_barang') ?>">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Manajemen Data Pengambilan Barang</span></a>
                </li> -->
            <?php } ?>
            <!-- Nav Item - Transaction Collapse Menu -->
            <!--<?php if ($this->fungsi->user_login()->level == 2) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('transaksi') ?>">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Catatan Pengambilan Barang</span></a>
            </li>
            <?php } ?> -->

            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('transaksi') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Data Pengambilan Barang</span></a>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
                    <i class="fas fa-chart-pie"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseReports" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="utilities-color.html">Sales</a>
                        <a class="collapse-item" href="utilities-border.html">Stock In</a>
                        <a class="collapse-item" href="utilities-animation.html">Stock Out</a>

                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if ($this->session->userdata('level') == 1) { ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Pengaturan
            </div>

            <!-- Nav Item - Users -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('user') ?>">
                    <i class="fas fa-user"></i>
                    <span>Manajemen User</span></a>
            </li>

            <?php } ?>
            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>


                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->fungsi->user_login()->name; ?></span>
                                <i class="fas fa-user"></i>
                            </a>
                            <!-- Dropdown - User Informationx` -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!--<a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a> -->

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->



                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <?= $contents; ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Pusyantek BPPT 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

    <script type="text/javascript" src="<?= base_url('assets/') ?>DataTables/datatables.min.js"></script>
    
    <script type="text/javascript" src="<?= base_url('assets/') ?>DataTables/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>DataTables/Buttons/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>DataTables/Buttons/js/buttons.bootstrap4.min.js">
    </script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>DataTables/JSZip/jszip.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>DataTables/pdfmake/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>DataTables/pdfmake/vfs_fonts.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>DataTables/Buttons/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>DataTables/Buttons/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>DataTables/Buttons/js/buttons.colVis.min.js"></script>




    <script>
        $(document).ready(function() {
            $('#dtBasicExample').DataTable({


            });
            $('.dataTables_length').addClass('bs-select');

            //transaksi

          

        });
    </script>
    
    <script type="text/javascript">
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Manajemen Pemasaran", "Manajemen Kontrak dan Lisensi ", "Manajemen Kontrak"],
    datasets: [{
      data: [55, 30, 15],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
}); </script>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih <b> logout</b> untuk keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= site_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
