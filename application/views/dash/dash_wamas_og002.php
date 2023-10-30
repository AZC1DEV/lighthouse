<!DOCTYPE html>
<html>

<head>
  <title>Lighthouse | DASHBOARDS</title>
  <meta charset="utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?=base_url()?>application/assets/sneat/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="<?=base_url()?>application/assets/sneat/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?=base_url()?>application/assets/sneat/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?=base_url()?>application/assets/sneat/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="<?=base_url()?>application/assets/sneat/vendor/libs/apex-charts/apex-charts.css" />
  <script src="<?=base_url()?>application/assets/sneat/vendor/js/helpers.js"></script>
  <script src="<?=base_url()?>application/assets/sneat/js/config.js"></script>
  <!-- <link href="<?=base_url()?>application/assets/adminbsb/plugins/jquery-datatable/skin/bootstrap/css/datatable.css" rel="stylesheet"> -->
</head>

<body>
  <input type="hidden" id="base_url" value="<?=base_url()?>">
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="preloader">
        <div class="demo-inline-spacing">
          <div class="spinner-border spinner-border-lg text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </div>
      <span class="flex-grow-1 align-middle">loading...</span>
    </div>
  </div>

  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <div id="menu">
        <?php
        echo $menu;
        ?>
      </div>

      <div class="layout-page">
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
            </div>
            <!-- /Search -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
            </ul>
          </div>
        </nav>

        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                      <div class="card-body">
                        <h5 class="card-title text-primary">AZC1 GPO Dashboards 👍</h5>
                        <p class="mb-4">
                          <div id="txt"></div>
                        </p>
                      </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                      <div class="card-body pb-0 px-0 px-md-4">
                        <img src="<?=base_url()?>application/assets/sneat/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2">Outbound Deliveries Overview (weekly) </h5>
                      <small id='text_chart_obd' class="text-muted"></small>

                    
                    </div>


                          
                    <div class="dropdown">
                      <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="monthselect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="monthselect">
                        <a class="dropdown-item" href="javascript:change_month('2023-09-01');">September</a>
                        <a class="dropdown-item" href="javascript:change_month('2023-10-01');">October</a>
                      </div>

                   
                      <button
                        class="btn btn-sm btn-outline-primary dropdown-toggle"
                        type="button"
                        id="obd_type_customer"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                    
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="obd_type_customer">
                        <a class="dropdown-item" href="javascript:change_customer_type('all');">All</a>
                        <a class="dropdown-item" href="javascript:change_customer_type('customer_only');">Customer Only</a>
                      
                      </div>
                    </div>

                    
                  </div>
                  <div class="card-body">
                    <div id="chart_obd"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 id='text_pie_process' class="m-0 me-2">Current Tota </h5>
                      <small id='text_pie_processs_process_update' class="text-muted"></small>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="pie_processs"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2">Outbound Deliveries Order</h5>
                      <small hidden id="text_table_dailys" class="text-muted">last update</small>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="content_view_obd_order">
                      <iframe id="iframe" src="" height="300px" width="100%"></iframe>
                    </div>
                  </div>
                </div>
              </div>
              <div hidden class="col-md-6 col-lg-6 col-xl-6 order-0 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                      <h5 class="m-0 me-2">Outbound Deliveries Partner</h5>
                      <small id='text_pie_pie_obd_parter' class="text-muted"></small>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="pie_obd_parter"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?=base_url()?>application/assets/sneat/vendor/libs/jquery/jquery.js"></script>
  <script src="<?=base_url()?>application/assets/sneat/vendor/libs/popper/popper.js"></script>
  <script src="<?=base_url()?>application/assets/sneat/vendor/js/bootstrap.js"></script>
  <script src="<?=base_url()?>application/assets/sneat/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?=base_url()?>application/assets/dashboards/js/dash_main.js"></script>
  <script src="<?=base_url()?>application/assets/dashboards/chartjs/Chart.bundle.js"></script>
  <script src="<?=base_url()?>application/assets/sneat/vendor/js/menu.js"></script>
  <script src="<?=base_url()?>application/assets/sneat/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="<?=base_url()?>application/assets/sneat/js/main.js"></script>
  <script src="<?=base_url()?>application/assets/dashboards/chartjs/Chart.bundle.js"></script>
  <script src="<?=base_url()?>application/assets/dashboards/js/apex.js"></script>
  <!-- <script src="<?=base_url()?>application/assets/adminbsb/plugins/jquery-datatable/jquery.dataTables.js"></script> -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="<?=base_url()?>application/assets/dashboards/js/wamas/wamas_obd.js"></script>
</body>

</html>
