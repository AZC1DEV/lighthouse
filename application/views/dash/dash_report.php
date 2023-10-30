<!DOCTYPE html>

  <head> 
    <title>Lighthouse | DASHBOARDS</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1" >
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?=base_url()?>application/assets/sneat/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?=base_url()?>application/assets/sneat/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?=base_url()?>application/assets/sneat/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?=base_url()?>application/assets/sneat/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?=base_url()?>application/assets/sneat/vendor/libs/apex-charts/apex-charts.css" />
    <script src="<?=base_url()?>application/assets/sneat/vendor/js/helpers.js"></script>
    <script src="<?=base_url()?>application/assets/sneat/js/config.js"></script>

    
    <!-- <link href="<?=base_url()?>application/assets/adminbsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
    <!-- <link href="<?=base_url()?>application/assets/adminbsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" /> -->

    
    <!-- <link href="<?=base_url()?>application/assets/adminbsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet"> -->
    <link href="<?=base_url()?>application/assets/adminbsb/plugins/jquery-datatable/skin/bootstrap/css/datatable.css" rel="stylesheet"> 
    <!-- <link href="<?=base_url()?>application/assets/adminbsb/plugins/jquery-datatable/skin/bootstrap/css/datatable.test.css" rel="stylesheet">  -->

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

        <nav 
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar"
              >
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
                          <h5 class="card-title text-primary">AZC1 DEV Dashboards 👍</h5>
                          <p class="mb-4">
                            <div id="txt"></div>
                          </p>

                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?=base_url()?>application/assets/sneat/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <h5 class="card-header m-0 me-2 pb-3"> WAMAS release (SVMI)</h5>
                        <div style="margin:20px">
                          <canvas id="line_chart" height="150" width="650"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            
                <!-- <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                          <div class="card">
                            <h5 class="card-header">Report WAMAS release (SVMI)   <small class="text-muted">process every day at 9.00</small></h5>
                            <div id="tabel_report_release" class="table-responsive text-nowrap"></div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div> -->

                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                          <div class="card">
                            <h5 class="card-header">Report WAMAS release (SVMI)   <small class="text-muted">process every day at 9.00</small></h5>
                            <div style="margin:20px">
                                <div class="table-responsive text-nowrap">
                                    <table class="table dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>จำนวน</th>
                                                <th>ชื่อไฟล์</th>
                                                <th>วัน เวลา</th>
                                                <th>action</th>
                                             
                                            </tr>
                                        </thead>
                                      
                                        <tbody >
                                          
                                            <!-- <tr>
                                                <td>Michael Bruce</td>
                                                <td>Javascript Developer</td>
                                                <td>Singapore</td>
                                                <td>29</td>
                                                <td>2011/06/27</td>
                                               
                                            </tr> -->
                                            <!-- <tr>
                                                <td>Donna Snider</td>
                                                <td>Customer Support</td>
                                                <td>New York</td>
                                                <td>27</td>
                                                <td><button type="button" class="btn btn-outline-primary" onclick="load('#')">Download</button></td> 
                                           
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- / Content -->
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


    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="<?=base_url()?>application/assets/adminbsb/plugins/jquery-datatable/jquery.dataTables.js"></script>

    <script>

        function load(file_name){
            window.location.href = 'http://122.155.175.226/connect/dosvmi/wamas_release/download/'+file_name;
        }
     
        
        function getChartJs(type,data) {
            var config = null;

            if (type === 'line') {
                config = {
                    type: 'line',
                    data: {
                        labels: data['labels'],
                        datasets: [{
                            label: "จำนวน record",
                            data: data['dash_data'],
                            borderColor: 'rgba(0, 188, 212, 0.75)',
                            backgroundColor: 'rgba(0, 188, 212, 0.3)',
                            pointBorderColor: 'rgba(0, 188, 212, 0)',
                            pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                            pointBorderWidth: 1
                        }, 
                      ]
                    },
                    options: {
                        responsive: true,
                        legend: false
                    }
                }
            }
     
            return config;

        }

        async function fetchData() {
            try {
                var url = $('#base_url').val()+'dash/report/report_wamas_release_data';
                const response = await fetch(url);
          
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
        
                const data = await response.json();
                return data;
            } catch (error) {
              console.error('Fetch error:', error);
              throw error; 
            }
            
        }

        async function report_wamas_release_data() {
          try {
              const data = await fetchData();

              new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line',data['dash']));
              // set_table(data);
              // console.log(data);
              set_data_tabel(data['data']);

          } catch (error) {
              console.error('main error:', error);
          }
        }


        function set_table(data){
          var tbody = '';
          for (let i = 0; i < data['data'].length; i++) {
              tbody +=
                '<tbody>'+
                  '<tr>'+
                      '<th scope="row">'+(i+1)+'</th>'+
                      '<td>'+data['data'][i]['release_wamas_log_count_record']+'</td>'+
                      '<td>'+data['data'][i]['release_wamas_log_file_url']+'</td>'+
                      '<td>'+data['data'][i]['release_wamas_log_datetime']+'</td>'+
                      '<td><button type="button" class="btn btn-outline-primary" onclick="load(\''+data['data'][i]['release_wamas_log_file_url']+'\')">Download</button></td> '+  
                  '</tr>'+
                '</tbody>';
              
          }

          
          table =
            '<table class="table dataTable">'+
              '<thead>'+
                '<tr class="text-nowrap">'+
                    '<th>#</th>'+
                    '<th>จำนวน record</th>'+
                    '<th>ชื่อไฟล์</th>'+
                    '<th>วัน เวลา</th>'+
                    '<th>action</th>'+
                  
                '</tr>'+
              '</thead>'+
                tbody+
            '</table>';

          document.getElementById("tabel_report_release").innerHTML  =  table;
              
        }

        function set_data_tabel(data){
            $('.js-exportable').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                data : data,
                searching: false
          
            });
        }

        report_wamas_release_data()
  
    </script>


  </body>
</html>
