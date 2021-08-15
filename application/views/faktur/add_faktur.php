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

            <div class="card-tools" style="margin-top: -35px;margin-right: 15px">
              <a href="<?php echo base_url('Bast/manage_bast_other') ?>" class="btn bg-gradient-secondary">
                <font color="white">Back</font>
              </a>
            </div>

          </div>
          <div class="card-body">
            <!-- Small boxes (Stat box) -->
            <div class="row">

              <div class="col-md-12 col-xs-12">



                <div class="box">

                  <form action="<?php echo base_url('Faktur/aksi_add_faktur') ?>" method="post" id="SimpanData" name="formid" class="form-horizontal" enctype="multipart/form-data">

                    <!--   other -->
                    <div class="col-md-10 col-xs-10 pull pull-right">
                      <div class="form-group" id="kanan" hidden>
                        <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Id Bast</label>
                        <div class="col-sm-12">
                          <input value="<?php echo ($id_bast) ?>" readonly="" type="text" class="form-control" id="id_bast" name="id_bast" autocomplete="off">
                        </div>
                      </div>


                      <div class="form-group" hidden id="kanan">
                        <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Comissionable Cost</label>
                        <div class="col-sm-12">
                          <input readonly="" type="text" class="form-control" id="comissionabale_cost" name="comissionabale_cost" autocomplete="off" value="<?php echo set_value('comissionabale_cost') ?>">
                        </div>
                      </div>

                      <div hidden class="form-group" id="kanan">
                        <label for="ppn" style="text-align:left;" class="col-sm-6 control-label">ASF</label>
                        <div class="col-sm-12">
                          <input type="text" readonly="" class="form-control" readonly="" id="asfp" name="asfp" autocomplete="off" value="0">

                        </div>

                      </div>
                      <div class="form-group" hidden id="kanan">
                        <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">Non-Fee Cost</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="non_fee" readonly="" name="non_fee" autocomplete="off">


                        </div>

                      </div>
                      <div class="form-group" id="kanan">
                        <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">Subtotal </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="total_summary" readonly="" name="total_summary" autocomplete="off" value="0">


                        </div>

                      </div>
                      <div class="form-group" id="kanan">
                        <label for="ppn" style="text-align:left;" class="col-sm-6 control-label">ASF</label>
                        <div class="col-sm-12">
                          <input type="text" readonly="" class="form-control" readonly="" id="asf" name="asf" autocomplete="off" value="0">

                        </div>

                      </div>


                      <div class="form-group" id="kanan">
                        <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">Discount </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="discount" readonly="" name="discount" autocomplete="off" value="0">


                        </div>

                      </div>
                      <div class="form-group" id="kanan">
                        <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">Netto </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="netto" readonly="" name="netto" autocomplete="off" value="0">
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


                      <div class="form-group" id="qnumber" hidden>
                        <label for="netto" style="text-align:left;" class="col-sm-6 control-label">Venue Event</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" required="" readonly="" id="venu_event" name="venue_event" autocomplete="off">
                          <input type="text" class="form-control" readonly="" id="netto_hidden" name="netto_hidden" autocomplete="off" hidden="">
                        </div>
                      </div>
                      <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>



                      <div class="form-group" id="qnumber" hidden>
                        <label for="total" style="text-align:left;" class="col-sm-6 control-label">Date Event</label>
                        <div class="col-sm-12">
                          <input type="text" required="" class="form-control" id="date_event" name="date_event" readonly="" autocomplete="off">


                        </div>

                        <?= form_error('date_event', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>



                    </div>
                    <br>
                    <br>
                    <br>


                    <hr style="height: 1px; border-width: 1px; background-color:#696969;">

                    <div class="col-md-10 col-xs-10 pull pull-right">

                      <div class="form-group" id="kanan">
                        <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File Faktur</label>
                        <div class="col-sm-12">

                          <input accept=".jpg,.png,.jpeg,.pdf" id="imagenes" onchange="ValidateSize(this)" name="imagenes" type="file">
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
                          <input readonly="" type="text" class="form-control" id="faktur_number" name="faktur_number" autocomplete="off" value="<?php echo set_value('Quatations_number_other') ?>">
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
                          <input onkeypress="return false;" type="text" placeholder="dd/mm/yy" class="form-control" required="" id="date_faktur" name="date_faktur" autocomplete="off" value="<?php echo set_value('date_faktur') ?>">
                        </div>
                        <?= form_error('date_faktur', '<small class="text-danger pl-3">', '</small>') ?>
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
                    <div style="overflow-x:auto;width:100%">
                      <table class="table" border="0" id="tablefaktur" style="width:150%">
                        <thead>
                          <tr>


                            <th><a hidden="" style="width: 5" class="btn btn-sm bg-gradient-secondary" data-toggle="tooltip" id="hapus">
                                <font color="white"> <i class="fa fa-times">
                                    <font color="white">
                                  </i></font>
                              </a></th>
                            <th style="width: 10%">Barang</th>

                            <th style="width: 35%">Deskripsi Barang</th>
                            <th style="width: 15%">Keterangan</th>
                            <th style="width: 7%"> Quantity</th>
                            <th style="width: 7%"> KTS</th>
                            <th style="width: 15%">Harga Satuan</th>
                            <th style="width: 25%"> Amount</th>

                            <th style="width: 3%"><button hidden="" style="width: 5" class="btn btn-sm bg-gradient-secondary" id="BarisBaru"><i class="fa fa-plus"></i> </button></th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>Subtotal</th>
                            <td> <input type="text" readonly="" class="form-control" id="subtotal" name="subtotal" autocomplete="off" value="<?php echo set_value('email_other') ?>"></td>





                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <th>ASF</th>
                            <td> <input type="text" readonly="" class="form-control" id="asf_faktur" name="asf" autocomplete="off" value="<?php echo set_value('email_other') ?>"></td>





                          </tr>
                          <tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td style="display: flex; margin: 0;top: 10px;">
                              <p><b>Discount</b></p><input hidden style="width: 70px; margin-left: 80px;" type="number" oninput="hitungdiskon();" class="form-control" id="diskon_faktur" name="diskon" autocomplete="off" placeholder="0" value="<?php echo set_value('email_other') ?>">
                              <p hidden style="margin-left: 5px; margin-top: 5px;">%</p>
                            </td>
                            <td><input readonly="" style="width: 100% " type="text" oninput="hitungdiskon();" class="form-control" id="hasildiskon_faktur" name="hasildiskon" autocomplete="off" placeholder="0"> </td>
                          </tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <th>Netto</th>
                          <td> <input type="text" readonly="" class="form-control" id="netto_faktur" name="total" autocomplete="off" value="<?php echo set_value('email_other') ?>"></td>

                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <th>PPN</th>
                            <td><input type="text" readonly="" class="form-control" id="ppn" name="ppn" autocomplete="off" value="<?php echo set_value('ppn') ?>"></td>





                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <th>PPh23</th>
                            <td><input type="text" readonly="" class="form-control" id="pph23" name="pph23" autocomplete="off" value="<?php echo set_value('pph23') ?>"></td>


                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <th>Total Faktur</th>
                            <td><input type="text" readonly="" class="form-control" id="total_faktur" name="total_faktur" autocomplete="off" value="<?php echo set_value('total_faktur') ?>"></td>

                          </tr>

                          <tr>
                            <td colspan="9">Terbilang</td>

                          </tr>
                          <tr>
                            <td colspan="9"><input type="text" readonly="" class="form-control" id="terbilang1" name="terbilang1" autocomplete="off" value="<?php echo set_value('email_other') ?>"></td>

                          </tr>





                        </tfoot>
                      </table>
                    </div>
                    <br>
                    <div class="form-group text-left">
                      <!--  <button style="margin-left: 14px;" type="submit" class="btn btn-primary">Create Faktur</button> -->
                      <button type="submit" class="btn btn-primary btnSave" type="button">
                        <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                        Create Faktur
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
    <script src="<?php echo base_url('assets/lte/tiny/tinymce.min.js') ?>" referrerpolicy="origin" referrerpolicy="origin"></script>

    <script type="text/javascript">
      function showIndikator() {
        $('.btnSave').attr('disabled', 'disabled');
        $('.loadingIndikdator').show();

      }

      function hiddenIndikator() {
        $('.btnSave').removeAttr('disabled');
        $('.loadingIndikdator').hide();

      }

      generetfaktur();
      DataQuotation($('#Quatations_number').val());

      hitungFaktur();
      $(document).ready(function() {
        hiddenIndikator();


      });


      function DataQuotation(id) {
        $.ajax({
          type: "post",
          url: '<?php echo base_url("Faktur/AmbilDataQuotationOther/") ?>',
          data: 'quotation_number=' + id,
          dataType: 'json',
          success: function(hasil) {
            console.log(hasil);

            $('[name="Quatations_number"]').val(hasil[0].quotation_number);
            $('[name="date_quotation"]').val(hasil[0].date_quotation);
            $('[name="customer"]').val(hasil[0].customer_event);
            $('[name="title_event"]').val(hasil[0].tittle_event);
            $('[name="venue_event"]').val(hasil[0].venue_event);
            $('[name="date_event"]').val(hasil[0].date_event);
            $('[name="total_summary"]').val(hasil[0].sub_total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
            $('[name="comissionabale_cost"]').val(hasil[0].comissionable_cost);
            $('[name="non_fee"]').val(hasil[0].nonfee);
            $('[name="asf"]').val(hasil[0].asf.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
            $('[name="npwp"]').val(hasil[0].npwp);
            $('[name="alamat_customer"]').val(hasil[0].address);
            $('[name="jabatan"]').val(hasil[0].jabatan);
            $('[name="pic_customer"]').val(hasil[0].pic_event);
            $('[name="netto"]').val(hasil[0].netto.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
            $('#discount').val(hasil[0].discount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
            $('#diskon').val(hasil[0].discount_percent);
            $('[name="kppnn"]').val(hasil[0].karakteristik_ppn);
            $('[name="kpphh"]').val(hasil[0].karakteristik_pph);
            $('[name="asfp"]').val(hasil[0].asfp);


            <?php
            if ($jml == "1") {


            ?>
              TambahBarisBaruFaktur1()
              hitungFaktur();
            <?php
            } else {
            ?>
              TambahBarisBaruFaktur()
              //  totalSub1();
              hitungFaktur();
            <?php

            }
            ?>
          },
          error: function(hasil) {


          }


        });

      }

      function BarisBaruFaktur() {
        <?php if ($jml == "1") { ?>

          $(document).ready(function() {
            $("[data-toggle='tooltip']").tooltip();
          });
          var Nomor = $("#tablefaktur tbody tr").length + 1;
          var Baris = '<tr id=trfaktur' + Nomor + '>';



          Baris += '<td colspan=2>';
          Baris += '<input  type="text" name="namebarang[]" id="namebarang' + Nomor + '"  class="form-control deposit"  required="" >';
          Baris += '</td>';


          // Baris += '<td>';
          // Baris += '<input  type="text" name="deskripsibarang[]"    id="DescriptionBarang' + Nomor + '" class="form-control FrequencyDescription" >';
          // Baris += '</td>';
          Baris += '<td style="width:30%" >';
          Baris += '<textarea  class="form-control description"  name="deskripsibarang[]"  id="DescriptionBarang' + Nomor + '" >';
          Baris += '</textarea>';
          Baris += '</td>';



          Baris += '<td>';
          Baris += '<input type="text" name="keteranganbarang[]" id="keteranganbarang' + Nomor + '"  class="form-control KeteranganDescription"  required="" oninput="" >';
          Baris += '</td>';
          Baris += '<td>';

          Baris += '<input  type="text" readonly name="quantity[]" id="quantity' + Nomor + '"  class="form-control deposit"  required="" oninput="hitungFaktur();" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input  type="text" readonly name="kts[]" id="kts' + Nomor + '"  class="form-control deposit"  required="" oninput="hitungFaktur();" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input  onkeyup="convertToRupiah(this);"  readonly type="text" name="hargasatuan[]" id="HargaSatuan' + Nomor + '"  class="form-control HargaSatuan"  required="" oninput="hitungFaktur()" >';
          Baris += '</td>';

          Baris += '<td>';


          Baris += '<input oninput="hitungFaktur();" readonly  type="text" name="amount[]" id="amount' + Nomor + '"  class="form-control deposit"  required="" readonly  >  <input    type="text" name="ammountHidden[]" id="amounthidden' + Nomor + '"  class="form-control AmountHidden"  required="" readonly hidden  >';
          Baris += '</td>';
          Baris += '<td class="text-center">';
          Baris += '<a hidden class="btn btn-sm btn-danger" data-toggle="tooltip" id="HapusBaris" ><font color="white"><i class="fa fa-times"></font></a>';
          Baris += '</td>';
          Baris += '</tr>';
          // onkeyup="convertToRupiah(this);"

          $("#tablefaktur tbody").append(Baris);
          $("#tablefaktur tbody tr").each(function() {
            $(this).find('td:nth-child(1) input').focus();
          });
          tinymce.init({
            selector: 'textarea.description',
            height: 200,
            menubar: false,
            plugins: [
              'advlist autolink lists link image charmap print preview anchor',
              'searchreplace visualblocks code fullscreen',
              'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
              'bold italic backcolor | alignleft aligncenter ' +
              'alignright alignjustify | bullist numlist outdent indent | ' +
              'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
          });

        <?php } else { ?>

          $(document).ready(function() {
            $("[data-toggle='tooltip']").tooltip();
          });
          var Nomor = $("#tablefaktur tbody tr").length + 1;
          var Baris = '<tr id=trfaktur' + Nomor + '>';



          Baris += '<td colspan=2>';
          Baris += '<input  type="text" name="namebarang[]" id="namebarang' + Nomor + '"  class="form-control deposit"  required="" >';
          Baris += '</td>';


          // Baris += '<td>';
          // Baris += '<input  type="text" name="deskripsibarang[]"    id="DescriptionBarang' + Nomor + '" class="form-control FrequencyDescription" >';
          // Baris += '</td>';

          Baris += '<td style="width:30%" >';
          Baris += '<textarea  class="form-control description"  name="deskripsibarang[]"  id="DescriptionBarang' + Nomor + '" >';
          Baris += '</textarea>';
          Baris += '</td>';


          Baris += '<td>';
          Baris += '<input type="text" name="keteranganbarang[]" id="keteranganbarang' + Nomor + '"  class="form-control KeteranganDescription"  required="" oninput="" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input readonly  type="text" readonly name="quantity[]" id="quantity' + Nomor + '"  class="form-control deposit"  required="" oninput="hitungFaktur();" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input  type="text" readonly name="kts[]" id="kts' + Nomor + '"  class="form-control deposit"  required="" oninput="totalSub1();" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input  readonly onkeyup="convertToRupiah(this);"  type="text" name="hargasatuan[]" id="HargaSatuan' + Nomor + '"  class="form-control HargaSatuan"  required="" oninput="totalSub1()" >';
          Baris += '</td>';

          Baris += '<td>';


          Baris += '<input hidden oninput="totalSub1();"  type="text" name="amount[]" id="amount' + Nomor + '"  class="form-control deposit"  required="" readonly  >  <input    type="text" name="ammountHidden[]" id="amounthidden' + Nomor + '"  class="form-control AmountHidden"  required="" readonly hidden  >';

          Baris += '</td>';
          Baris += '<td class="text-center">';
          Baris += '<a hidden class="btn btn-sm btn-danger" data-toggle="tooltip" id="HapusBaris" ><font color="white"><i class="fa fa-times"></font></a>';
          Baris += '</td>';
          Baris += '</tr>';
          // onkeyup="convertToRupiah(this);"

          $("#tablefaktur tbody").append(Baris);
          $("#tablefaktur tbody tr").each(function() {
            $(this).find('td:nth-child(1) input').focus();
          });

          tinymce.init({
            selector: 'textarea.description',
            height: 200,
            menubar: false,
            plugins: [
              'advlist autolink lists link image charmap print preview anchor',
              'searchreplace visualblocks code fullscreen',
              'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
              'bold italic backcolor | alignleft aligncenter ' +
              'alignright alignjustify | bullist numlist outdent indent | ' +
              'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
          });


        <?php } ?>
      }


      function TambahBarisBaruFaktur() {
        var data = $('[name="title_event"]').val();

        <?php


        foreach ($quotation_other as $k) :

        ?>
          $(document).ready(function() {
            $("[data-toggle='tooltip']").tooltip();
          });
          var Nomor = $("#tablefaktur tbody tr").length + 1;
          var d = $('[name="title_event"]').val();
          var Baris = '<tr id=trfaktur' + Nomor + '>';



          Baris += '<td colspan=2>';
          Baris += '<input  type="text" name="namebarang[]" id="namebarang' + Nomor + '"  class="form-control deposit"  required="" >';
          Baris += '</td>';



          Baris += '<td style="width:30%" >';
          Baris += '<textarea  class="form-control description"  name="deskripsibarang[]"  id="DescriptionBarang' + Nomor + '" >';
          Baris += `<?php echo $k->desciption ?>`;
          Baris += '</textarea>';
          Baris += '</td>';


          Baris += '<td>';
          Baris += '<input value="' + d + '"   type="text" name="keteranganbarang[]" id="keteranganbarang' + Nomor + '"  class="form-control KeteranganDescription"  required="" oninput="" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input  readonly type="text" value="<?php echo $k->quantity; ?>"  name="quantity[]" id="quantity' + Nomor + '"  class="form-control deposit"  required="" oninput="totalSub1()" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input readonly  type="text" value="<?php echo $k->frequency; ?>"  name="kts[]" id="kts' + Nomor + '"  class="form-control deposit"  required="" oninput="totalSub1()" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input readonly  onkeyup="convertToRupiah(this);"  type="text" value="<?php echo number_format($k->unitprice, 0, ',', '.') ?>" name="hargasatuan[]" id="HargaSatuan' + Nomor + '"  class="form-control HargaSatuan"  required="" oninput="totalSub1()" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input hidden readonly  oninput="totalSub1();"  value="<?php echo number_format($k->frequency, 0, ',', '.') ?>"   type="text" name="amount[]" id="amount' + Nomor + '"  class="form-control deposit"  required="" readonly  >  <input    type="text" name="ammountHidden[]" id="amounthidden' + Nomor + '"  class="form-control AmountHidden"  required="" readonly hidden  >';
          Baris += '</td>';
          Baris += '<td class="text-center">';
          Baris += `<a hidden class="btn btn-sm btn-danger" data-toggle="tooltip" id="HapusBaris"  data-row="${Nomor}" ><font color="white"><i class="fa fa-times"></font></a>`;
          Baris += '</td>';
          Baris += '</tr>';
          // onkeyup="convertToRupiah(this);"

          $("#tablefaktur tbody").append(Baris);
          $("#tablefaktur tbody tr").each(function() {
            $(this).find('td:nth-child(1) input').focus();
          });
        <?php endforeach ?>

        tinymce.init({
          selector: 'textarea.description',
          height: 200,
          menubar: false,
          plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
          ],
          toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
          content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

      }

      function TambahBarisBaruFaktur1() {
        var data = $('[name="title_event"]').val();

        <?php


        foreach ($quotation_other as $k) :

        ?>
          $(document).ready(function() {
            $("[data-toggle='tooltip']").tooltip();
          });
          var Nomor = $("#tablefaktur tbody tr").length + 1;
          var d = $('[name="title_event"]').val();
          var Baris = '<tr id=trfaktur' + Nomor + '>';

          Baris += '<td colspan=2>';
          Baris += '<input  type="text" name="namebarang[]" id="namebarang' + Nomor + '"  class="form-control deposit"  required="" >';
          Baris += '</td>';
          Baris += '<td style="width:30%" >';
          Baris += '<textarea  class="form-control description"  name="deskripsibarang[]"  id="DescriptionBarang' + Nomor + '" >';
          Baris += `<?php echo $k->desciption ?>`;
          Baris += '</textarea>';
          Baris += '</td>';



          Baris += '<td>';
          Baris += '<input   type="text" name="keteranganbarang[]" id="keteranganbarang' + Nomor + '"  class="form-control KeteranganDescription"  required="" oninput="" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input readonly  type="text" value="<?php echo $k->quantity; ?>"  name="quantity[]" id="quantity' + Nomor + '"  class="form-control deposit"  required="" oninput="totalSub1()" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input readonly  type="text" value="<?php echo $k->frequency; ?>"  name="kts[]" id="kts' + Nomor + '"  class="form-control deposit"  required="" oninput="hitungFaktur();" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input readonly  onkeyup="convertToRupiah(this);"  type="text" value="<?php echo number_format($k->unitprice, 0, ',', '.') ?>" name="hargasatuan[]" id="HargaSatuan' + Nomor + '"  class="form-control HargaSatuan"  required="" oninput="hitungFaktur()" >';
          Baris += '</td>';

          Baris += '<td>';
          Baris += '<input readonly  oninput="hitungFaktur();"  value="<?php echo $k->frequency; ?>"   type="text" name="amount[]" id="amount' + Nomor + '"  class="form-control deposit"  required="" readonly  >  <input    type="text" name="ammountHidden[]" id="amounthidden' + Nomor + '"  class="form-control AmountHidden"  required="" readonly hidden  >';
          Baris += '</td>';
          Baris += '<td class="text-center">';
          Baris += `<a hidden class="btn btn-sm btn-danger" data-toggle="tooltip" id="HapusBaris"  data-row="${Nomor}" ><font color="white"><i class="fa fa-times"></font></a>`;
          Baris += '</td>';
          Baris += '</tr>';
          // onkeyup="convertToRupiah(this);"

          $("#tablefaktur tbody").append(Baris);
          $("#tablefaktur tbody tr").each(function() {
            $(this).find('td:nth-child(1) input').focus();
          });
        <?php endforeach ?>
        tinymce.init({
          selector: 'textarea.description',
          height: 200,
          menubar: false,
          plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
          ],
          toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
          content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

      }





      $(document).on('click', '#HapusBaris', function(e) {
        e.preventDefault();
        var Nomor = 0;
        $(this).parent().parent().remove();
        // updateIdrow();
        hitungFaktur();


      });
      $('#BarisBaru').click(function(e) {

        BarisBaruFaktur();

      });

      function hitungFaktur() {
        var hitung = 0;
        $('#tablefaktur tbody tr').each(function() {
          var kts = $(this).find('td:nth-child(5) input').val();
          var quantity = $(this).find('td:nth-child(4) input').val();
          var unitprice = $(this).find('td:nth-child(6) input').val();
          var unitprice1 = unitprice.replace(/[^\w\s]/gi, '');
          data = Number(kts) * Number(unitprice1) * Number(quantity);
          var ss = data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
          var amount = $(this).find('td:nth-child(7) input').val(ss);


          hitung = Number(hitung) + Number(data);


        });
        // var a = Math.round(hitung);
        // var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        // $('#subtotal').val(hitung1);
        // total();
        // hitungdiskon();


        // hitung_faktur();
        var total_bast = $('#totalBast').val();
        var total_bast1 = total_bast.replace(/[^\w\s]/gi, '');

        var sub_total = $('#total_summary').val();
        var sub_total1 = sub_total.replace(/[^\w\s]/gi, '');

        var netto = $('#netto').val();
        var netto1 = netto.replace(/[^\w\s]/gi, '');

        var asf = $('#asf').val();
        var asf1 = asf.replace(/[^\w\s]/gi, '');

        var discount = $('#discount').val();
        var discount1 = discount.replace(/[^\w\s]/gi, '');

        var pembagi = Number(total_bast1) / Number(netto1);

        var sub_total2 = Math.round(Number(pembagi) * Number(sub_total1));
        var asf2 = Math.round(Number(pembagi) * Number(asf1));
        var discount2 = Math.round(Number(pembagi) * Number(discount1));
        var netto2 = Math.round(Number(sub_total2) + Number(asf2) - Number(discount2))

        $('#subtotal').val(sub_total2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('#asf_faktur').val(asf2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('#hasildiskon_faktur').val('(' + discount2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ')');
        $('#netto_faktur').val(netto2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));


        hitungppn();
        hitungpph();





      }


      function totalSub1() {
        var totalBast1 = $('#totalBast').val();
        var asfp = $('#asfp').val();
        var totalBast2 = totalBast1.replace(/[^\w\s]/gi, '');
        var asf = (Number(asfp) / 100) * Number(totalBast2);
        var asfPembulatan = Math.round(asf)
        var asfmasking = asfPembulatan.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        var jasa = Math.round(Number(totalBast2) - Number(asf));

        var jasamasking = jasa.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

        $('[name="asf"]').val(asfmasking);
        $('[name="subtotal"]').val(jasamasking);
        total();
        hitungdiskon();
        hitungppn();
        hitungpph();
        // terbilang(a);
        hitung_faktur();

      }

      function total() {
        var subtotal = $('#subtotal').val();
        var asf = $('#asf').val();
        var asf1 = asf.replace(/[^\w\s]/gi, '');
        var subtotal1 = subtotal.replace(/[^\w\s]/gi, '');
        var total = Number(asf1) + Number(subtotal1);
        var total1 = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('#total').val(total1);



      }


      //   function hitungFaktur(){
      //   var Nomor = $("#tablefaktur tbody tr").length
      //   console.log(Nomor);


      //  var x;
      //  var hitung=0;
      // for (x = 1; x <= Nomor; x++) {

      //   var k=$('#kts'+x).val();
      //   var a=$('#HargaSatuan'+x).val();
      //   var ra = a.replace(/[^\w\s]/gi, '');

      //   s=Number(k)*Number(ra);
      //   var ss = s.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      //    $('#amount'+x).val(ss);
      //    $('#amounthidden'+x).val(s);
      //    var subtotal=$('#amounthidden'+x).val();
      //    hitung=Number(hitung)+Number(subtotal);

      // }
      //  var a=Math.ceil(hitung); 
      //   var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

      // console.log(subtotal);
      //  $('#subtotal').val(hitung1);
      //  hitungdiskon();
      //  hitungppn();
      //  hitungpph();
      //  terbilang(a);


      //  //hitungnetto();
      // }  


      function hitungdiskon() {
        var subtotal = $('#total').val();
        var diskon = $('#diskon').val();
        var s = subtotal.replace(/[^\w\s]/gi, '');
        var hargadiskon = (Number(s) / 100) * Number(diskon);
        // var totalfaktur=s-hargadiskon;
        // var totalfaktur1=Math.ceil(totalfaktur);
        // var hitung1 =totalfaktur1.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

        var hargadiskon1 = Math.round(hargadiskon);

        var diskon1 = hargadiskon1.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        //$('#total_faktur').val(hitung1);


        $('#hasildiskon').val('(' + diskon1 + ')');
        //terbilang(111111111111111);
        hitung_faktur();

      }

      function hitung_faktur() {
        var subtotal = $('#netto_faktur').val();
        var subtotal1 = subtotal.replace(/[^\w\s]/gi, '');
        var hasildiskon = $('#hasildiskon_faktur').val();
        var hargadiskon1 = hasildiskon.replace(/[^\w\s]/gi, '');
        var ppn = $('[name="ppn"]').val();
        var ppn1 = ppn.replace(/[^\w\s]/gi, '');
        var pph = $('#pph23').val();
        var pph1 = pph.replace(/[^\w\s]/gi, '');

        var total_faktur = Number(subtotal1) + Number(ppn1) - Number(pph1)
        var total_faktur2 = Math.round(total_faktur);
        var total_faktur1 = total_faktur2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

        $('#total_faktur').val(total_faktur1);

        terbilang(total_faktur2);

      }


      function hitungppn() {


        var data = $('#kppnn').val();
        console.log('ppn  :' + data)
        if (data == "noppn") {
          var subtotal = $('#netto_faktur').val();
          var s = subtotal.replace(/[^\w\s]/gi, '');
          var hitung = Number(s) * 0;
          var a = Math.round(hitung);
          var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
          $('[name="ppn"]').val(hitung1);
          hitung_faktur();
        } else {
          var subtotal = $('#netto_faktur').val();
          var s = subtotal.replace(/[^\w\s]/gi, '');

          var hitung = Number(s) * 0.1;
          var a = Math.round(hitung);
          var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
          $('[name="ppn"]').val(hitung1);
          hitung_faktur();


        }



      }

      function hitungpph() {
        var data = $('[name="kpphh"]').val();

        //2% dari management fee
        if (data == 'nopph') {
          var subtotal = $('#asf_faktur').val();
          var s = subtotal.replace(/[^\w\s]/gi, '');

          var hasil = Number(s) * 0;
          var a = Math.round(hasil);
          var hasil1 = hasil.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

          $('#pph23').val('(' + hasil1 + ')');
          hitung_faktur();

        } else {
          var subtotal = $('#asf_faktur').val();
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
            console.log("tes");
            $('[name="faktur_number"]').val("MM-XX-" + hasil.data);

          },
          error: function(hasil) {





          }


        });

      }

      /// simpan data quotation other


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

          maxDate: '+30Y',
          yearRange: '1999:2030',
          inline: true
        });
      });



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
        
        msgErrorClass: 'alert alert-block alert-danger'

      });
      $("#fakturMainNav").addClass('active');

      $("#openFakturNav").addClass('menu-open');

      function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > 2) {
          alert('File size exceeds 2 MB');
          $('#imagenes').val(''); //for clearing with Jquery
        } else {

        }
      }


      $('#SimpanData').submit(function(e) {

        e.preventDefault();
        cekFaktur();
        showIndikator();



      });

      function cekFaktur() {
        var quotation_number = $('#Quatations_number').val();
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
                  window.location = "<?php echo base_url('Bast/manage_bast/') ?>";

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

        var material = Number(comissionable_cost2) + Number(nonfee2);
        var jasa = Number(asf2);
        var discount3 = Number(discount2);
        var sub_total2 = Number(comissionable_cost2) + Number(nonfee2) + Number(jasa);
        var netto2 = Number(sub_total2) - Number(discount3);


        $('#jasa').val(material.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('#asf').val(jasa.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('#subtotal').val(sub_total2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('#hasildiskon').val(discount3.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('#hasilnetto').val(netto2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        hitungFaktur();
      }
    </script>
    <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js') ?>"></script>