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
       <h3 align="right">No Transaksi</h3>        
      </div>
      <br>
      <hr/>
      <br>
      <div class="row">
       <table width="100%" >
       <tr>
        <th>
        Tanggal Transaksi
        </th>
        <th>
        No. Transaksi
        
        </td>
        <th>
        Customer
        
        </th>
        </tr>

        

        <tr>
        <td>
        <span>set tanggal</span>
        </td>
        <td>
        <span>set transaction number</span>
        
        </td>
        <td>
        <span>set Customer</span>
        
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
       <table width="100%" >
       <tr>
        <th>
       Deskripsi
        </th>
        <th>
       
        
        </td>
        <th>
        Amount
        
        </th>
        </tr>

        

        <tr>
        <td>
        <span>set Deskripsi</span>
        </td>
        <td>
        <span></span>
        
        </td>
        <td>
        <span>set Amount</span>
        
        </td>
        </tr>
       
       </table>  

     
        
      </div>

      


        
        
       
        
       <div>





     
        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>


  <script type="text/javascript">
    $(document).ready(function() {
      data();
   

     });

    function transactionsData() {
        try {
            axios.get(`http://localhost:3000/api/faktur/transactions`).then((response)=>{
                
            
            

            })
    


    
  } catch (errors) {
    console.error(errors);
  }
};




   



  
    $("#transactionsMainNav").addClass('active');
   
  </script>