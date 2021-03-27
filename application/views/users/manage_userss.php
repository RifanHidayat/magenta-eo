
    
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
                  <?php if(in_array('createUser', $user_permission)): ?>
            <a href="<?php echo base_url('Users/add_user') ?>" class="btn btn-primary">Add User</a>
             <?php endif; ?>
        
          
            <br>
            <br>
           
            <div class="card">
              <div class="card-header">
                 <h3 class="box-title">Manage User</h3>
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
          
      
         
          
         
                 <table id="example1" class="table table-bordered table-striped " >
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Group</th>

                  <th colspan="1"><center>Action</center></th>
               
                </tr>
                </thead>
                <tbody>
                               
                    <?php foreach ($users as $k): ?>
                      <tr>
                        <td style="width: 20%"><?php echo $k->username; ?></td>
                        <td style="width: 20%"><?php echo $k->email; ?></td>
                        <td style="width: 15%"><?php echo $k->firstname .' '. $k->lastname; ?></td>
                        <td style="width: 15%"><?php echo $k->phone; ?></td>
                        <td style="width: 20%"><?php echo $k->group_name; ?></td>

      
                        <td style="width:15%">
                            <?php if(in_array('updateUser', $user_permission)): ?>
                            <center><font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" onclick="AmbilData('<?php echo $k->id ?>')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i></a></font>
                                 <?php endif; ?>
                            <?php if(in_array('deleteUser', $user_permission)): ?>
                        <font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" onclick="swetalert('<?php echo $k->id?>')"><i class="fa fa-trash"></i><font size="2px"></font></a></font></center>
                            <?php endif; ?>

                        </td>
                      </tr>
                    <?php endforeach ?>
             
                </tbody>
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

      <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document" data-keyboard="false">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Edit Data User </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <form id="formmodal" method="post" action="<?php echo base_url('user/aksi_update_data_anak'); ?>">
        <div class="box-body">
               <div class="form-group">
                  <label for="groups">Groups</label>
                  <select class="form-control" id="groups" name="groups" style="width:99%;">
                    <option value="">Select Groups</option>
                    <?php foreach ($groups as $k): ?>
                      <option value="<?php echo $k->group_name ?>"><?php echo $k->group_name ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                  <small class="text-danger pl-3" id="group_error"></small>

            

                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
                </div>
               <small class="text-danger pl-3" id="username_error"></small>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
                </div>
                <small class="text-danger pl-3" id="email_error"></small>

                <div class="form-group">
                  <label for="fname">First name</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" autocomplete="off">
                 <small class="text-danger pl-3" id="fname_error"></small>
                </div>


                <div class="form-group">
                  <label for="lname">Last name</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" autocomplete="off">
                   <small class="text-danger pl-3" id="lnama_error"></small>
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off">
                <small class="text-danger pl-3" id="phone_error"></small>
                </div>
                <br>
                <p>kosongkan password  jika tidak akan diubah</p>
                <hr>

                 <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                </div>
                 <?= form_error('password','<small class="text-danger pl-3">','</small>')?>

                <div class="form-group">
                  <label for="cpassword">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div>
                  <small class="text-danger pl-3" id="cpassword_error"></small>

                 <div class="form-group">
                   <input type="hidden" name="id">
                 </div>


              </div>
              <!-- /.box-body -->         
         
        </form>     
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="Ubahdata()">Edit</button>

      </div>
      
    </div>
     </div>
  </div>
      <!-- /.container-fluid -->
    </section>


    <!-- /.content -->
  </div>





  <script type="text/javascript">
    // $('#groups').select2();

  $(function () {
    $("#userTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#userTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );


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
        url : "<?php echo base_url("Users/hapus/3") ?>",
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
          url:'<?php echo base_url("Users/ambilId/3")?>',
          data:{id:id},
          dataType:'json',
          success:function(hasil){

          console.log(hasil);
            $('[name="username"]').val(hasil[0].username);
            $('[name="email"]').val(hasil[0].email);
            $('[name="fname"]').val(hasil[0].firstname);
            $('[name="lname"]').val(hasil[0].lastname);
            $('[name="phone"]').val(hasil[0].phone);
            $('[name="gender"]').val(hasil[0].gender);
            $('[name="groups"]').val(hasil[0].group_name);
            $('[name="id"]').val(hasil[0].id);
             console.log(hasil[0].group_name);

          },
          error:function(hasil){
        
          }

      });
  
}
function Ubahdata(){
    var id=$('[name="id"]').val();
    var group=$("[name='groups']").val();
    var email=$("[name='email']").val();
    var username=$("[name='username']").val();
    var lname=$("[name='lname']").val();
    var fname=$("[name='fname']").val();
    var phone=$("[name='phone']").val();
    var cpassword=$("[name='cpassword']").val();
     var password=$("[name='password']").val();

    var nama_error=document.getElementById("name_error");
    var group_error=document.getElementById("group_error");
    var username_error=document.getElementById("username_error");
    var lname_error=document.getElementById("lname_error");
    var fname_error=document.getElementById("fname_error");
    var phone_error=document.getElementById("phone_error");
    var cpassword_error=document.getElementById("cpassword_error");
 


    if (group.trim()==''){
      group_error.style.border="1 px solid red";
      group_error.textContent=" *Group belum dipilih ,silahkan dipilih!";
      $('#groups').focus();
      return false;
    }else if (username.trim()==''){
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
      else if (fname.trim()==''){
      fname_error.style.border="1 px solid red";
      fname_error.textContent=" *First Name belum diiisi,Silahkan isi terlebih dahulu!";
      $('#fname').focus();
      
      username_error.style.border="1 px solid red";
      username_error.textContent="";
      email_error.style.border="1 px solid red";
      email_error.textContent="";
      group_error.style.border="1 px solid red";
      group_error.textContent="";
      return false;

    }else if (phone.trim()==''){
      phone_error.style.border="1 px solid red";
      phone_error.textContent=" *Phone belum diiisi,Silahkan isi terlebih dahulu!";
      $('#phone').focus();
      
      username_error.style.border="1 px solid red";
      username_error.textContent="";
      email_error.style.border="1 px solid red";
      email_error.textContent="";
      group_error.style.border="1 px solid red";
      group_error.textContent="";
      return false;

    }else{
  
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
        data:'id='+id+'&group_name='+group+'&email='+email+'&username='+username+'&lname='+lname+'&fname='+fname+'&phone='+phone+'&password='+password,
            url :'<?php echo base_url("Users/aksi_update_data_user_password") ?>',
        dataType:'json',
        success:function(hasil){
            console.log(hasil);
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

        }else{
        cpassword_error.style.border="1 px solid red";
        cpassword_error.textContent="";
        }

      }else{

    $.ajax({
    type:'POST',
    data:'id='+id+'&group_name='+group+'&email='+email+'&username='+username+'&lname='+lname+'&fname='+fname+'&phone='+phone,
    url :'<?php echo base_url("Users/aksi_update_data_user") ?>',
    dataType:'json',
    success:function(hasil){
        console.log(hasil);
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
  
      //proses memasukan update data



}


}

function tampil_data(){
  $.ajax({
    type:'POST',
    url:'<?php echo base_url("Users/TampilDatauser")?>',
    dataType:'json',
    success:function(data){
   
      var baris='';
      if (data.length==0){
          baris+=  '<tr>'+
          '<td colspan="7">Data Kosong </td>'+
          '</tr>';

      }else{


          for (var i=0;i<data.length; i++){
        
      
            
              var ta=data[i].id_anak;
              baris+='<tr>'+
              '<td  align="center"> <font size="2px">'+(i+1)+'</font></td>'+
              '<td align="center"><font size="2px" >'+data[i].nama+'</font></td>'+
              '<td align="center"> <font size="2px">'+data[i].tingatan_sekolah+'</td>'+
              '<td id="UmurAnak" align="center"> <font size="2px">'+tgl+'</td>'+
              '<td id='+ta+' align="center"> <font size="2px"> <center>'+jml_bahasa_isyarat(data[i].id_anak)+'</center></td>'+
              '<td align="center"> <font size="2px">'+data[i].id_alat+'</td>'+
              '<td width="10px" align="center"> <font size="2px">'+'<a class="btn btn-primary btn-xs" href="http://localhost/monitoring/user/informasi_isyarat/'+data[i].id_anak+'"><i class="fa fa-eye"></i> MONITORING</a>'+'</td>'+
              '<td><font color="#FFFFFF" size="2px">'+'<a class="btn btn-warning btn-xs" onclick="AmbilData('+data[i].id_anak+')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i> UBAH</a>'+'</td>'+
              '<td><font color="#FFFFFF" size="2px">'+'<a class="btn btn-danger btn-xs" onclick="swetalert('+data[i].id_anak+')"><i class="fa fa-trash"></i><font size="2px"> HAPUS</a>'+'</td>'+
                '</tr>';
              }
         }
      
     $("#target").html(baris);

    }

  });
  }


</script>


<!-- AdminLTE App -->

