<style>
  .select2-selection__rendered {
    line-height: 20px !important;
}
.select2-selection--multiple{
    overflow: hidden !important;
    height: auto !important;
}
.select2-selection__arrow {
    height: 35px !important;
}
select[multiple]:focus option:checked {
  background: red linear-gradient(0deg, red 0%, red 100%);
}


.select2-selection__choice__remove{
    border: none!important;
    border-radius: 0!important;
    padding: 0 2px!important;
}

.select2-selection__choice__remove:hover{
    background-color: transparent!important;
    color: #ef5454 !important;
}
</style>
    
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
                 <h3 class="box-title"><b>Manage User</b></h3>
                  <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
              <?php if(in_array('createUser', $user_permission)): ?>
            <a href="<?php echo base_url('Users/add_user') ?>" class="btn btn-primary">Add User</a>
             <?php endif; ?>
              </div>
            </div>

              <!-- /.card-header -->
              <div class="card-body">
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
          
      
         
          
         
                 <table id="userTable" class="table table-bordered table-striped " >
                <thead>
                <tr>
             
                  <th>Username</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Group</th>
                  <th>Status</th>

                  <th colspan="1"><center>Action</center></th>
               
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

      <div class="modal fade" id="update"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document" data-keyboard="false">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b>Edit Data User</b> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <form id="formmodal" method="post" action="<?php echo base_url('user/aksi_update_data_anak'); ?>">
        <div class="box-body">
               <div class="form-group">
                  <label for="groups">Groups</label>
                  <select class="form-control" id="groups" name="groups"style="width: 50%">
                  
                    <?php foreach ($groups as $k): ?>
                      <option value=""></option>
                      <option value="<?php echo $k->group_name ?>" ><?php echo $k->group_name ?></option>
                    <?php endforeach ?>
                  </select>
                     <small class="text-danger pl-3" id="group_error"></small>
                </div>
               

            

              <div class="form-group" id="kanan1" style="margin-top: -75px;">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
                   <small class="text-danger pl-3" id="username_error"></small>

                </div>
                 <div class="form-group">
                  <label for="fname">First name</label>
                  <input style="width: 50%;" type="text" class="form-control" id="fname" name="fname" placeholder="First name" autocomplete="off">
                 <small class="text-danger pl-3" id="fname_error"></small>
                </div>
               <div class="form-group" id="kanan1" style="margin-top: -95px;">
                  <label for="lname">Last name</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" autocomplete="off">
                   <small class="text-danger pl-3" id="lnama_error"></small>
                </div>
              

                <div class="form-group">
                  <label for="email">Email</label>
                  <input style="width: 50%" type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                </div>
                <small class="text-danger pl-3" id="email_error"></small>

            <div class="form-group" id="kanan1" style="margin-top: -75px;">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
                <small class="text-danger pl-3" id="phone_error"></small>
                </div>

                <div >
                  <label>Select menu Finance & Projects</label>

                  <select id="finance"  class="js-example-basic-multiple" name="finance[]" multiple="multiple" style="width: 100%; color:black;" multiple>
                 
                   <option value="manage">Manage Projecs</option>
    
                   <option value="mapping">Mapping Projets</option>   
                   <option value="pictb">PIC TB</option>   
                   <option value="inout">In Out</option>   
                   <option value="account">Akun</option>      
                </select>
                 </div>
                <br>
   <div class="alert alert-info" role="alert">
 kosongkan password  jika tidak akan diubah
