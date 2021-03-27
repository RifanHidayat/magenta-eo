
    
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
          
            <?php if(in_array('createBank', $user_permission)): ?>
            <a href="<?php echo base_url('Bank/add_bank') ?>" class="btn btn-primary">Add Saldo PIC PO</a>
             <?php endif; ?>
          
            <br>
            <br>
           
            <div class="card">
              <div class="card-header">
                 <h3 class="box-title">Manage Saldo PIC PO</h3>
              <hr>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Deposite Number</th>
                  <th>Bank Cash In</th>
                  <th>No Rekening</th>
                  <th>Deposit</th>
               

                  <th colspan="1"><center>Action</center></th>
               
                </tr>
                </thead>
                <tbody>
                               
                    <?php foreach ($bank as $k): ?>
                      <tr>
                        <td><?php echo $k->deposit_number; ?></td>
                         <td><?php echo $k->bank_name; ?></td>
                        <td><?php echo $k->norek; ?></td>
                        <td><?php echo $k->deposit; ?></td>
                        <td>
                        <?php if(in_array('updateBank', $user_permission)): ?>
                        <font color="#FFFFFF" size="2px">'+'<a class="btn btn-warning btn-xs" href="<?php echo base_url('Bank/edit_bank/'.$k->bank_id) ?>"><font color="white"><i  class="fa fa-edit" ></i> Edit</font></a>
                                <?php endif; ?>
                         <?php if(in_array('deleteBank', $user_permission)): ?>
                        <font color="#FFFFFF" size="2px"><a class="btn btn-danger btn-xs" onclick="swetalert('<?php echo $k->id_bank_item?>')"><i class="fa fa-trash"></i><font size="2px"> Delete</a>'</td>  
                        <?php endif; ?>  



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
                <p>kosongkan password  jika tidak akan dirubah</p>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
    var value=0;


    function total(){
      //  var a=$('[name="deposit"]').val();
        var Nomor = $("#tableLoop tbody tr").length

       $('#deposit1').val();
      
   

         document.getElementById("hasil").innerHTML =$('#deposit_1').val();;

        }
        
         $(document).ready(function() {
    
            AmbilId();

    });

       function AmbilId(){
      $.ajax({
          type:"post",
          url:'<?php echo base_url("Bank/AmbilIDBank")?>',
          dataType:'json',
          success:function(hasil){
             console.log(hasil);
                  var date = new Date();
                  var tahun = date.getFullYear();
                  var t=tahun.toString()
                  var bulan = date.getMonth();
                  var tanggal = date.getDate();
                  var hari = date.getDay();
                  var bank_id="00"+hasil;
                  $('[name="id"]').val(bank_id)
        
        //QT-D-20082801
                $('[name="deposit_number"]').val("QT-D"+t.substring(2,4)+""+(bulan+1)+""+tanggal+bank_id);
              
          },
          error:function(hasil){
          
    
           
          }
         

      });
  
}

  function myFunction() {
    total();
  

 }


              
$(document).ready(function() {
                 for(B=1; B<=1; B++){
                  Barisbaru();
                 } 
                 $('#BarisBaru').click(function(e) {
                     e.preventDefault();
                     Barisbaru();
                 });

                 $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
              });

              function Barisbaru() {
                  $(document).ready(function() {
                      $("[data-toggle='tooltip']").tooltip(); 
                  });
                  var Nomor = $("#tableLoop tbody tr").length + 1;
                  var Baris = '<tr>';
                          Baris += '<td class="text-center">'+Nomor+'</td>';
                          Baris += '<td>';
                              Baris += '<input type="text" name="bank_name[]" id="bank_name" class="form-control bank_name" placeholder="Bank Name..." required="">';
                          Baris += '</td>';
                            Baris += '<td>';
                              Baris += '<input type="text" name="rek[]" id="rek" class="form-control rek" placeholder="No Rekening..." required="">';
                          Baris += '</td>';
                          Baris += '<td>';
                              Baris += '<input type="text" name="deposit[]" id="deposit"  class="form-control deposit" placeholder="Deposit..." required=""  oninput="myFunction()"  id="deposit1"  onkeyup="convertToRupiah(this);">';
                          Baris += '</td>';
                          Baris += '<td class="text-center">';
                              Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times"></i></a>';
                          Baris += '</td>';
                      Baris += '</tr>';

                  $("#tableLoop tbody").append(Baris);
                  $("#tableLoop tbody tr").each(function () {
                     $(this).find('td:nth-child(2) input').focus(); 
                  });

              }

              $(document).on('click', '#HapusBaris', function(e) {
                 e.preventDefault();
                 var Nomor = 1;
                 $(this).parent().parent().remove();
                 $('tableLoop tbody tr').each(function() {
                     $(this).find('td:nth-child(1)').html(Nomor);
                     Nomor++;
                 });
              });

              $(document).ready(function() {
                 $('#SimpanData').submit(function(e) {
                     e.preventDefault();
                     save_bank_item();
                 });
              });

              function save_bank_item() {
                    var id=$('[name="id"]').val();
                    var deposit=$("[name='deposit_number']").val();
                    var total=$("[name='hasil']").val();
                  $.ajax({
                      url:$("#SimpanData").attr('action'),
                      type:'post',
                      cache:false,
                      dataType:"json",
                      data: $("#SimpanData").serialize(),
                      success:function (data) {
                          if (data.success == true) {
                        
                                $('.bank_name').val('');
                                $('.hasil').val('');
                                $('.rek').val('');
                                $('.deposit').val('');
                                $('#notif').fadeIn(800, function() {
                                 $("#notif").html(data.notif).fadeOut(5000).delay(800); 
                                
                                });
                          
                    
         
                          }else{
                              $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
                          }
                      },

                      error:function (error) {
                          alert(error);
                      }

                  });
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
        url : "<?php echo base_url("Bank/hapus_bank/3") ?>",
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
  


</script>
 <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js')?>"></script>


