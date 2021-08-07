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

        <h3 class="box-title"><b>Data Delivery</b></h3>

        <div class="card-tools" style="margin-top: -35px;margin-right: 15px">
          <a href="<?php echo base_url('Delivery/manage_delivery_event') ?>" class="btn bg-gradient-secondary">
            <font color="white">Back</font>
          </a>
        </div>

      </div>
      <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12 col-xs-12">



            <div class="box">




              <div class="form-group" id="qnumber">

                <label for="pid_event" style="text-align:left;" class="col-sm-3 control-label">&ensp;Status</label>
                <select style="width: 20%;margin-left: 12%" class="form-control" required="" id="status" name="status" style="width:100%;" value="<?php echo set_value('pic') ?>">

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
              <div class="form-group" id="qnumber">
                <label style="margin-left: 10px;" for="cphone">Note</label>
                <textarea style="margin-left: -99px; width:20% " type="text" class="form-control" id="note" name="note" autocomplete="off"></textarea>
              </div>
              <hr>




              <div class="col-md-5 col-xs-12 pull pull-left">




                <div class="form-group" id="qnumber">
                  <label for="Quatations_number_other" style="text-align:left;" class="col-sm-10 control-label">Quotation Number</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" autocomplete="off" value="<?php echo ($quotation_number) ?>">
                  </div>

                </div>

                <div class="form-group" id="qnumber" hidden="">
                  <label for="Quatations_number_other" style="text-align:left;" class="col-sm-10 control-label">Id Delivery</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" readonly="" class="form-control" id="id_delivery" name="id_delivery" autocomplete="off" value="<?php echo ($id_delivery) ?>">
                  </div>

                </div>



                <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;" class="col-sm-10 control-label">Date Quotation</label>
                  <div class="col-sm-12">
                    <input type="text" readonly="" class="form-control" required="" id="date_quotation" name="date_quotation" autocomplete="off" value="<?php echo set_value('Date_event') ?>">
                  </div>
                  <?= form_error('date_quotation', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;" class="col-sm-10 control-label">Customer</label>
                  <div class="col-sm-12">
                    <input type="text" readonly="" class="form-control" required="" id="customer" name="customer" autocomplete="off" value="<?php echo set_value('customer') ?>">
                  </div>
                  <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                </div>


                <div class="form-group" id="qnumber">

                  <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-10 control-label">Alamat Customer</label>
                  <div class="col-sm-12">
                    <textarea rows="5" readonly class="form-control" id="alamat_customer" name="alamat_customer" autocomplete="off" value="<?php echo set_value('customer_other') ?>"></textarea>

                  </div>
                  <?= form_error('customer_other', '<small class="text-danger pl-3">', '</small>') ?>
                </div>




                <div class="form-group" id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-10 control-label">Title Event</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" readonly="" id="title_event" name="title_event" autocomplete="off">
                    <input type="text" class="form-control" readonly="" id="netto_hidden" name="netto_hidden" autocomplete="off" hidden="">
                  </div>
                </div>
                <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>


                <div class="form-group" id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-10 control-label">Venue Event</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" readonly="" id="venue_event" name="venue_event" autocomplete="off">

                  </div>
                </div>
                <div class="form-group" id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-10 control-label">Date event</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" readonly="" id="date_event" name="date_event" autocomplete="off">

                  </div>
                </div>
                <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>

                <div class="form-group" id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-10 control-label">BAST Number</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" readonly="" id="bast_number" name="bast_number" autocomplete="off">

                  </div>
                </div>

                <div class="form-group" id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-10 control-label">PO Number</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" readonly="" id="po_number" name="po_number" autocomplete="off">

                  </div>
                </div>
                <div class="form-group" id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-10 control-label">Date PO</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" readonly="" id="date_po" name="date_po" autocomplete="off">

                  </div>
                </div>
                <div class="form-group" id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-10 control-label">Total BAST</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" readonly="" id="total_bast" name="total_bast" autocomplete="off">

                  </div>
                </div>
                <?= form_error('po_number', '<small class="text-danger pl-3">', '</small>') ?>





              </div>
              <br>
              <br>







              <br>
              <br>
              <hr style="height: 1px; border-width: 1px; background-color:#696969;">
              <div class="col-md-5 col-xs-12 pull pull-left">




                <div class="form-group" id="qnumber">
                  <label for="Quatations_number_other" style="text-align:left;" class="col-sm-10 control-label">Delivery Order Number</label>
                  <div class="col-sm-12">
                    <input type="text" readonly="" class="form-control" id="delivery_order" name="delivery_order" autocomplete="off">
                  </div>

                </div>
                <div class="form-group" id="qnumber">
                  <label for="Quatations_number_other" style="text-align:left;" class="col-sm-10 control-label">Pengirim</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" class="form-control" id="pengirim" name="pengirim" autocomplete="off" value="<?php echo set_value('delivery_order') ?>">
                  </div>

                </div>


                <div class="form-group" id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-10 control-label">Tanggal Pengiriman</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" class="form-control" required="" id="tanggal_pengiriman" name="tanggal_pengiriman" autocomplete="off">

                  </div>
                </div>
                <?= form_error('tanggal_pengiriman', '<small class="text-danger pl-3">', '</small>') ?>

                <div class="form-group" id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-10 control-label">Nomor Kendaraan</label>

                  <div class="col-sm-12">
                    <input readonly="" type="text" class="form-control" required="" id="platnomor" name="platnomor" autocomplete="off">

                  </div>
                </div>
                <?= form_error('tanggal_pengiriman', '<small class="text-danger pl-3">', '</small>') ?>

                <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;" class="col-sm-10 control-label">Gudang</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" class="form-control" required="" id="gudang" name="gudang" autocomplete="off">
                  </div>
                  <?= form_error('gudang', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;" class="col-sm-10 control-label">Tagihan Ke</label>
                  <div class="col-sm-12">
                    <textarea readonly="" rows="5" class="form-control" required="" id="tagihan" name="tagihan" autocomplete="off" value="<?php echo set_value('date_expired_other') ?>"></textarea>
                  </div>
                  <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                </div>


                <div class="form-group" id="qnumber">

                  <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-10 control-label">Kirim Ke</label>
                  <div class="col-sm-12">
                    <textarea readonly="" rows="5" class="form-control" id="kirim" name="kirim" autocomplete="off" value="<?php echo set_value('kirim') ?>"></textarea>

                  </div>
                  <?= form_error('kirim', '<small class="text-danger pl-3">', '</small>') ?>
                </div>





              </div>


              <br>
              <br>
              <div class="col-13 table-responsive justify-content">



              </div>
              <br>
              <br>







              <!-- Content form -->

            </div>
            <!-- /.box -->
          </div>
          <!-- col-md-12 -->
        </div>
      </div>

      <!-- /.row -->
    </div>
    <div class="modal fade" id="statusUpdate" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog" role="document" data-keyboard="false">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Udpdate Status </h4>
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

  </section>

  <!-- /.content -->
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    elementStatus1();

    DataQuotation($('#id_delivery').val());






  });



  function DataQuotation(id) {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Delivery/AmbilDataDelivery/") ?>',
      data: 'delivery_number=' + id,
      dataType: 'json',



      success: function(hasil) {
        console.log(hasil);
        $('[name="Quatations_number"]').val(hasil[0].quotation_number);
        $('[name="date_quotation"]').val(hasil[0].date_quotation);
        $('[name="customer"]').val(hasil[0].customer);

        $('[name="title_event"]').val(hasil[0].tittle_event);
        $('[name="delivery_order"]').val(hasil[0].Delivery_number);

        $('[name="alamat_customer"]').val(hasil[0].address);

        $('[name="po_number"]').val(hasil[0].po_number);
        $('[name="platnomor"]').val(hasil[0].platnomor);

        $('[name="kirim"]').val(hasil[0].kirim);

        $('[name="tagihan"]').val(hasil[0].tagihan);
        $('[name="gudang"]').val(hasil[0].gudang);

        $('[name="tanggal_pengiriman"]').val(hasil[0].date_pengiriman);
        $('[name="status"]').val(hasil[0].status);
        $('[name="pengirim"]').val(hasil[0].pengirim);

        $('[name="venue_event"]').val(hasil[0].venue_event);
        $('[name="date_po"]').val(hasil[0].date_po);
        $('[name="date_event"]').val(hasil[0].date_event);


        $('[name="tagihan"]').val(hasil[0].address);
        $('[name="bast_number"]').val(hasil[0].bast_number);
        $('[name="total_bast"]').val(hasil[0].totalBast.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));


      },
      error: function(hasil) {
        console.log(hasil);


      }


    });

  }






  function elementStatus1() {
    var delivery_order = $('#Quatations_number').val();
    $.ajax({
      type: 'POST',

      url: '<?php echo base_url("Delivery/getStatus") ?>',
      data: 'delivery_order=' + delivery_order,
      dataType: 'json',
      success: function(data) {
        var baris = '<input disabled="" style="width: 100%%; margin-left: 15px;" type="text" name="status" id="status" value="' + data[0].status + '">';

        $("#elementStatus").html(baris);
        console.log(data);

      },
      error: function(data) {
        console.log('ERROR');




      }

    });
  }

  function getStatus() {

    $('[name="statusUpdate"]').val($('[name="status"]').val());

  }



  function updateStatus() {
    var status = $('[name="status"]').val();
    var delivery_order = $('#id_delivery').val();
    var note = $('#note').val();
    $.ajax({
      type: 'POST',
      data: 'status=' + status + '&delivery_order=' + delivery_order + '&note=' + note,
      url: '<?php echo base_url("Delivery/updateStatus") ?>',
      dataType: 'json',
      success: function(hasil) {
        console.log(status);
        if (hasil.pesan == '1') {

          Swal.fire({
            title: "success!",
            text: "Status berhasil diubah.",
            icon: "success",
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false


          });
          $('#statusUpdate').hide();
          $('.modal-backdrop').hide();
          elementStatus1();
          setTimeout(function() {
            window.location = "<?php echo base_url('Delivery/manage_delivery_event/') ?>";
          }, 2500);

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


  $("#deliveryMainNav").addClass('active');

  $("#openDeliveryNav").addClass('menu-open');
</script>