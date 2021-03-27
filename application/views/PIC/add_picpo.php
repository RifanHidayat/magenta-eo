
    
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
      <div class="container-fluid">
     
        <!-- ./row -->
       
        <!-- ./row -->
     
        <div class="row">
          <div class="col-md-12 col-xs-12">
              <div id="notif"></div>
            <div class="card card-primary card-tabs">

              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><b><h4>PIC PO</h4></b></a>
                  </li>
                
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false"><b><h4>PIC Event</h4></b></a>
                  </li>
                
                </ul>
              </div>

              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <div class="box">


<!-- ------------------------------------------------------------------------------------------------------------------------
                                                          PIC PO
----------------------------------------------------------------------------------------------------------------------- -->

           
         

              <form  action="<?php echo base_url('PicPO/aksi_add_pic') ?>" method="post" id="SimpanDa" name="formidevent" class="form-horizontal" enctype="multipart/form-data">
              <div class="box-body">

        
            
                <div class="form-group">
                  <label for="username">PiC Name</label>
                  <input type="text" class="form-control" id="username" required="" name="username"  autocomplete="off" value="<?php echo set_value('username')?>">
                </div>
                 <?= form_error('username','<small class="text-danger pl-3">','</small>')?>

                  <div class="form-group">
                  <label for="jabatan">Jabatan PiC PO</label>
                  <input type="text" class="form-control" id="jabatan" required="" name="jabatan" autocomplete="off" value="<?php echo set_value('jabatanEvent')?>" >
                </div>
                 <?= form_error('jabatan','<small class="text-danger pl-3">','</small>')?>


                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" required="" class="form-control" id="email"  name="email"  autocomplete="off" value="<?php echo set_value('email')?>">
                  <?= form_error('email','<small class="text-danger pl-3">','</small>')?>
                </div>
                 

                   <div class="form-group">
                  <label for="email">Customer Name</label>
                     <select class="form-control customerEvent" required="" id="customer" name="customer" style="width:99%;"  value="<?php echo set_value('pic')?>">
                    <option value="">Select Customer</option>
                    <?php foreach ($customer as $k): ?>
                      <option value="<?php echo $k->id ?>"><?php echo $k->name ?></option>
                    <?php endforeach ?>
                  </select>
                  <?= form_error('customer','<small class="text-danger pl-3">','</small>')?>

                </div>
                

              </div>
              <br>
              <br>
              <!-- /.box-body -->


             
                 <button type="submit" class="btn btn-primary" name="tombol" value="po">Save</button>
                <a href="<?php echo base_url('PicPO/manage_pic') ?>" class="btn btn-secondary"><font color="white">Back</font></a>
            



            </form>
          </div>

                  
</div>



<!-- ------------------------------------------------------------------------------------------------------------------------
                                                          PIC Eent
----------------------------------------------------------------------------------------------------------------------- -->
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="rcustom-tabs-one-messages-tab">
              
             <form  action="<?php echo base_url('PicPO/aksi_add_pic_event') ?>" method="post" id="SimpanDa" name="formidevent" class="form-horizontal" enctype="multipart/form-data">
              <div class="box-body">

        
            
                <div class="form-group">
                  <label for="username">PiC Name</label>
                  <input type="text" class="form-control" id="username" name="usernameEvent" name="username" autocomplete="off" value="<?php echo set_value('usernameEvent')?>">
                </div>
                 <?= form_error('usernameEvent','<small class="text-danger pl-3">','</small>')?>

                  <div class="form-group">
                  <label for="jabatanEvent">Jabatan PiC Event</label>
                  <input type="text" class="form-control" id="jabatan" name="jabatanEvent"  autocomplete="off" value="<?php echo set_value('jabatan')?>">
                </div>
                 <?= form_error('jabatanEvent','<small class="text-danger pl-3">','</small>')?>


                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="emailEvent" class="form-control" id="email" name="emailEvent" autocomplete="off" value="<?php echo set_value('email')?>">
                  <?= form_error('emailEvent','<small class="text-danger pl-3">','</small>')?>
                </div>
                 

                   <div class="form-group">
                  <label for="email">Customer Name</label>
                     <select class="form-control customerEvent" id="customerEvent" name="customerEvent" style="width:99%;"  value="<?php echo set_value('pic')?>">
                    <option value="">Select Customer</option>
                    <?php foreach ($customer as $k): ?>
                      <option value="<?php echo $k->id ?>"><?php echo $k->name ?></option>
                    <?php endforeach ?>
                  </select>
                  <?= form_error('customerEvent','<small class="text-danger pl-3">','</small>')?>

                </div>
                

              </div>
              <br>
              <br>
              <!-- /.box-body -->


     
                 <button type="submit" class="btn btn-primary" name="tombol" value="event">Save</button>
                <a href="<?php echo base_url('PicPO/manage_pic') ?>" class="btn btn-secondary"><font color="white">Back</font></a>
            


            </form>
                  </div>
               
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </div>
     
        </div>
       
       
        <!-- /.row -->
  </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


              

  <script type="text/javascript">
    $('#customer').select2();
     $('#customerEvent').select2();
        $("#PICMainNav").addClass('active');
  $("#addPICNav").addClass('active');
   $("#openPICNav").addClass('menu-open');
  </script>
 
 <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js')?>"></script>


 

