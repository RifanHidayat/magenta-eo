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
    <!-- /.content-header -->

    <!-- Main content -->


    <section class="content">


      <br>
      <br>

      <div class="card">
      

        <div class="card-body">

      
       <div class="main" style="margin-left: 5%; margin-right:5%">
       <div class="row">
       <b><h3 align="right" id="transaction_number">No Transaksi</h3>  </b>      
      </div>
      <br>
      <hr/>
      <br>
      <div class="row">
       <table width="100%" >
       <tr>
        <th width="45%">
        Tanggal Transaksi
        </th>
        <th width="25%">
        No. Transaksi
        
        </td>
        <td align="right">
        <b>Customer</b>
        
        </th>
        </tr>

        

        <tr>
        <td>
        <span id="transaction_date"></span>
        </td>
        <td>
        <span  id="transaction_number1"></span>
        
        </td>
        <td align="right">
        <span id="customer"></span>
        
        </td>
        </tr>
       
       </table>  

     
        
      </div>

      <br>
      <br>
      <br>
      <br>
      <br>
    
      <div class="row">
       <table width="100%"  class="table">
       <tr>
       <td width="70%">
       <span>Deskripsi</span>
        </td>
   
        <td align="right">
        Amount
        
        </td>
        </tr>
        <tbody id="payment_item"></tbody>

        <!-- <tr>
        <td border='1' width="76%">
        <span id="faktur number">set Deskripsi</span>
        </td>
        <td>
        <span></span>
        
        </td>
        <td>
        <span id="amount_item">set Amount</span>
        
        </td>
        </tr> -->
       
       </table>  

     
        
      </div>
      <br/>
      <br/>
      <br/>
      <br/>
      <div>
      <div>
      <div class="bg-light text-dark row"  style="background-color: grey;" style="height: 30%;">
      <br>
       <br>
       <br>    
       <br>
       <br>
       <br> 
      <table width="100%"  >
       <tr>
       <th width="45%">
        Metode Pembayaran
        </th>
        <th width="25%">
        Nama Akun/Bank
        
        </td>
        <td align="right">
        <b>Amount</b>
        
        </th>
        </tr>

        

        <tr>
        <td>
        <span id="metode"></span>
        </td>
        <td>
        <span id="account"></span>
        
        </td>
        <td align="right">
        <span id="total_amount" style="color:green" ></span>
        
        </td>
        </tr>
       
       </table>   

       <br>
       <br>
       <br>    
       <br>
       <br>
       <br> 
        
      </div>
  
      </div>
      

      </div>
      </div>

    </section>

    <!-- /.content -->
  </div>


  <script type="text/javascript">
    $(document).ready(function() {
      transactionsData()
      console.log(""+<?php echo $transaction_id ?>)

     });

    function transactionsData() {
        try {
          var row= '';
            axios.get("http://localhost:3000/api/faktur/transactions/"+<?php echo $transaction_id ?>).then((response)=>{
              $('#transaction_number').text(response.data.data.transaction_number)
              $('#transaction_number1').text(response.data.data.transaction_number)
              $('#transaction_date').text(response.data.data.date)
              $('#total_amount').text(`IDR ${response.data.data.amount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}`)
              $('#metode').text("Transfer")
              $('#account').text(`${response.data.data.account.bank_name!=null?response.data.data.account.bank_name:""}`)
              $('#customer').text(`${response.data.data.customer.name!=null?response.data.data.customer.name:""}`)



            
            
            

                
            console.log(response.data)

            response.data.data.item.map((value)=>{
              row+=`
              <tr>
                <td>
                  <span> <b>Pembayaran Faktur</b> </span><a style="color:blue"><u>#${value.faktur_number}</u></a>
                </td>
               
              
                <td align="right">
                <span style="color:green" >IDR ${value.amount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}<span>
                </td>

              </tr>
           
              
              `;


            })
            $("#payment_item").html(row);
          
            })
    


    
  } catch (errors) {
    console.error(errors);
  }
};




   



  
    $("#transactionsMainNav").addClass('active');
   
  </script>