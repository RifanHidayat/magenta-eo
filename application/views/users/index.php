
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/css/cs-skin-elastic.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dashboard/css/style.css')?>">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


</head>

<body>
    <?php
    $ses=$this->session->userdata('email');
    $fname=$this->session->userdata('fname');
    if ($ses==null){
      redirect("login");
    }
  ?>
                <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url('index.php');?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>

                         <?php if($user_permission): ?>
                      <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-inbox"></i>Group</a>
                        <ul class="sub-menu children dropdown-menu"> 
                            <?php if(in_array('createGroup', $user_permission)): ?>
                            <li><i class="fa fa-id-badge"></i><a href="<?php echo base_url('dashboard/add_group');?>">Add Group</a></li>
                        <?php endif; ?>
                         <?php if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>

                            <li><i class="fa fa-bars"></i><a href="<?php echo base_url('dashboard/manage_groups');?>">Manage Groups</a></li>
                             <?php endif; ?>

                        </ul>
                    </li>
                      <?php endif; ?>
                    
                        <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>User</a>

                        <ul class="sub-menu children dropdown-menu">
                            <?php if(in_array('createUser', $user_permission)): ?>
                            <li><i class="fa fa-table"></i><a href="<?php echo base_url('dashboard/add_user');?>">Add user</a></li>
                             <?php endif; ?>
                            <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                            <li><i class="fa fa-table"></i><a  href="<?php echo base_url('dashboard/manage_users');?>">Manage Users</a></li>
                            <?php endif; ?>
                        </ul>

                    </li>
                    <?php endif; ?>
                      <?php if(in_array('createPicPO', $user_permission) || in_array('updatePicPO', $user_permission) || in_array('viewPicPO', $user_permission) || in_array('deletePicPO', $user_permission)): ?>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>PIC PO</a>
                        <ul class="sub-menu children dropdown-menu">
                             <?php if(in_array('createPicPO', $user_permission)): ?>
                            <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url('dashboard/add_pic');?>">Add PIC PO</a></li>
                             <?php endif; ?>
                            <?php if(in_array('updatePicPO', $user_permission) || in_array('viewPicPO', $user_permission) || in_array('deletePicPO', $user_permission)): ?>
                            <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url('dashboard/manage_pic');?>">Manage PIC PO</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                     <?php if(in_array('createCustomer', $user_permission) || in_array('updateCustomer', $user_permission) || in_array('viewCustomer', $user_permission) || in_array('deleteCustomer', $user_permission)): ?>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Customer</a>
                        <ul class="sub-menu children dropdown-menu">
                             <?php if(in_array('createCustomer', $user_permission)): ?>
                            <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url('dashboard/add_customer');?>">Add Customer</a></li>
                             <?php endif; ?>
                            <?php if(in_array('updateCustomer', $user_permission) || in_array('viewCustomer', $user_permission) || in_array('deleteCustomer', $user_permission)): ?>
                            <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url('dashboard/manage_customer');?>">Manage Customer</a></li>
                              <?php endif; ?>
                        </ul>
                    </li>
                      <?php endif; ?>
                       <?php if(in_array('createItems', $user_permission) || in_array('updateItems', $user_permission) || in_array('viewItems', $user_permission) || in_array('deleteItems', $user_permission)): ?>
                        <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cube"></i>Items</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php if(in_array('createItems', $user_permission)): ?>
                            <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url('dashboard/add_attribute');?>">Add Item </a></li>
                             <?php endif; ?>
                            <?php if(in_array('updateItems', $user_permission) || in_array('viewItems', $user_permission) || in_array('deleteItems', $user_permission)): ?>
                            <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url('dashboard/manage_attribute');?>">Manage Items</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                       <?php if(in_array('createBank', $user_permission) || in_array('updateBank', $user_permission) || in_array('viewBank', $user_permission) || in_array('deleteBank', $user_permission)): ?>
                        <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bank"></i>Bank</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php if(in_array('createBank', $user_permission)): ?>
                            <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url('dashboard/add_bank');?>">Add Bank </a></li>
                             <?php endif; ?>
                            
                            <li><i class="menu-icon fa fa-th"></i><a href="<?php echo base_url('dashboard/manage_bank');?>">Manage Bank</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                     <?php endif; ?>
                     


            
                </ul>

                   
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->

          <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="<?php echo base_url('images/logo.png');?>" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                 

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">   <table>
                                <tr>
                                    <td><?php echo ($fname); ?><td>
                                  <!--   <th>  <p><?php echo $fname?><></td> -->
                                    <td><img class="user-avatar rounded-circle" src="<?php echo base_url('images/avatar.png');?>" alt="User Avatar"></td>
                                </tr>
                            </table>
                        </a>

                        <div class="user-menu dropdown-menu">
                         

                            <a class="nav-link" href="<?php echo base_url('login/logout');?>"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
     
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
             <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add User</h3>
               
              <hr>
                <br
            </div>
            <form role="form" action="<?php base_url('dashboard/add_user') ?>" method="post">
              <div class="box-body">

             

                <div class="form-group">
                  <label for="groups">Groups</label>
                  <select class="form-group" id="groups" name="groups" style="width:99%;"  >
                    <option value="">Select Groups</option>
                    <?php foreach ($groups as $k): ?>
                      <option value="<?php echo $k->group_name ?>"><?php echo $k->group_name ?></option>
                    <?php endforeach ?>
                  </select> 

                </div>
                <?= form_error('groups','<small class="text-danger pl-3">','</small>')?>
                
            

                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" value="<?php echo set_value('username')?>">
                </div>
                 <?= form_error('username','<small class="text-danger pl-3">','</small>')?>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" value="<?php echo set_value('email')?>">
                </div>
                 <?= form_error('email','<small class="text-danger pl-3">','</small>')?>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off
                  ">
                </div>
                 <?= form_error('password','<small class="text-danger pl-3">','</small>')?>

                <div class="form-group">
                  <label for="cpassword">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                </div>
                 <?= form_error('cpassword','<small class="text-danger pl-3">','</small>')?>

                <div class="form-group">
                  <label for="fname">First name</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" autocomplete="off" value="<?php echo set_value('fname')?>">
                 <?= form_error('fname','<small class="text-danger pl-3">','</small>') ?>
                </div>


                <div class="form-group">
                  <label for="lname">Last name</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" autocomplete="off" value="<?php echo set_value('lname')?>">
                   <?= form_error('lname','<small class="text-danger pl-3">','</small>')?>
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off" value="<?php echo set_value('phone')?>">
                <?= form_error('phone','<small class="text-danger pl-3">','</small>')?>
                </div>

                <div class="form-group" value="<?php echo set_value('gender')?>">
                  <label for="gender" >Gender</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="1">
                      Male
                    </label>
                    <label>
                      <input type="radio" name="gender" id="female" value="2">
                      Female
                    </label>
                  </div>
                       <?= form_error('gender','<small class="text-danger pl-3">','</small>')?>
                </div>
           


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?php echo base_url('dashboard/manage_users') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
        </div>
      </div>

        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
        
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
   <!--  <script src="<?php echo base_url('assets/dashboard/js/main.js');?>"></script> -->

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/js/init/weather-init.js')?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/js/init/fullcalendar-init.js');?>"></script>
<!--     <script src="<?php echo base_url('assets/dashboard/js/jquery-2.1.1.min.js');?>"></script>  -->

    <!--Local Stuff-->


 

</body>
    <script>
    

$(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $("select").select2();
});
</script>

   


</html>
