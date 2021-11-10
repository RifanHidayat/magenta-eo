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
        <h3 class="box-title"><b>Manage Group</b></h3>

        <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
          <?php if (in_array('createGroup', $user_permission)) : ?>
            <a href="<?php echo base_url('Group/add_group') ?>" class="btn btn-primary">Add Group</a>
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
                <table id="example" class="table table-bordered table-striped ">
                  <thead>
                    <tr>
                      <th hidden="">id</th>
                      <th>Group Name</th>


                      <th colspan="1" style="width: 5%">
                        <center>Action</center>
                      </th>

                    </tr>
                  </thead>
                  <tbody id="target">



                  </tbody>
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
  $(document).ready(function() {


    DataTable();



  });

  function swetalert(id) {
    Swal.fire({
      title: 'Yakin?',
      text: "Mau menghapus data ini!",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#808080',
      cancelButtonText: 'Batalkan',
      confirmButtonText: 'Iya'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: '<?php echo base_url("Group/hapus_groups/3") ?>',
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


            DataTable();

          },
          error: function() {
            Swal.fire({

              text: "Gagal menghapus data",
              icon: "error",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false

            });
          }

        });
      }
    });

  }

  function AmbilData(id) {
    $.ajax({
      type: "post",
      url: '<?php echo base_url("Group/ambilId/3") ?>',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(hasil) {


      },
      error: function(hasil) {


      }


    });

  }

  function DataTable() {
    $.ajax({
      type: 'POST',

      url: '<?php echo base_url("Group/TampilDatagroup") ?>',
      dataType: 'json',
      success: function(data) {

        var baris = '';
        if (data.length == 0) {
          baris += '<tr>' +
            '<td colspan="7">Data Kosong </td>' +
            '</tr>';

        } else {



          for (var i = 0; i < data.length; i++) {

            baris += '<tr>' +
              '<td hidden>' + data[i].id + '</td>' +
              '<td>' + data[i].group_name + '</td>' +
              '<td style="width: 20%">' +
              '<?php if (in_array('updateGroup', $user_permission)) : ?> <center> <font color = "#FFFFFF" size = "2px" > ' + ' <a class = "btn btn-sm bg-gradient-secondary" href = "<?php echo base_url() ?>/Group/edit/' + data[i].id + '"data - toggle = "tooltip" title = "Edit"> <font color = "white"> <i class = "fa fa-edit"> </i></font> </a><?php endif; ?> <?php if (in_array('deleteGroup', $user_permission)) : ?><font color = "#FFFFFF" size = "2px"> <a class = "btn btn-sm bg-gradient-secondary" onclick = "swetalert(' + data[i].id + ')" data - toggle = "tooltip" title = "Delete"> <i class = "fa fa-trash" > </i><font size="2px"></a > <?php endif; ?>' +
              '</center></td > ' + '</tr>';

          }
        }

        $("#target").html(baris);



      },
      error: function(data) {




      }

    });
  }

   $("#userMainNav").addClass('active');
 $("#manageGroupNav").addClass('active');
   $("#openUserNav").addClass('menu-open');
</script>