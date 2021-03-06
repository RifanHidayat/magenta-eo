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

        <h3 class="box-title"><b>Data Faktur</b></h3>

        <div class="card-tools" style="margin-top: -35px;margin-right: 15px">
          <a href="<?php echo base_url('Faktur/manage_faktur_event') ?>" class="btn bg-gradient-secondary">
            <font color="white">Back</font>
          </a>
        </div>


      </div>
      <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12 col-xs-12">



            <div class="box">


              <div class="form-group" id="qnumber" hidden>

                <label for="pid_event" style="text-align:left;" class="col-sm-3 control-label">&ensp;Status</label>
                <select style="width: 20%;margin-left: 2%" class="form-control" required="" id="status" name="status" style="width:100%;" value="<?php echo set_value('pic') ?>">

                  <option value="Open"> Open</option>
                  <option value="Reject"> Reject</option>
                  <option value="Close"> Close</option>


                </select>

                <?php if (in_array('statusQuatations', $user_permission)) : ?>
                  <button style="border: none; border-radius: 5px;margin-left: 5%" for="pid_event" onclick="updateStatus();" style="width: 50%;" class="col-sm-2 control-label btn-primary">
                    <font color="white">Save Changes</font>
                  </button>
                <?php endif; ?>


              </div>
              <div class="form-group" id="qnumber" hidden>
                <label style="margin-left: 15px;" for="cphone">Note</label>
                <textarea style="margin-left: -175px; width:20% " type="text" class="form-control" id="note" name="note" autocomplete="off"></textarea>
              </div>
             



              <!--   other -->
              <div class="col-md-10 col-xs-10 pull pull-right">
                <div class="form-group" id="kanan" hidden="">
                  <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">id_faktur</label>
                  <div class="col-sm-12">
                    <input readonly="" value="<?php echo ($id_faktur) ?>" type="text" class="form-control" id="comissionabale_cost" name="id_faktur" autocomplete="off" value="<?php echo set_value('comissionabale_cost') ?>">
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
                    <input type="text" readonly="" class="form-control" readonly="" id="asf" name="asf" value="<?php echo number_format($asf, 0, ',', '.'); ?>" autocomplete="off">

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
                  <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">Netto</label>
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
                    <input readonly="" type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" autocomplete="off" value="<?php echo $quotation_number ?>">
                  </div>

                </div>

                <div class="form-group" id="qnumber" hidden="">

                  <label for="kppnn" style="text-align:left;" class="col-sm-7 control-label">ppn </label>
                  <div class="col-sm-12">
                    <input type="text" readonly class="form-control" id="kppnn" name="kppnn" autocomplete="off">
                  </div>


                </div>

                <div class="form-group" id="qnumber" hidden="">

                  <label for="kpphh" style="text-align:left;" class="col-sm-7 control-label">pph </label>
                  <div class="col-sm-12">
                    <input type="text" readonly class="form-control" id="kpphh" name="kpphh" autocomplete="off">
                  </div>



                </div>



                <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Date Quotation</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" readonly="" class="form-control" required="" id="date_quotation" name="date_quotation" autocomplete="off" value="<?php echo set_value('Date_event') ?>">
                  </div>
                  <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Customer</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" readonly="" class="form-control" required="" id="customer" name="customer" autocomplete="off" value="<?php echo set_value('customer') ?>">
                  </div>
                  <?= form_error('customer', '<small class="text-danger pl-3">', '</small>') ?>
                </div>


                <div class="form-group" id="qnumber">

                  <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-6 control-label">Alamat Customer</label>
                  <div class="col-sm-12">
                    <textarea rows="5" type="text" readonly="" readonly class="form-control" id="alamat_customer" name="alamat_customer" autocomplete="off" value="<?php echo set_value('alamat_customer') ?>"></textarea>

                  </div>
                  <?= form_error('customer_other', '<small class="text-danger pl-3">', '</small>') ?>
                </div>


                <div class="form-group" id="qnumber">

                  <label for="email_event" style="text-align:left;" class="col-sm-6 control-label">NPWP </label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" readonly class="form-control" id="npwp" name="npwp" autocomplete="off" value="<?php echo set_value('npwp') ?>">
                  </div>


                </div>
                <?= form_error('email_event', '<small class="text-danger pl-3">', '</small>') ?>



                <div class="form-group" id="qnumber">
                  <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">PIC Customer</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" readonly="" required="" class="form-control" required="" id="pic_customer" name="pic_customer" autocomplete="off" value="<?php echo set_value('pic_customer') ?>">
                  </div>

                </div>



                <div class="form-group" id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-6 control-label">Jabatan</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" class="form-control" required="" readonly="" id="jabatan" name="jabatan" autocomplete="off">

                  </div>
                </div>
                <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>


                <div class="form-group" id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-6 control-label">Title Event</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" readonly="" id="title_event" name="title_event" autocomplete="off">
                    <input readonly="" type="text" class="form-control" readonly="" id="netto_hidden" name="netto_hidden" autocomplete="off" hidden="">
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
                    <input readonly="" type="text" required="" class="form-control" id="date_event" name="date_event" readonly="" autocomplete="off">


                  </div>

                  <?= form_error('date_event', '<small class="text-danger pl-3">', '</small>') ?>
                </div>



              </div>
              <hr style="height: 1px; border-width: 1px; background-color:#696969;">

              <div class="col-md-10 col-xs-10 pull pull-right">

                <div class="form-group" id="kanan">
                  <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File Faktur</label>
                  <div class="col-sm-12">

                    <?php $type = substr($img, -3); ?>
                    <Button class="button1" onclick="AmbilDataImage('<?= $img ?>','<?= $type ?>');" title="Image" class="btn btn-sm bg-gradient-secondary btn-view-file" data-toggle="modal" data-target=".bd-example-modal-lg" data-file="<?= $img ?>">View File</Button>
                  </div>

                </div>
              </div>
              <div class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">File Faktur </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <br>
                    <br>
                    <center>
                      <div id="ViewImage"></div>
                    </center>


                    <br>
                    <br>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xs-12 pull pull-left">



                <div class="form-group" id="qnumber">
                  <label for="Quatations_number_other" style="text-align:left;" class="col-sm-6 control-label">Faktur Number</label>
                  <div class="col-sm-12">
                    <input readonly="" readonly="" type="text" class="form-control" id="faktur_number" name="faktur_number" autocomplete="off">
                  </div>

                </div>



                <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Seri Faktur Pajak Number</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" class="form-control" required="" id="seri_faktur" name="seri_faktur" autocomplete="off" value="<?php echo set_value('seri_faktur') ?>">
                  </div>
                  <?= form_error('seri_faktur', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Date Faktur</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" class="form-control" required="" id="date_faktur" name="date_faktur" autocomplete="off" value="<?php echo set_value('date_faktur') ?>">
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
                    <input readonly="" type="text" class="form-control" id="syarat_pembayaran" name="syarat_pembayaran" autocomplete="off" value="<?php echo set_value('email_other') ?>">
                  </div>


                </div>
                <?= form_error('syarat_pembayaran', '<small class="text-danger pl-3">', '</small>') ?>


              </div>
              <div class="col-13 table-responsive justify-content">
                <hr>
                <br>
                <br>
                <br>
                <table class="col-10 table justify-center table-bordered" align="center" style="margin: auto;" border="1" align="center">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col" style="width: 5%;">
                        <center>No</center>
                      </th>
                      <th scope="col" style="width: 70%;" colspan="3">Description</th>
                      <th scope="col" style="width: 15%;" colspan="2">Total</th>

                    </tr>

                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <center>1
                      </td>

                      <td colspan="3">Material-<?php echo $title; ?></td>


                      <th>IDR <p align="right" style="margin-top: -21px;"> <?php echo "$material"; ?></p>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <center>2</center>
                      </td>
                      <td colspan="3">Jasa-ASF</td>


                      <th>IDR <p align="right" style="margin-top: -21px;"> <?php echo $as ?></p>
                      </th>

                    </tr>


                    <tr>

                    <tr>

                      <td colspan="3" rowspan="6"><b>Terbilang :</b></b>
                        <p id="terbilang1" name="terbilang1"></p>
                      </td>
                      <th style="width: 20%">Subtotal</th>

                      <th style="width: 50%;">IDR <p align="right" style="margin-top: -21px;">
                          <?php

                          echo $sub_total;



                          ?>
                        </p>

                      </th>

                    </tr>
                    <tr>

                      <th>Discount</th>

                      <th>IDR <p align="right" style="margin-top: -21px;">
                          <?php
                          if ($diskon == "") {
                            echo "(0)";
                          } else {
                            echo '(' . $diskon_harga . ')';
                          }


                          ?>

                        </p>
                      </th>

                    </tr>
                    <tr>

                      <th>Netto</th>

                      <th>IDR <p align="right" style="margin-top: -21px;">
                          <?php
                          echo $netto2;


                          ?>

                        </p>
                      </th>

                    </tr>
                    <tr>

                      <th>PPN</th>

                      <th>IDR <p align="right" style="margin-top: -21px;">
                          <?php
                          echo $ppn_faktur;
                          ?>
                        </p>
                      </th>
                    </tr>
                    <tr>

                      <th>PPh23</th>

                      <th>IDR <p align="right" style="margin-top: -21px;">
                          <?php

                          echo '(' . number_format($pph23, 0, ',', '.') . ')';



                          ?>

                        </p>
                      </th>

                    </tr>

                    <tr>

                      <th>Total Faktur</th>

                      <th>IDR <p align="right" style="margin-top: -21px;">
                          <?php

                          echo number_format($total_faktur, 0, ',', '.');



                          ?>
                        </p>

                      </th>

                    </tr>
                </table>


              </div>
              <!-- /.box -->
            </div>
            <!-- col-md-12 -->
          </div>
        </div>

        <!-- /.row -->
      </div>
      <div class="form-group text-left">




      </div>

      <div class="modal fade" id="statusUpdate" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document" data-keyboard="false">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Update Status </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form id="formmodal" method="post" action="<?php echo base_url('user/aksi_update_data_anak'); ?>">
                <div class="box-body">
                  <div class="form-group">
                    <label for="groups">Status</label>
                    <select class="form-control" required="" id="statusUpdate" name="statusUpdate" style="width:100%%;" value="<?php echo set_value('pic') ?>">

                      <option value="Open"> Open</option>
                      <option value="Reject"> Reject</option>
                      <option value="Close"> Close</option>


                    </select>
                  </div>
                  <div class="form-group">
                    <label for="cphone">Note</label>
                    <input type="text" class="form-control" id="note" name="note" autocomplete="off">
                  </div>
                  <small class="text-danger pl-3" id="_error"></small>

                  <!-- /.box-body -->

              </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" onclick="updateStatus();">Save Changes</button>

            </div>

          </div>
        </div>
      </div>

    </div>


  </section>

  <!-- /.content -->
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('[name="jasa1"]').val("tes");
    elementStatus1();

    DataQuotation($('[name="id_faktur"]').val());
    var data = '<?php echo (str_replace('.', '', $total_faktur)) ?>';

    terbilang(data);



  });


  function DataQuotation(id) {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Faktur/AmbilDataFaktur/") ?>',
      data: 'quotation_number=' + id,
      dataType: 'json',

      success: function(hasil) {
        console.log(hasil);


        $('[name="Quatations_number"]').val(hasil[0].quotation_number);
        $('[name="faktur_number"]').val(hasil[0].faktur_number);
        $('[name="date_quotation"]').val(hasil[0].date_quotation);
        $('[name="customer"]').val(hasil[0].customer);
        $('[name="title_event"]').val(hasil[0].tittle_event);
        $('[name="venue_event"]').val(hasil[0].venue_event);
        $('[name="date_event"]').val(hasil[0].date_event);
        $('[name="total_summary"]').val(hasil[0].total_summary.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('[name="comissionabale_cost"]').val(hasil[0].comissionable_cost.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('[name="non_fee"]').val(hasil[0].nonfee.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));

        $('[name="npwp"]').val(hasil[0].npwp);
        $('[name="alamat_customer"]').val(hasil[0].address);
        $('[name="jabatan"]').val(hasil[0].jabatan);
        $('[name="pic_customer"]').val(hasil[0].pic_name);

        $('#Quatations_number').val(hasil[0].quotation_number);
        $('#seri_faktur').val(hasil[0].ser_faktur);
        $('#date_faktur').val(hasil[0].date_faktur);
        $('#syarat_pembayaran').val(hasil[0].syarat_pembayaran);
        $('#diskon').val(hasil[0].diskon);


        $('[name="kppnn"]').val(hasil[0].karakteristik_ppn);
        $('[name="kpphh"]').val(hasil[0].karakteristik_pph);

        $('[name="ref"]').val(hasil[0].po_number);
        $('[name="gr_number"]').val(hasil[0].gr_number);
        $('[name="totalBast"]').val(hasil[0].totalBast.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('[name="bastNumber"]').val(hasil[0].bast_number);

        // var totalBast1 =hasil[0].totalBast;
        //    var totalBast2 =totalBast1.replace(/[^\w\s]/gi, '');

        // var asf=(Number(hasil[0].asfp)/100) * Number(totalBast2);
        // var asfpembulatan=Math.round(asf);

        // var asfmasking = asfpembulatan.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        // var jasa=Number(totalBast2)-Number(asf);
        // var jasamasking = jasa.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        //     $('[name="asf1"]').val(asfmasking);
        //   $('[name="jasa1"]').val(jasamasking); 

      },
      error: function(hasil) {


      }


    });

  }

  function elementStatus1() {
    var faktur_number = $('[name="Quatations_number"]').val();
    $.ajax({
      type: 'POST',

      url: '<?php echo base_url("Faktur/getStatus") ?>',
      data: 'faktur_number=' + faktur_number,
      dataType: 'json',
      success: function(data) {
        //    $('#status').val(data[0].status);
        // console.log(data);

      },
      error: function(data) {
        console.log('ERROR');




      }

    });
  }

  function getStatus() {

    $('[name="statusUpdate"]').val($('[name="status"]').val());

  }

  function AmbilDataImage(fileName, type) {

    if (type == 'pdf') {
      html = '<object type="application/pdf" data="' + fileName + '" width="100%" height="500" style="height: 85vh;"></object>'


    } else {
      html = '<center><img style="height: 80vh; width:80vh"  src="' + fileName + '" ></center>';

    }

    document.getElementById("ViewImage").innerHTML = html;

  }

  function updateStatus() {
    var status = $('[name="status"]').val();
    var note = $('[name="note"]').val();


    var faktur_number = $('[name="faktur_number"]').val();
    $.ajax({
      type: 'POST',
      data: 'status=' + status + '&faktur_number=' + faktur_number + '&note=' + note,
      url: '<?php echo base_url("Faktur/updateStatus") ?>',
      dataType: 'json',
      success: function(hasil) {
        console.log(status);
        if (hasil.pesan == '1') {

          Swal.fire({
            title: "success!",
            text: "Data berhasil diubah.",
            icon: "success",
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false


          });


          $('#statusUpdate').hide();
          $('.modal-backdrop').hide();
          elementStatus1();

          setTimeout(function() {
            window.location = "<?php echo base_url('Faktur/manage_faktur_event/') ?>";
          }, 2000);


        } else {

          Swal.fire({

            text: "Data gagal diubah.",
            icon: "error",
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false


          });
          $('#statusUpdate').hide();
          $('.modal-backdrop').hide();
          elementStatus1();
        }



      },
      error: function() {
        console.log('error');


      }

    });









  }

  function ManageFaktur() {

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

    $('[name="terbilang1"]').html(kaLimat + " Rupiah");
    if (kaLimat == "") {
      return "0" + " Rupiah";

    } else {
      return kaLimat + " Rupiah";


    }


  }

  $("#fakturMainNav").addClass('active');

  $("#openFakturNav").addClass('menu-open');
</script>
<script type="text/javascript" src="<?php echo base_url('assets/rupiah.js') ?>"></script>