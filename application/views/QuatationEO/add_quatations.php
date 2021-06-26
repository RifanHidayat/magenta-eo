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
    <div class="container-fluid">

      <!-- ./row -->

      <!-- ./row -->

      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div id="notif"></div>
          <div class="card card-primary card-tabs">

            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <?php if (in_array('createQuatations', $user_permission)) : ?>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><b>
                        <h4>Quotation Event</h4>
                      </b></a>
                  </li>
                <?php endif; ?>
                <?php if (in_array('createQuatationsother', $user_permission)) : ?>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false"><b>
                        <h4>Quotation Other</h4>
                      </b></a>
                  </li>
                <?php endif; ?>

              </ul>
            </div>

            <div class="card-body">

              <div class="tab-content" id="custom-tabs-one-tabContent">

                <?php if (in_array('createQuatations', $user_permission)) : ?>
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <div class="box">
                      <div class="card-header">
                        <h3 class="box-title"><b>Add Quotation Event</b></h3>

                        <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
                          <a href="<?php echo base_url('Quotation/manage_quotation') ?>" class="btn btn-secondary">
                            <font color="white"> Back</font>
                          </a>

                        </div>
                      </div>

                      <form action="<?php echo base_url('Quotation/aksi_add_quotation') ?>" method="post" id="SimpanData" name="formidevent" class="form-horizontal" enctype="multipart/form-data">
                        <br><br>
                        <div class="col-md-10 col-xs-10 pull pull-right">
                          <div class="form-group" id="kanan">
                            <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label" id="Comissionable_cost">Commissionable Cost</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control " readonly="" id="Comissionable_cost" name="Comissionable_cost" readonly="" autocomplete="off" value="0">

                              <input type="text" class="form-control" readonly="" id="Comissionable_costhidden" name="Comissionable_costhidden" readonly="" autocomplete="off" value="0" hidden="">
                            </div>
                          </div>
                          <div class="form-group" id="kanan">
                            <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label" id="Comissionable_cost">Non-Fee Cost</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" readonly="" id="non_fee" name="non_fee" readonly="" autocomplete="off" value="0">

                              <input type="text" class="form-control" readonly="" id="non_feehidden" name="non_feehidden" readonly="" autocomplete="off" value="0" hidden="">
                            </div>
                          </div>
                          <div class="form-group" id="kanan">
                            <label id="asflabel" for="Quatations_number" style="text-align:left;" class="col-sm-2 control-label" id>ASF</label>
                            <div class="col-sm-4" id="kananasf">
                              <input type="number" step="any" class=" col-sm-7 form-control" placeholder="0" value="0" required="" name="asf_percen" id="asf_percen" oninput="hitungasf();" name="asf_percen" autocomplete="off">
                              <label for="Quatations_number" style="text-align:left;" class="col-sm-1 control-label">%</label>

                            </div>

                            <div class="col-sm-12">
                              <input type="text" readonly="" class="col-sm-12 form-control" id="asf" name="asf" autocomplete="off" readonly="" value="0">

                              <input type="text" readonly="" class="form-control" id="asf_hidden" name="asf_hidden" autocomplete="off" readonly="" value="0" hidden="">
                            </div>

                          </div>
                          <div class="form-group" id="kanan">
                            <label for="total_summary" style="text-align:left;" class="col-sm-6 control-label">Sub Total</label>
                            <div class="col-sm-12">
                              <input type="text" readonly="" class="form-control" id="total_summary" readonly="" name="total_summary" autocomplete="off" value="0">

                              <input type="text" readonly="" class="form-control" id="total_summaryhidden" readonly="" name="total_summaryhidden" autocomplete="off" value="0" hidden="">
                            </div>

                          </div>
                          <div class="form-group" id="kanan">
                            <label id="asflabel" for="Quatations_number" style="text-align:left;" class="col-sm-2 control-label" id>Discount</label>
                            <div class="col-sm-4" id="kananasf">
                              <input type="number" class=" col-sm-7 form-control" placeholder="0" value="0" required="" name="discount_percent_event" step="any" id="discount_percent_event" oninput="discount_event_function()" name="discount_percen" autocomplete="off">
                              <label for="Quatations_number" style="text-align:left;" class="col-sm-1 control-label">%</label>

                            </div>

                            <div class="col-sm-12">
                              <input type="text" onkeyup="convertToRupiah(this);" class="col-sm-12 form-control" id="discount_event" name="discount_event" autocomplete="off" value="0" oninput="discount_event_normal()">
                              <!-- <input type="text" readonly="" class="form-control" id="discount_event_hidden" name="discount_event_hidden" autocomplete="off" readonly="" value="0" hidden=""> -->
                            </div>

                          </div>

                          <div class="form-group" id="kanan">
                            <label for="netto" style="text-align:left;" class="col-sm-6 control-label">Netto</label>
                            <div class="col-sm-12">
                              <input type="text" readonly="" class="form-control" id="netto_event" readonly="" name="netto_event" autocomplete="off" value="0">

                              <input type="text" readonly="" class="form-control" id="nettohidden" readonly="" name="nettohidden" autocomplete="off" value="0" hidden="">
                            </div>

                          </div>

                          <div class="form-group" id="kanan">
                            <label for="ppn" style="text-align:left;" class="col-sm-6 control-label">PPh</label>
                            <div class="col-sm-6">
                              <input type="text" readonly="" class="form-control" id="pph" name="pph" readonly="" autocomplete="off" value="0">
                              <input type="text" readonly="" class="form-control" id="pph_hidden" name="pph_hidden" readonly="" autocomplete="off" value="0" hidden="">
                            </div>
                          </div>


                          <div class="form-group" id="kanan">
                            <label for="pph" style="text-align:left;" class="col-sm-6 control-label">PPN</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="ppn" name="ppn" readonly="" autocomplete="off" value="0">
                              <input style="margin-left: 100px;" type="Number" class="form-control" id="ppn_hidden" name="ppn_hidden" readonly="" autocomplete="off" value="0" hidden="">
                            </div>


                          </div>
                          <div class="form-group" id="kanan">
                            <label for="total_summary" style="text-align:left;" class="col-sm-6 control-label">Grand Total</label>
                            <div class="col-sm-12">
                              <input type="text" readonly="" class="form-control" id="grand_total" readonly="" name="grand_total" autocomplete="off" value="0">

                              <input type="text" readonly="" class="form-control" id="grand_total_hidden" readonly="" name="grand_total_hidden" autocomplete="off" value="0" hidden="">
                            </div>

                          </div>

                          <div class="form-group" id="kanan">
                            <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File quotation event</label>
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
                            <label for="Quatations_number" style="text-align:left;" class="col-sm-7 control-label">Quotation Number</label>
                            <div class="col-sm-12">
                              <input type="text" readonly="" class="form-control" id="Quatations_number_event" name="Quatations_number_event" autocomplete="off" value="<?php echo set_value('Quatations_number_event') ?>">
                            </div>
                          </div>
                          <?= form_error('Quatations_number_event', '<small class="text-danger pl-3">', '</small>') ?>
                          <div class="form-group" id="qnumber">
                            <label for="Date_quotation" style="text-align:left;" class="col-sm-7 control-label">Date Quotation</label>
                            <div class="col-sm-12">
                              <input onkeypress="return false;" onchange="expired()" oninput="expired()" placeholder="yyyy/mm/dd" type="text" required="" class="form-control readonly" id="date_quotation_event" name="date_quotation_event" autocomplete="off" value="<?php echo set_value('Date_quotation') ?>">
                            </div>
                          </div>

                          <?= form_error('date_quotation', '<small class="text-danger pl-3">', '</small>') ?>
                          <div class="form-group" id="qnumber">
                            <label for="date_expired_event" style="text-align:left;" class="col-sm-7 control-label">Date Expired</label>
                            <div class="col-sm-12">
                              <input onkeypress="return false;" placeholder="yyyy/mm/dd" type="text" class="form-control readonly" required="" id="date_expired_event" name="date_expired_event" autocomplete="off" value="<?php echo set_value('date_expired_event') ?>">
                            </div>
                            <?= form_error('date_expired', '<small class="text-danger pl-3">', '</small>') ?>
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

                            <label for="pid_event" style="text-align:left;" class="col-sm-7 control-label">PIC Event</label>
                            <div class="col-sm-12">
                              <select class="form-control" required="" id="picEvent" name="picEvent" style="width:99%;" onchange="DataPIC()"> value="<?php echo set_value('picEvent') ?>">
                                <option value="">Select PiC Event</option>
                                <?php foreach ($pic_event as $k) : ?>
                                  <option value="<?php echo $k->id_event ?>"><?php echo $k->pic_name . " | " . $k->customer; ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>

                          </div>
                          <div class="form-group" id="qnumber">

                            <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">Customer PIC Event</label>
                            <div class="col-sm-12">
                              <input type="text" readonly class="form-control" id="customerEvent" name="customerEvent" autocomplete="off" value="<?php echo set_value('customerEvent') ?>">

                            </div>
                            <?= form_error('customeEvent', '<small class="text-danger pl-3">', '</small>') ?>
                          </div>
                          <div class="form-group" id="qnumber" hidden="">

                            <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">Customer PIC Event</label>
                            <div class="col-sm-12">
                              <input type="text" readonly class="form-control" id="id_customer" name="id_customer" autocomplete="off" value="<?php echo set_value('id_customer') ?>">

                            </div>
                            <?= form_error('id_customer', '<small class="text-danger pl-3">', '</small>') ?>
                          </div>
                          <div class="form-group" id="qnumber" hidden="">

                            <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">PIC Event</label>
                            <div class="col-sm-12">
                              <input type="email" readonly class="form-control" id="picEvent1" name="picEvent1" autocomplete="off" value="<?php echo set_value('picEvent1') ?>">

                            </div>
                            <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                          </div>

                          <div class="form-group" id="qnumber">

                            <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">Email PIC Event </label>
                            <div class="col-sm-12">
                              <input type="email" readonly class="form-control" id="emailEvent" name="emailEvent" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                            </div>


                          </div>

                          <div class="form-group" id="qnumber">

                            <label for="pid_event" style="text-align:left;" class="col-sm-7 control-label">PIC PO</label>
                            <div class="col-sm-12">
                              <select class="form-control" required="" id="pic_event" name="pic_event" style="width:99%;" onchange="DataPICEvent()" value="<?php echo set_value('pic') ?>">
                                <option value="">Select PiC PO</option>
                                <?php foreach ($pic as $k) : ?>
                                  <option value="<?php echo $k->id ?>"><?php echo $k->pic_name . " | " . $k->customer; ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>

                          </div>
                          <div class="form-group" id="qnumber">

                            <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">Customer PIC PO</label>
                            <div class="col-sm-12">
                              <input type="email" readonly class="form-control" id="customer_event" name="customer_event" autocomplete="off" value="<?php echo set_value('customer_event') ?>">

                            </div>
                            <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                          </div>
                          <div class="form-group" id="qnumber" hidden="">

                            <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">PIC Name</label>
                            <div class="col-sm-12">
                              <input type="email" readonly class="form-control" id="pic_event1" name="pic_event1" autocomplete="off" value="<?php echo set_value('pic_event1') ?>">

                            </div>
                            <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                          </div>

                          <div class="form-group" id="qnumber">

                            <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">Email PIC PO </label>
                            <div class="col-sm-12">
                              <input type="email" readonly class="form-control" id="email_event" name="email_event" autocomplete="off" value="<?php echo set_value('email_event') ?>">
                            </div>


                          </div>
                          <?= form_error('email_event', '<small class="text-danger pl-3">', '</small>') ?>


                          <div class="form-group" id="qnumber">
                            <label for="title_event" style="text-align:left;" class="col-sm-7 control-label">Title Event</label>
                            <div class="col-sm-12">
                              <input type="text" required="" class="form-control" id="title_event" name="title_event" autocomplete="off" value="<?php echo set_value('title_event') ?>">
                            </div>
                          </div>
                          <?= form_error('title_event', '<small class="text-danger pl-10">', '</small>') ?>

                          <div class="form-group" id="qnumber">
                            <label for="venue_event" style="text-align:left;" class="col-sm-7 control-label">Venue Event</label>
                            <div class="col-sm-12">
                              <input type="text" required="" class="form-control venue_event" id="venue_event" name="venue_event" autocomplete="off" value="<?php echo set_value('vanue_event') ?>">
                            </div>

                          </div>
                          <?= form_error('venue_event', '<small class="text-danger pl-3">', '</small>') ?>

                          <div class="form-group" id="qnumber">
                            <label for="Date_event" style="text-align:left;" class="col-sm-7 control-label">Date event</label>
                            <div class="col-sm-12">
                              <input type="text" required="" class="form-control" id="date_event" name="date_event" autocomplete="off" value="<?php echo set_value('date_event') ?>">
                            </div>


                          </div>
                          <?= form_error('date_event', '<small class="text-danger pl-3">', '</small>') ?>


                          <br>
                          <br>
                          <br>


                        </div>

                        <h3>Non-Fee Cost</h3>
                        <?php foreach ($item_non as $k) : ?>
                          <br>
                          <input style="width: 20%" type="button" class="btn btn-info btn-color-custom" value="<?php echo $k->name ?>" id="btn<?php echo (str_replace(' ', '', $k->name)) ?>">
                          <br>


                          <table class="table" border="0" id="table<?php echo (str_replace(' ', '', $k->name)) ?>">
                            <thead>
                              <tr>

                                <th style="width: 30%;"><a style="width: 5" class="btn btn-sm bg-gradient-secondary" data-toggle="tooltip" title="Hapus Baris" id="hapusall<?php echo (str_replace(' ', '', $k->name)) ?>">
                                    <font color="white"> <i class="fa fa-times">
                                        <font color="white">
                                      </i></font>
                                  </a></th>
                                <th style="width: 5%;">Quantity</th>
                                <th style="width: 5%;">Frequency</th>
                                <th style="width: 20%;">Rate</th>
                                <th style="width: 20%;">Sub Total</th>

                                <th style="width: 2%"><button style="width: 5" class="btn btn-sm bg-gradient-secondary" id="tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><i class="fa fa-plus"></i> </button></th>
                              </tr>
                            </thead>
                            <tbody></tbody>

                            <tfoot>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>



                                <th style="text-align:left;">Sub Total</th>
                                <th colspan="1">

                                  <input id="grandtotalnon<?php echo (str_replace(' ', '', $k->name)) ?>" readonly="" style="width:100%" type="text" class="form-control" required=""> <input id="grandtotalnonhidden<?php echo (str_replace(' ', '', $k->name)) ?>" readonly="" style="width:100%" type="text" class="form-control" required="" hidden="">
                                </th>
                              </tr>
                            </tfoot>
                          </table>
                        <?php endforeach ?>
                        <br>
                        <hr>

                        <h3>Commissionable cost</h3>
                        <?php foreach ($item as $k) : ?>
                          <br>
                          <input style="width: 20%" type="button" class="btn btn-info btn-color-custom" value="<?php echo $k->name ?>" id="btn<?php echo (str_replace(' ', '', $k->name)) ?>">
                          <br>


                          <table class="table" border="0" id="table<?php echo (str_replace(' ', '', $k->name)) ?>">
                            <thead>
                              <tr>

                                <th style="width: 30%;"><a style="width: 5" class="btn btn-sm bg-gradient-secondary" data-toggle="tooltip" title="Hapus Baris" id="hapusall<?php echo (str_replace(' ', '', $k->name)) ?>">
                                    <font color="white"> <i class="fa fa-times">
                                        <font color="white">
                                      </i></font>
                                  </a></th>
                                <th style="width: 5%">Quantity</th>
                                <th style="width: 5%">Frequency</th>
                                <th style="width: 20%;">Rate</th>
                                <th style="width: 20%;">Sub Total</th>

                                <th style="width: 2%"><button style="width: 5" class="btn btn-sm bg-gradient-secondary" id="tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><i class="fa fa-plus"></i> </button></th>
                              </tr>
                            </thead>
                            <tbody></tbody>

                            <tfoot>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th style="text-align:left; width: 15%;">Grand Total</th>
                                <th colspan="1">
                                  <input id="grandtotalcos<?php echo (str_replace(' ', '', $k->name)); ?>" readonly="" style="width:100%" type="text" class="form-control" required=""> <input hidden="" id="grandtotalcoshidden<?php echo (str_replace(' ', '', $k->name)) ?>" readonly="" style="width:100%" type="text" class="form-control" required="">
                                </th>
                              </tr>
                            </tfoot>
                          </table>
                        <?php endforeach ?>
                        <br>
                        <hr>
                        <div class="form-group text-left">
                          <!--  <button  class="btn btn-primary"><i id="saveQuotatione"></i> Create Quotation Event</button> -->
                          <button type="submit" class="btn btn-primary btnSave" type="button">
                            <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                            Create Quotation Event
                          </button>
                        </div>
                    </div>
                    </form>
                  </div>
                <?php endif; ?>
                <!-- ------------------------------------------------------------------------------------------------------------------------
                                                          Other
