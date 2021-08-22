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

     <section class="invoice">
    <!-- title row -->
    <div class="row">
      <br>
      <br>

      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-9 invoice-col" >

     <table class="col-sm-3" style="margin-left: 45px"  >
       
       <tr>
          <td>Venue    </td><td>:</td><td><?php echo $venue;?></td>
       </tr>
       <tr>
          <td>Date    </td><td>:</td><td><?php echo $date;?></td>
       </tr>
       <tr>
          <td>To    </td><td>:</td><td><?php echo $pic_name;?></td>
       </tr>
       <tr>
          <td>Email    </td><td>:</td><td><?php echo $pic_email;?></td>
       </tr>
     </table>
     
      </div>
      <!-- /.col -->
    

      <!-- /.col -->
      <div class="float-right">
              
           <img id="imagedeposit" src="<?php echo base_url('images/logo.png') ?>" alt="" class="logo" width="250" height="120" style="top: 30px; margin-right: 10px;">
        
  
 

    
      </div>
      <br>

      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
       


      
     
      </div>
      <div class="col-13 table-responsive justify-content">
       



       <hr  style="height: 5px; border-width: 6px; background-color:#696969; margin-left: 45px; margin-right: 35px;"  ><br><br>
    
                   <table id="tbl1" style="margin-left: 45px; width: 92%" align="center" style="margin: auto;" border="1" align="center">
              <thead  class="thead-dark" >
              <tr>
                  <th scope="col" style="width: 5%;"><center>No</center></th>
                  <th scope="col" colspan="3" style="width: 50%;"><center>Description</center></th>
                  <th scope="col" style="width: 15%;"><center>total</center></th>
               
              </tr>
               
              </thead>
                <tbody>
              <tr>
                  <th colspan="5">Non-Fee Cost</th>         
              </tr>
                  <?php
                   $no=0;
                    foreach ($quotation_sub_item as $k):
                       

                      ?>  
                   <?php if ($k->metode=="Non-Fee Cost") {
                    $no++;

                    ?>            
                <tr>
                <td><center><?php echo $no; ?></center></td>
                  <td  colspan="3"><?php echo $k->name ; ?></td>
                  <td><p align="right"><?php $controller->subtotal($k->name,$k->quotation_number); ?></td>
         
                </tr>
                  <tr>
             
            <th colspan="4">Grand Total</th><th><p align="right"><?php echo  $nonfee; ?></th>
           </tr>
           <tr>
                <?php } ?>         
           <?php  endforeach ?>
            <tr>
                  <th colspan="5">Comissionable Cost</th>         
              </tr>


           <?php 
           $no=0;
            foreach ($quotation_sub_item as $k):?>  
                   <?php if ($k->metode=="Comissionable Cost") {
                    $no++;

                    ?>            
                <tr>
                <td><center><?php echo $no;; ?></center></td>
                  <td  colspan="3"><?php echo $k->name ; ?></td>
                <td><p align="right"><?php $controller->subtotal($k->name,$k->quotation_number); ?></p></td>
         
                </tr>
                <?php } ?>         
           <?php  endforeach ?>

          </tbody>
          <tfoot>
           <tr>
            
            <th colspan="4">Grand Total</th><th> <p align="right"><?php echo  $comissionable_cost; ?></th>
           </tr>
           <tr>
         
              <th rowspan="5" style="width: 60%; " colspan="2" ></th>
            <th colspan="2" style="width: 20%">ASF</th><th style="width: 100%" align="right"> <p align="right"><?php echo  "IDR ".$asf; ?></th>
           </tr>
            <tr>
          
            <th colspan="2">Total Summary</th><th><p align="right"><?php echo  "IDR ".$total; ?></th>
           </tr>
             
          <tr>
           <th colspan="2" style="">PPN</td><th> <p align="right"><?php echo  "IDR ".$ppn; ?></th>
           </tr>
            
           <th colspan="2">PPh</th><th> <p align="right"><?php echo  "IDR ".$pph; ?></th>
           </tr>
           <tr>
          
            <th colspan="2"> Grand Total</th><th><p align="right"><?php echo  "IDR ".$grand_total; ?></p></th>
           </tr>
             
            
          </tfoot>
        </table></center>
        <br>
        
        <h3 style="margin-left: 45px;"><b>Non-Fee Cost</b></h3> 
       
  
     
             <?php
              foreach ($quotation_sub_item as $name):
               $no=0;
              if ($name->metode=="Non-Fee Cost"){
          
              ?>
              
         
              <center><h4><?php  echo  $name->name ?></h4></center>
                
      
              <table style="margin-left: 45px; width: 92%" id="tbl1" align="center" style="margin: auto;" border="1" align="center">
          <thead class="thead-dark" >
              <tr>
                  <th><center>No</center></th>
                  <th><center>Description</center></th>
                  <th><center>Quantity</center></th>
                  <th><center>Frequency</center></th>
                  <th><center>Rate </center></th>
                  <th><center>Subtotal</center> </th>
              </tr>
              </thead>

                <tbody>
                  <?php 
                  $total=0;
                    foreach ($quotation_item as $k):

              
          
                   ?>

                  <?php if ($name->name==$k->name_item) { $no++; 
                    $subtotal=(str_replace('.', '', $k->subtotal));
                      $total=$total+$subtotal;
                    ?>
                <tr>
                <td><center><?php echo $no; ?></center></td>
                  <td><?php echo $k->item_value ; ?></td>
                  <td><center><?php echo $k->quantity." ".$k->satuanq ; ?></center></td>
                  <td><center><?php echo $k->frrequency." ".$k->satuanf ; ?></center></td>
                  <td><p align="right"><?php echo "IDR ".$k->rate; ?></td>
                  <td><p align="right"><?php echo "IDR ".$k->subtotal ; ?></td>
                </tr>
              <?php  }?>
           <?php  endforeach ?>

          </tbody>
             <tfoot>
            <th colspan="5">Grand Total</th>
        
             <th><p align="right"><?php echo "IDR ".number_format($total,0,",","."); ?></th>
           
          </tfoot>
        </table></center>
        <?php $no=0; ?>
         <?php }?>
         <?php endforeach ?>
         <?php $total=0; ?>
         

     


      
        <h3 style="margin-left: 45px;"><b>Comissionable Cost1</b></h3>
          
     
     
             <?php
              foreach ($quotation_sub_item as $name):
               $no=0;
              if ($name->metode=="Comissionable Cost"){
          
              ?>
            

              <center><h4><?php  echo  $name->name ?></h4></center>
            
      
              <table style="margin-left: 45px; width: 92%" id="tbl1" align="center"  border="1" align="center">
              <thead class="thead-dark" >
              <tr>
                  <th scope="col"><center>No</center></th>
                  <th scope="col"><center>Description</center></th>
                  <th scope="col"><center>Quantity</center></th>
                  <th scope="col"><center>Frequency</center></th>
                  <th scope="col"><center>Rate </center></th>
                  <th scope="col"><center>Subtotal</center> </th>
              </tr>
              </thead>

                <tbody>
                  <?php
                  $total=0; 
                    foreach ($quotation_item as $k):
              
          
                   ?>

                  <?php if ($name->name==$k->name_item) { $no++;
                      $subtotal=(str_replace('.', '', $k->subtotal));
                      $total=$total+$subtotal;


                   ?>
                <tr>
                <td><center><?php echo $no; ?></center></td>
                  <td><?php echo $k->item_value ; ?></td>
                  <td><center><?php echo $k->quantity." ".$k->satuanq ; ?></center></td>
                  <td><p align="right"><center><?php echo $k->frrequency." ".$k->satuanf ; ?></center></td>
                  <td><p align="right"><?php echo "IDR ".$k->rate; ?></p></td>
                  <td><p align="right"><?php echo "IDR ".$k->subtotal ; ?></td>
                </tr>
              <?php  }?>
           <?php  endforeach ?>

          </tbody>
          <tfoot>
            <td colspan="5">Grand Total</td>
        
             <th><p align="right"><?php echo "IDR ".number_format($total,0,",","."); ?></th>
             <?php $total=0; ?>
            
          </tfoot>
        </table></center>
        <?php $no=0; ?>
         <?php }?>
         <?php endforeach ?>


          <br>
        <br>
         <br>
    
          

       
        </div>
      </div>
      <!-- /.col -->
    </div>
    
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
