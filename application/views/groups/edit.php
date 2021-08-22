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
        <h3 class="box-title"><b>Edit Group</b></h3>

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
              <div class="box-header">

              </div>
              <form id="SimpanData" action="<?php base_url('Group/edit') ?>" method="post">
                <div class="box-body">



                  <div class="form-group">
                    <label for="group_name">Group Name</label>
                    <input required="" type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo ($data) ?>">
                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="permission">Permission</label>
                    <div class="qnumber">

                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input switch" id="customSwitches">
                        <label class="custom-control-label" for="customSwitches"></label>
                      </div>

                      <?php $serialize_permission = unserialize($group_data['permission']); ?>

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
                            <th>Payment</th>
                            <th>Finance & Project</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Group</td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="createGroup" <?php
                                                                                                                if ($serialize_permission) {
                                                                                                                  if (in_array('createGroup', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                }
                                                                                                                ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updateGroup" <?php
                                                                                                                if ($serialize_permission) {
                                                                                                                  if (in_array('updateGroup', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                }
                                                                                                                ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewGroup" <?php
                                                                                                              if ($serialize_permission) {
                                                                                                                if (in_array('viewGroup', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              }
                                                                                                              ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deleteGroup" <?php
                                                                                                                if ($serialize_permission) {
                                                                                                                  if (in_array('deleteGroup', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                }
                                                                                                                ?>></td>
                                                                                                                 <td></td>
                                                                                                                 <td></td>
                                                                                                                 <td></td>
                                                                                                                 <td></td>
                          </tr>
                          <tr>
                            <td>User</td>
                            <td><input type="checkbox" class="minimal" name="permission[]" class="minimal" value="createUser" <?php if ($serialize_permission) {
                                                                                                                                if (in_array('createUser', $serialize_permission)) {
                                                                                                                                  echo "checked";
                                                                                                                                }
                                                                                                                              } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updateUser" <?php
                                                                                                              if ($serialize_permission) {
                                                                                                                if (in_array('updateUser', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              }
                                                                                                              ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewUser" <?php
                                                                                                            if ($serialize_permission) {
                                                                                                              if (in_array('viewUser', $serialize_permission)) {
                                                                                                                echo "checked";
                                                                                                              }
                                                                                                            }
                                                                                                            ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deleteUser" <?php
                                                                                                              if ($serialize_permission) {
                                                                                                                if (in_array('deleteUser', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              }
                                                                                                              ?>></td>
                                                                                                               <td></td>
                                                                                                               <td></td>
                                                                                                               <td></td>
                                                                                                               <td></td>
                          </tr>
                          <tr>
                            <td>Customer</td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="createCustomer" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('createCustomer', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updateCustomer" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('updateCustomer', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewCustomer" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('viewCustomer', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deleteCustomer" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('deleteCustomer', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                                                                                                                   <td></td>
                                                                                                                   <td></td>
                                                                                                                   <td><input type="checkbox" name="permission[]" class="minimal"             value="paymentCustomer" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('paymentCustomer', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                                                                                                                   <td></td>
                          </tr>


                          <tr>
                            <td>PIC</td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="createPicPO" <?php
                                                                                                                if ($serialize_permission) {
                                                                                                                  if (in_array('createPicPO', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                }
                                                                                                                ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updatePicPO" <?php
                                                                                                                if ($serialize_permission) {
                                                                                                                  if (in_array('updatePicPO', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                }
                                                                                                                ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewPicPO" <?php
                                                                                                              if ($serialize_permission) {
                                                                                                                if (in_array('viewPicPO', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              }
                                                                                                              ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deletePicPO" <?php
                                                                                                                if ($serialize_permission) {
                                                                                                                  if (in_array('deletePicPO', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                }
                                                                                                                ?>> </td>
                                                                                                                 <td></td>
                                                                                                                 <td></td>
                                                                                                                 <td></td>
                                                                                                                 <td></td>
                          </tr>

                          <tr>

                          <tr>
                            <td>Item</td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="createItems" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('createItems', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updateItems" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('updateItems', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewItems" <?php if ($serialize_permission) {
                                                                                                                if (in_array('viewItems', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deleteItems" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('deleteItems', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>
                                                                                                                 <td></td>
                                                                                                                 <td></td>
                                                                                                                 <td></td>
                                                                                                                 <td></td>
                          </tr>

                          <tr>
                            <td>Item Value</td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="createItemvalue" <?php if ($serialize_permission) {
                                                                                                                      if (in_array('createItemvalue', $serialize_permission)) {
                                                                                                                        echo "checked";
                                                                                                                      }
                                                                                                                    } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updateItemvalue" <?php if ($serialize_permission) {
                                                                                                                      if (in_array('updateItemvalue', $serialize_permission)) {
                                                                                                                        echo "checked";
                                                                                                                      }
                                                                                                                    } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewItemvalue" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('viewItemvalue', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deleteItemvalue" <?php if ($serialize_permission) {
                                                                                                                      if (in_array('deleteItemvalue', $serialize_permission)) {
                                                                                                                        echo "checked";
                                                                                                                      }
                                                                                                                    } ?>></td>
                                                                                                                     <td></td>
                                                                                                                     <td></td>
                                                                                                                     <td></td>
                                                                                                                     <td></td>
                          </tr>

            


                          <tr>
                            <td>Quotation Event</td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="createQuatations" <?php if ($serialize_permission) {
                                                                                                                      if (in_array('createQuatations', $serialize_permission)) {
                                                                                                                        echo "checked";
                                                                                                                      }
                                                                                                                    } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updateQuatations" <?php if ($serialize_permission) {
                                                                                                                      if (in_array('updateQuatations', $serialize_permission)) {
                                                                                                                        echo "checked";
                                                                                                                      }
                                                                                                                    } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewQuatations" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('viewQuatations', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deleteQuatations" <?php if ($serialize_permission) {
                                                                                                                      if (in_array('deleteQuatations', $serialize_permission)) {
                                                                                                                        echo "checked";
                                                                                                                      }
                                                                                                                    } ?>></td>

                            <td><input type="checkbox" name="permission[]" class="minimal" value="statusQuatations" <?php if ($serialize_permission) {
                                                                                                                      if (in_array('statusQuatations', $serialize_permission)) {
                                                                                                                        echo "checked";
                                                                                                                      }
                                                                                                                    } ?>></td>

                            <td><input type="checkbox" name="permission[]" class="minimal" value="printQuotation" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('printQuotation', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                                                                                                                   <td></td>
                                                                                                                   <td></td>

                          </tr>

                          <tr>
                            <td>Quotation Other</td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="createQuatationsother" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('createQuatationsother', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updateQuatationsother" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('updateQuatationsother', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewQuatationsother" <?php if ($serialize_permission) {
                                                                                                                          if (in_array('viewQuatationsother', $serialize_permission)) {
                                                                                                                            echo "checked";
                                                                                                                          }
                                                                                                                        } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deleteQuatationsother" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('deleteQuatationsother', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="statusQuatationsother" <?php if ($serialize_permission) {
                                                                                                                            if (in_array('statusQuatationsother', $serialize_permission)) {
                                                                                                                              echo "checked";
                                                                                                                            }
                                                                                                                          } ?>></td>


                            <td><input type="checkbox" name="permission[]" class="minimal" value="printQuotationother" <?php if ($serialize_permission) {
                                                                                                                          if (in_array('printQuotationother', $serialize_permission)) {
                                                                                                                            echo "checked";
                                                                                                                          }
                                                                                                                        } ?>></td>
                                                                                                                         <td></td>
                                                                                                                         <td></td>
                          </tr>
                         
                          
                          <tr>
                            <td>BAST</td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="createBast" <?php if ($serialize_permission) {
                                                                                                                if (in_array('createBast', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updateBast" <?php if ($serialize_permission) {
                                                                                                                if (in_array('updateBast', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewBast" <?php if ($serialize_permission) {
                                                                                                              if (in_array('viewBast', $serialize_permission)) {
                                                                                                                echo "checked";
                                                                                                              }
                                                                                                            } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deleteBast" <?php if ($serialize_permission) {
                                                                                                                if (in_array('deleteBast', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>></td>

                            <td><input type="checkbox" name="permission[]" class="minimal" value="statusBast" <?php if ($serialize_permission) {
                                                                                                                if (in_array('statusBast', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>></td>


                            <td><input type="checkbox" name="permission[]" class="minimal" value="printBast" <?php if ($serialize_permission) {
                                                                                                                if (in_array('printBast', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>></td>
                                                                                                               <td></td>
                                                                                                               <td></td>

                          </tr>
                          <tr>
                            <td>Faktur Penjualan</td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="createFaktur" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('createFaktur', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updateFaktur" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('updateFaktur', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewFaktur" <?php if ($serialize_permission) {
                                                                                                                if (in_array('viewFaktur', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deleteFaktur" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('deleteFaktur', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="statusFaktur" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('statusFaktur', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>


                            <td><input type="checkbox" name="permission[]" class="minimal" value="printFaktur" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('printFaktur', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>
                                                                                                                 <td></td>
                                                                                                                 <td></td>
                          </tr>
                          <tr>
                            <td>Delivery</td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="createDelivery" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('createDelivery', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updateDelivery" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('updateDelivery', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewDelivery" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('viewDelivery', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deleteDelivery" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('deleteDelivery', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>

                            <td><input type="checkbox" name="permission[]" class="minimal" value="statusDelivery" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('statusDelivery', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>

                            <td><input type="checkbox" name="permission[]" class="minimal" value="printDelivery" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('printDelivery', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                                                                                                                   <td></td>
                                                                                                                   <td></td>
                          </tr>
                          <tr>
                            <td>Transactions</td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="createTransactions" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('createTransactions', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="updateTransactions" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('updateTransactions', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewTransactions" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('viewTransactions', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="deleteTransactions" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('deleteTransactions', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>

                            <td></td>

                            <td><input type="checkbox" name="permission[]" class="minimal" value="printTransactions" <?php if ($serialize_permission) {
                                                                                                                    if (in_array('printTransactions', $serialize_permission)) {
                                                                                                                      echo "checked";
                                                                                                                    }
                                                                                                                  } ?>></td>
                                                                                                                   <td></td>
                                                                                                                   <td></td>
                          </tr>

                          <tr>
                            <td>Laporan</td>
                            <td><input type="checkbox" name="permission[]" class="hide" value="createLaporan" <?php if ($serialize_permission) {
                                                                                                                if (in_array('createLaporan', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="hide" value="updateLaporan" <?php if ($serialize_permission) {
                                                                                                                if (in_array('updateLaporan', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="minimal" value="viewLaporan" <?php if ($serialize_permission) {
                                                                                                                  if (in_array('viewLaporan', $serialize_permission)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>></td>
                            <td><input type="checkbox" name="permission[]" class="hide" value="deleteLaporan" <?php if ($serialize_permission) {
                                                                                                                if (in_array('deleteLaporan', $serialize_permission)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>></td>
                                                                                                               <td></td>
                                                                                                               <td></td>
                                                                                                               <td></td>
                                                                                                               <td></td>
                                                                                                               </tr>
                                                                                                               </tr>


                                                                                                               


                        </tbody>
                      </table>

                    </div>
                  </div>

                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary btnSave" type="button">
                      <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                      Save Changes
                    </button>
                    <!--        <a href="<?php echo base_url('Group/manage_groups') ?>" class="btn btn-warning"><font color="white">Back</font></a> -->
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

          $("#groupMainNav").addClass('active');
          $("#manageGroupNav").addClass('active');
          $("#openGroupNav").addClass('menu-open');

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