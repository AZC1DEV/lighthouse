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
               
         
                <div hidden class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <div style="margin:20px">
                          <h5 class="card-title">Outbound Deliveries Overview</h5>
                            <div id="chart_all"></div>
                        </div> 
                      </div>
                    </div>
                  </div>
                </div>

                

                <div hidden class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <div style="margin:20px">
                            <h5 class="card-title">Outbound Deliveries Overview</h5>
                            <div id="stackchart"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <div style="margin:20px">
                          <h5 class="card-title">Outbound Deliveries Overview</h5>
                            <div id="chart_obd"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-lg-6 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <div style="margin:20px">
                            <h5 class="card-title">Outbound Deliveries Partner</h5>
                            <small id='text_pie_pie_obd_parter'></small>
                            <div id="pie_obd_parter"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-lg-6 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-12">
                        <div style="margin:20px">
                            <h5 id='text_pie_process' class="card-title">Process</h5>
                            <small id='text_pie_processs_process_update'></small>
                            <div id="pie_processs"></div>
                        </div>
                      </div>
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

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>


      
     

        async function fetchData() {
            try {
                var url = $('#base_url').val()+'dash/report/report_wamas_data';
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
              const data = await fetchData();
              // console.log(data);

              linechart_all(data['obd_all']);
              stackchart(data);
              pie_processs(data,data['obd_all']['all'].length - 1,'');
           
              pie_obd_parter(data,data['obd_all']['all'].length - 1);

              chart_obd(data);

          } catch (error) {
              console.error('main error:', error);
          }
        }


        report_wamas()
  

	
      
        function linechart_all(data){
              var options = {
                    series: [
                        {
                            name: 'total',
                            data: data['all'],
                            
                        }, 
                        {
                            name: 'finished',
                            data: data['finished']
                        },
                        {
                            name: 'active',
                            data: data['active']
                        }, 
                        {
                            name: 'shipmen_planning',
                            data: data['shipmen_planning']
                        }, 
                        {
                            name: 'picking_planning',
                            data: data['picking_planning']
                        }, 
                    ],
                    colors:['#F44336','#00E396', '#008FFB', '#008FFB', '#FEB019' ],
                    chart: {
                        height: 300,
                        type: 'area'
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        categories:  data['x_labels_all']
                    }
              
                };

                var chart = new ApexCharts(document.querySelector("#chart_all"), options);
                chart.render();
                
        }

        function stackchart(data){

            var obd_all = data['obd_all'];
            var options = {
                series: [

                    {
                        name: 'finished',
                        data: obd_all['finished']
                    },
                    {
                        name: 'no release',
                        data: obd_all['shipmen_planning']
                    }, 
                    {
                        name: 'wamas in process',
                        data: obd_all['picking_planning']
                    }, 

                    
             

                ],
          
                colors:['#00E396', '#008FFB', '#FEB019' , '#FF4560'],
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                    toolbar: {
                        show: true
                    },
                    zoom: {
                        enabled: true
                    },
                    events: {
                      click: function(event, chartContext, config) {
                        // console.log(event);
                        // mounted: function(chartContext, config) {
                        // console.log(chartContext);
                        // console.log(config['dataPointIndex']);

                        index = config['dataPointIndex'];
                        
                        pie_processs(data,index,'');
                        pie_obd_parter(data,index);
                        
                      }
                    }
                },
                responsive: [
                    {
                        breakpoint: 480,
                        options: {
                            legend: {
                            position: 'bottom',
                            offsetX: -10,
                            offsetY: 0
                            }
                        }
                    }
                ],
                plotOptions: {
                  bar: {
                      horizontal: false,
                      borderRadius: 10,
                      dataLabels: {
                          total: {
                              enabled: true,
                              style: {
                                  fontSize: '13px',
                                  fontWeight: 900
                              }
                          }
                      }
                  },
                },
                colors:['#00E396', '#008FFB', '#FEB019' , '#FF4560'],
                xaxis: {
                        categories:  obd_all['x_labels_all']
                    },
                legend: {
                    position: 'right',
                    offsetY: 40
                },
                fill: {
                    opacity: 1
                }
            };

            var chart = new ApexCharts(document.querySelector("#stackchart"), options);
            chart.render();
        }


        function pie_obd_parter(data,index){
          
          if(index >= 0){
              document.getElementById("text_pie_pie_obd_parter").innerText = data['obd_all']['x_labels_all'][index];

              var options = {
                series: [10,10],
                chart: {
                  width: 380,
                  type: 'pie',
                  events: {
                      // click: function(event, chartContext, config) {
                      dataPointSelection: function(event, chartContext, config) {
             
                        try {
                        
                            index = config['dataPointIndex'];
                            partner = config['w']['config']['labels'][index];
                            pie_processs(data,data['obd_all']['all'].length - 1, partner);
                        }
                          catch(err) {
                          
                        }
                        
                      }
                     
                    }
                },
                labels: ['SAP', 'SVMI'],
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
            document.getElementById("text_pie_process").innerText = 'Outbound Deliveries Order : '+ obd_all['all'][index]+' '+ partner;
            document.getElementById("text_pie_processs_process_update").innerText = obd_all['x_labels_all'][index];
            
            var options = {
            series :[10,10,10],
            chart: {
              width: 445,
              type: 'pie',
            },
            labels: ['finished' , 'no release' ,'wamas in process'],
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
              ]
            };
            
            var chart_pie_processs = new ApexCharts(document.querySelector("#pie_processs"), options);
            chart_pie_processs.render();
            chart_pie_processs.updateSeries([obd_all['finished'][index], obd_all['shipmen_planning'][index],  obd_all['picking_planning'][index]]);
         
          }
        }


        function chart_obd(data){
         
              var obd_all = data['obd_all'];
              console.log(obd_all);
                var options = {
                    series: [

                    {
                      name: 'wamas in process',
                      type: 'column',
                      data: obd_all['picking_planning']
                    }, 
                    {
                      name: 'no release',
                      type: 'column',
                      data: obd_all['shipmen_planning']
                    }, 
                    {
                      name: 'finished',
                      type: 'column',
                      data:  obd_all['finished']
                    }, 
                    {
                      name: 'Outbound Deliveries Order',
                      type: 'line',
                      data: obd_all['all']
                    }
                  ],
                  chart: {
                    height: 350,
                    type: 'line',
                    stacked: false,
                    toolbar: {
                      show: false,
                    },
                    zoom: {
                      enabled: false,
                    },
                    events: {
                      click: function(event, chartContext, config) {
                        // console.log(event);
                        // mounted: function(chartContext, config) {
                        // console.log(chartContext);
                        // console.log(config['dataPointIndex']);

                        index = config['dataPointIndex'];
                        
                        pie_processs(data,index,'');
                        pie_obd_parter(data,index);
                        
                      }
                    }
                  },
                  dataLabels: {
                    enabled: true
                  },
                stroke: {
                  width: [1, 1,1,8],
                  curve: 'smooth'
                },
          
                colors:['#FEB019' ,'#008FFB', '#00E396', '#FF4560'],
                xaxis: {
                          categories:  obd_all['x_labels_all'],
                          tooltip: {
                            enabled: false,
                            formatter: undefined,
                           
                        },
                      },
                legend: {
                    position: 'top',
                  
                },
              // yaxis: [
              //   {
              //     axisTicks: {
              //       show: true,
              //     },
              //     axisBorder: {
              //       show: true,
              //       color: '#008FFB'
              //     },
              //     labels: {
              //       style: {
              //         colors: '#008FFB',
              //       }
              //     },
              //     title: {
              //       text: "Income (thousand crores)",
              //       style: {
              //         color: '#008FFB',
              //       }
              //     },
              //     tooltip: {
              //       enabled: true
              //     }
              //   },
              //   {
              //     seriesName: 'Income',
              //     opposite: true,
              //     axisTicks: {
              //       show: true,
              //     },
              //     axisBorder: {
              //       show: true,
              //       color: '#00E396'
              //     },
              //     labels: {
              //       style: {
              //         colors: '#00E396',
              //       }
              //     },
              //     title: {
              //       text: "Operating Cashflow (thousand crores)",
              //       style: {
              //         color: '#00E396',
              //       }
              //     },
              //   },
              //   {
              //     seriesName: 'Revenue',
              //     opposite: true,
              //     axisTicks: {
              //       show: true,
              //     },
              //     axisBorder: {
              //       show: true,
              //       color: '#FEB019'
              //     },
              //     labels: {
              //       style: {
              //         colors: '#FEB019',
              //       },
              //     },
              //     title: {
              //       text: "Revenue (thousand crores)",
              //       style: {
              //         color: '#FEB019',
              //       }
              //     }
              //   },
              // ],
              // tooltip: {
              //   fixed: {
              //     enabled: true,
              //     position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
              //     offsetY: 30,
              //     offsetX: 60
              //   },
              // },
            
              };

              var chart = new ApexCharts(document.querySelector("#chart_obd"), options);
              chart.render();
        }
        
       
    </script>

  </body>
</html>
