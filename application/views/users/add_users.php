<style>

</style>
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

  <style type="text/css">
    .hidden {
      display: none;

        {
        .visible {
          display: block;
        }
  </style>

  <section class="content">
    <div class="card">
      <div class="card-header">

        <h3 class="box-title"><b>Add User</b></h3>

        <div class="card-tools" style="margin-top: -35px;margin-right: 3px">
          <a href="<?php echo base_url('Users/manage_users') ?>" class="btn btn-secondary">
            <font color="white">Back</font>
          </a>
        </div>


      </div>
      <div class="card-body">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12 col-xs-12">



            <div class="box">

              <form id="SimpanData" action="<?php base_url('Users/add_user') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="col-md-10 col-xs-10 pull pull-right">




                  </div>


                  <div class="form-group">
                    <label for="groups">Groups</label>


                    <select   style="width: 50%" class="form-group" reqired="" id="groups" name="groups">
                      <option value="" style="height: 100px;">Select Groups</option>
                      <?php foreach ($groups as $k) : ?>
                        <option value="<?php echo $k->group_name ?>"><?php echo $k->group_name ?></option>
                      <?php endforeach ?>
                    </select>
                    <?= form_error('groups', '<small class="text-danger pl-3">', '</small>') ?>


                  </div>
                  <div class="form-group" id="kanan1" style="margin-top: -75px;">
                    <label for="username">Username</label>
                    <br>
                    <div class="col-md-12">
                      <input required="" style="width: 100%" type="text" required="" class="form-control" id="username" name="username" autocomplete="off" value="<?php echo set_value('username') ?>">
                      <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <br>
                    <label for="fname">First name</label>
                    <input style=" width: 50%" type="text" class="form-control" id="fname" name="fname" required="" autocomplete="off" value="<?php echo set_value('fname') ?>">
                    <?= form_error('fname', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <div class="form-group" id="kanan1" style="margin-top: -75px;">
                    <label for="lname">Last name</label>
                    <input required="" type="text" class="form-control" id="lname" name="lname" required="" autocomplete="off" value="<?php echo set_value('lname') ?>">
                    <?= form_error('lname', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <br>
                    <input required="" style="width: 50%" type="email" class="form-control" id="email" name="email" required="" autocomplete="off" value="<?php echo set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group" id="kanan1" style="margin-top: -75px;">
                    <label for="phone">Phone</label>
                    <input  type="text" class="form-control" id="phone" name="phone" autocomplete="off" value="<?php echo set_value('phone') ?>">
                    <?= form_error('phone', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <br>
                    <input required="" style="width: 50%" type="password" class="form-control" id="password" name="password" required="" autocomplete="off
                  ">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>

                  </div>
                  <div class="form-group" id="kanan1" style="margin-top: -75px;">
                    <label for="cpassword">Confirm password</label>
                    <input required="" type="password" class="form-control" id="cpassword" name="cpassword" required="" autocomplete="off">
                    <small class="text-danger pl-3" id="cpassword_error"></small>

                  </div>
                  <div class="col-md-3 col-xs-12">

                    <div class="form-group" value="<?php echo set_value('gender') ?>">
                      <label for="gender">Gender</label>
                      <br>
                      <div class="radio">
                        <label>
                          <input required="" type="radio" name="gender" id="male" value="1" value="<?php echo set_value('gender') ?>">
                          Male
                        </label>
                        <label>
                          <input required="" type="radio" name="gender" id="female" value="2" value="<?php echo set_value('gender') ?>">
                          Female
                        </label>
                      </div>
                      <?= form_error('gender', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                  </div>
                  <!-- <button style="margin-left: 10px" type="submit" class="btn btn-primary">Save</button> -->
                    <div class="col-md-3 col-xs-12">

                    <div class="form-group" value="<?php echo set_value('gender') ?>">
                      <label for="gender">Projects & Finance
                      
                      </label>
                      <br>
                      <div class="radio">
                       
                        <label>
                          <input  type="checkbox" name="checked" id="checked" value="2" value="<?php echo set_value('gender') ?>">
                          
                        </label>
                      </div>
                      <?= form_error('gender', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                  </div>
                 <div class=" finance">
                  <label>Select menu</label>

                  <select  class="js-example-basic-multiple" name="finance[]" multiple="multiple" style="width: 50%; height:30%;color:black;" multiple>
                 
                   <option value="manage">Manage Projecs</option>
    
                   <option value="mapping">Mapping Projets</option>   
                   <option value="pictb">PIC TB</option>   
                   <option value="inout">In Out</option>   
                   <option value="account">Akun</option>      
                </select>
                 </div>
                <br>
                <br>
    

 

                  <div class="form-group text-left">

                  <button align="right" type="submit" class="btn btn-primary btnSave" type="button">
                    <span class="spinner-border spinner-border-sm loadingIndikdator" role="status" aria-hidden="true"></span>
                    Save
                  </button>
                  </div>
              </form>
            </div>
            <!-- /.box -->
          </div>
          <!-- col-md-12 -->
        </div>
      </div>

      <!-- /.row -->
    </div>

  </section>

  <!-- /.content -->
</div>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<script type="text/javascript">
 $('.finance').hide();

const checkbox = document.getElementById('checked')
checkbox.addEventListener('change', (event) => {
  if (event.currentTarget.checked) {
    account_beban=true;
   
    $('.finance').show();
  } else {
    $('.finance').hide();
    $('.js-example-basic-multiple').val(null).trigger('change');
    account_beban=false;
   
  }
})

$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
      
    
    });
});


  function showIndikator() {
    $('.btnSave').attr('disabled', 'disabled');
    $('.loadingIndikdator').show();
  }

  function hiddenIndikator() {
    $('.btnSave').removeAttr('disabled');
    $('.loadingIndikdator').hide();

  }

  $(document).ready(function() {
    hiddenIndikator();

  });

  $("#groups").select2();
  $("#userMainNav").addClass('active');
  $("#addUserNav").addClass('active');
  $("#openUserNav").addClass('menu-open');

  $('#SimpanData').submit(function(e) {
    e.preventDefault();
    showIndikator();
    var password = $('#password').val();
    var cpassword = $('#cpassword').val();
    var cpassword_error = document.getElementById("cpassword_error");
    if (cpassword != password) {
      cpassword_error.style.border = "1 px solid red";
      cpassword_error.textContent = "*password tidak cocok";
      hiddenIndikator();
    } else {
      cpassword_error.style.border = "1 px solid red";
      cpassword_error.textContent = "";
      $("#SimpanData").submit();

    }
  });
</script>