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
             <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">

              <li class="nav-item active" id="members">
             
              <button  onclick="location.href='<?php echo base_url('Bast/manage_bast_event/') ?>'"   type="button" class="btn btn-outline-primary">Quotation Event</i></button>
               </li>&ensp;
              <li class="nav-item" id="budgets" to="/projects/manage">

              
              <button type="button" class="btn btn-primary">Quotation Other</button>
               </li>&ensp;
          </ul>

            <div class="card">
              <div class="card-header">
                <h3 class="box-title"><b>Manage BAST</b></h3>
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

                <div>
                  <table id="bastTable" class="table table-bordered table-striped" style="width: 100%">

                    <thead>
                      <tr>
                        <th>Quotation Number</th>
                        <th>Bast Number</th>
                        <th>Date Bast</th>
                        <th>Customer</th>
                        <th>Title Event</th>
                        <th>PO Number </th>
                        <th>GR Number</th>
                        <th>Total BAST</th>
                       
                        <th>
                          <center>Action</center>
                        </th>
                      </tr>
                    </thead>
                  </table>
                </div>
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
  </div>
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Image BAST</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <br>
        <br>

        <h3>Image PO</h3>
        <hr>
        <center>
          <div id="ViewImagepo"></div>
        </center>
        <br>
        <br>
        <h3>Image GR</h3>
        <hr>
        <center>
          <div id="ViewImagegr"></div>
        </center>


        <br>
        <br>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      var dataTable = $('#bastTable').DataTable({
        "processing": true,
        "serverSide": true,

        "responsive": true,
        "autoWidth": false,

        "ajax": {
          url: "<?php echo base_url("Bast/TampilDatabastother") ?>",
          type: "POST"
        },
        'order': [],
        // "columnDefs":[  
        //      {  

        //    "defaultContent": "",
        //     "targets": "_all"
        //      },  
        // ],


      });

    });

    function AmbilDataImage(fileNamepo, fileNamegr, typepo, typegr) {
      console.log(typepo);

      if (typepo == 'pdf') {
        html = '<object type="application/pdf" data="<?php echo base_url('assets/imagebastpo/') ?>' + fileNamepo + '" width="100%" height="500" style="height: 85vh;"></object>'
      } else {
        html = '<center><img style="height: 80vh; width:80vh"  src="<?php echo base_url('assets/imagebastpo/') ?>' + fileNamepo + '" ></center>';

      }
      document.getElementById("ViewImagepo").innerHTML = html;

      if (typegr == 'pdf') {
        html = '<object type="application/pdf" data="<?php echo base_url('assets/imagebastgr/') ?>' + fileNamegr + '" width="100%" height="500" style="height: 85vh;"></object>'


      } else {
        html = '<center><img style="height: 80vh; width:80vh"  src="<?php echo base_url('assets/imagebastgr/') ?>' + fileNamegr + '" ></center>';



      }
      document.getElementById("ViewImagegr").innerHTML = html;
    }



    function swetalert(id) {
      var contenConfirm = '<strong>Hapus data BAST</strong>';
      Swal.fire({
        title: 'Delete  BAST',
        html: "Untuk konfirmasi tulis kalimat ini  : " + contenConfirm,
        input: 'text',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'hapus',
        showLoaderOnConfirm: true,
        preConfirm: (confirm) => {

          if (confirm == "Hapus data BAST") {
            $.ajax({
              url: "<?php echo base_url("Bast/hapus/3") ?>",
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
                $('#bastTable').DataTable().ajax.reload();
              },
              error: function() {
                Swal.fire(
                  'Deleted!',
                  'Data berhasil dihapus.',
                  'success'
                );


                $('#bastTable').DataTable().ajax.reload();

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

    function getdatatable() {

      $(document).ready(function() {
        $('#example3').DataTable({
          "scrollX": true,
          "searching": false,

        });
      });

    }

    function cekFaktur(id) {
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Faktur/cekFaktur/") ?>',
        data: 'quotation_number=' + id,
        dataType: 'json',

        success: function(hasil) {
          console.log(hasil);

          if (hasil.status == 'tersedia') {
            <?php if (in_array('updateBast', $user_permission)) { ?>
              Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Data Faktur sudah tersedia',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Edit Faktur'
              }).then((result) => {
                if (result.isConfirmed) {} else if (result.dismiss === Swal.cancel) {
                  window.location = "<?php echo base_url('Faktur/edit_faktur/') ?>" + hasil.quotation_number + '/' + hasil.id_faktur;
                }
              })

            <?php } else { ?>
              Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Data Faktur sudah tersedia',

              });
            <?php } ?>

          } else {
           window.location = "<?php echo base_url('Faktur/create_faktur/') ?>" + hasil.quotation_number + '/' + '-'+ '/' + id;
           
          }


        },
        error: function(hasil) {



        }


      });


    }

    function cekDelivery(id) {
      console.log(id)

      $.ajax({
        type: "post",
        url: '<?php echo base_url("Delivery/cekDelivery/") ?>',
        data: 'quotation_number=' + id,
        dataType: 'json',

        success: function(hasil) {
          console.log(hasil);

          if (hasil.status == 'tersedia') {
            <?php if (in_array('updateDelivery', $user_permission)) { ?>

              Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Data Delivery sudah tersedia',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Edit Delivery'
              }).then((result) => {
                if (result.isConfirmed) {} else if (result.dismiss === Swal.cancel) {
                  window.location = "<?php echo base_url('Delivery/edit_delivery/') ?>" + hasil.quotation_number + '/' + hasil.id_delivery;
                }
              })


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


    $("#bastMainNav").addClass('active');

    $("#openBastNav").addClass('menu-open');
  </script>