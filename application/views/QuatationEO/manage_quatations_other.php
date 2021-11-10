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
                <h3 class="box-title"><b>Manage Quotation Other</b></h3>
                <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
                  <?php if (in_array('createQuatationsother', $user_permission)) : ?>
                    <a href="<?php echo base_url('Quotation/add_quotation') ?>" class="btn btn-primary">Add Quotation Other</a>
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
                <table id="quotationotherTable" class="table table-bordered table-striped" style="width: 100%">
                  <thead>
                    <tr>

                      <th>Quotation Number</th>
                      <th>Date Quotation</th>
                      <th>Customer</th>
                      <th>Title Event</th>

                      <th>ASF</th>
                      <th>discount</th>
                      <th>Netto</th>
                      <th>Sisa BAST</th>
                      <th>PO Number</th>

                      <!-- <th>Status</th>
                      <th>Note</th> -->
                      <th style="width:20%">Action</th>



                    </tr>
                  </thead>


                  </tbody>
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



      </form>

  </div>
  <!--   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary" onclick="Ubahdata()">Ubah</button>

      </div> -->

</div>
</div>
</div>
<!-- /.container-fluid -->
</section>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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


<!-- /.content -->
</div>




<!-- modal po number quotation other -->
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

        <form id="formmodal" method="post" action="<?php echo base_url('Quotation/add_po_other'); ?>">
        <div class="box-body">

<div class="form-group" hidden>
    <label for="fname">Quotation Id </label>
    <input required style="width: 100%;" type="text" class="form-control" id="quotationId" name="quotationId">
    <small class="text-danger pl-3" id="po_error" name="po_error"></small>
  </div>
  <div class="form-group"  hidden>
                  <label for="fname">Quotation Number</label>
                  <input required style="width: 100%;" type="text" class="form-control" id="quotationNumber" name="quotationNumber">
                  <small class="text-danger pl-3" id="po_error" name="p_error"></small>
                </div>


  <div class="form-group">
    <label for="fname">PO Number </label>
    <input required style="width: 100%;" type="text" class="form-control" id="poNumber" name="poNumber">
    <small class="text-danger pl-3" id="po_error" name="po_error"></small>
  </div>
  <div class="form-group">
    <label for="fname">Date Number </label>
    <input autocomplete="off"  type="date" placeholder="yyyy-mm-dd" required style="width: 100%;" type="date  " class="form-control date_number" id="date" name="date">
    <small class="text-danger pl-3" id="date_error"></small>
  </div>
  <div class="form-group">
    <label for="fname">Title Event</label>
    <input required style="width: 100%;" type="text" class="form-control" id="titleEvent" name="titleEvent">
    <small class="text-danger pl-3" id="po_error" name="po_error"></small>
  </div>
  <div class="form-group">
    <label for="fname">Jumlah</label>
    <input required style="width: 100%;" type="text" class="form-control" id="amount" name="amount">
    <small class="text-danger pl-3" id="po_error" name="po_error"></small>
  </div>

  
  <div class="form-group">
    <input type="text" name="id" id="id" hidden>
  </div>
