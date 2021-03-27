
    
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
      
            <h3 class="box-title">Add User</h3>

          <div class="card-tools">
     
        </div>

          
        </div>
         <div class="card-body">
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
          
            <form role="form" action="<?php base_url('Users/add_user') ?>" method="post">
              <div class="box-body">

             

                <div class="form-group">
                  <label for="groups">Group</label>
                  <select class="form-group" id="groups" name="groups" style="width:99%;">
                      <!-- <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker" style="width:99%;" > -->


                    <option value="">Select Groups</option>
                    <?php foreach ($groups as $k): ?>
                      <option value="<?php echo $k->group_name ?>"><?php echo $k->group_name ?></option>
                    <?php endforeach ?>
                  </select> 
                    <?= form_error('groups','<small class="text-danger pl-3">','</small>')?>

                </div>
              
                
            

                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" value="<?php echo set_value('username')?>">
                        <?= form_error('username','<small class="text-danger pl-3">','</small>')?>
                </div>
           

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" value="<?php echo set_value('email')?>">
                        <?= form_error('email','<small class="text-danger pl-3">','</small>')?>
                </div>
           

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off
                  ">
                   <?= form_error('password','<small class="text-danger pl-3">','</small>')?>



                </div>
                
                <div class="form-group">
                  <label for="cpassword">Confirm password</label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">

                </div>
                

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

           
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?php echo base_url('Users/manage_users') ?>" class="btn btn-warning">Back</a>
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


<script type="text/javascript">
  
  $("#groups").select2();
</script>
 

