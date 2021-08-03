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
     <div class="card">
       <div class="card-header">
         <h5 class="box-title"><b>Payment</b></h5>
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
           <span id="un-finished_payment"> </b></span>
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
          
           <h5><b>Invoice Payment</b></h5>
           <span id="payment"> IDR 0</b></span>
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
            
                <select required ="" class="form-control account" id="account"  aria-label="Default select example">
                <option selected></option>
                
        </select>
            </div>
           </div>
           <div class="form-group" id="qnumber">
              <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">Amount </label>
              <div class="col-sm-12">
              <input required =""  style="text-align:right" type="text" class="form-control" id="amount" name="amount" placeholder="">
            </div>
           </div>

           <div class="form-group" id="qnumber">
              <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">Note </label>
              <div class="col-sm-12">
              <input   type="text" class="form-control" id="description" name="description" placeholder="">
            

            </div>
           </div>


           

           <div class="form-group">
               
            </div>

            <button type="submit" class="btn btn-primary btnSave" type="button">
                        <span  class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                        Save
                      </button>
  

            
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
                        <th style="width: 15%">No. Inovoice</th>
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
                        <th style="width: 15%">No. Inovoice</th>
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
 var total_amount;
 var data_transactions=[];
 var payment_faktur=[];
 var data_faktur=[];
 
  $(document).ready(function() { 
    showIndikatorForevent();
  
    transactionNumber()
    accounts();

    UnFinieshed()
    Finieshed();
    $('#use-datatable-finished').DataTable({});
    $('#use-datatable').DataTable({});
    hiddenindikator();
   
  
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
      var checked = $(this).find('td:nth-child(7) input:checked').val();
      if (checked=="on"){
        var faktur_number = $(this).find('td:nth-child(1)').html();
        var remaining = $(this).find('td:nth-child(6)').html();
        var jumlah_bayar = $(this).find('td:nth-child(5)').html();
        var grand_total = $(this).find('td:nth-child(4)').html();

        var data={
          faktur_number:faktur_number,
          grand_total:grand_total.replace(/[^\w\s]/gi, ''),
          jumlah_bayar:jumlah_bayar.replace(/[^\w\s]/gi, ''),
          remaining:remaining.replace(/[^\w\s]/gi, '')
        }
        data_faktur.push(data)
   
        payment=Number(payment)+Number(remaining.replace(/[^\w\s]/gi, ''));
        



      }
      total_amount=payment.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('#payment').text(`IDR ${payment.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}`)
    //  console.log(checked)
   
});


		}

function UnFinieshed() {
  
      $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/api/faktur/'+<?php echo $id ?>+'/payment',
        dataType: 'json',
        success: function(response) {
          $('#total_faktur_unfinished').text(response.data.total_faktur_finished.amount)
          $('#total_faktur_finished').text(response.data.total_faktur_unfinished.amount)
          
          

          var baris = '';
          var unFinishedPayment=0;
          if (response.data.unfinished_faktur.length > 0) {
             for (var i = 0; i < response.data.unfinished_faktur.length; i++) {
               var total_faktur=response.data.unfinished_faktur[i].total_faktur;
               var pembayaran=response.data.unfinished_faktur[i].pembayaran==null?0:response.data.unfinished_faktur[i].pembayaran
               var remaining=total_faktur-pembayaran;
               unFinishedPayment=unFinishedPayment+remaining;

              baris += '<tr>' +
                '<td style="width: 20%">' + response.data.unfinished_faktur[i].faktur_number + '</td>' +
              
                '<td style="width: 10%">' +response.data.unfinished_faktur[i].date_faktur + '</td>' +
                '<td style="width: 20%">' +response.data.unfinished_faktur[i].syarat_pembayaran + '</td>' +

                '<td style="width: 15%" align="right">' + response.data.unfinished_faktur[i].total_faktur.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
                '<td style="width: 15%" align="right">' + pembayaran.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
                
                '<td style="width: 15%" align="right">' + remaining.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
                

                `<td style="width: 15%" align="center"> <div class="form-check"><input type="checkbox" class="form-check-input" id="checked" oninput="payment()" ></div></td>`

               
                '</tr>';

            }
            $('#un-finished_payment').text(`IDR ${unFinishedPayment.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}`)
           
          }

          $("#UnFinished").html(baris);
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
            '<td style="width: 20%">' +response.data.finished_faktur[i].faktur_number + '</td>' +
          
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
        $('#account').append('<option id=' + response.data[i].id + ' value=' + response.data[i].id + '>' + response.data[i].bank_name  + '</option>');
        
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
      console.log(response.data)
      
      


    },
    error: function(response) {
      console.log(response);




    }

  });
}

