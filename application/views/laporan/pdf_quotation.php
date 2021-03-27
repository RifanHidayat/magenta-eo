<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/dist/css/adminlte.min.css');?>">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->

    <div class="row">
      <div class="col-12 table-responsive">
        <div style="margin-right:50px">
       <h3> <center><?php echo $title;?></center></h3>
              <table class="table table-striped" border='1' style="margin-left: 20px; right: 10px;">
          <thead>
          <tr class="">
             <th>Quotation Number</th>
             <th>Date Quotation</th>
             <th>Customer</th>      
             <th>Pic Customer</th>
             <th>PIC Email</th>
             <th>Title Event</th>
             <th>Venue Event</th>
             <th>Date Event</th>
             <th>Date Expired</th>
              <th>ASF</th>   
              <th>Total Commisionable Cost</th>
              <th>Total Non-Fee Cost</th>
              <th>pph</th>
              <th>ppn</th>
                  
               <th>Total Summary</th>
  
                  </tr>
          </thead>
          <tbody>
            <?php
                  foreach ($data as $k) {
                    echo "<tr>";

                
                  echo "<td>$k->quotation_number</td>";
                    echo "<td>$k->date_quotation</td>";
                    echo "<td>$k->customer</td>";
                    echo "<td>$k->pic_name</td>";
                    echo "<td>$k->pic_email</td>";
                    echo "<td>$k->tittle_event</td>";
                    echo "<td>$k->venue_event</td>";
                    echo "<td>$k->date_event</td>";
                    echo "<td>$k->date_expired</td>";
                    echo "<td>$k->asf</td>";
                    echo "<td>$k->comissionable_cost</td>";
                    echo "<td>$k->nonfee</td>";
                    echo "<td>$k->pph</td>";
                    echo "<td>$k->ppn</td>";
                    echo "<td>$k->total_summary</td>";
              

            
                    echo "</tr>";
                    # code...
                  }

            ?>
        
          </tbody>
        </table>
      </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
