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


      <br>
      <br>

      <div class="card">
        <div class="card-header">
          <h3 class="box-title"><b>Manage Customer</b></h3>
          <div class="card-tools" style="margin-top: -35px;margin-right: 3px">
            <?php if (in_array('createCustomer', $user_permission)) : ?>
              <a href="<?php echo base_url('Customer/add_customer') ?>" class="btn btn-primary">Add Customer</a>
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
                        <th>Customer Name</th>
                        <th style="width: 40%">Customer Address</th>
                        <th>Customer phone</th>
                        <th>NPWP</th>
                        <th>Pajak PPN</th>
                        <th>Pajak PPh</th>




                        <th colspan="1" style="width: 10%">
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

      <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document" data-keyboard="false">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Edit Data Customer</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form id="formmodal" method="post" action="<?php echo base_url('user/aksi_update_data_anak'); ?>" name="formid">
                <div class="box-body">
                  <div class="form-group">
                    <input name="id" hidden="">
                  </div>



                  <div class="form-group">
                    <label for="username">Customer Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" autocomplete="off">
                  </div>
                  <small class="text-danger pl-3" id="name_error"></small>
                  <div class="form-group">
                    <label for="caddress">Customer Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Customer Addrees" autocomplete="off">
                  </div>
                  <small class="text-danger pl-3" id="address_error"></small>

                  <div class="form-group">
                    <label for="cphone">Customer Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Customer Phone" autocomplete="off">
                  </div>
                  <small class="text-danger pl-3" id="phone_error"></small>

                  <div class="form-group">
                    <label for="npwp">NPWP</label>
                    <input type="text" class="form-control" id="npwp" name="npwp" placeholder="NPWP" autocomplete="off">
                  </div>
                  <small class="text-danger pl-3" id="npwp_error"></small>
                  <div class="form-group">
                    <label for="email">Karakteristik Pajak PPN</label>
                    <select required="" class="form-control customerEvent" id="karakteristikPPN" name="karakteristikPPN" style="width:99%;" value="<?php echo set_value('pic') ?>">
                      <option value="">Select Karakteristik Pajak</option>

                      <option value="ppn">With PPN</option>
                      <option value="noppn">No PPN</option>

                    </select>


                  </div>
                  <div class="form-group">
                    <label for="email">Karakteristik Pajak PPh</label>
                    <select required="" class="form-control " id="karakteristikPPh" name="karakteristikPPh" style="width:99%;" value="<?php echo set_value('karakteristikPPh') ?>">
                      <option value="">Select Karakteristik Pajak</option>

                      <option value="pph">With PPh</option>
                      <option value="nopph">No PPh</option>
                      <option value="pph21" hidden="">With PPh21</option>

                    </select>


                  </div>







                </div>
                <br>
                <br>
                <!-- /.box-body -->



              </form>

            </div>



            <div class="card-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" onclick="Ubahdata()">Edit</button>
            </div>


          </div>
        </div>
      </div>

    </section>

    <!-- /.content -->
  </div>


  <script type="text/javascript">
    $(document).ready(function() {
      var dataTable = $('#customerTable').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "autoWidth": false,
        "order": [],
        "ajax": {
          url: "<?php echo base_url("Customer/TampilDatacustomer") ?>",
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

    function alert() {

      Swal.fire({
        icon: 'info',
        title: 'Oops...',
        text: "Data Customer tidak bisa dihapus dikarnakan customer tersebut terdapat data di quotation event atau quotation other",

      });

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


    function AmbilData(id) {
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Customer/ambilIdCustomer/3") ?>',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(hasil) {
          console.log(hasil);
          $('[name="name"]').val(hasil[0].name);

          $('[name="phone"]').val(hasil[0].phone);
          $('[name="address"]').val(hasil[0].address);
          $('[name="npwp"]').val(hasil[0].npwp);
          $('[name="id"]').val(hasil[0].id);
          $('[name="id"]').val(hasil[0].id);
          $('[name="karakteristikPPh"]').val(hasil[0].karakteristik_pph);
          $('[name="karakteristikPPN"]').val(hasil[0].karakteristik_ppn);

        },
        error: function(hasil) {


        }


      });

    }

    function Ubahdata() {
      var id = $('[name="id"]').val();
      var name = $("[name='name']").val();


      var phone = $("[name='phone']").val();
      var address = $("[name='address']").val();
      var npwp = $("[name='npwp']").val();
      var karakteristikPPh = $("[name='karakteristikPPh']").val();
      var karakteristikPPN = $("[name='karakteristikPPN']").val();


      var name_error = document.getElementById("name_error");

      var phone_error = document.getElementById("phone_error");
      var address_error = document.getElementById("address_error");
      var npwp_error = document.getElementById("npwp_error");


      if (name.trim() == '') {
        name_error.style.border = "1 px solid red";
        name_error.textContent = "*Nama Customer masih kosong,silahkan diisi!";

        $('#name').focus();
        return false;
      } else if (address.trim() == '') {

        address_error.style.border = "1 px solid red";
        address_error.textContent = " *Address Customer masih kosong,silahkan diisi!";
        $('#address').focus();
        return false;
        name_error.style.border = "1 px solid red";
        name_error.textContent = "";

      } else if (phone.trim() == '') {

        phone_error.style.border = "1 px solid red";
        phone_error.textContent = " *Phone Customer masih kosong,silahkan diisi!";
        $('#phone').focus();
        return false;
        name_error.style.border = "1 px solid red";
        name_error.textContent = "";
        address_error.style.border = "1 px solid red";
        address_error.textContent = "";

      } else if (npwp.trim() == '') {

        npwp_error.style.border = "1 px solid red";
        npwp_error.textContent = " *NPWP masih kosong,silahkan diisi!";
        $('#npwp').focus();
        return false;
        name_error.style.border = "1 px solid red";
        name_error.textContent = "";
        address_error.style.border = "1 px solid red";
        address_error.textContent = "";
        address_error.style.border = "1 px solid red";
        address_error.textContent = "";

      } else {
        $.ajax({
          type: 'POST',
          // data:'id='+id+'&name='+name+'&phone='+phone+'&address='+address+'&npwp='+npwp+'&karakteristikPPN='+karakteristikPPN+'&karakteristikPPh='+karakteristikPPh,
          data: {
            id: id,
            name: name,
            phone: phone,
            address: address,
            npwp: npwp,
            karakteristikPPN: karakteristikPPN,
            karakteristikPPh: karakteristikPPh
          },
          url: '<?php echo base_url("Customer/aksi_update_data_customer") ?>',
          dataType: 'json',
          success: function(hasil) {
            console.log(hasil);
            Swal.fire({
              title: "success!",
              text: "Data berhasil diubah.",
              icon: "success",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false

            });
            $('#update').hide();
            $('.modal-backdrop').hide();
            $('#customerTable').DataTable().ajax.reload();
          },
          error: function() {
            Swal.fire({
              title: "success!",
              text: "Data berhasil dibubah",
              icon: "success",
              timer: 2000,
              showCancelButton: false,
              showConfirmButton: false

            });

            $('#update').hide();
            $('.modal-backdrop').hide();
            $('#customerTable').DataTable().ajax.reload();

          }

        });


      }
    }



    function DataPIC() {
      $.ajax({
        type: "post",
        url: '<?php echo base_url("Customer/AmbilDataPIC/") ?>',
        data: 'pic_name=' + formid.pic[formid.pic.selectedIndex].text,
        dataType: 'json',

        success: function(hasil) {
          console.log(hasil[0].email);
          console.log(hasil);
          $('[name="email"]').val(hasil[0].email);
          $('[name="jabatan"]').val(hasil[0].jabatan);
        },
        error: function(hasil) {


        }


      });

    }



    function datatable() {
      $.ajax({
        type: 'POST',

        url: '<?php echo base_url("Customer/TampilDatacustomer") ?>',
        dataType: 'json',
        success: function(data) {
          console.log(data);

          var baris = '';
          if (data.length == 0) {
            baris += '<tr>' +
              '<td colspan="7">Data Kosong </td>' +
              '</tr>';

          } else {


            for (var i = 0; i < data.length; i++) {

              baris += '<tr>' +
                '<td style="width: 20%">' + data[i].name + '</td>' +
                '<td style="width: 25%">' + data[i].address + '</td>' +
                '<td style="width: 13%">' + data[i].phone + '</td>' +
                '<td style="width: 10%">' + data[i].npwp + '</td>' +
                '<td style="width: 8%">' + data[i].karakteristik_ppn + '</td>' +
                '<td style="width: 10%">' + data[i].karakteristik_pph + '</td>' +
                '<td style="width: 20% " >' +
                '<?php if (in_array('updateCustomer', $user_permission)) : ?> <center>' +
                '<font color="#FFFFFF" size="2px">' + '<a class="btn btn-sm bg-gradient-secondary" onclick="AmbilData(' + data[i].id + ')" data-toggle="modal" title="Edit" data-target="#update"><i class="fa fa-edit"></i></a><?php endif; ?><?php if (in_array('deleteCustomer', $user_permission)) : ?>' +

                'ensp;<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" onclick="swetalert(' + data[i].id + ')" title="Delete"><i class="fa fa-trash"></i><font size="2px"></a> </font></center> <?php endif; ?>' +

                '</td>' +





                '</tr>';

            }
          }

          $("#target").html(baris);

        },
        error: function(data) {




        }

      });
    }

    $("#customerMainNav").addClass('active');
    $("#manageCustomerNav").addClass('active');
    $("#openCustomerNav").addClass('menu-open');
  </script>