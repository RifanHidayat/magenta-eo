
    
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
            <h3 class="box-title"><b>Manage Items</b></h3>

          <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
           <?php if(in_array('createItems', $user_permission)): ?>
         <font color="white"> <a  data-target="#add" class="btn btn-primary" data-toggle="modal" data-target="#add">Add Item</a></font>
         <?php endif; ?> 
          
          </div>
        </div>
          
         <div class="card-body">
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
          


          <div class="box">
            <br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="itemTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                
                  <th style="width: 20%">Item Name</th>
                  <th style="width: 8%"><center>Total Value</center></th>
                  <th style="width: 7%"><center>Status<center></th>
                   <th style="width: 10%">Metode Perhitungan</th>
               

                  <th  style="width: 10%"><center>Action</center></th>
               
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

 
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document" data-keyboard="false">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b>Edit Item</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form role="form" action="<?php base_url('Item/add_attribute'); ?>" method="post">
              <div class="box-body">

        
            
                  <div class="form-group">
                  <label for="nameadd">Item</label>
                  <input type="text" row="6" class="form-control" id="name" name="name" placeholder="Masukan Item" autocomplete="off" value="<?php echo set_value('nameadd')?>">
                       <small class="text-danger pl-3" id="name_error"></small>
                </div>
              
                  <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" id="status" name="status" style="width:99%;"  >
                    
                   
                        <option value="Active">Active</option>
                        <option value="In Active">In Active</option>
                    </select>
                <small class="text-danger pl-3" id="status_error"></small>
                </div>

                    <div class="form-group">
                  <label for="nameadd">Metode Perhitungan</label>
                  <select class="form-control" id="statusperhitungan_edit" name="statusperhitungan_edit" style="width:99%;"  >
                     <label for="status">Metode Perhitungan</label>
                    <option value="">Select Metode</option>
                        <option value="No-Fee Cost">No-Fee Cost</option>
                        <option value="Comissionable Cost">Commissionable Cost</option>
                    </select>
                       <small class="text-danger pl-3" id="statusperhitungan_error_edit"></small>
                </div>
                   <div class="form-group">
                    <input type="hidden" name="id">
                  </div>
              </div>
              <br>
              <br>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="Ubahdata()">Save Changes</button>

      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document" data-keyboard="false">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><b>Add Item</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form role="form" action="<?php base_url('Item/add_attribute'); ?>" method="post">
              <div class="box-body">

        
            
                     <div class="form-group">
                  <label for="nameadd">Item</label>
                   <input type="text" row="6" class="form-control" id="nameadd" name="nameadd" placeholder="Masukan Item" autocomplete="off" value="<?php echo set_value('nameadd')?>">
                             <small class="text-danger pl-3" id="name_erroradd"></small>
                </div>
        
                 <div class="form-group">
                 <label for="status">Status</label>
                  <select class="form-control" id="statusdd" name="statusadd" style="width:99%;"  >
                     
                   
                        <option value="Active">Active</option>
                        <option value="In Active">In Active</option>
                    </select>
                    </div>
                <small class="text-danger pl-3" id="status_erroradd"></small>

                      <div class="form-group">
                  <label for="nameadd">Metode Perhitungan</label>
                  <select class="form-control" id="statusperhitungan" name="statusperhitungan" style="width:99%;"  >
                     <label for="status">Metode Perhitungan</label>
                    <option value="">Select Metode</option>
                        <option value="No-Fee Cost">No-Fee Cost</option>
                        <option value="Comissionable Cost">Commissionable Cost</option>
                    </select>
                       <small class="text-danger pl-3" id="statusperhitungan_error"></small>
                </div>
                   <div class="form-group">
                   
                  </div>
              </div>
              <br>
              <br>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="SimpanData()">Save</button>

      </div>
      
    </div>
  </div>
</div>

    </section>
  
    <!-- /.content -->
  </div>