$('#saveData').submit(function(e) {
    e.preventDefault();
  
    data_transactions=[]
    payment_faktur=[]
    

    var transaction_number = $('#transaction_number').text();
    var account_id = $('#account').val();
    var payment = $('#amount').val().replace(/[^\w\s]/gi, '');
    var description =$('#description').val();
    var tempTotalAmount=total_amount.replace(/[^\w\s]/gi, '');


    // (amount,transaction_number,faktur_id,account_id)
    data_faktur.map((value)=>{
      var payment_item;
      var tempPaymentFaktur;
      console.log(value.remaining)
      if (tempTotalAmount>value.remaining){
        tempTotalAmount=tempTotalAmount-value.remaining;
        payment_item=[value.amount,transaction_number,value.faktur_number,account_id];  
        tempPaymentFaktur={faktur_number:value.faktur_number,pembayaran:Number(value.remaining)+Number(value.jumlah_bayar)} 

      }else{

      tempPaymentFaktur=tempTotalAmount
       
        payment_item=[tempTotalAmount,transaction_number,value.faktur_number,account_id]

        tempPaymentFaktur={faktur_number:value.faktur_number,pembayaran:Number(tempTotalAmount)+Number(value.jumlah_bayar)} 

      }
      payment_faktur.push(tempPaymentFaktur);
      data_transactions.push(payment_item);

    
     
     

    })

    console.log(data_faktur)
      console.log(data_transactions);

   

    // $.ajax({
    //     type: "post",
    //     url: '<?php echo base_url("Quotation/cekQuotationOther/") ?>',
    //     data: 'quotation_number=' + quotation_number,
    //     dataType: 'json',
    //     data:{
    //       total_amount:total_amount,
    //       account_id:account_id,
    //       payment:payment,
    //       description:description,
    //       transaction_number:transaction_number


    //     },
    //     success: function(hasil) {


    //       // if (hasil.status == 'tersedia') {
    //       //   Swal.fire({
    //       //     title: 'Oops',
    //       //     text: "Quotation number sudah tersedia,lakukan update quotation dengan menekan tombol update QO  sebeleum menyimpan  data quotation other",
    //       //     icon: 'info',
    //       //     showCancelButton: true,
    //       //     confirmButtonColor: '#3085d6',
    //       //     cancelButtonColor: '#808080',
    //       //     cancelButtonText: 'Tidak',
    //       //     confirmButtonText: 'Update QO'
    //       //   }).then((result) => {
    //       //     if (result.value) {

    //       //       generet_quotation_other();
    //       //       hiddenIndikatorForother();
    //       //       Swal.fire({
    //       //         position: 'center',
    //       //         icon: 'success',
    //       //         title: 'Quotation number has been updated',
    //       //         showConfirmButton: false,
    //       //         timer: 1500
    //       //       });


    //       //     }
    //       //   });


    //       // } else {

    //       //   $("#SimpanDataOther").submit();
          
    //       // }


    //     },
    //     error: function(hasil) {




    //     }


    //   });




 

  });







 
    

    
   $("#customerMainNav").addClass('active');
   $("#manageCustomerNav").addClass('active');
   $("#openCustomerNav").addClass('menu-open');

 </script>