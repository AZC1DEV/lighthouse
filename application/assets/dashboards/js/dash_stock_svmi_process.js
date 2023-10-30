

let cardColor, headingColor, axisColor, shadeColor, borderColor;

cardColor = config.colors.white;
headingColor = config.colors.headingColor;
axisColor = config.colors.axisColor;
borderColor = config.colors.borderColor;



async function fetchData() {
  try {
    var url = $('#base_url').val()+'dash/main/dash_stock_process_daily';
    const response = await fetch(url);

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.log('Fetch error:', error);
    throw error; 
  }
}

async function main_dash_stock_svmi_process() {

  try {
    const data = await fetchData();

    const series = data['series'];
    const categories = data['categories'];

    dash_view(series,categories);
   

  } catch (error) {
    console.log('main error:', error);
  }
}

function dash_view(series,categories){

    var dataPointIndex = (categories.length)-2;
    try {
      var Latest = series[0]['data'][(series[0]['data'].length)-2];
      var Latest_before = series[0]['data'][(series[0]['data'].length)-3];

      document.getElementById("stock_procrss_latest_date").innerText  =  'Latest : ' +Latest;
    
      var stock_up_ratio = document.getElementById("stock_procrss_latest_date");
      
      if(Latest >= Latest_before){
        var value = Latest - Latest_before;
        stock_up_ratio.innerHTML +='<small class="text-success fw-semibold"> <i class="bx bx-chevron-up"></i>+'+value+'</small>'
      
      }else{
        var value = Latest_before - Latest;
        stock_up_ratio.innerHTML +='<small class="text-danger fw-semibold"> <i class="bx bx-chevron-down"></i>-'+value+'</small>'
      
      }
    } catch (error) {
      console.log('main error:', error);
    }
    
    const incomeChartEl = document.querySelector('#incomeChart'),
    incomeChartConfig = {
      series: series,
      noData: {
        text: 'Loading...'
      },
    
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: 'transparent',
        strokeColors: 'transparent',
        strokeWidth: 4,
        discrete: [
          {
            fillColor: config.colors.white,
            seriesIndex: 0,
            dataPointIndex: dataPointIndex,
            strokeColor: config.colors.primary,
            strokeWidth: 2,
            size: 6,
            radius: 8
          }
        ],
        hover: {
          size: 7
        }
      },
      colors: [config.colors.primary, config.colors.info],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: -10,
          right: 8
        }
      },
      xaxis: {
        categories: categories,
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        min: 1000,
        max: 2000,
        tickAmount: 4
      }
    };
    if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
      const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
      incomeChart.render();
    }
}


async function fetchData_stock_all() {
  try {
    var url = $('#base_url').val()+'dash/main/dash_stock_process_all';
    const response = await fetch(url);

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.log('Fetch error:', error);
    throw error; 
  }
}

async function main_dash_stock_svmi_all() {

  try {
    const data = await fetchData_stock_all();



    dash_view_procrss_all(data);
   

  } catch (error) {
    console.log('main error:', error);
  }
}

function dash_view_procrss_all(data){
  const series = data['series'];
  const labels = data['labels'];
  const master = data['master'];
  

  document.getElementById("total_procrss_all").innerText = master[0];
  document.getElementById("total_peocess_success").innerText = master[1];
  document.getElementById("total_peocess_issue").innerText = master[2];

  const chartOrderStatistics = document.querySelector('#orderStatisticsChart'),
  orderChartConfig = {
    chart: {
      height: 165,
      width: 130,
      type: 'donut'
    },
    labels: labels,
    series: series,
    colors: [config.colors.info, config.colors.success, config.colors.warning],
    stroke: {
      width: 5,
      colors: cardColor
    },
    dataLabels: {
      enabled: false,
      formatter: function (val, opt) {
        return parseInt(val) + '%';
      }
    },
    legend: {
      show: false
    },
    grid: {
      padding: {
        top: 0,
        bottom: 0,
        right: 15
      }
    },
    plotOptions: {
      pie: {
        donut: {
          size: '75%',
          labels: {
            show: true,
            value: {
              fontSize: '1.5rem',
              fontFamily: 'Public Sans',
              color: headingColor,
              offsetY: -15,
              formatter: function (val) {
                return parseInt(val) + '%';
              }
            },
            name: {
              offsetY: 20,
              fontFamily: 'Public Sans'
            },
            total: {
              show: true,
              fontSize: '0.8125rem',
              color: axisColor,
              label: 'Total',
              formatter: function (w) {
                return master[0];
              }
            }
          }
        }
      }
    }
  };
if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
  const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
  statisticsChart.render();
}

}


main_dash_stock_svmi_all();
main_dash_stock_svmi_process();




