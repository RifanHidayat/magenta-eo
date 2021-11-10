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
        <h3 class="box-title"><b>Add Group</b></h3>

        <div class="card-tools" style="margin-top: -35px;margin-right: 3px">
          <a href="<?php echo base_url('Group/manage_groups') ?>" class="btn btn-secondary">
            <font color="white">Back</font>
          </a>

        </div>
      </div>
      <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12 col-xs-12">

            <div class="box">

              <form id="SimpanData" action="<?php base_url('users/add_group') ?>" method="post">
                <div class="box-body">

                  <div class="form-group">
                    <label for="group_name">Group Name</label>
                    <input required="" type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo set_value('group_name') ?>">
                  </div>
                  <?= form_error('group_name', '<small class="text-danger pl-3">', '</small>') ?>
                  <div class="form-group">
                    <label for="permission">Permission</label>
                    <div class="qnumber">

                      <!-- Default switch -->
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input switch" id="customSwitches">
                        <label class="custom-control-label" for="customSwitches"></label>
                      </div>
                    </div>

                    <table class="table table-responsive" id="tblGroup">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Create</th>
                          <th>Update</th>
                          <th>View</th>
                          <th>Delete</th>
                          <th>Status</th>
                          <th>Print</th>
                          <th>payment</th>
                          <th>Project & Finance</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Group</td>
                          <td><input type="checkbox" name="permission[]" value="createGroup" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateGroup" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewGroup" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteGroup" class="minimal"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>User</td>
                          <td><input type="checkbox" name="permission[]" value="createUser" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateUser" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewUser" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteUser" class="minimal"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>

                        <tr>
                          <td>Customer</td>
                          <td><input type="checkbox" name="permission[]" value="createCustomer" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateCustomer" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewCustomer" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteCustomer" class="minimal"></td>
                          <td></td>
                          <td></td>
                          <td><input type="checkbox" name="permission[]" value="paymentCustomer" class="minimal"></td>
                          <td></td>
                        </tr>


                        <tr>
                          <td>PIC</td>
                          <td><input type="checkbox" name="permission[]" value="createPicPO" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updatePicPO" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewPicPO" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deletePicPO" class="minimal"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Item</td>
                          <td><input type="checkbox" name="permission[]" value="createItems" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateItems" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewItems" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteItems" class="minimal"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Item Value</td>
                          <td><input type="checkbox" name="permission[]" value="createItemvalue" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateItemvalue" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewItemvalue" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteItemvalue" class="minimal"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                       




                        <tr>
                          <td>Quotation Event</td>
                          <td><input type="checkbox" name="permission[]" value="createQuatations" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateQuatations" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewQuatations" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteQuatations" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="statusQuatations" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="printQuotation" class="minimal"></td>
                          <td></td>
                          <td></td>
                         
                         
                        </tr>
                        <tr>
                          <td>Quotation Other</td>
                          <td><input type="checkbox" name="permission[]" value="createQuatationsother" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateQuatationsother" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewQuatationsother" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteQuatationsother" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="statusQuatationsother" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="printQuotationother" class="minimal"></td>
                          <td></td>
                          <td></td>
                          
                     
                        </tr>
                        <tr>
                          <td>BAST</td>
                          <td><input type="checkbox" name="permission[]" value="createBast" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateBast" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewBast" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteBast" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="statusBast" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="printBast" class="minimal"></td>
                          <td></td>
                          <td></td>
                          
                          

                        </tr>
                        <tr>
                          <td>Faktur Penjualan</td>
                          <td><input type="checkbox" name="permission[]" value="createFaktur" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateFaktur" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewFaktur" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteFaktur" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="statusFaktur" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="printFaktur" class="minimal"></td>
                          <td></td>
                          <td></td>
                          
                        </tr>
                        <tr>
                          <td>Delivery</td>
                          <td><input type="checkbox" name="permission[]" value="createDelivery" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateDelivery" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewDelivery" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteDelivery" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="statusDelivery" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="printDelivery" class="minimal"></td>
                          <td></td>
                          <td></td>
                         
                    
                        </tr>



                        <tr>
                          <td>Laporan</td>
                          <td><input type="checkbox" name="permission[]" value="createLaporan" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateLaporan" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewLaporan" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteLaporan" class="minimal"></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>

                        </tr>

                        <tr>
                          <td>Transactions</td>
                          <td><input type="checkbox" name="permission[]" value="createTransactions" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="updateTransactions" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="viewTransactions" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" value="deleteTransactions" class="minimal"></td>
                          <td></td>
                          <td><input type="checkbox" name="permission[]" value="printTransactions" class="minimal"></td>
                          <td></td>
                          <td></td>

                        </tr>

                        <!-- <tr>
                          <td>Project & Finance</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><input type="checkbox" name="permission[]" value="finance" class="minimal"></td>

                        </tr> -->

                      </tbody>
                    </table>

                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                  <!-- <button type="submit" class="btn btn-primary btnSave" type="button">
                    <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                    Save
                  </button> -->
                  <button type="submit" class="btn btn-primary btnSave" type="button">
                    <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                    Save
                  </button>
                </div>
              </form>
            </div>
            <!-- /.box -->
          </div>
        </div>


        <script type="text/javascript">
          $('.switch').click(function() {
            var checkedStatus = this.checked;
            $('#tblGroup tbody tr').each(function() {
              $(this).find('td:nth-child(2) :checkbox').prop('checked', checkedStatus);
              $(this).find('td:nth-child(3) :checkbox').prop('checked', checkedStatus);
              $(this).find('td:nth-child(4) :checkbox').prop('checked', checkedStatus);
              $(this).find('td:nth-child(5) :checkbox').prop('checked', checkedStatus);
              $(this).find('td:nth-child(6) :checkbox').prop('checked', checkedStatus);
              $(this).find('td:nth-child(7) :checkbox').prop('checked', checkedStatus);
              $(this).find('td:nth-child(8) :checkbox').prop('checked', checkedStatus);
              $(this).find('td:nth-child(9) :checkbox').prop('checked', checkedStatus);
              //$(this).prop('checked', checkedStatus);
            });
          });

          $("#userMainNav").addClass('active');
 $("#manageGroupNav").addClass('active');
   $("#openUserNav").addClass('menu-open');


          function showIndikator() {
            $('.btnSave').attr('disabled', 'disabled');
            $('.loadingIndikdator').show();
          }

          function hiddenIndikator() {
            $('.btnSave').removeAttr('disabled');
            $('.loadingIndikdator').hide();

          }

          $('#SimpanData').submit(function(e) {
            e.preventDefault();
            showIndikator();
            $('#SimpanData').submit();
          });

          $(document).ready(function() {
            hiddenIndikator();

          });
        </script>