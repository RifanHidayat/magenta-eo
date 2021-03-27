
    
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
       <h3 class="box-title">Add PIC PO</h3>

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

          
            <form role="form" action="<?php base_url('PicPO/aksi_add_pic_event'); ?>" method="post">
              <div class="box-body">

        
            
                <div class="form-group">
                  <label for="username">PiC Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" value="<?php echo set_value('username')?>">
                </div>
                 <?= form_error('username','<small class="text-danger pl-3">','</small>')?>

                  <div class="form-group">
                  <label for="jabatan">Jabatan PiC PO</label>
                  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" autocomplete="off" value="<?php echo set_value('jabatan')?>">
                </div>
                 <?= form_error('jabatan','<small class="text-danger pl-3">','</small>')?>


                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" value="<?php echo set_value('email')?>">
                  <?= form_error('email','<small class="text-danger pl-3">','</small>')?>
                </div>
                 

                   <div class="form-group">
                  <label for="email">Customr Name</label>
                     <select class="form-control customer" id="customer" name="customer" style="width:99%;"  value="<?php echo set_value('pic')?>">
                    <option value="">Select Customer</option>
                    <?php foreach ($customer as $k): ?>
                      <option value="<?php echo $k->name ?>"><?php echo $k->name ?></option>
                    <?php endforeach ?>
                  </select>
                  <?= form_error('customer','<small class="text-danger pl-3">','</small>')?>

                </div>
                

              </div>
              <br>
              <br>
              <!-- /.box-body -->


               <div class="card-footer">
                 <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?php echo base_url('PicPO/manage_pic') ?>" class="btn btn-warning">Back</a>
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
    $('#customer').select2();
  </script>
 

