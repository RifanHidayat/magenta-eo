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
      <?php

      $idd = substr($quotation_number, 0, 2);

      if ($idd == "QE") {
      ?>
        <div class="card-header">
          <h3 class="box-title"><b>Add BAST</b></h3>
          <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
            <a href="<?php echo base_url('Quotation/manage_quotation') ?>" class="btn btn-secondary">
              <font color="white">Back</font>
            </a>

          </div>
        </div>
      <?php

      } else {
      ?>
        <div class="card-header">
          <h3 class="box-title"><b>Add BAST</b></h3>
          <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
            <a href="<?php echo base_url('Quotation/manage_quotation_other') ?>" class="btn btn-secondary">
              <font color="white">Back</font>
            </a>

          </div>
        </div>
      <?php

      }


      ?>

      <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12 col-xs-12">


            <div class="box">

              <form action="<?php echo base_url('Bast/create_bast/' . $quotation_number) ?>" method="post" id="SimpanData" name="formid" class="form-horizontal" enctype="multipart/form-data">

                <div class="col-md-6 col-xs-12 pull pull-left">





                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-8 control-label">Quotation Number</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" autocomplete="off" value="<?php echo $quotation_number ?>">
                    </div>

                  </div>
                  <?= form_error('Quatations_number', '<small class="text-danger pl-3">', '</small>') ?>
                  <div class="form-group" id="qnumber">
                    <label for="Date_quotation" style="text-align:left;" class="col-sm-8 control-label">Date Quotation</label>
                    <div class="col-sm-12">
                      <input type="text" required="" readonly="" class="form-control" id="date_quotation" name="date_quotation" autocomplete="off" value="<?php echo set_value('Date_quotation') ?>">
                    </div>

                  </div>
                  <?= form_error('date_quotation', '<small class="text-danger pl-3">', '</small>') ?>
                  <div class="form-group" id="qnumber">
                    <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Customer</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" required="" id="customer" name="customer" autocomplete="off" value="<?php echo set_value('date_expired_event') ?>">
                    </div>
                    <?= form_error('date_expired', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                  <div class="form-group" id="qnumber">
                    <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Title Event</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" id="title_event" readonly="" name="title_event" autocomplete="off" value="<?php echo set_value('date_expired_event') ?>">
                    </div>
                    <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="qnumber">

                    <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-8 control-label">Venue Event</label>
                    <div class="col-sm-12">
                      <input type="text" readonly class="form-control" id="venue_event" name="venue_event" autocomplete="off" value="<?php echo set_value('customer_event') ?>">

                    </div>
                    <?= form_error('venue_event', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="qnumber">

                    <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">Date Event </label>
                    <div class="col-sm-12">
                      <input type="text" readonly class="form-control" id="date_event" name="date_event" autocomplete="off" value="<?php echo set_value('email_event') ?>">
                    </div>


                  </div>
                  <?= form_error('date_event', '<small class="text-danger pl-3">', '</small>') ?>



                  <div class="form-group" id="qnumber">
                    <label for="title_event" style="text-align:left;" class="col-sm-8 control-label">Netto</label>
                    <div class="col-sm-12">
                      <input type="text" required="" class="form-control" id="total_summary" readonly="" name="total_summary" autocomplete="off" value="<?php echo set_value('title_event') ?>">
                    </div>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="title_event" style="text-align:left;" class="col-sm-8 control-label">Sisa BAST</label>
                    <div class="col-sm-12">
                      <input type="text" required="" class="form-control" id="total_summary" readonly="" name="sisaBast" autocomplete="off" value="<?php echo set_value('title_event') ?>">
                    </div>
                  </div>
                  <div class="form-group" id="qnumber" hidden="">
                    <label for="title_event" style="text-align:left;" class="col-sm-8 control-label">Sisa BAST </label>
                    <div class="col-sm-12">
                      <input type="text" required="" class="form-control" id="total_summary" readonly="" name="sisaBast1" autocomplete="off" value="<?php echo set_value('title_event') ?>">
                    </div>
                  </div>

                </div>
                <br>
                <br>
                <br>

                <hr style="height: 1px; border-width: 1px; background-color:#696969;">



                <div class="col-md-10 col-xs-10 pull pull-right">

                  <div class="form-group" id="kanan">
                    <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File PO</label>
                    <div class="col-sm-12">
                      <input accept=".jpg,.png,.jpeg,.pdf" id="imgpo" name="imgpo" onchange="ValidateSizePO(this)" type="file">
                    </div>

                  </div>
                  <?php
                  $directory = "assets/imagebastpo/";
                  $images = glob($directory . "*.*");
                  ?>


                  <div class="form-group" id="kanan">
                    <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File GR</label>
                    <div class="col-sm-12">
                      <input accept=".jpg,.png,.jpeg,.pdf" id="imggr" onchange="ValidateSizeGR()" name="imggr" type="file">
                    </div>

                  </div>
                  <?php
                  $directory = "assets/imageBastgr/";
                  $images = glob($directory . "*.*");
                  ?>




                </div>

                <div class="col-md-6 col-xs-12 pull pull-left">



                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number" style="text-align:left;" class="col-sm-8 control-label">BAST Number</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" id="bast_number" name="bast_number" autocomplete="off" value="<?php echo set_value('Quatations_number_event') ?>">
                    </div>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="Date_quotation" style="text-align:left;" class="col-sm-8 control-label">GR Number</label>
                    <div class="col-sm-12">
                      <input type="text" required="" class="form-control" id="gr_number" name="gr_number" autocomplete="off" value="<?php echo set_value('Date_quotation') ?>">
                    </div>

                  </div>
                  <?= form_error('date_quotation', '<small class="text-danger pl-3">', '</small>') ?>
                  <div class="form-group" id="qnumber">
                    <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">PO Number</label>
                    <div class="col-sm-12">
                      <input type="text" readonly class="form-control" required="" id="po_number" name="po_number" autocomplete="off" value="<?php echo set_value('po_number') ?>">
                    </div>
                    <?= form_error('po_number', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                  <div class="form-group" id="qnumber">
                    <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Date PO</label>
                    <div class="col-sm-12">
                      <input readonly onkeypress="return false;" type="text" placeholder="dd/mm/yyyy" class="form-control" id="date_po" name="date_po" autocomplete="off">
                    </div>
                    <?= form_error('date_po', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Date BAST</label>
                    <div class="col-sm-12">
                      <input onkeypress="return false;" type="text" placeholder="dd/mm/yyyy" class="form-control" required="" id="date_bast" name="date_bast" autocomplete="off" value="<?php echo set_value('date_bast') ?>">
                    </div>
                    <?= form_error('date_bast', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="qnumber">

                    <label for="email_event" style="text-align:left;" class="col-sm-8 control-label"> PIC Event </label>
                    <div class="col-sm-12">
                      <input type="text" readonly class="form-control" id="pic_po" name="pic_po" autocomplete="off" value="<?php echo set_value('pic_po') ?>">
                    </div>


                  </div>
                  <?= form_error('pic_po', '<small class="text-danger pl-3">', '</small>') ?>



                  <div class="form-group" id="qnumber">
                    <label for="title_event" style="text-align:left;" class="col-sm-8 control-label">Jabatan</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" required="" class="form-control" id="jabatan_pic" name="jabatan_pic" autocomplete="off" value="<?php echo set_value('jabatan_pic') ?>">
                    </div>
                  </div>
                  <?= form_error('title_event', '<small class="text-danger pl-10">', '</small>') ?>

                  <div class="form-group" id="qnumber">
                    <label for="venue_event" style="text-align:left;" class="col-sm-8 control-label">PIC Magenta</label>
                    <div class="col-sm-12">
                      <input type="text" required="" class="form-control venue_event" id="pic_magenta" name="pic_magenta" autocomplete="off" value="Myrawati Setiawan">
                    </div>

                  </div>
                  <?= form_error('pic_magenta', '<small class="text-danger pl-3">', '</small>') ?>

                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-8 control-label">Jabatan</label>
                    <div class="col-sm-12">
                      <input type="text" required="" class="form-control" id="jabatan_magenta" name="jabatan_magenta" autocomplete="off" value="Project Magenta">
                    </div>


                  </div>
                  <?= form_error('date_event', '<small class="text-danger pl-3">', '</small>') ?>

                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-8 control-label">Total BAST</label>
                    <div class="col-sm-12">
                      <input oninput="checkBast()" onkeyup="convertToRupiah(this);" type="text" required="" class="form-control" id="totalBast" name="totalBast" autocomplete="off">
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
                  <br>
                  <br>

                </div>
                <div class="form-group text-left">
                  <!--      <button type="submit" class="btn btn-primary">Create BAST</button> -->

                  <button type="submit" class="btn btn-primary btnSave" type="button">
                    <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                    Create BAST
                  </button>



                </div>








              </form>

              <!--  Content form -->


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
    $("#imagepo").hide();
    $("#imagegr").hide();
    var data = $('#Quatations_number').val();
    console.log(data.substring(0, 2));
    if (data.substring(0, 2) == "QE") {
      DataQuotation($('#Quatations_number').val());

    } else {
      DataQuotation1($('#Quatations_number').val());


    }




  });


  function changePicturePO() {
    $('#uploadpo').click();
  }

  function readURLPO(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagepo')
          .attr('src', e.target.result);

      };
      reader.readAsDataURL(input.files[0]);
      $("#imagepo").show();
    }
  }

  function changePictureGR() {
    $('#uploadgr').click();
  }

  function readURLGR(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagegr')
          .attr('src', e.target.result);

      };
      reader.readAsDataURL(input.files[0]);
      $("#imagegr").show();
    }
  }


  function DataQuotation(quotation_number) {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Bast/AmbilDataQuotation/") ?>',
      data: 'quotation_number=' + quotation_number,
      dataType: 'json',

      success: function(hasil) {
        console.log(hasil[0].email);
        console.log(hasil);
        $('#po_number').val(hasil[0].po_number);

        $('[name="Quatations_number"]').val(hasil[0].quotation_number);
        $('[name="date_quotation"]').val(hasil[0].date_quotation);
        $('[name="customer"]').val(hasil[0].customer);
        $('[name="title_event"]').val(hasil[0].tittle_event);
        $('[name="venue_event"]').val(hasil[0].venue_event);
        $('[name="date_event"]').val(hasil[0].date_event);
        $('[name="total_summary"]').val(hasil[0].netto.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('[name="jabatan_pic"]').val(hasil[0].jabatan);
        $('[name="pic_po"]').val(hasil[0].pic_name);
        $('[name="date_po"]').val(hasil[0].date_po_number);
        $('[name="sisaBast"]').val(hasil[0].sisa_bast.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('[name="sisaBast1"]').val(hasil[0].sisa_bast.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));

        //sisaBast();
        bast_number();
      },
      error: function(hasil) {

      }
    });

  }

  function DataQuotation1(quotation_number) {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Bast/AmbilDataQuotationOther/") ?>',
      data: 'quotation_number=' + quotation_number,
      dataType: 'json',

      success: function(hasil) {
        $('#date_po').val(hasil[0].date_po_number.toString());

        $('#po_number').val(hasil[0].po_number);
        $('[name="Quatations_number"]').val(hasil[0].quotation_number);
        $('[name="date_quotation"]').val(hasil[0].date_quotation);
        $('[name="customer"]').val(hasil[0].customer);
        $('[name="title_event"]').val(hasil[0].tittle_event);
        $('[name="total_summary"]').val(hasil[0].total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('[name="jabatan_pic"]').val(hasil[0].jabatan);
        $('[name="pic_po"]').val(hasil[0].pic_name);
        $('[name="sisaBast"]').val(hasil[0].sisa_bast.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
        $('[name="sisaBast1"]').val(hasil[0].sisa_bast.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));

        console.log(hasil[0].date_po_number);
        bast_number();

      },
      error: function(hasil) {


      }


    });

  }


  function bast_number() {

    var date = new Date();
    var tahun = date.getFullYear();
    var t = tahun.toString()
    var bulan = date.getMonth();
    var tanggal = date.getDate();
    var hari = date.getDay();
    var angka;

    if (String(bulan + 1) == "1") {
      angka = "I";

    } else if (String(bulan + 1) == "2") {
      angka = "II";


    } else if (String(bulan + 1) == "3") {
      angka = "III";


    } else if (String(bulan + 1) == "4") {
      angka = "IV";


    } else if (String(bulan + 1) == "5") {
      angka = "V";


    } else if (String(bulan + 1) == "6") {
      angka = "VI";


    } else if (String(bulan + 1) == "7") {
      angka = "VII";



    } else if (String(bulan + 1) == "8") {
      angka = "VIII";


    } else if (String(bulan + 1) == "9") {
      angka = "IX";


    } else if (String(bulan + 1) == "10") {
      angka = "X";


    } else if (String(bulan + 1) == "11") {
      angka = "XI";


    } else if (String(bulan + 1) == "12") {
      angka = "XII";


    }



    var title = $('[name="title_event"]').val();

    $('[name="bast_number"]').val("NO. " + t.substring(2, 4) + (bulan + 1) + tanggal + "/" + title + "/" + angka + "/" + t)

  }



  $(function() {
    var dateToday = new Date();

    $('#date_bast').datepicker({
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



  $("#imgpo").fileinput({

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

  });

  $("#imggr").fileinput({

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
  });

  $("#bastMainNav").addClass('active');

  $("#openBastNav").addClass('menu-open');

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
  }


  $('#SimpanData').submit(function(e) {
    e.preventDefault();
    showIndikator();
    cekBast();



  });


  function cekBast() {
    var id = $('#Quatations_number').val();
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Bast/cekBast1/") ?>',
      data: 'quotation_number=' + id,
      dataType: 'json',
      success: function(hasil) {
        console.log(hasil);

        if (hasil.status == 'tersedia') {
          Swal.fire({
            title: 'Oops',
            text: "Data BAST sudah tersedia",
            icon: 'warning',
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
        hiddenIndikator();



      }


    });

  }

  function sisaBast() {
    var totalBast1 = $('[name="totalBast"]').val();
    var totalBast = Number(totalBast1.replace(/[^\w\s]/gi, ''));
    var total_summary1 = $('[name="sisaBast1"]').val();
    var total_summary = Number(total_summary1.replace(/[^\w\s]/gi, ''));

    var sisaBast1 = (Number(total_summary) - Number(totalBast));
    $('[name="sisaBast"]').val(sisaBast);
    var sisaBast = sisaBast1.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    $('[name="sisaBast"]').val(sisaBast);

  }

  //validasi sisa bast
  function checkBast() {
    var totalBast1 = $('[name="totalBast"]').val();
    var totalBast = Number(totalBast1.replace(/[^\w\s]/gi, ''));
    var sisa1 = $('[name="sisaBast1"]').val();
    var sisa = Number(sisa1.replace(/[^\w\s]/gi, ''));

    if (totalBast > sisa) {
      alert("Total Bast tidak boleh melebihi " + sisa1);
      $('[name="totalBast"]').val(sisa1);


    }
    sisaBast();



  }
</script>
<script type="text/javascript" src="<?php echo base_url('assets/rupiah.js') ?>"></script>