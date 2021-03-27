
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
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

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
            <!-- Left Panel -->
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
                            <?php if(in_array('updateBank', $user_permission) || in_array('viewbank', $user_permission) || in_array('deleteBank', $user_permission)): ?>
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
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url('images/avatar.png');?>" alt="User Avatar">
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
           <?php if(in_array('createBank', $user_permission)): ?>
            <a href="<?php echo base_url('dashboard/add_bank') ?>" class="btn btn-primary">Add Bank</a>
            <?php endif; ?>
            <hr>
            <br /> <br />

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Bank</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Deposite Number</th>
                  <th>Bank CasIn</th>
                  <th>No Rekening</th>
                  <th>Deposit</th>
               

                  <th colspan="3"><center>Action</center></th>
               
                </tr>
                </thead>
                <tbody>
                               
                    <?php foreach ($bank as $k): ?>
                      <tr>
                        <td><?php echo $k->deposit_number; ?></td>
                         <td><?php echo $k->bank_name; ?></td>
                        <td><?php echo $k->norek; ?></td>
                        <td><?php echo $k->deposit; ?></td>
                        <td>
                        <?php if(in_array('updateBank', $user_permission)): ?>
                        <font color="#FFFFFF" size="2px">'+'<a class="btn btn-warning btn-xs" href="<?php echo base_url('dashboard/edit_bank/'.$k->bank_id) ?>"><font color="white"><i  class="fa fa-edit" ></i> UBAH</font></a>
                                <?php endif; ?>
                         <?php if(in_array('deleteBank', $user_permission)): ?>
                        <font color="#FFFFFF" size="2px"><a class="btn btn-danger btn-xs" onclick="swetalert('<?php echo $k->id_bank_item?>')"><i class="fa fa-trash"></i><font size="2px"> HAPUS</a>'</td>  
                        <?php endif; ?>  



                      </tr>
                    <?php endforeach ?>
             
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>


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
    <script type="text/javascript" src="<?php echo base_url('assets/dashboard/js/jquery.min.js') ?>"></script>  

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url('assets/dashboard/js/main.js');?>"></script>

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
    <script src="<?php echo base_url('assets/sweetalert/sweetalert2.all.min.js')?>"></script>

  

    </script>
</body>


<script type="text/javascript">
    var value=0;


    function total(){
      //  var a=$('[name="deposit"]').val();
        var Nomor = $("#tableLoop tbody tr").length

       $('#deposit1').val();
      
   

         document.getElementById("hasil").innerHTML =$('#deposit_1').val();;

        }
        
         $(document).ready(function() {
    
            AmbilId();

    });

       function AmbilId(){
      $.ajax({
          type:"post",
          url:'<?php echo base_url("dashboard/AmbilIDBank")?>',
          dataType:'json',
          success:function(hasil){
             console.log(hasil);
                  var date = new Date();
                  var tahun = date.getFullYear();
                  var t=tahun.toString()
                  var bulan = date.getMonth();
                  var tanggal = date.getDate();
                  var hari = date.getDay();
                  var bank_id="00"+hasil;
                  $('[name="id"]').val(bank_id)
        
        //QT-D-20082801
                $('[name="deposit_number"]').val("QT-D"+t.substring(2,4)+""+(bulan+1)+""+tanggal+bank_id);
              
          },
          error:function(hasil){
          
    
           
          }
         

      });
  
}

  function myFunction() {
    total();
  

 }


              
$(document).ready(function() {
                 for(B=1; B<=1; B++){
                  Barisbaru();
                 } 
                 $('#BarisBaru').click(function(e) {
                     e.preventDefault();
                     Barisbaru();
                 });

                 $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
              });

              function Barisbaru() {
                  $(document).ready(function() {
                      $("[data-toggle='tooltip']").tooltip(); 
                  });
                  var Nomor = $("#tableLoop tbody tr").length + 1;
                  var Baris = '<tr>';
                          Baris += '<td class="text-center">'+Nomor+'</td>';
                          Baris += '<td>';
                              Baris += '<input type="text" name="bank_name[]" id="bank_name" class="form-control bank_name" placeholder="Bank Name..." required="">';
                          Baris += '</td>';
                            Baris += '<td>';
                              Baris += '<input type="text" name="rek[]" id="rek" class="form-control rek" placeholder="No Rekening..." required="">';
                          Baris += '</td>';
                          Baris += '<td>';
                              Baris += '<input type="text" name="deposit[]" id="deposit"  class="form-control deposit" placeholder="Deposit..." required=""  oninput="myFunction()"  id="deposit1"  onkeyup="convertToRupiah(this);">';
                          Baris += '</td>';
                          Baris += '<td class="text-center">';
                              Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBaris"><i class="fa fa-times"></i></a>';
                          Baris += '</td>';
                      Baris += '</tr>';

                  $("#tableLoop tbody").append(Baris);
                  $("#tableLoop tbody tr").each(function () {
                     $(this).find('td:nth-child(2) input').focus(); 
                  });

              }

              $(document).on('click', '#HapusBaris', function(e) {
                 e.preventDefault();
                 var Nomor = 1;
                 $(this).parent().parent().remove();
                 $('tableLoop tbody tr').each(function() {
                     $(this).find('td:nth-child(1)').html(Nomor);
                     Nomor++;
                 });
              });

              $(document).ready(function() {
                 $('#SimpanData').submit(function(e) {
                     e.preventDefault();
                     save_bank_item();
                 });
              });

              function save_bank_item() {
                    var id=$('[name="id"]').val();
                    var deposit=$("[name='deposit_number']").val();
                    var total=$("[name='hasil']").val();
                  $.ajax({
                      url:$("#SimpanData").attr('action'),
                      type:'post',
                      cache:false,
                      dataType:"json",
                      data: $("#SimpanData").serialize(),
                      success:function (data) {
                          if (data.success == true) {
                        
                                $('.bank_name').val('');
                                $('.hasil').val('');
                                $('.rek').val('');
                                $('.deposit').val('');
                                $('#notif').fadeIn(800, function() {
                                 $("#notif").html(data.notif).fadeOut(5000).delay(800); 
                                
                                });
                          
                    
         
                          }else{
                              $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
                          }
                      },

                      error:function (error) {
                          alert(error);
                      }

                  });
              }
                      
           
  


</script>
 <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js')?>"></script>


<script type="text/javascript">



  
  function swetalert(id){
  Swal.fire({
  title: 'Yakin?',
  text: "Mau menghapus data ini!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Batalkan',
  confirmButtonText: 'Iya'
}).then((result) => {
  if (result.value) {
    $.ajax({
        url : "<?php echo base_url("dashboard/hapus_bank/3") ?>",
        type:"post",
        data:{id:id},
        success:function(){
            Swal.fire(
      'Deleted!',
      'Data berhasil dihapus.',
      'success'
    );

            
            location.reload();

        },
        error:function(){
                Swal.fire(
      
      'gagal menghapus data.',
      'error'
    );
        }

    });
  }
});

}


</script>


</html>
