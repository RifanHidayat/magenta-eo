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

  <div class="content">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

 <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">

              <li class="nav-item active" id="members">
              <!-- <button type="button" class="btn btn-outline-primary">
              <i class="fa fa-dollar"> QE
              </button> -->
              <button    type="button" class="btn btn-primary">Quotation Event</i></button>
               </li>&ensp;
              <li class="nav-item" id="budgets" to="/projects/manage" onclick="location.href='<?php echo base_url('Faktur/manage_faktur_other/') ?>'" >

              
              <button type="button" class="btn btn-outline-primary" onclick="location.href='<?php echo base_url('Faktur/manage_faktur_event/') ?>'"  >Quotation Other</button>
               </li>&ensp;
          </ul>
         
            <div class="card">
              <div class="card-header">
                <h3 class="box-title"><b>Manage Faktur</b></h3>
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

              <!-- /.card-header -->
              <div class="card-body">

                <table id="fakturTable" class="table table-bordered table-striped" style="width: 100%">
                  <thead>
                    <tr>

                      <th style="width: 10%">Quotation Number</th>
                      <th style="width: 9%">Faktur Number</th>
                      <th style="width: 7%">Date Faktur</th>
                      <th style="width: 10%">Seri Faktur Pajak Number</th>
                      <th style="width: 10%">Customer</th>
                      <th style="width: 10%">Title Event</th>
                      <th style="width: 10%">Total faktur</th>
                      <th style="width: 10%">Jumlah Bayar</th>
                      <th style="width: 10%">Sisa Pembayaran</th>
                      <!-- <th style="width: 4%">Note</th> -->



                      <th style="width: 15%">
                        <center>Action</center>
                      </th>

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


      <!-- /.box-body -->

      </form>

  </div>


</div>
</div>
</div>
<!-- /.container-fluid -->
</section>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Image Faktur </h4>
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
<script type="text/javascript">
  $(document).ready(function() {
    var dataTable = $('#fakturTable').DataTable({
      "processing": true,
      "serverSide": true,
      "responsive": true,
      "autoWidth": false,
      "order": [],
      "ajax": {
        url: "<?php echo base_url("Faktur/TampilDatafaktur") ?>",
        type: "POST"
      },
      "columnDefs": [{

        "defaultContent": "",
        "targets": "_all"
      }, ],
    });

  });

  function AmbilDataImage(fileName, type) {



    if (type == 'pdf') {
      html = '<object type="application/pdf" data="<?php echo base_url('assets/imagefaktur/') ?>' + fileName + '" width="100%" height="500" style="height: 85vh;"></object>'


    } else {
      html = '<center><img style="height: 80vh; width:80vh"  src="<?php echo base_url('assets/imagefaktur/') ?>' + fileName + '" ></center>';

    }

    document.getElementById("ViewImage").innerHTML = html;

  }



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
    //     $.ajax({
    //         url : "<?php echo base_url("Faktur/hapus/3") ?>",
    //         type:"post",
    //         data:{id:id},
    //         success:function(){
    //             Swal.fire(
    //       'Deleted!',
    //       'Data berhasil dihapus.',
    //       'success'
    //     );


    //             $('#fakturTable').DataTable().ajax.reload();


    //         },
    //         error:function(){
    //                 Swal.fire(

    //       'gagal menghapus data.',
    //       'error'
    //     );
    //         }

    //     });
    //   }
    // });

    var contenConfirm = '<strong>Hapus data faktur</strong>';
    Swal.fire({
      title: 'Delete Faktur',
      html: "Untuk konfirmasi tulis kalimat ini  : " + contenConfirm,
      input: 'text',
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: 'hapus',
      showLoaderOnConfirm: true,
      preConfirm: (confirm) => {

        if (confirm == "Hapus data faktur") {
          $.ajax({
            url: "<?php echo base_url("Faktur/hapus/3") ?>",
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

              $('#fakturTable').DataTable().ajax.reload();
            },
            error: function() {
              Swal.fire(

                'gagal menghapus data.',
                'error'
              );
            }

          });


        } else {
          console.log("ggagal");


        }
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {

      }
    })

  }


  function cekDelivery(id) {

    $.ajax({
      type: "post",
      url: '<?php echo base_url("Delivery/cekDelivery/") ?>',
      data: 'quotation_number=' + id,
      dataType: 'json',

      success: function(hasil) {

        if (hasil.status == 'tersedia') {
          <?php if (in_array('updateDelivery', $user_permission)) { ?>
            Swal.fire({
              icon: 'info',
              title: 'Oops...',
              text: 'Data Delivery sudah tersedia',

            });

            //      Swal.fire({
            //     title: 'Oops',
            //     text: "Data Delivery sudah tersedia,Apakah mau lanjut ke Update Delivery?",
            //     icon: 'info',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#808080',
            //     cancelButtonText: 'Tidak',
            //     confirmButtonText: 'Iya'  
            //     }).then((result) => {
            //     if (result.value) {
            //       window.location = "<?php echo base_url('Delivery/edit_delivery/') ?>"+hasil.quotation_number;

            //   }
            // });
          <?php } else { ?>
            Swal.fire({
              icon: 'info',
              title: 'Oops...',
              text: 'Data Delivery sudah tersedia',

            });
          <?php } ?>

        } else {
          window.location = "<?php echo base_url('Delivery/create_delivery/') ?>" + hasil.quotation_number + '/' + id;
        }


      },
      error: function(hasil) {



      }


    });

  }

  function cekFaktur(id) {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Faktur/cekFaktur/") ?>',
      data: 'quotation_number=' + id,
      dataType: 'json',

      success: function(hasil) {

        if (hasil.status == 'tersedia') {
          <?php if (in_array('updateBast', $user_permission)) { ?>
            Swal.fire({
              icon: 'info',
              title: 'Oops...',
              text: 'Data Faktur sudah tersedia',

            });


            //      Swal.fire({
            //     title: 'Oops',
            //     text: "Data Faktur sudah tersedia,Apakah mau lanjut ke Update Faktur?",
            //     icon: 'info',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#808080',
            //     cancelButtonText: 'Tidak',
            //     confirmButtonText: 'Iya'  
            //     }).then((result) => {
            //     if (result.value) {
            //       window.location = "<?php echo base_url('Faktur/edit_faktur/') ?>"+hasil.quotation_number;

            //   }
            // });
          <?php } else { ?>
            Swal.fire({
              icon: 'info',
              title: 'Oops...',
              text: 'Data Faktur sudah tersedia',

            });
          <?php } ?>

        } else {
          window.location = "<?php echo base_url('Faktur/create_faktur/') ?>" + hasil.quotation_number + '/' + id;
        }


      },
      error: function(hasil) {



      }


    });


  }

  $("#fakturMainNav").addClass('active');

  $("#openFakturNav").addClass('menu-open');
</script>