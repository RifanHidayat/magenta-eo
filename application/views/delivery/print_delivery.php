
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
           #tbl1 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tbl1 td, #tbl1 th {
  border: 1px solid #808080;
  padding: 5px;
}
table tr td{
font-size:8px;
}
table tr th{
font-size:10px;
}
p{
  font-size:8px;

}

#tbl1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  
  color: black;
}



#tbl1 thead th{
  color: black;
  
}
.table_footer{
      page-break-inside: avoid;
    }
</style> 
 

  
</head>
<body>
    <div class="content">
        <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">

                        <div class="float-right" >
                              <img style="margin-top: -0px;" id="imagedeposit" src="<?php echo base_url('images/logo.png') ?>" alt="" class="logo" width="150" height="50" >
                              <br>
                              <br>
        
        
           <table style=" width: 50px;margin-top: -50px;" align="right"  >
          
          <tr>
            
            <td style="width: 130px; margin-top: -30px;"><center><b><font color="black" size="3">Delivery Order</font></b></center>
              <hr style="width: 100%">
              <center><p align="top">Delivery Order No: <?php echo $delivery_order; ?></p></center>
            </td>
           

          </tr>
          <tr>
            
            <td valign="top" style="width: 150px"></td>
             
            
          </tr>
    
          
        </table>
     
     
     <table style="width: 30%;" border="1" align="right" >
          
          <tr>
            
            <th style="width: 40%" style="text-align: left;">Tanggal Pengiriman</th><td><?php echo date('d F Y', strtotime($date_pengiriman))  ?></td>
     

          </tr>
          <tr>
            
            <th  style="width: 40%" style="text-align: left;">Gudang</center></th><td><?php echo  $gudang; ?></td>
             
            
          </tr>
           <tr>
            
            <th style="width: 40%" style="text-align: left;">Pengirim</center></th><td><?php echo $pengirim; ?></td>
           

          </tr>
           <tr>
            
            <th style="width: 40%" style="text-align: left;">PO No.</th><td><?php echo  $po_number; ?></td>
           

          </tr>

        </table>
      </div>     
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->

    <!-- /.row -->    <div class="row invoice-info">
      <div class="col-9 invoice-col"  >
        <br>
                      <p style="margin-top: -100px;">PT.Magenta Mediatama<br>
  
         
          Jl. Raya kebayon Lama No 15 RT.04 RW.03 Grppl Utara<br>
          Kebayon Lama Jakarta Selatan DKI Jakarta-12210
         <br>
        phone (021) 53660077-08;Fax(021)53660099</p>
       
        

    
      
      </div>
      <!-- /.col -->
    

     


      
          <table style=" width: 400px" border="1">
          
          <tr>
            
            <th style="width: 100px"><center>Tagihan Ke</center></th>
            <th style="width: 100px"><center>Kirim Ke</center></th>
           

          </tr>
          <tr>
            
            <td style="width: 150px" valign="top"><?php echo $nama; ?><br><?php echo $tagihan; ?> </td>
            <td style="width: 150px" valign="top"><?php echo  $nama; ?><br><?php echo $kirim; ?> </td>
             
            
          </tr>
    
          
        </table>
       

    
    </div>

 

    <!-- Table row -->

      <br>
      
    <div class="row">

    
       
    <div class="col-13 table-responsive justify-content">
   
      
          <table style="margin-left: 45px;width: 92%;" id="tbl1" align="center" style="margin: auto;" border="1" align="center">
          <thead class="thead-dark" >
          <tr>
            <th style="width: 5%"><center>No</center></th>
            <th style="width: 10%"><center>Barang</center></th>
             <th style="width: 20%"><center>Deskripsi Barang</center></th>
               <th style="width: 20%"><center>Keterangan</center></th>
            <th style="width: 10%"><center>KTS</center></th>
            <th style="width: 6%"><center>Satuan</center></th>
          
          </tr>
          </thead>

          <tbody>
             <?php $no=0;
             foreach ($delivery_item as $k):
              $no++;

              ?>
          <tr>
            <td><center><?php echo $no ?></center></td>
            <td><center><?php echo $k->barang ?></center></td>
            <td><?php echo $k->deskripsi_barang ?></td>
            <td><?php echo $k->keterangan ?></td>
            <td><center><?php echo $k->kts ?></center></td>
             <td><center><?php echo $k->satuan ?></center></td>
         
          </tr>
           <?php endforeach ?>
          
          </tbody>
        </table>
        

        <p ><b>Barang diterima dalam keadaan baik dan cukup</b></p>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        
        
               

      </div>


     
      <!-- /.col -->
            <div class="float-right" >
        <br>
        
             <table align="right" class="table_footer" >
          
          <tr>
            
            <td ><center><font size="50px">Prepared By</center></td>
            <td ><center>Approved By</center></td>
            <td ><center>Shipped By</center></td>
            <td ><center>Received By</center></td>
          <tr >
            
            <td style="height: 50px"><center></center></td>
               <td ><center></center></td>
              <td ><center></center></td>
               <td><center></center></td>
           

          </tr>
         
           

          </tr>
           <tr>
            
               <td style="width: 200px;" ><center><hr style="  border: 1px solid black; width: 50%"></center></td>
              <td  style="width: 200px;"><center><hr style="  border: 1px solid black;  width: 50%"></center></td>
               <td style="width: 200px;"><center><hr style="  border: 1px solid black;  width: 50%"></center></td>
             <td style="width: 200px;" ><center><hr style="  border: 1px solid black;  width: 50%"></center></td>
           

          </tr>
         
        </table>
        <br>
         <br>
             
         <br>
           <br>
     
        

    
      </div>

   
    </div>

    
    <!-- /.row -->
  </section>

   

    <!-- /.content -->
  </div>
<script type="text/javascript"> 
      $("#deliveryMainNav").addClass('active');

   $("#openDeliveryNav").addClass('menu-open');
  window.addEventListener("load", window.print());
</script>

