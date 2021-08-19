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


            <div class="card">
              <div class="card-header">
                <h3 class="box-title"><b>Data Quotation Other</b></h3>

                <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
                  <a style="margin-left: 3%" href="<?php echo base_url('Quotation/manage_quotation_other') ?>" class="btn btn-secondary">
                    <font color="white"> Back</font>
                  </a>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12">
                  <div id="notif"></div>
                </div>
                <div class="col-md-12" style="margin: 10px;">
                  <div class="box box-solid">




                    <?php if ($key_quotation == "1") { ?>
                      <div class="form-group" id="qnumber">
                        <label for="pid_event" style="text-align:left;" class="col-sm-3 control-label">&ensp;Status</label>
                        <select readonly style="width: 20%;margin-left: 2%" class="form-control" required="" id="status" name="status" style="width:100%;" value="<?php echo set_value('pic') ?>">

                          <option value="Open"> Open</option>
                          <option value="Reject"> Reject</option>

                          <option value="Final"> Final</option>


                        </select>

                        <?php if (in_array('statusQuatationsother', $user_permission)) : ?>
                          <button style="border: none; border-radius: 5px;margin-left: 5%" for="pid_event" disabled="" style="width: 50%;" class="col-sm-2 control-label btn-primary">
                            <font color="white">Save Changes</font>
                          </button>
                        <?php endif; ?>


                      </div>
                      <div class="form-group" id="qnumber">
                        <label style="margin-left: 15px;" for="cphone">Note</label>
                        <textarea readonly="" style="margin-left: -170px; width:20% " type="text" class="form-control" id="noteother" name="noteother" autocomplete="off"></textarea>
                      </div>
                    <?php  } else { ?>
                      <div class="form-group" id="qnumber">
                        <label for="pid_event" style="text-align:left;" class="col-sm-3 control-label">&ensp;Status</label>
                        <select style="width: 20%;margin-left: 2%" class="form-control" required="" id="status" name="status" style="width:100%;" value="<?php echo set_value('pic') ?>">

                          <option value="Open"> Open</option>
                          <option value="Reject"> Reject</option>

                          <option value="Final"> Final</option>


                        </select>

                        <?php if (in_array('statusQuatationsother', $user_permission)) : ?>
                          <button style="border: none; border-radius: 5px;margin-left: 5%" for="pid_event" onclick="updateStatus();" style="width: 50%;" class="col-sm-2 control-label btn-primary">
                            <font color="white">Save Changes</font>
                          </button>
                        <?php endif; ?>


                      </div>
                      <div class="form-group" id="qnumber">
                        <label style="margin-left: 20px;" for="cphone">Note</label>
                        <textarea style="margin-left: -210px; width:20% " type="text" class="form-control" id="noteother" name="noteother" autocomplete="off"></textarea>
                      </div>

                    <?php  }
                    ?>

                    <hr>



                    <!--   other -->
                    <div class="col-md-10 col-xs-10 pull pull-right">



                      <div class="form-group" id="kanan">
                        <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Note</label>
                        <div class="col-sm-12">
                          <input readonly="" type="text" class="form-control" id="note_desciption" name="note_desciption" autocomplete="off" value="<?php echo set_value('Quatations_number') ?>">
                        </div>
                      </div>
                      <div class="form-group" id="kanan">
                        <label for="ppn" style="text-align:left;" class="col-sm-6 control-label">PPN</label>
                        <div class="col-sm-6">
                          <input type="text" readonly="" class="form-control" readonly="" id="ppn_description" name="ppn_description" autocomplete="off" value="0">

                          <input type="text" readonly="" class="form-control" readonly="" id="ppn_description_hidden" name="ppn_description_hidden" autocomplete="off" value="0" hidden="">
                        </div>

                      </div>
                      <div class="form-group" id="kanan">
                        <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">PPh23</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="pph_description" readonly="" name="pph_description" autocomplete="off" value="0">

                          <input type="text" class="form-control" id="pph_description_hidden" readonly="" name="pph_descriptionhidden" autocomplete="off" value="0" hidden="">
                        </div>

                      </div>
                      <div class="form-group" id="kanan">
                        <label for="total_summary" style="text-align:left;" class="col-sm-6 control-label">Grand Total</label>
                        <div class="col-sm-12">
                          <input type="text" readonly="" class="form-control" id="grand_total_other" readonly="" name="grand_total_other" autocomplete="off" value="0">

                          <input type="text" readonly="" class="form-control" id="grand_total_hidden_other" readonly="" name="grand_total_hidden_other" autocomplete="off" value="0" hidden="">
                        </div>

                      </div>
                      <div class="form-group" id="kanan">
                        <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File Quotation Other</label>
                        <div class="col-sm-12">

                          <?php $type = substr($image, -3); ?>
                          <Button class="button1" onclick="AmbilDataImage('<?= $image ?>','<?= $type ?>');" title="Image" class="btn btn-sm bg-gradient-secondary btn-view-file" data-toggle="modal" data-target=".bd-example-modal-lg" data-file="<?= $image ?>">View File</Button>
                        </div>

                      </div>


                    </div>
                    <div class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">File Quotation Other </h4>
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
                        <label for="Quatations_number_other" style="text-align:left;" class="col-sm-6 control-label">Quotation Number</label>
                        <div class="col-sm-12">
                          <input readonly="" type="text" class="form-control" id="Quatations_number_other" name="Quatations_number_other" autocomplete="off" value="<?= $quotation_number ?>">
                        </div>

                      </div>

                      <div class="form-group" id="qnumber">
                        <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Date Quotation</label>
                        <div class="col-sm-12">
                          <input readonly="" type="text" class="form-control" required="" id="date_quotation" name="date_quotation" autocomplete="off" value="<?php echo set_value('Date_event') ?>">
                        </div>
                        <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>

                      <div class="form-group" id="qnumber">
                        <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Date Expired</label>
                        <div class="col-sm-12">
                          <input readonly="" type="text" class="form-control" required="" id="date_expired_other" name="date_expired_other" autocomplete="off" value="<?php echo set_value('date_expired_other') ?>">
                        </div>
                        <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>





                      <div class="form-group" id="qnumber">

                        <label for="pid_event" style="text-align:left;" class="col-sm-6 control-label">PIC Event</label>
                        <div class="col-sm-12">
                          <select disabled="" class="form-control" required="" id="picEvent" name="picEvent" style="width:99%;" onchange="DataPIC()"> value="<?php echo set_value('picEvent') ?>">
                            <option value="">Select PiC Event</option>
                            <?php foreach ($pic_event as $k) : ?>
                              <option value="<?php echo $k->id_event ?>"><?php echo $k->pic_name . " | " . $k->customer; ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>

                      </div>
                      <div class="form-group" id="qnumber">

                        <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-6 control-label">Customer PIC Event</label>
                        <div class="col-sm-12">
                          <input readonly="" type="text" readonly class="form-control" id="customerEvent" name="customerEvent" autocomplete="off" value="<?php echo set_value('customerEvent') ?>">

                        </div>
                        <?= form_error('customeEvent', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>

                      <div class="form-group" id="qnumber" hidden="">

                        <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-6 control-label">Customer PIC Event</label>
                        <div class="col-sm-12">
                          <input readonly="" type="email" readonly class="form-control" id="id_customerother" name="id_customerother" autocomplete="off" value="<?php echo set_value('id_customerother') ?>">

                        </div>
                        <?= form_error('id_customerother', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group" id="qnumber" hidden="">

                        <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-6 control-label">PIC Event</label>
                        <div class="col-sm-12">
                          <input readonly="" type="email" readonly class="form-control" id="picEvent1" name="picEvent1" autocomplete="off" value="<?php echo set_value('picEvent1') ?>">

                        </div>
                        <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>

                      <div class="form-group" id="qnumber">

                        <label for="email_event" style="text-align:left;" class="col-sm-6 control-label">Email PIC Event </label>
                        <div class="col-sm-12">
                          <input readonly="" type="email" readonly class="form-control" id="emailEvent" name="emailEvent" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                        </div>


                      </div>

                      <div class="form-group" id="qnumber">
                        <label for="pid_other" style="text-align:left;" class="col-sm-6 control-label">PIC PO</label>



                        <div class="col-sm-12">
                          <select disabled="" onchange="DataPICOther();" class="form-control" required="" id="pic_other" name="pic_other" style="width:99%;" onchange="DataPICEvent()"> value="<?php echo set_value('pic_other') ?>">
                            <option value="">Select PiC PO</option>
                            <?php foreach ($pic as $k) : ?>
                              <option value="<?php echo $k->id ?>"><?php echo $k->pic_name . ' | ' . $k->customer ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>

                      </div>


                      <div class="form-group" id="qnumber" hidden="">

                        <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">ppn </label>
                        <div class="col-sm-12">
                          <input readonly="" type="email" readonly class="form-control" id="kppn" name="kppn" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                        </div>


                      </div>

                      <div class="form-group" id="qnumber" hidden="">

                        <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">pph </label>
                        <div class="col-sm-12">
                          <input type="email" readonly class="form-control" id="kpph" name="kpph" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                        </div>


                      </div>
                      <div class="form-group" id="qnumber">

                        <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-6 control-label">Customer</label>
                        <div class="col-sm-12">
                          <input type="email" readonly class="form-control" id="customer_other" name="customer_other" autocomplete="off" value="<?php echo set_value('customer_other') ?>">

                        </div>
                        <?= form_error('customer_other', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>


                      <div class="form-group" id="qnumber">

                        <label for="email_event" style="text-align:left;" class="col-sm-6 control-label">Email PIC PO </label>
                        <div class="col-sm-12">
                          <input readonly="" type="email" readonly class="form-control" id="email_other" name="email_other" autocomplete="off" value="<?php echo set_value('email_other') ?>">
                        </div>


                      </div>
                      <?= form_error('email_event', '<small class="text-danger pl-3">', '</small>') ?>
                      <div class="form-group" id="qnumber" hidden="">

                        <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">PIC Name</label>
                        <div class="col-sm-12">
                          <input readonly="" type="text" readonly class="form-control" id="pic_other1" name="pic_other1" autocomplete="off" value="<?php echo set_value('pic_other1') ?>">

                        </div>
                        <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>



                      <div class="form-group" id="qnumber">
                        <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Tiitle Event</label>
                        <div class="col-sm-12">
                          <input readonly="" type="text" required="" class="form-control" required="" id="title_event_otther" name="title_event_otther" autocomplete="off" value="<?php echo set_value('title_event_otther') ?>">
                        </div>

                      </div>



                      <div class="form-group" id="qnumber">
                        <label for="netto" style="text-align:left;" class="col-sm-6 control-label">Subtotal</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" required="" readonly="" id="sub_total" name="sub_total" autocomplete="off" value="0">
                          <input type="text" class="form-control" readonly="" id="netto_hidden" name="netto_hidden" autocomplete="off" value="0" hidden="">
                        </div>
                      </div>
                      <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>


                      <div class="form-group" id="qnumber">
                        <label id="asflabel" for="Quatations_number" style="text-align:left;" class="col-sm-2 control-label" id>ASF</label>
                        <div class="col-sm-4" id="kananasf">
                          <input readonly="" type="text" class=" col-sm-7 form-control" value="0" id="asf_percen_other" oninput="hitungnetto();" name="asf_percen_other" oninput="hitungasf();" name="asf_percen_other" autocomplete="off">
                          <label for="Quatations_number" style="text-align:left;" class="col-sm-1 control-label">%</label>

                        </div>

                        <div class="col-sm-12">
                          <input type="text" readonly="" class="col-sm-12 form-control" id="asf_other" name="asf_other" autocomplete="off" readonly="" value="0">

                          <input type="text" readonly="" class="form-control" id="asf_other_hidden" name="asf_other_hidden" autocomplete="off" readonly="" value="0" hidden="">
                        </div>

                      </div>
                      <div class="form-group" id="qnumber">
                        <label id="asflabel" for="Quatations_number" style="text-align:left;" class="col-sm-2 control-label" id>Discount</label>
                        <div class="col-sm-4" id="kananasf">
                          <input readonly type="number" step="any" class=" col-sm-7 form-control" placeholder="0" value="0" required="" name="discount_percent_other" id="discount_percent_other" oninput="discount_other_function()" name="discount_percen_other" autocomplete="off">
                          <label for="Quatations_number" style="text-align:left;" class="col-sm-2 control-label">%</label>
                        </div>
                        <div class="col-sm-12">
                          <input type="text" onkeyup="convertToRupiah(this);" readonly="" class="col-sm-12 form-control" id="discount_other" name="discount_other" autocomplete="off" readonly="" value="0" oninput="discount_other_normal()">
                          <!-- <input type="text" readonly="" class="form-control" id="discount_event_hidden" name="discount_event_hidden" autocomplete="off" readonly="" value="0" hidden=""> -->
                        </div>
                      </div>

                      <div class="form-group" id="qnumber">
                        <label for="total" style="text-align:left;" class="col-sm-6 control-label">Netto</label>
                        <div class="col-sm-12">
                          <input type="text" required="" class="form-control" id="total_description" name="total_description" readonly="" autocomplete="off" value="0">

                          <input type="text" class="form-control" id="total_description_hidden" name="total_description_hidden" readonly="" autocomplete="off" value="0" hidden="">
                        </div>

                        <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>



                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <hr>
                    <div class="col-13 table-responsive justify-content">


                      <table class="col-10 table justify-center table-bordered" align="center" style="margin: auto;" border="1" align="center">
                        <thead class="thead-dark">
                          <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: 40%">Description</th>
                            <th style="width: 10%">
                              <center>Quantity</center>
                            </th>
                            <th style="width: 10%">
                              <center>Frequency</center>
                            </th>
                            <th style="width: 20%">Unit Price</th>
                            <th>Amount</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php $no = 0;
                          foreach ($quotation_other_item as $k) :
                            $no++;

                          ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $k->desciption ?></td>
                              <td>
                                <center><?php echo $k->quantity ?></center>
                              </td>
                              <td>
                                <center><?php echo $k->frequency ?></center>
                              </td>
                              <td>IDR <p align="right" style="margin-top: -21px;"><?php echo number_format($k->unitprice, 0, ',', '.') ?></p>
                              </td>
                              <td>IDR <p align="right" style="margin-top: -21px;"><?php echo number_format($k->amount, 0, ',', '.') ?></p>
                              </td>
                            </tr>
                          <?php endforeach ?>


                        </tbody>
                      </table>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>

                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>


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
                    </div>
                    <div class="form-group">
                      <label for="cphone">Note</label>
                      <input type="text" class="form-control" id="noteother" name="noteother" autocomplete="off">
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
          <!-- /.container-fluid -->
    </section>


    <!-- /.content -->
  </div>




  <script type="text/javascript">
    $(document).ready(function() {

      AmbilData();
      elementStatus1();

    });






    function AmbilData() {
      var data = $('#Quatations_number_other').val();
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Quotation/AmbilDataQuotationOther/3") ?>',
        data: 'id=' + data,
        dataType: 'json',
        success: function(hasil) {
          console.log(hasil);


          $('[name="kpph"]').val(hasil[0].karakteristik_pph);
          $('[name="kppn"]').val(hasil[0].karakteristik_ppn);
          // $('#Quatations_number_other').val(hasil[0].quotation_number);
          $('#date_quotation').val(hasil[0].date_quotation);
          $('#title_event_otther').val(hasil[0].tittle_event);
          $('#customer_event').val(hasil[0].customer);
          $('#note_desciption').val(hasil[0].note);

          $('#pic_other').val(hasil[0].id_po);
          $('#date_expired_other').val(hasil[0].date_expired);
          $('#asf_percen_other').val(hasil[0].asfp);
          $('[name="email_other"]').val(hasil[0].pic_email);
          $('[name="customer_other"]').val(hasil[0].customer);
          $('[name="emailEvent"]').val(hasil[0].email_event);
          $('[name="picEvent"]').val(hasil[0].id_event);
          $('#customerEvent').val(hasil[0].customer_event);
          $('#picEvent1').val(hasil[0].pic_event);
          $('#status').val(hasil[0].status);
          $('#discount_percent_other').val(hasil[0].discount_percent);
          $('#discount_other').val(`(${hasil[0].discount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")})`);

          $('#id_customerother').val(hasil[0].id_customer);

          $('#sub_total').val(hasil[0].sub_total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
          $('#asfp').val(hasil[0].asfp);
          $('#asf_other').val(hasil[0].asf.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
          $('#total_description').val(hasil[0].netto.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
          $('#note').val(hasil[0].note);
          $('#ppn_description').val(hasil[0].ppn.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
          $('#pph_description').val(`(${hasil[0].pph23.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")})`);
          $('#grand_total_other').val(hasil[0].grand_total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
          $('#revisi').val(hasil[0].revisi);




        },
        error: function(hasil) {


        }


      });

    }

    function elementStatus1() {
      var quotation_number = $('#Quatations_number_other').val();
      $.ajax({
        type: 'POST',

        url: '<?php echo base_url("Quotation/getStatusother") ?>',
        data: 'quotation_number=' + quotation_number,
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

    function updateStatus() {
      var status = $('[name="status"]').val();
      var quotation_number = $('#Quatations_number_other').val();
      var note = $('#noteother').val();
      $.ajax({
        type: 'POST',
        data: 'status=' + status + '&quotation_number=' + quotation_number + '&note=' + note,
        url: '<?php echo base_url("Quotation/updateStatusother") ?>',
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
              window.location = "<?php echo base_url('Quotation/manage_quotation_other/') ?>";
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






    $("#quotationMainNav").addClass('active');
    $("#manageQuotationotherNav").addClass('active');
    $("#openQuotationNav").addClass('menu-open');
  </script>
  <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js') ?>"></script>