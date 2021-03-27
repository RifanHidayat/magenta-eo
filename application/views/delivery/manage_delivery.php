
    
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
    <div class="content">

   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

          
            <br>
            <br>
           
            <div class="card">
              <div class="card-header">
                 <h3 class="box-title"><b>Manage Delivery</b></h3>
              </div>
                 <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?> 
              <!-- /.card-header -->
              <div class="card-body">

                  <table id="deliveryTable" class="table table-bordered table-striped" style="width: 100%">
                <thead>
                <tr>
                
                  <th style="width: 13%">Quotation Number</th>
                  <th style="width: 10%">Delivery Order Number</th>
                   <th style="width: 10%">Date Delivery Order</th>
                  
                 
                   <th style="width: 15%">Customer</th>
                    <th style="width: 10%">Title Event</th>
                   
                      <th style="width: 10%">Gudang</th>
                      
                        <th style="width: 5%">Status</th>
                         <th style="width: 15%">Note</th>
               

                  <th style="width: 20%"><center>Action</center></th>
               
                </tr>
                </thead>
               
              </table>
                




               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>


      <!-- /.container-fluid -->
    </section>


    <!-- /.content -->
  </div>
  <script type="text/javascript">
    
  $(document).ready(function(){  
      var dataTable = $('#deliveryTable').DataTable({  
           "processing":true,  
           "serverSide":true,
               "responsive": true,
      "autoWidth": false,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url("Delivery/TampilDatadelivery")?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  

              "defaultContent": "",
               "targets": "_all"
                },  
           ],  
      }); 

 });


        function swetalert(id){
//   Swal.fire({
//   title: 'Yakin?',
//   text: "Mau menghapus data ini!",
//   icon: 'warning',
//   showCancelButton: true,
//   confirmButtonColor: '#3085d6',
//   cancelButtonColor: '#d33',
//   cancelButtonText: 'Batalkan',
//   confirmButtonText: 'Iya'
// }).then((result) => {
//   if (result.value) {
    // $.ajax({
    //     url : "<?php echo base_url("Delivery/hapus/3") ?>",
    //     type:"post",
    //     data:{id:id},
    //     success:function(){
    //         Swal.fire(
    //   'Deleted!',
    //   'Data berhasil dihapus.',
    //   'success'
    // );

            
    //        $('#deliveryTable').DataTable().ajax.reload();


    //     },
    //     error:function(){
    //             Swal.fire(
      
    //   'gagal menghapus data.',
    //   'error'
    // );
    //     }

    // });
//   }
// });


var contenConfirm='<strong>Hapus data delivery</strong>';
Swal.fire({
  title: 'Delete  Delivery',
  html:"Untuk konfirmasi tulis kalimat ini  : "+contenConfirm,
  input: 'text',
  inputAttributes: {
    autocapitalize: 'off'
  },
  showCancelButton: true,
  confirmButtonText: 'hapus',
  showLoaderOnConfirm: true,
  preConfirm: (confirm) => {

   if (confirm=="Hapus data delivery"){
       $.ajax({
        url : "<?php echo base_url("Delivery/hapus/3") ?>",
        type:"post",
        data:{id:id},
        success:function(){
            Swal.fire(
      'Deleted!',
      'Data berhasil dihapus.',
      'success'
    );
        
    $('#deliveryTable').DataTable().ajax.reload();


        },
        error:function(){
                Swal.fire(
      
      'gagal menghapus data.',
      'error'
    );
        }

    });


   }else{


   }
  },
  allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {
  if (result.isConfirmed) {
    
  }
})


}


    $("#deliveryMainNav").addClass('active');

   $("#openDeliveryNav").addClass('menu-open');
  </script>





