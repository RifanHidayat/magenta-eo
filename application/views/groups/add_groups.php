
    
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
             <a href="<?php echo base_url('Group/manage_groups') ?>" class="btn btn-secondary"><font color="white">Back</font></a>
          
          </div>
        </div>
         <div class="card-body">
      <!-- Small boxes (Stat box) -->
      <div class="row">

       <div class="col-md-12 col-xs-12">
        
          <div class="box">
          
            <form role="form" action="<?php base_url('users/add_group') ?>" method="post">
              <div class="box-body">

            

                <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input required="" type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo set_value('group_name')?>">
                </div>
                <?= form_error('group_name','<small class="text-danger pl-3">','</small>')?>
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
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>Group</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>User</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" class="minimal"></td>
                      </tr>

                            <tr>
                        <td>Customer</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createCustomer" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCustomer" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCustomer" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteCustomer" class="minimal"></td>
                      </tr>

                    
                         <tr>
                        <td>PIC</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createPicPO" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updatePicPO" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewPicPO" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deletePicPO" class="minimal"></td>
                      </tr>
                       <tr>
                        <td>Item</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createItems" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateItems" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewItems" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteItems" class="minimal"></td>
                      </tr>
                          <tr>
                        <td>Item Value</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createItemvalue" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateItemvalue" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewItemvalue" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteItemvalue" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Saldo PIC PO</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createBank" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateBank" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewBank" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteBank" class="minimal"></td>
                      </tr>
                     
                  

                   
                      <tr>
                        <td>Quotation Event</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createQuatations" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateQuatations" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewQuatations" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteQuatations" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="statusQuatations" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="printQuotation" class="minimal"></td>
                      </tr>
                         <tr>
                        <td>Quotation Other</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createQuatationsother" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateQuatationsother" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewQuatationsother" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteQuatationsother" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="statusQuatationsother" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="printQuotationother" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>BAST</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createBast" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateBast" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewBast" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteBast" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="statusBast" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="printBast" class="minimal"></td>

                      </tr>
                        <tr>
                        <td>Faktur Penjualan</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createFaktur" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateFaktur" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewFaktur" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteFaktur" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="statusFaktur" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="printFaktur" class="minimal"></td>
                      </tr>
            <tr>
                        <td>Delivery</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createDelivery" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateDelivery" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewDelivery" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteDelivery" class="minimal"></td>
                         <td><input type="checkbox" name="permission[]" id="permission" value="statusDelivery" class="minimal"></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="printDelivery" class="minimal"></td>
                      </tr>
                     
          
     
             <tr>
                        <td>Laporan</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createLaporan" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateLaporan" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewLaporan" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteLaporan" class="minimal"></td>

                      </tr>
           
                    </tbody>
                  </table>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                
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
    //$(this).prop('checked', checkedStatus);
  });
});
  
   $("#groupMainNav").addClass('active');
  $("#addGroupNav").addClass('active');
   $("#openGroupNav").addClass('menu-open');
</script>
 
 

