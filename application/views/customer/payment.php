<div class="content-wrapper" id="app">
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
   <!-- /.content-header -->

   <!-- Main content -->


   <section class="content">
  

   <div class="pills-regular">
          <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">

              <li class="nav-item active" id="members">
              <!-- <button type="button" class="btn btn-outline-primary">
              <i class="fa fa-dollar"> QE
              </button> -->
              <button type="button"  class="btn btn-primary" >Quotation Event</i></button>
               </li>&ensp;
              <li class="nav-item" id="budgets" to="/projects/manage">

              
              <button onclick="location.href='<?php echo base_url('Customer/paymentqo/'.$id) ?>'" type="button" class="btn btn-outline-primary">Quotation Other</button>
               </li>&ensp;
          </ul>
      </div>



     <div class="card">
       <div class="card-header">
       <h5 class="box-title"><b>Payment invoice <?php echo $name ?></b></h5>
         <div class="card-tools" style="margin-top: -35px;margin-right: 3px">
           <a href="<?php echo base_url('Customer/manage_customer') ?>" class="btn btn-secondary">
             <font color="white">Back</font>
           </a>
         </div>


       </div>
       <div class="card-body">
    

       <div class="row ">
           <div class="col-md-6 col-xs-6 row "    >
           <div class="col-md-6 col-xs-6 p-3 mb-2 bg-light text-dark" style="background-color: coral;" >
           <h5><b>Un-Finished Payment</b></h5>
           <span id="un-finished_payment"> IDR 0 </b></span>
           <br>
           <br>
          
          
           <h5><b>Total Un-Finished Invoice</b></h5>
           <span id="total_faktur_unfinished">0 </b></span>
           <br>
           <br>
          
         
           <h5><b>Total Finished Invoice</b></h5>
           <span id="total_faktur_finished"> 0 </b></span>
           <br>
           <br>
          
           <h5><b>Payment</b></h5>
           IDR <span id="payment">0</b></span><br>
           <small class="text-danger pl-3" id="payment_error"></small>
           <br>
           <br>
           
           </div>
           <br>
              
           <br>
           <br>
           <br>
           </div>

           <div class="col-md-6 col-xs-6">
           <form id="saveData" name="formid" class="form-horizontal" enctype="multipart/form-data" autocomplete="off" >     
              <div class="form-group" id="qnumber">
              <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">No. Transaksi </label>
              <div class="col-sm-12">
              <h5> <span  class="badge badge-pill badge-primary transaction_number" id="transaction_number"></span></h5>
            </div>
           </div>

           

           <div class="form-group" id="qnumber">
              <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">Account </label>
              <div class="col-sm-12">
            
                <select class="form-control account" id="account"  aria-label="Default select example">
                <option value="0" selected></option>
                
        </select>
        <small class="text-danger pl-3" id="account_error"></small>
            </div>
           </div>
           <div class="form-group" id="qnumber">
              <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">Date</label>
              <div class="col-sm-12">
              <input required    class="form-control" id="date_transaction" name="date_transaction" placeholder="yyyy-mm-dd">
            

            </div>
           </div>
           <div class="form-group" id="qnumber">
              <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">Amount </label>
              <div class="col-sm-12">
              <input required ="" onkeyup="convertToRupiah(this);"  style="text-align:right" type="text" class="form-control" id="amount" name="amount" placeholder="">
            </div>
           </div>

           <div class="form-group" id="qnumber">
              <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">Note </label>
              <div class="col-sm-12">
              <input   type="text" class="form-control" id="description" name="description" placeholder="">
            

            </div>
           </div>
           <div class="form-group" id="qnumber">
              <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">Beban </label>
              <div class="col-sm-2" style="color: red;" align="left">
              <input id="account_beban" class="account_beban" style="color: black;" align="left" size="14" type="checkbox" id="html" name="fav_language" value="HTML">
              </div>
              <br>
              <br>
              <div  class="col-sm-7 info_beban" style="color: red;" align="left">
              Pembayaran masuk keakun beban
              </div>
                  
            </div>
           
           <div class="form-group">
               
            </div>

            <div align="right">
            <button type="submit" class="btn btn-primary btnSave" type="button">
                        <span  class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                        Save
                      </button>

              </div>
  

            
            </form>
           </div>
        </div>
        <hr>
      <!-- //table invoice -->
      <br>
      <br>
      

      <table id="use-datatable" class="table table-bordered table-striped tablecustomer">
                    <thead>
                      <tr>              
                      <th style="width: 10%">No. Inovoice</th>
                        <th style="width: 10%" >Quotation</th>
                        <th style="width: 10%" >No. Project</th>
                        <th>Tanggal invoice</th>
                        <th>Syarat pembayaran</th>
                        <th>Grand Total</th>
                        <th>jumlah bayar</th>
                        <th>Sisa pembayaran</th>
                        
                        <th></th>
                      </tr>
                    </thead>
                    <tbody id="UnFinished"></tbody>
        </table>
       </div>

       <!-- /.row -->
     </div>

 
   <div class="card">
       <div class="card-header">
         <h5 class="box-title"><b>Payment Finished</b></h5>
         <div class="card-tools" style="margin-top: -35px;margin-right: 3px">
           
           </a>
         </div>


       </div>
       <div class="card-body">

       <div class="row ">


      <table id="use-datatable-finished" class="table table-bordered table-striped tablecustomer">
                    <thead>
                      <tr>              
                        <th style="width: 10%">No. Inovoice</th>
                        <th style="width: 10%" >Quotation</th>
                        <th style="width: 10%" >No. Project</th>
                        <th>Tanggal invoice</th>
                        <th>Syarat pembayaran</th>
                        <th>Grand Total</th>
                        <th>jumlah bayar</th>
                        <th>Sisa pembayaran</th>        
                    
                      </tr>
                    </thead>
                    <tbody id="Finished"></tbody>
        </table>
       </div>

       <!-- /.row -->
     </div>

   <!-- /.content -->
 </div>
 </section>
 <script>
 var total_amount=0;
 var data_transactions=[];
 var payment_faktur=[];
 var data_faktur=[];
 var account_beban=false;
 
  $(document).ready(function() { 
    $('.info_beban').hide();

    showIndikatorForevent();
    transactionNumber()
    accounts();
    UnFinieshed()
    Finieshed();
    hiddenindikator();
    

const checkbox = document.getElementById('account_beban')
checkbox.addEventListener('change', (event) => {
  if (event.currentTarget.checked) {
    account_beban=true;
   
    $('.info_beban').show();
  } else {
    $('.info_beban').hide();
    account_beban=false;
   
  }
})

   
  
  });
  function showIndikatorForevent() {
    $('.btnSave').attr('disabled', 'disabled');
    $('.loadingIndikdator').show();
  }
  function hiddenindikator() {
    $('.btnSave').removeAttr('disabled', 'disabled');
    $('.loadingIndikdator').hide();
  }


  
  function payment() {
    var payment=0;
    data_faktur=[];

    $('#use-datatable tbody tr').each(function() {
      var checked = $(this).find('td:nth-child(9) input:checked').val();
      console.log(checked)
      if (checked=="on"){
        var faktur_number = $(this).find('td:nth-child(1) a').html();
        var quotation_number = $(this).find('td:nth-child(2)').html();
        var project_number = $(this).find('td:nth-child(3)').html();
        var remaining = $(this).find('td:nth-child(8)').html();
        var jumlah_bayar = $(this).find('td:nth-child(7)').html();
        var grand_total = $(this).find('td:nth-child(6)').html();
        console.log('faktur_number',faktur_number)
      
        var data={
          faktur_number:faktur_number,
          project_number:project_number,
          quotation_number:quotation_number,
          grand_total:grand_total.replace(/[^\w\s]/gi, ''),
          jumlah_bayar:jumlah_bayar.replace(/[^\w\s]/gi, ''),
          remaining:remaining.replace(/[^\w\s]/gi, '')
        }
        data_faktur.push(data)
   
        payment=Number(payment)+Number(remaining.replace(/[^\w\s]/gi, ''));
        

      }
      total_amount=payment.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('#payment').text(` ${payment.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}`)
    //  console.log(checked)
   
  });


		}

