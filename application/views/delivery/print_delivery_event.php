
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
  padding: 8px;
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
/*   .element {
     
       
        margin-right: 70px;
        top: 100px;
      
        border: 1px;
      
         border: 1px solid #000;
      
    }*/



#tbl1 thead th{
  color: black;
  
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
        
        
           <table style=" width: 50px;margin-top: -50px;" align="right"  >
          
          <tr>
            
            <td style="width: 130px; margin-top: -50px;"><center><b><font color="black" size=3 >Delivery Order</font></b></center>
              <hr style="width: 100%">
              <center><p align="top">Delivery Order No: <?php echo $delivery_order; ?></p></center>
            </td>
           

          </tr>
          <tr>
            
            <td valign="top" style="width: 150px"></td>
             
            
          </tr>
    
          
        </table>
     <br>
     
         <table style="width: 200px;margin-top: 30px;" border="1" align="right" >
          
          <tr>
            
            <th style="width: 130px"><center>Tanggal Pengiriman</center></th><td><center><?php echo $date_pengiriman ?></center></td>
           <center>

          </tr>
          <tr>
            
            <th style="width: 130px"><center>Gudang</center></th><td><center><?php echo  $gudang; ?></center></td>
             
            
          </tr>
           <tr>
            
            <th style="width: 130px"><center>Pengirim</center></th><th><center><?php echo $pengirim; ?></center></th>
           

          </tr>
           <tr>
            
            <th style="width: 130px">PO No.<center></center></th><td><center><?php echo  $po_number; ?></center></td>
           

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
                      <p style="margin-top: -90px;">PT.Magenta Mediatama<br>
  
         
          Jl. Raya kebayon Lama No 15 RT.04 RW.03 Grppl Utara<br>
          Kebayon Lama Jakarta Selatan DKI Jakarta-12210
         <br>
        phone (021) 53660077-08;Fax(021)53660099</p>
          <br>
        

    
      
      </div>
      <!-- /.col -->
    

     
          <br>

      
          <table style=" width: 200px" border="1">
          
          <tr>
            
            <th style="width: 200px"><center>Tagihan Ke</center></th>
            <th style="width: 200px"><center>Kirim Ke</center></th>
           

          </tr>
          <tr>
            
            <td style="width: 150px" valign="top"><?php echo $nama; ?><br><?php echo $tagihan; ?> </td>
            <td style="width: 150px" valign="top"><?php echo  $nama; ?><br><?php echo $kirim; ?> </td>
             
            
          </tr>
    
          
        </table>
       

    
    </div>

 

    <!-- Table row -->

      <br>
      <br>
    <div class="row">

    
       
    <div class="col-13 table-responsive justify-content">
   
      
                      <table style="width: 92%;" id="tbl1" align="center" style="margin: auto;" border="1" align="center">
              <thead class="thead-dark" >
              <tr>
                  <th scope="col" style="width: 5%;"><center>No</center></th>
                  <th scope="col" style="width: 50%;"><center>Description</center></th>
                  <th scope="col" style="width: 15%;"><center>Total</center></th>
               
              </tr>
               
              </thead>
                <tbody>
              <tr>
                  <td><center>1</center></td> 
                  <td>Total Non-Fee Cost</td> 
                  <th align="right"><?php echo "IDR ".$nonfee; ?></th>
                       
              </tr>
               <tr>
                  <td><center>2</center></td> 
                 <td>Total Commisionable Cost</td>
                  <th align="right"><?php echo "IDR ".$comissionable_cost; ?></th>
                       
              </tr>
               <tr>
                  <td><center>3</center></td> 
                  <td>Total Summary</td> 
                  <th align="right"><?php echo "IDR ".$total; ?></th>
                       
              </tr>
                  
        </table>
      
        <p style="margin-left: 5px"><b>Barang diterima dalam keadaan baik dan cukup</b></p>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <br>
        <br>
               

      </div>


      
      <!-- /.col -->
            <div class="float-right" >
        <br>
        
             <table align="right" >
          
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

