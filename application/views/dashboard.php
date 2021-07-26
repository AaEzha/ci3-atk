<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
<?php if ($this->fungsi->user_login()->level == 1) { ?>
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4 ">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pengambilan Barang Hari ini</div>

                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $rows; ?></div>

                </div>
                <div class="col-auto">
                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-md-6 mb-4 ">
    <div class="card border-left-success shadow h-100 py-2">
        <a href="<?= base_url('transaksi') ?>">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Data Pengambilan Barang </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total; ?></div>
                    </div>
                    <div class="col-auto">

                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Conten Row -->
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
           <!-- card header - dropdown -->
           <div class="card-header py-3 d-flex flex-row align-items-center justifiy-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Data Pengambilan Barang</h6>
               <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true">
                       <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- card body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
        </div>
    </div>

    <!-- pie chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
        <!-- card header - dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justifiy-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Divisi</h6>
               <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true">
                       <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- card body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i>Manajemen Pemasaran
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i>Manajemen Kontrak dan Lisensi 
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i>Manajemen Kontrak
                </span>
            </div>
            </div>
        </div>                  
</div>

<?php } ?>
<?php if ($this->fungsi->user_login()->level == 2) { ?>
<h2 class="text-center">Halo <?= $this->fungsi->user_login()->name ?>!</h2>
<h2 class="text-center">Silahkan Input Data Barangnya Disini</h2> 
</br>
<div class="row"> 
    <div class="col-12 text-center">
        <a href="<?= site_url('transaksi/tambah') ?>" class="btn btn-secondary btn-lg"><i class="fas fa-barang-plus"></i> Input Pengambilan Barang</a>
    </div>
</div>
</div>
        <div class="row">
          <img src="<?= base_url('assets/'); ?>img/Checklist.jpg" class="img-fluid" alt="..."> 
        

<?php } ?> 


<!-- Content Row -->

<!-- End of Main Content -->