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
        <div class="card-header">
          <h3 class="box-title"><b>Manage Transactions</b></h3>
          
        </div>

        <div class="card-body">

          <!-- Small boxes (Stat box) -->
          <div class="row">

            <div class="col-md-12 col-xs-12">

              <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-error alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $this->session->flashdata('error'); ?>
                </div>
              <?php endif; ?>



              <div class="box">

                <!-- /.box-header -->
                <div class="box-body">

                  <table id="use-datatable" class="table table-bordered table-striped tablecustomer">
                    <thead>
                      <tr>
                        <th >No. Transaksi</th>
                        <th>Date</th>
                        <th style="width:15%">Amount</th>
                        <th style="width:20%">Note</th>
                        <th>Customer</th>
                        <th>Account</th>
                      

                        <th colspan="1" style="width: 15%">
                          <center>Action</center>
                        </th>

                      </tr>
                    </thead>
                    <tbody id="transaction-row">
                    </tbody>

                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

          </div>
        </div>

        <!-- /.row -->
      </div>



    </section>

    <!-- /.content -->
  </div>


  <script type="text/javascript">
    $(document).ready(function() {
      data();
      
    //   var dataTable = $('#customerTable').DataTable({
    //     "processing": true,
    //     "serverSide": true,
    //     "responsive": true,
    //     "autoWidth": false,
    //     "order": [],
    //     "ajax": {
    //       url: "<?php echo base_url("Customer/TampilDatacustomer") ?>",
    //       type: "POST"
    //     },
    //     "columnDefs": [{

    //       "defaultContent": "",
    //       "targets": "_all"
    //     }, ],
    //   });

     });

    function data() {
     
  try {
    var row='';
    axios.get(`http://localhost:3000/api/faktur/transactions`).then((response)=>{
      console.log(response.data.data)
      
      response.data.data.map((value)=>{
        row+=`
        <tr>
          <td>
          <h5> <span  class="badge badge-pill badge-primary transaction_number" id="transaction_number">${value.transaction_number}</span></h5>
          </td>
          <td>
          ${value.date}
          
          </td>
          <td align="right">
          ${value.amount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")}
          
          </td>
          <td>
          ${value.description!=null?value.description:""}
          
          </td>
          <td>
          ${value.customer.name!=null?value.customer.name:""}
          
          </td>
          <td>
          ${value.account.bank_name!=null?value.account.bank_name:""} 
          (${value.account.account_number!=null?value.account.account_number:""})
          
          </td>
          <td align="center" width="100px">
          <font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary"  title="Delete"><i class="fa fa-trash"></i><font size="2px"></a> </font></center>
          <font color="#FFFFFF" size="2px"><a  href="http://localhost/magentaeo/Transactions/detail/${value.id}" class="btn btn-sm bg-gradient-secondary"  title="Detail"  ><i class="fa fa-eye"></i><font size="2px"></a> </font></center>
          <font color="#FFFFFF"  size="2px"><a title="Print" class="btn btn-sm bg-gradient-secondary"   href="http://localhost/magentaeo/Transactions/print/${value.id}" target="_blank"><i class="fa fa-print"></i><font size="2px"> </a>
          
          </td>
        </tr>

        `


      })
      $("#transaction-row").html(row);
      $('#use-datatable').DataTable({});
      

    })
    
  } catch (errors) {
    console.error(errors);
  }
};


    // function alert() {

    //   Swal.fire({
    //     icon: 'info',
    //     title: 'Oops...',
    //     text: "Data Customer tidak bisa dihapus dikarnakan customer tersebut terdapat data di quotation event atau quotation other",

    //   });

    // }

    // // function swetalert(id) {
    // //   Swal.fire({
    // //     title: 'Menghapus Data',
    // //     text: "Apakah anda yakin?",
    // //     icon: 'info',
    // //     showCancelButton: true,
    // //     confirmButtonColor: '#3085d6',
    // //     cancelButtonColor: '#808080',
    // //     cancelButtonText: 'Batalkan',
    // //     confirmButtonText: 'Iya'
    // //   }).then((result) => {
    // //     if (result.value) {
    // //       $.ajax({
    // //         url: "<?php echo base_url("Customer/hapus_customer/3") ?>",
    // //         type: "post",
    // //         data: {
    // //           id: id
    // //         },
    // //         success: function() {
    // //           Swal.fire({
    // //             title: "Deleted!",
    // //             text: "Data berhasil dihapus.",
    // //             icon: "success",
    // //             timer: 2000,
    // //             showCancelButton: false,
    // //             showConfirmButton: false

    // //           });


    // //           $('#customerTable').DataTable().ajax.reload();

    // //         },
    // //         error: function() {
    // //           Swal.fire(

    // //             'gagal menghapus data.',
    // //             'error'
    // //           );
    // //         }

    // //       });
    // //     }
    // //   });

    // // }



   



  
    $("#transactionsMainNav").addClass('active');
   
  </script>