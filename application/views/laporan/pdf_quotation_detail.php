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
                  <th style="width: 20px;">Quotation Number</th>
                  <th style="width: 20px;">Date Quotation</th>
                  <th style="width: 20px;">Item Name</th>
                  <th style="width: 20px;">Item Value</th>
                  <th style="width: 20px;"><center>Quantity</center></th>
                  <th style="width: 5px;"><center>Frequency</center></th>
                  <th style="width: 20px;">Rate</th>
                  <th style="width: 20px;">Sub Total</th>              
                  </tr>
                  </thead>
                  <?php
                  foreach ($data as $k) {
                    echo "<tr>";

                
                  echo "<td>$k->quotation_number</td>";
                    echo "<td>$k->date_quotation</td>";
                    echo "<td>$k->name_item</td>";
                    echo "<td>$k->item_value</td>";
                    echo "<td><center>$k->quantity</center></td>";
                    echo "<td><center>$k->frrequency</center></td>";
                    echo "<td>$k->rate</td>";
                    echo "<td>$k->subtotal</td>";
                    
                    echo "</tr>";
                    # code...
                  }



                   ?>

                 </tr>
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
