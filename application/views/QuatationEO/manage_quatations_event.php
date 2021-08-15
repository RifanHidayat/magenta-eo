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
            <br>
            <br>
            <div class="card">
              <div class="card-header">
                <h3 class="box-title"><b>Manage Quotation Event</b></h3>
                <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
                  <?php if (in_array('createQuatations', $user_permission)) : ?>
                    <a href="<?php echo base_url('Quotation/add_quotation') ?>" class="btn btn-primary">Add Quotation Event</a>
                  <?php endif; ?>
                </div>
              </div>

              <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $this->session->flashdata('success'); ?>
                </div>

              <?php elseif ($this->session->flashdata('error')) : ?>
                <div class="alert alert-error alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo $this->session->flashdata('error'); ?>

                </div>
              <?php endif; ?>
              <?= $this->session->flashdata('message'); ?>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="quotationeventTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>

                      <th>Quotation Number</th>
                      <th>Date Quotation</th>
                      <th>Customer</th>
                      <th>Title Event</th>
                      <th>Comissionable Cost</th>
                      <th>Non Fee Cost</th>
                      <th>Netto</th>
                      <th>Sisa BAST</th>
                      <th>PO number</th>
                      <th>status</th>
                      <th>Note</th>
                      <th style="width: 20%">Action</th>
                    </tr>
                  </thead>

                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>



      <!-- /.container-fluid -->
    </section>




    <!-- /.content -->

    <!-- modal po number quotation event -->
    <div class="modal fade" id="po_number" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog" role="document" data-keyboard="false">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel"><b>PO Number</b> </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form id="formmodal" method="post" action="<?php echo base_url('Quotation/add_po'); ?>">
              <div class="box-body">

                <div class="form-group">
                  <label for="fname">PO Number </label>
                  <input required style="width: 100%;" type="text" class="form-control" id="po_number" name="po_number">
                  <small class="text-danger pl-3" id="po_error" name="po_error"></small>
                </div>

                <div class="form-group">
                  <label for="fname">Date Number </label>
                  <input autocomplete="off" onkeypress="return false;" placeholder="dd/mm/yyyy" required style="width: 100%;" type="text" class="form-control date_number" id="date_number" name="date_number" readonly>
                  <small class="text-danger pl-3" id="date_error"></small>
                </div>
                <div class="form-group">
                  <input type="text" name="id" id="id" hidden>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" onclick="AddPonumber()">Save</button>
          </div>
        </div>
      </div>
    </div>

    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>


    <script type="text/javascript">
      $(document).ready(function() {
        $('.date_number').datepicker({
          dateFormat: "dd/mm/yy"
        });
      });

      $(document).ready(function() {

        var dataTable = $('#quotationeventTable').DataTable({
          "processing": true,
          "serverSide": true,
          "responsive": true,
          "autoWidth": false,
          "order": [],
          "ajax": {
            url: "<?php echo base_url("Quotation/TampilDataquotation") ?>",
            type: "POST"
          },
          "columnDefs": [{

            "defaultContent": "",
            "targets": "_all"
          }, ],
        });

      });

      function AmbilData(id) {
        $.ajax({
          type: "post",
          url: '<?php echo base_url("Quotation/getDataquotation/3") ?>',
          data: {
            id: id
          },
          dataType: 'json',
          success: function(hasil) {




            $('[name="id"]').val(hasil[0].id);
            $('[name="po_number"]').val(hasil[0].po_number);
            $('[name="date_number"]').val(hasil[0].date_po_number);


          },
          error: function(hasil) {

          }

        });

      }

      function AddPonumber() {
        var id = $('[name="id"]').val();
        var po_number = $('[name="po_number"]').val();
        var date_po = $('[name="date_number"]').val();
        if (po_number.trim() == '') {
          po_error.textContent = "PO number masih kosog";
          console.log("PO number masih kosog");
        } else if (date_po.trim() == '') {
          po_number_error.textContent = ""
          date_error.textContent = "tanggal  masih kosong";
          console.log("tanggal  masih kosong");
        } else {
          po_error.textContent = ""
          date_error.textContent = "";
          $.ajax({
            type: 'POST',
            data: {
              id: id,
              po_number: po_number,
              date_po: date_po
            },
            url: '<?php echo base_url("Quotation/add_ponumber") ?>',
            dataType: 'json',
            success: function(hasil) {
              console.log(hasil);
              Swal.fire({
                title: "success!",
                text: "Po Number berhasil disimpan",
                icon: "success",
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
              });
              $('#quotationeventTable').DataTable().ajax.reload();
              $('#po_number').hide();
              $('.modal-backdrop').hide();
              $('#quotationeventTable').DataTable().ajax.reload
            },
            error: function() {
              Swal.fire({
                title: "success!",
                text: "Po Number berhasil disimpan",
                icon: "success",
                timer: 2000,
                showCancelButton: false,
                showConfirmButton: false
              });
              $('#quotationeventTable').DataTable().ajax.reload();
              $('#po_number').hide();
              $('.modal-backdrop').hide();
              $('#quotationeventTable').DataTable().ajax.reload
            }

          });


        }





      }

      //     $(function () {
      //    $('#quotationeventTable').DataTable({
      //     "paging": true,
      //      "responsive": true,


      //     "lengthChange": true,
      //     "searching": true,

      //     "autoWidth": true,
      //     "responsive": true,
      //     "aaSorting": [[ 0, "desc" ]]



      //   });



      //   });


      // datatable();


      function swetalert(id) {
        //   Swal.fire({
        //   title: 'Yakin?',
        //   text: "Mau menghapus data ini!",
        //   icon: 'warning',
        //   showCancelButton: true,
        //   confirmButtonColor: '#3085d6',
        //   cancelButtonColor: '#d33',
        //   cancelButtonText: 'Batalkan',
        //   confirmButtonText: 'Iya'
        // }).then((result) => {
        //   if (result.value) {

        //   }
        // });

        var contenConfirm = '<strong>Hapus data quotation event</strong>';
        Swal.fire({
          title: 'Delete Quotation Event',
          html: "Untuk konfirmasi tulis kalimat ini  : " + contenConfirm,
          input: 'text',
          inputAttributes: {
            autocapitalize: 'off'
          },
          showCancelButton: true,
          confirmButtonText: 'hapus',
          showLoaderOnConfirm: true,
          preConfirm: (confirm) => {

            if (confirm == "Hapus data quotation event") {
              $.ajax({
                url: "<?php echo base_url("Quotation/hapusquotation/3") ?>",
                type: "post",
                data: {
                  id: id
                },
                success: function() {
                  Swal.fire({
                    title: "Deleted!",
                    text: "Data berhasil dihapus.",
                    icon: "success",
                    timer: 2000,
                    showCancelButton: false,
                    showConfirmButton: false

                  });


                  $('#quotationeventTable').DataTable().ajax.reload();
                },
                error: function() {

                  Swal.fire(

                    'gagal menghapus data.',
                    'error'
                  );
                }

              });


            } else {
              Swal.fire(

                'gagal menghapus data.',
                'error'
              );

              console.log("tes123");

            }
          },
          allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
          if (result.isConfirmed) {

          }
        })

      }






      function Createbast(id) {


        $.ajax({
          type: "post",
          url: '<?php echo base_url("Bast/cekBast/") ?>',
          data: 'quotation_number=' + id,
          dataType: 'json',

          success: function(hasil) {

            if (hasil.status == 'tersedia') {
              <?php if (in_array('updateBast', $user_permission)) { ?>
                Swal.fire({
                  icon: 'info',
                  title: 'Oops...',
                  text: 'BAST tidak dapat dibuat lagi',

                });

                //      Swal.fire({
                //     title: 'Oops',
                //     text: "Data BAST sudah tersedia,Apakah mau lanjut ke update BAST?",
                //     icon: 'info',
                //     showCancelButton: true,
                //     confirmButtonColor: '#3085d6',
                //     cancelButtonColor: '#808080',
                //     cancelButtonText: 'Tidak',
                //     confirmButtonText: 'Iya'  
                //     }).then((result) => {
                //     if (result.value) {
                //       window.location = "<?php echo base_url('Bast/edit_bast/') ?>"+hasil.quotation_number;

                //   }
                // });
              <?php } else { ?>
                Swal.fire({
                  icon: 'info',
                  title: 'Oops...',
                  text: 'Data BAST sudah tersedia',

                });
              <?php } ?>

            } else {
              window.location = "<?php echo base_url('Bast/create_bast/') ?>" + id;
            }


          },
          error: function(hasil) {



          }


        });
      }



      $("#quotationMainNav").addClass('active');
      $("#manageQuotationeventNav").addClass('active');
      $("#openQuotationNav").addClass('menu-open');



      function datatable() {
        $.ajax({
          type: 'POST',

          url: '<?php echo base_url("Quotation/TampilDataquotation") ?>',
          dataType: 'json',
          success: function(data) {
            console.log(data.status);


            var baris = '';
            if (data.length == 0) {
              baris += '<tr>' +
                '<td colspan="7">Data Kosong </td>' +
                '</tr>';

            } else {


              for (var i = 0; i < data.length; i++) {
                console.log(data[i].status);

                baris += '<tr>' +
                  '<td hidden="" >' + data[i].id + '</td>' +
                  '<td >' + data[i].quotation_number + '</td>' +
                  '<td>' + data[i].customer + '</td>' +
                  '<td>' + data[i].tittle_event + '</td>' +

                  '<td>' + data[i].date_event + '</td>' +
                  '<td> Rp. ' + data[i].comissionable_cost + '</td>' +

                  '<td> Rp. ' + data[i].nonfee + '</td>' +

                  '<td> Rp. ' + data[i].total_summary + '</td>' +

                  '<td> ' + showStatus(data[i].status) + '</td>' +






                  '<td style="width:20%">' +



                  '<font color="#FFFFFF" size="2px"><a title="Email" class="btn btn-sm bg-gradient-secondary" href="<?php echo base_url('Quotation/form_submit_laporan/') ?>' + data[i].quotation_number + '" ><i class="fa fa-envelope"></i></a></font> ' +


                  '<?php if (in_array('viewQuatations', $user_permission)) : ?>' +

                  '<font color="#FFFFFF" size="2px"><a title="Print" class="btn btn-sm bg-gradient-secondary"  href="<?php echo base_url('Quotation/print_quotation/') ?>' + data[i].quotation_number + '" ><i class="fa fa-print"></i> </a></font> ' +
                  '<?php endif; ?>' +
                  '<?php if (in_array('updateQuatations', $user_permission)) : ?>' +

                  '<font color="#FFFFFF" size="2px"><a title="Edit" class="btn btn-sm bg-gradient-secondary" href="<?php echo base_url('Quotation/edit_quotation/') ?>' + data[i].quotation_number + '"><font color="white"><i  class="fa fa-edit" ></i> </font></a> ' +
                  '<?php endif; ?>' +


                  '<?php if (in_array('deleteQuatations', $user_permission)) : ?>' +

                  '<font color="#FFFFFF" size="2px"><a title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert(' + data[i].id + ')"><i class="fa fa-trash"></i><font size="2px"> </font></a></font> ' +
                  '<?php endif; ?>' +



                  '<?php if (in_array('viewQuatations', $user_permission) || in_array('statusQuatations', $user_permission)) : ?>' +

                  '<font color="#FFFFFF" size="2px"><a title="Image"  href="<?php echo base_url('Quotation/view_quotation_event/') ?>' + data[i].id + '" title="Image" class="btn btn-sm bg-gradient-secondary btn-view-file"><i class="fa fa-eye"></i><font size="2px"> </font></a> ' +
                  '<?php endif; ?>' +

                  '<?php if (in_array('createBast', $user_permission)) : ?>' +
                  bast(data[i].status, data[i].id);

                '<?php endif; ?>' +







                '</td>' +
                '</tr>';




              }
            }

            $("#target").html(baris);

          },
          error: function(data) {
            console.log("tos");




          }

        });
      }

      function bast(status, quotation_number) {
        if (status == "Close") {
          var baris = '<font color="#FFFFFF" size="2px"><a title="Create Bast" class="btn btn-sm bg-gradient-secondary" onclick="Createbast(' + quotation_number + ');" ><i class="fa fa-plus"></i><font size="2px"> BAST</a>';

        } else {
          var baris = "";
        }
        return baris;
      }


      function showStatus(status) {

        if (status == "Open") {
          var baris = '<span class="label label-warning">Open</span>';

        } else if (status == "Reject") {
          var baris = '<span class="label label-danger">Reject</span>';

        } else if (status == "Close") {
          var baris = '<span class="label label-success">Close</span>';



        } else {
          var baris = "";
        }
        return baris;

      }
    </script>


    <!-- AdminLTE App -->