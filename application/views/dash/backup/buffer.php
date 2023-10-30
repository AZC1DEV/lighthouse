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
    <link href="<?=base_url()?>application/assets/adminbsb/plugins/jquery-datatable/skin/bootstrap/css/datatable.css" rel="stylesheet"> 

    <link rel="stylesheet" href="<?=base_url()?>application/assets/sneat/vendor/libs/apex-charts/apex-charts.css" />
    <script src="<?=base_url()?>application/assets/sneat/vendor/js/helpers.js"></script>
    <script src="<?=base_url()?>application/assets/sneat/js/config.js"></script>

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
                          <h5 class="card-title text-primary">AZC1 GPO Dashboards 👍</h5>
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
                

                <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Outbound Deliveries Overview (weekly) </h5>
                        <small id='text_chart_obd' class="text-muted"></small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="monthselect"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="monthselect">
                          <a class="dropdown-item" href="javascript:change_month('2023-09-01');">September</a>
                          <a class="dropdown-item" href="javascript:change_month('2023-10-01');">October</a>
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
                        <h5 id='text_pie_process' class="m-0 me-2">Outbound Deliveries Overview (weekly) </h5>
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
                        <h5 class="m-0 me-2">Outbound Deliveries Partner</h5>
                        <small id='text_pie_pie_obd_parter' class="text-muted"></small>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="pie_obd_parter"></div>
                    </div>
                  </div>
                </div>
               
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Outbound Deliveries Order</h5>
                        <small id="text_table_dailys" class="text-muted">last update : loading</small>
                      </div>
                    </div>
                    <div class="card-body">
                      <!-- <table class="table dataTable js-exportable">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>order</th>
                              <th>no release</th>
                              <th>wamas in process</th>
                              <th>finished</th>
                          </tr>
                        </thead>
                        <tbody >
                        </tbody>
                      </table> -->
                      <div id="tabel_report_release" class="table-responsive text-nowrap"></div>
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

    <script src="<?=base_url()?>application/assets/adminbsb/plugins/jquery-datatable/jquery.dataTables.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>


      
     

        async function fetchData(url) {
            try {
                
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

        async function report_wamas() {
          try {
              var url = $('#base_url').val()+'dash/report/report_wamas_data';
              const data = await fetchData(url);
              // console.log(data);

              pie_processs(data,data['obd_all']['all'].length - 1,'');
           
              pie_obd_parter(data,data['obd_all']['all'].length - 1);



          } catch (error) {
              console.error('main error:', error);
          }
        }

        async function dash_wamas_og002_monthly_data(month) {
          try {
              var url = $('#base_url').val()+'dash/report/dash_wamas_og002_monthly_data/'+month;
              const data = await fetchData(url);
              // console.log(data);
              chart_obd(data);
              // test_chart(data);

          } catch (error) {
              console.error('main error:', error);
          }
        }

        report_wamas();
        dash_wamas_og002_monthly_data('2023-10-01');
        report_wamas_dailys('2023-10-01');

        function change_month(month){
          dash_wamas_og002_monthly_data(month);
          report_wamas_dailys(month);
        }


        function pie_obd_parter(data,index){
          
          if(index >= 0){
              document.getElementById("text_pie_pie_obd_parter").innerText = 'last update : '+data['obd_all']['x_labels_all'][index];

              sap = 'SAP : '+data['obd_sap']['all'][index]
              svmi = 'SVMI : '+data['obd_svmi']['all'][index]

              var options = {
                series :[10,10],
                chart: {
                  width: 400,
                  type: 'pie',
                  events: {
                      // click: function(event, chartContext, config) {
                      dataPointSelection: function(event, chartContext, config) {
             
                        try {
                        
                            index = config['dataPointIndex'];
                            partner = config['w']['config']['labels'][index];
                            // pie_processs(data,data['obd_all']['all'].length - 1, partner);
                        }
                          catch(err) {
                          
                        }
                        
                      }
                     
                    }
                },
                
                dataLabels: {
                  enabled: true,
                  formatter: function (val,opt) {
              
                    va = parseFloat(val).toFixed(1) + "%"
                    da = opt['w']['config']['series'][ opt['seriesIndex'] ];
                    return da + "  (" + va+")";
                
                  },
                style: {
                  fontSize: '15px',
                  colors:['#000000'],
                
                },
                  // background: {
                  //   enabled: true,
                  //   borderRadius: 2,
                  //   padding: 4,
                  //   opacity: 0.7,
                  //   borderWidth: 1,
                    
              
                  // },
              
                },
                labels: [sap, svmi],
                //  labels: ['finished' , 'no release' ,'wamas in process'],
                colors:['#00E396', '#008FFB', '#FEB019' , '#FF4560'],
                responsive: [
                  {
                      breakpoint: 480,
                      options: {
                        chart: {
                          width: 200
                        },
                        legend: {
                          position: 'bottom'
                        }
                      }
                  }
                ],
                
              };

              var chart = new ApexCharts(document.querySelector("#pie_obd_parter"), options);
              chart.render();
              chart.updateSeries([data['obd_sap']['all'][index],data['obd_svmi']['all'][index]]);
          }
        }



        function pie_processs(data,index,partner){
         
          if(index >= 0){
            
            if(partner == 'SAP'){
              obd_all = data['obd_sap'];
            }else if(partner == 'SVMI'){
              obd_all = data['obd_svmi'];
            }else{
              obd_all = data['obd_all'];
            }

     
            document.getElementById("text_pie_process").innerText = 'Current Total : '+ obd_all['all'][index]+' '+ partner;
            document.getElementById("text_pie_processs_process_update").innerText = 'last update : '+obd_all['x_labels_all'][index];

            no_releas =  'no release : '+obd_all['shipmen_planning'][index]
            wamas_in_process =  'wamas in process : '+obd_all['picking_planning'][index]
            finished =  'finished : '+obd_all['finished'][index]
            
            var options = {
              series :[10,10,10],
              chart: {
                width: 445,
                type: 'pie',
              },
             
              colors:[ '#008FFB', '#FEB019', '#00E396' ],
              responsive: [
                  {
                    breakpoint: 480,
                    options: {
                        chart: {
                          width: 200
                        },
                        legend: {
                          position: 'bottom'
                        }
                    }
                  }
              ],
          
              dataLabels: {
                enabled: true,
                formatter: function (val,opt) {
             
                  va = parseFloat(val).toFixed(1) + "%"
                  da = opt['w']['config']['series'][ opt['seriesIndex'] ];
              
        
                 
                  return da + "  (" + va+")";
              
                },
                // dropShadow: {
                //   enabled: true,
                //   left: 2,
                //   top: 2,
                //   opacity: 0.5
                // },
                style: {
                  fontSize: '15px',
                  colors:['#000000'],
                
                },
                // background: {
                //   enabled: true,
    
                //   borderRadius: 2,
                //   padding: 4,
                //   opacity: 0.7,
                //   borderWidth: 1,
             
                // },
            
              },
              labels: [ no_releas, wamas_in_process ,finished],
              // tooltip: {
              //   fixed: {
              //     enabled: true,
              //     position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
              //     offsetY: 30,
              //     offsetX: 60
              //   },
              // },
            };
            
            var chart_pie_processs = new ApexCharts(document.querySelector("#pie_processs"), options);
            chart_pie_processs.render();
            chart_pie_processs.updateSeries([ obd_all['shipmen_planning'][index],  obd_all['picking_planning'][index] ,obd_all['finished'][index]]);
         
          }
        }



        function chart_obd(data){
          document.getElementById("text_chart_obd").innerText = 'last update : '+data['last_update'];
          document.getElementById("monthselect").innerText = data['sum']['x_labels_all'];
          var obd_all = data['obd_all'];
          var options = {
            series: [],
            chart: {
              type: 'bar',
              height: 350,
              toolbar: {
                  show: false,
                },
            },
            plotOptions: {
              bar: {
                horizontal: false,
                // columnWidth: '60%',
                endingShape: 'rounded'
              },
            },
            dataLabels: {
              enabled: true,
              // offsetY: -30,
              style: {
                    fontSize: '12px',
                    // fontFamily: 'Helvetica, Arial, sans-serif',
                    // fontWeight: 'bold',
                    colors:['#000000'],
                },
               
            },
            colors:['#FEB019' ,'#008FFB', '#00E396', '#FF4560'],
            stroke: {
              show: true,
              width: 2,
              colors: ['transparent']
            },
            xaxis: {
              categories:  obd_all['x_labels_all'],
            },

            fill: {
              opacity: 1
            },
            legend: {
                  position: 'top',
                
            },

          };

          var chart = new ApexCharts(document.querySelector("#chart_obd"), options);
          chart.render();
          chart.updateSeries(
            [
              {
                  name: 'wamas in process',
                  type: 'bar',
                  data: obd_all['picking_planning']
                }, 
                // {
                //   name: 'finished',
                //   type: 'bar',
                //   data:  obd_all['finished']
                // }, 
                {
                  name: 'no release',
                  type: 'bar',
                  data: obd_all['shipmen_planning']
                }, 
                {
                  name: 'finished',
                  type: 'bar',
                  data:  obd_all['finished']
                }, 
                {
                  name: 'Outbound Deliveries Order',
                  type: 'bar',
                  data: obd_all['all']
                }
            ] 
          );
        }
        
       
   
        
        async function report_wamas_dailys(month) {
          try {
              var url = $('#base_url').val()+'dash/report/dash_wamas_og002_daily/'+month;
              const data = await fetchData(url);
              console.log(data);
              set_table(data)
          } catch (error) {
              console.error('main error:', error);
          }
        }
      
    
        function set_table(data){
          document.getElementById("text_table_dailys").innerText = 'last update : '+data['last_update'];
          days = data['data'];
          var tbody = '';

          for (let i = 0; i < days.length; i++) {
              tbody +=
                '<tbody>'+
                  '<tr>'+
                      // '<th scope="row">'+(i+1)+'</th>'+
                      '<td>'+data['data'][i]['name']+'</td>'+
                      '<td>'+data['data'][i]['all']['total']+'<br>( SAP : '+data['data'][i]['sap']['total']+' , SVMI : '+data['data'][i]['svmi']['total']+' )'+'</td>'+
                      '<td>'+data['data'][i]['all']['shipmen_planning']+'</td>'+
                      '<td>'+data['data'][i]['all']['picking_planning']+'</td>'+
                      '<td>'+data['data'][i]['all']['finished']+'</td>'+
                      // '<td><button type="button" class="btn btn-outline-primary" onclick="load(\''+data['data'][i]['release_wamas_log_file_url']+'\')">Download</button></td> '+  
                  '</tr>'+
                '</tbody>';
              
          }

          
          table =
            '<table class="table dataTable">'+
              '<thead>'+
                '<tr class="text-nowrap">'+
                    '<tr>'+
                        '<th>date</th>'+
                        '<th>order</th>'+
                        '<th>no release</th>'+
                        '<th>wamas in process</th>'+
                        '<th>finished</th>'+
                    '</tr>'+
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

 
  
    </script>
  </body>
</html>
