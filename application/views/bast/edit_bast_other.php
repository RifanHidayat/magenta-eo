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

        <h3 class="box-title">Edit BAST</h3>

        <div class="card-tools">

        </div>


      </div>
      <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12 col-xs-12">



            <div class="box">

              <form action="<?php echo base_url('Bast/edit_bast/' . $quotation_number . '/' . $id) ?>" method="post" id="SimpanData1" name="formid">
                <?php if (in_array('statusBast', $user_permission)) : ?>
                  <div class="form-group" id="qnumber">

                    <label for="pid_event" style="text-align:left;" class="col-sm-3 control-label">&ensp;Status</label>
                    <div class="col-sm-12">
                      <select class="form-control" required="" id="status" name="status" style="width:45%;" value="<?php echo set_value('pic') ?>">
                        <option value="">Select Status</option>

                        <option value="Open"> Open</option>
                        <option value="Reject"> Reject</option>
                        <option value="Close"> Close</option>


                      </select>
                    </div>

                  </div>
                  <hr>
                <?php endif; ?>


                <div class="col-md-6 col-xs-12 pull pull-left">

                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-8 control-label">Quotation Number</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" autocomplete="off" value="<?php echo "$quotation_number" ?>">
                    </div>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="Date_quotation" style="text-align:left;" class="col-sm-8 control-label">Date Quotation</label>
                    <div class="col-sm-12">
                      <input type="date" required="" readonly="" class="form-control" id="date_quotation" name="date_quotation" autocomplete="off" value="<?php echo $date_quotation ?>">
                    </div>

                  </div>
                  <?= form_error('date_quotation', '<small class="text-danger pl-3">', '</small>') ?>
                  <div class="form-group" id="qnumber">
                    <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Customer</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" required="" id="customer" name="customer" autocomplete="off" value="<?php echo $customer ?>">
                    </div>
                    <?= form_error('date_expired', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                  <div class="form-group" id="qnumber">
                    <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Title Event</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" id="title_event" readonly="" name="title_event" autocomplete="off" value="<?php echo $title_event ?>">
                    </div>
                    <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="qnumber">

                    <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-8 control-label">Venue Event</label>
                    <div class="col-sm-12">
                      <input type="text" readonly class="form-control" id="venue_event" name="venue_event" autocomplete="off" value="<?php echo $venue_event ?>">

                    </div>
                    <?= form_error('venue_event', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="qnumber">

                    <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">Date Event </label>
                    <div class="col-sm-12">
                      <input type="text" readonly class="form-control" id="date_event" name="date_event" autocomplete="off" value="<?php echo $date_event ?>">
                    </div>


                  </div>
                  <?= form_error('date_event', '<small class="text-danger pl-3">', '</small>') ?>



                  <div class="form-group" id="qnumber">
                    <label for="title_event" style="text-align:left;" class="col-sm-8 control-label">Netto</label>
                    <div class="col-sm-12">
                      <input type="text" required="" class="form-control" id="total_summary" readonly="" name="total_summary" autocomplete="off" value="<?php echo number_format($total_summary, 0, ",", ".") ?>">
                    </div>
                  </div>
                  <?= form_error('title_event', '<small class="text-danger pl-10">', '</small>') ?>

                </div>
                <br>
                <br>
                <br>

                <hr style="height: 1px; border-width: 1px; background-color:#696969;">
                <div class="col-md-10 col-xs-10 pull pull-right">

                  <div class="form-group" id="kanan">
                    <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File PO</label>
                    <div class="col-sm-12">
                      <input accept=".jpg,.png,.jpeg,.pdf" id="imgpo" name="imgpo[]" onchange="ValidateSizePO(this)" type="file">
                    </div>

                  </div>
                  <?php
                  $directory = "assets/image_/";
                  $images = glob($directory . "*.*");
                  ?>


                  <div class="form-group" id="kanan">
                    <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File label>
                      <div class="col-sm-12">
                        <input accept=".jpg,.png,.jpeg,.pdf" id="imggr" name="imggr[]" onchange="ValidateSizeGR(this);" type="file">
                      </div>
                  </div>
                  <?php
                  $directory = "assets/image_/";
                  $images = glob($directory . "*.*");
                  ?>




                </div>





                <div class="col-md-6 col-xs-12 pull pull-left">



                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-8 control-label">BAST Number</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" id="bast_number" name="bast_number" autocomplete="off" value="<?php echo $bast_number ?>">
                    </div>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="Date_quotation" style="text-align:left;" class="col-sm-8 control-label">GR Number</label>
                    <div class="col-sm-12">
                      <input type="text" required="" class="form-control" id="gr_number" name="gr_number" autocomplete="off" value="<?php echo $gr_number ?>">
                    </div>

                  </div>
                  <?= form_error('date_quotation', '<small class="text-danger pl-3">', '</small>') ?>
                  <div class="form-group" id="qnumber">
                    <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">PO Number</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" id="po_number" name="po_number" autocomplete="off" value="<?php echo $po_number ?>">
                    </div>
                    <?= form_error('po_number', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                  <div class="form-group" id="qnumber">
                    <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Date PO</label>
                    <div class="col-sm-12">
                      <input readonly onkeypress="return false;" type="date" class="form-control" required="" id="date_po" name="date_po" autocomplete="off" value="<?php echo $date_po ?>">
                    </div>
                    <?= form_error('date_po', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Date BAST</label>
                    <div class="col-sm-12">
                      <input onkeypress="return false;" type="date" class="form-control" required="" id="date_bast" name="date_bast" autocomplete="off" value="<?php echo $date_bast ?>">
                    </div>
                    <?= form_error('date_bast', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="qnumber">

                    <label for="email_event" style="text-align:left;" class="col-sm-8 control-label"> PIC Event </label>
                    <div class="col-sm-12">
                      <input type="text" readonly class="form-control" id="pic_po" name="pic_po" autocomplete="off" value="<?php echo $pic_po ?>">
                    </div>


                  </div>
                  <?= form_error('pic_po', '<small class="text-danger pl-3">', '</small>') ?>



                  <div class="form-group" id="qnumber">
                    <label for="title_event" style="text-align:left;" class="col-sm-8 control-label">Jabatan</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" required="" class="form-control" id="jabatan_pic" name="jabatan_pic" autocomplete="off" value="<?php echo $jabatan_pic ?>">
                    </div>
                  </div>
                  <?= form_error('title_event', '<small class="text-danger pl-10">', '</small>') ?>

                  <div class="form-group" id="qnumber">
                    <label for="venue_event" style="text-align:left;" class="col-sm-8 control-label">PIC Magenta</label>
                    <div class="col-sm-12">
                      <input type="text" required="" class="form-control venue_event" id="pic_magenta" name="pic_magenta" autocomplete="off" value="<?php echo $pic_magenta ?>">
                    </div>

                  </div>
                  <?= form_error('pic_magenta', '<small class="text-danger pl-3">', '</small>') ?>

                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-8 control-label">Jabatan</label>
                    <div class="col-sm-12">
                      <input type="text" required="" class="form-control" id="jabatan_magenta" name="jabatan_magenta" autocomplete="off" value="<?php echo $jabatan_magenta ?>">
                    </div>


                  </div>
                  <?= form_error('date_event', '<small class="text-danger pl-3">', '</small>') ?>
                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-8 control-label">Total BAST</label>
                    <div class="col-sm-12">
                      <input oninput="checkBast()" value="<?php echo $totalBast ?>" onkeyup="convertToRupiah(this);" type="text" required="" class="form-control" id="totalBast" name="totalBast" autocomplete="off">
                    </div>


                  </div>
                  <?= form_error('date_event', '<small class="text-danger pl-3">', '</small>') ?>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                </div>
                <div class="form-group text-left">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Save Changes</button>
                  <a href="<?php echo base_url('Bast/manage_bast') ?>" class="btn btn-warning">
                    <font color="white"> Back</font>
                  </a>
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


<script type="text/javascript">
  $("#imgpo").fileinput({
    uploadUrl: "<?php echo base_url('upload.php') ?>",
    overwriteInitial: true,
    uploadAsync: false,
    minFileCount: 1,
    maxFileCount: 1,
    showUpload: false,
    showRemove: true,
    maxFileSize: 2000,
    showClose: true,
    showClose: true,
    showCaption: true,
    browseLabel: 'browser',
    removeLabel: 'Remove',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-1',

    allowedFileExtensions: ["jpg", "png", "gif", "pdf"]


  });

  $("#imggr").fileinput({
    uploadUrl: "<?php echo base_url('upload.php') ?>",
    overwriteInitial: true,
    uploadAsync: false,
    minFileCount: 1,
    maxFileCount: 1,
    showUpload: false,
    showRemove: true,
    maxFileSize: 2000,
    showClose: true,
    showClose: true,
    showCaption: true,
    browseLabel: 'browser',
    removeLabel: 'Remove',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-1',

    allowedFileExtensions: ["jpg", "png", "gif", "pdf"]


  });
  $(function() {
    var dateToday = new Date();

    $('#date_po').datepicker({
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

    $('#date_bast').datepicker({
      dateFormat: 'yy-mm-dd',
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

  function ValidateSizePO(file) {
    var FileSize = file.files[0].size / 1024 / 1024; // in MB
    if (FileSize > 2) {
      alert('File size exceeds 2 MB');
      $('#imgpo').val(''); //for clearing with Jquery
    } else {

    }
  }

  function ValidateSizeGR(file) {
    var FileSize = file.files[0].size / 1024 / 1024; // in MB
    if (FileSize > 2) {
      alert('File size exceeds 2 MB');
      $('#imggr').val(''); //for clearing with Jquery
    } else {

    }
</script>