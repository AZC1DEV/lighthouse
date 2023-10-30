
$(function () {
    const date = new Date();
    var month = (date.getMonth()+1);
    dash_api_transactions_tms_main(month);

 
});

function getChartJs(type,data) {
    var config = null;

    if (type === 'bar') {

        config = {
            type: 'bar',
            data: {
                labels: data['labels'],
                datasets: data['datasets']
                
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
   
    return config;
}





async function fetchData(number_month) {
    try {
        var url = $('#base_url').val()+'dash/main/dash_transactions_tms/'+number_month;
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

  async function dash_api_transactions_tms_main(number_month) {
    try {
        const data = await fetchData(number_month);
       
        new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar',data));
      

    } catch (error) {
        console.error('main error:', error);
    }
  }
  