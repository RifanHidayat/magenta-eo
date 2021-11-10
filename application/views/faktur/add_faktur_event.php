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

        <h3 class="box-title"><b>Add Faktur</b></h3>

        <div class="card-tools" style="margin-top: -35px;margin-right: 17px">
          <a href="<?php echo base_url('Bast/manage_bast_event') ?>" class="btn bg-gradient-secondary">
            <font color="white">Back</font>
          </a>
        </div>

      </div>
      <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12 col-xs-12">



            <div class="box">

              <form action="<?php echo base_url('Faktur/aksi_add_faktur1') ?>" method="post" id="SimpanData" name="formid" class="form-horizontal" enctype="multipart/form-data">

                <!--   other -->
                <div class="col-md-10 col-xs-10 pull pull-right">

                  <div class="form-group" id="kanan" hidden="">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Id Bast</label>
                    <div class="col-sm-12">
                      <input value="<?php echo ($id_bast) ?>" readonly="" type="text" class="form-control" id="id_bast" name="id_bast" autocomplete="off" value="<?php echo set_value('comissionabale_cost') ?>">
                    </div>
                  </div>


                  <div class="form-group" id="kanan">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Commissionable Cost</label>
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
                      <input type="text" readonly="" class="form-control" readonly="" id="asff" name="asff" autocomplete="off" value="<?php echo number_format($asf, 0, ',', '.') ?>">

                    </div>

                  </div>
                  <div class="form-group" id="kanan">
                    <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">Subtotal</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="total_summary" readonly="" name="total_summary" autocomplete="off" value="0">


                    </div>
                  </div>
                  <div class="form-group" id="kanan">
                    <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">Discount</label>
                    <div class="col-sm-12">
                      <input type="text" value="<?php echo number_format($discount, 0, ",", ".") ?>" class="form-control" id="discountQE" readonly="" name="discountQE" autocomplete="off">


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
                      <input readonly="" type="text" class="form-control" id="bastNumber" name="bastNumber" autocomplete="off" value="<?php echo ($bast_number) ?>">
                    </div>
                  </div>
                  <div class="form-group" id="kanan">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">GR Number</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" class="form-control" id="gr_number" name="gr_number" autocomplete="off" value="<?php echo ($gr_number) ?>">
                    </div>
                  </div>
                  <div class="form-group" id="kanan">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Total BAST</label>
                    <div class="col-sm-12">
                      <input value="<?php echo number_format($totalBast, 0, ',', '.') ?>" readonly="" type="text" class="form-control" id="totalBast" name="totalBast" autocomplete="off">
                    </div>
                  </div>




                </div>

                <div class="col-md-6 col-xs-12 pull pull-left">



                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-6 control-label">Quotation Number</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" value="<?php echo $quotation_number ?>" autocomplete="off" value="<?php echo set_value('Quatations_number') ?>">
                    </div>

                  </div>
                  <?= form_error('Quatations_number', '<small class="text-danger pl-3">', '</small>') ?>



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


                  <div class="form-group" id="qnumber" hidden="">

                    <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">ppn </label>
                    <div class="col-sm-12">
                      <input type="email" readonly class="form-control" id="kppn" name="kppn" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                    </div>


                  </div>

                  <div class="form-group" id="qnumber" hidden="">

                    <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">pph </label>
                    <div class="col-sm-12">
                      <input type="email" readonly class="form-control" id="kpph" name="kpph" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                    </div>



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

                      <input accept=".jpg,.png,.jpeg,.pdf" id="imagenes" name="imagenes" type="file">
                    </div>

                  </div>

                  <?php
                  $directory = "assets/image_/";
                  $images = glob($directory . "*.*");
                  ?>


                </div>

                <div class="col-md-6 col-xs-12 pull pull-left">
                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-6 control-label">Faktur Number</label>
                    <div class="col-sm-12">
                      <input  type="text" class="form-control" id="faktur_number" name="faktur_number" autocomplete="off" value="<?php echo set_value('Quatations_number_other') ?>">
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
                      <input type="text" placeholder="yyyy-mm-dd" class="form-control" required="" id="date_faktur" onkeypress="return false;" name="date_faktur" autocomplete="off" value="<?php echo set_value('date_faktur') ?>">
                    </div>
                    <?= form_error('date_faktur', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <!-- <div class="form-group" id="qnumber">
                        <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Due Faktur</label>
                        <div class="col-sm-12">
                          <input onkeypress="return false;" type="text" placeholder="yyyy-mm-dd" class="form-control" required="" id="due_faktur" name="due_faktur" autocomplete="off" value="<?php echo set_value('date_faktur') ?>">
                        </div>
                        <?= form_error('due_faktur', '<small class="text-danger pl-3">', '</small>') ?>
                      </div> -->

                       <div class="form-group" id="qnumber">

                    <label for="email_event" style="text-align:left;" class="col-sm-6 control-label">Due Faktur </label>
                    <div class="col-sm-12">
                      <select class="form-control" required="" id="due_faktur" name="due_faktur" style="width:99%;" onchange="DataPIC()"> value="<?php echo set_value('picEvent') ?>">
                        <option value=""></option>
                        <option value="1">COD</option>
                        <option value="7">7 Hari</option>
                        <option value="14">14 Hari</option>
                        <option value="15">15 Hari</option>
                        <option value="30">30 Hari </option>
                        <option value="45">45 Hari </option>
                        <option value="60">60 Hari</option>
                        <option value="75">75 Hari</option>
                        <option value="90">90 Hari </option>
                      </select>
                    </div>


                  </div>


                  <div class="form-group" id="qnumber">

                    <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-6 control-label">Po Number</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" class="form-control" id="ref" name="ref" autocomplete="off" value="<?php echo ($po_number) ?>">

                    </div>
                    <?= form_error('customer_other', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                  <div class="form-group" id="qnumber">

                    <label for="email_event" style="text-align:left;" class="col-sm-6 control-label">Syarat Pembayaran </label>
                    <div class="col-sm-12">
                    <input  type="text"  class="form-control" required="" id="syarat_pembayaran" name="syarat_pembayaran" autocomplete="off" >
                    </div>


                  </div>
                  <?= form_error('syarat_pembayaran', '<small class="text-danger pl-3">', '</small>') ?>

                  <div class="form-group" id="qnumber">

              <label for="pid_event" style="text-align:left;" class="col-sm-6 control-label">Project Number</label>
              <div class="col-sm-12">
              <input readonly  type="text"  class="form-control" required="" id="project_number" name="project_number" autocomplete="off" value="<?php echo $project_number ?>" >
</div>
</div>






                </div>
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


                      <td> <input type="text" hidden="" readonly="" class="form-control" id="subtotall" name="subtotall" autocomplete="off" "></td>

                                        <td> <input type=" text" readonly="" class="form-control" id="jasa" name="jasa" autocomplete="off"></td>




                    </tr>
                    <tr hidden="">

                      <td>
                        <center>1</center>
                      </td>
                      <td colspan="2">Material - <p style="margin-left: 5px; margin-top: 0px;" id="tevent" name="tevent"></p>
                      </td>
                      <td> <input type="text" readonly="" class="form-control" id="jasa" name="jasa" autocomplete="off" value="<?php echo set_value('email_other') ?>"></td>
                    </tr>
                    <tr>

                      <td>
                        <center>2</center>
                      </td>

                      <td colspan="2">Jasa - ASF</td>
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
                        <p><b>Discount</b></p><input hidden style="width: 70px; margin-left: 80px;" type="number" oninput="hitungdiskon();" class="form-control" id="diskon" name="diskon" autocomplete="off" placeholder="0" value="<?php echo set_value('email_other') ?>">
                        <p hidden style="margin-left: 5px; margin-top: 5px;">%</p>
                      </td>

                      <td><input readonly="" style="width: 100% " type="text" oninput="hitungdiskon();" class="form-control" id="hasildiskon" name="hasildiskon" autocomplete="off" placeholder="0"> </td>
                    </tr>
                    <tr>

                      <td></td>
                      <td></td>

                      <td style="display: flex; margin: 0;top: 10px;">
                        <p><b>Netto</b></p><input hidden style="width: 70px; margin-left: 80px;" type="number" oninput="hitungdiskon();" class="form-control" id="diskon" name="diskon" autocomplete="off" placeholder="0" value="<?php echo set_value('email_other') ?>">
                        <p hidden style="margin-left: 5px; margin-top: 5px;">%</p>
                      </td>

                      <td><input readonly="" style="width: 100% " type="text" oninput="hitungdiskon();" class="form-control" id="hasilnetto" name="hasilnetto" autocomplete="off" placeholder="0"> </td>
                    </tr>
                    <tr>
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
                  <!--   <button type="submit" class="btn btn-primary">Create Faktur</button> -->

                  <button type="submit" class="btn btn-primary btnSave" type="button">
                    <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                    Create Fakttur
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
</div>
<script type="text/javascript">
  function showIndikator() {
    $('.btnSave').attr('disabled', 'disabled');
    $('.loadingIndikdator').show();


  }

  function hiddenIndikator() {
    $('.btnSave').removeAttr('disabled');
    $('.loadingIndikdator').hide();


  }
  $(document).ready(function() {
    hiddenIndikator();
    generetfaktur();
    
    DataQuotation($('#Quatations_number').val());




  });

  // function generetfaktur() {
  //   $.ajax({
  //     type: "post",
  //     url: '<?php echo base_url("Faktur/generet_faktur_number") ?>',
  //     dataType: 'json',
  //     success: function(hasil) {
  //   //     console.log(hasil);
  //   //     var date = new Date();
  //   // var tahun = date.getFullYear();
  //   //     if (isNaN(tahun))
  //   //     return NaN;
  //   // var digits = String(+tahun).split(""),
  //   //     key = ["","C","CC","CCC","CD","D","DC","DCC","DCCC","CM",
  //   //            "","X","XX","XXX","XL","L","LX","LXX","LXXX","XC",
  //   //            "","I","II","III","IV","V","VI","VII","VIII","IX"],
  //   //     roman = "",
  //   //     i = 3;
  //   // while (i--)
  //   //     roman = (key[+digits.pop() + (i * 10)] || "") + roman;
  //   // var a= Array(+digits.join("") + 1).join("M") + roman;

  //   //     $('[name="faktur_number"]').val("MM-"+a+"-" + hasil.data);
  //     },
  //     error: function(hasil) {

  //     }


  //   });

  // }




  function DataQuotation(id) {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Faktur/AmbilDataQuotation/") ?>',
      data: 'quotation_number=' + id,
      dataType: 'json',

      success: function(hasil) {
        console.log(hasil);
        $('[name="ref"]').val(hasil[0].po_number);

        $('[name="Quatations_number"]').val(hasil[0].quotation_number);
        $('[name="date_quotation"]').val(hasil[0].date_quotation);
        $('[name="customer"]').val(hasil[0].customer);
        $('[name="title_event"]').val(hasil[0].tittle_event);
        $('[name="venue_event"]').val(hasil[0].venue_event);
        $('[name="date_event"]').val(hasil[0].date_event);
        $('[name="total_summary"]').val(hasil[0].total_summary.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        var cos = hasil[0].comissionable_cost;
        console.log(cos);
        $('[name="comissionabale_cost"]').val(hasil[0].comissionable_cost.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('[name="non_fee"]').val(hasil[0].nonfee.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        var nonfeee = hasil[0].nonfee;
        console.log(nonfeee);
        //$('[name="asf"]').val(hasil[0].asf);
        //var asff=hasil[0].asf;

        $('[name="npwp"]').val(hasil[0].npwp);
        $('[name="alamat_customer"]').val(hasil[0].address);
        $('[name="jabatan"]').val(hasil[0].jabatan);
        $('[name="pic_customer"]').val(hasil[0].pic_name);

        $('[name="kpph"]').val(hasil[0].karakteristik_pph);
        $('[name="kppn"]').val(hasil[0].karakteristik_ppn);

        $('[name="gr_number"]').val(hasil[0].gr_number);

        $('[name="bastNumber"]').val(hasil[0].bast_number);


        var totalBast1 = $('[name="totalBast"]').val();
        // $('[name="subtotal"]').val(totalBast1);
        //var totalBast1 =hasil[0].totalBast;
        var totalBast2 = totalBast1.replace(/[^\w\s]/gi, '');


        document.getElementById("tevent").innerHTML = hasil[0].tittle_event;
        var asf = (Number(hasil[0].asfp) / 100) * Number(totalBast2);
        var asfPembulatan = Math.round(asf)
        var asfmasking = asfPembulatan.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        var jasa = Math.round(Number(totalBast2) - Number(asf));

        //   var jasamasking = jasa.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        //    $('[name="asf"]').val(asfmasking);
        //     $('[name="jasa"]').val(jasamasking);


        //   var n = nonfeee.replace(/[^\w\s]/gi, '');
        //    var a = asff.replace(/[^\w\s]/gi, '');
        //  var c = cos.replace(/[^\w\s]/gi, '');
        //  var subtotal=Number(totalBast2)+Number(c);

        //   var material =Number(c)+Number(n);
        //   var s = subtotal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        //   var co = c.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        //   //subtotal=Number(a)+Number(material);
        //  // var ss = subtotal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        //  // $('[name="subtotal"]').val(s);
        sum_faktur();
        hitungdiskon();
        hitungppn();
        hitungpph();
      },
      error: function(hasil) {

      }


    });

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
      main2: '{preview} {remove} {browse}'
    },
    allowedFileExtensions: ["jpg", "png", "gif", "pdf", "jpeg"],
    msgErrorClass: 'alert alert-block alert-danger',
  

  });



  function hitungFaktur() {

    hitungdiskon();
    hitungppn();
    hitungpph();
    hitung_faktur();

    //hitungnetto();
  }


  function hitungdiskon() {
    // var subtotal=$('#subtotal').val();
    // var diskon=$('#diskon').val();
    // var s = subtotal.replace(/[^\w\s]/gi, '');
    // var hargadiskon=(Number(s)/100) *Number(diskon);
    // // var totalfaktur=s-hargadiskon;
    // // var totalfaktur1=Math.ceil(totalfaktur);
    // // var hitung1 =totalfaktur1.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

    // var hargadiskon1=Math.round(hargadiskon);
    // var diskon1 =hargadiskon1.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

    // // $('#total_faktur').val(hitung1);


    //  $('#hasildiskon').val('('+diskon1+')');


    hitung_faktur();
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

  function hitungppn() {
    var data = $('#kppn').val();
    if (data == "ppn") {
      var subtotal = $('#hasilnetto').val();
      var s = subtotal.replace(/[^\w\s]/gi, '');
      var hitung = (s) * 0.1;
      var a = Math.round(hitung);
      var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('[name="ppn"]').val(hitung1);
      hitung_faktur();

    } else {
      var subtotal = $('#hasilnetto').val();
      var s = subtotal.replace(/[^\w\s]/gi, '');
      var hitung = (s) * 0;
      var a = Math.round(hitung);
      var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('[name="ppn"]').val(hitung1);
      hitung_faktur();


    }



  }

  function hitungpph() {
    var data = $('#kpph').val();
    if (data == "nopph") {
      //2% dari management fee

      var subtotal = $('#asf').val();
      var s = subtotal.replace(/[^\w\s]/gi, '');

      var hasil = Number(s) * 0;
      var a = Math.round(hasil);
      var hasil1 = hasil.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

      $('#pph23').val(hasil1);
      hitung_faktur();

    } else {
      //2% dari management fee

      var subtotal = $('#asf').val();
      var s = subtotal.replace(/[^\w\s]/gi, '');

      var hasil = Number(s) * 0.02;
      var a = Math.round(hasil);
      var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

      $('#pph23').val('(' + hasil1 + ')');
      hitung_faktur();


    }





  }

  function generetfaktur() {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Faktur/generet_faktur_number") ?>',
      dataType: 'json',
      success: function(hasil) {
       
        var date = new Date();
        var tahun = date.getFullYear();
        if (isNaN(tahun))
        return NaN;
        var digits = String(+tahun).split(""),
        key = ["","C","CC","CCC","CD","D","DC","DCC","DCCC","CM",
               "","X","XX","XXX","XL","L","LX","LXX","LXXX","XC",
               "","I","II","III","IV","V","VI","VII","VIII","IX"],
        roman = "",
        i = 3;
       while (i--)
        roman = (key[+digits.pop() + (i * 10)] || "") + roman;
      var a= Array(+digits.join("") + 1).join("M");

        $('[name="faktur_number"]').val(a+"-"+roman+"-" + hasil.data);


       // $('[name="faktur_number"]').val("MM-XX-" + hasil.data);

      },
      error: function(hasil) {



      }


    });

  }

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


    $('#date_faktur').datepicker({
      dateFormat: 'yy-mm-dd',
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true,

      buttonImageOnly: true,

      maxDate: '+30Y',
      yearRange: '1999:2030',
      inline: true
    });
  });
  $(function() {
        var dateToday = new Date();

        $('#due_faktur').datepicker({
          dateFormat: 'yy-mm-dd',
          showButtonPanel: true,
          changeMonth: true,
          changeYear: true,

          buttonImageOnly: true,

          maxDate: '+30Y',
          yearRange: '1999:2030',
          inline: true
        });
      });




  $("#fakturMainNav").addClass('active');

  $("#openFakturNav").addClass('menu-open');


  $('#SimpanData').submit(function(e) {

    e.preventDefault();
    cekFaktur();
    showIndikator();



  });

  function cekFaktur() {
    var quotation_number = $('#id_bast').val();
    var faktur_number = $('#faktur_number').val();
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Faktur/cekFaktur1/") ?>',
      data: 'quotation_number=' + quotation_number + '&faktur_number=' + faktur_number,
      dataType: 'json',

      success: function(hasil) {
        console.log(hasil);

        if (hasil.status == 'tersediaF') {
          Swal.fire({
            title: 'Oops',
            text: "Faktur number sudah tersedia,lakukan update faktur number dengan menekan tombol update FN  sebeleum menyimpan  data Faktur",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#808080',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Update FN'
          }).then((result) => {
            if (result.value) {
              console.log("update berhasil");
              generetfaktur();
              hiddenIndikator();
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Faktur number has been updated',
                showConfirmButton: false,
                timer: 1500
              });


            }
          });


        } else if (hasil.status == "tersediaQ") {
          Swal.fire({
            title: 'Oops',
            text: "Data Faktur sudah tersedia",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#808080',
            cancelButtonText: 'Close',
            confirmButtonText: 'Back'
          }).then((result) => {
            if (result.value) {
            //  window.location = "<?php echo base_url('Bast/manage_bast/') ?>";

            <?php if (substr($quotation_number, 0, 2)=="QE"){
            ?>
            window.location = "<?php echo base_url('Bast/manage_bast_event/') ?>";
            <?php


          }else{
            ?>
            window.location = "<?php echo base_url('Bast/manage_bast_other/') ?>";
            <?php

          }
          ?>
            

            }
          });

        } else {
          $("#SimpanData").submit();
        }


      },
      error: function(hasil) {
        console.log("error");



      }


    });
  }
</script>
<script type="text/javascript" src="<?php echo base_url('assets/rupiah.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>