function UnFinieshed() {
  
      $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/api/faktur/'+<?php echo $id ?>+'/payment',
        dataType: 'json',
        success: function(response) {
          $('#total_faktur_unfinished').text(response.data.total_faktur_unfinished.amount)
          $('#total_faktur_finished').text(response.data.total_faktur_finished.amount)
          
          

          var baris = '';
          var unFinishedPayment=0;
          if (response.data.unfinished_faktur.length > 0) {
             for (var i = 0; i < response.data.unfinished_faktur.length; i++) {
               var total_faktur=response.data.unfinished_faktur[i].total_faktur;
               var pembayaran=response.data.unfinished_faktur[i].pembayaran==null?0:response.data.unfinished_faktur[i].pembayaran
               var remaining=total_faktur-pembayaran;
               unFinishedPayment=unFinishedPayment+remaining;

              baris += '<tr>' +
              // '<td style="width: 15%"><a href="/magentaeo/Faktur/payment_history/'+response.data.unfinished_faktur[i].faktur_number +'"></a>'+response.data.unfinished_faktur[i].faktur_number +'</td>' +
              
                // '<td style="width: 10%">' + response.data.unfinished_faktur[i].faktur_number + '</td>' +

                `<td style="width: 10%"><a href="/magentaeo/Faktur/payment_history/${response.data.unfinished_faktur[i].faktur_number}">${response.data.unfinished_faktur[i].faktur_number }</a></td>` +
             
                '<td style="width: 10%" >' + response.data.unfinished_faktur[i].quotation_number + '</td>' +
                '<td style="width: 10%" >' + response.data.unfinished_faktur[i].project_number + '</td>' +
                
              
                '<td style="width: 10%">' +response.data.unfinished_faktur[i].date_faktur + '</td>' +
                '<td style="width: 15%">' +response.data.unfinished_faktur[i].syarat_pembayaran + '</td>' +

                '<td style="width: 13%" align="right">' + response.data.unfinished_faktur[i].total_faktur.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
                '<td style="width: 13%" align="right">' + pembayaran.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
                
                '<td style="width: 13%" align="right">' + remaining.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
                

                `<td style="width: 18%" align="center"> <div class="form-check"><input type="checkbox" class="form-check-input" id="checked" oninput="payment()" ></div></td>`           
                '</tr>';

            }
            $('#un-finished_payment').text(`IDR ${unFinishedPayment.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}`)
           
          }

          $("#UnFinished").html(baris);
       
    $('#use-datatable').DataTable({});
        },
        error: function(response) {      
          console.log(response.data);

        }

      });
    }


    function Finieshed() {
  
  $.ajax({
    type: 'GET',
    url: 'http://localhost:3000/api/faktur/'+<?php echo $id  ?>+'/payment',
    dataType: 'json',
    success: function(response) {
      var baris = '';
      if (response.data.finished_faktur.length > 0) {
         for (var i = 0; i < response.data.finished_faktur.length; i++) {
          var total_faktur=response.data.finished_faktur[i].total_faktur;
          var pembayaran=response.data.finished_faktur[i].pembayaran==null?0:response.data.finished_faktur[i].pembayaran
         var remaining=total_faktur-pembayaran;
      
          baris += '<tr>' +
            // '<td style="width: 15%">' +response.data.finished_faktur[i].faktur_number + '</td>' +
            `<td style="width: 15%"><a href="/magentaeo/Faktur/payment_history/${response.data.finished_faktur[i].faktur_number}">${response.data.finished_faktur[i].faktur_number }</a></td>` +
            
            
            '<td style="width: 10%" >' + response.data.finished_faktur[i].quotation_number + '</td>' +
            '<td style="width: 15%">' +response.data.finished_faktur[i].project_number + '</td>' +
           
            
            '<td style="width: 10%">' +response.data.finished_faktur[i].date_faktur + '</td>' +
            '<td style="width: 20%">' +response.data.finished_faktur[i].syarat_pembayaran + '</td>' +

            '<td style="width: 15%" align="right">' + response.data.finished_faktur[i].total_faktur.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
            '<td style="width: 15%" align="right">' + pembayaran.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
            '<td style="width: 15%" align="right">' + remaining.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
            '<td style="width: 8%"></td>' +
            '</tr>';

        }
       
      } 

      $("#Finished").html(baris);
      $('#use-datatable-finished').DataTable({});
    

    },
    error: function(response) {
      console.log(response);
    }

  });
}

