<!DOCTYPE html>
<html>
<head>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap">
    <style>
        body {
            font-family: 'Public Sans', sans-serif; /* Apply 'Public Sans' font or use a fallback sans-serif font */
            font-size: 13px;
        }
        .table-container {
            width: 500px; /* Set the desired width */
            overflow: hidden;
        }

        .header {
            width: 100%;
            table-layout: fixed;
        }

        .data {
            width: 100%;
            table-layout: fixed;
        }

        .table-scroll {
            height: 200px; /* Set the desired height for the data table */
            overflow-y: scroll;
        }

        /* Styling for header row */
        .header th {
            background-color: #333;
            color: #fff;
        }

        /* Optional: Styling for alternating rows in the data table */
        .data tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .header th, .data td {
            text-align: center;
        }
    </style>

    
</head>
<body>

    <input type="hidden" id="base_url" value="<?=base_url()?>">
    <div id="tabel_report_release" class="table-container">


        <!-- <table class="header">
            <thead>
                <tr>
                    <th>date</th>
                    <th>order</th>
                    <th>no release</th>
                    <th>wamas in process</th>
                    <th>finished</th>
                </tr>
            </thead>
        </table>
        <div class="table-scroll">
            <table class="data">
                <tbody>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>

                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                    </tr>
                </tbody>
            </table>
        </div> -->

    </div>

    <script src="<?=base_url()?>application/assets/sneat/vendor/libs/jquery/jquery.js"></script>
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

      
        report_wamas_dailys('2023-10-01');

       

   
        
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
        //   document.getElementById("text_table_dailys").innerText = 'last update : '+data['last_update'];
          days = data['data'];
          var tbody = '';

          for (let i = 0; i < days.length; i++) {
              tbody +=
                // '<tbody>'+
                //   '<tr>'+
                //       '<td>'+data['data'][i]['name']+'</td>'+
                //       '<td>'+data['data'][i]['all']['total']+'</td>'+
                //       '<td>'+data['data'][i]['all']['shipmen_planning']+'</td>'+
                //       '<td>'+data['data'][i]['all']['picking_planning']+'</td>'+
                //       '<td>'+data['data'][i]['all']['finished']+'</td>'+
                //   '</tr>'+
                // '</tbody>';
                '<tr>'+
                    '<td>'+data['data'][i]['name']+'</td>'+
                    '<td>'+data['data'][i]['all']['total']+'</td>'+
                    '<td>'+data['data'][i]['all']['shipmen_planning']+'</td>'+
                    '<td>'+data['data'][i]['all']['picking_planning']+'</td>'+
                    '<td>'+data['data'][i]['all']['finished']+'</td>'+
                '</tr>';
          }

          
        //   table =
        //     '<table class="table-container">'+
        //       '<thead>'+
        //         '<tr class="text-nowrap">'+
        //             '<tr>'+
        //                 '<th>date</th>'+
        //                 '<th>order</th>'+
        //                 '<th>no release</th>'+
        //                 '<th>wamas in process</th>'+
        //                 '<th>finished</th>'+
        //             '</tr>'+
        //         '</tr>'+
        //       '</thead>'+
        //         tbody+
        //     '</table>';

            table =
                '<table class="header">'+
                    '<thead>'+
                        '<tr>'+
                            '<th>date</th>'+
                            '<th>order</th>'+
                            '<th>no release</th>'+
                            '<th>wamas in process</th>'+
                            '<th>finished</th>'+
                        '</tr>'+
                    '</thead>'+
                '</table>'+
                '<div class="table-scroll">'+
                    '<table class="data">'+
                        '<tbody>'+
                            tbody+
                        '</tbody>'+
                    '</table>'+
                '</div>';
  
        
          document.getElementById("tabel_report_release").innerHTML  =  table;
              
        }

        // function set_data_tabel(data){
        //     $('.js-exportable').DataTable({
        //         dom: 'Bfrtip',
        //         responsive: true,
        //         data : data,
        //         searching: false
          
        //     });
        // }

 
  
    </script>
</body>
</html>