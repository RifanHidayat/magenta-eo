
    
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
     
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

              
             <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
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
          
 <a href="<?php echo base_url('PicPO/add_pic') ?>" class="btn btn-primary">Add PIC PO</a>
            
            <hr>
            <br /> <br />

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage PIC PO</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Name</th>
               

                  <th colspan="3"><center>Action</center></th>
               
                </tr>
                </thead>
                <tbody>
                               
                    <?php foreach ($pic as $k): ?>
                      <tr>
                        <td><?php echo $k->pic_name; ?></td>
                        <td><?php echo $k->email; ?></td>

                        <td><?php echo $k->jabatan; ?></td>
                      
                        <td>
                           <?php if(in_array('updatePicPO', $user_permission)): ?>

                          <font color="#FFFFFF" size="2px">'+'<a class="btn btn-warning btn-xs" onclick="AmbilData('<?php echo $k->id ?>')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i> Update</a>'+'
                          <?php endif; ?>
                          <?php if(in_array('deleteBank', $user_permission)): ?>
                        <font color="#FFFFFF" size="2px"><a class="btn btn-danger btn-xs" onclick="swetalert('<?php echo $k->id?>')"><i class="fa fa-trash"></i><font size="2px"> Delete</a>'</td> 
                           <?php endif; ?>


                   
                      </tr>
                    <?php endforeach ?>
             
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      <!-- Modal tambah button updatet data anakk -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document" data-keyboard="false">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Ubah Data PIC PO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <form id="formmodal" method="post" action="<?php echo base_url('user/aksi_update_data_anak'); ?>">
        <div class="box-body">

             
   <div class="box-body">

        
            
                <div class="form-group">
                  <label for="username">PiC Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
                </div>
                <small class="text-danger pl-3" id="username_error"></small>

                  <div class="form-group">
                  <label for="jabatan">Jabatan PiC PO</label>
                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" autocomplete="off">
                </div>
                 <small class="text-danger pl-3" id="jabatan_error"></small>


                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                </div>
                    <div class="form-group">
                  <label for="email">Customr Name</label>
                     <select class="form-control customer" id="customer" name="customer" style="width:99%;"  value="<?php echo set_value('pic')?>">
                    <option value="">Select Customer</option>
                    <?php foreach ($customer as $k): ?>
                      <option value="<?php echo $k->name ?>"><?php echo $k->name ?></option>
                    <?php endforeach ?>
                  </select>
                  <?= form_error('customer','<small class="text-danger pl-3">','</small>')?>

                </div>
                 <small class="text-danger pl-3" id="email_error"></small>

                  <div class="form-group">
                    <input type="hidden" name="id">
                  </div>
              </div>


              </div>
              <!-- /.box-body -->

          
         
        </form>     
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary" onclick="Ubahdata()">Ubah</button>

      </div>
      
    </div>
  </div>
</div>

    </section>



    <!-- /.content -->
  </div>

<script type="text/javascript">
    
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
        url : "<?php echo base_url("PicPO/hapus_pic/3") ?>",
        type:"post",
        data:{id:id},
        success:function(){
            Swal.fire(
      'Deleted!',
      'Data berhasil dihapus.',
      'success'
    );

            
            location.reload();

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

  function AmbilData(id){
      $.ajax({
          type:"post",
          url:'<?php echo base_url("PicPO/ambilIdPIC/3")?>',
          data:{id:id},
          dataType:'json',
          success:function(hasil){
             console.log(hasil);
               $('[name="username"]').val(hasil[0].pic_name);
               $('[name="jabatan"]').val(hasil[0].jabatan);
               $('[name="email"]').val(hasil[0].email);
                 $('[name="id"]').val(hasil[0].id);
                   $('[name="customer"]').val(hasil[0].customer);
          },
          error:function(hasil){
    
           
          }
         

      });
  
}

function Ubahdata(){
    var username=$('[name="username"]').val();
    var jabatan=$("[name='jabatan']").val();
    var email=$("[name='email']").val();
    var id=$("[name='id']").val();


    var username_error=document.getElementById("username_error");
    var jabatan_error=document.getElementById("jabatan_error");
    var email_error=document.getElementById("email_error");
  
 


    if (username.trim()==''){
      username_error.style.border="1 px solid red";
      username_error.textContent=" *Username masi kosong,silahkan diisi!";
      $('#username').focus();
      return false;
    }else if (jabatan.trim()==''){
      jabatan_error.style.border="1 px solid red";
      jabatan_error.textContent=" *Jabatan masi kosong,silahkan diisi!";
      $('#jabatan').focus();
      username_error.style.border="1 px solid red";
      usernae_error.textContent="";

      return false;
    }else if (email.trim()==''){
      email_error.style.border="1 px solid red";
      email_error.textContent=" *Email masi kosong,silahkan diisi!";
      $('#email').focus();
      username_error.style.border="1 px solid red";
      username_error.textContent="";
       jabatan_error.style.border="1 px solid red";
      jabatan_error.textContent="";
      return false;
    }else{
      username_error.style.border="1 px solid red";
      username_error.textContent="";
      jabatan_error.style.border="1 px solid red";
      jabatan_error.textContent="";
      email_error.style.border="1 px solid red";
      email_error.textContent="";


      $.ajax({
type:'POST',
data:'id='+id+'&username='+username+'&email='+email+'&jabatan='+jabatan,
url :'<?php echo base_url("PicPO/aksi_update_data_pic") ?>',
dataType:'json',
success:function(hasil){
          Swal.fire(
      'success!',
      'Data berhasil diubah.',
      'success'
    );

    $('#update').hide();
    $('.modal-backdrop').hide();
     location.reload();
},
error:function(){
          Swal.fire(
      'success!',
      'Data berhasil diubah.',
      'success'
    );

    $('#update').hide();
    $('.modal-backdrop').hide();
     location.reload();
   
}

});

    }
  



}
</script>


