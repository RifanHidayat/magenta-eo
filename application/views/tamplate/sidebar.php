   <?php
    $ses = $this->session->userdata('email');
    $fname = $this->session->userdata('fname');
    $lname = $this->session->userdata('lname');
    if ($ses == null) {
      redirect("Login");
    }
    ?>

   <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="" class="brand-link">

       <span class="brand-text font-weight-light">Magenta EO</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
       <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
           <img src="<?php echo base_url('images/avatar.png') ?>" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
           <a href="#" class="d-block"><?php echo $fname . " " . $lname; ?></a>
         </div>
       </div>

       <!-- Sidebar Menu -->
       <nav class="mt">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview">
             <a href="<?php echo base_url("Dashboard") ?>" class="nav-link" id="dashboarMainNav">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>
                 Dashboard
               </p>
             </a>
           </li>


           <!--  Menu User -->
           <?php if ($user_permission) : ?>



             <!--  Menu group -->

             <?php if (in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)) : ?>
               <li class="nav-item has-treeview" id="openGroupNav">
                 <a href="#" class="nav-link" id="groupMainNav">
                   <i class="nav-icon fas fa-users-cog"></i>
                   <p>
                     Groups
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                   <?php if (in_array('createGroup', $user_permission)) : ?>
                     <li class="nav-item">
                       <a href="<?php echo base_url("Group/add_group") ?>" class="nav-link" id="addGroupNav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add Group</p>
                       </a>
                     </li>
                   <?php endif; ?>
                   <?php if (in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)) : ?>

                     <li class="nav-item">
                       <a href="<?php echo base_url("Group/manage_groups") ?>" class="nav-link" id="manageGroupNav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Manage Groups</p>
                       </a>
                     </li>
                   <?php endif; ?>


                 </ul>
               </li>
             <?php endif; ?>
             <?php if (in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
               <li class="nav-item has-treeview" id="openUserNav">
                 <a href="#" class="nav-link" id="userMainNav">
                   <i class="nav-icon fas fa-users"></i>
                   <p>
                     Users
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>

                 <ul class="nav nav-treeview">
                   <?php if (in_array('createUser', $user_permission)) : ?>
                     <li class="nav-item">
                       <a href="<?php echo base_url("Users/add_user") ?>" class="nav-link" id="addUserNav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add User</p>
                       </a>
                     </li>
                   <?php endif; ?>

                   <?php if (in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
                     <li class="nav-item">
                       <a href="<?php echo base_url("Users/manage_users") ?> " class="nav-link" id="manageUserNav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Manage Users</p>
                       </a>
                     </li>
                   <?php endif; ?>

                 </ul>
               </li>
             <?php endif; ?>
             <?php if (in_array('createCustomer', $user_permission) || in_array('updateCustomer', $user_permission) || in_array('viewCustomer', $user_permission) || in_array('deleteCustomer', $user_permission)) : ?>
               <li class="nav-item has-treeview" id="openCustomerNav">
                 <a href="#" class="nav-link" id="customerMainNav">
                   <i class="nav-icon fas fa-handshake"></i>
                   <p>
                     Customers
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                   <?php if (in_array('createCustomer', $user_permission)) : ?>
                     <li class="nav-item">
                       <a href="<?php echo base_url("Customer/add_customer") ?>" class="nav-link" id="addCustomerNav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add Customer</p>
                       </a>
                     </li>
                   <?php endif; ?>
                   <?php if (in_array('updateCustomer', $user_permission) || in_array('viewCustomer', $user_permission) || in_array('deleteCustomer', $user_permission)) : ?>
                     <li class="nav-item">
                       <a href="<?php echo base_url("Customer/manage_customer") ?>" class="nav-link" id="manageCustomerNav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Manage Customers</p>
                       </a>
                     </li>
                   <?php endif; ?>

                 </ul>
               </li>
             <?php endif; ?>




             <!--  Menu User -->
             <?php if (in_array('createPicPO', $user_permission) || in_array('updatePicPO', $user_permission) || in_array('viewPicPO', $user_permission) || in_array('deletePicPO', $user_permission)) : ?>
               <li class="nav-item has-treeview" id="openPICNav">
                 <a href="#" class="nav-link" id="PICMainNav">
                   <i class="nav-icon fas fa-user-tag"></i>
                   <p>
                     PIC
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                   <?php if (in_array('createPicPO', $user_permission)) : ?>
                     <li class="nav-item">
                       <a href="<?php echo base_url("PicPO/add_pic") ?>" class="nav-link" id="addPICNav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add PIC</p>
                       </a>
                     </li>

                   <?php endif; ?>
                   <?php if (in_array('updatePicPO', $user_permission) || in_array('viewPicPO', $user_permission) || in_array('deletePicPO', $user_permission)) : ?>
                     <li class="nav-item">
                       <a href="<?php echo base_url("PicPO/manage_pic") ?>" class="nav-link" id="managePICPONav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Manage PIC PO</p>
                       </a>
                     </li>
                   <?php endif; ?>
                   <?php if (in_array('updatePicPO', $user_permission) || in_array('viewPicPO', $user_permission) || in_array('deletePicPO', $user_permission)) : ?>
                     <li class="nav-item">
                       <a href="<?php echo base_url("PicPO/manage_pic_event") ?>" class="nav-link" id="managePICEventNav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Manage PIC Event</p>
                       </a>
                     </li>
                   <?php endif; ?>


                 </ul>
               </li>
             <?php endif; ?>

             <?php if (in_array('createItems', $user_permission) || in_array('updateItems', $user_permission) || in_array('viewItems', $user_permission) || in_array('deleteItems', $user_permission)) : ?>
               <li class="nav-item has-treeview">
                 <a href="<?php echo base_url("Item/manage_item") ?>" class="nav-link" id="itemMainNav">
                   <i class="nav-icon fas fa-file-alt"></i>
                   <p>
                     Items
                   </p>
                 </a>
                 <!--           <ul class="nav nav-treeview">
               <?php if (in_array('createItems', $user_permission)) : ?>
              <li class="nav-item">
                <a href="<?php echo base_url("Item/add_item") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Item</p>
                </a>
              </li>
                <?php endif; ?>
                <?php if (in_array('updateItems', $user_permission) || in_array('viewItems', $user_permission) || in_array('deleteItems', $user_permission)) : ?>
              <li class="nav-item">
                <a href="<?php echo base_url("Item/manage_item") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Items</p>
                </a>
              </li>
                <?php endif; ?>
           
            </ul> -->
               </li>
             <?php endif; ?>

             <?php if (in_array('createQuatations', $user_permission) || in_array('updateQuatations', $user_permission) || in_array('viewQuatations', $user_permission) || in_array('deleteQuatations', $user_permission) || in_array('createQuatationsother', $user_permission) || in_array('updateQuatationsother', $user_permission) || in_array('deleteQuatationsother', $user_permission)) : ?>

               <li class="nav-item has-treeview" id="openQuotationNav">
                 <a href="#" class="nav-link" id="quotationMainNav">
                   <i class="nav-icon fas fa-file-contract"></i>
                   <p>
                     Quotation
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview">
                   <?php if (in_array('createQuatations', $user_permission) || in_array('createQuatationsother', $user_permission)) : ?>
                     <li class="nav-item">
                       <a href="<?php echo base_url("Quotation/add_quotation") ?>" class="nav-link" id="addQuotationNav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Add Quotation</p>
                       </a>
                     </li>
                   <?php endif; ?>
                   <?php if (in_array('updateQuatations', $user_permission) || in_array('viewQuatations', $user_permission) || in_array('deleteQuatations', $user_permission)) : ?>
                     <li class="nav-item">
                       <a href="<?php echo base_url("Quotation/manage_quotation") ?>" class="nav-link" id="manageQuotationeventNav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Manage Quotation Event</p>
                       </a>
                     </li>
                   <?php endif; ?>

                   <?php if (in_array('updateQuatationsother', $user_permission) || in_array('viewQuatationsother', $user_permission) || in_array('deleteQuatationsother', $user_permission)) : ?>
                     <li class="nav-item">
                       <a href="<?php echo base_url("Quotation/manage_quotation_other") ?>" class="nav-link" id="manageQuotationotherNav">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Manage Quotation Other</p>
                       </a>
                     </li>
                   <?php endif; ?>
                 </ul>
               </li>
             <?php endif; ?>
             <?php if (in_array('updateBast', $user_permission) || in_array('viewBast', $user_permission) || in_array('deleteBast', $user_permission)) : ?>

               <li class="nav-item has-treeview" id="openBastNav">
                 <a href="<?php echo base_url("Bast/manage_bast") ?>" class="nav-link" id="bastMainNav">
                   <i class="nav-icon fas fa-file-contract"></i>
                   <p>
                     BAST

                   </p>
                 </a>
                 <!--     <ul class="nav nav-treeview">
             
                <?php if (in_array('updateBast', $user_permission) || in_array('viewBast', $user_permission) || in_array('deleteBast', $user_permission)) : ?>
              <li class="nav-item">
                <a href="<?php echo base_url("Bast/manage_bast") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage BAST</p>
                </a>
              </li>
               <?php endif; ?> 
            </ul> -->
               </li>
             <?php endif; ?>
             <?php if (in_array('updateDelivery', $user_permission) || in_array('viewDelivery', $user_permission) || in_array('deleteDelivery', $user_permission)) : ?>

               <li class="nav-item has-treeview">
                 <a href="<?php echo base_url("Delivery/manage_delivery") ?>" class="nav-link" id="deliveryMainNav">
                   <i class="nav-icon fas fa-truck"></i>
                   <p>
                     Delivery

                   </p>
                 </a>
               </li>
             <?php endif; ?>


             <?php if (in_array('updateFaktur', $user_permission) || in_array('viewFaktur', $user_permission) || in_array('deleteFaktur', $user_permission)) : ?>

               <li class="nav-item has-treeview">
                 <a href="<?php echo base_url("Faktur/manage_faktur") ?>" class="nav-link" id="fakturMainNav">
                   <i class="nav-icon fas fa-file-invoice-dollar"></i>
                   <p>
                     Faktur

                   </p>
                 </a>

               </li>
             <?php endif; ?>


              

               <li class="nav-item has-treeview">
                 <a href="<?php echo base_url("Transactions/manage") ?>" class="nav-link" id="transactionsMainNav">
                   <i class="nav-icon fas fa-file"></i>
                   <p>
                     Transactions
                     <i class="right fas"></i>
                   </p>
                 </a>

               </li>
          






             <?php if (in_array('createLaporan', $user_permission) || in_array('updateLaporan', $user_permission) || in_array('viewLaporan', $user_permission) || in_array('deleteLaporan', $user_permission)) : ?>

               <li class="nav-item has-treeview">
                 <a href="<?php echo base_url("Laporan") ?>" class="nav-link" id="laporanMainNav">
                   <i class="nav-icon fas fa-file"></i>
                   <p>
                     Laporan
                     <i class="right fas"></i>
                   </p>
                 </a>

               </li>
             <?php endif; ?>
           <?php endif; ?>
           <li class="nav-item has-treeview">
             <a href="<?php echo base_url("Password/change_password") ?>" class="nav-link" id="passwordMainNav">
               <i class="nav-icon fas fa-building"></i>
               <p>
                 Change Password
                 <i class="right fas"></i>
               </p>
             </a>

           </li>

           <li hidden="" class="nav-item has-treeview">
             <a href="<?php echo base_url("Profile") ?>" class="nav-link" id="ProfileMainNav">
               <i class="nav-icon fas fa-building"></i>
               <p>
                 Profile Perusahaan
                 <i class="right fas"></i>
               </p>
             </a>

           </li>




           <hr>
           <li class="nav-item has-treeview" id="logoutNavNav">
             <a href="<?php echo base_url('login/logout'); ?>" class="nav-link">
               <i class="nav-icon fa fa-sign-out-alt"></i>
               <p>Logout</p>
             </a>
           </li>
         </ul>
       </nav>
       <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
   </aside>