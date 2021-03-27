
    
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
          
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-md-12 col-xs-12">

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
              <h3 class="box-title">Profile Perusahaan</h3>
              <hr>
            </div>
            <br>
            <br>
            <br>
            <!-- /.box-header -->

         <!--    kontent -->
          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
   
  $("#ProfileMainNav").addClass('active');

 


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer>
</script>
  
 

