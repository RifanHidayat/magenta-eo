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
                <h3 class="box-title"><b>Edit Quotation Other</b></h3>
                <div class="card-tools" style="margin-top: -35px;margin-right: 13px">
                  <a href="<?php echo base_url('Quotation/manage_quotation_other') ?>" class="btn btn-secondary">
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
                    <form action="<?php echo base_url('Quotation/aksi_update_quotation_other') ?>" method="post" name="formid" class="form-horizontal" enctype="multipart/form-data">

                      <!--  <?php if (in_array('statusQuatationsother', $user_permission)) : ?>
             
               
                    <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-3 control-label">&ensp;Status</label>
                    <div class="col-sm-12">
                    <select class="form-control" required="" id="status" name="status" style="width:46%; margin-left: 10px;"  value="<?php echo set_value('pic') ?>">
                    <option value="">Select Status</option>
                   
                      <option value="Open"> Open</option>
                      <option value="Reject"> Reject</option>
                      <option value="Close"> Close</option>

                 
                  </select>
                  </div>
                    
                   </div>
                   <hr>
                    <?php endif; ?>
                       -->

                      <!--   other -->
                      <div class="col-md-10 col-xs-10 pull pull-right">



                        <div class="form-group" id="kanan">
                          <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Note</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="note_desciption" name="note_desciption" autocomplete="off" value="<?php echo set_value('Quatations_number') ?>">
                          </div>
                        </div>
                        <div class="form-group" id="kanan" hidden="">
                          <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Image</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" id="filequotation" name="filequotation" autocomplete="off" value="<?php echo set_value('Quatations_number') ?>">
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

                            <input type="text" class="form-control" id="pph_description_hidden" readonly="" name="pph_description_hidden" autocomplete="off" value="0" hidden="">
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
                            <input accept=".jpg,.png,.jpeg,.pdf" id="imagenesother" name="imagenesother" onchange="ValidateSize(this)" type="file">
                          </div>

                        </div>
                        <?php
                        $directory = "assets/image_/";
                        $images = glob($directory . "*.*");
                        ?>

                      </div>

                      <div class="col-md-6 col-xs-12 pull pull-left">

                        <div class="form-group" id="qnumber" hidden>
                          <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Revisi</label>
                          <div class="col-sm-12">
                            <input type="text" readonly="" class="form-control" id="Quatations_number" name="update" autocomplete="off" value="<?php echo $revisi ?>">
                          </div>
                        </div>
                        <div class="form-group" id="qnumber" hidden>
                          <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Revisi Lanjutan</label>
                          <div class="col-sm-12">
                            <input type="text" readonly="" class="form-control" id="Quatations_number" name="revisi" autocomplete="off" value="<?php echo $revisi + 1 ?>">
                          </div>
                        </div>



                        <div class="form-group" id="qnumber" hidden="">
                          <label for="Quatations_number_other" style="text-align:left;" class="col-sm-6 control-label">Quotation Number Revisi</label>
                          <div class="col-sm-12">
                            <input readonly="" type="text" class="form-control" id="quotation_number_revisi" name="quotation_number_revisi" autocomplete="off" value="<?= $quotation ?>">
                          </div>

                        </div>

                        <div class="form-group" id="qnumber">
                          <label for="Quatations_number_other" style="text-align:left;" class="col-sm-6 control-label">Quotation Number</label>
                          <div class="col-sm-12">
                            <input readonly="" type="text" class="form-control" id="Quatations_number_other" name="Quatations_number_other" autocomplete="off" value="<?= $quotation_number ?>">
                          </div>

                        </div>

                        <div class="form-group" id="qnumber">
                          <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Date Quotation</label>
                          <div class="col-sm-12">
                            <input onkeypress="return false;" oninput="expiredOther()" onchange="expiredOther()" type="text" placeholder="yyyy-mm-dd" class="form-control" required="" id="date_quotation" name="date_quotation" autocomplete="off" value="<?php echo set_value('Date_event') ?>">
                          </div>
                          <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group" id="qnumber">
                          <label for="Date_event" style="text-align:left;" class="col-sm-6 control-label">Date Expired</label>
                          <div class="col-sm-12">
                            <input onkeypress="return false;" type="text" placeholder="yyyy-mm-dd" class="form-control" required="" id="date_expired_other" name="date_expired_other" autocomplete="off" value="<?php echo set_value('date_expired_other') ?>">
                          </div>
                          <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>





                        <div class="form-group" id="qnumber">

                          <label for="pid_event" style="text-align:left;" class="col-sm-6 control-label">PIC Event</label>
                          <div class="col-sm-12">
                            <select class="form-control" required="" id="picEvent" name="picEvent" style="width:99%;" onchange="DataPIC()" value="<?php echo set_value('picEvent') ?>">
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
                            <input type="text" readonly class="form-control" id="customerEvent" name="customerEvent" autocomplete="off" value="<?php echo set_value('customerEvent') ?>">

                          </div>
                          <?= form_error('customeEvent', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group" id="qnumber" hidden="">

                          <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-6 control-label">Customer PIC Event</label>
                          <div class="col-sm-12">
                            <input type="email" readonly class="form-control" id="id_customerother" name="id_customerother" autocomplete="off" value="<?php echo set_value('id_customerother') ?>">

                          </div>
                          <?= form_error('id_customerother', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group" id="qnumber" hidden="">

                          <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-6 control-label">PIC Event</label>
                          <div class="col-sm-12">
                            <input type="email" readonly class="form-control" id="picEvent1" name="picEvent1" autocomplete="off" value="<?php echo set_value('picEvent1') ?>">

                          </div>
                          <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group" id="qnumber">

                          <label for="email_event" style="text-align:left;" class="col-sm-6 control-label">Email PIC Event </label>
                          <div class="col-sm-12">
                            <input type="email" readonly class="form-control" id="emailEvent" name="emailEvent" autocomplete="off" value="<?php echo set_value('emailEvent') ?>">
                          </div>


                        </div>

                        <div class="form-group" id="qnumber">
                          <label for="pid_other" style="text-align:left;" class="col-sm-6 control-label">PIC PO</label>



                          <div class="col-sm-12">
                            <select onchange="DataPICOther();" class="form-control" required="" id="pic_other" name="pic_other" style="width:99%;" onchange="DataPICEvent()"> value="<?php echo set_value('pic_other') ?>">
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
                            <input type="email" readonly class="form-control" id="email_other" name="email_other" autocomplete="off" value="<?php echo set_value('email_other') ?>">
                          </div>


                        </div>
                        <?= form_error('email_event', '<small class="text-danger pl-3">', '</small>') ?>
                        <div class="form-group" id="qnumber" hidden="">

                          <label for="groups" id="qnumber" style="text-align:left;" class="col-sm-7 control-label">PIC Name</label>
                          <div class="col-sm-12">
                            <input type="text" readonly class="form-control" id="pic_other1" name="pic_other1" autocomplete="off" value="<?php echo set_value('pic_other1') ?>">

                          </div>
                          <?= form_error('customer_event', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>



                        <div class="form-group" id="qnumber">
                          <label for="Quatations_number" style="text-align:left;" class="col-sm-6 control-label">Tiitle Event</label>
                          <div class="col-sm-12">
                            <input type="text" required="" class="form-control" required="" id="title_event_otther" name="title_event_otther" autocomplete="off" value="<?php echo set_value('title_event_otther') ?>">
                          </div>

                        </div>



                        <div class="form-group" id="qnumber">
                          <label for="netto" style="text-align:left;" class="col-sm-6 control-label">Subtotal</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" required="" readonly="" id="netto" name="netto" autocomplete="off" value="0">
                            <input type="text" class="form-control" readonly="" id="netto_hidden" name="netto_hidden" autocomplete="off" value="0" hidden="">
                          </div>
                        </div>
                        <?= form_error('title_event', '<small class="text-danger pl-3">', '</small>') ?>


                        <div class="form-group" id="qnumber">
                          <label id="asflabel" for="Quatations_number" style="text-align:left;" class="col-sm-2 control-label" id>ASF</label>
                          <div class="col-sm-4" id="kananasf">
                            <input step="any" type="text" class=" col-sm-7 form-control" value="0" id="asf_percen_other" oninput="hitungnetto();" name="asf_percen_other" oninput="hitungasf();" name="asf_percen_other" autocomplete="off">
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
                            <input type="number" step="any" class=" col-sm-7 form-control" placeholder="0" value="0" required="" name="discount_percent_other" id="discount_percent_other" oninput="discount_other_function()" name="discount_percen_other" autocomplete="off">
                            <label for="Quatations_number" style="text-align:left;" class="col-sm-2 control-label">%</label>
                          </div>
                          <div class="col-sm-12">
                            <input type="text" onkeyup="convertToRupiah(this);" class="col-sm-12 form-control" id="discount_other" name="discount_other" autocomplete="off" value="0" oninput="discount_other_normal()">
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
                            <th style="width: 50%">Description</th>
                            <th style="width: 5%">Quantity</th>

                            <th style="width: 5%">
                              <center>Frequency</center>
                            </th>
                            <th style="width: 20%">Unit Price</th>
                            <th style="width: 25%"> Amount</th>
                            <th><button class="btn btn-sm bg-gradient-secondary" id="BarisBaruDescription"><i class="fa fa-plus"></i> </button></th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>


                            <th style="text-align:left;">Sub Total</th>
                            <th colspan="1">
                              <input id="grandtotaldescription" readonly="" style="width:100%" type="text" class="form-control" required=""> <input id="grandtotaldescriptionhidden" readonly="" style="width:100%" type="text" class="form-control" required="" hidden="">
                            </th>
                          </tr>

                        </tfoot>
                      </table>
                      <div class="form-group text-left">
                        <button value="update" type="submit" name="btn" class="btn btn-primary btnSave"></i>
                          <span class="spinner-border spinner-border-sm loadingIndikdatorRevision" role="status" aria-hidden="true"></span>
                          Save Changes</button>
                        <!--    <button value="revisi" type="submit" class="btn btn-success" name="btn"></i>Save as Revision</button> -->

                        <button value="revisi" type="submit" class="btn btn-success btnSaverevision" name="btn" type="button">
                          <span class="spinner-border spinner-border-sm loadingIndikdatorRevision" role="status" aria-hidden="true"></span>
                          Save as Revision
                        </button>

                      </div>




                    </form>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>


          </div>
          <!-- /.container-fluid -->
    </section>


    <!-- /.content -->
  </div>


  <script src="<?php echo base_url('assets/lte/tiny/tinymce.min.js') ?>" referrerpolicy="origin" referrerpolicy="origin"></script>


  <script type="text/javascript">
    function showIndikatorRevisi() {
      $('.btnSaverevision').attr('disabled', 'disabled');
      $('.loadingIndikdatorRevision').show();

    }

    function hiddenIndikatorRevisi() {
      $('.btnSaveRevision').removeAttr('disabled');
      $('.loadingIndikdatorRevision').hide();

    }

    function showIndikator() {
      $('.btnSave').attr('disabled', 'disabled');
      $('.loadingIndikdator').show();

    }

    function hiddenIndikator() {
      $('.btnSave').removeAttr('disabled');
      $('.loadingIndikdator').hide();

    }
    $(document).ready(function() {
      hiddenIndikatorRevisi();
      hiddenIndikator();



      BarisBaruDescription();
      hitungDescription();
      AmbilData();
      hitungnetto();


    });
    // $('#SimpanData').submit(function(e) {
    //   showIndikatorRevisi();
    //   showIndikator();
    //   e.preventDefault();



    // })
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

    $('#description').click(function(e) {
      $('#tableLoopDescription').show();
      for (B = 1; B <= 1; B++) {
        TambahBarisBaruDescription();
      }

    });




    function DataPICOther() {
      var d = $("#pic_other").val();
      if (d.trim() == '') {
        $('[name="email_other"]').val('');
        $('[name="customer_other"]').val('');
        $('[name="pic_other1"]').val('');
        $('[name="pic_other"]').val('').change();

      } else {
        $.ajax({
          type: "post",
          url: '<?php echo base_url("Customer/AmbilDataPICQuotation/") ?>',
          data: 'pic_name=' + d,
          dataType: 'json',

          success: function(hasil) {
            console.log(hasil[0].email);
            console.log(hasil);
            $('[name="email_other"]').val(hasil[0].email);
            $('[name="customer_other"]').val(hasil[0].customer);
            $('[name="pic_other1"]').val(hasil[0].pic_name);
            //     $('[name="kpph"]').val(hasil[0].karakteristik_pph);
            // $('[name="kppn"]').val(hasil[0].karakteristik_ppn);
            // pph_description();
            // ppn_description();
            validasiOther();
          },
          error: function(hasil) {


          }


        });

      }


    }
    $('#BarisBaruDescription').click(function(e) {
      e.preventDefault();
      TambahBarisBaruDescription();
    });

    function TambahBarisBaruDescription() {

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
      Baris += '<input  type="Number"  name="FrequencyDescription[]"  oninput="hitungDescription();"  id="FrequencyDescription' + Nomor + '" class="form-control FrequencyDescription" >';
      Baris += '</td>';


      Baris += '<td>';
      Baris += '<input onkeyup="convertToRupiah(this);"  oninput="hitungDescription();"  type="text" name="UniPriceDescription[]" id="UniPriceDescription' + Nomor + '"  class="form-control UniPriceDescription"  required="" >';
      Baris += '</td>';



      Baris += '<td>';
      Baris += '<input  oninput="hitungDescription();"  type="text" name="AmmountDescription[]" id="AmountDescription' + Nomor + '"  class="form-control deposit"  required="" readonly  >  <input  oninput="hitungDescription();"  type="text" name="AmmountDescriptionhidden[]" id="AmountDescriptionhidden' + Nomor + '"  class="form-control deposit"  required="" readonly hidden  >';
      Baris += '</td>';
      Baris += '<input value="null"  oninput="hitungDescription();"  type="text" name="id[]" id="id"  class="form-control deposit"  required="" readonly  hidden  >';
      Baris += '</td>';

      Baris += '<td class="text-center">';
      Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBarisDeskription"><font color="white"><i class="fa fa-times"></font></a>';
      Baris += '</td>';

      Baris += '</tr>';

      // onkeyup="convertToRupiah(this);"

      $("#tableLoopDescription tbody").append(Baris);
      $("#tableLoopDescription tbody tr").each(function() {

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

    function BarisBaruDescription() {
      <?php


      foreach ($quotation_other as $k) :


      ?>

        $(document).ready(function() {
          $("[data-toggle='tooltip']").tooltip();
        });

        var Nomor = $("#tableLoopDescription tbody tr").length + 1;
        var Baris = '<tr id=trdescription' + Nomor + '>';




        Baris += '<td style="width:30%" colspan=2>';
        Baris += '<textarea  class="form-control description"  name="description[]" id="description' + Nomor + '" >';
        Baris += `<?php echo $k->desciption ?>`;
        Baris += '</textarea>';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input  type="Number" name="QuantityDescription[]" value="<?php echo $k->quantity; ?>"   oninput="hitungDescription();"  id="QuantityDescription' + Nomor + '" class="form-control QuantityDescription" >';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input  type="Number" value="<?php echo $k->frequency; ?>"  name="FrequencyDescription[]"  oninput="hitungDescription();"  id="FrequencyDescription' + Nomor + '" class="form-control FrequencyDescription" >';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input onkeyup="convertToRupiah(this);" value="<?php echo  number_format($k->unitprice, 0, ',', '.') ?>"   oninput="hitungDescription();"  type="text" name="UniPriceDescription[]" id="UniPriceDescription' + Nomor + '"  class="form-control UniPriceDescription"  required="" >';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input value="<?php echo $k->amount; ?>"   oninput="hitungDescription();"  type="text" name="AmmountDescription[]" id="AmountDescription' + Nomor + '"  class="form-control deposit"  required="" readonly  >  <input value="<?php echo $k->amount; ?>"  oninput="hitungDescription();"  type="text" name="AmmountDescriptionhidden[]" id="AmountDescriptionhidden' + Nomor + '"  class="form-control deposit"  required="" readonly hidden  > <input value="<?php echo $k->quotation_number; ?>"  oninput="hitungDescription();"  type="text" name="AmmountDescriptionhidden[]" id="quotation_number_id"  class="form-control deposit"  required="" readonly  hidden  > ';
        Baris += '</td>';
        Baris += '<td hidden>';

        Baris += '<input value="<?php echo $k->id; ?>"  oninput="hitungDescription();"  type="text" name="id[]" id="id"  class="form-control deposit"  required="" readonly  hidden  >';
        Baris += '</td>';

        Baris += '<td class="text-center">';
        Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBarisDeskription"><font color="white"><i class="fa fa-times"></font></a>';
        Baris += '</td>';
        Baris += '</tr>';


        $("#tableLoopDescription tbody").append(Baris);
        $("#tableLoopDescription tbody tr").each(function() {
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

    $(document).on('click', '#HapusBarisDeskription', function(e) {
      e.preventDefault();
      var Nomor = 1;
      $(this).parent().parent().remove();
      hitungDescription();
      discount_other_function();
      hitungnetto();



    });

    function hitungDescription() {
      var hitung = 0;
      $('#tableLoopDescription tbody tr').each(function() {
        var frequency = $(this).find('td:nth-child(3) input').val();
        var quantity = $(this).find('td:nth-child(2) input').val();
        var satuan = $(this).find('td:nth-child(4) input').val();
        var satuan1 = satuan.replace(/[^\w\s]/gi, '');
        var data = Number(frequency) * Number(quantity) * Number(satuan1)
        var ss = data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $(this).find('td:nth-child(5) input').val(ss);


        hitung = Math.round(Number(hitung) + Number(data));


      });
      var hitung1 = hitung.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");


      $('#grandtotaldescription').val(hitung1);
      $('#grandtotaldescriptionhidden').val(hitung);
      hitungnetto();
      total_description();


    }



    // function hitungDescription(){
    //         var Nomor = $("#tableLoopDescription tbody tr").length


    //        var x;
    //        var hitung=0;
    //       for (x = 1; x <= Nomor; x++) {

    //         var q=$('#FrequencyDescription'+x).val();
    //         var f=$('#UniPriceDescription'+x).val();
    //         var ra = f.replace(/[^\w\s]/gi, '');


    //         s=Number(q)*Number(ra);
    //           var ss = s.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    //          $('#AmountDescription'+x).val(ss);
    //          $('#AmountDescriptionhidden'+x).val(s);
    //          var subtotal=$('#AmountDescriptionhidden'+x).val();
    //          hitung=Number(hitung)+Number(subtotal);  
    //       }
    //         var hitung1 =hitung.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");


    //        $('#grandtotaldescription').val(hitung1);
    //        $('#grandtotaldescriptionhidden').val(hitung);

    //        hitungnetto();
    //       }

    function hitungnetto() {
      var total = $('#grandtotaldescriptionhidden').val();
      var total1 = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('#netto_hidden').val(total);
      $('#netto').val(total1);
      hitungmanagement();
      total_description();
      ppn_description();
      pph_description();
      // discount_other_function();
      // discount_other_normal();


    }

    function hitungmanagement() {
      var netto = $('#netto_hidden').val();
      var asf_percen_other = $('#asf_percen_other').val();
      hitung = Math.round(Number(netto) / 100 * Number(asf_percen_other));
      var hitung1 = hitung.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('#asf_other').val(hitung1);
      $('#asf_other_hidden').val(hitung);
      total_description();


    }

    function total_description() {
      var netto = $('#netto_hidden').val();
      var management = $('#asf_other_hidden').val();
      var discount = $('#discount_other').val().replace(/[^\w\s]/gi, '');
      var hasil = Math.round(Number(netto) + Number(management) - Number(discount));

      var hasil1 = hasil.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('#total_description').val(hasil1);
      $('#total_description_hidden').val(hasil);
      grand_total_other();



    }

    function ppn_description() {
      var data = $('[name="kppn"]').val();
      if (data == 'noppn') {
        var d = $('#total_description_hidden').val();
        var hasil = Math.round(Number(d) * 0);
        var hasil1 = hasil.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('#ppn_description').val(hasil1);
        $('#ppn_description_hidden').val(hasil);
        grand_total_other();

      } else {
        var d = $('#total_description_hidden').val();
        var hasil = Math.round(Number(d) * 0.1);
        var hasil1 = hasil.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('#ppn_description').val(hasil1);
        $('#ppn_description_hidden').val(hasil);
        grand_total_other();


      }

    }

    function pph_description() {
      var data = $('[name="kpph"]').val();
      if (data == 'nopph') {
        //2% dari management fee

        var management = $('#asf_other_hidden').val();

        var hasil = Math.round(Number(management) * 0);
        var hasil1 = hasil.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('#pph_description_hidden').val(hasil);
        $('#pph_description').val('(' + hasil1 + ')');
        grand_total_other();

      } else {
        //2% dari management fee

        var management = $('#asf_other_hidden').val();

        var hasil = Math.round(Number(management) * 0.02);
        var hasil1 = hasil.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('#pph_description_hidden').val(hasil);
        $('#pph_description').val('(' + hasil1 + ')');
        grand_total_other();


      }





    }


    function grand_total_other() {
      var total = $('#total_description_hidden').val();
      var pph = $('#pph_description_hidden').val();
      var ppn = $('#ppn_description_hidden').val();
      var grand_total = Number(Math.round(total)) + Number(Math.round(ppn)) - Number(Math.round(pph));
      var grand_total2 = Math.round(grand_total);
      var grand_total1 = grand_total2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

      $('#grand_total_other').val(grand_total1);


    }




    $('#SimpanData').submit(function(e) {
      e.preventDefault();


      save_quotation_other();

    });


    function save_quotation_other() {

      showIndikator();
      showIndikatorRevisi();

      $.ajax({
        url: $("#SimpanData").attr('action'),
        type: 'post',
        cache: false,
        dataType: "json",
        data: $("#SimpanData").serialize(),
        success: function(data) {
          if (data.success == true) {
            $('#notif').fadeIn(800, function() {
              $("#notif").html(data.notif).fadeOut(5000).delay(1000);

            });
            window.location.href = "<?php echo base_url("Quotation/manage_quotation_other") ?>";
            hiddenIndikator();
            hiddenIndikatorRevisi();



          } else {
            hiddenIndikator();
            hiddenIndikatorRevisi();
            $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
          }
        },

        error: function(error) {
          hiddenIndikator();
          hiddenIndikatorRevisi();
          alert(error);

        }

      });
    }



    function AmbilData() {
      var data = $('#Quatations_number_other').val();
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Quotation/AmbilDataQuotationOther/3") ?>',
        data: 'id=' + data,
        dataType: 'json',
        success: function(hasil) {
          console.log(hasil);
          $('[name="picEvent"]').select2();
          $('#pic_other').select2();
          $('[name="kpph"]').val(hasil[0].karakteristik_pph);
          $('[name="kppn"]').val(hasil[0].karakteristik_ppn);
          // $('#Quatations_number_other').val(hasil[0].quotation_number);
          $('#date_quotation').val(hasil[0].date_quotation);
          $('#title_event_otther').val(hasil[0].tittle_event);
          $('#customer_event').val(hasil[0].customer);
          $('#note_desciption').val(hasil[0].note);
          $('#pic_other').val(hasil[0].id_po).change();
          $('#date_expired_other').val(hasil[0].date_expired);
          $('#asf_percen_other').val(hasil[0].asfp);
          $('[name="email_other"]').val(hasil[0].pic_email);
          $('[name="customer_other"]').val(hasil[0].customer);
          $('[name="emailEvent"]').val(hasil[0].email_event);
          $('[name="picEvent"]').val(hasil[0].id_event).change();
          $('#customerEvent').val(hasil[0].customer_event);
          $('#picEvent1').val(hasil[0].pic_event);
          $('#status').val(hasil[0].status);
          $('#discount_percent_other').val(hasil[0].discount_percent);



          $('#id_customerother').val(hasil[0].id_customer);
          $('#filequotation').val(hasil[0].image);
          hitungnetto();



          DataPICOther();
          discount_other_function();

          hitungDescription();
          discount_other_function()


        },
        error: function(hasil) {


        }


      });

    }

    <?php if ($image != 'dafault.png') { ?>
      console.log('err')
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
          main2: '{preview}   {remove} {browse}'
        },
        allowedFileExtensions: ["jpg", "png", "gif", "pdf", "jpeg"],
        initialPreview: [
          '<object type="application/pdf" data="<?php echo $image ?>" style="height: 30vh; width:50vh"><img style="width: 10%; height: 30% "  src="<?php echo $image ?>" ></object>'
        ]
      });
    <?php } else {
    ?>
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
          main2: '{preview}   {remove} {browse}'
        },
        allowedFileExtensions: ["jpg", "png", "gif", "pdf", "jpeg"],

      });
    <?php } ?>

    function DataPIC() {
      var d = $("#picEvent").val();
      if (d.trim() == '') {
        $('[name="emailEvent"]').val('');
        $('[name="customerEvent"]').val('');
        $('[name="picEvent1"]').val('');
        $('[name="kpph"]').val('');
        $('[name="kppn"]').val('');
        $('[name="id_customerother"]').val('');
        $('[name="email_other"]').val('');
        $('[name="customer_other"]').val('');
        $('[name="pic_other1"]').val('');
        $('[name="pic_other"]').val('').change();
        pph_description();
        ppn_description();

      } else {
        $.ajax({
          type: "post",
          url: '<?php echo base_url("Customer/AmbilDataPICQuotationEvent/") ?>',
          data: 'pic_name=' + d,
          dataType: 'json',

          success: function(hasil) {
            console.log(hasil[0].email);
            console.log(hasil);
            $('[name="emailEvent"]').val(hasil[0].email);
            $('[name="customerEvent"]').val(hasil[0].customer);
            $('[name="picEvent1"]').val(hasil[0].pic_name);
            $('[name="kpph"]').val(hasil[0].karakteristik_pph);
            $('[name="kppn"]').val(hasil[0].karakteristik_ppn);
            $('[name="id_customerother"]').val(hasil[0].id_customer);
            pph_description();
            ppn_description();
            if ($('[name="pic_other"]').val() != '') {
              validasiOther();
            }



          },
          error: function(hasil) {


          }


        });


      }


    }

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
          $("#date_expired_other").datepicker("destroy");
          document.getElementById("date_expired_other").readOnly = false;
          $('#date_expired_other').datepicker({

            dateFormat: 'yy-mm-dd',
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

    function ValidateSize(file) {
      var FileSize = file.files[0].size / 1024 / 1024; // in MB
      if (FileSize > 2) {
        alert('File size exceeds 2 MB');
        $('#imagenesother').val(''); //for clearing with Jquery
      } else {

      }
    }

    function validasiOther() {
      var picEvent = $('#picEvent').val();
      var emailEvent = $('[name="emailEvent"]').val();
      var customerEvent = $('[name="customerEvent"]').val();
      //var picnameEvent=$('[name="picEvent1"]').val('');


      var emailOther = $('[name="email_other"]').val();
      var customerPO = $('[name="customer_other"]').val();
      // var pi$('[name="pic_other1"]').val('');

      if (picEvent.trim() != '') {

        if (customerEvent.trim() != customerPO.trim()) {
          $('[name="email_other"]').val('');
          $('[name="customer_other"]').val('');
          $('[name="pic_other1"]').val('');
          $('[name="pic_other"]').val("").change();



          alert("Customer PIC PO harus sama dengan customer PIC Event");


        }

      } else {
        $('[name="email_other"]').val('');
        $('[name="customer_other"]').val('');
        $('[name="pic_other1"]').val('');
        $('[name="pic_other"]').val("").change();
        alert("Pilih terlebih dahulu PIC Event");

      }
    }

    function discount_other_normal() {

      var total_summary = $('#netto').val();
      var discount_percent = $('#discount_percent_other').val();
      var discount_other = $('#discount_other').val();
      var total_summary1 = total_summary.replace(/[^\w\s]/gi, '');
      var total_other1 = discount_other.replace(/[^\w\s]/gi, '');
      var hasil = (Number(total_other1) / Number(total_summary1)) * 100


      $('#discount_percent_other').val(hasil);
      //ppn();
      netto_other_function();
      // grand_total();
      discount_other_function();
      hitungnetto();


    }


    function discount_other_function() {
      var total_summary = $('#netto').val();
      var discount_percent = $('#discount_percent_other').val();

      var total_summary1 = total_summary.replace(/[^\w\s]/gi, '');

      var hasil = Number(total_summary1) * Number((discount_percent / 100));
      var a = Math.round(hasil);
      var hasil1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
      $('#discount_other').val(hasil1);

      // ppn();
      netto_other_function();
      // grand_total();
      total_description();
      hitungnetto();

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
      total_description();



    }
    $("#quotationMainNav").addClass('active');
    $("#manageQuotationotherNav").addClass('active');
    $("#openQuotationNav").addClass('menu-open');
  </script>
  <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js') ?>"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer>




  </script>