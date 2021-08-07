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

        <h3 class="box-title"><b>Add Delivery</b></h3>

        <div class="card-tools" style="margin-top: -35px;margin-right: 15px">
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

              <form action="<?php base_url('Delivery/create_delivery/' . $quotation_number) ?>" method="post" id="SimpanData" name="formid">





                <div class="col-md-6 col-xs-12 pull pull-left">
                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-7 control-label">Quotation Number</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" autocomplete="off" value="<?php echo $quotation_number ?>">
                    </div>

                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-7 control-label">Date Quotation</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" required="" id="date_quotation" name="date_quotation" autocomplete="off" value="<?php echo set_value('Date_event') ?>">
                    </div>
                    <?= form_error('date_quotation', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-7 control-label">Customer</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" required="" id="customer" name="customer" autocomplete="off" value="<?php echo set_value('customer') ?>">
                    </div>
                    <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" id="qnumber">

                    <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">Alamat Customer</label>
                    <div class="col-sm-12">
                      <textarea rows="5" readonly class="form-control" id="alamat_customer" name="alamat_customer" autocomplete="off" value="<?php echo set_value('customer_other') ?>"></textarea>

                    </div>
                    <?= form_error('customer_other', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-7 control-label">Title Event</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" readonly="" id="title_event" name="title_event" autocomplete="off">
                      <input type="text" class="form-control" readonly="" id="netto_hidden" name="netto_hidden" autocomplete="off" hidden="">
                    </div>
                  </div>

                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-7 control-label">Venue Event</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" readonly="" id="venue_event" name="venue_event" autocomplete="off">

                    </div>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-7 control-label">Date event</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" readonly="" id="date_event" name="date_event" autocomplete="off">

                    </div>
                  </div>
                  <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>

                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-7 control-label">BAST Number</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" readonly="" id="bast_number" name="bast_number" autocomplete="off">

                    </div>
                  </div>

                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-7 control-label">PO Number</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" readonly="" id="po_number" name="po_number" autocomplete="off">

                    </div>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-7 control-label">Date PO</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" readonly="" id="date_po" name="date_po" autocomplete="off">

                    </div>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-7 control-label">Total BAST</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" readonly="" id="total_bast" name="total_bast" autocomplete="off">

                    </div>
                  </div>

                  <?= form_error('po_number', '<small class="text-danger pl-3">', '</small>') ?>
                </div>




                <br>
                <br>

                <hr style="height: 1px; border-width: 1px; background-color:#696969;">
                <div class="col-md-6 col-xs-12 pull pull-left">



                  <div class="form-group" id="qnumber" hidden>
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-7 control-label">Id Faktur</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" id="id_bast" name="id_bast" value="<?php echo ($id_bast) ?>" autocomplete="off" value="<?php echo set_value('delivery_order') ?>">
                    </div>

                  </div>

                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-7 control-label">Delivery Order Number</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" id="delivery_order" name="delivery_order" autocomplete="off" value="<?php echo set_value('delivery_order') ?>">
                    </div>

                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-7 control-label">Pengirim</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="pengirim" name="pengirim" autocomplete="off" value="<?php echo set_value('delivery_order') ?>">
                    </div>

                  </div>


                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-7 control-label">Tanggal Pengiriman</label>
                    <div class="col-sm-12">
                      <input onkeypress="return false;" onchange="generet_delivery()" onkeypress="return false;" type="text" placeholder="yyyy-mm-dd" class="form-control" required="" id="tanggal_pengiriman" name="tanggal_pengiriman" autocomplete="off">

                    </div>
                  </div>
                  <?= form_error('tanggal_pengiriman', '<small class="text-danger pl-3">', '</small>') ?>

                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-7 control-label">Nomor Kendaraan</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" id="platnomor" name="platnomor" autocomplete="off">

                    </div>
                  </div>
                  <?= form_error('tanggal_pengiriman', '<small class="text-danger pl-3">', '</small>') ?>

                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-7 control-label">Gudang</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" id="gudang" name="gudang" autocomplete="off" value="<?php echo ('Magenta Mediatama') ?>">
                    </div>
                    <?= form_error('gudang', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <!--      <div class="form-group" id="qnumber">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-10 control-label">Kirim Ke</label>
                   <div class="col-sm-12">
                     <textarea rows="5" class="form-control" id="kirim" name="kirim" autocomplete="off" value="<?php echo set_value('kirim') ?>"></textarea>
                
                </div>
               <?= form_error('kirim', '<small class="text-danger pl-3">', '</small>') ?>
                   </div> -->

                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-7 control-label">Tagihan Ke</label>
                    <div class="col-sm-12">
                      <textarea rows="5" class="form-control" required="" id="tagihan" name="tagihan" autocomplete="off" value="<?php echo set_value('date_expired_other') ?>"></textarea>
                    </div>
                    <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-7 control-label">Kirim Ke</label>
                    <div class="col-sm-12">
                      <select onchange="Datagudang();" class="form-control" required="" id="kirimm" name="kirimm" style="height: 100px">
                        <option value="">Select Gudang</option>
                        <?php foreach ($gudang as $k) : ?>
                          <option value="<?php echo $k->id_gudang ?>"><?php echo $k->alamat ?></option>
                        <?php endforeach ?>
                      </select>

                    </div>
                    <?= form_error('gudang', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-7 control-label"></label>
                    <div class="col-sm-12">
                      <textarea readonly="" rows="5" class="form-control" required="" id="kirim" name="kirim" autocomplete="off" value="<?php echo set_value('date_expired_other') ?>"></textarea>
                    </div>
                    <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                </div>
                <div class="col-md-6 col-xs-12 pull pull-left">
                </div>
                <br>
                <br>
                <div class="form-group text-left">
                  <!--  <button style="margin-left: 20px;" type="submit" class="btn btn-primary">Create Delivery Order</button> -->

                  <button type="submit" class="btn btn-primary btnSave" type="button">
                    <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                    Create Delivery
                  </button>

                </div>



              </form>
            </div>
            <!-- Content form -->

          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>


  </section>

  <!-- /.content -->
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
  $('#kirimm').select2();

  $(document).ready(function() {
    hiddenIndikator();
    DataQuotation($('#Quatations_number').val());
    // generet_delivery();


  });



  function DataQuotation(id) {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Delivery/AmbilDataQuotation/") ?>',
      data: 'quotation_number=' + id,
      dataType: 'json',

      success: function(hasil) {
        console.log(hasil);


        $('[name="Quatations_number"]').val(hasil[0].quotation_number);
        $('[name="date_quotation"]').val(hasil[0].date_quotation);
        $('[name="customer"]').val(hasil[0].customer);
        $('[name="title_event"]').val(hasil[0].tittle_event);
        $('[name="alamat_customer"]').val(hasil[0].address);
        $('[name="po_number"]').val(hasil[0].po_number);
        $('[name="title_event"]').val(hasil[0].tittle_event);

        $('[name="venue_event"]').val(hasil[0].venue_event);
        $('[name="date_po"]').val(hasil[0].date_po);
        $('[name="date_event"]').val(hasil[0].date_event);


        $('[name="tagihan"]').val(hasil[0].address);
        $('[name="bast_number"]').val(hasil[0].bast_number);
        $('[name="total_bast"]').val(hasil[0].totalBast.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));



      },
      error: function(hasil) {


      }


    });

  }

  function generet_delivery() {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Delivery/generet_delivery") ?>',
      dataType: 'json',
      success: function(hasil) {
        console.log(hasil);
        // var date = $('[name="tanggal_pengiriman"]').val();
        var date = new Date($('[name="tanggal_pengiriman"]').val());

        console.log(date);
        var tahun = date.getFullYear();
        var t = tahun.toString()
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();

        $('[name="delivery_order"]').val("QO" + t.substring(2, 4) + "" + (bulan + 1) + "" + tanggal + hasil.data)

      },
      error: function(hasil) {



      }


    });

  }
  $(function() {
    var dateToday = new Date();

    $('#tanggal_pengiriman').datepicker({
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


  $("#deliveryMainNav").addClass('active');

  $("#openDeliveryNav").addClass('menu-open');




  $('#SimpanData').submit(function(e) {

    e.preventDefault();
    showIndikator();
    cekDelivery1();



  });

  function cekDelivery1() {
    var quotation_number = $('#id_bast').val();
    var delivery_order = $('#delivery_order').val();
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Delivery/cekDelivery1/") ?>',
      data: 'quotation_number=' + quotation_number + '&delivery_order=' + delivery_order,
      dataType: 'json',

      success: function(hasil) {
        console.log(hasil);

        if (hasil.status == 'tersediaD') {

          Swal.fire({
            title: 'Oops',
            text: "Delivery order number sudah tersedia,lakukan update delivery order number dengan menekan tombol update DN  sebeleum menyimpan  data Delivery",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#808080',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Update DN'
          }).then((result) => {
            if (result.value) {
              console.log("update berhasil");
              generet_delivery();
              hiddenIndikator();
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Delivery Order Number has been updated',
                showConfirmButton: false,
                timer: 1500
              });
              hiddenIndikator();


            }
          });


        } else if (hasil.status == "tersediaQ") {
          console.log(hasil.status)
          hiddenIndikator();
          Swal.fire({
            title: 'Oops',
            text: "Data delivery number order sudah tersedia",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#808080',
            cancelButtonText: 'Close',
            confirmButtonText: 'Back'
          }).then((result) => {
            if (result.value) {
              window.location = "<?php echo base_url('Bast/manage_bast_event/') ?>";

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

  function Datagudang() {
    var d = $("#kirimm").val();
    if (d.trim() == '') {
      $('[name="kirim"]').val('');


    } else {
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Delivery/Ambildatagudang/") ?>',
        data: 'idGudang=' + d,
        dataType: 'json',

        success: function(hasil) {
          //console.log(hasil);
          $('[name="kirim"]').val(hasil.alamat);





        },
        error: function(hasil) {


        }


      });

    }


  }
</script>