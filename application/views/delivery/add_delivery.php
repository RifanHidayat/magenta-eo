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

        <h3 class="box-title"><b>Add Delivery</b></h3>

        <div class="card-tools" style="margin-top: -35px;margin-right: 15px">
          <a href="<?php echo base_url('Faktur/manage_faktur') ?>" class="btn bg-gradient-secondary">
            <font color="white">Back</font>
          </a>
        </div>

      </div>
      <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12 col-xs-12">



            <div class="box">

              <form action="<?php echo base_url('Delivery/aksi_add_delivery') ?>" method="post" name="formid" id="SimpanData">




                <div class="col-md-6 col-xs-12 pull pull-left">




                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-10 control-label">Quotation Number</label>
                    <div class="col-sm-12">
                      <input readonly="" type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" value="<?php echo $quotation_number ?>" autocomplete="off">
                    </div>

                  </div>
                  <?= form_error('Quatations_number', '<small class="text-danger pl-3">', '</small>') ?>



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
                <div class="col-md-6 col-xs-12 pull pull-left">

                  <div class="form-group" id="qnumber" hidden="">
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-10 control-label">Id Faktur</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" id="id_bast" name="id_bast" value="<?php echo ($id_bast) ?>" autocomplete="off" value="<?php echo set_value('delivery_order') ?>">
                    </div>

                  </div>




                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-10 control-label">Delivery Order Number</label>
                    <div class="col-sm-12">
                      <input type="text" readonly="" class="form-control" id="delivery_order" name="delivery_order" autocomplete="off">
                    </div>

                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="Quatations_number_other" style="text-align:left;" class="col-sm-10 control-label">Pengirim</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="pengirim" name="pengirim" autocomplete="off" value="<?php echo set_value('delivery_order') ?>">
                    </div>

                  </div>



                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-10 control-label">Tanggal Pengiriman</label>
                    <div class="col-sm-12">
                      <input onchange="generet_delivery()" readonly type="text" class="form-control" required="" id="tanggal_pengiriman" placeholder="yyyy-mm-dd" name="tanggal_pengiriman" autocomplete="off">

                    </div>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="netto" style="text-align:left;" class="col-sm-10 control-label">Plat Nomor</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" id="platnomor" name="platnomor" autocomplete="off">

                    </div>
                  </div>
                  <?= form_error('tanggal_pengiriman', '<small class="text-danger pl-3">', '</small>') ?>

                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-10 control-label">Gudang</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" required="" id="gudang" name="gudang" autocomplete="off" value="<?php echo ('Magenta Mediatama') ?>">
                    </div>
                    <?= form_error('gudang', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-10 control-label">Tagihan Ke</label>
                    <div class="col-sm-12">
                      <textarea rows="5" class="form-control" required="" id="tagihan" name="tagihan" autocomplete="off" value="<?php echo set_value('date_expired_other') ?>"></textarea>
                    </div>
                    <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-10 control-label">Kirim Ke</label>
                    <div class="col-sm-12">
                      <select onchange="Datagudang();" class="form-control" required="" id="kirimm" name="kirimm">
                        <option value="">Select Alamat Gudang</option>
                        <?php foreach ($gudang as $k) : ?>
                          <option value="<?php echo $k->id_gudang ?>"><?php echo $k->alamat ?></option>
                        <?php endforeach ?>
                      </select>

                    </div>
                    <?= form_error('gudang', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" id="qnumber">
                    <label for="Date_event" style="text-align:left;" class="col-sm-10 control-label"></label>
                    <div class="col-sm-12">
                      <textarea readonly="" rows="5" class="form-control" required="" id="kirim" name="kirim" autocomplete="off" value="<?php echo set_value('date_expired_other') ?>"></textarea>
                    </div>
                    <?= form_error('Date_event', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>


                </div>

                <div style="overflow-x:auto;width:100%">
                  <table class="table" border="0" id="tablefaktur" style="width:110%">
                    <thead>
                      <tr>


                        <th style="width: 1%"><a hidden style="width: 5" class="btn btn-sm bg-gradient-secondary" data-toggle="tooltip" id="hapus">
                            <font color="white"> <i class="fa fa-times">
                                <font color="white">
                              </i></font>
                          </a></th>
                        <th style="width: 10%">Barang</th>

                        <th style="width: 25%">Deskripsi Barang</th>
                        <th style="width: 15%">Keterangan</th>
                        <th style="width: 5%"> quatity</th>
                        <th style="width: 5%"> KTS</th>
                        <th style="width: 8%">Satuan</th>


                        <th style="width: 3%"><button hidden style="width: 5" class="btn btn-sm bg-gradient-secondary" id="BarisBaru"><i class="fa fa-plus"></i> </button></th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>

                <br>
                <br>

                <div class="form-group text-left">
                  <!-- <button  style="margin-left: 20px;"  type="submit" class="btn btn-primary">Create Delivery Order</button> -->

                  <button type="submit" class="btn btn-primary btnSave" type="button">
                    <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                    Create Delivery
                  </button>

                </div>
              </form>
              <!-- Content form -->


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
  $('#kirimm').select2();

  $(document).ready(function() {
    hiddenIndikator();
    DataQuotation($('#Quatations_number').val());


    //   generet_delivery();





  });


  function DataQuotation(id) {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Delivery/AmbilDataDeliveryO/") ?>',
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
        $('[name="tagihan"]').val(hasil[0].address);
        $('[name="date_po"]').val(hasil[0].date_po);



        $('[name="tagihan"]').val(hasil[0].address);
        $('[name="bast_number"]').val(hasil[0].bast_number);
        $('[name="total_bast"]').val(hasil[0].totalBast.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));

        TambahBarisBaruFaktur();



      },
      error: function(hasil) {


      }


    });

  }

  function BarisBaruFaktur() {
    $(document).ready(function() {
      $("[data-toggle='tooltip']").tooltip();
    });
    var Nomor = $("#tablefaktur tbody tr").length + 1;
    var Baris = '<tr id=trfaktur' + Nomor + '>';



    Baris += '<td colspan=2>';
    Baris += '<input  type="text" name="namebarang[]" id="namebarang' + Nomor + '"  class="form-control deposit"  required="" >';
    Baris += '</td>';




    Baris += '<td style="width:30%">';
    Baris += '<textarea  class="form-control description"  name="deskripsibarang[]"  id="DescriptionBarang' + Nomor + '" >';
    Baris += ``;
    Baris += '</textarea>';
    Baris += '</td>';



    Baris += '<td>';
    Baris += '<input onkeyup="convertToRupiah(this);"   type="text" name="keteranganbarang[]" id="keteranganbarang' + Nomor + '"  class="form-control KeteranganDescription"  required="" oninput="" >';
    Baris += '</td>';

    Baris += '<td>';
    Baris += '<input  type="text" readonly name="quantity[]" id="quantity' + Nomor + '"  class="form-control deposit"  required="" oninput="hitungFaktur();" >';
    Baris += '</td>';

    Baris += '<td>';
    Baris += '<input  type="text" readonly name="kts[]" id="kts' + Nomor + '"  class="form-control deposit"  required="" oninput="hitungFaktur();" >';
    Baris += '</td>';

    Baris += '<td>';
    Baris += '<input  onkeyup="convertToRupiah(this);"  type="text" name="satuan[]" id="HargaSatuan' + Nomor + '"  class="form-control HargaSatuan"  required="" oninput="hitungFaktur()" >';
    Baris += '</td>';


    Baris += '<td class="text-center">';
    Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip"  id="HapusBaris"><font color="white"><i class="fa fa-times"></font></a>';
    Baris += '</td>';
    Baris += '</tr>';
    // onkeyup="convertToRupiah(this);"

    $("#tablefaktur tbody").append(Baris);
    $("#tablefaktur tbody tr").each(function() {
      $(this).find('td:nth-child(2) input').focus();
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

  function TambahBarisBaruFaktur() {
    var data = $('[name="title_event"]').val();
    <?php

    foreach ($quotation_other as $k) :

    ?>
      $(document).ready(function() {
        $("[data-toggle='tooltip']").tooltip();
      });
      var Nomor = $("#tablefaktur tbody tr").length + 1;
      var d = $('#title_event').val();
      var Baris = '<tr id=trfaktur' + Nomor + '>';



      Baris += '<td colspan=2>';
      Baris += '<input  type="text" name="namebarang[]" id="namebarang' + Nomor + '"  class="form-control deposit"  required="" >';
      Baris += '</td>';



      Baris += '<td style="width:30%">';
      Baris += '<textarea  class="form-control description"  name="deskripsibarang[]"  id="DescriptionBarang' + Nomor + '" >';
      Baris += `<?php echo $k->desciption; ?>`;
      Baris += '</textarea>';
      Baris += '</td>';


      Baris += '<td>';
      Baris += '<input value="' + d + '"   type="text" name="keteranganbarang[]" id="keteranganbarang' + Nomor + '"  class="form-control KeteranganDescription"  required="" oninput="" >';
      Baris += '</td>';

      Baris += '<td>';
      Baris += '<input readonly  type="text" value="<?php echo $k->quantity; ?>"  name="quantity[]" id="quantity' + Nomor + '"  class="form-control deposit"  required="" oninput="hitungFaktur();" >';
      Baris += '</td>';

      Baris += '<td>';
      Baris += '<input readonly type="text" value="<?php echo $k->frequency; ?>"  name="kts[]" id="kts' + Nomor + '"  class="form-control deposit"  required="" oninput="hitungFaktur();" >';
      Baris += '</td>';

      Baris += '<td>';
      Baris += '<input type="text"  name="satuan[]" id="HargaSatuan' + Nomor + '"  class="form-control HargaSatuan"  required="" oninput="hitungFaktur()" >';
      Baris += '</td>';


      Baris += '<td class="text-center">';
      Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip"  id="HapusBaris"><font color="white"><i class="fa fa-times"></font></a>';
      Baris += '</td>';
      Baris += '</tr>';
      // onkeyup="convertToRupiah(this);"

      $("#tablefaktur tbody").append(Baris);
      $("#tablefaktur tbody tr").each(function() {
        $(this).find('td:nth-child(2) input').focus();
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
    var Nomor = 1;
    $(this).parent().parent().remove();

    $('tablefaktur tbody tr').each(function() {
      $(this).find('td:nth-child(1)').html(Nomor);
      Nomor++;
    });
  });
  $('#BarisBaru').click(function(e) {

    BarisBaruFaktur();


  });




  // /// simpan data quotation other
  //       $('#SimpanData').submit(function(e) {
  //                   e.preventDefault();
  //                      save_faktur();

  //                  });


  //     function save_faktur() {

  //                   $.ajax({
  //                       url:$("#SimpanData").attr('action'),
  //                       type:'post',
  //                       cache:false,
  //                       dataType:"json",
  //                       data: $("#SimpanData").serialize(),
  //                       success:function (data) {
  //                           if (data.success == true) {



  //                                 $('#notif').fadeIn(800, function() {

  //                                  $("#notif").html(data.notif).fadeOut(5000).delay(1000); 

  //                                 });
  //                                  window.location.href = "<?php echo base_url("Delivery/manage_delivery") ?>";



  //                           }else{
  //                               $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
  //                           }
  //                       },

  //                       error:function (error) {
  //                           alert(error);
  //                       }

  //                   });
  //               }




  function generet_delivery() {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Delivery/generet_delivery") ?>',
      dataType: 'json',
      success: function(hasil) {
        console.log(hasil);
        var date = new Date($('[name="tanggal_pengiriman"]').val());
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
    var quotation_number = $('#id_faktur').val();
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
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Delivery Order Number has been updated',
                showConfirmButton: false,
                timer: 1500
              });


            }
          });


        } else if (hasil.status == "tersediaQ") {
          Swal.fire({
            title: 'Oops',
            text: "Data qutoation number sudah tersedia",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#808080',
            cancelButtonText: 'Close',
            confirmButtonText: 'Back'
          }).then((result) => {
            if (result.value) {
              window.location = "<?php echo base_url('Faktur/manage_faktur/') ?>";

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