function accounts() {
  
  $.ajax({
    type: 'GET',
    url: 'http://localhost:3000/api/accounts',
    dataType: 'json',
    success: function(response) {
      for (var i=0; i<response.data.length; i++){
        if ((response.data[i].id==100) || (response.data[i].id==108) ){
        

        }else{
          $('#account').append('<option id=' + response.data[i].id + ' value=' + response.data[i].id + '>' + response.data[i].bank_name  + '</option>');

        }
      
        
      }
    

    },
    error: function(response) {
      console.log(response);




    }

  });
}

function transactionNumber() {
  
  $.ajax({
    type: 'GET',
    url: 'http://localhost:3000/api/faktur/payment-number',
    dataType: 'json',
    success: function(response) {
      $('#transaction_number').text(response.data)
    },
    error: function(response) {
      console.log(response);
    } 
  });
}

$('#saveData').submit(function(e) {
    e.preventDefault();
 


  var payment_error = document.getElementById("payment_error");
  var account_error = document.getElementById("account_error");
  if (total_amount==0){
    payment_error.textContent="* Belum ada pembayaran "
    


  }else{
    if (account_beban==false){
      if ($('#account').val()=='0'){

        account_error.textContent="Account tidak boleh kosong"
       






      }else{
        account_error.textContent=""
        payment_error.textContent="";
        

data_transactions=[]
payment_faktur=[]


var transaction_number = $('#transaction_number').text();
var account_id = $('#account').val();
var payment = $('#amount').val().replace(/[^\w\s]/gi, '');
var description =$('#description').val();
var tempTotalAmount=total_amount.replace(/[^\w\s]/gi, '');
var date_transaction=$('#date_transaction').val();


// (amount,transaction_number,faktur_id,account_id)
data_faktur.map((value)=>{
  var payment_item;
  var tempPaymentFaktur;
  console.log(value.remaining)
  if (Number(payment)>Number(value.remaining)){
    payment=payment-value.remaining.replace(/[^\w\s]/gi, '');
    payment_item=[value.remaining.replace(/[^\w\s]/gi, ''),transaction_number,value.faktur_number,account_id];  
    tempPaymentFaktur={faktur_number:value.faktur_number,project_number:value.project_number,quotation_number:value.quotation_number,total_pembayaran_faktur:Number(value.remaining)+Number(value.jumlah_bayar),amount:value.remaining.replace(/[^\w\s]/gi, ''),account_id:account_id,account_beban:account_beban} 

  }else{      
    payment_item=[payment,transaction_number,value.faktur_number,account_id]
    tempPaymentFaktur={faktur_number:value.faktur_number,project_number:value.project_number,quotation_number:value.quotation_number,total_pembayaran_faktur:Number(payment)+Number(value.jumlah_bayar),amount:payment,account_id:account_id,account_beban:account_beban} 
    payment=0
  }
  payment_faktur.push(tempPaymentFaktur);
  data_transactions.push(payment_item);
})

console.log(payment_faktur)
console.log(data_transactions);

console.log(date_transaction)


var data_transaction={}
$.ajax({
    type: "post",
    url: 'http://localhost:3000/api/faktur/payment',

    dataType: 'json',
    data:{
      total_amount:$('#amount').val().replace(/[^\w\s]/gi, ''),
      date_transaction:date_transaction,
      customer_id:<?php echo $id ?>+"",
      account_id:account_id,
      payment:payment,
      description:description,
      transaction_number:transaction_number,
      payment_faktur:payment_faktur,
      data_transactions:data_transactions


    },
    success: function(response) {


var data_transaction={
  transaction_id:"<?php $name ?>_<?php echo $id ?>",
  date:date_transaction,
  account_id:account_id,
  description:`<?php echo $name ?>/${description}`,
  amount:payment,


}



    if (payment>0){
      axios.post("http://localhost:3000/api/accounts/transaction/remaining",data_transaction).then((response)=>{
        Swal.fire({
              title: "success!",
              text: "Transaksi berhasil disimpan",
              icon: "success",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false
            });
            
            setTimeout(function() {
              window.location = "<?php echo base_url('Customer/manage_customer/') ?>";
            }, 2500);


            hiddenindikator();
        
      })
      .catch((error)=>{
        Swal.fire({
              title: "error",
              text: "terjadi kesalahan",
              icon: "error",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false
            });
            
            // setTimeout(function() {
            //   window.location = "<?php echo base_url('Customer/manage_customer/') ?>";
            // }, 2500);


            hiddenindikator();

      })

    }else{
      Swal.fire({
              title: "success!",
              text: "Transaksi berhasil disimpan",
              icon: "success",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false
            });
            
            setTimeout(function() {
              window.location = "<?php echo base_url('Customer/manage_customer/') ?>";
            }, 2500);


            hiddenindikator();
     


    }



    },
    error: function(error) {
      Swal.fire({
              title: "error",
              text: "terjadi kesalahan",
              icon: "error",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false
            });

      hiddenindikator();




    }


  });



      }
      
    }else{ 
      payment_error.textContent="";

data_transactions=[]
payment_faktur=[]


var transaction_number = $('#transaction_number').text();
var account_id = $('#account').val();
var payment = $('#amount').val().replace(/[^\w\s]/gi, '');
var description =$('#description').val();
var tempTotalAmount=total_amount.replace(/[^\w\s]/gi, '');
var date_transaction=$('#date_transaction').val();


// (amount,transaction_number,faktur_id,account_id)
data_faktur.map((value)=>{
  var payment_item;
  var tempPaymentFaktur;
  console.log(value.remaining)
  if (Number(payment)>Number(value.remaining)){
    payment=payment-value.remaining.replace(/[^\w\s]/gi, '');
    payment_item=[value.remaining.replace(/[^\w\s]/gi, ''),transaction_number,value.faktur_number,account_id];  
    tempPaymentFaktur={faktur_number:value.faktur_number,project_number:value.project_number,quotation_number:value.quotation_number,total_pembayaran_faktur:Number(value.remaining)+Number(value.jumlah_bayar),amount:value.remaining.replace(/[^\w\s]/gi, ''),account_id:account_id,account_beban:account_beban} 

  }else{      
    payment_item=[payment,transaction_number,value.faktur_number,account_id]
    tempPaymentFaktur={faktur_number:value.faktur_number,project_number:value.project_number,quotation_number:value.quotation_number,total_pembayaran_faktur:Number(payment)+Number(value.jumlah_bayar),amount:payment,account_id:account_id,account_beban:account_beban} 
    payment=0
  }
  payment_faktur.push(tempPaymentFaktur);
  data_transactions.push(payment_item);
})

console.log(payment_faktur)
console.log(data_transactions);

console.log(date_transaction)


var data_transaction={}
$.ajax({
    type: "post",
    url: 'http://localhost:3000/api/faktur/payment',

    dataType: 'json',
    data:{
      total_amount:$('#amount').val().replace(/[^\w\s]/gi, ''),
      date_transaction:date_transaction,
      customer_id:<?php echo $id ?>+"",
      account_id:account_id,
      payment:payment,
      description:description,
      transaction_number:transaction_number,
      payment_faktur:payment_faktur,
      data_transactions:data_transactions


    },
    success: function(response) {


var data_transaction={
  transaction_id:"<?php $name ?>_<?php echo $id ?>",
  date:date_transaction,
  account_id:account_id,
  description:`<?php echo $name ?>/${description}`,
  amount:payment,


}



    if (payment>0){
      axios.post("http://localhost:3000/api/accounts/transaction/remaining",data_transaction).then((response)=>{
        Swal.fire({
              title: "success!",
              text: "Transaksi berhasil disimpan",
              icon: "success",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false
            });
            
            setTimeout(function() {
              window.location = "<?php echo base_url('Customer/manage_customer/') ?>";
            }, 2500);


            hiddenindikator();
        
      })
      .catch((error)=>{
        Swal.fire({
              title: "error",
              text: "terjadi kesalahan",
              icon: "error",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false
            });
            
            // setTimeout(function() {
            //   window.location = "<?php echo base_url('Customer/manage_customer/') ?>";
            // }, 2500);


            hiddenindikator();

      })

    }else{
      Swal.fire({
              title: "success!",
              text: "Transaksi berhasil disimpan",
              icon: "success",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false
            });
            
            setTimeout(function() {
              window.location = "<?php echo base_url('Customer/manage_customer/') ?>";
            }, 2500);


            hiddenindikator();
     


    }



    },
    error: function(error) {
      Swal.fire({
              title: "error",
              text: "terjadi kesalahan",
              icon: "error",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false
            });

      hiddenindikator();




    }


  });


    }
  


  }
  
 



 

  });



  $(function() {


$('#date_transaction').datepicker({
  dateFormat: 'yy-mm-dd',
  showButtonPanel: true,
  changeMonth: true,
  changeYear: true,

  buttonImageOnly: true,

  maxDate: '+30Y',
  yearRange: '1999:2030',
  inline: true
});
});
 
    

    
   $("#customerMainNav").addClass('active');
   $("#manageCustomerNav").addClass('active');
   $("#openCustomerNav").addClass('menu-open');

 </script>
   <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js') ?>"></script>



