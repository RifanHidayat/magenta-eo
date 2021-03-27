
    
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
        <h3 class="box-title">Add Item Value</h3>

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
      
            <form role="form" action="<?php base_url('Values/add_value_item'.$id); ?>" method="post">
              <div class="box-body">

        
            
                <div class="form-group">
                  <label for="value">Item Value</label>
                  <input type="text" class="form-control" id="value" name="value" placeholder="Item Value" autocomplete="off" value="<?php echo set_value('value')?>">
                </div>
                 <?= form_error('value','<small class="text-danger pl-3">','</small>')?>

              
          

              </div>
              <br>
              <br>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?php echo base_url('Values/manage_item_value/'.$id) ?>" class="btn btn-warning">Back</a>
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
 

