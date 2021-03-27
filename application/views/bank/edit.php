
    
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
          
            <div class="card">
              <div class="card-header">
                <h3 class="box-title">Edit Saldo PIC PO</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12">
                      <div id="notif"></div>
                  </div>
                  <div class="col-md-12" style="margin: 10px;">
                      <div class="box box-solid">
                          <form action="<?php echo base_url('Bank/aksi_update_bank_item') ?>" method="post" id="SimpanData">
                              <div class="box-body">
                                 <div class="form-group">
                    <label for="deposit_number" class="col-sm-5 control-label" style="text-align:left;">Deposit Number</label>
                    <div class="col-sm-7">
                     <input readonly style="width:50%" type="text" class="form-control" id="deposit_number" name="deposit_number"  autocomplete="off" required value="<?php echo $deposit_number ?>"> 
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="total"  class="col-sm-5 control-label" style="text-align:left;">Total Cash In (Rp)</label>
                    <br>
                    <div class="col-sm-7">
                    
                          <input type="text" value="<?php echo($totalcashin) ?>" readonly id="hasil" name="hasil" style="width:50%"  class="form-control"   > 
                    </div>
                        <small class="text-danger pl-3" id="total_error"></small>
                  </div>
                   <input readonly style="width:50%" type="text" class="form-control" id="id" name="id" hidden> 

                         <!--  <blockquote>
                                  <p><b>Keterangan!!</b></p>
                                  <small><cite title="Source Title">Inputan Yang Ditanda Bintang Merah (<span style="color: red;">*</span>) Harus Di Isi !!</cite></small>
                                </blockquote> -->

                                <br>
                 <table class="table table-bordered" id="tableLoop">
                                      <thead>
                                          <tr>
                                            
                                              <th>Bank Name</th>
                                              <th>No Rekening</th>
                                              <th>Deposit</th>
                                              <th hidden="" style="width: 10%" ><button  class="btn btn-success btn-block" id="BarisBaru"><i class="fa fa-plus"></i></button></th>
                                          </tr>
                                      </thead>
                                    <tbody>
                                        
                                          <?php 
                                           $no=0;
                                         

                                          foreach ($bank_item as $k): 
                                            $no=$no+1;
                                         ?>
                                              <tr id="baristable">
                                        <td hidden="" class="text-center"><?php echo $k->id_bank_item; ?><input hidden="" type="text" name="id_bank_item[]" class="form-control id_bank_item" value="<?php echo $k->id_bank_item; ?>"></td>
                                          <td><input type="text" name="bank_name[]" class="form-control bank_name" placeholder="Bank Name..." required="" value="<?php echo $k->bank_name ?>">
                                      </td>
                                         <td>
                                        <input type="text" name="rek[]" id="rek" class="form-control rek" placeholder="No Rekening..." required="" value="<?php echo $k->norek ?>">
                                    </td>
                                      <td>
                                      <input onkeyup="convertToRupiah(this);" type="text"  name="deposit[]" value="<?php  echo $k->deposit ?>"  class="form-control deposit" placeholder="Deposit..." required=""   oninput="myFunction()"  id="<?php echo($no); ?>"  >
                                    </td>
                                      <td hidden="" class="text-center">
                                      <!-- onkeyup="convertToRupiah(this);" -->
                                </td>
                                      </tr>
                     
                                        <?php endforeach ?>
                                      </tbody>
                                    </table>
                                      
              
              </div>
                <div class="box-footer">
                                  <div class="form-group text-left">
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Edit</button>
                                      <a href="<?php echo base_url('Bank/manage_Bank') ?>" class="btn btn-warning"><font color="white"> Back</font></a>


                                  </div>
                              </div>
                            </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
       $('#deposit_2').val();

         var x;
         var hitung=0;
        for (x = 1; x <= Nomor; x++) {
          var data=$('#'+x).val();
          var data1 = data.replace(/[^\w\s]/gi, '');
          hitung=Number(hitung)+Number(data1);
          
        }
         var hitung1 = hitung.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
         $('#hasil').val(hitung1);
         if (hitung==0){
           $('#hasil').val('');

         }
        }
        
         $(document).ready(function() {
    
            //AmbilId();
            total();

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
                        
                          Baris += '<td>';
                              Baris += '<input type="text" name="bank_name[]" id="bank_name" class="form-control bank_name" placeholder="Bank Name..." required="">';
                          Baris += '</td>';
                            Baris += '<td>';
                              Baris += '<input type="text" name="rek[]" id="rek" class="form-control rek" placeholder="No Rekening..." required="">';
                          Baris += '</td>';
                          Baris += '<td>';
                              Baris += '<input type="number" name="deposit[]" onkeyup="convertToRupiah(this);" id="'+Nomor+'"  class="form-control deposit" placeholder="Deposit..." required=""  oninput="myFunction()"  id="deposit1"  >';
                          Baris += '</td>';
                          Baris += '<td  class="text-center">';
                              Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times"></i></a>';
                          Baris += '</td>';
                      Baris += '</tr>';
                       // onkeyup="convertToRupiah(this);"

                  $("#tableLoop tbody").append(Baris);
                  $("#tableLoop tbody tr").each(function () {
                     $(this).find('td:nth-child(2) input').focus(); 
                  });

              }

              $(document).on('click', '#HapusBaris', function(e) {
                 e.preventDefault();
                 var Nomor = 1;
                 $(this).parent().parent().remove();
                 total();
                 $('tableLoop tbody tr').each(function() {
                     $(this).find('td:nth-child(1)').html(Nomor);
                     Nomor++;
                 });
              });

              
                 $('#SimpanData').submit(function(e) {
                      var hasil=$('#hasil').val();
                        var email_error=document.getElementById("total_error");
                       
  
                  if (hasil.trim()==''){
                       total_error.textContent=" *data deposit belum diisi,silahkan diisi!";
                       total_error.style.border="1 px solid red";


                  }else{
                    total_error.textContent="";
                    total_error.style.border="1 px solid red";
                     e.preventDefault();
                     save_bank_item();

                  }
                    
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

                                 $("#notif").html(data.notif).fadeOut(5000).delay(1000); 
                                
                                });
                                window.location.href = "<?php echo base_url("Bank/manage_bank")?>";

                    
         
                          }else{
                              $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
                          }
                      },

                      error:function (error) {
                          alert(error);
                      }

                  });
              }
                      
           
  


</script>
 <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js')?>"></script>


 

