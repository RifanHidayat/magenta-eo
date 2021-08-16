<style>
.container {
    background-color: white;
    width: auto;
    height: auto;
}
.header{
    background-color: #0984e3;
    display: flex;
    justify-content: space-between;   
}
.detail_faktur{
    color: #222f3e ;
    font-size: 25px;
    height: 150px;
    justify-content: right;
    margin-top: 75px;
    margin-left: 20px;
    color: #2d3436;
    
}

.invoice_number{
    color: #c8d6e5 ;
    font-size: 30px;
    height: 150px;
    justify-content: right;
    margin-top: 75px;
    margin-left: 20px;
    margin-right: 20px;
    
}

.body{
    margin-right: 20px;
    margin-left: 20px;
    background-color: white;
    height: auto;
    margin-top: 50px;

    display: flex;
    justify-content: space-between; 
}
.body_left{
 

    display: flex;
    width: 40%;



}
.body_left_content2{


  padding: 1px;
  height: auto;
  margin-left: 30%;
  background: #c8d6e5;
  margin: 0 auto;
}

.body_right{
  
  width: 60%;
  justify-content: space-between; 
}

.body_right_content1{

  display: flex;
  justify-content: space-between; 
  
  
}
.body_right_content2{


        width: auto;
        margin: 0 auto;
        padding: 1px;
        background: #c8d6e5;
        margin-top: 30px;
}


span{
    font-size: 16px;
    color: #57606f;
}

.footer{


 display: flex;
 width: 100%;
 margin-top: 150px;
 margin-bottom: 100px;


}
.footer_empty{

  width: 40%;

}
.footer_content{
  margin-right: 20px;
  
  
  width: 60%;
  
}
.fotter_conten1{
  display: flex;
  justify-content: space-between;
  margin-top: 30px;
}
.label{

height: 40%;
width: 20%;
}




</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div><!-- /.col -->
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="content">


  <section class="content">
<div class="container">

<div class="header">
    <div class="detail_faktur">Detail Faktur</div>
    <div class="invoice_number"><?php echo $faktur_number ?></div>
</div>
<div class="body">
<div class="body_left">
   <div class="body_left_content1">
   <span>Customer</span><br>
    <span style="color:#ced6e0;"><?php echo $customer_name ?></span>
    <br>
    <br>
    <span>Nomor Faktur</span><br>
    <span style="color:#ced6e0;"><?php echo $faktur_number ?></span>
    <br>
    <br>
    <span>tanggal</span><br>
    <span style="color:#ced6e0;"><?php echo $date_faktur ?></span>

    <br>
    <br>
    <span>Status</span><br>
   
   <?php 
   if ($unpaid>0){
     $status='<h5><span class="label" style="background-color: #F39C12;" >Belum Lunas</span></h5>';

   } else{
     $status= '<h5><span class="label" style="background-color: #1ABC9C;" >Lunas</span></h5>'; 
   
   }
   echo $status
   
  
   ?>
    
  </div>

  <div class="body_left_content2">   
      
  </div>

</div>

<div class="body_right">
<div class="body_right_content1">
  <div>
  <span>
    ITEM
  <span>  
</div>

<div>
</div>

<div>
<span>
    AMOUNT
  <span>  
</div>



</div>

<div class="body_right_content2">   
      
</div>

  <div style="margin-top: 30px;">
  <span >
    Quotataion 
  </span>
  <span style="margin-top: 30px;">
    <?php echo $print_quotation ?>
  </span>

</div> 

<div style="margin-top: 30px;">
  <span  >
    <b>HISTORY PEMBAYARAN</b>
  </span>
  
</div> 

<div  style="margin-top: 20px;">
<table width="100%"  class="table">
       <tr>
       <td width="30%">
       <span style="color: #a4b0be;">TANGGAL</span>
        </td>
        <td width="35%">
       <span style="color: #a4b0be;">DESKRIPSI</span>
        </td>
   
        <td align="right" width="35%">
        <span style="color: #a4b0be;">AMOUNT</span>
        
        </td>
        </tr>
        <tbody id="transactions"></tbody>

      
       
       </table> 
 


</div>



</div>   
</div>

<div class="footer">
  <div class="footer_empty">
  
</div>
<div class="footer_content">
<div class="fotter_conten1">

<div>
  <span style="color: #a5b1c2;">TOTAL INVOICE</span>
</div>

<div>
<span style="color: #a5b1c2;"> <?php echo 'IDR '.number_format($total_faktur,0,',','.') ?> <span>
</div>

</div>
<div class="fotter_conten1">
  
<div>
  <span style="color: #a5b1c2;">TOTAL PAID</span>
</div>

<div>
<span style="color: #a5b1c2;"><?php echo 'IDR '.number_format($paid,0,',','.')  ?> </span>
</div>

</div>
<div class="fotter_conten1">
  
<div>
<span style="color: #a5b1c2;"> TOTAL UNPAID </span>
</div>

<div>
<span style="color: #a5b1c2;"> <?php echo 'IDR '.number_format($unpaid,0,',','.')  ?> </span>
</div>

</div>
</div>
</div >

    
<!-- /.container-fluid -->
</section>
  



<!-- /.content -->
</div>
<script type="text/javascript">


$(document).ready(function() {
  transactionsData()

     });

function transactionsData() {

  var description="";

        try {
          var row= '';
            axios.get(`http://localhost:3000/api/faktur/<?php echo $faktur_number ?>/payment/invoice`).then((response)=>{
              
   
           

            response.data.data.map((value)=>{
              if (value.transaction_number!=null){
                description=`<a href="/magentaeo/Transactions/detail/${value.id}">#${value.transaction_number}</a> / <b>${value.bank_name}</b>`

              }else{
                description=`${value.pic_name} / <b> Saldo TB</b>`


              }

              var date_format = new Date(value.date);
              row+=`
              <tr>
                <td>
                ${date_format.getDate()+'/'+ date_format.getMonth(2)+'/'+date_format.getFullYear()}
                </td>
                <td>
                ${
                  description
                }
                </td>
              
                <td align="right">
                <span style="color:green" >IDR ${value.amount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}<span>
                </td>

              </tr>
           
              
              `;


            })
            $("#transactions").html(row);
          
            })
    


    
  } catch (errors) {
    console.error(errors);
  }
};



  $("#fakturMainNav").addClass('active');

  $("#openFakturNav").addClass('menu-open');
</script>