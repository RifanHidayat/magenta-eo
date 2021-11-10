<p>tes</p>  <div class="content-wrapper">
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
          <h3 class="box-title"><b>Manage product</b></h3>
          <div class="card-tools" style="margin-top: -35px;margin-right: 3px">
            <?php if (in_array('createCustomer', $user_permission)) : ?>
              <a href="<?php echo base_url('Product/create') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Product</a>
            <?php endif; ?>
          </div>
        </div>

        <div class="card-body">

          <!-- Small boxes (Stat box) -->
          <div class="row">

            <div class="col-md-12 col-xs-12">

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
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">

                  <table id="customerTable" class="table table-bordered table-striped tablecustomer">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th style="width: 20%">Name</th>
                        <th>Stock</th>
                     
                        <th>Purchase Price</th>
                        <th>Selling price</th>
                    
                        <th colspan="1" style="width: 15%">
                          <center>Action</center>
                        </th>

                      </tr>
                    </thead>

                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

          </div>
        </div>

        <!-- /.row -->
      </div>

    

    </section>

    <!-- /.content -->
  </div>


  <script type="text/javascript">
  let API_URL="http://localhost:3000";
    $(document).ready(function() {
      var dataTable = $('#customerTable').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "autoWidth": false,
        "order": [],
        "ajax": {
          url: "<?php echo base_url("Product/datatablesProducts") ?>",
          type: "POST"
        },
        "columnDefs": [{

          "defaultContent": "",
          "targets": "_all"
        }, ],
      });

    });

    function AmbilId() {
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Customer/AmbilIDBank") ?>',
        dataType: 'json',
        success: function(hasil) {
          console.log(hasil);
          console.log("sukses");

        },
        error: function(hasil) {
          console.log("gagal");


        }


      });

    }

    
function destroy(id){

console.log(id)
Swal.fire({
    title: 'Are you sure?',
    text: "The data will be deleted",
    icon: 'warning',
    reverseButtons: true,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Delete',
    cancelButtonText: 'Cancel',
    showLoaderOnConfirm: true,
    preConfirm: () => {
        return axios.delete(`${API_URL}/api/product/` + id)
            .then(function(response) {
$('#customerTable').DataTable().ajax.reload();

        Swal.fire({
    title: "Deleted!",
    text: "Data berhasil dihapus.",
    icon: "success",
    timer: 2000,
    showCancelButton: false,
    showConfirmButton: false

  });
               
            })
            .catch(function(error) {
                console.log(error.data);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops',
                    text: 'Something wrong',
                })
            });
    },
    allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Data has been deleted',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.reload();

            }
        })
    }
})
}

    function swetalert(id) {
      Swal.fire({
        title: 'Menghapus Data',
        text: "Apakah anda yakin?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#808080',
        cancelButtonText: 'Batalkan',
        confirmButtonText: 'Iya'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: "<?php echo base_url("Customer/hapus_customer/3") ?>",
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


              $('#customerTable').DataTable().ajax.reload();

            },
            error: function() {
              Swal.fire(

                'gagal menghapus data.',
                'error'
              );
            }

          });
        }
      });

    }


    $("#customerMainNav").addClass('active');
    $("#manageCustomerNav").addClass('active');
    $("#openCustomerNav").addClass('menu-open');
  </script>