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

  <style type="text/css">
    .hidden {
      display: none;

        {
        .visible {
          display: block;
        }
  </style>

  <section class="content">
    <div class="card">
      <div class="card-header">

        <h3 class="box-title"><b>Edit Faktur</b></h3>

        <div class="card-tools" style="margin-top: -35px;margin-right: 15px">
          <a href="<?php echo base_url('Faktur/manage_faktur') ?>" class="btn bg-gradient-secondary">
            <font color="white">Back</font>
          </a>
        </div>

      </div>
      <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12 col-xs-12">



            <div class="box">


              <form action="<?php echo base_url('Faktur/aksi_update_faktur1') ?>" method="post" id="Simpa" name="formid" class="form-horizontal" enctype="multipart/form-data">
                <!--     $("#fakturMainNav").addClass('active');

   $("#openFakturNav").addClass('menu-open'); -->

                <!--   other -->
                <div class="col-md-10 col-xs-10 pull pull-right">

                  <div class="form-group" id="kanan" hidden="">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">id_faktur</label>
                    <div class="col-sm-12">
                      <input readonly="" value="<?php echo ($id_faktur) ?>" type="text" class="form-control" name="id_faktur" autocomplete="off" value="<?php echo set_value('comissionabale_cost') ?>">
                    </div>
                  </div>


                  <div class="form-group" id="kanan">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Comissionable Cost</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" class="form-control" id="comissionabale_cost" name="comissionabale_cost" autocomplete="off" value="<?php echo set_value('comissionabale_cost') ?>">
                    </div>
                  </div>

                  <div class="form-group" id="kanan">
                    <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">Non-Fee Cost</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="non_fee" readonly="" name="non_fee" autocomplete="off">


                    </div>

                  </div>
                  <div class="form-group" id="kanan">
                    <label for="ppn" style="text-align:left;" class="col-sm-6 control-label">ASF</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" readonly="" id="asff" name="asff" autocomplete="off">

                    </div>

                  </div>
                  <div class="form-group" id="kanan">
                    <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">Subtotal</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="total_summary" readonly="" name="total_summary" autocomplete="off">


                    </div>

                  </div>
                  <div class="form-group" id="kanan">
                    <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">Discount</label>
                    <div class="col-sm-12">
                      <input type="text" value="<?php echo '(' . number_format($discount, 0, ",", ".") . ')' ?>" class="form-control" id="discountQE" readonly="" name="discountQE" autocomplete="off">


                    </div>
                  </div>
                  <div class="form-group" id="kanan">
                    <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">Nettto</label>
                    <div class="col-sm-12">
                      <input type="text" value="<?php echo number_format($netto, 0, ",", ".") ?>" class="form-control" id="netto" readonly="" name="netto" autocomplete="off">


                    </div>
                  </div>




                  <div class="form-group" id="kanan">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">BAST Number</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" class="form-control" id="bastNumber" name="bastNumber" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group" id="kanan">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">GR Number</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" class="form-control" id="gr_number" name="gr_number" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group" id="kanan">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Total BAST</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" class="form-control" id="totalBast" name="totalBast" autocomplete="off">
                    </div>
                  </div>






                </div>

                <div class="col-md-6 col-xs-12 pull pull-left">



                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-6 control-label">Quotation Number</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" autocomplete="off" value="<?php echo ($quotation_number) ?>">
                    </div>

                  </div>

                  <div class="form-group" id="qnumber" hidden>

                    <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">ppn </label>
                    <div class="col-sm-12">
                      <input type="email" readonly class="form-control" id="kppn" name="kppn" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                    </div>


                  </div>

                  <div class="form-group" id="qnumber" hidden>

                    <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">pph </label>
                    <div class="col-sm-12">
                      <input type="email" readonly class="form-control" id="kpph" name="kpph" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                    </div>



                  </div>



                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Date Quotation</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" required="" id="date_quotation" name="date_quotation" autocomplete="off" value="<?php echo set_value('Date_event') ?>">
                    </div>
                    <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Customer</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" required="" id="customer" name="customer" autocomplete="off" value="<?php echo set_value('customer') ?>">
                    </div>
                    <?= form_error('customer', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                  <div class="form-group" id="qnumber">

                    <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-6 control-label">Alamat Customer</label>
                    <div class="col-sm-12">
                      <textarea rows="5" type="text" readonly class="form-control" id="alamat_customer" name="alamat_customer" autocomplete="off" value="<?php echo set_value('alamat_customer') ?>"></textarea>

                    </div>
                    <?= form_error('customer_other', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                  <div class="form-group" id="qnumber">

                    <label for="email_event" style="text-align:left;" class="col-sm-6 control-label">NPWP </label>
                    <div class="col-sm-12">
                      <input type="text" readonly class="form-control" id="npwp" name="npwp" autocomplete="off" value="<?php echo set_value('npwp') ?>">
                    </div>


                  </div>
                  <?= form_error('email_event', '<small class="text-danger pl-3">', '</small>') ?>



                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">PIC Customer</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" required="" class="form-control" required="" id="pic_customer" name="pic_customer" autocomplete="off" value="<?php echo set_value('pic_customer') ?>">
                    </div>

                  </div>



                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-6 control-label">Jabatan</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" readonly="" id="jabatan" name="jabatan" autocomplete="off">

                    </div>
                  </div>
                  <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>


                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-6 control-label">Title Event</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" readonly="" id="title_event" name="title_event" autocomplete="off">
                      <input type="text" class="form-control" readonly="" id="netto_hidden" name="netto_hidden" autocomplete="off" hidden="">
                    </div>
                  </div>
                  <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>


                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-6 control-label">Venue Event</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" readonly="" id="venu_event" name="venue_event" autocomplete="off">
                      <input type="text" class="form-control" readonly="" id="netto_hidden" name="netto_hidden" autocomplete="off" hidden="">
                    </div>
                  </div>
                  <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>



                  <div class="form-group" id="qnumber">
                    <label for="total" style="text-align:left;" class="col-sm-6 control-label">Date Event</label>
                    <div class="col-sm-12">
                      <input type="text" required="" class="form-control" id="date_event" name="date_event" readonly="" autocomplete="off">


                    </div>

                    <?= form_error('date_event', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>



                </div>
                <hr style="height: 1px; border-width: 1px; background-color:#696969;">

                <div class="col-md-10 col-xs-10 pull pull-right">

                  <div class="form-group" id="kanan">
                    <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File Faktur</label>
                    <div class="col-sm-12">
                      <input accept=".jpg,.png,.jpeg,.pdf" id="imagenes" onchange="ValidateSize(this)" name="imagenes" type="file">
                    </div>

                  </div>
                </div>
                <?php
                $directory = "assets/image_/";
                $images = glob($directory . "*.*");
                ?>

                <div class="col-md-6 col-xs-12 pull pull-left">



                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-6 control-label">Faktur Number</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" class="form-control" id="faktur_number" name="faktur_number" autocomplete="off">
                    </div>

                  </div>



                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Seri Faktur Pajak Number</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" id="seri_faktur" name="seri_faktur" autocomplete="off" value="<?php echo set_value('seri_faktur') ?>">
                    </div>
                    <?= form_error('seri_faktur', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Date Faktur</label>
                    <div class="col-sm-12">
                      <input onkeypress="return false;" type="text" placeholder="dd/mm/yyyy" class="form-control" required="" id="date_faktur" name="date_faktur" autocomplete="off" value="<?php echo set_value('date_faktur') ?>">
                    </div>
                    <?= form_error('date_faktur', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                  <div class="form-group" id="qnumber">

                    <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-6 control-label">PO Number</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" class="form-control" id="ref" name="ref" autocomplete="off" value="<?php echo set_value('customer_other') ?>">

                    </div>
                    <?= form_error('customer_other', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                  <div class="form-group" id="qnumber">

                    <label for="email_event" style="text-align:left;" class="col-sm-6 control-label">Syarat Pembayaran </label>
                    <div class="col-sm-12">
                      <select class="form-control" required="" id="syarat_pembayaran" name="syarat_pembayaran" style="width:99%;" onchange="DataPIC()"> value="<?php echo set_value('picEvent') ?>">
                        <option value=""></option>

                        <option value="15 Hari">15 Hari</option>
                        <option value="30 hari">30 Hari </option>
                        <option value="60 hari">60 Hari</option>
                        <option value="90 hari">90 Hari </option>

                      </select>
                    </div>


                  </div>
                  <?= form_error('syarat_pembayaran', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <br>
                <br>
                <table class="table border" border="0" id="tablefaktur">
                  <thead>
                    <tr>



                      <th style="width: 5%">
                        <center>No</center>
                      </th>

                      <th style="width: 60%" colspan="2">Description</th>

                      <th style="width: 25%"> Amount</th>


                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                      <td>
                        <center>1</center>
                      </td>


                      <td colspan="3" style="display: flex;"> Material -<p style="margin-left: 5px; margin-top: 0px;" id="tevent" name="tevent"></p>
                      </td>


                      <td> <input type="text" hidden="" readonly="" class="form-control" id="subtotall" name="subtotall" autocomplete="off" value="<?php echo set_value('email_other') ?>"></td>
                      <td> <input type="text" readonly="" class="form-control" id="jasa" name="jasa" autocomplete="off" value="<?php echo set_value('email_other') ?>"></td>





                    </tr>
                    <tr>

                      <td>
                        <center>2</center>
                      </td>

                      <td colspan="2">Jasa-ASF</td>


                      <td> <input type="text" readonly="" class="form-control" id="asf" name="asf" autocomplete="off" value="<?php echo set_value('email_other') ?>"></td>





                    </tr>




                  </tbody>
                  <tfoot>
                    <tr>

                      <td></td>
                      <td></td>
                      <th style="width: 20%">Subtotal</th>
                      <td> <input type="text" readonly="" class="form-control" id="subtotal" name="subtotal" autocomplete="off" value="<?php echo set_value('email_other') ?>"></td>





                    </tr>



                    <tr>

                      <td></td>
                      <td></td>

                      <td style="display: flex; margin: 0;top: 10px;">
                        <p><b>Discount</b></p><input style="width: 70px; margin-left: 80px;" type="number" hidden oninput="hitungdiskon();" class="form-control" id="diskon" name="diskon" autocomplete="off" placeholder="0" value="<?php echo set_value('email_other') ?>">
                        <p hidden style="margin-left: 5px; margin-top: 5px;">%</p>
                      </td>


                      <td><input readonly="" style="width: 100% " type="text" oninput="hitungdiskon();" class="form-control" id="hasildiskon" name="hasildiskon" autocomplete="off" placeholder="0"> </td>




                    </tr>



                    <tr>
                    <tr>

                      <td></td>
                      <td></td>

                      <td style="display: flex; margin: 0;top: 10px;">
                        <p><b>Netto</b></p><input hidden style="width: 70px; margin-left: 80px;" type="number" oninput="hitungdiskon();" class="form-control" id="diskon" name="diskon" autocomplete="off" placeholder="0" value="<?php echo set_value('email_other') ?>">
                        <p hidden style="margin-left: 5px; margin-top: 5px;">%</p>
                      </td>

                      <td><input readonly="" style="width: 100% " type="text" oninput="hitungdiskon();" class="form-control" id="hasilnetto" name="hasilnetto" autocomplete="off" placeholder="0"> </td>






                    </tr>

                    <td></td>
                    <td></td>

                    <th>PPN</th>
                    <td><input type="text" readonly="" class="form-control" id="ppn" name="ppn" autocomplete="off" value="<?php echo set_value('ppn') ?>"></td>

                    </tr>
                    <tr>
                      <td></td>
                      <td></td>

                      <th>PPh 23</th>
                      <td><input type="text" readonly="" class="form-control" id="pph23" name="pph23" autocomplete="off" value="<?php echo set_value('pph23') ?>"></td>


                    </tr>
                    <tr>


                      <td></td>
                      <td></td>

                      <th>Total Faktur</th>
                      <td><input type="text" readonly="" class="form-control" id="total_faktur" name="total_faktur" autocomplete="off" value="<?php echo set_value('total_faktur') ?>"></td>

                    </tr>

                    <tr>
                      <td colspan="7">Terbilang</td>

                    </tr>
                    <tr>
                      <td colspan="7"><input type="text" readonly="" class="form-control" id="terbilang1" name="terbilang1" autocomplete="off" value="<?php echo set_value('email_other') ?>"></td>

                    </tr>





                  </tfoot>
                </table>


                <div class="form-group text-left">
                  <button type="submit" class="btn btn-primary"></i>Save Changes</button>



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
</div>
<script type="text/javascript">
  $(document).ready(function() {



    DataQuotation($('[name="id_faktur"]').val());
    //  TambahBarisBaruFaktur();
    hitungFaktur();
    total_faktur();




  });


  function DataQuotation(id) {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Faktur/AmbilDataFaktur/") ?>',
      data: 'quotation_number=' + id,
      dataType: 'json',

      success: function(hasil) {
        console.log(hasil);
        $('#tevent').val("tes");

        $('[name="Quatations_number"]').val(hasil[0].quotation_number);
        $('[name="date_quotation"]').val(hasil[0].date_quotation);
        $('[name="customer"]').val(hasil[0].customer);
        $('[name="title_event"]').val(hasil[0].tittle_event);
        $('[name="venue_event"]').val(hasil[0].venue_event);
        $('[name="date_event"]').val(hasil[0].date_event);
        $('[name="total_summary"]').val(hasil[0].total_summary);
        $('[name="comissionabale_cost"]').val(hasil[0].comissionable_cost);
        $('[name="non_fee"]').val(hasil[0].nonfee);
        $('[name="asff"]').val(hasil[0].asf);
        $('[name="npwp"]').val(hasil[0].npwp);
        $('[name="alamat_customer"]').val(hasil[0].address);
        $('[name="jabatan"]').val(hasil[0].jabatan);
        $('[name="pic_customer"]').val(hasil[0].pic_name);
        $('#faktur_number').val(hasil[0].faktur_number);

        $('[name="kpph"]').val(hasil[0].karakteristik_pph);
        $('[name="kppn"]').val(hasil[0].karakteristik_ppn);


        $('#Quatations_number').val(hasil[0].quotation_number);
        $('#seri_faktur').val(hasil[0].ser_faktur);
        $('#date_faktur').val(hasil[0].date_faktur);
        $('#syarat_pembayaran').val(hasil[0].syarat_pembayaran);
        $('#ref').val(hasil[0].REF);
        $('[name="ref"]').val(hasil[0].po_number);
        $('[name="gr_number"]').val(hasil[0].gr_number);

        $('[name="bastNumber"]').val(hasil[0].bast_number);
        $('[name="totalBast"]').val(hasil[0].totalBast);







        sum_faktur();
        //   hitungppn();
        // hitungpph();
        $('#status').val(hasil[0].status);


      },
      error: function(hasil) {


      }


    });

  }


  function hitungFaktur() {

    hitungdiskon();
    hitungppn();
    hitungpph();
    hitung_faktur();



    //hitungnetto();
  }

  function hitung_faktur() {
    var subtotal = $('#hasilnetto').val();
    var subtotal1 = subtotal.replace(/[^\w\s]/gi, '');

    var ppn = $('[name="ppn"]').val();
    var ppn1 = ppn.replace(/[^\w\s]/gi, '');
    var pph = $('#pph23').val();
    var pph1 = pph.replace(/[^\w\s]/gi, '');
    var total_faktur = Number(subtotal1) + Number(ppn1) - Number(pph1);
    var total_faktur2 = Math.round(total_faktur);
    var total_faktur1 = total_faktur2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

    $('#total_faktur').val(total_faktur1);

    terbilang(total_faktur2);

  }





  $("#imagenes").fileinput({

    overwriteInitial: true,
    maxFileSize: 2000,
    showClose: false,
    showCaption: false,
    browseLabel: 'browse',
    removeLabel: 'Remove',
    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
    layoutTemplates: {
      main2: '{preview}   {remove} {browse}'
    },
    allowedFileExtensions: ["jpg", "png", "gif", "pdf"],
    initialPreview: [
      '<object type="application/pdf" data="<?php echo $img ?>" style="height: 30vh; width:50vh"><img style="width: 10%; height: 30% "  src="<?php echo  $img ?>" ></object>'
    ],
  });


  function sum_faktur() {
    var sub_total1 = $('#total_summary').val();
    var sub_total = sub_total1.replace(/[^\w\s]/gi, '');

    var netto1 = $('#netto').val();
    var netto = netto1.replace(/[^\w\s]/gi, '');

    var nonfee1 = $('#non_fee').val();
    var nonfee = nonfee1.replace(/[^\w\s]/gi, '');

    var discount1 = $('#discountQE').val()
    var discount = discount1.replace(/[^\w\s]/gi, '');

    var comissionable_cost1 = $('#comissionabale_cost').val();
    var comissionable_cost = comissionable_cost1.replace(/[^\w\s]/gi, '');

    var total_bast1 = $('#totalBast').val();
    var total_bast = total_bast1.replace(/[^\w\s]/gi, '');

    var asf1 = $('#asff').val();
    var asf = asf1.replace(/[^\w\s]/gi, '');

    var pembagi = Number(total_bast) / Number(netto);

    var comissionable_cost2 = Number(comissionable_cost) * Number(pembagi);
    var nonfee2 = Number(nonfee) * Number(pembagi);
    var discount2 = Number(discount) * Number(pembagi);
    var asf2 = Number(asf) * Number(pembagi);

    var material = Math.round(Number(comissionable_cost2) + Number(nonfee2));
    var jasa = Math.round(Number(asf2));
    var discount3 = Math.round(Number(discount2));
    var sub_total2 = Math.round(Number(comissionable_cost2) + Number(nonfee2) + Number(jasa));
    var netto2 = Math.round(Number(sub_total2) - Number(discount3));


    $('#jasa').val(material.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
    $('#asf').val(jasa.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
    $('#subtotal').val(sub_total2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
    $('#hasildiskon').val('(' + discount3.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ')');
    $('#hasilnetto').val(netto2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
    hitungFaktur();
  }





  function hitungdiskon() {

    total_faktur();


  }

  function hitungppn() {
    var data = $('[name="kppn"]').val();
    if (data == 'noppn') {
      var subtotal = $('#hasilnetto').val();
      var s = subtotal.replace(/[^\w\s]/gi, '');
      var hitung = (s) * 0;
      var a = Math.round(hitung);
      var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('[name="ppn"]').val(hitung1);
      total_faktur();

    } else {
      var subtotal = $('#hasilnetto').val();
      var s = subtotal.replace(/[^\w\s]/gi, '');
      var hitung = (s) * 0.1;
      var a = Math.round(hitung);
      var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('[name="ppn"]').val(hitung1);
      total_faktur();


    }



  }

  function total_faktur() {
    var subtotal = $('#subtotal').val();
    var subtotal1 = subtotal.replace(/[^\w\s]/gi, '');
    var hasildiskon = $('#hasildiskon').val();
    var hargadiskon1 = hasildiskon.replace(/[^\w\s]/gi, '');
    var ppn = $('[name="ppn"]').val();
    var ppn1 = ppn.replace(/[^\w\s]/gi, '');
    var pph = $('#pph23').val();
    var pph1 = pph.replace(/[^\w\s]/gi, '');
    var total_faktur = Number(subtotal1) - Number(hargadiskon1) + Number(ppn1) - Number(pph1);
    total_faktur2 = Math.round(total_faktur);
    var total_faktur1 = total_faktur2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

    $('#total_faktur').val(total_faktur1);

    terbilang(total_faktur2);

  }

  function hitungpph() {
    var data = $('[name="kpph"]').val();

    //2% dari management fee
    if (data == 'nopph') {
      var subtotal = $('#asf').val();
      var s = subtotal.replace(/[^\w\s]/gi, '');

      var hasil = Number(s) * 0;
      var a = Math.round(hasil);
      var hasil1 = hasil.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

      $('#pph23').val('(' + hasil1 + ')');
      total_faktur();

    } else {
      var subtotal = $('#asf').val();
      var s = subtotal.replace(/[^\w\s]/gi, '');

      var hasil = Number(s) * 0.02;
      var a = Math.round(hasil);
      var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

      $('#pph23').val('(' + hasil1 + ')');
      total_faktur();


    }




  }


  /// simpan data quotation other
  $('#SimpanData').submit(function(e) {
    e.preventDefault();
    save_faktur();

  });


  function save_faktur() {

    $.ajax({
      url: $("#SimpanData").attr('action'),
      type: 'post',
      cache: false,
      dataType: "json",
      data: $("#SimpanData").serialize(),
      success: function(data) {
        if (data.success == true) {



          $('#notif').fadeIn(800, function() {

            $("#notif").html(data.notif).fadeOut(5000).delay(1000);

          });
          window.location.href = "<?php echo base_url("Faktur/manage_faktur") ?>";



        } else {
          $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
        }
      },

      error: function(error) {
        window.location.href = "<?php echo base_url("Faktur/manage_faktur") ?>";
      }

    });
  }


  function terbilang(bilangan) {

    bilangan = String(bilangan);
    var angka = new Array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
    var kata = new Array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan');
    var tingkat = new Array('', 'Ribu', 'Juta', 'Milyar', 'Triliun');

    var panjang_bilangan = bilangan.length;

    /* pengujian panjang bilangan */
    if (panjang_bilangan > 15) {
      kaLimat = "Diluar Batas";
      return kaLimat;
    }

    /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
    for (i = 1; i <= panjang_bilangan; i++) {
      angka[i] = bilangan.substr(-(i), 1);
    }

    i = 1;
    j = 0;
    kaLimat = "";


    /* mulai proses iterasi terhadap array angka */
    while (i <= panjang_bilangan) {

      subkaLimat = "";
      kata1 = "";
      kata2 = "";
      kata3 = "";

      /* untuk Ratusan */
      if (angka[i + 2] != "0") {
        if (angka[i + 2] == "1") {
          kata1 = "Seratus";
        } else {
          kata1 = kata[angka[i + 2]] + " Ratus";
        }
      }

      /* untuk Puluhan atau Belasan */
      if (angka[i + 1] != "0") {
        if (angka[i + 1] == "1") {
          if (angka[i] == "0") {
            kata2 = "Sepuluh";
          } else if (angka[i] == "1") {
            kata2 = "Sebelas";
          } else {
            kata2 = kata[angka[i]] + " Belas";
          }
        } else {
          kata2 = kata[angka[i + 1]] + " Puluh";
        }
      }

      /* untuk Satuan */
      if (angka[i] != "0") {
        if (angka[i + 1] != "1") {
          kata3 = kata[angka[i]];
        }
      }

      /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
      if ((angka[i] != "0") || (angka[i + 1] != "0") || (angka[i + 2] != "0")) {
        subkaLimat = kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " ";
      }

      /* gabungkan variabe sub kaLimat (untuk Satu blok 3 angka) ke variabel kaLimat */
      kaLimat = subkaLimat + kaLimat;
      i = i + 3;
      j = j + 1;

    }

    /* mengganti Satu Ribu jadi Seribu jika diperlukan */
    if ((angka[5] == "0") && (angka[6] == "0")) {
      kaLimat = kaLimat.replace("Satu Ribu", "Seribu");
    }

    $('[name="terbilang1"]').val(kaLimat + "Rupiah");
    return kaLimat + "Rupiah";

  }
  $(function() {
    var dateToday = new Date();

    $('#date_faktur').datepicker({
      dateFormat: 'dd/mm/yy',
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true,

      buttonImageOnly: true,
      minDate: dateToday,
      maxDate: '+30Y',
      yearRange: '1999:2030',
      inline: true
    });
  });

  function ValidateSize(file) {
    var FileSize = file.files[0].size / 1024 / 1024; // in MB
    if (FileSize > 2) {
      alert('File size exceeds 2 MB');
      $('#imagenes').val(''); //for clearing with Jquery
    } else {

    }
  }



  $("#fakturMainNav").addClass('active');

  $("#openFakturNav").addClass('menu-open');
</script>
<script type="text/javascript" src="<?php echo base_url('assets/rupiah.js') ?>"></script>