</div>
          <!-- /.box-body -->

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
  // $(document).ready(function() {
  //       $('.date_number').datepicker({
  //         dateFormat: "yy-mm-dd"
  //       });
  //     });
  $(document).ready(function() {
    var dataTable = $('#quotationotherTable').DataTable({
      "processing": true,
      "serverSide": true,
      "responsive": true,
      "autoWidth": false,
      "order": [],
      "ajax": {
        url: "<?php echo base_url("Quotation/TampilDataquotationother") ?>",
        type: "POST"
      },
      "columnDefs": [{

        "defaultContent": "",
        "targets": "_all"
      }, ],
    });

  });

  function AmbilDataImage(fileName) {
    var fileName = fileName;
    html = '<object type="application/pdf" data="<?php echo base_url('assets/imageother/') ?>' + fileName + '" width="100%" height="500" style="height: 85vh;"><center><img style="height: 150vh;"  src="<?php echo base_url('assets/imageother/') ?>' + fileName + '" ></center></object>'
    document.getElementById("ViewImage").innerHTML = html;
  }

  $(function() {
    $("#userTable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#userTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


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

    var contenConfirm = '<strong>Hapus data quotation other</strong>';
    Swal.fire({
      title: 'Delete Quotation Other',
      html: "Untuk konfirmasi tulis kalimat ini  : " + contenConfirm,
      input: 'text',
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: 'hapus',
      showLoaderOnConfirm: true,
      preConfirm: (confirm) => {

        if (confirm == "Hapus data quotation other") {
          $.ajax({
            url: "<?php echo base_url("Quotation/hapus/3") ?>",
            type: "post",
            data: {
              id: id
            },
            success: function() {
              Swal.fire(
                'Deleted!',
                'Data berhasil dihapus.',
                'success'
              );


              $('#quotationotherTable').DataTable().ajax.reload();

            },
            error: function() {
              Swal.fire(
                'Deleted!',
                'Data berhasil dihapus.',
                'success'
              );


              $('#quotationotherTable').DataTable().ajax.reload();
            }

          });



        } else {
  

        }
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {

      }
    })

  }



  // function AmbilData(id) {
  //   console.log("e")
  //   $.ajax({
  //     type: "post",
  //     url: '<?php echo base_url("Quotation/getDataquotationother/3") ?>',
  //     data: {
  //       id: id
  //     },
  //     dataType: 'json',
  //     success: function(hasil) {
  //       $('[name="quotationId"]').val(hasil[0].id);
  //       $('[name="poNumber"]').val(hasil[0].po_number);
  //       $('[name="date"]').val(hasil[0].date_po_number);
  //     },
  //     error: function(hasil) {
  //     }
  //   });
    

  // }

  function Ubahdata() {
    var id = $('[name="id"]').val();
    var group = $("[name='groups']").val();
    var email = $("[name='email']").val();
    var username = $("[name='username']").val();
    var lname = $("[name='lname']").val();
    var fname = $("[name='fname']").val();
    var phone = $("[name='phone']").val();
    var cpassword = $("[name='cpassword']").val();
    var password = $("[name='password']").val();

    var nama_error = document.getElementById("name_error");
    var group_error = document.getElementById("group_error");
    var username_error = document.getElementById("username_error");
    var lname_error = document.getElementById("lname_error");
    var fname_error = document.getElementById("fname_error");
    var phone_error = document.getElementById("phone_error");
    var cpassword_error = document.getElementById("cpassword_error");



    if (group.trim() == '') {
      group_error.style.border = "1 px solid red";
      group_error.textContent = " *Group belum dipilih ,silahkan dipilih!";
      $('#groups').focus();
      return false;
    } else if (username.trim() == '') {
      username_error.style.border = "1 px solid red";
      username_error.textContent = " *Username belum dipilih.silahkan pilih terlebih dahulu";
      $('#username').focus();

      group_error.style.border = "1 px solid red";
      group_error.textContent = "";
      return false;

    } else if (email.trim() == '') {
      email_error.style.border = "1 px solid red";
      email_error.textContent = " *Email belum diiisi,Silahkan isi terlebih dahulu!";
      $('#email').focus();

      username_error.style.border = "1 px solid red";
      username_error.textContent = "";
      group_error.style.border = "1 px solid red";
      group_error.textContent = "";
      return false;

    } else if (fname.trim() == '') {
      fname_error.style.border = "1 px solid red";
      fname_error.textContent = " *First Name belum diiisi,Silahkan isi terlebih dahulu!";
      $('#fname').focus();

      username_error.style.border = "1 px solid red";
      username_error.textContent = "";
      email_error.style.border = "1 px solid red";
      email_error.textContent = "";
      group_error.style.border = "1 px solid red";
      group_error.textContent = "";
      return false;

    } else if (phone.trim() == '') {
      phone_error.style.border = "1 px solid red";
      phone_error.textContent = " *Phone belum diiisi,Silahkan isi terlebih dahulu!";
      $('#phone').focus();

      username_error.style.border = "1 px solid red";
      username_error.textContent = "";
      email_error.style.border = "1 px solid red";
      email_error.textContent = "";
      group_error.style.border = "1 px solid red";
      group_error.textContent = "";
      return false;

    } else {

      username_error.style.border = "1 px solid red";
      username_error.textContent = "";
      fname_error.style.border = "1 px solid red";
      fname_error.textContent = "";
      email_error.style.border = "1 px solid red";
      email_error.textContent = "";
      group_error.style.border = "1 px solid red";
      group_error.textContent = "";

      if (password.trim() != '') {
        if (cpassword == password) {
          $.ajax({
            type: 'POST',
            data: 'id=' + id + '&group_name=' + group + '&email=' + email + '&username=' + username + '&lname=' + lname + '&fname=' + fname + '&phone=' + phone + '&password=' + password,
            url: '<?php echo base_url("Users/aksi_update_data_user_password") ?>',
            dataType: 'json',
            success: function(hasil) {
              console.log(hasil);
              Swal.fire(
                'success!',
                'Data berhasil diubah.',
                'success'
              );

              $('#update').hide();
              $('.modal-backdrop').hide();
              location.reload();
            },
            error: function() {
              Swal.fire(
                'success!',
                'Data berhasil diubah.',
                'success'
              );

              $('#update').hide();
              $('.modal-backdrop').hide();
              location.reload();

            }

          });

        } else {
          cpassword_error.style.border = "1 px solid red";
          cpassword_error.textContent = "";
        }

      } else {

        $.ajax({
          type: 'POST',
          data: 'id=' + id + '&group_name=' + group + '&email=' + email + '&username=' + username + '&lname=' + lname + '&fname=' + fname + '&phone=' + phone,
          url: '<?php echo base_url("Users/aksi_update_data_user") ?>',
          dataType: 'json',
          success: function(hasil) {
            console.log(hasil);
            Swal.fire(
              'success!',
              'Data berhasil diubah.',
              'success'
            );

            $('#update').hide();
            $('.modal-backdrop').hide();
            location.reload();
          },
          error: function() {
            Swal.fire(
              'success!',
              'Data berhasil diubah.',
              'success'
            );

            $('#update').hide();
            $('.modal-backdrop').hide();
            location.reload();

          }

        });


      }

      //proses memasukan update data



    }


  }


  function Createbast(id) {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Bast/cekBastother/") ?>',
      data: 'quotation_number=' + id,
      dataType: 'json',

      success: function(hasil) {

        if (hasil.status == 'tersedia') {
          <?php if (in_array('updateBast', $user_permission)) { ?>
            Swal.fire({
              icon: 'info',
              title: 'Oops...',
              text: 'Data BAST sudah tersedia',

            });

            //      Swal.fire({
            //     title: 'Oops',
            //     text: "Data BAST sudah tersedia,Apakah mau lanjut ke Update BAST?",
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
          window.location = "<?php echo base_url('Bast/create_bast_other/') ?>" + id;
        }


      },
      error: function(hasil) {



      }


    });
  }

  function AmbilData(id) {
    console.log("w")
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Quotation/getDataquotationother/3") ?>',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(hasil) {
        $('[name="quotationId"]').val(hasil[0].id);
        $('[name="poNumber"]').val(hasil[0].po_number);
        $('[name="date"]').val(hasil[0].date_po_number);
        $('[name="quotationNumber"]').val(hasil[0].quotation_number);
      },
      error: function(hasil) {

      }

    });

  }

  function AddPonumber() {
        
        var quotationId = $('[name="quotationId"]').val();
        var poNumber = $('[name="poNumber"]').val();
        var datePo = $('[name="date"]').val();
        var titleEvent = $('[name="titleEvent"]').val();
        var amount = $('[name="amount"]').val();
        var quotationNumber = $('[name="quotationNumber"]').val();
 
        // if (po_number.trim() == '') {
        //   po_error.textContent = "PO number masih kosog";
        //   console.log("PO number masih kosog");
        // } else if (date_po.trim() == '') {
        //   po_number_error.textContent = ""
        //   date_error.textContent = "tanggal  masih kosong";
        //   console.log("tanggal  masih kosong");
        // } else {
        //   po_error.textContent = ""
        //   date_error.textContent = "";

        
          $.ajax({
            type: 'POST',
            data: {
              quotation_id: quotationId,
              po_number: poNumber,
              date: datePo,
              title_event:titleEvent,
              amount:amount,
              quotation_number:quotationNumber

            },
            url: '<?php echo base_url("quotationPo/create") ?>',
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
              $('#quotationotherTable').DataTable().ajax.reload();
              $('#po_number').hide();
              $('.modal-backdrop').hide();
              $('#quotationotherTable').DataTable().ajax.reload
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
              $('#quotationotherTable').DataTable().ajax.reload();
              $('#po_number').hide();
              $('.modal-backdrop').hide();
              $('#quotationotherTable').DataTable().ajax.reload
            }

          });


        }



  $("#quotationMainNav").addClass('active');
  $("#manageQuotationotherNav").addClass('active');
  $("#openQuotationNav").addClass('menu-open');
</script>


<!-- AdminLTE App -->