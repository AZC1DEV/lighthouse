     
      var Month = '2023-10-01' ;
      var Customer_type = 'customer_only';

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

        async function report_wamas(customer_type) {
          
          if(customer_type == 'customer_only'){
            document.getElementById("obd_type_customer").innerText = 'Customer Only';
          }else{
            document.getElementById("obd_type_customer").innerText = 'All';
          }

          try {
              var url = $('#base_url').val()+'dash/report_dev/report_wamas_data/'+customer_type;
              const data = await fetchData(url);
              // console.log(data);

              pie_processs(data,data['obd_all']['all'].length - 1,'');
           
              pie_obd_parter(data,data['obd_all']['all'].length - 1);



          } catch (error) {
              console.error('main error:', error);
          }
        }

        async function dash_wamas_og002_monthly_data(month,customer_type) {

          
          try {
              var url = $('#base_url').val()+'dash/report_dev/dash_wamas_og002_monthly_data/'+month+'/'+customer_type;
              const data = await fetchData(url);
              console.log(data);
              chart_obd(data);
              // test_chart(data);

          } catch (error) {
              console.error('main error:', error);
          }
        }

        report_wamas(Customer_type);
        change_month(Month);

       

        function change_month(month){
          Month = month;
          dash_wamas_og002_monthly_data(Month,Customer_type);
          view_obd_order(Month,Customer_type);
        }

        function change_customer_type(customer_type){
          Customer_type = customer_type
          report_wamas(Customer_type);
          dash_wamas_og002_monthly_data(Month,Customer_type);
          view_obd_order(Month,Customer_type);
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
                responsive: [
                  {
                    breakpoint: 850,
                    options: {
                        chart: {
                          width: 300
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
              series :[1,10,100],
              chart: {
                width: 430,
                type: 'pie',
              },
             
              colors:[ '#008FFB', '#FEB019', '#00E396' ],
              responsive: [
                  {
                    breakpoint: 850,
                    options: {
                        chart: {
                          width: 300
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
              // legend: {
              //     position: 'bottom',
                
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
              enabledOnSeries : [0,1,2,3],
              // textAnchor : 'start',
              distributed: true,
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
              width: 4,
              // colors: ['transparent']
              curve: 'smooth'
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
                  name: 'Total Outbound Deliveries Order',
                  type: 'bar',
                  data: obd_all['all']
                }
            ] 
          );
        }

        function view_obd_order(Month,Customer_type){
 
     
          iframe = '<iframe id="iframe" src="http://122.155.175.226/lighthouse/dash/report_dev/dash_wamas_og002_table/'+Month+'/'+Customer_type+'" height="300px" width="100%" ></iframe>'
          document.getElementById("content_view_obd_order").innerHTML  =  iframe;
        }
