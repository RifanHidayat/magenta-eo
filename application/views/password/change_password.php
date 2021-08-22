 
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
         <h3 class="box-title"><b>Changes Password</b></h3>

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
           
            <form role="form" action="<?php base_url('Password/change_password'); ?>" method="post" name="formid">
              <div class="box-body">

        
            
                <div class="form-group">
                  <label for="name">New Password</label>
                  <input  style="width: 45%" type="password" class="form-control" id="password" name="password" required="" autocomplete="off" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" >
                
                </div>
               

                
                  <div class="form-group">
                  <label for="npwp">Confirm Password</label>
                  <input style="width: 45%" type="password" class="form-control"  required="" id="cpassword" name="npwp" autocomplete="off"  type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');"  >
                  
                </div>

                </div>
                
                
                


       
                 <br>

                  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              
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
  <script>


   $("#passwordMainNav").addClass('active');


    </script>