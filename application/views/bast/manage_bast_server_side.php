
    
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
                 <h3 class="box-title">Manage BAST</h3>
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

            <div>
               <table id="bastTable"  class="table table-bordered table-striped" style="width: 100%">

                <thead>
                <tr>
                    <th hidden="">id</th>
                  <th>Bast Number</th>
                   <th>Quotation Number</th>
                  <th >GR Number</th>
                  <th >PO Number</th>
                   <th>Customer</th>
                   <th >Title Event</th>
                   <th>Total Summary</th>
                   <th >Date Bast</th>
                   <th >Status</th>
               

                  <th ><center>Action</center></th>
               
                </tr>
                </thead>
             
              </table>
            </div>
             
              
               
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
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Image BAST</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <br>
      <br>

      <h3>Image PO</h3>
      <hr>
      <center><div id="ViewImagepo"></div></center> 
      <br>
      <br>
      <h3>Image GR</h3>
      <hr>
      <center><div id="ViewImagegr"></div></center> 

     
    <br>
    <br>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){  
      var dataTable = $('#bastTable').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url("Bast/TampilDatabast")?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  

              "defaultContent": "-",
               "targets": "_all"
                },  
           ],  
      }); 

 });

  function AmbilDataImage(fileNamepo,fileNamegr,typepo,typegr){
    console.log(typepo);

    if(typepo=='pdf'){
           html='<object type="application/pdf" data="<?php echo base_url('assets/imagebastpo/')?>'+fileNamepo+'" width="100%" height="500" style="height: 85vh;"></object>'


    }else{
      html='<center><img style="height: 80vh; width:80vh"  src="<?php echo base_url('assets/imagebastpo/') ?>'+fileNamepo+'" ></center>';



    }
      document.getElementById("ViewImagepo").innerHTML = html;

  if(typegr=='pdf'){
           html='<object type="application/pdf" data="<?php echo base_url('assets/imagebastgr/')?>'+fileNamegr+'" width="100%" height="500" style="height: 85vh;"></object>'


    }else{
      html='<center><img style="height: 80vh; width:80vh"  src="<?php echo base_url('assets/imagebastgr/') ?>'+fileNamegr+'" ></center>';



    }
  document.getElementById("ViewImagegr").innerHTML = html;
}
  
  

    function swetalert(id){
  Swal.fire({
  title: 'Yakin?',
  text: "Mau menghapus data ini!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Batalkan',
  confirmButtonText: 'Iya'
}).then((result) => {
  if (result.value) {
    $.ajax({
        url : "<?php echo base_url("Bast/hapus/3") ?>",
        type:"post",
        data:{id:id},
        success:function(){
            Swal.fire(
      'Deleted!',
      'Data berhasil dihapus.',
      'success'
    );

            
                $('#bastTable').DataTable().ajax.reload();

        },
        error:function(){
                Swal.fire(
      
      'gagal menghapus data.',
      'error'
    );
        }

    });
  }
});

}

function getdatatable(){

 $(document).ready(function() {
    $('#example3').DataTable( {
       "scrollX": true,
        "searching": false,
  
    } );
} );

}

function cekFaktur(id){
  

   
      $.ajax({
          type:"post",
          url:'<?php echo base_url("Faktur/cekFaktur/")?>',
          data:'quotation_number='+id,
          dataType:'json',
      
          success:function(hasil){
            if (hasil!=''){
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Data faktur sudah tersedia',
  
})

            }else{
             window.location = "<?php echo base_url('Faktur/create_faktur/')?>"+id;
            }

            

          },
          error:function(hasil){
         
    
           
          }
         

      });
}


       $("#bastMainNav").addClass('active');
 
   $("#openBastNav").addClass('menu-open'); 
</script>

