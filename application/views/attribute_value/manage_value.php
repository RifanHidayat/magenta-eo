    
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
            <h3 class="box-title"><b>Manage <?php echo $nameItem; ?> Value</b> </h3>

          <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
           <?php if(in_array('createItemvalue', $user_permission)): ?>
         <a data-toggle="modal" data-target="#add" class="btn btn-primary"><font color="white">Add Value</font></a>
           <?php endif; ?>
            <a href="<?php echo base_url('Item/manage_item') ?>" class="btn btn-secondary"><font color="white">Back</font></a>
          
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
          
            <!-- /.box-header -->
            <div class="box-body">
              <table id="itemvalueTable" class="table table-bordered table-striped">
                <thead>
                <tr>
               
                  <th>Item Value</th>
                  <th>Satuan Frequency</th>
                  <th>Satuan Quantyity</th>
                  <th>Status</th>




                 
                  <th colspan="1"><center>Action</center></th>
               
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
        <h4 class="modal-title" id="exampleModalLabel"><b>Edit Value Item</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form role="form" action="<?php base_url('Values/add_attribute'); ?>" method="post">
              <div class="box-body">         
                <div class="form-group">
                  <label for="value">Item Value</label>
                  <input type="text" class="form-control" id="value" name="value" placeholder="Item Value" autocomplete="off">
                   <small class="text-danger pl-3" id="value_error_update"></small>
                </div>
                
               

               
                  <div class="form-group">
                      <label for="value">Status</label>

                    <select class="form-control" id="status_update" name="status_update" style="width:99%;"  >
                     <label for="status">Status</label>
                    
                        <option value="Active">Active</option>
                        <option value="In Active">In Active</option>
                    </select>
                     <small class="text-danger pl-3" id="status_error_update"></small>
                     </div>
                             
                         <div class=" form-group">
                       <label for="value">Satuan Frequency</label>
                      
                 
                  <input style="width: 50%" type="text" class="col-sm-5 form-control" id="satuan_valuef_update" name="satuan_valuef_update" placeholder="Satua Frequency" autocomplete="off">
                 

                     <small class="text-danger pl-3" id="satuanf_error_update"></small>

                 </div>


                       <div class="form-group" id="kanan1" style="margin-top: -93px;">
                       <label for="value">Satuan Quantity</label>
                     
                 

                    <input type="text" class="form-control" id="satuan_valueeq_update" name="satuan_valueeq_update" placeholder="Satuan Quantity" autocomplete="off">
                     <small class="text-danger pl-3" id="satuanq_error_update"></small>

               
                
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
        <h4 class="modal-title" id="exampleModalLabel"><b>Add Value Item</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form role="form" action="<?php base_url('Values/add_attribute'); ?>" method="post">
              <div class="box-body">         
                <div class="form-group">
                  <label for="value">Item Value</label>
                  <input type="text" class="form-control" id="value1" name="value1" placeholder="Item Value" autocomplete="off">
                        <small class="text-danger pl-3" id="value1_error"></small>
                </div>
           



                  
                  <div class="form-group">
                     <label for="statusadd">Status</label>

                    <select class="form-control" id="statusadd" name="statusadd" style="width:99%;"  >
                     <label for="status">Status</label>
                 
                        <option value="Active">Active</option>
                        <option value="In Active">In Active</option>
                    </select>
                      <small class="text-danger pl-3" id="statusadd_error1"></small>
                     </div>
              

                   <div class=" form-group">
                       <label for="value">Satuan Frequency</label>
                    
                 
                  <input style="width: 50%" type="text" class="col-sm-5 form-control" id="satuan_valuef" name="satuan_valuef" placeholder="Satua Frequency" autocomplete="off">
                 

         

             
                      <small class="text-danger pl-3" id="satuanf1_error"></small>
                 </div>
                        <div class="form-group" id="kanan1" style="margin-top: -93px;">
                       <label for="value">Satuan Quantity</label>
                    
                 
               
                 

                    <input type="text" class="form-control" id="satuan_valueq" name="satuan_valueq" placeholder="Satuan Quantity" autocomplete="off">

             
                  <small class="text-danger pl-3" id="satuanq1_error"></small>
                 </div>
            
               
                


                <div class="form-group">
                         <input type="hidden" value="<?php echo($id) ?>" name="id_add">
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
      var dataTable = $('#itemvalueTable').DataTable({  
           "processing":true,  
           "serverSide":true,  
             "responsive": true,
      "autoWidth": false,
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url("Values/TampilDatavalueitem/42")?>",  
                data:{idd:<?php echo $id; ?>,id:<?php echo $id; ?>},
                dataType:'json',

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
  title: 'Menghapus Data',
  text: "Apakah anda yakin?",
  icon: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  confirmButtonColor: '#3085d6',
 cancelButtonColor: '#808080',
  cancelButtonText: 'Batalkan',
  confirmButtonText: 'Iya'
}).then((result) => {
  if (result.value) {
    $.ajax({
        url : "<?php echo base_url("Values/hapus_value_attribute/3") ?>",
        type:"post",
        data:{id:id},
        success:function(){
                   Swal.fire({
  title: "Deeleted!",
  text: "Data berhasil dihapus.",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});

            
             $('#itemvalueTable').DataTable().ajax.reload();

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
          url:'<?php echo base_url("Values/ambilIdValue/3")?>',
          data:{id:id},
          dataType:'json',
          success:function(hasil){
             console.log(hasil);
               $('[name="value"]').val(hasil[0].value);
            
                 $('[name="id"]').val(hasil[0].id);
                 $('[name="status_update"]').val(hasil[0].status);
                 $('[name="satuan_valuef_update"]').val(hasil[0].satuanf);
                  $('[name="satuan_valueeq_update"]').val(hasil[0].satuanq);
          },
          error:function(hasil){
    
           
          }
         

      });
  
}

function Ubahdata(){
    var value=$('[name="value"]').val();
    var id=$('[name="id"]').val();
     var satuan_valuef=$('[name="satuan_valuef_update"]').val();
      var satuan_valueq=$('[name="satuan_valueeq_update"]').val();
      var status1=$('[name="status_update"]').val();
    
    var value_error=document.getElementById("value_error_update");    
    var satuan_errorf=document.getElementById("satuanf_error_update");  
    var satuan_errorq=document.getElementById("satuanq_error_update");  
    var status_error=document.getElementById("status_error_update");  
    if (value.trim()==''){
      value_error.style.border="1 px solid red";
      value_error.textContent=" *Value item  masih kosong,silahkan diisi!";
      $('#value').focus();
      return false;
    }else if (status1.trim()==''){
         status_error.style.border="1 px solid red";
      status_error.textContent=" *Status value  belum dipilih,silahkan dipilih terlebih dahulu";
      $('#value').focus();
      value_error.style.border="1 px solid red";
      value_error.textContent=" ";



    }else if (satuan_valuef.trim()==''){
       satuan_errorf.style.border="1 px solid red";
      satuan_errorf.textContent=" Satuan frequency masih kosong,silahkan diisi! ";
      $('#satuan_valuef_update').focus();
      return false;
      value_error.style.border="1 px solid red";
      value_error.textContent=" ";
       status_error.style.border="1 px solid red";
      status_error.textContent="";


    }else if (satuan_valueq.trim()==""){
       satuan_errorf.style.border="1 px solid red";
      satuan_errorf.textContent=" Satuan quantity masih kosong,silahkan diisi! ";
      $('#satuan_valuef_update').focus();
      return false;
      value_error.style.border="1 px solid red";
      value_error.textContent=" ";
       status_error.style.border="1 px solid red";
      status_error.textContent="";
            satuan_errorf.style.border="1 px solid red";
      satuan_errorf.textContent=" ";


    }else{
      value_error.style.border="1 px solid red";
          value_error.style.border="1 px solid red";
      value_error.textContent=" ";
       status_error.style.border="1 px solid red";
      status_error.textContent="";
            satuan_errorf.style.border="1 px solid red";
      satuan_errorf.textContent=" ";
         satuan_errorf.style.border="1 px solid red";
      satuan_errorf.textContent="";

      


      $.ajax({
type:'POST',
// data:'id='+id+'&value='+value+'&status='+status1+'&satuanf='+satuan_valuef+'&satuanq='+satuan_valueq,
data:{value:value,id:id,status:status1,satuanf:satuan_valuef,satuanq:satuan_valueq},
url :'<?php echo base_url("Values/aksi_update_data_value_attribute") ?>',
dataType:'json',
success:function(hasil){
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
     $('#itemvalueTable').DataTable().ajax.reload();
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
     $('#itemvalueTable').DataTable().ajax.reload();
   
}

});

    }
  



}

function SimpanData(){
    var value=$('[name="value1"]').val();
    var id=$('[name="id_add"]').val();
    var satuanf=$('[name="satuan_valuef"]').val();
    var satuanq=$('[name="satuan_valueq"]').val();
    var status=$('[name="statusadd"]').val();

 
    var value_error=document.getElementById("value1_error");
    var status_error=document.getElementById("statusadd_error1");
    var satuanf_error=document.getElementById("satuanf1_error");
    var satuanq_error=document.getElementById("satuanq1_error");
  
    if (value.trim()==''){
      value_error.style.border="1 px solid red";
      value_error.textContent=" *Value item masih kosong,silahkan diisi";
      $('#value1').focus();
      return false;
    }else if (status.trim()==''){
      status_error.style.border="1 px solid red";
      status_error.textContent=" Status dari value masih kosong,silahkan dipilih";
      $('#statusadd').focus();
    
      value_error.style.border="1 px solid red";
        
      value_error.textContent="";
        return false;


    }
    else if (satuanf.trim()==''){
      satuanf_error.style.border="1 px solid red";
      satuanf_error.textContent=" Satuan frequency masih kosong,silahkan diisi!";
      $('#satuanf').focus();
    
          
       value_error.textContent="";
          status_error.style.border="1 px solid red";
        value_error.style.border="1 px solid red";

        status_error.textContent=" ";
          return false;

    }else if (satuanq.trim()==''){


      satuanq_error.style.border="1 px solid red";
      satuanq_error.textContent="Satuan Quantity masih kosong ,silahkan diisi!";
      $('#satuanq').focus();
    
        value_error.style.border="1 px solid red";
         satuanf_error.style.border="1 px solid red";
            status_error.style.border="1 px solid red";
      value_error.textContent="";
      status_error.textContent=" ";
        satuanf_error.textContent=" ";
          return false;
    }
     else{
        value_error.style.border="1 px solid red";
         satuanf_error.style.border="1 px solid red";
            status_error.style.border="1 px solid red";
         satuanf_error.textContent="";
             satuanq_error.textContent="";

     
           value_error.textContent="";

      status_error.textContent=" ";
        satuanf_error.textContent=" ";
        satuanf_error.textContent="";
      $.ajax({
type:'POST',
// data:'value='+value+'&id='+id+'&status='+status+'&satuanf='+satuanf+'&satuanq='+satuanq,
data:{value:value,id:id,status:status,satuanf:satuanf,satuanq:satuanq},

url :'<?php echo base_url("Values/aksi_value_add_attribute")?>',
dataType:'json',
success:function(hasil){
                Swal.fire({
  title: "success!",
  text: "Data berhasil disimpan",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});

    $('#add').hide();
    $('.modal-backdrop').hide();
    $('#itemvalueTable').DataTable().ajax.reload();
},
error:function(){
                  Swal.fire({
  title: "success!",
  text: "Data berhasil disimpan",
  icon: "success",
   timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

});
      $('[name="value1"]').val("");
   
    $('[name="satuan_valuef"]').val("");
    $('[name="satuan_valueq"]').val("");
    $('[name="statusadd"]').val("Active");


    $('#add').hide();
    $('.modal-backdrop').hide();
     $('#itemvalueTable').DataTable().ajax.reload();
   
}

});




    }

}




function datatable(){
      $.ajax({
        type:'POST',
   
  url:'<?php echo base_url("Values/TampilDatavalueitem")?>',
  data:'id='+<?php echo $id; ?>,
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
               '<td hidden><center>'+data[i].id+'</center></td>'+
              '<td><center>'+data[i].value+'</center></td>'+
              '<td><center>'+data[i].satuanf+'</center></td>'+
              '<td><center>'+data[i].satuanq+'</center></td>'+
              '<td><center>'+data[i].status+'</center></td>'+    
              '<td><center>'+ 
              '<?php if(in_array('updateItemvalue', $user_permission)): ?>'+

              '<font color="#FFFFFF" size="2px">'+'<a class="btn btn-sm bg-gradient-secondary" onclick="AmbilData('+data[i].id+')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i> </a>&ensp;&ensp;'+
                '<?php endif; ?>'+
                 '<?php if(in_array('deleteItemvalue', $user_permission)): ?>'+


              '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" onclick="swetalert('+data[i].id+')"><i class="fa fa-trash"></i><font size="2px"></a></center>'+
               '<?php endif; ?>'+
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
$("#itemMainNav").addClass('active');
</script>
 
<!-- // data:'id='+id+'&value='+value+'&status='+status1+'&satuanf='+satuan_valuef+'&satuanq='+satuan_valueq,
data:{value:value,id:id,status:status1,satuanf:satuan_valuef,satuanq:satuan_valueq}
// data:'value='+value+'&id='+id+'&status='+status+'&satuanf='+satuanf+'&satuanq='+satuanq,
data:{value:value,id:id,status:status,satuanf:satuanf,satuanq:satuanq} -->
