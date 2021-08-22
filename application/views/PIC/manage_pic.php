
    
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
            <h3 class="box-title"><b>Manage PIC PO</b></h3>

          <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
           <?php if(in_array('createPicPO', $user_permission)): ?>
           
         <a href="<?php echo base_url('PicPO/add_pic') ?>" class="btn btn-primary">Add PIC</a>
             <?php endif; ?>
          
          </div>
        </div>
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
            <br>
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="picpoTable" class="table table-bordered table-striped">

                <thead>
                <tr>
                    
                  <th style="width: 20%">PIC Name</th>
                  <th style="width: 25%">Email</th>
                  <th style="width: 15%">Jabatan</th>
                  <th style="width: 30%">Customer Name</th>
               

                  <th style="width: 10%"><center>Action</center></th>
               
                </tr>
                </thead>
            
              </table>
            </div>
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

      <div class="modal fade" id="update"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document" data-keyboard="false">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b>Edit Data PIC PO</b></h4>
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
                 <small class="text-danger pl-3" id="email_error"></small>

                      <div class="form-group">
                  <label for="email">Customer Name</label>
                     <select class="form-control customer" id="customer" name="customer" style="width:99%;"  value="<?php echo set_value('pic')?>">
                  
                    <?php foreach ($customer as $k): ?>
                      <option  id="<?= $k->name ?>" value="<?php echo $k->name ?>"><?php echo $k->name ?></option>
                    <?php endforeach ?>
                  </select>
                  <small class="text-danger pl-3" id="customer_error"></small>

                </div>

                  <div class="form-group">
                    <input type="hidden" name="id">
                  </div>
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

    </section>
  
    <!-- /.content -->
  </div>

  <script type="text/javascript">
   
    $(document).ready(function(){  
      var dataTable = $('#picpoTable').DataTable({  
           "processing":true,  
           "serverSide":true,
                  "responsive": true,
      "autoWidth": false,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url("PicPO/TampilDatapicpo")?>",  
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
    
    function swetalert(id){
  Swal.fire({
  title: 'menghapus Data',
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
        url : "<?php echo base_url("PicPO/hapus_pic/3") ?>",
        type:"post",
        data:{id:id},
        success:function(){
                   Swal.fire({
  title: "Deleted!",
  text: "Data berhasil dihapus.",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});

            
            $('#picpoTable').DataTable().ajax.reload();

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
                $('[name="customer"]').select2();
       
             console.log(hasil);
               $('[name="username"]').val(hasil[0].pic_name);
               $('[name="jabatan"]').val(hasil[0].jabatan);
               $('[name="email"]').val(hasil[0].email);
               $('[name="id"]').val(hasil[0].id);
                $('[name="customer"]').val(hasil[0].customer).change();
                   
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
    var customer=$("[name='customer']").val();


    var username_error=document.getElementById("username_error");
    var jabatan_error=document.getElementById("jabatan_error");
    var email_error=document.getElementById("email_error");
     var customer_error=document.getElementById("customer_error");
  
 


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
    }else if (customer.trim()==''){
      customer_error.style.border="1 px solid red";
      customer_error.textContent=" *Customer belum dipilih,silahkan dipilih!";
      $('#customer').focus();
      username_error.style.border="1 px solid red";
      username_error.textContent="";
       jabatan_error.style.border="1 px solid red";
      jabatan_error.textContent="";
      email_error.style.border="1 px solid red";
      email_error.textContent="";
      return false;
    }
    else{
      username_error.style.border="1 px solid red";
      username_error.textContent="";
      jabatan_error.style.border="1 px solid red";
      jabatan_error.textContent="";
      email_error.style.border="1 px solid red";
      email_error.textContent="";


      $.ajax({
type:'POST',
data:'id='+id+'&username='+username+'&email='+email+'&jabatan='+jabatan+'&customer='+customer,
url :'<?php echo base_url("PicPO/aksi_update_data_pic") ?>',
dataType:'json',
success:function(hasil){
                   Swal.fire({
  title: "success!",
  text: "Data berhasil diubah",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});

    $('#update').hide();
    $('.modal-backdrop').hide();
      $('#picpoTable').DataTable().ajax.reload();
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
  
  $('#picpoTable').DataTable().ajax.reload();
}

});

    }
  



}
function alert(){
  
              Swal.fire({
                icon: 'info',
                title: 'Oops...',
               text: "Data PIC tidak bisa dihapus dikarnakan PIC tersebut terdapat data di quotation event atau quotation other",
                
              });

}



function datatable(){
      $.ajax({
        type:'POST',
   
  url:'<?php echo base_url("PicPO/TampilDatapicpo")?>',
        dataType:'json',
        success:function(data){
       

                var baris='';
      if (data.length==0){
          baris+=  '<tr>'+
          '<td colspan="7">Data Kosong </td>'+
          '</tr>';

      }else{


                for (var i=0;i<data.length; i++){
       
              baris+='<tr>'+
              '<td hidden>'+data[i].id+'</td>'+
             '<td>'+data[i].pic_name+'</td>'+
              '<td>'+data[i].email+'</td>'+
              '<td>'+data[i].jabatan+'</td>'+
              '<td>'+data[i].customer+'</td>'+
              '<td style="width: 25%"><center>'+

              '<?php if(in_array('updatePicPO', $user_permission)): ?>'+
              '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Edit" onclick="AmbilData('+data[i].id+')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i> </a>'+
              '<?php endif; ?>'+

              'ensp;<?php if(in_array('deletePicPO', $user_permission)): ?>'+
              '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Delete" onclick="swetalert('+data[i].id+')"><i class="fa fa-trash"></i><font size="2px"></a></font>'+
              '<?php endif; ?><center>'+
             
              
              '</td>'+
              
                  
                '</tr>';
            
             }
         }
      
     $("#target").html(baris);
          
    },
        error:function(data){
         

       
   
}

});
}
   $("#PICMainNav").addClass('active');
  $("#managePICPONav").addClass('active');
   $("#openPICNav").addClass('menu-open');


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer>
</script>
  
 

