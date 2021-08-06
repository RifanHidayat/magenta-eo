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
              <button onclick="location.href='<?php echo base_url('Customer/paymentqe/'.$id) ?>'"  type="button" class="btn btn-outline-primary">Quotation Event</i></button>
               </li>&ensp;
              <li class="nav-item" id="budgets" to="/projects/manage">

              
              <button type="button" class="btn btn-primary">Quotation Other</button>
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
              <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">Date</label>
              <div class="col-sm-12">
              <input required   type="date" class="form-control" id="date_transaction" name="date_transaction" placeholder="">
            

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
                      <th style="width: 15%">No. Inovoice</th>
                        <th style="width: 15%" >Quotation</th>
                       
                        <th>Tanggal invoice</th>
                        <th>Syarat pembayaran</th>
                        <th>Grand Total</th>
                        <th>jumlah bayar</th>
                        <th>Sisa pembayaran</th>
                        
                        <th style="width: 5%"></th>
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
      var checked = $(this).find('td:nth-child(8) input:checked').val();
      console.log(checked)
      if (checked=="on"){
        var faktur_number = $(this).find('td:nth-child(1)').html();
        var quotation_number = $(this).find('td:nth-child(2)').html();
     
        var remaining = $(this).find('td:nth-child(7)').html();
        var jumlah_bayar = $(this).find('td:nth-child(6)').html();
        var grand_total = $(this).find('td:nth-child(5)').html();
     
        

        var data={
          faktur_number:faktur_number,
          quotation_number:quotation_number,
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
        url: 'http://localhost:3000/api/faktur/'+<?php echo $id ?>+'/payment-qo',
        dataType: 'json',
        success: function(response) {
          $('#total_faktur_finished').text(response.data.total_faktur_finished.amount)
          $('#total_faktur_unfinished').text(response.data.total_faktur_unfinished.amount)
          
          

          var baris = '';
          var unFinishedPayment=0;
          if (response.data.unfinished_faktur.length > 0) {
             for (var i = 0; i < response.data.unfinished_faktur.length; i++) {
               var total_faktur=response.data.unfinished_faktur[i].total_faktur;
               var pembayaran=response.data.unfinished_faktur[i].pembayaran==null?0:response.data.unfinished_faktur[i].pembayaran
               var remaining=total_faktur-pembayaran;
               unFinishedPayment=unFinishedPayment+remaining;

              baris += '<tr>' +
              
                '<td style="width: 15%">' + response.data.unfinished_faktur[i].faktur_number + '</td>' +
             
                '<td style="width: 15%" >' + response.data.unfinished_faktur[i].quotation_number + '</td>' +
                
                
              
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
    url: 'http://localhost:3000/api/faktur/'+<?php echo $id  ?>+'/payment-qo',
    dataType: 'json',
    success: function(response) {
      var baris = '';
      if (response.data.finished_faktur.length > 0) {
         for (var i = 0; i < response.data.finished_faktur.length; i++) {
          var total_faktur=response.data.finished_faktur[i].total_faktur;
          var pembayaran=response.data.finished_faktur[i].pembayaran==null?0:response.data.finished_faktur[i].pembayaran
         var remaining=total_faktur-pembayaran;
      
          baris += '<tr>' +
            '<td style="width: 15%">' +response.data.finished_faktur[i].faktur_number + '</td>' +
            '<td style="width: 10%" >' + response.data.finished_faktur[i].quotation_number + '</td>' +
           
          
            '<td style="width: 10%">' +response.data.finished_faktur[i].date_faktur + '</td>' +
            '<td style="width: 20%">' +response.data.finished_faktur[i].syarat_pembayaran + '</td>' +

            '<td style="width: 15%" align="right">' + response.data.finished_faktur[i].total_faktur.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
            '<td style="width: 15%" align="right">' + total_faktur.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
            '<td style="width: 15%" align="right">' + "0" + '</td>' +
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
     
      
      


    },
    error: function(response) {
      console.log(response);




    }

  });
}

$('#saveData').submit(function(e) {
    e.preventDefault();
    //showIndikatorForevent()
  
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
      console.log('a',value.remaining)
      console.log("payment",payment)
      if (Number(payment)>Number(value.remaining)){
        payment=payment-value.remaining.replace(/[^\w\s]/gi, '');
        payment_item=[value.remaining.replace(/[^\w\s]/gi, ''),transaction_number,value.faktur_number,account_id];  
        
        tempPaymentFaktur={faktur_number:value.faktur_number,quotation_number:value.quotation_number,total_pembayaran_faktur:Number(value.remaining)+Number(value.jumlah_bayar),amount:value.remaining.replace(/[^\w\s]/gi, ''),account_id:account_id} 

      }else{      
        payment_item=[payment,transaction_number,value.faktur_number,account_id]
        tempPaymentFaktur={faktur_number:value.faktur_number,quotation_number:value.quotation_number,total_pembayaran_faktur:Number(payment)+Number(value.jumlah_bayar),amount:payment,account_id:account_id} 
        payment=0
      }
      payment_faktur.push(tempPaymentFaktur);
      data_transactions.push(payment_item);
    })

    console.log(payment_faktur)
    console.log(data_transactions);

    console.log(date_transaction)

   

    $.ajax({
        type: "post",
        url: 'http://localhost:3000/api/faktur/payment-qo',
    
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

          //console.log(response)
         

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

          // if (hasil.status == 'tersedia') {
          //   Swal.fire({
          //     title: 'Oops',
          //     text: "Quotation number sudah tersedia,lakukan update quotation dengan menekan tombol update QO  sebeleum menyimpan  data quotation other",
          //     icon: 'info',
          //     showCancelButton: true,
          //     confirmButtonColor: '#3085d6',
          //     cancelButtonColor: '#808080',
          //     cancelButtonText: 'Tidak',
          //     confirmButtonText: 'Update QO'
          //   }).then((result) => {
          //     if (result.value) {

          //       generet_quotation_other();
          //       hiddenIndikatorForother();
          //       Swal.fire({
          //         position: 'center',
          //         icon: 'success',
          //         title: 'Quotation number has been updated',
          //         showConfirmButton: false,
          //         timer: 1500
          //       });


          //     }
          //   });


          // } else {

          //   $("#SimpanDataOther").submit();
          
          // }


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




 

  });




 
    

    
   $("#customerMainNav").addClass('active');
   $("#manageCustomerNav").addClass('active');
   $("#openCustomerNav").addClass('menu-open');

 </script>
   <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js') ?>"></script>



