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
     <div class="card">
       <div class="card-header">
         <h3 class="box-title"><b>Edit Customer</b></h3>
         <div class="card-tools" style="margin-top: -35px;margin-right: 3px">
           <a href="<?php echo base_url('Customer/manage_customer') ?>" class="btn btn-secondary">
             <font color="white">Back</font>
           </a>
         </div>


       </div>
       <div class="card-body">
         <!-- Small boxes (Stat box) -->
         <div class="row">
           <div class="col-md-12 col-xs-12">

             <?php if ($this->session->flashdata('success')) : ?>
               <div class="alert alert-success alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <?php echo $this->session->flashdata('success'); ?>
               </div>
             <?php elseif ($this->session->flashdata('error')) : ?>
               <div class="alert alert-error alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <?php echo $this->session->flashdata('error'); ?>
               </div>
             <?php endif; ?>

             <div class="box">

               <form role="form" id="SimpanData" action="<?php base_url('Customer/add_customer/' . $id); ?>" method="post" name="formid">
                 <div class="box-body">


                   <div class="form-group">
                     <label for="name"></label>
                     <input hidden="" type="text" class="form-control" id="name" name="idCustomer" required="" autocomplete="off" value="<?php echo ($id) ?>">
                   </div>
                   <div class="form-group">
                     <label for="name">Customer Name</label>
                     <input style="width: 45%" type="text" class="form-control" id="name" name="name" required="" autocomplete="off" value="<?php echo ($name) ?>">
                     <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                   </div>
                   <div class="form-group" id="kanan1" style="margin-top: -75px;">
                     <label for="phone">Customer Phone</label>
                     <input type="text" class="form-control" id="phone" name="phone" autocomplete="off" value="<?php echo ($phone) ?>">
                     <?= form_error('phone', '<small class="text-danger pl-3">', '</small>') ?>
                   </div>

                   <div class="form-group">
                     <label for="npwp">NPWP</label>
                     <input style="width: 45%" type="text" class="form-control" required="" id="npwp" name="npwp" autocomplete="off" value="<?php echo ($npwp) ?>">
                     <?= form_error('npwp', '<small class="text-danger pl-3">', '</small>') ?>

                   </div>

                   <div class="form-group" id="kanan1" style="margin-top: -75px;">
                     <label for="email">Karakteristik Pajak PPN</label>
                     <select required="" class="form-control customerEvent" id="karakteristikPPN" name="karakteristikPPN" style="width:99%;">
                       <option value=""></option>


                       <option value="ppn">With PPN</option>
                       <option value="noppn">No PPN</option>


                     </select>


                   </div>
                   <div class="form-group">
                     <label for="address">Customer Address</label>
                     <textarea style="width: 45%" type="text" rows="4" cols="50" row="6" class="form-control" id="address" name="address" required="" autocomplete="off" value="<?php echo ($alamat) ?>"><?php echo ($alamat) ?></textarea>
                     <?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
                   </div>

                   <div class="form-group" id="kanan1" style="margin-top: -130px;">
                     <label for="email">Karakteristik Pajak PPh</label>
                     <select required="" class="form-control " id="karakteristikPPh" name="karakteristikPPh" style="width:99%;">
                       <option value=""></option>

                       <option value="pph">With PPh</option>
                       <option value="nopph">No PPh</option>
                       <option value="pph21" hidden="">PPh21</option>

                     </select>

                   </div>









                   <div class="form-group">
                     <label for="email">Gudang</label>
                     <table class="table" border="0" id="tableLoopDescription">
                       <thead>
                         <tr>


                           <th style="width: 60%">Alamat</th>


                           <th style="width: 20%">Phone Number</th>
                           <th style="width: 20%"> PIC</th>
                           <th><button style="width: 5" class="btn btn-sm bg-gradient-secondary" id="BarisBaruDescription"><i class="fa fa-plus"></i> </button></th>
                         </tr>
                       </thead>
                       <tbody></tbody>

                     </table>
                   </div>






                   <br>

                   <div class="box-footer">
                     <button type="submit" class="btn btn-primary btnSave" type="button">
                       <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                       Save Changes
                     </button>

                   </div>

               </form>
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
 <script>
   $(document).ready(function() {

     $('#karakteristikPPh').val("<?php echo $pph; ?>");
     $('#karakteristikPPN').val("<?php echo $ppn; ?>");
     barisGudangdefault();
     console.log("tes");

   });


   //$('#tableLoopDescription').show();

   function barisGudang() {

     $(document).ready(function() {
       $("[data-toggle='tooltip']").tooltip();
     });
     var Nomor = $("#tableLoopDescription tbody tr").length + 1;
     var Baris = '<tr id=trdescription' + Nomor + '>';



     Baris += '<td style="width:30%" colspan=1>';
     Baris += '<textarea rows=5 type="text" name="alamatGudang[]" id="description' + Nomor + '"  class="form-control"  required="" ></textarea>';
     Baris += '</td>';


     Baris += '<td>';
     Baris += '<input     type="text" name="phoneGudang[]" id="UniPriceDescription' + Nomor + '"  class="form-control UniPriceDescription"  required="" >';
     Baris += '</td>';



     Baris += '<td>';
     Baris += '<input type="text" name=picGudang[]" id="AmountDescription' + Nomor + '"  class="form-control deposit"  required=""   >  <input  type="text" name="AmmountDescriptionhidden[]" id="AmountDescriptionhidden' + Nomor + '"  class="form-control deposit"  required="" readonly hidden  >';
     Baris += '</td>';




     Baris += '<td class="text-center">';
     Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBarisDeskription"><font color="white"><i class="fa fa-times"></font></a>';
     Baris += '</td>';

     Baris += '</tr>';
     // onkeyup="convertToRupiah(this);"

     $("#tableLoopDescription tbody").append(Baris);
     $("#tableLoopDescription tbody tr").each(function() {
       // $(this).find('td:nth-child(2) input').focus(); 
     });



   }

   function barisGudangdefault() {
     <?php


      foreach ($itemGudang as $k) :


      ?>

       $(document).ready(function() {
         $("[data-toggle='tooltip']").tooltip();
       });
       var Nomor = $("#tableLoopDescription tbody tr").length + 1;
       var Baris = '<tr id=trdescription' + Nomor + '>';



       Baris += '<td style="width:30%" colspan=1>';
       Baris += '<textarea rows=5  value="<?php echo ($k->alamat) ?>"  type="text" name="alamatGudang[]" id="description' + Nomor + '"  class="form-control"  required="" ><?php echo ($k->alamat) ?></textarea>';
       Baris += '</td>';


       Baris += '<td>';
       Baris += '<input  value="<?php echo ($k->phone) ?>"     type="text" name="phoneGudang[]" id="UniPriceDescription' + Nomor + '"  class="form-control UniPriceDescription"  required="" >';
       Baris += '</td>';



       Baris += '<td>';
       Baris += '<input  value="<?php echo ($k->pic) ?>" type="text" name=picGudang[]" id="AmountDescription' + Nomor + '"  class="form-control deposit"  required=""   >  <input  type="text" name="AmmountDescriptionhidden[]" id="AmountDescriptionhidden' + Nomor + '"  class="form-control deposit"  required="" readonly hidden  >';
       Baris += '</td>';

       Baris += '<td hidden>';
       Baris += '<input   value="<?php echo ($k->id_gudang) ?>" type="text" name=idGudang[]" id="AmountDescription' + Nomor + '"  class="form-control deposit"  required=""   >  <input  type="text" name="AmmountDescriptionhidden[]" id="AmountDescriptionhidden' + Nomor + '"  class="form-control deposit"  required="" readonly hidden  >';
       Baris += '</td>';
       Baris += '<td class="text-center">';
       Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBarisDeskription"><font color="white"><i class="fa fa-times"></font></a>';
       Baris += '</td>';
       Baris += '</tr>';
       // onkeyup="convertToRupiah(this);"

       $("#tableLoopDescription tbody").append(Baris);
       $("#tableLoopDescription tbody tr").each(function() {
         // $(this).find('td:nth-child(2) input').focus(); 
       });
     <?php endforeach ?>
   }

   $(document).on('click', '#HapusBarisDeskription', function(e) {
     e.preventDefault();

     $(this).parent().parent().remove();


   });



   $('#BarisBaruDescription').click(function(e) {
     $('#tableLoopDescription').show();
     for (B = 1; B <= 1; B++) {
       barisGudang();
     }

   });

   function DataPIC() {
     $.ajax({
       type: "post",
       url: '<?php echo base_url("Customer/AmbilDataPIC/") ?>',
       data: 'pic_name=' + formid.pic[formid.pic.selectedIndex].text,
       dataType: 'json',

       success: function(hasil) {
         console.log(hasil[0].email);
         console.log(hasil);
         $('[name="email"]').val(hasil[0].email);
         $('[name="jabatan"]').val(hasil[0].jabatan);
       },
       error: function(hasil) {


       }


     });

   }

   function showIndikator() {
     $('.btnSave').attr('disabled', 'disabled');
     $('.loadingIndikdator').show();
   }

   function hiddenIndikator() {
     $('.btnSave').removeAttr('disabled');
     $('.loadingIndikdator').hide();

   }

   $('#SimpanData').submit(function(e) {
     e.preventDefault();
     showIndikator();
     $('#SimpanData').submit();
   });

   $(document).ready(function() {
     hiddenIndikator();

   });


   $("#customerMainNav").addClass('active');
   $("#manageCustomerNav").addClass('active');
   $("#openCustomerNav").addClass('menu-open');
 </script>