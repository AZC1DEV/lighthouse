/**
 * Dashboard Analytics
 */

'use strict';

(function () {
    let cardColor, headingColor, axisColor, shadeColor, borderColor;

    cardColor = config.colors.white;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;
    var url = $('#base_url').val()+'dash/main/dash_poolpos';
 
    async function fetchData() {
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
    
    async function main() {
      try {
        const data = await fetchData();
    
        const series = data['series'];
        const categories = data['categories'];
 
        dash_view(series,categories)

      } catch (error) {
        console.error('main error:', error);
      }
    }
    
    function dash_view(series,categories){
        const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
        totalRevenueChartOptions = {
          series: series,
          chart: {
            height: 300,
            stacked: true,
            type: 'bar',
            toolbar: { show: false }
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '50%',
              borderRadius: 5,
              startingShape: 'rounded',
              endingShape: 'rounded'
            }
          },
          colors: [config.colors.primary, config.colors.info],
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth',
            width: 6,
            lineCap: 'round',
            colors: [cardColor]
          },
          legend: {
            show: true,
            horizontalAlign: 'left',
            position: 'top',
            markers: {
              height: 8,
              width: 8,
              radius: 12,
              offsetX: -3
            },
            labels: {
              colors: axisColor
            },
            itemMargin: {
              horizontal: 10
            }
          },
          grid: {
            borderColor: borderColor,
            padding: {
              top: 0,
              bottom: -8,
              left: 20,
              right: 20
            }
          },
          xaxis: {
            categories: categories,
            labels: {
              style: {
                fontSize: '13px',
                colors: axisColor
              }
            },
            axisTicks: {
              show: false
            },
            axisBorder: {
              show: false
            }
          },
          yaxis: {
            labels: {
              style: {
                fontSize: '13px',
                colors: axisColor
              }
            }
          },
          responsive: [
            {
              breakpoint: 1700,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '32%'
                  }
                }
              }
            },
            {
              breakpoint: 1580,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '35%'
                  }
                }
              }
            },
            {
              breakpoint: 1440,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '42%'
                  }
                }
              }
            },
            {
              breakpoint: 1300,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '48%'
                  }
                }
              }
            },
            {
              breakpoint: 1200,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '40%'
                  }
                }
              }
            },
            {
              breakpoint: 1040,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 11,
                    columnWidth: '48%'
                  }
                }
              }
            },
            {
              breakpoint: 991,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '30%'
                  }
                }
              }
            },
            {
              breakpoint: 840,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '35%'
                  }
                }
              }
            },
            {
              breakpoint: 768,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '28%'
                  }
                }
              }
            },
            {
              breakpoint: 640,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '32%'
                  }
                }
              }
            },
            {
              breakpoint: 576,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '37%'
                  }
                }
              }
            },
            {
              breakpoint: 480,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '45%'
                  }
                }
              }
            },
            {
              breakpoint: 420,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '52%'
                  }
                }
              }
            },
            {
              breakpoint: 380,
              options: {
                plotOptions: {
                  bar: {
                    borderRadius: 10,
                    columnWidth: '60%'
                  }
                }
              }
            }
          ],
          states: {
            hover: {
              filter: {
                type: 'none'
              }
            },
            active: {
              filter: {
                type: 'none'
              }
            }
          }
        };
       
      if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
        const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
        totalRevenueChart.render();
      }
    }

    main();

   
})();