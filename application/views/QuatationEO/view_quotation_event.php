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
                    <h3 class="box-title"><b>Data Quotation Event</b></h3>

                    <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
                      <a style="margin-left: 3%" href="<?php echo base_url('Quotation/manage_quotation') ?>" class="btn btn-secondary">
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
                            <select readonly style="width: 20%;margin-left: 6%" class="form-control" required="" id="status" name="status" style="width:100%;" value="<?php echo set_value('pic') ?>">

                              <option value="Open"> Open</option>
                              <option value="Reject"> Reject</option>
                              <!-- <option value="Close"> Close</option> -->
                              <option value="Final">Final</option>


                            </select>

                            <?php if (in_array('statusQuatations', $user_permission)) : ?>
                              <button style="border: none; border-radius: 5px;margin-left: 5%" for="pid_event" disabled="" style="width: 50%;" class="col-sm-2 control-label btn-primary">
                                <font color="white">Save Changes</font>
                              </button>
                            <?php endif; ?>


                          </div>
                          <div class="form-group" id="qnumber">
                            <label style="margin-left: 20px;" for="cphone">Note</label>
                            <textarea readonly="" style="margin-left: -150px; width:20% " type="text" class="form-control" id="note" name="note" autocomplete="off"></textarea>
                          </div>
                        <?php  } else { ?>
                          <div class="form-group" id="qnumber">

                            <label for="pid_event" style="text-align:left;" class="col-sm-3 control-label">&ensp;Status</label>
                            <select style="width: 20%;margin-left: 6%" class="form-control" required="" id="status" name="status" style="width:100%;" value="<?php echo set_value('pic') ?>">

                              <option value="Open"> Open</option>
                              <option value="Reject"> Reject</option>
                              <!-- <option value="Close"> Close</option> -->
                              <option value="Final">Final</option>


                            </select>

                            <?php if (in_array('statusQuatations', $user_permission)) : ?>
                              <button style="border: none; border-radius: 5px;margin-left: 5%" for="pid_event" onclick="updateStatus();" style="width: 50%;" class="col-sm-2 control-label btn-primary">
                                <font color="white">Save Changes</font>
                              </button>
                            <?php endif; ?>


                          </div>
                          <div class="form-group" id="qnumber">
                            <label style="margin-left: 15px;" for="cphone">Note</label>
                            <textarea style="margin-left: -170px; width:20% " type="text" class="form-control" id="note" name="note" autocomplete="off"></textarea>
                          </div>

                        <?php  }
                        ?>





                        <hr>


                        <div class="col-md-10 col-xs-10 pull pull-right">

                          <div class="form-group" id="kanan">
                            <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Comissionable Cost</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" readonly="" id="Comissionable_cost" name="Comissionable_cost" readonly="" autocomplete="off" value="0">

                              <input type="text" class="form-control" readonly="" id="Comissionable_costhidden" name="Comissionable_costhidden" readonly="" autocomplete="off" value="0" hidden="">
                            </div>
                          </div>
                          <div class="form-group" id="kanan">
                            <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Non-Fee Cost</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" readonly="" id="non_fee" name="non_fee" readonly="" autocomplete="off" value="0">

                              <input type="text" class="form-control" readonly="" id="non_feehidden" name="non_feehidden" readonly="" autocomplete="off" value="0" hidden="">
                            </div>
                          </div>
                          <div class="form-group" id="kanan">
                            <label id="asflabel" for="Quatations_number" style="text-align:left;" class="col-sm-2 control-label" id>ASF</label>
                            <div class="col-sm-4" id="kananasf">
                              <input type="Number" readonly="" class=" col-sm-7 form-control" value="0" name="asf_percen" id="asf_percen" oninput="hitungasf();" name="asf_percen" autocomplete="off">
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
                              <input type="number" readonly class=" col-sm-7 form-control" placeholder="0" required="" name="discount_percent_event" id="discount_percent_event" oninput="discount_event_function()" name="discount_percen" autocomplete="off">
                              <label for="Quatations_number" style="text-align:left;" class="col-sm-1 control-label">%</label>

                            </div>

                            <div class="col-sm-12">
                              <input type="text" readonly="" class="col-sm-12 form-control" id="discount_event" name="discount_event" autocomplete="off" readonly="" value="0">
                              <input type="text" readonly="" class="form-control" id="discount_event_hidden" name="discount_event_hidden" autocomplete="off" readonly="" value="0" hidden="">
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
                              <input type="Number" class="form-control" id="ppn_hidden" name="ppn_hidden" readonly="" autocomplete="off" value="0" hidden="">
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
                            <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File Quotation Event</label>
                            <div class="col-sm-12">

                              <?php $type = substr($img, -3); ?>
                              <Button class="button1" onclick="AmbilDataImage('<?= $img ?>','<?= $type ?>');" title="Image" class="btn btn-sm bg-gradient-secondary btn-view-file" data-toggle="modal" data-target=".bd-example-modal-lg" data-file="<?= $img ?>">View File</Button>
                            </div>

                          </div>

                          <div class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel">File Quotation Event </h4>
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




                        </div>

                        <div class="col-md-6 col-xs-12 pull pull-left">



                          <div class="form-group" id="qnumber">
                            <label for="Quatations_number" style="text-align:left;" class="col-sm-7 control-label">Quotation Number</label>
                            <div class="col-sm-12">
                              <input type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" autocomplete="off" value="<?php echo $quotation_number ?>">
                            </div>
                          </div>
                          <div class="form-group" id="qnumber">
                            <label for="Date_quotation" style="text-align:left;" class="col-sm-7 control-label">Date Quotation</label>
                            <div class="col-sm-12">
                              <input readonly="" type="text" required="" class="form-control" id="date_quotation_event" name="date_quotation_event" autocomplete="off" value="<?php echo set_value('Date_quotation') ?>">
                            </div>

                          </div>
                          <?= form_error('date_quotation', '<small class="text-danger pl-3">', '</small>') ?>
                          <div class="form-group" id="qnumber">
                            <label for="date_expired_event" style="text-align:left;" class="col-sm-7 control-label">Date Expired</label>
                            <div class="col-sm-12">
                              <input readonly="" type="text" class="form-control" required="" id="date_expired_event" name="date_expired_event" autocomplete="off" value="<?php echo set_value('date_expired_event') ?>">
                            </div>
                            <?= form_error('date_expired', '<small class="text-danger pl-3">', '</small>') ?>
                          </div>




                          <div class="form-group" id="qnumber">

                            <label for="pid_event" style="text-align:left;" class="col-sm-7 control-label">PIC Event</label>
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

                            <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">Customer PIC Event</label>
                            <div class="col-sm-12">
                              <input readonly="" type="text" readonly class="form-control" id="customerEvent" name="customerEvent" autocomplete="off" value="<?php echo set_value('customerEvent') ?>">

                            </div>
                            <?= form_error('customeEvent', '<small class="text-danger pl-3">', '</small>') ?>
                          </div>

                          <div class="form-group" id="qnumber" hidden="">

                            <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">id customer</label>
                            <div class="col-sm-12">
                              <input type="text" readonly class="form-control" id="id_customer" name="id_customer" autocomplete="off" value="<?php echo set_value('id_customer') ?>">

                            </div>
                            <?= form_error('customeEvent', '<small class="text-danger pl-3">', '</small>') ?>
                          </div>
                          <div class="form-group" id="qnumber" hidden="">

                            <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">PIC Event</label>
                            <div class="col-sm-12">
                              <input readonly="" type="email" readonly class="form-control" id="picEvent1" name="picEvent1" autocomplete="off" value="<?php echo set_value('picEvent1') ?>">

                            </div>
                            <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                          </div>

                          <div class="form-group" id="qnumber">

                            <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">Email PIC Event </label>
                            <div class="col-sm-12">
                              <input readonly="" type="email" readonly class="form-control" id="emailEvent" name="emailEvent" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                            </div>


                          </div>





                          <div class="form-group" id="qnumber">

                            <label for="pid_event" style="text-align:left;" class="col-sm-7 control-label">PIC PO</label>
                            <div class="col-sm-12">
                              <select disabled="" class="form-control" required="" id="pic_event" name="pic_event" style="width:99%;" onchange="DataPICEvent()" value="<?php echo set_value('pic') ?>">
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
                              <input type="email" readonly class="form-control" id="kppn" name="kppn" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                            </div>


                          </div>

                          <div class="form-group" id="qnumber" hidden="">

                            <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">pph </label>
                            <div class="col-sm-12">
                              <input type="email" readonly class="form-control" id="kpph" name="kpph" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                            </div>


                          </div>



                          <div class="form-group" id="qnumber" hidden="">

                            <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">PIC Name</label>
                            <div class="col-sm-12">
                              <input readonly="" type="email" readonly class="form-control" id="pic_event1" name="pic_event1" autocomplete="off" value="<?php echo set_value('pic_event1') ?>">

                            </div>
                            <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                          </div>
                          <div class="form-group" id="qnumber">

                            <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">Customer</label>
                            <div class="col-sm-12">
                              <input readonly="" type="email" readonly class="form-control" id="customer_event" name="customer_event" autocomplete="off" value="<?php echo set_value('customer_event') ?>">

                            </div>
                            <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                          </div>

                          <div class="form-group" id="qnumber">

                            <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">Email PIC PO </label>
                            <div class="col-sm-12">
                              <input readonly="" type="email" readonly class="form-control" id="email_event" name="email_event" autocomplete="off" value="<?php echo set_value('email_event') ?>">
                            </div>


                          </div>
                          <?= form_error('email_event', '<small class="text-danger pl-3">', '</small>') ?>







                          <div class="form-group" id="qnumber">
                            <label for="title_event" style="text-align:left;" class="col-sm-7 control-label">Title Event</label>
                            <div class="col-sm-12">
                              <input readonly="" type="text" required="" class="form-control" id="title_event" name="title_event" placeholder="Titile Event" autocomplete="off" value="<?php echo set_value('title_event') ?>">
                            </div>
                          </div>
                          <?= form_error('title_event', '<small class="text-danger pl-10">', '</small>') ?>

                          <div class="form-group" id="qnumber">
                            <label for="venue_event" style="text-align:left;" class="col-sm-7 control-label">Venue Event</label>
                            <div class="col-sm-12">
                              <input readonly="" type="text" required="" class="form-control venue_event" id="venue_event" name="venue_event" placeholder="Venue Event" autocomplete="off" value="<?php echo set_value('vanue_event') ?>">
                            </div>

                          </div>
                          <?= form_error('venue_event', '<small class="text-danger pl-3">', '</small>') ?>

                          <div class="form-group" id="qnumber">
                            <label for="Date_event" style="text-align:left;" class="col-sm-7 control-label">Date event</label>
                            <div class="col-sm-12">
                              <input readonly="" type="text" required="" class="form-control" id="date_event" name="date_event" autocomplete="off" value="<?php echo set_value('date_event') ?>">
                            </div>


                          </div>
                          <?= form_error('date_event', '<small class="text-danger pl-3">', '</small>') ?>



                        </div>
                        <h3 style="margin-left: 10px;">Non-Fee Cost</h3>



                        <?php
                        foreach ($quotation_sub_item as $name) :
                          $no = 0;
                          if ($name->metode == "Non-Fee Cost") {

                        ?>


                            <center>
                              <h4><?php echo  $name->name ?></h4>
                            </center>


                            <table class="col-10 table justify-center table-bordered" align="center" style="margin: auto;" border="1" align="center">
                              <thead class="thead-dark">
                                <tr>
                                  <th>
                                    <center>No</center>
                                  </th>
                                  <th>
                                    <center>Description</center>
                                  </th>
                                  <th>
                                    <center>Quantity</center>
                                  </th>
                                  <th>
                                    <center>Frequency</center>
                                  </th>
                                  <th>
                                    <center>Rate </center>
                                  </th>
                                  <th>
                                    <center>Sub Total</center>
                                  </th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php
                                $total = 0;
                                foreach ($quotation_item as $k) :



                                ?>

                                  <?php if ($name->name == $k->name_item) {
                                    $no++;
                                    $subtotal = (str_replace('.', '', $k->subtotal));
                                    $total = $total + $subtotal;



                                  ?>
                                    <tr>
                                      <td style="width: 5%">
                                        <center><?php echo $no; ?></center>
                                      </td>
                                      <td style="width: 30%"><?php echo $k->item_value; ?></td>
                                      <td style="width: 10%">
                                        <center><?php echo $k->quantity . " " . $k->satuanq; ?></center>
                                      </td>
                                      <td style="width: 10%">
                                        <center><?php echo $k->frrequency . " " . $k->satuanf; ?></center>
                                      </td>
                                      <td style="width: 15%">IDR <p align="right" style="margin-top: -21px;"><?php echo number_format($k->rate, 0, ",", ".") ?></p>
                                      </td>
                                      <td style="width: 20%">IDR <p align="right" style="margin-top: -21px;"> <?php echo number_format($k->subtotal, 0, ",", ".") ?></p>
                                      </td>
                                    </tr>
                                  <?php  } ?>
                                <?php endforeach ?>

                              </tbody>
                              <tfoot>
                                <th colspan="5">Grand Total</th>

                                <th>IDR <p align="right" style="margin-top: -21px;"><?php echo number_format($total, 0, ",", "."); ?></p>
                                </th>

                              </tfoot>
                            </table>
                            </center>
                            <?php $no = 0; ?>
                          <?php } ?>
                        <?php endforeach ?>
                        <?php $total = 0; ?>
                        <br>
                        <br>






                        <h3 style="margin-left: 10px;">Comissionable Cost</h3>



                        <?php
                        foreach ($quotation_sub_item as $name) :
                          $no = 0;
                          if ($name->metode == "Comissionable Cost") {

                        ?>
                            <br>

                            <center>
                              <h4><?php echo  $name->name ?></h4>
                            </center>


                            <table class="col-10 table justify-center table-bordered" align="center" style="margin: auto;" border="1" align="center">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">
                                    <center>No</center>
                                  </th>
                                  <th scope="col">
                                    <center>Description</center>
                                  </th>
                                  <th scope="col">
                                    <center>Quantity</center>
                                  </th>
                                  <th scope="col">
                                    <center>Frequency</center>
                                  </th>
                                  <th scope="col">
                                    <center>Rate </center>
                                  </th>
                                  <th scope="col">
                                    <center>Sub Total</center>
                                  </th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php
                                $total = 0;
                                foreach ($quotation_item as $k) :


                                ?>

                                  <?php if ($name->name == $k->name_item) {
                                    $no++;
                                    $subtotal = (str_replace('.', '', $k->subtotal));
                                    $total = $total + $subtotal;


                                  ?>
                                    <tr>
                                      <td style="width: 5%">
                                        <center><?php echo $no; ?></center>
                                      </td>
                                      <td style="width: 35%"><?php echo $k->item_value; ?></td>
                                      <td style="width: 10%">
                                        <center><?php echo $k->quantity . " " . $k->satuanq; ?></center>
                                      </td>
                                      <td style="width: 10%">
                                        <center><?php echo $k->frrequency . " " . $k->satuanf; ?></center>
                                      </td>
                                      <td style="width: 15%">IDR <p align="right" style="margin-top: -21px;"><?php echo number_format($k->rate, 0, ",", ".") ?></p>
                                      </td>
                                      <td style="width: 20%">IDR <p align="right" style="margin-top: -21px;"><?php echo number_format($k->subtotal, 0, ",", ".") ?></p>
                                      </td>
                                    </tr>
                                  <?php  } ?>
                                <?php endforeach ?>

                              </tbody>
                              <tfoot>
                                <th colspan="5">Grand Total</th>

                                <th>IDR <p align="right" style="margin-top: -21px;"> <?php echo number_format($total, 0, ",", "."); ?></p>
                                </th>
                                <?php $total = 0; ?>

                              </tfoot>
                            </table>
                            </center>
                            <?php $no = 0; ?>
                          <?php } ?>
                        <?php endforeach ?>


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

                        </div>
                        <div class="form-group">
                          <label for="cphone">Note</label>
                          <input type="text" class="form-control" id="note" name="note" autocomplete="off">
                        </div>
                        <small class="text-danger pl-3" id="status_error"></small>
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
              <div class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="exampleModalLabel">Image EO </h4>
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


              <!-- /.container-fluid -->
        </section>


        <!-- /.content -->
      </div>




      <script type="text/javascript">
        $(document).ready(function() {
          DataQuotation($('[name="Quatations_number"]').val());
          elementStatus1();
        });




        function DataQuotation(id) {
          var id = $('[name="Quatations_number"]').val();
          $.ajax({
            type: "post",
            url: '<?php echo base_url("Quotation/AmbilDataQuotation/") ?>',
            data: 'quotation_number=' + id,

            dataType: 'json',

            success: function(hasil) {
              console.log(hasil);
              var cos = hasil[0].comissionable_cost.toString().replace(/[^\w\s]/gi, '');
              var fee = hasil[0].nonfee.toString().replace(/[^\w\s]/gi, '');
              var asf = hasil[0].asf.toString().replace(/[^\w\s]/gi, '');
              var sub_total = Number(cos) + Number(fee) + Number(asf);
              $('#customerEvent').val(hasil[0].customer_event);
              $('[name="Quatations_number"]').val(hasil[0].quotation_number);
              $('[name="date_expired_event"]').val(hasil[0].date_expired);
              $('[name="title_event"]').val(hasil[0].tittle_event);
              $('[name="venue_event"]').val(hasil[0].venue_event);
              $('[name="date_event"]').val(hasil[0].date_event);
              $('[name="pic_event"]').val(hasil[0].id);
              $('[name="pic_event1"]').val(hasil[0].pic_name);
              $('[name="customer_event"]').val(hasil[0].customer);
              $('[name="email_event"]').val(hasil[0].pic_email);
              $('[name="date_quotation_event"]').val(hasil[0].date_quotation);
              $('[name="asf_percen"]').val(hasil[0].asfp);
              $('[name="emailEvent"]').val(hasil[0].email_event);
              $('[name="picEvent"]').val(hasil[0].id_event);
              $('[name="id_customer"]').val(hasil[0].id_customer);
              $('#picEvent1').val(hasil[0].pic_event);
              $('#asf').val(hasil[0].asf.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
              $('[name="Comissionable_cost"]').val(hasil[0].comissionable_cost.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
              $('#non_fee').val(hasil[0].nonfee.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
              $('#ppn').val(hasil[0].ppn.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
              $('#pph').val('(' + hasil[0].pph.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ')');
              $('#total_summary').val(sub_total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
              $('#grand_total').val(hasil[0].grand_total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
              $('#status').val(hasil[0].status);
              $('#revisi').val(hasil[0].revisi);
              $('#netto_event').val(hasil[0].netto.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
              $('#discount_event').val('(' + hasil[0].discount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ')');
              $('#discount_percent_event').val(hasil[0].discount_percent);




            },
            error: function(hasil) {



            }


          });

        }




        //get pic even even
        function updateStatus() {
          var status = $('[name="status"]').val();
          var quotation_number = $('[name="Quatations_number"]').val();
          var note = $('[name="note"]').val();

          $.ajax({
            type: 'POST',
            data: 'status=' + status + '&quotation_number=' + quotation_number + '&note=' + note,
            url: '<?php echo base_url("Quotation/updateStatus") ?>',
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
                  window.location = "<?php echo base_url('Quotation/manage_quotation/') ?>";
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

        function elementStatus1() {
          var quotation_number = $('[name="Quatations_number"]').val();
          $.ajax({
            type: 'POST',

            url: '<?php echo base_url("Quotation/getStatus") ?>',
            data: 'quotation_number=' + quotation_number,
            dataType: 'json',
            success: function(data) {
              var baris = '<input disabled="" style="width: 100%%; margin-left: 45px;" type="text" name="status" id="status" value="' + data[0].status + '">';

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

        function AmbilDataImage(fileName, type) {

          if (type == 'pdf') {
            html = '<object type="application/pdf" data="' + fileName + '" width="100%" height="500" style="height: 85vh;"></object>'


          } else {
            html = '<center><img style="height: 80vh; width:80vh"  src="' + fileName + '" ></center>';

          }

          document.getElementById("ViewImage").innerHTML = html;

        }
        $("#quotationMainNav").addClass('active');
        $("#manageQuotationeventNav").addClass('active');
        $("#openQuotationNav").addClass('menu-open');
      </script>
      <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js') ?>"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>