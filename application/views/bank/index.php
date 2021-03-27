
    
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

       

<div class="row">
                  <div class="box-header with-border">
                      <div class="text-center">
                        
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div id="notif"></div>
                  </div>
                  <div class="col-md-12" style="margin: 10px;">
                      <div class="box box-solid">
                          <form action="<?php echo base_url('dashboard/aksi_update_bank_item') ?>" method="post" id="SimpanData">
                              <div class="box-body">
                                 <div class="form-group">
                    <label for="deposit_number" class="col-sm-5 control-label" style="text-align:left;">Deposit Number</label>
                    <div class="col-sm-7">
                      <input readonly style="width:50%" type="text" class="form-control" id="deposit_number" name="deposit_number"  autocomplete="off" required value="<?php echo $deposit_number ?>"> 
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="total" class="col-sm-5 control-label" style="text-align:left;" hidden="">Total Cash In (Rp)</label>
                    <br>
                    <div class="col-sm-7">
                    
                       <div  readonly id="hasil" name="hasil" style="width:50%"  class="form-control" hidden=""><?php echo $totalcashin;?></div> 
                    </div>
                        <small class="text-danger pl-3" id="total_error"></small>
                  </div>
                   <input readonly style="width:50%" type="text" class="form-control" id="id" name="id" hidden="" value="<?php echo $id?>"> 

                                <blockquote>
                                  <p><b>Keterangan!!</b></p>
                                  <small><cite title="Source Title">Inputan Yang Ditanda Bintang Merah (<span style="color: red;">*</span>) Harus Di Isi !!</cite></small>
                                </blockquote>

                                <br>
                                  <table class="table table-bordered" id="tableLoop">
                                      <thead>
                                          <tr>
                                              <th class="text-center">#</th>
                                              <th>Bank Name</th>
                                              <th>No Rekening</th>
                                              <th>Deposit</th>
                                              <th><button hidden="" class="btn btn-success btn-block" id="BarisBaru"><i class="fa fa-plus"></i> Baris Baru</button></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        
                                          <?php 
                                           $no=1;
                                         

                                          foreach ($bank_item as $k): 
                                         ?>
                                              <tr>
                                        <td class="text-center"><?php echo $k->id_bank_item; ?><input hidden="" type="text" name="id_bank_item[]" class="form-control id_bank_item" value="<?php echo $k->id_bank_item; ?>"></td>
                                          <td><input type="text" name="bank_name[]" class="form-control bank_name" placeholder="Bank Name..." required="" value="<?php echo $k->bank_name ?>">
                                      </td>
                                         <td>
                                        <input type="text" name="rek[]" id="rek" class="form-control rek" placeholder="No Rekening..." required="" value="<?php echo $k->norek ?>">
                                    </td>
                                      <td>
                                      <input type="text" name="deposit[]" value="<?php  echo $k->deposit ?>"  class="form-control deposit" placeholder="Deposit..." required=""   oninput="myFunction()"  id="deposit1"  onkeyup="convertToRupiah(this);">';
                                    </td>
                                      <td class="text-center">
                                      <a hidden="" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times" value="<?php $k->deposit ?>"></i></a>
                                </td>
                                      </tr>
                     
                                        <?php endforeach ?>
                                      </tbody>
                                      
                                  </table>
                              </div>
                              <div class="box-footer">
                                  <div class="form-group text-right">
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
                                      <button type="reset" class="btn btn-default">Batal</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>    
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
                      
           
  


</script>
 <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js')?>"></script>


 

