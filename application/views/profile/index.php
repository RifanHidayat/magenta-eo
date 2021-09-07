
    
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
          
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-md-12 col-xs-12">

              <div class="col-md-12 col-xs-12">

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
          


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Perusahan</h3>
              <hr>
            </div>
            <form method="post" id="SimpanData" action="<?php base_url('Customer/aksi_update_customer'); ?>"  name="formid">
  <div class="form-group">
      <label >Nama Perusahaan</label>
      <input require style="width: 50%" type="text" class="form-control" name="name" id="name"  aria-describedby="emailHelp"  value="<?php echo $name; ?>" >

    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Telephon</label>
      <input require style="width: 50%" type="text" class="form-control" name="phone" id="phone"   value="<?php echo $phone; ?>"aria-describedby="emailHelp" >
    
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Fax</label>
      <input require style="width: 50%" type="text" class="form-control" name="fax" id="fax"  value="<?php echo $fax; ?>" aria-describedby="emailHelp">
   
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Penandatangan</label>
      <input require style="width: 50%" type="text" class="form-control" name="signer" id="signer"  value="<?php echo $signer; ?>" aria-describedby="emailHelp" >
    
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Alamat</label>
      <textarea  require style="width: 50%" type="text" class="form-control" name="address" id="address"   aria-describedby="emailHelp" ><?php echo $address; ?>
    </textarea>
    
    </div>
   

    
 <div align="right"  style="width: 50%">
 <button onclick="save()" class="btn btn-primary btnSave" type="button">
                       <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                       Save
                     </button>
 </div>
 
</form>
  <br>
  <br>
            <!-- /.box-header -->

         <!--    kontent -->
          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          
       
          <!-- /.box -->
        </div>
       
        <!-- col-md-12 -->
      </div>
    </div>

      <!-- /.row -->
      </div>



    </section>
  
    <!-- /.content -->
  </div>

  <script type="text/javascript">
   
  $("#ProfileMainNav").addClass('active');
  function showIndikator() {
     $('.btnSave').attr('disabled', 'disabled');
     $('.loadingIndikdator').show();
   }

   function hiddenIndikator() {
     $('.btnSave').removeAttr('disabled');
     $('.loadingIndikdator').hide();

   }

 

$(document).ready(function() {
     hiddenIndikator();

   });
   function save(){
     showIndikator();
    var data={
  name:$('#name').val(),
  phone:$('#phone').val(),
  fax:$('#fax').val(),
  address:$('#address').val(),
  signer:$('#signer').val(),


}
    axios.patch("http://localhost:3000/api/company",data).then((response)=>{
        Swal.fire({
              title: "success!",
              text: "Data berhasil disimpan",
              icon: "success",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false
            });
            
           


            hiddenindikator();
        
      })
      .catch((error)=>{
        // console.log(error.response)
        // Swal.fire({
        //       title: "error",
        //       text: "terjadi kesalahan",
        //       icon: "error",
        //       timer: 2000,
        //       showCancelButton: false,
        //       showConfirmButton: false
        //     });
            
        Swal.fire({
              title: "success!",
              text: "Data berhasil disimpan",
              icon: "success",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false
            });
            
          



      })
   }



 


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer>
</script>
  
 