----------------------------------------------------------------------------------------------------------------------- -->
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="rcustom-tabs-one-messages-tab">
                  <div class="card-header">
                    <h3 class="box-title"><b>Add Quotation Other</b></h3>

                    <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
                      <a href="<?php echo base_url('Quotation/manage_quotation_other') ?>" class="btn btn-secondary">
                        <font color="white"> Back</font>
                      </a>

                    </div>
                  </div>
                  <br>
                  <form action="<?php echo base_url('Quotation/aksi_add_quotation_other') ?>" method="post" id="SimpanDataOther" name="formid" class="form-horizontal" enctype="multipart/form-data">
                    <!--   other -->
                    <div class="col-md-10 col-xs-10 pull pull-right">
                      <div class="form-group" id="kanan">
                        <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Note</label>
                        <div class="col-sm-12">
                          <input required="" type="text" class="form-control" id="note_desciption" name="note_desciption" autocomplete="off" value="<?php echo set_value('Quatations_number') ?>">
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
                        <label for="pph_description" style="text-align:left;" class="col-sm-6 control-label">PPh 23</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" id="pph_description" readonly="" name="pph_description" autocomplete="off" value="0">

                          <input type="text" hidden="" class="form-control" id="pph_description_hidden" readonly="" name="pph_descriptionhidden" autocomplete="off" value="0">
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
                        <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File quotation other</label>
                        <div class="col-sm-12">
                          <input accept=".jpg,.png,.jpeg,.pdf" id="imagenesother" onchange="ValidateSizeother(this)" name="imagenesother" type="file" </div>

                        </div>
                        <?php
                        $directory = "assets/imageother/";
                        $images = glob($directory . "*.*");
                        ?>
                      </div>
                      <div class="col-md-6 col-xs-12 pull pull-left">

                        <div class="form-group" id="qnumber">
                          <label for="Quatations_number_other" style="text-align:left;" class="col-sm-9 control-label">Quotation Number</label>
                          <div class="col-sm-12">
                            <input readonly="" type="text" class="form-control" id="Quatations_number_other" name="Quatations_number_other" autocomplete="off" value="<?php echo set_value('Quatations_number_other') ?>">
                          </div>
                        </div>
                        <div class="form-group" id="qnumber">
                          <label for="Date_event" style="text-align:left;" class="col-sm-9 control-label">Date Quotation</label>
                          <div class="col-sm-12">
                            <input onkeypress="return false;" type="text" placeholder="yyyy/mm/dd" oninput="expiredOther()" onchange="expiredOther()" class="form-control" required="" id="date_quotation" name="date_quotation" autocomplete="off" value="<?php echo set_value('Date_event') ?>">
                          </div>
                          <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group" id="qnumber">
                          <label for="Date_event" style="text-align:left;" class="col-sm-9 control-label">Date Expired</label>
                          <div class="col-sm-12">
                            <input onkeypress="return false;" type="text" placeholder="yyyy/mm/dd" class="form-control" required="" id="date_expired_other" name="date_expired_other" autocomplete="off" value="<?php echo set_value('date_expired_other') ?>">
                          </div>
                          <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group" id="qnumber">

                          <label for="pid_event" style="text-align:left;" class="col-sm-9 control-label">PIC Event</label>
                          <div class="col-sm-12">
                            <select class="form-control" required="" id="pic" name="pic" style="width:99%;" onchange="DataPICEventOther()" value="<?php echo set_value('pic') ?>">
                              <option value="">Select PiC Event</option>
                              <?php foreach ($pic_event as $k) : ?>
                                <option value="<?php echo $k->id_event ?>"><?php echo $k->pic_name . " | " . $k->customer; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group" id="qnumber">
                          <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-9 control-label">Customer PIC Event</label>
                          <div class="col-sm-12">
                            <input type="email" readonly class="form-control" id="customerEventOther" name="customerEventOther" autocomplete="off" value="<?php echo set_value('customerEventOther') ?>">
                          </div>
                          <?= form_error('customeEventOther', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group" id="qnumber" hidden="">
                          <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-9 control-label">Customer PIC Event</label>
                          <div class="col-sm-12">
                            <input type="email" readonly class="form-control" id="id_customerother" name="id_customerother" autocomplete="off" value="<?php echo set_value('id_customerother') ?>">
                          </div>
                          <?= form_error('id_customerother', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group" id="qnumber" hidden="">
                          <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-9 control-label">PIC Event</label>
                          <div class="col-sm-12">
                            <input type="email" readonly class="form-control" id="picEventOther1" name="picEventOther1" autocomplete="off" value="<?php echo set_value('picEventOther1') ?>">
                          </div>
                          <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group" id="qnumber">
                          <label for="email_event" style="text-align:left;" class="col-sm-9 control-label">Email PIC Event </label>
                          <div class="col-sm-12">
                            <input type="email" readonly class="form-control" id="emailEventOther" name="emailEventOther" autocomplete="off" value="<?php echo set_value('emailEventOther') ?>">
                          </div>
                        </div>
                        <div class="form-group" id="qnumber">
                          <label for="pid_other" style="text-align:left;" class="col-sm-9 control-label">PIC PO</label>
                          <div class="col-sm-12">
                            <select class="form-control" required="" id="pic_other" name="pic_other" style="width:99%;" onchange="DataPICOther()" value="<?php echo set_value('pic_other') ?>">
                              <option value="">Select PiC PO</option>
                              <?php foreach ($pic as $k) : ?>
                                <option value="<?php echo $k->id ?>"><?php echo $k->pic_name . " | " . $k->customer; ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group" id="qnumber" hidden="">
                          <label for="email_event" style="text-align:left;" class="col-sm-9 control-label">ppn </label>
                          <div class="col-sm-12">
                            <input type="email" readonly class="form-control" id="kppnother" name="kppnother" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                          </div>
                        </div>
                        <div class="form-group" id="qnumber" hidden="">
                          <label for="email_event" style="text-align:left;" class="col-sm-9 control-label">pph </label>
                          <div class="col-sm-12">
                            <input type="email" readonly class="form-control" id="kpphother" name="kpphother" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                          </div>
                        </div>
                        <div class="form-group" id="qnumber">

                          <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-9 control-label">Customer</label>
                          <div class="col-sm-12">
                            <input type="email" readonly class="form-control" id="customerOther" name="customerOther" autocomplete="off" value="<?php echo set_value('customerOther') ?>">

                          </div>
                          <?= form_error('customer_other', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group" id="qnumber" hidden="">

                          <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-9 control-label">PIC Name</label>
                          <div class="col-sm-12">
                            <input type="text" readonly class="form-control" id="picOther1" name="picOther1" autocomplete="off" value="<?php echo set_value('picOther1') ?>">

                          </div>
                          <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>



                        <div class="form-group" id="qnumber">

                          <label for="email_event" style="text-align:left;" class="col-sm-9 control-label">Email PIC PO </label>
                          <div class="col-sm-12">
                            <input type="email" readonly class="form-control" id="emailOther" name="emailOther" autocomplete="off" value="<?php echo set_value('emaiEventOther') ?>">
                          </div>


                        </div>
                        <?= form_error('email_event', '<small class="text-danger pl-3">', '</small>') ?>



                        <div class="form-group" id="qnumber">
                          <label for="Quatations_number" style="text-align:left;" class="col-sm-9 control-label">Tiitle Event</label>
                          <div class="col-sm-12">
                            <input type="text" required="" class="form-control" required="" id="title_event_otther" name="title_event_otther" autocomplete="off" value="<?php echo set_value('title_event_otther') ?>">
                          </div>

                        </div>

                        <div class="form-group" id="qnumber">
                          <label for="netto" style="text-align:left;" class="col-sm-9 control-label">Sub total</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" required="" readonly="" id="netto" name="netto" autocomplete="off" value="0">
                            <input type="text" class="form-control" readonly="" id="netto_hidden" name="netto_hidden" autocomplete="off" value="0" hidden="">
                          </div>

                        </div>

                        <div class="form-group" id="qnumber">
                          <label id="asflabel" for="Quatations_number" style="text-align:left;" class="col-sm-4 control-label" id>ASF</label>
                          <div class="col-sm-5" id="kananasf">
                            <input type="number" step="any" class=" col-sm-8 form-control" placeholder="0" value="0" id="asf_percen_other" oninput="hitungnetto();" name="asf_percen_other" autocomplete="off">
                            <label for="Quatations_number" style="text-align:left;" class="col-sm-8  control-label">%</label>

                          </div>

                          <div class="col-sm-12">
                            <input type="text" readonly="" class="col-sm-15 form-control" id="asf_other" name="asf_other" autocomplete="off" readonly="" value="0">

                            <input type="text" readonly="" class="form-control" id="asf_other_hidden" name="asf_other_hidden" autocomplete="off" readonly="" value="0" hidden="">
                          </div>

                        </div>

                        <div class="form-group" id="qnumber">
                          <label id="asflabel" for="Quatations_number" style="text-align:left;" class="col-sm-4 control-label" id>Discount</label>
                          <div class="col-sm-5" id="kananasf">
                            <input type="number" step="any" class=" col-sm-8 form-control" placeholder="0" value="0" required="" name="discount_percent_other" id="discount_percent_other" oninput="discount_other_function()" name="discount_percen_other" autocomplete="off">
                            <label for="Quatations_number" style="text-align:left;" class="col-sm-2 control-label">%</label>
                          </div>
                          <div class="col-sm-12">
                            <input type="text" onkeyup="convertToRupiah(this);" class="col-sm-15 form-control" id="discount_other" name="discount_other" autocomplete="off" value="0" oninput="discount_other_normal()">
                            <!-- <input type="text" readonly="" class="form-control" id="discount_event_hidden" name="discount_event_hidden" autocomplete="off" readonly="" value="0" hidden=""> -->
                          </div>
                        </div>
                        <div class="form-group" id="qnumber">
                          <label for="netto" style="text-align:left;" class="col-sm-9 control-label">Netto</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" required="" readonly="" id="netto_other" name="netto_other" autocomplete="off" value="0">
                            <input type="text" class="form-control" readonly="" id="netto_hidden" name="netto_hidden" autocomplete="off" value="0" hidden="">
                          </div>
                        </div>
                        <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <hr>
                    <h3>Description</h3>
                    <br><input style="width: 20%" type="button" class="btn btn-info btn-color-custom" value="Description" id="description">
                    <br>
                    <br>
                    <table class="table" border="0" id="tableLoopDescription">
                      <thead>
                        <tr>
                          <th style="width: 1%"><a style="width: 5" class="btn btn-sm bg-gradient-secondary" data-toggle="tooltip" title="Hapus Baris" id="hapusdeskription">
                              <font color="white"> <i class="fa fa-times">
                                  <font color="white">
                                </i></font>
                            </a></th>
                          <th style="width: 50%;height:5%">Description</th>
                          <th style="width: 5%">Quantity</th>
                          <th style="width: 5%">Frequency</th>
                          <th style="width: 20%">Unit Price</th>
                          <th style="width: 25%"> Amount</th>
                          <th><button style="width: 5" class="btn btn-sm bg-gradient-secondary" id="BarisBaruDescription"><i class="fa fa-plus"></i> </button></th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>

                          <th style="text-align:left;">Grand Total</th>
                          <th colspan="2">
                            <input id="grandtotaldescription" readonly="" style="width:80%" type="text" class="form-control" required=""> <input id="grandtotaldescriptionhidden" readonly="" style="width:100%" type="text" class="form-control" required="" hidden="">
                          </th>
                        </tr>
                      </tfoot>
                    </table>
                    <div class="form-group text-left">
                      <!--  <button type="submit" class="btn btn-primary"><i ></i> Create Quotation Other</button> -->
                      <button type="submit" class="btn btn-primary btnSaveOther" type="button">
                        <span class="spinner-border spinner-border-sm loadingIndikdatorOther" role="status" aria-hidden="true"></span>
                        Create Quotation Other
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
</div>
<!-- /.row -->
</div>
<!-- /.card -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<script src="<?php echo base_url('assets/lte/tiny/tinymce.min.js') ?>" referrerpolicy="origin" referrerpolicy="origin"></script>

<script type="text/javascript">
  function showIndikatorForevent() {
    $('.btnSave').attr('disabled', 'disabled');
    $('.loadingIndikdator').show();
  }

  function hiddenIndikatorForevent() {
    $('.btnSave').removeAttr('disabled');
    $('.loadingIndikdator').hide();

  }

  function showIndikatorForother() {
    $('.btnSaveOther').attr('disabled', 'disabled');
    $('.loadingIndikdatorOther').show();

  }

  function hiddenIndikatorForother() {
    $('.btnSaveOther').removeAttr('disabled');
    $('.loadingIndikdatorOther').hide();

  }
  $(document).ready(function() {
    hiddenIndikatorForother();
    hiddenIndikatorForevent();
    expired();
    expiredOther();
    $('#pic_event').select2();
    $('#picEvent').select2();
    $('#pic').select2();
    $('#pic_other').select2();
  });

  $(".select_group").select2();
  var value = 0;
  $(document).ready(function() {


    //function comminable 
    <?php foreach ($item as $k) : ?>
      //var tablehide="#table<?php echo $k->name; ?>";
      $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").hide();

      //tambah baris
      $("#tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>").click(function(e) {
        e.preventDefault();
        <?php echo (str_replace(' ', '', $k->name)) ?>();
      });
    <?php endforeach ?>
    //function comminable 
    <?php foreach ($item_non as $k) : ?>
      //var tablehide="#table<?php echo $k->name; ?>";
      $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").hide();

      //tambah baris
      $("#tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>").click(function(e) {
        e.preventDefault();
        <?php echo (str_replace(' ', '', $k->name)) ?>();
      });


    <?php endforeach ?>
    $('select[name="selectProduction"]').append('<option value="' + "tes" + '" selected>' + "tes" + '</option>').trigger('change');
    generet_quotation_event();

    generet_quotation_other();
    $("#image").hide();

    $("#imageother").hide();
    $("#tableLoopDescription").hide();
    $("#classdeposit").hide();

    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
      'onclick="alert(\'Call your custom code here.\')">' +
      '<i class="glyphicon glyphicon-tag"></i>' +
      '</button>';
    // $("#imagenyes").fileinput({
    //   overwriteInitial: true,
    //   maxFileSize: 2000,
    //   showClose: false,
    //   showCaption: false,
    //   browseLabel: '',
    //   removeLabel: '',
    //   browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
    //   removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    //   removeTitle: 'Cancel or reset changes',
    //   elErrorContainer: '#kv-avatar-errors-1',
    //   msgErrorClass: 'alert alert-block alert-danger',
    //   // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
    //   layoutTemplates: {
    //     main2: '{preview} ' + btnCust + ' {remove} {browse}'
    //   },
    //   allowedFileExtensions: ["jpg", "png", "gif"]
    // });



  });
  //-------------------------------------hapus all table--------------------------------

  <?php foreach ($item as $k) : ?>
    $("#btn<?php echo (str_replace(' ', '', $k->name)) ?>").click(function(e) {
      $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").show();

      <?php echo (str_replace(' ', '', $k->name)) ?>();

    });
    $('#hapusall<?php echo (str_replace(' ', '', $k->name)) ?>').click(function(e) {
      $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").closest("tr").remove();
      $('#table<?php echo (str_replace(' ', '', $k->name)) ?>').hide();
      $('#tr<?php echo (str_replace(' ', '', $k->name)) ?>').remove();
      var datta = "#table<?php echo (str_replace(' ', '', $k->name)) ?>";
      var jml = $('' + datta + ' tbody tr').length;
      for (x = 0; x <= jml; x++) {
        $('#tr<?php echo (str_replace(' ', '', $k->name)) ?>' + x).remove();
      }
      $("#grandtotalcos<?php echo (str_replace(' ', '', $k->name)); ?>").val("0");
      $("#grandtotalcoshidden<?php echo (str_replace(' ', '', $k->name)); ?>").val("0");

      Nonfee();
      ComissionableCost();
      // $('#grandtotalMainCore_deposit').val("0");
      // hitungmaincoreeventdeposit();

    });

    //cek select
    function cek<?php echo (str_replace(' ', '', $k->name)) ?>(x) {
      var data = $('#select<?php echo (str_replace(' ', '', $k->name)) ?>' + x).val();
      if (data == '') {
        document.getElementById("Quantity<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = true;
        document.getElementById("Frequency<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = true;
        document.getElementById("Rate<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = true;
        $("#Quantity<?php echo (str_replace(' ', '', $k->name)) ?>" + x).val("0");
        $("#Frequency<?php echo (str_replace(' ', '', $k->name)) ?>" + x).val("0");
        $("#Rate<?php echo (str_replace(' ', '', $k->name)) ?>" + x).val("0");
        // $("#Subtotal<?php echo ($k->name) ?>"+x).val("0");
        //hitungmaineventevent_deposit();
      } else {
        document.getElementById("Quantity<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = false;
        document.getElementById("Frequency<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = false;
        document.getElementById("Rate<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = false;

      }


    }

    function hitunggrandtotal<?php echo (str_replace(' ', '', $k->name)) ?>() {

      var x;
      var hitung = 0;

      $('#table<?php echo (str_replace(' ', '', $k->name)) ?> tbody tr').each(function() {
        var quantity = $(this).find('td:nth-child(2) input').val();
        var frequency = $(this).find('td:nth-child(3) input').val();
        var rate = $(this).find('td:nth-child(4) input').val();
        var rate1 = rate.replace(/[^\w\s]/gi, '');
        var subtotal = Number(quantity) * Number(frequency) * Number(rate1);
        var subtotal1 = subtotal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

        $(this).find('td:nth-child(5) input').val(subtotal1);
        hitung = Number(hitung) + Number(subtotal);
      });
      var hitung1 = hitung.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");



      $("#grandtotalcos<?php echo (str_replace(' ', '', $k->name)); ?>").val(hitung1);
      $("#grandtotalcoshidden<?php echo (str_replace(' ', '', $k->name)); ?>").val(hitung);
      ComissionableCost();

    }


    //membaut tabel
    function <?php echo (str_replace(' ', '', $k->name)) ?>() {
      $(document).ready(function() {
        $("[data-toggle='tooltip']").tooltip();
      });
      var datta = "#table<?php echo (str_replace(' ', '', $k->name)) ?>";
      var idtr = "<?php echo (str_replace(' ', '', $k->name)) ?>";
      var Nomor = $('' + datta + ' tbody tr').length + 1;

      var Baris = '<tr id=tr<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '>';


      Baris += '<td >  <div class="form-group"> ';
      Baris += '<select required class="form-control select_group ItemValue" name="item_value[]" style="width:400px;" id="select<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"   onchange="cek<?php echo (str_replace(' ', '', $k->name)) ?>(' + Nomor + ');"> <option value="">Select <?php echo $k->name ?></option> <?php foreach ($core as $e) : if ($k->name == $e->name) { ?>  <option value="<?php echo $e->value ?>"><?php echo $e->value ?></option><?php } ?> <?php endforeach ?> </select> ';
      Baris += '</div></td>';

      Baris += '<td>';
      Baris += '<input readonly class="form-control Quantity" oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name)) ?>()"  type="Number" name="quantity[]" id="Quantity<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '" class="form-control Quantity" >';
      Baris += '</td>';

      Baris += '<td>';
      Baris += '<input readonly type="Number"   oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name)) ?>()" name="frequency[]" id="Frequency<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control deposit" required=""  ready >';
      Baris += '</td>';


      Baris += '<td>';
      Baris += '<input readonly onkeyup="convertToRupiah(this);"  class="form-control ratee" type="text"   oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name)) ?>()" name="rate[]" id="Rate<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control deposit"  required=""    > ';
      Baris += '</td>';

      Baris += '<td>';
      Baris += '<input  type="text"  readonly name="subtotal[]" id="subtotal<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control subtotal"  required="" readonly >  <input  type="text"  readonly name="subtotal<?php echo (str_replace(' ', '', $k->name)) ?>[]" id="subtotalhidden<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control subtotal_creative"  required="" readonly hidden  >';
      Baris += '</td>';
      Baris += '<td hidden>';
      Baris += '<input hidden  type="text"  readonly name="name[]" id="name<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control subtotal_creative"  required="" readonly value="<?php echo $k->name ?>"> ';
      Baris += '</td>';
      Baris += '<td hidden>';
      Baris += '<input  type="text"  readonly name="metode[]" id="metode<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control subtotal_creative"  required="" readonly value="Comissionable Cost" hidden> ';
      Baris += '</td>';

      Baris += '<td class="text-center">';
      Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip"  id="hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><font color="white"><i class="fa fa-times"></font></i></a>';
      Baris += '</td>';
      Baris += '</tr>';

      // dis

      $('' + datta + ' tbody').append(Baris)

      $('' + datta + ' tbody tr').each(function() {
        //$(this).find('td:nth-child(1) input').focus(); 
        $(this).find('td:nth-child(1) select').select2();
      });

    }

    $(document).on('click', '#hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>', function(e) {
      e.preventDefault();
      var Nomor = 1;
      $(this).parent().parent().remove();
      hitunggrandtotal<?php echo (str_replace(' ', '', $k->name)) ?>();

      Nonfee();
      ComissionableCost();
    });
  <?php endforeach ?>

  //----------------------------membuat table non ------------------------------------------

  <?php foreach ($item_non as $k) : ?>
    $("#btn<?php echo (str_replace(' ', '', $k->name)) ?>").click(function(e) {
      $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").show();
      <?php echo (str_replace(' ', '', $k->name)) ?>();
    });

    $('#hapusall<?php echo (str_replace(' ', '', $k->name)); ?>').click(function(e) {
      $("#table<?php echo $k->name; ?>").closest("tr").remove();

      $('#table<?php echo (str_replace(' ', '', $k->name)) ?>').hide();
      $('#tr<?php echo (str_replace(' ', '', $k->name)) ?>').remove();
      var datta = "#table<?php echo (str_replace(' ', '', $k->name)) ?>";
      var jml = $('' + datta + ' tbody tr').length;
      for (x = 0; x <= jml; x++) {
        $('#tr<?php echo (str_replace(' ', '', $k->name)) ?>' + x).remove();
      }

      $("#grandtotalnon<?php echo (str_replace(' ', '', $k->name)); ?>").val("0");
      $("#grandtotalnonhidden<?php echo (str_replace(' ', '', $k->name)); ?>").val("0");
      Nonfee();
      ComissionableCost();
      // $('#grandtotalMainCore_deposit').val("0");
      // hitungmaincoreeventdeposit();


    });

    function cek<?php echo (str_replace(' ', '', $k->name)) ?>(x) {
      var data = $('#selectNON<?php echo (str_replace(' ', '', $k->name)) ?>' + x).val();
      if (data == '') {
        document.getElementById("QuantityNON<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = true;
        document.getElementById("FrequencyNON<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = true;
        document.getElementById("RateNON<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = true;
        $("#QuantityNON<?php echo (str_replace(' ', '', $k->name)) ?>" + x).val("0");
        $("#FrequencyNON<?php echo (str_replace(' ', '', $k->name)) ?>" + x).val("0");
        $("#RateNON<?php echo (str_replace(' ', '', $k->name)) ?>" + x).val("0");
        // $("#Subtotal<?php echo ($k->name) ?>"+x).val("0");
        //hitungmaineventevent_deposit();
      } else {
        document.getElementById("QuantityNON<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = false;
        document.getElementById("FrequencyNON<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = false;
        document.getElementById("RateNON<?php echo (str_replace(' ', '', $k->name)) ?>" + x).readOnly = false;

      }


    }

    function hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name)) ?>() {

      var datta = "#table<?php echo (str_replace(' ', '', $k->name)) ?>";

      var Nomor = $('' + datta + ' tbody tr').length;
      var x;
      var hitung = 0;

      $('#table<?php echo (str_replace(' ', '', $k->name)) ?> tbody tr').each(function() {
        var quantity = $(this).find('td:nth-child(2) input').val();
        var frequency = $(this).find('td:nth-child(3) input').val();
        var rate = $(this).find('td:nth-child(4) input').val();
        var rate1 = rate.replace(/[^\w\s]/gi, '');
        var subtotal = Number(quantity) * Number(frequency) * Number(rate1);
        var subtotal1 = subtotal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

        $(this).find('td:nth-child(5) input').val(subtotal1);
        hitung = Number(hitung) + Number(subtotal);
      });
      var hitung1 = hitung.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");


      $("#grandtotalnon<?php echo (str_replace(' ', '', $k->name)); ?>").val(hitung1);
      $("#grandtotalnonhidden<?php echo (str_replace(' ', '', $k->name)); ?>").val(hitung);
      ComissionableCost();
      Nonfee();

    }



    function <?php echo (str_replace(' ', '', $k->name)) ?>() {
      $(document).ready(function() {
        $("[data-toggle='tooltip']").tooltip();
      });
      var datta = "#table<?php echo (str_replace(' ', '', $k->name)) ?>";
      var idtr = "<?php echo $k->name; ?>";
      var Nomor = $('' + datta + ' tbody tr').length + 1;

      var Baris = '<tr id=tr<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '>';


      Baris += '<td >  <div class="form-group"> ';
      Baris += '<select class="form-control" style="width:400px;" name="item_value[]" id="selectNON<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"   onchange="cek<?php echo (str_replace(' ', '', $k->name)) ?>(' + Nomor + ');"> <option value="">Select <?php echo $k->name ?></option> <?php foreach ($core as $e) : if ($k->name == $e->name) { ?>  <option value="<?php echo $e->value ?>"><?php echo $e->value ?></option><?php } ?> <?php endforeach ?> </select> ';
      Baris += '</div></td>';

      Baris += '<td>';
      Baris += '<input readonly class="form-control QuantityNON oninput="hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name)) ?>()"  type="Number" name="quantity[]" id="QuantityNON<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '" class="form-control Quantity" >';
      Baris += '</td>';



      Baris += '<td>';
      Baris += '<input readonly type="Number"   oninput="hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name)) ?>()" name="frequency[]" id="FrequencyNON<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control deposit" required=""  ready >';
      Baris += '</td>';


      Baris += '<td>';
      Baris += '<input readonly onkeyup="convertToRupiah(this);" class="form-control ratee" type="text"   oninput="hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name)) ?>()" name="rate[]" id="RateNON<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control deposit"  required=""    > ';
      Baris += '</td>';


      Baris += '<td>';
      Baris += '<input  type="text"  readonly name="subtotal[]" id="subtotalNON<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control subtotal_creative"  required="" readonly >  <input  type="text"  readonly name="rate<?php echo (str_replace(' ', '', $k->name)) ?>[]" id="subtotalhiddenNON<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control subtotal_creative"  required="" readonly hidden  >';
      Baris += '</td>';

      Baris += '<td hidden >';
      Baris += '<input  type="text"  readonly name="metode[]" id="metode<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control subtotal_creative"  required="" readonly value="Non-Fee Cost"  > ';
      Baris += '</td>';

      Baris += '<td hidden>';
      Baris += '<input   type="text"  readonly name="name[]" id="name<?php echo (str_replace(' ', '', $k->name)) ?>' + Nomor + '"  class="form-control subtotal_creative"  required="" readonly value="<?php echo $k->name ?>">';
      Baris += '</td>';

      Baris += '<td class="text-center">';
      Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip"  id="hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><font color="white"><i class="fa fa-times"></font></i></a>';
      Baris += '</td>';
      Baris += '</tr>';

      // onkeyup="convertToRupiah(this);"

      $('' + datta + ' tbody').append(Baris);

      $('' + datta + ' tbody tr').each(function() {
        //$(this).find('td:nth-child(1) input').focus(); 
        $(this).find('td:nth-child(1) select').select2();
      });

    }

    $(document).on('click', '#hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>', function(e) {

      e.preventDefault();

      var Nomor = 1;
      $(this).parent().parent().remove();
      hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name)) ?>()

    });
  <?php endforeach ?>




  // ----------------------------------------------btn show other----------------------   
  $('#description').click(function(e) {
    $('#tableLoopDescription').show();
    for (B = 1; B <= 1; B++) {
      BarisBaruDescription();
    }

  });

  // ----------------------------------------------btn show deposit----------------------                          


  function function_deposit() {
    $('#classdeposit').show();
    var Quotation = $('#Quatations_number_event').val();
    var data = Quotation + "-D";

    $('#Quatations_number_event').val(data);


  }

  function hapus_deposit() {
    $('#deposit_number_event').val("");
    $('#total_cashin_event').val("");
    $('#total_cashin_event').val("");
    $('#classdeposit').hide();

    generet_quotation_event();


  }





  // $(document).ready(function() {

  $('#BarisBaruDescription').click(function(e) {
    e.preventDefault();
    BarisBaruDescription();
  });



  $(document).on('click', '#HapusBarisDeskription', function(e) {
    e.preventDefault();
    var Nomor = 1;
    $(this).parent().parent().remove();
    hitungDescription();

  });




  $(document).ready(function() {

    $('#BarisBaruGimmickDeposit').click(function(e) {
      e.preventDefault();
      BarisBaruGimmickDeposit();
    });

  });




  tinymce.init({
    selector: 'textarea.description',
    height: 10,
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

  // ---------------------------------------------------------Baris Baru Description----------------------------------------  
  function BarisBaruDescription() {
    $(document).ready(function() {
      $("[data-toggle='tooltip']").tooltip();
    });
    var Nomor = $("#tableLoopDescription tbody tr").length + 1;
    var Baris = '<tr id=trdescription' + Nomor + '>';

    Baris += '<td style="width:30%" colspan=2>';
    Baris += '<textarea  class="form-control description"  name="description[]" id="description' + Nomor + '" ></textarea>';
    Baris += '</td>';

    Baris += '<td>';
    Baris += '<input  type="Number" name="QuantityDescription[]"  oninput="hitungDescription();"  id="QuantityDescription' + Nomor + '" class="form-control QuantityDescription" >';
    Baris += '</td>';

    Baris += '<td>';
    Baris += '<input  type="Number" name="FrequencyDescription[]"  oninput="hitungDescription();"  id="FrequencyDescription' + Nomor + '" class="form-control FrequencyDescription" >';
    Baris += '</td>';


    Baris += '<td>';
    Baris += '<input onkeyup="convertToRupiah(this);"  oninput="hitungDescription();"  type="text" name="UniPriceDescription[]" id="UniPriceDescription' + Nomor + '"  class="form-control UniPriceDescription"  required="" >';
    Baris += '</td>';



    Baris += '<td>';
    Baris += '<input  oninput="hitungDescription();"  type="text" name="AmmountDescription[]" id="AmountDescription' + Nomor + '"  class="form-control deposit"  required="" readonly  >  <input  oninput="hitungDescription();"  type="text" name="AmmountDescriptionhidden[]" id="AmountDescriptionhidden' + Nomor + '"  class="form-control deposit"  required="" readonly hidden  >';
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

  $(document).on('click', '#HapusBarisDeskription', function(e) {
    e.preventDefault();

    $(this).parent().parent().remove();
    hitungDescription();

  });

  function discount_other_normal() {

    var total_summary = $('#netto').val();
    var discount_percent = $('#discount_percent_other').val();
    var discount_other = $('#discount_other').val();
    var total_summary1 = total_summary.replace(/[^\w\s]/gi, '');
    var total_other1 = discount_other.replace(/[^\w\s]/gi, '');
    var hasil = (Number(total_other1) / Number(total_summary1)) * 100
    $('#discount_percent_other').val(hasil);
    ppn();
    netto_other_function();
    grand_total();


  }


  function discount_other_function() {
    var total_summary = $('#netto').val();
    var discount_percent = $('#discount_percent_other').val();

    var total_summary1 = total_summary.replace(/[^\w\s]/gi, '');

    var hasil = Number(total_summary1) * Number((discount_percent / 100));
    var a = Math.round(hasil);
    var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('#discount_other').val(hasil1);

    ppn();
    netto_other_function();
    grand_total();

  }

  function netto_other_function() {
    var discount = $('#discount_other').val();
    var discount1 = discount.replace(/[^\w\s]/gi, '');

    var asf1 = $('#asf_other').val();
    var asf = asf1.replace(/[^\w\s]/gi, '');

    var total_summary = $('#netto').val();
    var total_summary1 = total_summary.replace(/[^\w\s]/gi, '');
    var hasil = Number(total_summary1) + Number(asf) - Number(discount1);
    var a = Math.round(hasil);
    var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('#netto_other').val(hasil1);



  }

  function changePicture() {
    $('#upload').click();
  }

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#image')
          .attr('src', e.target.result);

      };
      reader.readAsDataURL(input.files[0]);
      $("#image").show();
    }
  }




  function changePictureOther() {
    $('#uploadother').click();
  }

  function readURLOther(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imageother')
          .attr('src', e.target.result);

      };
      reader.readAsDataURL(input.files[0]);
      $("#imageother").show();
    }
  }

  $('#hapusdeskription').click(function(e) {
    $("tableLoopDescription").closest("tr").remove();

    $('#tableLoopDescription').hide();
    // hitungDescription();
    $('#trd').remove();


    $('#tableLoopDescription tbody tr').each(function() {
      $(this).remove();


    });
    hitungDescription();


  });



  //get PIC PO Event
  function DataPICEvent() {
    var d = $("#pic_event").val();
    if (d.trim() == '') {
      $('[name="email_event"]').val('');
      $('[name="customer_event"]').val('');
      $('[name="pic_event1"]').val('');

    } else {
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Customer/AmbilDataPICQuotation/") ?>',
        data: 'pic_name=' + d,
        dataType: 'json',

        success: function(hasil) {


          $('[name="email_event"]').val(hasil[0].email);
          $('[name="customer_event"]').val(hasil[0].customer);
          $('[name="pic_event1"]').val(hasil[0].pic_name);
          validasiEvent();





        },
        error: function(hasil) {


        }


      });


    }


  }
  //get pic even even
  function DataPIC() {
    var d = $("#picEvent").val();
    if (d.trim() == '') {
      $('[name="emailEvent"]').val('');
      $('[name="customerEvent"]').val('');
      $('[name="id_customer"]').val('');
      $('[name="picEvent1"]').val('');
      $('[name="kpph"]').val('');
      $('[name="kppn"]').val('');
      $('#email_event').val('');
      $('#customer_event').val('');
      $('#pic_event1').val('')
      $('[name="pic_event"]').val("").change();


    } else {
      var pic = $('[name="customer_event"]').val();
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Customer/AmbilDataPICQuotationEvent/") ?>',
        data: 'pic_name=' + d,
        dataType: 'json',

        success: function(hasil) {


          $('[name="emailEvent"]').val(hasil[0].email);
          $('[name="customerEvent"]').val(hasil[0].customer);
          $('[name="id_customer"]').val(hasil[0].id_customer);
          $('[name="picEvent1"]').val(hasil[0].pic_name);
          $('[name="kpph"]').val(hasil[0].karakteristik_pph);
          $('[name="kppn"]').val(hasil[0].karakteristik_ppn);
          pph();
          ppn();
          if (pic.trim() != '') {
            validasiEvent();

          }





        },
        error: function(hasil) {


        }


      });

    }


  }

  //Get pic event other 
  function DataPICEventOther() {
    var d = $("#pic").val();
    if (d.trim() == '') {
      $('[name="customerEventOther"]').val('');
      $('[name="picEventOther1"]').val('');
      $('[name="id_customerother"]').val('');
      $('[name="emailEventOther"]').val('');
      $('[name="kpphother"]').val('');
      $('[name="kppnother"]').val('');
      $('[name="emailOther"]').val('');
      $('[name="customerOther"]').val('');
      $('[name="picOther1"]').val('');
      $('[name="pic_other"]').val('').change();
      ppn_description();
      pph_description();

    } else {
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Customer/AmbilDataPICQuotationEvent/") ?>',
        data: 'pic_name=' + d,
        dataType: 'json',

        success: function(hasil) {



          $('[name="customerEventOther"]').val(hasil[0].customer);
          $('[name="picEventOther1"]').val(hasil[0].pic_name);
          $('[name="id_customerother"]').val(hasil[0].id_customer);
          $('[name="emailEventOther"]').val(hasil[0].email);
          $('[name="kpphother"]').val(hasil[0].karakteristik_pph);
          $('[name="kppnother"]').val(hasil[0].karakteristik_ppn);

          ppn_description();
          pph_description();
          if ($('[name="customerOther"]').val() != '') {
            validasiOther();
          }



        },
        error: function(hasil) {


        }


      });

    }



  }
  //get PIC po other
  function DataPICOther() {
    var d = $("#pic_other").val();
    if (d.trim() == '') {
      $('[name="emailOther"]').val('');
      $('[name="customerOther"]').val('');
      $('[name="picOther1"]').val('');

    } else {
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Customer/AmbilDataPICQuotation/") ?>',
        data: 'pic_name=' + d,
        dataType: 'json',

        success: function(hasil) {

          $('[name="emailOther"]').val(hasil[0].email);
          $('[name="customerOther"]').val(hasil[0].customer);
          $('[name="picOther1"]').val(hasil[0].pic_name);
          // $('[name="kpphother"]').val(hasil[0].karakteristik_pph);
          // $('[name="kppnother"]').val(hasil[0].karakteristik_ppn);
          validasiOther();


        },
        error: function(hasil) {}
      });

    }

  }


  function DataPICDeposit() {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Customer/AmbilDataPIC/") ?>',
      data: 'pic_name=' + formiddeposit.pic_deposit[formiddeposit.pic_deposit.selectedIndex].text,
      dataType: 'json',

      success: function(hasil) {

        $('[name="email_deposit"]').val(hasil[0].email);

      },
      error: function(hasil) {


      }


    });

  }



  function grand_total_other() {

    var total1 = $('#netto_other').val();

    var total = total1.replace(/[^\w\s]/gi, '');;
    var pph = $('#pph_description_hidden').val();
    var ppn = $('#ppn_description_hidden').val();
    var grand_total = Number(Math.round(total)) + Number(Math.round(ppn)) - Number(Math.round(pph));
    var grand_total2 = Math.round(grand_total);
    var grand_total1 = grand_total2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

    $('#grand_total_other').val(grand_total1);


  }

  function hitungDescription() {
    var hitung = 0;
    $('#tableLoopDescription tbody tr').each(function() {
      var quantity = $(this).find('td:nth-child(2) input').val();
      var frequency = $(this).find('td:nth-child(3) input').val();
      var satuan = $(this).find('td:nth-child(4) input').val();
      var satuan1 = satuan.replace(/[^\w\s]/gi, '');
      var data = Number(quantity) * Number(frequency) * Number(satuan1)
      var ss = data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $(this).find('td:nth-child(5) input').val(ss);


      hitung = Number(hitung) + Number(data);


    });
    var hitung1 = hitung.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");


    $('#grandtotaldescription').val(hitung1);
    $('#grandtotaldescriptionhidden').val(hitung);
    discount_other_function();
    hitungnetto();
    grand_total_other();

  }

  function hitungnetto() {
    var total = $('#grandtotaldescriptionhidden').val();
    var a = Math.round(total);
    var total1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('#netto_hidden').val(total);
    $('#netto').val(total1);
    hitungmanagement();
    total_description();
    ppn_description();
    pph_description();
    grand_total_other();
    discount_other_function();




  }

  function hitungmanagement() {
    var netto1 = $('#netto').val();
    var netto = netto1.replace(/[^\w\s]/gi, '');
    var asf = $('#asf_percen_other').val();

    hitung = Number(netto) / 100 * Number(asf);
    var a = Math.round(hitung);
    var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('#asf_other').val(hitung1);
    $('#asf_other_hidden').val(hitung);
    total_description();

    grand_total_other();


  }

  function total_description() {
    var netto1 = $('#netto_other').val();
    var netto = netto1.replace(/[^\w\s]/gi, '');


    $('#total_description').val(netto1);
    $('#total_description_hidden').val(netto);
    grand_total_other();


  }

  function ppn_description() {

    kppnother = $('#kppnother').val();
    if (kppnother == 'noppn') {
      var d1 = $('#netto_other').val();
      var d = d1.replace(/[^\w\s]/gi, '');
      var hasil = Number(d) * 0;
      var a = Math.round(hasil);
      var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

      $('#ppn_description').val(hasil1);
      $('#ppn_description_hidden').val(hasil);
      grand_total_other();

    } else {
      var d1 = $('#netto_other').val();
      var d = d1.replace(/[^\w\s]/gi, '');
      var hasil = Number(d) * 0.1;
      var a = Math.round(hasil);
      var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

      $('#ppn_description').val(hasil1);
      $('#ppn_description_hidden').val(hasil);
      grand_total_other();


    }


  }

  function pph_description() {

    //2% dari management fee
    kpphother = $('#kpphother').val();
    if (kpphother == "nopph") {
      var management1 = $('#asf_other').val();

      var management = management1.replace(/[^\w\s]/gi, '');;
      var hasil = Number(management) * 0;
      var a = Math.round(hasil);
      var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('#pph_description_hidden').val(hasil);
      $('#pph_description').val('(' + hasil1 + ')');
      grand_total_other();

    } else {
      var management1 = $('#asf_other').val();

      var management = management1.replace(/[^\w\s]/gi, '');;
      var hasil = Number(management) * 0.02;
      var a = Math.round(hasil);
      var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('#pph_description_hidden').val(hasil);
      $('#pph_description').val('(' + hasil1 + ')');
      grand_total_other();


    }


  }



  //genere id

  function generet_quotation_event() {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Quotation/generet_quotation_event") ?>',
      dataType: 'json',
      success: function(hasil) {

        var date = new Date();
        var tahun = date.getFullYear();
        var t = tahun.toString()
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();

        $('[name="Quatations_number_event"]').val("QE-D" + t.substring(2, 4) + "" + (bulan + 1) + "" + tanggal + hasil.data)

      },
      error: function(hasil) {




      }


    });

  }




  function generet_quotation_other() {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Quotation/generet_quotation_other") ?>',
      dataType: 'json',
      success: function(hasil) {

        var date = new Date();
        var tahun = date.getFullYear();
        var t = tahun.toString()
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();

        $('[name="Quatations_number_other"]').val("QO-D" + t.substring(2, 4) + "" + (bulan + 1) + "" + tanggal + hasil.data)

      },
      error: function(hasil) {



      }


    });

  }

  //logic select



  //save quoation event


  //   $( "#saveQuotatione" ).click(function() {



  //     if (venue_event.trim()=='' || title_event.trim()=='' || date_event.trim()=='' || asf_percen.trim()=='' || date_quotation.trim()=='' || pic_eventEvent.trim()=='' || pic_poEvent.trim()=='' || date_expired_event.trim()==''){
  //  alert("tes");


  //     }else{
  //       alert("tes");

  //            $.ajax({
  //           type:"post",
  //           url:'<?php echo base_url("Quotation/cekQuotationEvent/") ?>',
  //           data:'quotation_number='+quotation_number,
  //           dataType:'json',

  //           success:function(hasil){
  //             console.log(hasil);

  //             // if (hasil.status=='tersedia'){


  //             //   }else{
  //             //         $("#SimpanData" ).submit();
  //             //      }


  //           },
  //           error:function(hasil){



  //           }


  //       });

  //     }

  // });



  // function save_quotation_event() {

  //               $.ajax({
  //                   url:$("#SimpanData").attr('action'),
  //                   type:'post',

  //                   data: $("#SimpanData").serialize(),
  //                   success:function () {

  //                   },

  //                   error:function () {
  //                       window.location.href = "<?php echo base_url("Quotation/manage_quotation_other") ?>";
  //                   }

  //               });
  //           }


  /// simpan data quotation event
  // $('#SimpanData1').submit(function(e) {
  //             e.preventDefault();
  //                save_quotation_event();

  //            });


  // function save_quotation_event() {

  //               $.ajax({
  //                   url:$("#SimpanData1").attr('action'),
  //                   type:'post',
  //                   cache:false,
  //                   dataType:"json",
  //                   data: $("#SimpanData1").serialize(),
  //                   success:function (data) {
  //                       if (data.success == true) {



  //                             $('#notif1').fadeIn(800, function() {

  //                              $("#notif1").html(data.notif).fadeOut(5000).delay(1000); 

  //                             });
  //                              window.location.href = "<?php echo base_url("Quotation/manage_quotation") ?>";



  //                       }else{
  //                           $('#notif1').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
  //                       }
  //                   },

  //                   error:function (error) {
  //                      // alert(error);

  //                        window.location.href = "<?php echo base_url("Quotation/manage_quotation") ?>";
  //                   }

  //               });
  //           }






  function ComissionableCost() {
    var hitung = 0;
    <?php foreach ($item as $k) : ?>

      var total = $("#grandtotalcoshidden<?php echo (str_replace(' ', '', $k->name)); ?>").val();

      var hitung = Number(total) + Number(hitung);
      var a = Math.round(hitung);
      var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

    <?php endforeach ?>
    $('[name="Comissionable_cost"]').val(hitung1);
    $('[name="Comissionable_costhidden"]').val(hitung);


    hitungasf();

  }

  function hitungasf() {
    var Comissionable = $('[name="Comissionable_costhidden"]').val();
    var asf_percen = $('[name="asf_percen"]').val();
    var hitung = Number(Comissionable) / 100 * Number(asf_percen);
    var a = Math.round(hitung);
    var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('[name="asf"]').val(hitung1);
    $('[name="asf_hidden"]').val(hitung);
    totalsummary();
    pph();

  }

  function totalsummary() {
    var Comissionable = $('[name="Comissionable_costhidden"]').val();
    var asf = $('[name="asf_hidden"]').val();
    var totalnonfee = $('#non_feehidden').val();
    var hitung = Number(Comissionable) + Number(asf) + Number(totalnonfee);
    var a = Math.round(hitung);
    var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('#total_summary').val(hitung1);
    $('[name="total_summaryhidden"]').val(hitung);
    discount_event_function();
    ppn();
    grand_total();
  }


  function discount_event_normal() {
    var total_summary = $('#total_summary').val();
    var discount_event = $('#discount_event').val();
    var total_summary1 = total_summary.replace(/[^\w\s]/gi, '');
    var discount_event1 = discount_event.replace(/[^\w\s]/gi, '');

    //var hasil = Number(total_summary1) * Number((discount_percent / 100));
    var hasil = (Number(discount_event1) / Number(total_summary1)) * 100


    // var a = Math.round(hasil);
    // var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('#discount_percent_event').val(hasil);

    ppn();
    netto_event_function();
    grand_total();

  }

  function discount_event_function() {
    var total_summary = $('#total_summary').val();
    var discount_percent = $('#discount_percent_event').val();

    var total_summary1 = total_summary.replace(/[^\w\s]/gi, '');

    var hasil = Number(total_summary1) * Number((discount_percent / 100));
    var a = Math.round(hasil);
    var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('#discount_event').val(hasil1);

    ppn();
    netto_event_function();
    grand_total();

  }

  function netto_event_function() {
    var discount = $('#discount_event').val();
    var discount1 = discount.replace(/[^\w\s]/gi, '');
    var total_summary = $('#total_summary').val();
    var total_summary1 = total_summary.replace(/[^\w\s]/gi, '');
    var hasil = Number(total_summary1) - Number(discount1);
    var a = Math.round(hasil);
    var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('#netto_event').val(hasil1);



  }

  function grand_total() {
    var total = $('#netto_event').val();
    var total1 = total.replace(/[^\w\s]/gi, '');

    var pph = $('[name="pph_hidden"]').val();
    var ppn = $('[name="ppn_hidden"]').val();
    var grand_total = Number(total1) + Number(ppn) - Number(pph);
    var grand_total2 = Math.round(grand_total);
    var grand_total1 = grand_total2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

    $('[name="grand_total"]').val(grand_total1);


  }

  function pph() {
    var karakteristikpph = $('[name="kpph"]').val();
    if (karakteristikpph == 'nopph') {
      var asf = $('[name="asf_hidden"]').val();
      var hitung = asf * 0;
      var a = Math.round(hitung);
      var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('[name="pph_hidden"]').val(hitung);
      $('[name="pph"]').val('(' + hitung1 + ')');
      grand_total();

    } else {
      var asf = $('[name="asf_hidden"]').val();
      var hitung = asf * 0.02;
      var a = Math.round(hitung);
      var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('[name="pph_hidden"]').val(hitung);
      $('[name="pph"]').val('(' + hitung1 + ')');
      grand_total();


    }
    number_format($grand_total, 0, ",", ".");

  }

  function ppn() {
    var karakteristikPpn = $('[name="kppn"]').val();
    if (karakteristikPpn == 'noppn') {

      var total = $('#netto_event').val();
      var total1 = total.replace(/[^\w\s]/gi, '');
      var hitung = Number(total1) * 0;
      var a = Math.round(hitung);
      var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('[name="ppn"]').val(hitung1);
      $('[name="ppn_hidden"]').val(hitung);
      grand_total();

    } else {

      var total = $('#netto_event').val();
      var total1 = total.replace(/[^\w\s]/gi, '');
      var hitung = Number(total1) * 0.1;
      var a = Math.round(hitung);
      var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('[name="ppn"]').val(hitung1);
      $('[name="ppn_hidden"]').val(hitung);
      grand_total();
    }



  }

  function Nonfee() {
    var hitung = 0;
    <?php foreach ($item_non as $k) : ?>

      var total = $("#grandtotalnonhidden<?php echo (str_replace(' ', '', $k->name)); ?>").val();

      var hitung = Number(total) + Number(hitung);


    <?php endforeach ?>
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
      'onclick="alert(\'Call your custom code here.\')">' +
      '<i class="glyphicon glyphicon-tag"></i>' +
      '</button>';
    var a = Math.round(hitung);
    var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('[name="non_fee"]').val(hitung1);
    $('[name="non_feehidden"]').val(hitung);
    totalsummary();

  }




  $("#imagenes").fileinput({

    overwriteInitial: true,
    maxFileSize: 2048,
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
    allowedFileExtensions: ["jpg", "png", "gif", "pdf"],


  });

  $("#imagenesother").fileinput({
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
    allowedFileExtensions: ["jpg", "png", "gif", "pdf"],
    // initialPreview: [
    //   '<object type="application/pdf"  style="height: 30vh; width:50vh"><img style="width: 10%; height: 30% "  src="<?php echo base_url('assets/images/default.png') ?>" ></object>'
    // ],
  });

  function isTGL() {
    var date_quotation_event = document.getElementById("date_quotation_event").value;
    var date_expired_event = document.getElementById("date_expired_event").value;
    if (date_quotation_event <= date_expired_event) {
      alert(" tanggal  valid");
    } else {
      alert("tanggal tidak valid");

    }

  }


  function expired() {


    startDate = new Date($('#date_quotation_event').val());
    endDate = new Date($('#date_expired_event').val());
    if (endDate < startDate) {
      $('#date_expired_event').val("");

    }
    var d = new Date("This is not date.");
    if (Object.prototype.toString.call(startDate) ===
      "[object Date]") {
      if ((startDate == '') || isNaN(startDate.getTime())) {
        document.getElementById("date_expired_event").readOnly = true;
      } else {
        $("#date_expired_event").datepicker({
          format: "yyyy/mm/dd"
        });
        document.getElementById("date_expired_event").readOnly = false;
        $('#date_expired_event').datepicker({

          format: "yyyy/mm/dd",
          showButtonPanel: true,
          changeMonth: true,
          changeYear: true,
          buttonImageOnly: true,
          minDate: $('#date_quotation_event').val(),
          maxDate: '+30Y',
          yearRange: '1999:2030',
          inline: true
        });
      }

    }
    // if (startDate!=''){


    // }else{


    // }

  }






  $(function() {
    var dateToday = new Date();

    $('#date_quotation_event').datepicker({
      format: "yyyy/mm/dd",
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true,

      buttonImageOnly: true,

      maxDate: '+30Y',
      yearRange: '1999:2030',
      inline: true
    });
  });

  function expiredOther() {


    startDate = new Date($('#date_quotation').val());
    endDate = new Date($('#date_expired_other').val());
    if (endDate < startDate) {
      $('#date_expired_other').val("");

    }

    if (Object.prototype.toString.call(startDate) ===
      "[object Date]") {
      if ((startDate == '') || isNaN(startDate.getTime())) {
        document.getElementById("date_expired_other").readOnly = true;
      } else {
        $("#date_expired_other").datepicker({
          format: "yyyy/mm/dd",
        });
        document.getElementById("date_expired_other").readOnly = false;
        $('#date_expired_other').datepicker({

          format: "yyyy/mm/dd",
          showButtonPanel: true,
          changeMonth: true,
          changeYear: true,
          buttonImageOnly: true,
          minDate: startDate,
          maxDate: '+30Y',
          yearRange: '1999:2030',
          inline: true
        });
      }

    }
    // if (startDate!=''){


    // }else{


    // }

  }





  $(function() {
    var dateToday = new Date();

    $('#date_quotation').datepicker({
      format: "yyyy/mm/dd",
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true,

      buttonImageOnly: true,

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

  function ValidateSizeother(file) {
    var FileSize = file.files[0].size / 1024 / 1024; // in MB
    if (FileSize > 2) {
      alert('File size exceeds 2 MB');
      $('#imagenesother').val(''); //for clearing with Jquery
    } else {

    }
  }

  $("#quotationMainNav").addClass('active');
  $("#addQuotationNav").addClass('active');
  $("#openQuotationNav").addClass('menu-open');


  function validasiEvent() {
    var picEvent = $('#picEvent').val();
    var picpo = $('#pic_event').val();
    var picnamepo = $('#pic_event1').val();
    var customerEvent = $('[name="customerEvent"]').val();
    var customerPO = $('[name="customer_event"]').val();

    var emailPO = $('#email_event').val();

    if (picEvent.trim() != '') {

      if (customerEvent.trim() != customerPO.trim()) {
        $('#email_event').val('');
        $('#customer_event').val('');
        $('#pic_event1').val('')
        $('[name="pic_event"]').val("").change();
        alert("Customer PIC PO harus sama dengan customer PIC Event");


      }

    } else {
      $('#email_event').val('');
      $('#customer_event').val('');
      $('#pic_event1').val('')
      $('#pic_event').val('').change();
      alert("Pilih terlebih dahulu PIC Event");

    }



  }

  function validasiOther() {
    var picEvent = $('#pic').val();
    // var picpo=$('#pic_event').val();
    //  var picnamepo=$('#pic_event1').val();
    // var customerEvent= $('[name="customerEvent"]').val();
    //  var customerPO=$('[name="customer_event"]').val();

    //  var emailPO=$('#email_event').val();



    var customerEvent = $('[name="customerEventOther"]').val();
    var picnameEvent = $('[name="picEventOther1"]').val();
    var id_customer = $('[name="id_customerother"]').val();
    var emailCustomer = $('[name="emailEventOther"]').val();




    var emailPO = $('[name="emailOther"]').val();
    var customerPO = $('[name="customerOther"]').val();
    var pic_namePO = $('[name="picOther1"]').val();

    if (picEvent.trim() != '') {

      if (customerEvent.trim() != customerPO.trim()) {
        $('[name="emailOther"]').val('');
        $('[name="customerOther"]').val('');
        $('[name="picOther1"]').val('');
        $('[name="pic_other"]').val("").change();
        alert("Customer PIC PO harus sama dengan customer PIC Event");


      }

    } else {
      $('[name="emailOther"]').val('');
      $('[name="customerOther"]').val('');
      $('[name="picOther1"]').val('');
      $('[name="pic_other"]').val("").change();
      alert("Pilih terlebih dahulu PIC Event");

    }



  }

  $('#SimpanData').submit(function(e) {
    e.preventDefault();
    showIndikatorForevent();


    var venue_event = $('#venue_event').val();
    var quotation_number = $('#Quatations_number_event').val();
    var title_event = $('#title_event').val();
    var date_event = $('#date_event').val();
    var asf_percen_event = $('#asf_percen').val();
    var date_quotation = $('#date_quotation_event').val();
    var pic_eventEvent = $('#picEvent').val();
    var pic_poEvent = $('#pic_event').val();
    var pic_poEvent = $('#imagenes').val();
    var date_expired_event = $('#date_expired_event').val();

    if (venue_event.trim() == '' || title_event.trim() == '' || date_event.trim() == '' || asf_percen_event.trim() == '' || date_quotation.trim() == '' || pic_eventEvent.trim() == '' || pic_poEvent.trim() == '' || date_expired_event.trim() == '') {

    } else {
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Quotation/cekQuotationEvent/") ?>',
        data: 'quotation_number=' + quotation_number,
        dataType: 'json',

        success: function(hasil) {


          if (hasil.status == 'tersedia') {
            Swal.fire({
              title: 'Oops',
              text: "Quotation number sudah tersedia,lakukan update quotation dengan menekan tombol update QE  sebeleum menyimpan  data quotation event",
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#808080',
              cancelButtonText: 'Tidak',
              confirmButtonText: 'Update QE'
            }).then((result) => {
              if (result.value) {

                generet_quotation_event();
                hiddenIndikatorForevent();
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Quotation number has been updated',
                  showConfirmButton: false,
                  timer: 1500
                });

              }
            });


          } else {
            $("#SimpanData").submit();
          }


        },
        error: function(hasil) {




        }


      });

    }

  });


  $('#SimpanDataOther').submit(function(e) {
    e.preventDefault();
    showIndikatorForother();

    var quotation_number = $('#Quatations_number_other').val();
    var title_event = $('#title_event_otther').val();

    var asf_percen_other = $('#asf_percen_other').val();
    var date_quotation_event = $('#date_quotation').val();

    var pic_eventOther = $('#pic').val();
    var pic_poOther = $('#pic_other').val();
    var pic_poEvent = $('#imagenesother').val();
    var date_expired_other = $('#date_expired_other').val();
    var note = $('#note_desciption').val();
    //save_quotation_event();
    //$("#SimpanData" ).submit();
    if (title_event.trim() == '' || asf_percen_other.trim() == '' || date_quotation_event.trim() == '' || pic_eventOther.trim() == '' || pic_poOther.trim() == '' || date_expired_other.trim() == '') {

    } else {
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Quotation/cekQuotationOther/") ?>',
        data: 'quotation_number=' + quotation_number,
        dataType: 'json',

        success: function(hasil) {


          if (hasil.status == 'tersedia') {
            Swal.fire({
              title: 'Oops',
              text: "Quotation number sudah tersedia,lakukan update quotation dengan menekan tombol update QO  sebeleum menyimpan  data quotation other",
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#808080',
              cancelButtonText: 'Tidak',
              confirmButtonText: 'Update QO'
            }).then((result) => {
              if (result.value) {

                generet_quotation_other();
                hiddenIndikatorForother();
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Quotation number has been updated',
                  showConfirmButton: false,
                  timer: 1500
                });


              }
            });


          } else {
            $("#SimpanDataOther").submit();
          }


        },
        error: function(hasil) {




        }


      });

    }

  });








  function update_quotation_other() {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Quotation/generet_quotation_other") ?>',
      dataType: 'json',
      success: function(hasil) {

        var date = new Date();
        var tahun = date.getFullYear();
        var t = tahun.toString()
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();

        $('[name="Quatations_number_other"]').val("QO-D" + t.substring(2, 4) + "" + (bulan + 1) + "" + tanggal + hasil.data);


      },
      error: function(hasil) {



      }


    });

  }
</script>
<script type="text/javascript" src="<?php echo base_url('assets/rupiah.js') ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>