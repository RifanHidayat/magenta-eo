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

                <h3 class="box-title"><b>Edit Delivery</b></h3>

                <div class="card-tools" style="margin-top: -35px;margin-right: 15px">
                    <a href="<?php echo base_url('Delivery/manage_delivery') ?>" class="btn bg-gradient-secondary">
                        <font color="white">Back</font>
                    </a>
                </div>

            </div>
            <div class="card-body">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-md-12 col-xs-12">



                        <div class="box">

                            <form action="<?php echo base_url('Delivery/aksi_update_delivery') ?>" method="post" name="formid">



                                <div class="col-md-5 col-xs-12 pull pull-left">

                                    <?php
                                    $data = sprintf("%04s", $id);


                                    ?>
                                    <div hidden="" class="form-group" id="qnumber">
                                        <label for="Quatations_number_other" style="text-align:left;" class="col-sm-10 control-label">ID</label>
                                        <div class="col-sm-12">
                                            <input readonly="" type="text" readonly="" class="form-control" id="id" name="id" autocomplete="off" value="<?php echo ($data) ?>">
                                        </div>

                                    </div>



                                    <div class="form-group" id="qnumber">
                                        <label for="Quatations_number_other" style="text-align:left;" class="col-sm-10 control-label">Quotation Number</label>
                                        <div class="col-sm-12">
                                            <input readonly="" type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" autocomplete="off" value="<?php echo ($quotation_number) ?>">
                                        </div>

                                    </div>



                                    <div class="form-group" id="qnumber">
                                        <label for="Date_event" style="text-align:left;" class="col-sm-10 control-label">Date Quotation</label>
                                        <div class="col-sm-12">
                                            <input type="text" readonly="" class="form-control" required="" id="date_quotation" name="date_quotation" autocomplete="off">
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
                                        <label for="netto" style="text-align:left;" class="col-sm-10 control-label">PO Number</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" required="" readonly="" id="po_number" name="po_number" autocomplete="off">

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
                                            <input type="text" class="form-control" id="pengirim" name="pengirim" autocomplete="off" value="<?php echo set_value('delivery_order') ?>">
                                        </div>

                                    </div>

                                    <div class="form-group" id="qnumber">
                                        <label for="netto" style="text-align:left;" class="col-sm-10 control-label">Tanggal Pengiriman</label>
                                        <div class="col-sm-12">
                                            <input onchange="generet_delivery()" onkeypress="return false;" type="text" class="form-control" required="" id="tanggal_pengiriman" placeholder="yyyy-mm-dd" name="tanggal_pengiriman" autocomplete="off">

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
                                                    <option value="<?php echo $k->alamat ?>"><?php echo $k->alamat ?></option>
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

                                <table class="table" border="0" id="tablefaktur" border="1">
                                    <thead>
                                        <tr>


                                            <th style="width: 1%"><a style="width: 5" class="btn btn-sm bg-gradient-secondary" data-toggle="tooltip" id="hapus">
                                                    <font color="white"> <i class="fa fa-times">
                                                            <font color="white">
                                                        </i></font>
                                                </a></th>
                                            <th style="width: 15%">Barang</th>

                                            <th style="width: 25%">Deskripsi Barang</th>
                                            <th style="width: 25%">Keterangan</th>
                                            <th style="width: 10%"> KTS</th>
                                            <th style="width: 15%">Satuan</th>


                                            <th style="width: 3%"><button style="width: 5" class="btn btn-sm bg-gradient-secondary" id="BarisBaru"><i class="fa fa-plus"></i> </button></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>






                                </table>

                                <br>
                                <br>

                                <div class="form-group text-left">
                                    <button style="margin-left: 20px;" type="submit" class="btn btn-primary">Save Changes</button>

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
    $(document).ready(function() {

        DataQuotation($('#id').val());

        TambahBarisBaruFaktur();




    });



    function DataQuotation(id) {
        $.ajax({
            type: "post",
            url: '<?php echo base_url("Delivery/AmbilDataQuotationOther/") ?>',
            data: 'delivery_number=' + id,
            dataType: 'json',



            success: function(hasil) {
                console.log(hasil);
                $('#kirimm').select2();
                $('[name="Quatations_number"]').val(hasil[0].quotation_number);
                $('[name="date_quotation"]').val(hasil[0].date_quotation);
                $('[name="customer"]').val(hasil[0].customer);

                $('[name="title_event"]').val(hasil[0].tittle_event);

                $('[name="alamat_customer"]').val(hasil[0].address);

                $('[name="po_number"]').val(hasil[0].po_number);

                $('[name="kirimm"]').val(hasil[0].kirim).change();
                $('[name="kirim"]').val(hasil[0].kirim);

                $('[name="tagihan"]').val(hasil[0].tagihan);
                $('[name="gudang"]').val(hasil[0].gudang);

                $('[name="tanggal_pengiriman"]').val(hasil[0].date_pengiriman);
                $('[name="status"]').val(hasil[0].status);
                $('[name="delivery_order"]').val(hasil[0].Delivery_number);
                $('[name="platnomor"]').val(hasil[0].platnomor);
                $('[name="pengirim"]').val(hasil[0].pengirim);


            },
            error: function(hasil) {
                console.log(hasil);


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

        Baris += '</textarea>';
        Baris += '</td>';

        Baris += '<td>';
        Baris += '<input onkeyup="convertToRupiah(this);"   type="text" name="keteranganbarang[]" id="keteranganbarang' + Nomor + '"  class="form-control KeteranganDescription"  required="" oninput="" >';
        Baris += '</td>';

        Baris += '<td>';
        Baris += '<input  type="text" name="kts[]" id="kts' + Nomor + '"  class="form-control deposit"  required="" oninput="hitungFaktur();" >';
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
            var d = $('[name="title_event"]').val();
            var Baris = '<tr id=trfaktur' + Nomor + '>';



            Baris += '<td colspan=2>';
            Baris += '<input  type="text" name="namebarang[]" id="namebarang' + Nomor + '"  class="form-control deposit"  required=""  value="<?php echo $k->barang ?>" >';
            Baris += '</td>';


            Baris += '<td style="width:30%">';
            Baris += '<textarea  class="form-control description"  name="deskripsibarang[]"  id="DescriptionBarang' + Nomor + '" >';
            Baris += `<?php echo $k->deskripsi_barang; ?>`;
            Baris += '</textarea>';
            Baris += '</td>';


            Baris += '<td>';
            Baris += '<input    type="text" name="keteranganbarang[]" id="keteranganbarang' + Nomor + '"  class="form-control KeteranganDescription" value="<?php echo $k->keterangan ?>"  required="" oninput="" >';
            Baris += '</td>';

            Baris += '<td>';
            Baris += '<input  type="text"   name="kts[]" id="kts' + Nomor + '"  class="form-control deposit"  required="" oninput="hitungFaktur();" value="<?php echo $k->kts ?>" >';
            Baris += '</td>';

            Baris += '<td>';
            Baris += '<input  type="text" value="<?php echo $k->satuan ?>" name="satuan[]" id="HargaSatuan' + Nomor + '"  class="form-control HargaSatuan"  required="" oninput="hitungFaktur()">  <input  onkeyup="convertToRupiah(this);"  type="text" value="<?php echo $k->id; ?>" name="id_delivery[]" id="id' + Nomor + '"  class="form-control HargaSatuan"  required=""  hidden > ';
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
        hitungDescription();
        $('tablefaktur tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html(Nomor);
            Nomor++;
        });
    });
    $('#BarisBaru').click(function(e) {

        BarisBaruFaktur();


    });








    /// simpan data quotation other
    //   $('#SimpanData').submit(function(e) {
    //               e.preventDefault();
    //                  save_faktur();

    //              });


    // function save_faktur() {

    //               $.ajax({
    //                   url:$("#SimpanData").attr('action'),
    //                   type:'post',
    //                   cache:false,
    //                   dataType:"json",
    //                   data: $("#SimpanData").serialize(),
    //                   success:function (data) {
    //                       if (data.success == true) {



    //                             $('#notif').fadeIn(800, function() {

    //                              $("#notif").html(data.notif).fadeOut(5000).delay(1000); 

    //                             });
    //                              window.location.href = "<?php echo base_url("Delivery/manage_delivery") ?>";



    //                       }else{
    //                           $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
    //                       }
    //                   },

    //                   error:function (error) {
    //                       window.location.href = "<?php echo base_url("Delivery/manage_delivery") ?>";
    //                   }

    //               });
    //           }

    $(function() {
        var dateToday = new Date();

        $('#tanggal_pengiriman').datepicker({
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



    $("#deliveryMainNav").addClass('active');

    $("#openDeliveryNav").addClass('menu-open');

    function generet_delivery() {
        // var date = $('[name="tanggal_pengiriman"]').val();

        var id = $('[name="id"]').val()
        var date = new Date($('[name="tanggal_pengiriman"]').val());
        var tahun = date.getFullYear();
        var t = tahun.toString()
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();

        $('[name="delivery_order"]').val("QO" + t.substring(2, 4) + "" + (bulan + 1) + "" + tanggal + id)

    }

    function Datagudang() {
        var d = $("#kirimm").val();
        if (d.trim() == '') {
            $('[name="kirim"]').val('');

        } else {
            $.ajax({
                type: "post",
                url: '<?php echo base_url("Delivery/Ambildatagudang1/") ?>',
                data: 'idGudang=' + d,
                dataType: 'json',

                success: function(hasil) {
                    console.log(hasil);
                    $('[name="kirim"]').val(hasil.alamat);

                },
                error: function(hasil) {


                }


            });

        }


    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer>