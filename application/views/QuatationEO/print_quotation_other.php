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
      <div class="col-12">
      
                <img style="margin-left: 45px; margin-top: 20px;"  id="imagedeposit" src="<?php echo base_url('images/logo.png') ?>" alt="" class="logo" width="250" height="120" style="top: 30px;">
        
   
    <!-- info row -->

    <!-- /.row -->    <div class="row invoice-info">
      <div class="col-9 invoice-col">
        <br>
                      <p style="margin-left: 45px;">PT.Magenta Mediatama<br>
            Jl. Raya kebayon Lama No 15 RT.04 RW.03 Grppl Utara<br>
            Kebayon Lama Jakarta Selatan DKI Jakarta-12210<br>
          phone (021) 53660077-08;Fax(021)53660099</p>
    
      
      </div>
      <!-- /.col -->
    

      <!-- /.col -->
      <div class="float-right">
        <br>
        <b>Jakarta,<?php echo date('d / M / yy');  ?></b>
        <br>
         <br>
        <b>No Quotation:</b>  <?php echo $quotation_number; ?><br>
         <br>
           <br>
     
        

    
      </div>


        <div class="float-left">
       
      <!--  <p>&ensp; &ensp; &ensp;Nama Jalan</p> -->
      <br>
    
      </div>


      <br>

    
    </div>
    <hr  style="height: 5px; border-width: 6px; background-color:#696969; margin-left: 45px; margin-right: 45px;"  >

    <!-- Table row -->

        <div class="row invoice-info">
      <div class="col-sm-9 invoice-col" style="width: 60px;">
       
         <b> <p style="margin-left: 45px;">Kepada Yth,</p></b>
       
        <p  style="margin-left: 100px;"><?php echo $customer; ?></p>
             <p  style="margin-left: 100px; width: 450px;"><?php echo $alamat; ?></p>
      </div>
      <!-- /.col -->
    

      <!-- /.col -->
      <div class="float-right">
        
        <b>Attn :</b><?php echo $pic_name ?></b>
        <br>
         <br>
        <b>Event :</b>  <?php echo $title; ?><br>
        

    
      </div>


        <div class="float-left">
       
      <!--  <p>&ensp; &ensp; &ensp;Nama Jalan</p> -->
      <br>
    
      </div>


      <br>

       <p style="margin-left: 45px;"> Dengan Hormat,<br>
        Bersama ini kami ingin menyampaikan penawaran harga, dengan detail sebagai berikut :</p>
    </div>
    <div class="row">

       
      <br>
      <br>
      <br>
    
       
    <div class="col-13 table-responsive justify-content">
   
      
          <table id="tbl1" align="center" style=" margin-left: 45px;margin-right: 100px; width: 93%;" border="1" align="center">
          <thead class="thead-dark" >
          <tr>
            <th style="width: 5%">No</th>
            <th style="width: 40%">Description</th>
            <th style="width: 10%"><center>Frequency</center></th>
            <th style="width: 20%">Unit Price</th>
            <th style="width: 10px;">Amount</th>
          </tr>
          </thead>

          <tbody>
             <?php $no=0;
             foreach ($quotation_other_item as $k):
              $no++;

              ?>
          <tr>
            <td><center><?php echo $no ?></center></td>
            <td><?php echo $k->desciption ?></td>
            <td><center><?php echo $k->frequency ?></center></td>
            <td><p align="right"><?php echo 'IDR '.$k->unitprice ?></p></td>
            <td><p align="right"><?php echo 'IDR '.$k->amount ?></p></td>
          </tr>
           <?php endforeach ?>
           <tfoot>
             
             <tr >

              <td rowspan="6" colspan="3"><p style="margin-top: -160px"><b>Note :</b><?php echo $note ?></p></td>
              <th>Netto</th>
              <td><p align="right"> <?php echo 'IDR '.$netto ?></p></td>
             
            </tr>
             <tr>
              <th>ASF</th>
              <td><p align="right"> <?php echo 'IDR '.$asf ?></p></td>
             
            </tr>
              <tr>
              <th>Total</th>
           <td><p align="right"> <?php echo 'IDR '.$total; ?></p></td>
            
            </tr>
             <tr>
              <th>PPN</th>
         <td> <p align="right"> <?php echo 'IDR '.$ppn ?></p></td>
              
            </tr>
             <tr>
              <th>PPh23</th>
            <td> <p align="right"> <?php echo 'IDR '.$pph23; ?></p></td>
            
            </tr>
             <tr>
              <th>Grand Total</th>
           <td> <p align="right"> <?php echo 'IDR '.$grand_total; ?></p></td>
            
            </tr>
           </tfoot>
          
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <br>
    <br>
     <table style="margin-left: 45px; width: 270px">
          
          <tr>
            
            <td style="width: 45px">Hormat Kami</td>
           

          </tr>
          <tr>
            
            <td style="width: 45px">PT. Magenta Mediatama</td>
             
            
          </tr>
         
        </table>
        <br>
         <br>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <br>
        <br>

      </div>
      <!-- /.col -->
      <div class="col-6">
        


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