</div>
             
                <hr>

                 <div class="form-group">
                  <label for="password">Password</label>
                  <input style="width: 50%" type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>
                 <?= form_error('password','<small class="text-danger pl-3">','</small>')?>

                <div class="form-group" id="kanan1" style="margin-top: -75px;">
                  <label style="width: 100%" for="cpassword">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div>
                  <small class="text-danger pl-3" id="cpassword_error"></small>

                 <div class="form-group">
                   <input type="hidden" name="id">
                 </div>
                 <div class="form-group">
                   <input type="text" name="id_group" hidden="">
                 </div>


              </div>
              <!-- /.box-body -->         
         
        </form>     
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="Ubahdata()">Save Changes</button>

   

      </div>
      
    </div>
     </div>
  </div>
      <!-- /.container-fluid -->
    </section>


    <!-- /.content -->
  </div>





  <script type="text/javascript">


 
 $(document).ready(function(){  
  $('.js-example-basic-multiple').select2({
      
    
    });
      var dataTable = $('#userTable').DataTable({  
           "processing":true,  
           "serverSide":true,
             "responsive": true,
      "autoWidth": false, 
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url("Users/TampilDatauser")?>",  
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
  Swal.fire({
  title: 'Hapus Data',
  text: "Apaka anda yakin?",
  icon: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
    cancelButtonColor: '#808080',
  cancelButtonText: 'Batalkan',
  confirmButtonText: 'Iya'
}).then((result) => {
  if (result.value) {
    $.ajax({
        url : "<?php echo base_url("Users/hapus/3") ?>",
        type:"post",
        data:{id:id},
        success:function(){
             Swal.fire({
  title: "success!",
  text: "Data berhasil dihapus.",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});

            
          $('#userTable').DataTable().ajax.reload();

        },
        error:function(){
                  Swal.fire({

  text: "Gagal menghapus data",
  icon: "error",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});
       
        }

    });
  }
});

}
    


  function AmbilData(id){
      $.ajax({
          type:"post",
          url:'<?php echo base_url("Users/ambilId/3")?>',
          data:{id:id},
          dataType:'json',
          success:function(hasil){

          console.log(hasil);

              $('#groups').select2();
               $('[name="id_group"]').val(hasil[0].id_group);
                $('[name="id_group"]').val(hasil[0].id_group);

            $('[name="username"]').val(hasil[0].username);
            $('[name="email"]').val(hasil[0].email);
            $('[name="fname"]').val(hasil[0].firstname);
            $('[name="lname"]').val(hasil[0].lastname);
            $('[name="phone"]').val(hasil[0].phone);
            $('[name="gender"]').val(hasil[0].gender);
            $('[name="groups"]').val(hasil[0].group_name).change();
            $('[name="id"]').val(hasil[0].id);
             $('[name="id_group"]').val(hasil[0].id_group);
          
             $("#finance").select2().val(JSON.parse(hasil[0].finance_permission)).change();
         
             console.log(hasil[0].group_name);



          },
          error:function(hasil){
        
          }

      });
  
}
function Ubahdata(){
  

    var id=$('[name="id"]').val();
    var id_group=$('[name="id_group"]').val();
    var group=$("[name='groups']").val();
    var email=$("[name='email']").val();
    var username=$("[name='username']").val();
    var lname=$("[name='lname']").val();
    var fname=$("[name='fname']").val();
    var phone=$("[name='phone']").val();
    var cpassword=$("[name='cpassword']").val();
     var password=$("[name='password']").val();
     var finance=$("#finance").val();

    var nama_error=document.getElementById("name_error");
    var group_error=document.getElementById("group_error");
    var username_error=document.getElementById("username_error");
    var lname_error=document.getElementById("lname_error");
    var fname_error=document.getElementById("fname_error");
    var phone_error=document.getElementById("phone_error");
    var cpassword_error=document.getElementById("cpassword_error");
 


    // if (group.trim()==''){
    //   group_error.style.border="1 px solid red";
    //   group_error.textContent=" *Group belum dipilih ,silahkan dipilih!";
    //   $('#groups').focus();
    //   return false;
    // }else 
    if (username.trim()==''){
      username_error.style.border="1 px solid red";
      username_error.textContent=" *Username belum dipilih.silahkan pilih terlebih dahulu";
      $('#username').focus();

      group_error.style.border="1 px solid red";
      group_error.textContent="";
      return false;

    } else if (email.trim()==''){
      email_error.style.border="1 px solid red";
      email_error.textContent=" *Email belum diiisi,Silahkan isi terlebih dahulu!";
      $('#email').focus();

      username_error.style.border="1 px solid red";
      username_error.textContent="";
      group_error.style.border="1 px solid red";
      group_error.textContent="";
      return false;

    }
    //   else if (fname.trim()==''){
    //   fname_error.style.border="1 px solid red";
    //   fname_error.textContent=" *First Name belum diiisi,Silahkan isi terlebih dahulu!";
    //   $('#fname').focus();
      
    //   username_error.style.border="1 px solid red";
    //   username_error.textContent="";
    //   email_error.style.border="1 px solid red";
    //   email_error.textContent="";
    //   group_error.style.border="1 px solid red";
    //   group_error.textContent="";
    //   return false;

    // }
    // else if (phone.trim()==''){
    //   phone_error.style.border="1 px solid red";
    //   phone_error.textContent=" *Phone belum diiisi,Silahkan isi terlebih dahulu!";
    //   $('#phone').focus();
      
    //   username_error.style.border="1 px solid red";
    //   username_error.textContent="";
    //   email_error.style.border="1 px solid red";
    //   email_error.textContent="";
    //   group_error.style.border="1 px solid red";
    //   group_error.textContent="";
    //   return false;

    // }
    else{
  
     username_error.style.border="1 px solid red";
      username_error.textContent="";
      fname_error.style.border="1 px solid red";
      fname_error.textContent="";
      email_error.style.border="1 px solid red";
      email_error.textContent="";
      group_error.style.border="1 px solid red";
      group_error.textContent="";

      if (password.trim()!=''){
        if (cpassword==password){
        $.ajax({
        type:'POST',
        // data:'id='+id+'&group_name='+group+'&email='+email+'&username='+username+'&lname='+lname+'&fname='+fname+'&phone='+phone+'&password='+password+'&id_group='+id_group,
            data:{id:id,group_name:group,email:email,username:username,lname:lname,fname:fname,phone:phone,password:password,id_group:id_group,finance:finance},
            url :'<?php echo base_url("Users/aksi_update_data_user_password") ?>',
        dataType:'json',
        success:function(hasil){
            console.log(hasil);
    Swal.fire({
  title: "success!",
  text: "Data berhasil diubah.",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});
  $("[name='cpassword']").val('');
    $("[name='password']").val('');
     
  
        $('#update').hide();
        $('.modal-backdrop').hide();
        $('#userTable').DataTable().ajax.reload();
    },
        error:function(){
            Swal.fire({
  title: "success!",
  text: "Data berhasil diubah.",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false


});
    $("[name='cpassword']").val('');
    $("[name='password']").val('');

        $('#update').hide();
    $('.modal-backdrop').hide();
$('#userTable').DataTable().ajax.reload();
}

});

        }else{
        cpassword_error.style.border="1 px solid red";
        cpassword_error.textContent="Password tidak cocok";
        }

      }else{

    $.ajax({
    type:'POST',
    // data:'id='+id+'&group_name='+group+'&email='+email+'&username='+username+'&lname='+lname+'&fname='+fname+'&phone='+phone+'&id_group='+id_group,
     data:{id:id,group_name:group,email:email,username:username,lname:lname,fname:fname,phone:phone,id_group:id_group,finance:finance},
    url :'<?php echo base_url("Users/aksi_update_data_user") ?>',
    dataType:'json',
    success:function(hasil){
        console.log(hasil);
         Swal.fire({
  title: "success!",
  text: "Data berhasil diubah.",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});

  
    $('#update').hide();
    $('.modal-backdrop').hide();
$('#userTable').DataTable().ajax.reload();
},
error:function(){
   Swal.fire({
  title: "success!",
  text: "Data berhasil diubah.",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});
    $('#update').hide();
    $('.modal-backdrop').hide();
  $('#userTable').DataTable().ajax.reload();
   
}

});


      }
  
      //proses memasukan update data



}


}

function datatable(){
      $.ajax({
        type:'POST',
   
     url:'<?php echo base_url("Users/TampilDatauser")?>',
        dataType:'json',
        success:function(data){
          console.log(data);

                var baris='';
      if (data.length==0){
          baris+=  '<tr>'+
          '<td colspan="7">Data Kosong </td>'+
          '</tr>';

      }else{


          for (var i=0;i<data.length; i++){
       
              baris+='<tr>'+
              '<td style="width: 20%" hidden>'+data[i].id+'</td>'+
              '<td style="width: 20%">'+data[i].username+'</td>'+
               '<td style="width: 20%">'+data[i].email+'</td>'+
               '<td style="width: 15%">'+data[i].firstname+' '+data[i].lastname+'</td>'+
               '<td style="width: 15%">'+data[i].phone+'</td>'+
                '<td style="width: 20%">'+data[i].group_name+'</td>'+
                '<td style="width:15%"><?php if(in_array('updateUser', $user_permission)): ?>'+
                '<center><font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" onclick="AmbilData('+data[i].id+')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i></a></font>'+
                  '<?php endif; ?>
                  <?php if(in_array('deleteUser', $user_permission)): ?>
                  <font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" onclick="swetalert('+data[i].id+')"><i class="fa fa-trash"></i><font size="2px"></font></a></font></center><?php endif; ?></td>'+
                  
            

              

                '</tr>';
             

              }
         }
      
     $("#target").html(baris);
          
    },
        error:function(data){
         

       
   
}

});
}

   $("#userMainNav").addClass('active');
  $("#manageUserNav").addClass('active');
   $("#openUserNav").addClass('menu-open');

 
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer>
  
</script>

<!-- AdminLTE App -->

