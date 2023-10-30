<!DOCTYPE html>
<html>
<head>
    <title>DataTables Example</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css">
  
    <style>
        /* Add CSS to change font size */

        body {
            font-family: 'Public Sans', sans-serif;
            font-size: 12px;
            text-align: center;
        }
  
        #example thead, .fixedHeader-floating thead {
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: white; 
        }

        #example thead .dataTables_filter, .fixedHeader-floating thead .dataTables_filter {
            position: absolute;
            top: 0;
            right: 0;
            background-color: white; 
        }


        .table-container {
            width: 600px; /* Set the desired width */
            overflow: hidden;
        }

       
        .table-scroll {
            height: 200px; /* Set the desired height for the data table */
            overflow-y: scroll;
        }


        #example thead th {
            background-color: #fff;
            color: #fff;
        }

     
    </style>
</head>
<body>
    <input type="hidden" id="month" value="<?=$month?>">
    <input type="hidden" id="customer_type" value="<?=$customer_type?>">
    <input type="hidden" id="base_url" value="<?=base_url()?>">

    <div class="table-container">
        <table id="example" class="display">
        
            <thead>
                <tr>
                    <th>date</th>
                    <th>order</th>
                    <th>no release</th>
                    <th>wamas in process</th>
                    <th>finished</th>
                </tr>
            </thead>
        
            <tbody>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script> -->
    <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>

    <script>
    

        async function fetchData(month,customer_type) {
            try {
                var url = $('#base_url').val()+'dash/report_dev/dash_wamas_og002_daily_data_table/'+month+'/'+customer_type;
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
        
        async function report_wamas_release_data(month,customer_type) {
          try {
              const data = await fetchData(month,customer_type);


              set_data_tabel(data['data']);
   
          } catch (error) {
              console.error('main error:', error);
          }
        }

        function set_data_tabel(data){
            $('#example').DataTable({
                processing: true,
                responsive: false,
                data : data,
                searching: false,
                paging : false,
                searching: false,
                fixedHeader : {
                    header: true, 
                
                },
       
                scrollY: '300px',
                info: false,
                
          
            });
           
         
        }

        report_wamas_release_data($('#month').val(),$('#customer_type').val())
  
    
    </script>
</body>
</html>