<script type="text/javascript">

 $(document).ready(function(){  
      var dataTable = $('#itemTable').DataTable({  
           "processing":true,  
           "serverSide":true,  
             "responsive": true,
      "autoWidth": false,
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url("Item/TampilDataitem")?>",  
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
  title: 'hapus Data',
  text: "Apakah anda yakin?!",
  icon: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
 cancelButtonColor: '#808080',
  cancelButtonText: 'Batalkan',
  confirmButtonText: 'Iya'
}).then((result) => {
  if (result.value) {
    $.ajax({
        url : "<?php echo base_url("Item/hapus_attribute/3") ?>",
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

            
          $('#itemTable').DataTable().ajax.reload();

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
          url:'<?php echo base_url("Item/ambilIdAttribute/3")?>',
          data:{id:id},
          dataType:'json',
          success:function(hasil){
             console.log(hasil);
               $('[name="name"]').val(hasil[0].name);
               $('[name="status"]').val(hasil[0].active);
                $('[name="id"]').val(hasil[0].id);
                 $('[name="statusperhitungan_edit"]').val(hasil[0].metode);
          },
          error:function(hasil){
    
           
          }
         

      });
  
}

function Ubahdata(){
    var name=$('[name="name"]').val();
    var status=$("[name='status']").val();
    var id=$("[name='id']").val();
    var metode=$("[name='statusperhitungan_edit']").val();


    var name_error=document.getElementById("name_error");
    var status_error=document.getElementById("status_error");
     var status_perhitungan=document.getElementById("statusperhitungan_error");
  
    if (name.trim()==''){
      name_error.style.border="1 px solid red";
      name_error.textContent=" *Nama Item masi kosong,silahkan diisi!";
      $('#name').focus();
      return false;
    } else if (status.trim()==''){
      status_error.style.border="1 px solid red";
      status_error.textContent=" *Status belum dipilih ,silahkan dipilih!";
      $('#status').focus();
      name_error.style.border="";
      name_error.textContent="";
      return false;
    }else if (metode.trim()==''){
      status_perhitungan.style.border="1 px solid red";
      status_perhitungan.textContent=" *Metode Perhitungan belum dipilih ,silahkan dipilih!";
      $('#status').focus();
      name_error.style.border="";
      name_error.textContent="";
       status_error.style.border="1 px solid red";
      status_error.textContent="";
      return false;
    }else{
      status_error.style.border="1 px solid red";
      name_error.style.border="1 px solid red";
         status_perhitungan.style.border="1 px solid red";
      status_perhitungan.textContent="";
      status_error.textContent="";
      name_error.textContent="";


$.ajax({
type:'POST',
// data:'id='+id+'&name='+name+'&status='+status+'&metode='+metode,
data:{id:id,name:name,status:status,metode:metode},
url :'<?php echo base_url("Item/aksi_update_data_attribute")?>',
dataType:'json',

success:function(hasil){
     $('#update').hide();
    $('.modal-backdrop').hide();
                  Swal.fire({
  title: "success!",
  text: "Data berhasil diubah.",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});

 
     $('#itemTable').DataTable().ajax.reload();
},
error:function(){
    $('#update').hide();
    $('.modal-backdrop').hide();
                Swal.fire({
  title: "success!",
  text: "Data berhasil diubah.",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});

  
    $('#itemTable').DataTable().ajax.reload();
   
}

});




    }

}



function SimpanData(){
    var name=$('[name="nameadd"]').val();
    var status=$("[name='statusadd']").val();
     var perhitungan=$("[name='statusperhitungan']").val();
     console.log(name)
  


    var name_error=document.getElementById("name_erroradd");
    var status_error=document.getElementById("status_erroradd");
       var perhitungan_error=document.getElementById("statusperhitungan_error");
  
    if (name.trim()==''){
      name_error.style.border="1 px solid red";
      name_error.textContent=" *Nama Item masi kosong,silahkan diisi!";
      $('#namedd').focus();
      return false;
    } if (status.trim()==''){
      status_error.style.border="1 px solid red";
      status_error.textContent=" *Status masi kosong,silahkan diisi!";
      $('#statusdd').focus();
      name_error.style.border="";
      name_error.textContent="";
      return false;
    } if (perhitungan.trim()==''){
      perhitungan_error.style.border="1 px solid red";
      perhitungan_error.textContent=" *metode perhitungan masi kosong,silahkan diisi!";
      $('#statusdd').focus();
      name_error.style.border="";
      name_error.textContent="";
      return false;
    }else{
      status_error.style.border="1 px solid red";
      name_error.style.border="1 px solid red";
      status_error.textContent="";
      name_error.textContent="";
          perhitungan_error.style.border="1 px solid red";
      perhitungan_error.textContent="";

      $.ajax({
type:'POST',
// data:'name='+name+'&status='+status+'&metode='+perhitungan,
data:{name:name,status:status,metode:perhitungan},
url :'<?php echo base_url("Item/aksi_add_data_item")?>',
dataType:'json',
success:function(hasil){
     $('.modal-backdrop').hide();
      $('#add').hide();
                Swal.fire({
  title: "success!",
  text: "Data berhasil disimpan.",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});
    $('[name="nameadd"]').val("");
    $("[name='statusadd']").val("");
     $("[name='statusperhitungan']").val("");


 
 $('#itemTable').DataTable().ajax.reload();
},
error:function(){
   $('#add').hide();
    $('.modal-backdrop').hide();
                 Swal.fire({
  title: "success!",
  text: "Data berhasil disimpan.",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});
            $('[name="nameadd"]').val("");
    $("[name='statusadd']").val("");
     $("[name='statusperhitungan']").val("");

   
   $('#itemTable').DataTable().ajax.reload();
   
}

});




    }

}




function jml_value(id){
$.ajax({
type:'post',
url:'<?php echo base_url("user/jml_value") ?>',
data:'id='+id,
dataType:'json',
success:function(jml){
console.log(jml);
var table=id;
var ta="#"+table;
$(ta).html(jml.jml);


},
error:function(jml){
}

});
}

function datatable(){
   jmlvalue("1");
      $.ajax({
        type:'POST',
   
  url:'<?php echo base_url("Item/TampilDataitem")?>',
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
                  jmlvalue(data[i].id,i);
                
       
              baris+='<tr>'+
                  '<td hidden>'+data[i].id+'</td>'+
              '<td>'+data[i].name+'</td>'+
              '<td><center><p id="jml'+i+'"></p></center></td>'+
             '<td><center>'+data[i].active+'<center></td>'+
              '<td>'+data[i].metode+'</td>'+
              '<td style="width: 30%"><center>'+

              '<?php if(in_array('updateItemvalue', $user_permission) || in_array('viewItemvalue', $user_permission) || in_array('updateItemvalue', $user_permission) || in_array('deleteItemvalue', $user_permission)): ?>'+
              '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Add Value" href="<?php echo base_url()?>Values/manage_item_value/'+data[i].id+' "><i class="fa fa-plus"></i><font size="2px"> Value</a>'+
               '<?php endif; ?>'+ 

               '<?php if(in_array('updateItems', $user_permission)): ?>
                <font color="#FFFFFF" size="2px">'+'<a   title="Edit" class="btn btn-sm bg-gradient-secondary" onclick="AmbilData('+data[i].id+')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i></a>'+
                  '<?php endif; ?>'+ 
                  '<?php if(in_array('deleteItems', $user_permission)): ?>
                        <font color="#FFFFFF" size="2px"><a   title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert('+data[i].id+')"><i class="fa fa-trash"></i><font size="2px"> </a></td>'+ 
                         '<?php endif; ?>'+ 
   
                
                '</tr>';
            
             }
         }
      
     $("#target").html(baris);
          
    },
        error:function(data){
         

       
   
}

});
}
function  jmlvalue(id,i){


    $.ajax({
          type:"post",
          url:'<?php echo base_url("Item/jml_value/3")?>',
          data:{id:id},
          dataType:'json',
          success:function(hasil){
           document.getElementById("jml"+i).innerHTML = hasil;
            console.log(hasil);

          
            
         
          },
          error:function(hasil){
            
    
           
          }
         

      });

}
$("#itemMainNav").addClass('active');
</script>

