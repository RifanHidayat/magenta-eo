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

        <h3 class="box-title"><b>Data BAST</b></h3>

        <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
        <a href="<?php echo substr($quotation_number, 0, 2)=="QE"?base_url('Bast/manage_bast_event'):base_url('Bast/manage_bast_other') ?>" class="btn btn-secondary">
            <font color="white"> Back</font>
          </a>

        </div>


      </div>
      <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12 col-xs-12">



            <div class="box">

            

           





                   



              <!-- <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-3 control-label">&ensp;Status</label>
                    <div style="margin-left: 40px;" class="col-sm-3" id="elementStatus">
                 
                  </div>
                   <?php if (in_array('statusBast', $user_permission)) : ?>
                        <button style="border: none; border-radius: 5px;" for="pid_event" onclick="getStatus();" style="width: 50%;" 
                    class="col-sm-2 control-label btn-primary" data-toggle="modal" data-target="#statusUpdate">
                    <font color="white">Change status</font></button>
                  <?php endif; ?>
        
                    
                   </div> -->
              <hr>


              <div class="col-md-6 col-xs-12 pull pull-left">




                <div class="form-group" id="qnumber">
                  <label for="Quatations_number" style="text-align:left;" class="col-sm-8 control-label">Quotation Number</label>
                  <div class="col-sm-12">
                    <input type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" autocomplete="off" value="<?php echo "$quotation_number" ?>">
                  </div>
                </div>
                <div class="form-group" id="qnumber" hidden="">
                  <label for="Quatations_number" style="text-align:left;" class="col-sm-8 control-label">id_bast</label>
                  <div class="col-sm-12">
                    <input type="text" readonly="" class="form-control" id="id_bast" name="id_bast" autocomplete="off" value="<?php echo "$id_bast" ?>">
                  </div>
                </div>
                <div class="form-group" id="qnumber">
                  <label for="Date_quotation" style="text-align:left;" class="col-sm-8 control-label">Date Quotation</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" required="" readonly="" class="form-control" id="date_quotation" name="date_quotation" autocomplete="off" value="<?php echo $date_quotation ?>">
                  </div>

                </div>
                <?= form_error('date_quotation', '<small class="text-danger pl-3">', '</small>') ?>
                <div class="form-group" id="qnumber">
                  <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Customer</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" readonly="" class="form-control" required="" id="customer" name="customer" autocomplete="off" value="<?php echo $customer ?>">
                  </div>
                  <?= form_error('date_expired', '<small class="text-danger pl-3">', '</small>') ?>
                </div>


                <div class="form-group" id="qnumber">
                  <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Title Event</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" class="form-control" required="" id="title_event" readonly="" name="title_event" autocomplete="off" value="<?php echo $title_event ?>">
                  </div>
                  <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="form-group" id="qnumber">

                  <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-8 control-label">Venue Event</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" readonly class="form-control" id="venue_event" name="venue_event" autocomplete="off" value="<?php echo $venue_event ?>">

                  </div>
                  <?= form_error('venue_event', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="form-group" id="qnumber">

                  <label for="email_event" style="text-align:left;" class="col-sm-8 control-label">Date Event </label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" readonly class="form-control" id="date_event" name="date_event" autocomplete="off" value="<?php echo $date_event ?>">
                  </div>


                </div>
                <?= form_error('date_event', '<small class="text-danger pl-3">', '</small>') ?>



                <div class="form-group" id="qnumber">
                  <label for="title_event" style="text-align:left;" class="col-sm-8 control-label">Netto</label>
                  <div class="col-sm-12">
                    <input style="text-align: rigth;" readonly="" type="text" required="" class="form-control" id="total_summary" readonly="" name="total_summary" autocomplete="off" value="<?php echo number_format($netto, 0, ',', '.') ?>">
                  </div>
                </div>
                <div class="form-group" id="qnumber">
                  <label for="title_event" style="text-align:left;" class="col-sm-8 control-label">Sisa BAST</label>
                  <div class="col-sm-12">
                    <input style="text-align: rigth;" type="text" required="" value="<?php echo number_format($sisaBast, 0, ",", ".") ?>" class="form-control" id="total_summary" readonly="" name="sisaBast" autocomplete="off" value="<?php echo set_value('title_event') ?>">
                  </div>
                </div>

                <div class="form-group" id="qnumber" hidden="">
                  <label for="title_event" style="text-align:left;" class="col-sm-8 control-label">Sisa BAST </label>
                  <div class="col-sm-12">
                    <input style="text-align: rigth;"  type="text" required="" class="form-control" value="<?php echo ($sisaBast) ?>" id="total_summary" readonly="" name="sisaBast1" autocomplete="off" value="<?php echo set_value('title_event') ?>">
                  </div>
                </div>


              </div>
              <br>
              <br>
              <br>

              <hr style="height: 1px; border-width: 1px; background-color:#696969;">
              <div class="col-md-10 col-xs-10 pull pull-right">
                <!--          <?php $typepo = substr($k->image_po, -3); ?>
                                <?php $typegr = substr($k->image_gr, -3); ?>
                                <font color="#FFFFFF" size="2px"><a title="Image" onclick="AmbilDataImage('<?= $k->image_po ?>','<?= $k->image_gr ?>','<?php echo $typepo ?>','<?php echo $typegr ?>');" title="Image" class="btn btn-sm bg-gradient-secondary btn-view-file" data-toggle="modal" data-target=".bd-example-modal-lg" data-file="<?= $k->image ?>"><i class="fa fa-eye"></i><font size="2px"> </font></a></font> -->

                <div class="form-group" id="kanan">
                  <label for="pph" style="text-align:left;" class="col-sm-6 control-label">File BAST</label>
                  <div class="col-sm-12">


                    <?php $typepo = substr($imgpo, -3); ?>
                    <?php $typegr = substr($imggr, -3); ?>
                    <Button class="button1" onclick="AmbilDataImage('<?= $imgpo ?>','<?= $imggr ?>','<?php echo $typepo ?>','<?php echo $typegr ?>');" title="Image" class="btn btn-sm bg-gradient-secondary " data-toggle="modal" data-target=".bd-example-modal-lg" data-file="<?= $imggr ?>">View File</Button>
                  </div>

                </div>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">File BAST</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <br>
                      <br>

                      <h3>File PO</h3>
                      <hr>
                      <center>
                        <div id="ViewImagepo"></div>
                      </center>
                      <br>
                      <br>
                      <h3>File GR</h3>
                      <hr>
                      <center>
                        <div id="ViewImagegr"></div>
                      </center>


                      <br>
                      <br>
                    </div>
                  </div>
                </div>


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
                    <input readonly="" disabled="" type="text" required="" class="form-control" id="gr_number" name="gr_number" autocomplete="off" value="<?php echo $gr_number ?>">
                  </div>

                </div>
                <?= form_error('date_quotation', '<small class="text-danger pl-3">', '</small>') ?>
                <div class="form-group" id="qnumber">
                  <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">PO Number</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" class="form-control" required="" id="po_number" name="po_number" autocomplete="off" value="<?php echo $po_number ?>">
                  </div>
                  <?= form_error('po_number', '<small class="text-danger pl-3">', '</small>') ?>
                </div>


                <div class="form-group" id="qnumber">
                  <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Date PO</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" class="form-control" required="" id="date_po" name="date_po" autocomplete="off" value="<?php echo $date_po ?>">
                  </div>
                  <?= form_error('date_po', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group" id="qnumber">
                  <label for="date_expired_event" style="text-align:left;" class="col-sm-8 control-label">Date BAST</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" class="form-control" required="" id="date_expired_event" name="date_bast" autocomplete="off" value="<?php echo $date_bast ?>">
                  </div>
                  <?= form_error('date_bast', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

                <div class="form-group" id="qnumber">

                  <label for="email_event" style="text-align:left;" class="col-sm-8 control-label"> PIC Event </label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" readonly class="form-control" id="pic_po" name="pic_po" autocomplete="off" value="<?php echo $pic_po ?>">
                  </div>


                </div>
                <?= form_error('pic_po', '<small class="text-danger pl-3">', '</small>') ?>



                <div class="form-group" id="qnumber">
                  <label for="title_event" style="text-align:left;" class="col-sm-8 control-label">Jabatan</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" readonly="" required="" class="form-control" id="jabatan_pic" name="jabatan_pic" autocomplete="off" value="<?php echo $jabatan_pic ?>">
                  </div>
                </div>
                <?= form_error('title_event', '<small class="text-danger pl-10">', '</small>') ?>

                <div class="form-group" id="qnumber">
                  <label for="venue_event" style="text-align:left;" class="col-sm-8 control-label">PIC Magenta</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" required="" class="form-control venue_event" id="pic_magenta" name="pic_magenta" autocomplete="off" value="<?php echo $pic_magenta ?>">
                  </div>

                </div>
                <?= form_error('pic_magenta', '<small class="text-danger pl-3">', '</small>') ?>

                <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;" class="col-sm-8 control-label">Jabatan</label>
                  <div class="col-sm-12">
                    <input readonly="" type="text" required="" class="form-control" id="jabatan_magenta" name="jabatan_magenta" autocomplete="off" value="<?php echo $jabatan_magenta ?>">
                  </div>


                </div>
                <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;" class="col-sm-8 control-label">Total BAST</label>
                  <div class="col-sm-12">
                    <input style="text-align: right;" readonly oninput="checkBast()" value="<?php echo number_format($totalBast, 0, ',', '.') ?>" onkeyup="convertToRupiah(this);" type="text" required="" class="form-control" id="totalBast" name="totalBast" autocomplete="off">
                  </div>


                </div>


                <br>
                <br>
                <br>


              </div>



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
            <h4 class="modal-title" id="exampleModalLabel">Update Status</h4>
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


<script type="text/javascript">
  $(document).ready(function() {

    elementStatus1();
  });



  function AmbilDataImage(fileNamepo, fileNamegr, typepo, typegr) {
    console.log(typepo);

    if (typepo == 'pdf') {
      html = '<object type="application/pdf" data="' + fileNamepo + '" width="100%" height="500" style="height: 85vh;"></object>'
    } else {
      html = '<center><img style="height: 80vh; width:80vh"  src="' + fileNamepo + '" ></center>';
    }
    document.getElementById("ViewImagepo").innerHTML = html;
    if (typegr == 'pdf') {
      html = '<object type="application/pdf" data="' + fileNamegr + '" width="100%" height="500" style="height: 85vh;"></object>'
    } else {
      html = '<center><img style="height: 80vh; width:80vh"  src="' + fileNamegr + '"</center>';
    }
    document.getElementById("ViewImagegr").innerHTML = html;
  }


  function getStatus() {

    $('[name="status"]').val($('[name="status"]').val());

  }

  function elementStatus1() {
    var quotation_number = $('[name="id_bast"]').val();
    $.ajax({
      type: 'POST',

      url: '<?php echo base_url("Bast/getStatus") ?>',
      data: 'quotation_number=' + quotation_number,
      dataType: 'json',
      success: function(data) {
        //     var baris='<input disabled="" style="width: 100%%; margin-left: 40px;" type="text" name="status" id="status" value="'+data[0].status+'">';

        //   $("#elementStatus").html(baris);
        // console.log(data);
        $('[name="status"]').val(data[0].status);

      },
      error: function(data) {
        console.log('ERROR');




      }

    });
  }

  function updateStatus() {
    var status = $('[name="status"]').val();
    var note = $('[name="note"]').val();
    var quotation_number = $('[name="id_bast"]').val();
    $.ajax({
      type: 'POST',
      data: 'status=' + status + '&quotation_number=' + quotation_number + '&note=' + note,
      url: '<?php echo base_url("Bast/updateStatus") ?>',
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
            // window.location = "<?php echo base_url('Bast/manage_bast/') ?>";

            
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
  $("#bastMainNav").addClass('active');

  $("#openBastNav").addClass('menu-open');
</script>