
    
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
                  <?php if(in_array('createQuatations', $user_permission)): ?>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><b><h4>Quotation Event</h4></b></a>
                  </li>
                  <?php endif; ?>
                 <?php if(in_array('createQuatationsother', $user_permission)): ?>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false"><b><h4>Quotation Other</h4></b></a>
                  </li>
                  <?php endif; ?>
                
                </ul>
              </div>
                
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <?php if(in_array('createQuatations', $user_permission)): ?>
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <div class="box">


<!-- ------------------------------------------------------------------------------------------------------------------------
                                                          Event
----------------------------------------------------------------------------------------------------------------------- -->

             <form  action="<?php echo base_url('Quotation/aksi_add_quotation') ?>" method="post" id="SimpanDa" name="formidevent" class="form-horizontal" enctype="multipart/form-data">
            



  <br><br>
      <div class="col-md-10 col-xs-10 pull pull-right" >

        
           

                  <div class="form-group" id="kanan">
                  <label for="Quatations_number"style="text-align:left;" class="col-sm-6 control-label" id="Comissionable_cost">Comissionable Cost</label>
                   <div class="col-sm-12">
                  <input type="text" class="form-control" readonly="" id="Comissionable_cost" name="Comissionable_cost" readonly=""  autocomplete="off" value="0">

                   <input type="text" class="form-control" readonly="" id="Comissionable_costhidden" name="Comissionable_costhidden" readonly=""  autocomplete="off" value="0" hidden="" >
                </div>
                </div>
                   <div class="form-group" id="kanan">
                  <label for="Quatations_number"style="text-align:left;" class="col-sm-6 control-label" id="Comissionable_cost">Non-Fee Cost</label>
                   <div class="col-sm-12">
                  <input type="text" class="form-control" readonly="" id="non_fee" name="non_fee" readonly=""  autocomplete="off" value="0">

                   <input type="text" class="form-control" readonly="" id="non_feehidden" name="non_feehidden" readonly=""  autocomplete="off" value="0" hidden="">
                </div>
                </div>
                  <div class="form-group" id="kanan">
                  <label id="asflabel" for="Quatations_number"  style="text-align:left;" class="col-sm-2 control-label" id>ASF</label>
                    <div class="col-sm-4" id="kananasf">
                  <input type="text"  class=" col-sm-7 form-control" placeholder="0" required="" name="asf_percen"   id="asf_percen" oninput="hitungasf();"  name="asf_percen" autocomplete="off"  >
                   <label for="Quatations_number" style="text-align:left;" class="col-sm-1 control-label" >%</label>
                  
                </div>
              
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="col-sm-12 form-control" id="asf" name="asf" autocomplete="off" readonly="" value="0">

                   <input type="text" readonly="" class="form-control" id="asf_hidden" name="asf_hidden" autocomplete="off" readonly="" value="0" hidden="">
                </div>

                </div>
                   <div class="form-group" id="kanan">
                  <label for="total_summary"style="text-align:left;" class="col-sm-6 control-label">Total Summary</label>
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="form-control" id="total_summary"  readonly="" name="total_summary" autocomplete="off" value="0">

                   <input type="text" readonly="" class="form-control" id="total_summaryhidden"  readonly="" name="total_summaryhidden" autocomplete="off" value="0" hidden="">
                </div>
              
                </div>

                     <div class="form-group" id="kanan" >
                  <label for="ppn" style="text-align:left;" class="col-sm-6 control-label">PPh</label>
                   <div class="col-sm-6">
                  <input type="text"     readonly="" class="form-control" id="pph" name="pph" readonly=""  autocomplete="off" value="0">
                  <input type="text"    readonly="" class="form-control" id="pph_hidden" name="pph_hidden" readonly=""  autocomplete="off" value="0" hidden="">
                </div>
              
                </div>

                   <div class="form-group" id="kanan">
                  <label for="pph"style="text-align:left;" class="col-sm-6 control-label" >PPN</label>
                   <div class="col-sm-6">
                  <input type="text" class="form-control" id="ppn" name="ppn" readonly=""  autocomplete="off" value="0">
                   <input style="margin-left: 100px;" type="Number" class="form-control" id="ppn_hidden" name="ppn_hidden" readonly=""  autocomplete="off" value="0" hidden="">
                </div>
              
                </div>
                  <div class="form-group" id="kanan">
                  <label for="pph"style="text-align:left;" class="col-sm-6 control-label" >Image Eo</label>
                   <div class="col-sm-12">
              
                 <input id="imagenes" name="imagenes" type="file" required="">
                </div>
              
                </div>
            
                  <?php   
                  $directory = "assets/image_/";      
                  $images = glob($directory . "*.*");
                    ?>

     

              
              
        </div>

            <div class="col-md-6 col-xs-12 pull pull-left" >


    
                <div class="form-group" id="qnumber">
                  <label for="Quatations_number"style="text-align:left;" class="col-sm-7 control-label">Quotation Number</label>
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="form-control" id="Quatations_number_event" name="Quatations_number_event" autocomplete="off" value="<?php echo set_value('Quatations_number_event')?>" >
                </div>
                </div>
                  <div class="form-group" id="qnumber">
                  <label for="Date_quotation" style="text-align:left;" class="col-sm-7 control-label">Date Quotation</label>
                  <div class="col-sm-12">
                  <input onchange="expired()" oninput="expired()"   placeholder="yyyy-mm-dd"  type="text" required="" class="form-control" id="date_quotation_event" name="date_quotation_event"  autocomplete="off" value="<?php echo set_value('Date_quotation')?>" >
                </div>
                
                   </div>
                    <?= form_error('date_quotation','<small class="text-danger pl-3">','</small>')?>
                  <div class="form-group" id="qnumber">
                  <label for="date_expired_event" style="text-align:left;"  class="col-sm-7 control-label" >Date Expired</label>
                  <div class="col-sm-12">
                  <input placeholder="yyyy-mm-dd"  type="text" class="form-control" required="" id="date_expired_event" name="date_expired_event" autocomplete="off" value="<?php echo set_value('date_expired_event')?>" >
                </div>
                     <?= form_error('date_expired','<small class="text-danger pl-3">','</small>')?>
                   </div>

              


                                   <div class="form-group" id="qnumber" hidden="">

                     <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">ppn </label>
                     <div class="col-sm-12">
                  <input type="email" readonly class="form-control" id="kppn" name="kppn"  autocomplete="off" value="<?php echo set_value('emailEvent')?>">
                </div>
               
                    
                  </div>

                                    <div class="form-group" id="qnumber" hidden="">

                     <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">pph </label>
                     <div class="col-sm-12">
                  <input type="email" readonly class="form-control" id="kpph" name="kpph"  autocomplete="off" value="<?php echo set_value('emailEvent')?>">
                </div>
               
                    
                  </div>
                   <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-7 control-label">PIC Event</label>
                    <div class="col-sm-12">
                    <select class="form-control" required="" id="picEvent" name="picEvent" style="width:99%;" onchange="DataPIC()"> value="<?php echo set_value('picEvent')?>">
                    <option value="">Select PiC Event</option>
                    <?php foreach ($pic_event as $k): ?>
                      <option value="<?php echo $k->id_event ?>"><?php echo $k->pic_name." | ".$k->customer; ?></option>
                    <?php endforeach ?>
                  </select>
                  </div>
                    
                   </div>
                <div class="form-group" id="qnumber">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-7 control-label">Customer PIC Event</label>
                   <div class="col-sm-12">
                     <input type="text" readonly class="form-control" id="customerEvent" name="customerEvent" autocomplete="off" value="<?php echo set_value('customerEvent')?>">
                
                </div>
               <?= form_error('customeEvent','<small class="text-danger pl-3">','</small>')?>
                   </div>
                      <div class="form-group" id="qnumber" hidden="">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-7 control-label">Customer PIC Event</label>
                   <div class="col-sm-12">
                     <input type="text" readonly class="form-control" id="id_customer" name="id_customer" autocomplete="off" value="<?php echo set_value('id_customer')?>">
                
                </div>
               <?= form_error('id_customer','<small class="text-danger pl-3">','</small>')?>
                   </div>
                      <div class="form-group" id="qnumber" hidden="">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-7 control-label">PIC Event</label>
                   <div class="col-sm-12">
                     <input type="email" readonly class="form-control" id="picEvent1" name="picEvent1" autocomplete="off" value="<?php echo set_value('picEvent1')?>">
                
                </div>
               <?= form_error('customer_event','<small class="text-danger pl-3">','</small>')?>
                   </div>
                        
                             <div class="form-group" id="qnumber">

                     <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">Email PIC Event </label>
                     <div class="col-sm-12">
                  <input type="email" readonly class="form-control" id="emailEvent" name="emailEvent"  autocomplete="off" value="<?php echo set_value('emailEvent')?>">
                </div>
               
                    
                  </div>

                    <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-7 control-label">PIC PO</label>
                    <div class="col-sm-12">
                    <select class="form-control" required="" id="pic_event" name="pic_event" style="width:99%;" onchange="DataPICEvent()" value="<?php echo set_value('pic')?>">
                    <option value="">Select PiC PO</option>
                    <?php foreach ($pic as $k): ?>
                      <option value="<?php echo $k->id ?>"><?php echo $k->pic_name." | ".$k->customer; ?></option>
                    <?php endforeach ?>
                  </select>
                  </div>
                    
                   </div>
                <div class="form-group" id="qnumber">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-7 control-label">Customer PIC PO</label>
                   <div class="col-sm-12">
                     <input type="email" readonly class="form-control" id="customer_event" name="customer_event" autocomplete="off" value="<?php echo set_value('customer_event')?>">
                
                </div>
               <?= form_error('customer_event','<small class="text-danger pl-3">','</small>')?>
                   </div>
                      <div class="form-group" id="qnumber" hidden="">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-7 control-label">PIC Name</label>
                   <div class="col-sm-12">
                     <input type="email" readonly class="form-control" id="pic_event1" name="pic_event1" autocomplete="off" value="<?php echo set_value('pic_event1')?>">
                
                </div>
               <?= form_error('customer_event','<small class="text-danger pl-3">','</small>')?>
                   </div>
                        
                             <div class="form-group" id="qnumber">

                     <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">Email PIC PO </label>
                     <div class="col-sm-12">
                  <input type="email" readonly class="form-control" id="email_event" name="email_event"  autocomplete="off" value="<?php echo set_value('email_event')?>">
                </div>
               
                    
                  </div>
                   <?= form_error('email_event','<small class="text-danger pl-3">','</small>')?>

             
 
                <div class="form-group"id="qnumber">
                  <label for="title_event" style="text-align:left;" class="col-sm-7 control-label">Title Event</label>
                  <div class="col-sm-12">
                  <input type="text" required="" class="form-control" id="title_event" name="title_event" autocomplete="off" value="<?php echo set_value('title_event')?>">
                </div>
                </div>
                     <?= form_error('title_event','<small class="text-danger pl-10">','</small>')?>

                           <div class="form-group" id="qnumber">
                  <label for="venue_event" style="text-align:left;" class="col-sm-7 control-label">Venue Event</label>
                  <div class="col-sm-12">
                  <input  type="text" required="" class="form-control venue_event" id="venue_event" name="venue_event" autocomplete="off" value="<?php echo set_value('vanue_event')?>">
                </div>
                     
                   </div>
                   <?= form_error('venue_event','<small class="text-danger pl-3">','</small>')?>

                           <div class="form-group" id="qnumber">
                  <label for="Date_event"  style="text-align:left;" class="col-sm-7 control-label">Date event</label>
                  <div class="col-sm-12">
                  <input type="text" required="" class="form-control" id="date_event" name="date_event"  autocomplete="off" value="<?php echo set_value('date_event')?>">
                </div>
                
                    
                   </div>
                    <?= form_error('date_event','<small class="text-danger pl-3">','</small>')?>

                    
                   <br>
                   <br>
                  <br>
            
              
                </div>
                
               <div class="box box-warning">

                 <input  style="width: 20%" onclick="function_deposit();" type="button" class="btn btn-info btn-color-custom" value="Deposit" id="btndeposit">
                    <br><br>

                     <div class="col-md-6 col-xs-10 pull pull-left" id="classdeposit" >
                       <input  style="width: 10%" onclick="hapus_deposit();;" type="button" class="fa fa-times btn btn-sm bg-gradient-secondary"  value="X" id="hapusDeposit">
                       <br>

                <div class="form-group" id="qnumber">
                  <label for="Quatations_number"style="text-align:left;" class="col-sm-7 control-label">Deposit Number</label>
                   <div class="col-sm-12">
                  <input readonly=""  type="text" class="form-control" id="deposit_number_event" name="deposit_number"  autocomplete="off" value="<?php echo set_value('deposit_number_event')?>">
                </div>


                </div>

                
                   <div class="form-group" id="qnumber">

                   <label for="groups"id="qnumber" style="text-align:left;"  class="col-sm-7 control-label">Total Cash in</label>
                   <div class="col-sm-12">
                   <input readonly="" type="text" cols="30" class="form-control" id="total_cashin_event"autocomplete="off" value="<?php echo set_value('total_cashin_event')?>">
                </div>
                     <?= form_error('total_cashin_event','<small class="text-danger pl-3">','</small>')?>
                   </div>

                   

                </div>

                  <br>
                  <br>
                    <br>
                   <br>
                  <br>
                  <br>
                <hr>
                   <h3>Non-Fee Cost</h3>
                  <?php  foreach ($item_non as $k): ?>
                  <br>
                   <input style="width: 20%" type="button" class="btn btn-info btn-color-custom" value="<?php echo $k->name?>" id="btn<?php echo (str_replace(' ', '', $k->name)) ?>">
                   <br>
                   

                   <table class="table" border="0" id="table<?php echo (str_replace(' ', '', $k->name))?>">
                                           <thead>
                                          <tr>
                                             
                                                      <th style="width: 30%;"><a style="width: 5" class="btn btn-sm bg-gradient-secondary" data-toggle="tooltip" title="Hapus Baris" id="hapusall<?php echo (str_replace(' ', '', $k->name)) ?>"><font color="white"> <i class="fa fa-times"><font color="white"></i></font></a></th>
                                             <th style="width: 5%;">Quantity</th>
                                                <th style="width: 5%;">Frequency</th>
                                               <th style="width: 20%;">Rate</th>
                                                <th style="width: 20%;">Sub Total</th>
                                        
                                              <th style="width: 2%" ><button  style="width: 5" class="btn btn-sm bg-gradient-secondary" id="tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><i class="fa fa-plus"></i> </button></th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>

                                            <tfoot>
                                        <tr>
                                            <td></td>
                                          <td></td>
                                             <td></td>
                                         
                                          
                                          
                                             <th style="text-align:left;">Grand Total</th><th colspan="1" >

                                                <input id="grandtotalnon<?php echo (str_replace(' ', '', $k->name)) ?>" readonly="" style="width:100%" type="text" class="form-control" required=""> <input id="grandtotalnonhidden<?php echo (str_replace(' ', '', $k->name)) ?>"  readonly="" style="width:100%" type="text" class="form-control" required="" hidden=""></th>
                                               </tr>
                                        </tfoot>
                                    </table>
                    <?php endforeach ?>
                    <br>
                      <hr>
              
                <h3>Comissionable cost</h3>
                <?php  foreach ($item as $k): ?>
                  <br>
                   <input style="width: 20%" type="button" class="btn btn-info btn-color-custom" value="<?php echo $k->name?>" id="btn<?php echo (str_replace(' ', '', $k->name)) ?>">
                   <br>
                   

                   <table class="table" border="0" id="table<?php echo (str_replace(' ', '', $k->name))?>">
                                           <thead>
                                          <tr>
                                             
                                                      <th style="width: 30%;"><a style="width: 5" class="btn btn-sm bg-gradient-secondary" data-toggle="tooltip" title="Hapus Baris" id="hapusall<?php echo (str_replace(' ', '', $k->name)) ?>"><font color="white"> <i class="fa fa-times"><font color="white"></i></font></a></th>
                                             <th style="width: 5%">Quantity</th>
                                                <th style="width: 5%">Frequency</th>
                                               <th style="width: 20%;">Rate</th>
                                                <th style="width: 20%;">Sub Total</th>
                                        
                                              <th style="width: 2%" ><button  style="width: 5" class="btn btn-sm bg-gradient-secondary" id="tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><i class="fa fa-plus"></i> </button></th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>

                                            <tfoot>
                                        <tr>
                                            <td></td>
                                          <td></td>
                                             <td></td>
                                         
                                          
                                          
                                             <th style="text-align:left; width: 15%;">Grand Total</th><th colspan="1" >

                                                <input id="grandtotalcos<?php echo(str_replace(' ', '', $k->name)); ?>" readonly="" style="width:100%" type="text" class="form-control" required=""> <input hidden="" id="grandtotalcoshidden<?php  echo (str_replace(' ', '', $k->name)) ?>"  readonly="" style="width:100%" type="text" class="form-control" required=""  ></th>
                                               </tr>
                                        </tfoot>
                                    </table>
                    <?php endforeach ?>
                    <br>
                      <hr>
              
                            <div class="form-group text-left">
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                                      <a href="<?php echo base_url('Quotation/manage_quotation') ?>" class="btn btn-warning"><font color="white"> Back</font></a>

                                  </div>
                      
                 


               </div>
                   
                   

        
              

            </form>
          </div>

                  
</div>
<?php endif; ?>



<!-- ------------------------------------------------------------------------------------------------------------------------
                                                          Other
----------------------------------------------------------------------------------------------------------------------- -->
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="rcustom-tabs-one-messages-tab">
                    <form action="<?php echo base_url('Quotation/aksi_add_quotation_other') ?>" method="post" id="SimpanDa" name="formid" class="form-horizontal" enctype="multipart/form-data">
             
                      

                 <!--   other -->
                   <div class="col-md-10 col-xs-10 pull pull-right" >
            
          
                  <div class="form-group" id="kanan">
                  <label for="Quatations_number"style="text-align:left;" class="col-sm-6 control-label">Note</label>
                   <div class="col-sm-12">
                  <input type="text" class="form-control" id="note_desciption" name="note_desciption" autocomplete="off" value="<?php echo set_value('Quatations_number')?>">
                </div>
                </div>
                    <div class="form-group" id="kanan">
                  <label for="ppn"style="text-align:left;" class="col-sm-6 control-label" >PPN</label>
                   <div class="col-sm-6">
                  <input type="text" readonly="" class="form-control" readonly="" id="ppn_description" name="ppn_description"  autocomplete="off" value="0" >

                   <input type="text" readonly="" class="form-control" readonly="" id="ppn_description_hidden" name="ppn_description_hidden"  autocomplete="off" value="0" hidden="" >
                </div>
              
                </div>
                   <div class="form-group" id="kanan">
                  <label for="pph_description"style="text-align:left;"  class="col-sm-6 control-label">PPh 23</label>
                   <div class="col-sm-6">
                  <input  type="text" class="form-control" id="pph_description" readonly="" name="pph_description" autocomplete="off" value="0">

                   <input  type="text" class="form-control" id="pph_description_hidden" readonly="" name="pph_descriptionhidden" autocomplete="off" value="0" hidden="">
                </div>
              
                </div>
                                  <div class="form-group" id="kanan">
                  <label for="pph"style="text-align:left;" class="col-sm-6 control-label" >Image Eo</label>
                   <div class="col-sm-12">
                 <input id="imagenesother" name="imagenesother" type="file" required="">

                </div>
              
                </div>
  <?php   
  $directory = "assets/imageother/";      
  $images = glob($directory . "*.*");
  ?>
        </div>
            <div class="col-md-6 col-xs-12 pull pull-left" >
        
                <div class="form-group" id="qnumber">
                  <label for="Quatations_number_other"style="text-align:left;" class="col-sm-6 control-label">Quotation Number</label>
                   <div class="col-sm-12">
                  <input readonly="" type="text" class="form-control" id="Quatations_number_other" name="Quatations_number_other"  autocomplete="off" value="<?php echo set_value('Quatations_number_other')?>">
                </div>
              
                </div>


      
                  <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;"  class="col-sm-6 control-label" >Date Quotation</label>
                  <div class="col-sm-12">
                  <input type="text" placeholder="yyyy-mm-dd" oninput="expiredOther()" onchange="expiredOther()" class="form-control" required="" id="date_quotation" name="date_quotation" autocomplete="off" value="<?php echo set_value('Date_event')?>" >
                </div>
                     <?= form_error('Date_event','<small class="text-danger pl-3">','</small>')?>
                   </div>
                    <div class="form-group" id="qnumber">
                  <label for="Date_event" style="text-align:left;"  class="col-sm-6 control-label" >Date Expired</label>
                  <div class="col-sm-12">
                  <input type="text" placeholder="yyyy-mm-dd" class="form-control" required="" id="date_expired_other" name="date_expired_other" autocomplete="off" value="<?php echo set_value('date_expired_other')?>" >
                </div>
                     <?= form_error('Date_event','<small class="text-danger pl-3">','</small>')?>
                   </div>


                   
                    
                    <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-6 control-label">PIC Event</label>
                    <div class="col-sm-12">
                    <select class="form-control" required="" id="pic" name="pic" style="width:99%;" onchange="DataPICEventOther()" value="<?php echo set_value('pic')?>">
                    <option value="">Select PiC Event</option>
                    <?php foreach ($pic_event as $k): ?>
                      <option value="<?php echo $k->id_event ?>"><?php echo $k->pic_name." | ".$k->customer; ?></option>
                    <?php endforeach ?>
                  </select>
                  </div>
                    
                   </div>
                <div class="form-group" id="qnumber">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-6 control-label">Customer PIC Event</label>
                   <div class="col-sm-12">
                     <input type="email" readonly class="form-control" id="customerEventOther" name="customerEventOther" autocomplete="off" value="<?php echo set_value('customerEventOther')?>">
                
                </div>
               <?= form_error('customeEventOther','<small class="text-danger pl-3">','</small>')?>
                   </div>

                      <div class="form-group" id="qnumber" hidden="">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-6 control-label">Customer PIC Event</label>
                   <div class="col-sm-12">
                     <input type="email" readonly class="form-control" id="id_customerother" name="id_customerother" autocomplete="off" value="<?php echo set_value('id_customerother')?>">
                
                </div>
               <?= form_error('id_customerother','<small class="text-danger pl-3">','</small>')?>
                   </div>
                      <div class="form-group" id="qnumber" hidden="">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-6 control-label">PIC Event</label>
                   <div class="col-sm-12">
                     <input type="email" readonly class="form-control" id="picEventOther1" name="picEventOther1" autocomplete="off" value="<?php echo set_value('picEventOther1')?>">
                
                </div>
               <?= form_error('customer_event','<small class="text-danger pl-3">','</small>')?>
                   </div>
                        
                             <div class="form-group" id="qnumber">

                     <label for="email_event" style="text-align:left;" class="col-sm-6 control-label">Email PIC Event </label>
                     <div class="col-sm-12">
                  <input type="email" readonly class="form-control" id="emailEventOther" name="emailEventOther"  autocomplete="off" value="<?php echo set_value('emailEventOther')?>">
                </div>
               
                    
                  </div>

                    <div class="form-group" id="qnumber">

                     <label for="pid_other"  style="text-align:left;" class="col-sm-6 control-label">PIC PO</label>
                    <div class="col-sm-12">
                    <select  class="form-control" required="" id="pic_other" name="pic_other" style="width:99%;" onchange="DataPICOther()" value="<?php echo set_value('pic_other')?>">
                    <option value="">Select PiC PO</option>
                    <?php foreach ($pic as $k): ?>
                      <option value="<?php echo $k->id?>"><?php echo $k->pic_name." | ".$k->customer; ?></option>
                    <?php endforeach ?>
                  </select>
                  </div>
                    
                   </div>

                                 <div class="form-group" id="qnumber" hidden="">

                     <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">ppn </label>
                     <div class="col-sm-12">
                  <input type="email" readonly class="form-control" id="kppnother" name="kppnother"  autocomplete="off" value="<?php echo set_value('emailEvent')?>">
                </div>
               
                    
                  </div>

                                    <div class="form-group" id="qnumber" hidden="">

                     <label for="email_event" style="text-align:left;" class="col-sm-7 control-label">pph </label>
                     <div class="col-sm-12">
                  <input type="email" readonly class="form-control" id="kpphother" name="kpphother"  autocomplete="off" value="<?php echo set_value('emailEvent')?>">
                </div>
               
                    
                  </div>





                  <div class="form-group" id="qnumber">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-6 control-label">Customer</label>
                   <div class="col-sm-12">
                     <input type="email" readonly class="form-control" id="customerOther" name="customerOther" autocomplete="off" value="<?php echo set_value('customerOther')?>">
                
                </div>
               <?= form_error('customer_other','<small class="text-danger pl-3">','</small>')?>
                   </div>
                           <div class="form-group" id="qnumber" hidden="">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-6 control-label">PIC Name</label>
                   <div class="col-sm-12">
                     <input type="text" readonly class="form-control" id="picOther1" name="picOther1" autocomplete="off" value="<?php echo set_value('picOther1')?>">
                
                </div>
               <?= form_error('customer_event','<small class="text-danger pl-3">','</small>')?>
                   </div>
                        
                         

                             <div class="form-group" id="qnumber">

                     <label for="email_event" style="text-align:left;" class="col-sm-6 control-label">Email PIC PO </label>
                     <div class="col-sm-12">
                  <input type="email" readonly class="form-control" id="emailOther" name="emailOther"  autocomplete="off" value="<?php echo set_value('emaiEventOther')?>">
                </div>
               
                    
                  </div>
                   <?= form_error('email_event','<small class="text-danger pl-3">','</small>')?>



                <div class="form-group" id="qnumber">
                  <label for="Quatations_number"style="text-align:left;" class="col-sm-6 control-label">Tiitle Event</label>
                   <div class="col-sm-12">
                  <input type="text" required="" class="form-control" required="" id="title_event_otther" name="title_event_otther" autocomplete="off" value="<?php echo set_value('title_event_otther')?>">
                </div>
              
                </div>

                     <div class="form-group"id="qnumber">
                  <label for="netto" style="text-align:left;" class="col-sm-6 control-label">Netto</label>
                  <div class="col-sm-12">
                  <input type="text" class="form-control" required="" readonly="" id="netto" name="netto" autocomplete="off" value="0">
                  <input type="text" class="form-control" readonly="" id="netto_hidden" name="netto_hidden" autocomplete="off" value="0" hidden="">
                </div>
                </div>
                     <?= form_error('title_event','<small class="text-danger pl-3">','</small>')?>



                       <div class="form-group" id="qnumber">
                  <label id="asflabel" for="Quatations_number"  style="text-align:left;" class="col-sm-2 control-label" id>ASF</label>
                    <div class="col-sm-4" id="kananasf">
                  <input type="text"  class=" col-sm-7 form-control" placeholder="0"   id="asf_percen_other" oninput="hitungnetto();" name="asf_percen_other"  autocomplete="off"  >
                   <label for="Quatations_number" style="text-align:left;" class="col-sm-1 control-label" >%</label>
                  
                </div>
              
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="col-sm-12 form-control" id="asf_other" name="asf_other" autocomplete="off" readonly="" value="0">

                   <input type="text" readonly="" class="form-control" id="asf_other_hidden" name="asf_other_hidden" autocomplete="off" readonly="" value="0" hidden="">
                </div>
                
                </div>

                           <div class="form-group" id="qnumber">
                  <label for="total" style="text-align:left;" class="col-sm-6 control-label">Total</label>
                  <div class="col-sm-12">
                  <input type="text" required="" class="form-control" id="total_description" name="total_description" readonly="" autocomplete="off" value="0"> 

                   <input type="text" class="form-control" id="total_description_hidden" name="total_description_hidden" readonly="" autocomplete="off" value="0" hidden=""> 
                </div>
                
                     <?= form_error('Date_event','<small class="text-danger pl-3">','</small>')?>
                   </div>

                   

                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <hr>
                  


                
                <h3>Description</h3>


              
                 <br><input style="width: 20%" type="button" class="btn btn-info btn-color-custom" value="Description" id="description">
                <br>
                <br>
                  <table  class="table" border="0" id="tableLoopDescription">
                                      <thead>
                                          <tr>
                                           
                      
                                                 <th style="width: 1%"><a  style="width: 5" class="btn btn-sm bg-gradient-secondary" data-toggle="tooltip" title="Hapus Baris" id="hapusdeskription"><font color="white"> <i class="fa fa-times"><font color="white"></i></font></a></th>
                                              <th style="width: 50%">Description</th>
                                            
                                                <th style="width: 5%">Frequency</th>
                                              <th style="width: 20%">Unit Price</th>
                                              <th style="width: 25%"> Amount</th>
                                              <th ><button style="width: 5" class="btn btn-sm bg-gradient-secondary"  id="BarisBaruDescription"><i class="fa fa-plus"></i> </button></th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                            <tfoot>
                                        <tr>
                                        <td></td>
                                          <td></td>
                                             <td></td>
                                         
                                          
                                          
                                             <th style="text-align:left;">Grand Total</th><th colspan="2" >

                                              <input id="grandtotaldescription" readonly="" style="width:80%" type="text" class="form-control" required="" > <input id="grandtotaldescriptionhidden" readonly="" style="width:100%" type="text" class="form-control" required="" hidden="" ></th>
                                               </tr>
                 
                                        </tfoot>
                                    </table>
                                      <div class="form-group text-left">
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                                      <a href="<?php echo base_url('Quotation/manage_quotation_other') ?>" class="btn btn-warning"><font color="white"> Back</font></a>

                                  </div>

               
        
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
  $(document).ready(function(){
     expired();
       expiredOther();
   });
  $('#pic_event').select2();



   //$('#date_quotation_event').mask('0000-00-00');

  $('#picEvent').select2();
  $('#pic').select2();
  $('#pic_other').select2();
    $(".select_group").select2();
    var value=0;
    $(document).ready(function() {




      //function comminable 
     <?php  foreach ($item as $k): ?>
      //var tablehide="#table<?php echo $k->name;?>";
      $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").hide();

      //tambah baris
      $("#tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>").click(function(e) {
        e.preventDefault();
       <?php echo (str_replace(' ', '', $k->name)) ?> ();
        });                               
        <?php endforeach ?>
             //function comminable 
      <?php  foreach ($item_non as $k): ?>
      //var tablehide="#table<?php echo $k->name;?>";
      $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").hide();

      //tambah baris
      $("#tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>").click(function(e) {
        e.preventDefault();
       <?php echo (str_replace(' ', '', $k->name)) ?> ();
        });

               
      <?php endforeach ?>
       $('select[name="selectProduction"]').append('<option value="'+ "tes" +'" selected>'+ "tes" +'</option>').trigger('change');
      generet_quotation_event();
      generet_quotation_deposit();
      generet_quotation_other();
      $("#image").hide();
              
      $("#imageother").hide();
      $("#tableLoopDescription").hide();
      $("#classdeposit").hide();

          var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
    $("#imagenyes").fileinput({
        overwriteInitial: true,
        maxFileSize: 2000,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

                        
           
    });
    //-------------------------------------hapus all table--------------------------------

                  
    // -------------------------Membuat Table baru comminable cost-----------------------------------


        
        <?php  foreach ($item as $k): ?>
            $("#btn<?php echo (str_replace(' ', '', $k->name)) ?>").click(function(e) {
              $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").show();
                                          
                  <?php echo (str_replace(' ', '', $k->name)) ?> ();
                                     
                 });
                    $('#hapusall<?php echo (str_replace(' ', '', $k->name)) ?>').click(function(e) {
                   
                    $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").closest("tr").remove();
                  
                    $('#table<?php echo (str_replace(' ', '', $k->name)) ?>').hide();
                    $('#tr<?php echo (str_replace(' ', '', $k->name)) ?>').remove();
                    var datta="#table<?php echo (str_replace(' ', '', $k->name)) ?>";
                      var jml=$(''+datta+' tbody tr').length;
                      for (x=0;x<=jml;x++){
                           $('#tr<?php echo (str_replace(' ', '', $k->name)) ?>'+x).remove();
                      }

                          $("#grandtotalcos<?php echo(str_replace(' ', '', $k->name)); ?>").val("0");
                          $("#grandtotalcoshidden<?php echo(str_replace(' ', '', $k->name)); ?>").val("0");

                       Nonfee();
                      ComissionableCost();
                       // $('#grandtotalMainCore_deposit').val("0");
                       // hitungmaincoreeventdeposit();
                       
                 });

              //cek select
            function cek<?php echo (str_replace(' ', '', $k->name)) ?>(x){
             var data=$('#select<?php echo (str_replace(' ', '', $k->name)) ?>'+x).val();
            if (data==''){
            document.getElementById("Quantity<?php echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = true;
            document.getElementById("Frequency<?php echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = true;
            document.getElementById("Rate<?php echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = true;
          $("#Quantity<?php echo (str_replace(' ', '', $k->name)) ?>"+x).val("0");
           $("#Frequency<?php echo (str_replace(' ', '', $k->name)) ?>"+x).val("0");
           $("#Rate<?php echo (str_replace(' ', '', $k->name)) ?>"+x).val("0");
           // $("#Subtotal<?php echo($k->name) ?>"+x).val("0");
            //hitungmaineventevent_deposit();
      }else{
        document.getElementById("Quantity<?php echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = false;
        document.getElementById("Frequency<?php echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = false;
        document.getElementById("Rate<?php echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = false;

      }


    }

      function hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>(){
   
         var x;
         var hitung=0;
   
          $('#table<?php echo (str_replace(' ', '', $k->name)) ?> tbody tr').each(function() {
            var quantity=$(this).find('td:nth-child(2) input').val();
            var frequency=$(this).find('td:nth-child(3) input').val();
            var rate=$(this).find('td:nth-child(4) input').val();
            var rate1 = rate.replace(/[^\w\s]/gi, '');
            var subtotal=Number(quantity)*Number(frequency)*Number(rate1);
            var subtotal1 = subtotal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
         
           $(this).find('td:nth-child(5) input').val(subtotal1);
           hitung=Number(hitung)+Number(subtotal);
            });
        var hitung1 =hitung.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

  

         $("#grandtotalcos<?php echo(str_replace(' ', '', $k->name)); ?>").val(hitung1);
         $("#grandtotalcoshidden<?php echo(str_replace(' ', '', $k->name)); ?>").val(hitung);
          ComissionableCost();
       
        }


            //membaut tabel
              function <?php echo (str_replace(' ', '', $k->name)) ?> () {
                  $(document).ready(function() {
                      $("[data-toggle='tooltip']").tooltip(); 
                  });
                  var datta="#table<?php echo (str_replace(' ', '', $k->name)) ?>";
                  var idtr="<?php echo (str_replace(' ', '', $k->name)) ?>";
                  var Nomor = $(''+datta+' tbody tr').length + 1;
                  console.log(datta);
                  var Baris = '<tr id=tr<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'>';


                            Baris += '<td >  <div class="form-group"> ';
                            Baris += '<select required class="form-control select_group ItemValue" name="item_value[]" style="width:400px;" id="select<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"   onchange="cek<?php echo (str_replace(' ', '', $k->name)) ?>('+Nomor+');"> <option value="">Select <?php echo $k->name ?></option> <?php foreach ($core as $e): if ($k->name==$e->name) {?>  <option value="<?php echo $e->value ?>"><?php echo $e->value ?></option><?php }?> <?php endforeach ?> </select> ';
                          Baris += '</div></td>';


                        

                            Baris += '<td>';
                              Baris += '<input readonly class="form-control Quantity" oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>()"  type="Number" name="quantity[]" id="Quantity<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'" class="form-control Quantity" >';
                          Baris += '</td>';

                    

                          Baris += '<td>';
                              Baris += '<input readonly type="Number"   oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>()" name="frequency[]" id="Frequency<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control deposit" required=""  ready >';
                          Baris += '</td>';


                           Baris += '<td>';
                              Baris += '<input readonly onkeyup="convertToRupiah(this);" class="form-control ratee" type="text"   oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>()" name="rate[]" id="Rate<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control deposit"  required=""    > ';
                          Baris += '</td>';


                            Baris += '<td>';
                              Baris += '<input  type="text"  readonly name="subtotal[]" id="subtotal<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal"  required="" readonly >  <input  type="text"  readonly name="subtotal<?php echo (str_replace(' ', '', $k->name)) ?>[]" id="subtotalhidden<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly hidden  >';
                          Baris += '</td>';
                              Baris += '<td hidden>';
                              Baris += '<input hidden  type="text"  readonly name="name[]" id="name<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="<?php echo $k->name ?>"> ';
                          Baris += '</td>';
                              Baris += '<td hidden>';
                              Baris += '<input  type="text"  readonly name="metode[]" id="metode<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="Comissionable Cost" hidden> ';
                          Baris += '</td>';

                          Baris += '<td class="text-center">';
                              Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip"  id="hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><font color="white"><i class="fa fa-times"></font></i></a>';
                          Baris += '</td>';
                      Baris += '</tr>';

                       // onkeyup="convertToRupiah(this);"

                  $(''+datta+' tbody').append(Baris)
                 
                  $(''+datta+' tbody tr').each(function () {
                      //$(this).find('td:nth-child(1) input').focus(); 
                      $(this).find('td:nth-child(1) select').select2(); 
                  });

              }

              $(document).on('click', '#hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>', function(e) {
                


                 e.preventDefault();
        
                 var Nomor = 1;
                 $(this).parent().parent().remove();
                 hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>();
                 
                  Nonfee();
                  ComissionableCost();
                

              });
                 <?php endforeach ?>

//----------------------------membuat table non ------------------------------------------

        <?php  foreach ($item_non as $k): ?>
            $("#btn<?php echo (str_replace(' ', '', $k->name)) ?>").click(function(e) {
                    $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").show();
                   
                      
                  <?php echo (str_replace(' ', '', $k->name)) ?> ();
                  
                       
                 });

            

                    $('#hapusall<?php echo (str_replace(' ', '', $k->name)); ?>').click(function(e) {
                   $("#table<?php echo $k->name;?>").closest("tr").remove();
                   
                    $('#table<?php  echo (str_replace(' ', '', $k->name)) ?>').hide();
                      $('#tr<?php echo (str_replace(' ', '', $k->name)) ?>').remove();
                        var datta="#table<?php echo (str_replace(' ', '', $k->name)) ?>";
                      var jml=$(''+datta+' tbody tr').length;
                      for (x=0;x<=jml;x++){
                           $('#tr<?php echo (str_replace(' ', '', $k->name)) ?>'+x).remove();
                      }

                          $("#grandtotalnon<?php echo(str_replace(' ', '', $k->name)); ?>").val("0");
                          $("#grandtotalnonhidden<?php echo(str_replace(' ', '', $k->name)); ?>").val("0");
                        Nonfee();
                      ComissionableCost();
                       // $('#grandtotalMainCore_deposit').val("0");
                       // hitungmaincoreeventdeposit();

                       
                 });
            function cek<?php echo (str_replace(' ', '', $k->name)) ?>(x){
             var data=$('#selectNON<?php echo (str_replace(' ', '', $k->name)) ?>'+x).val();
          if (data==''){
         document.getElementById("QuantityNON<?php echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = true;
        document.getElementById("FrequencyNON<?php echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = true;
        document.getElementById("RateNON<?php echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = true;
          $("#QuantityNON<?php echo (str_replace(' ', '', $k->name)) ?>"+x).val("0");
           $("#FrequencyNON<?php echo (str_replace(' ', '', $k->name)) ?>"+x).val("0");
           $("#RateNON<?php echo (str_replace(' ', '', $k->name)) ?>"+x).val("0");
           // $("#Subtotal<?php echo($k->name) ?>"+x).val("0");
            //hitungmaineventevent_deposit();
      }else{
        document.getElementById("QuantityNON<?php echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = false;
        document.getElementById("FrequencyNON<?php echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = false;
        document.getElementById("RateNON<?php  echo (str_replace(' ', '', $k->name)) ?>"+x).readOnly = false;

      }


    }

    function hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name))?>(){

        var datta="#table<?php echo (str_replace(' ', '', $k->name)) ?>";
     
        var Nomor = $(''+datta+' tbody tr').length;
         var x;
         var hitung=0;
      
         $('#table<?php echo (str_replace(' ', '', $k->name)) ?> tbody tr').each(function() {
            var quantity=$(this).find('td:nth-child(2) input').val();
            var frequency=$(this).find('td:nth-child(3) input').val();
            var rate=$(this).find('td:nth-child(4) input').val();
            var rate1 = rate.replace(/[^\w\s]/gi, '');
            var subtotal=Number(quantity)*Number(frequency)*Number(rate1);
            var subtotal1 = subtotal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
         
            $(this).find('td:nth-child(5) input').val(subtotal1);
           hitung=Number(hitung)+Number(subtotal);
            });
          var hitung1 =hitung.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

  
          $("#grandtotalnon<?php echo(str_replace(' ', '', $k->name)); ?>").val(hitung1);
          $("#grandtotalnonhidden<?php echo(str_replace(' ', '', $k->name)); ?>").val(hitung);
          ComissionableCost();
        Nonfee();
       
        }



              function <?php echo (str_replace(' ', '', $k->name)) ?> () {
                  $(document).ready(function() {
                      $("[data-toggle='tooltip']").tooltip(); 
                  });
                  var datta="#table<?php echo (str_replace(' ', '', $k->name)) ?>";
                  var idtr="<?php echo $k->name;?>";
                  var Nomor = $(''+datta+' tbody tr').length + 1;
                  console.log(datta);
                  var Baris = '<tr id=tr<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'>';

                     
                             Baris += '<td >  <div class="form-group"> ';
                            Baris += '<select class="form-control" style="width:400px;" name="item_value[]" id="selectNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"   onchange="cek<?php echo (str_replace(' ', '', $k->name)) ?>('+Nomor+');"> <option value="">Select <?php echo $k->name ?></option> <?php foreach ($core as $e): if ($k->name==$e->name) {?>  <option value="<?php echo $e->value ?>"><?php echo $e->value ?></option><?php }?> <?php endforeach ?> </select> ';
                          Baris += '</div></td>';

                            Baris += '<td>';
                              Baris += '<input readonly class="form-control QuantityNON oninput="hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name))?>()"  type="Number" name="quantity[]" id="QuantityNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'" class="form-control Quantity" >';
                          Baris += '</td>';

                    

                          Baris += '<td>';
                              Baris += '<input readonly type="Number"   oninput="hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name))?>()" name="frequency[]" id="FrequencyNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control deposit" required=""  ready >';
                          Baris += '</td>';


                           Baris += '<td>';
                              Baris += '<input readonly onkeyup="convertToRupiah(this);" class="form-control ratee" type="text"   oninput="hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name))?>()" name="rate[]" id="RateNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control deposit"  required=""    > ';
                          Baris += '</td>';


                            Baris += '<td>';
                              Baris += '<input  type="text"  readonly name="subtotal[]" id="subtotalNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly >  <input  type="text"  readonly name="rate<?php echo (str_replace(' ', '', $k->name)) ?>[]" id="subtotalhiddenNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly hidden > <input hidden  type="text"  readonly name="name[]" id="name<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="<?php echo $k->name ?>">  <input  type="text"  readonly name="metode[]" id="metode<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="Non-Fee Cost" hidden > ';
                          Baris += '</td>';

                               Baris += '<td hidden>';
                              Baris += '<input  type="text"  readonly name="metode[]" id="metode<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="Non-Fee Cost"  > ';
                          Baris += '</td>';

                            Baris += '<td hidden>';
                              Baris += '<input   type="text"  readonly name="name[]" id="name<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="<?php echo $k->name ?>">';
                          Baris += '</td>';

                          Baris += '<td class="text-center">';
                              Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip"  id="hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><font color="white"><i class="fa fa-times"></font></i></a>';
                          Baris += '</td>';
                      Baris += '</tr>';

                       // onkeyup="convertToRupiah(this);"

                  $(''+datta+' tbody').append(Baris);

                  $(''+datta+' tbody tr').each(function () {
                      //$(this).find('td:nth-child(1) input').focus(); 
                      $(this).find('td:nth-child(1) select').select2(); 
                  });
                 
              }

              $(document).on('click', '#hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>', function(e) {

                 e.preventDefault();
        
                 var Nomor = 1;
                 $(this).parent().parent().remove();
                hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name))?>()
                
              });
                 <?php endforeach ?>

              


  // ----------------------------------------------btn show other----------------------   
         $('#description').click(function(e) {
                    $('#tableLoopDescription').show();
                      for(B=1; B<=1; B++){
                  BarisBaruDescription();
                 } 
                       
                 });                       

  // ----------------------------------------------btn show deposit----------------------                          

                 
                    function function_deposit(){
                      $('#classdeposit').show();
                      var Quotation=$('#Quatations_number_event').val();
                      var data=Quotation+"-D";

                      $('#Quatations_number_event').val(data);


                    }
                    function hapus_deposit(){
                         $('#deposit_number_event').val("");
                         $('#total_cashin_event').val("");
                         $('#total_cashin_event').val("");
                         $('#classdeposit').hide();

                      generet_quotation_event();


                    }





// $(document).ready(function() {
              
                 $('#BarisBaruDescription').click(function(e) {
                     e.preventDefault();
                     BarisBaruDescription();
                 });

        

              $(document).on('click', '#HapusBarisDeskription', function(e) {
                 e.preventDefault();
                 var Nomor = 1;
                 $(this).parent().parent().remove();
                 hitungDescription();
                
              });

            


                       $(document).ready(function() {
              
                 $('#BarisBaruGimmickDeposit').click(function(e) {
                     e.preventDefault();
                     BarisBaruGimmickDeposit();
                 });

              });

        

   

           
// ---------------------------------------------------------Baris Baru Description----------------------------------------  
function BarisBaruDescription() {
                  $(document).ready(function() {
                      $("[data-toggle='tooltip']").tooltip(); 
                  });
                  var Nomor = $("#tableLoopDescription tbody tr").length + 1;
                  var Baris = '<tr id=trdescription'+Nomor+'>';
                        

                         
                           Baris += '<td style="width:30%" colspan=2>';
                              Baris += '<input  type="text" name="description[]" id="description'+Nomor+'"  class="form-control"  required="" >';
                          Baris += '</td>';
                       

                            Baris += '<td>';
                              Baris += '<input  type="Number" name="FrequencyDescription[]"  oninput="hitungDescription();"  id="FrequencyDescription'+Nomor+'" class="form-control FrequencyDescription" >';
                          Baris += '</td>';

                   
                           Baris += '<td>';
                              Baris += '<input onkeyup="convertToRupiah(this);"  oninput="hitungDescription();"  type="text" name="UniPriceDescription[]" id="UniPriceDescription'+Nomor+'"  class="form-control UniPriceDescription"  required="" >';
                          Baris += '</td>';

                 

                           Baris += '<td>';
                              Baris += '<input  oninput="hitungDescription();"  type="text" name="AmmountDescription[]" id="AmountDescription'+Nomor+'"  class="form-control deposit"  required="" readonly  >  <input  oninput="hitungDescription();"  type="text" name="AmmountDescriptionhidden[]" id="AmountDescriptionhidden'+Nomor+'"  class="form-control deposit"  required="" readonly hidden  >';
                          Baris += '</td>';
                          Baris += '<td class="text-center">';
                              Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Baris" id="HapusBarisDeskription"><font color="white"><i class="fa fa-times"></font></a>';
                          Baris += '</td>';
                      Baris += '</tr>';
                       // onkeyup="convertToRupiah(this);"

                  $("#tableLoopDescription tbody").append(Baris);
                  $("#tableLoopDescription tbody tr").each(function () {
                     // $(this).find('td:nth-child(2) input').focus(); 
                  });

              }

              $(document).on('click', '#HapusBarisDeskription', function(e) {
                 e.preventDefault();
                 
                 $(this).parent().parent().remove();
                 hitungDescription();
               
              });





 function changePicture(){
            $('#upload').click();
        }
        function readURL(input)
        {
            if (input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function (e)
                {
                    $('#image')
                    .attr('src',e.target.result);

                };
                reader.readAsDataURL(input.files[0]);
                 $("#image").show();
            }
        }




         function changePictureOther(){
            $('#uploadother').click();
        }
        function readURLOther(input)
        {
            if (input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function (e)
                {
                    $('#imageother')
                    .attr('src',e.target.result);

                };
                reader.readAsDataURL(input.files[0]);
                 $("#imageother").show();
            }
        }

                      $('#hapusdeskription').click(function(e) {
                   $("tableLoopDescription").closest("tr").remove();
                  
                    $('#tableLoopDescription').hide();
                   // hitungDescription();
                      $('#trd').remove();


                     $('#tableLoopDescription tbody tr').each(function() {
                            $(this).remove();
          

                          });
                        hitungDescription();

                       
                 });


        
    //get PIC PO Event
     function DataPICEvent(){
      var d=$( "#pic_event" ).val();
      $.ajax({
          type:"post",
          url:'<?php echo base_url("Customer/AmbilDataPICQuotation/")?>',
          data:'pic_name='+d,
          dataType:'json',
      
          success:function(hasil){
             console.log(hasil[0].email);
              console.log(hasil);
              $('[name="email_event"]').val(hasil[0].email);
               $('[name="customer_event"]').val(hasil[0].customer);
               $('[name="pic_event1"]').val(hasil[0].pic_name);
               // $('[name="kpph"]').val(hasil[0].karakteristik_pph);
               // $('[name="kppn"]').val(hasil[0].karakteristik_ppn);
               // pph();
               // ppn();
              
             
              
          },
          error:function(hasil){
    
           
          }
         

      }); 
  
}
//get pic even even
 function DataPIC(){
      var d=$( "#picEvent" ).val();
      $.ajax({
          type:"post",
          url:'<?php echo base_url("Customer/AmbilDataPICQuotationEvent/")?>',
          data:'pic_name='+d,
          dataType:'json',
      
          success:function(hasil){
             console.log(hasil[0].email);
              console.log(hasil);
              $('[name="emailEvent"]').val(hasil[0].email);
               $('[name="customerEvent"]').val(hasil[0].customer);
                 $('[name="id_customer"]').val(hasil[0].id_customer);
               $('[name="picEvent1"]').val(hasil[0].pic_name);
                  $('[name="kpph"]').val(hasil[0].karakteristik_pph);
               $('[name="kppn"]').val(hasil[0].karakteristik_ppn);
               pph();
               ppn();

              
             
              
          },
          error:function(hasil){
    
           
          }
         

      }); 
  
}

//Get pic event other 
 function DataPICEventOther(){
      var d=$( "#pic" ).val();

      $.ajax({
          type:"post",
          url:'<?php echo base_url("Customer/AmbilDataPICQuotationEvent/")?>',
          data:'pic_name='+d,
          dataType:'json',
      
          success:function(hasil){
            
              console.log(hasil);
             
               $('[name="customerEventOther"]').val(hasil[0].customer);
               $('[name="picEventOther1"]').val(hasil[0].pic_name);
                $('[name="id_customerother"]').val(hasil[0].id_customer);
               $('[name="emailEventOther"]').val(hasil[0].email);
                $('[name="kpphother"]').val(hasil[0].karakteristik_pph);
                $('[name="kppnother"]').val(hasil[0].karakteristik_ppn);
                ppn_description();
                pph_description();
              
              
              
          },
          error:function(hasil){
    
           
          }
         

      }); 
  
}
//get PIC po other
     function DataPICOther(){
       var d=$( "#pic_other" ).val();
      $.ajax({
          type:"post",
          url:'<?php echo base_url("Customer/AmbilDataPICQuotation/")?>',
          data:'pic_name='+d,
          dataType:'json',
      
          success:function(hasil){
             console.log(hasil[0].email);
              console.log(hasil);
              $('[name="emailOther"]').val(hasil[0].email);
               $('[name="customerOther"]').val(hasil[0].customer);
                $('[name="picOther1"]').val(hasil[0].pic_name);
                // $('[name="kpphother"]').val(hasil[0].karakteristik_pph);
                // $('[name="kppnother"]').val(hasil[0].karakteristik_ppn);
              
            
          },
          error:function(hasil){
          }
      }); 
}

    
            function DataPICDeposit(){
      $.ajax({
          type:"post",
          url:'<?php echo base_url("Customer/AmbilDataPIC/")?>',
          data:'pic_name='+formiddeposit.pic_deposit[formiddeposit.pic_deposit.selectedIndex].text,
          dataType:'json',
      
          success:function(hasil){
             console.log(hasil[0].email);
              console.log(hasil);
                $('[name="email_deposit"]').val(hasil[0].email);
              
          },
          error:function(hasil){
    
           
          }
         

      });
  
}


        


  function hitungDescription(){
     var hitung=0;
            $('#tableLoopDescription tbody tr').each(function() {
            var frequency=$(this).find('td:nth-child(2) input').val();
            var satuan=$(this).find('td:nth-child(3) input').val();
            var satuan1 = satuan.replace(/[^\w\s]/gi, '');
            var data=Number(frequency)*Number(satuan1)
            var ss = data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
            $(this).find('td:nth-child(4) input').val(ss);


            hitung=Number(hitung)+Number(data);
            

            });
          var hitung1 =hitung.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
           
    
         $('#grandtotaldescription').val(hitung1);
         $('#grandtotaldescriptionhidden').val(hitung);
         hitungnetto();
       
  }

        function hitungnetto(){
           var total=$('#grandtotaldescriptionhidden').val();
           var a=Math.ceil(total);
           var total1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
            $('#netto_hidden').val(total);
             $('#netto').val(total1);
            hitungmanagement();
            total_description();
            ppn_description();
            pph_description();




        }
        function hitungmanagement(){
          var netto=$('#netto_hidden').val();
          var asf=$('#asf_percen_other').val();
          hitung=Number(netto)/100 * Number(asf);
          var a=Math.ceil(hitung);
          var hitung1 = a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
          $('#asf_other').val(hitung1);
           $('#asf_other_hidden').val(hitung);
          total_description();


        }
        function total_description(){
          var  netto=$('#netto_hidden').val();
          var management=$('#asf_other_hidden').val();
          var hasil=Number(netto)+Number(management);
            var a=Math.ceil(hasil);
          var hasil1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
          $('#total_description').val(hasil1);
           $('#total_description_hidden').val(hasil);



        }
         function ppn_description(){
          kppnother=$('#kppnother').val();
          if (kppnother=='noppn'){
             var  d=$('#total_description_hidden').val();
          var hasil=Number(d)*0;
            var a=Math.ceil(hasil);
          var hasil1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

          $('#ppn_description').val(hasil1);
           $('#ppn_description_hidden').val(hasil);

          }else{
             var  d=$('#total_description_hidden').val();
          var hasil=Number(d)*0.1;
            var a=Math.ceil(hasil);
          var hasil1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

          $('#ppn_description').val(hasil1);
           $('#ppn_description_hidden').val(hasil);


          }

         
        }
        function pph_description(){

          //2% dari management fee
          kpphother=$('#kpphother').val();
          if (kpphother=="nopph"){
                var  management=$('#asf_other_hidden').val();
          var hasil=Number(management)*0;
          var a=Math.ceil(hasil);
          var hasil1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
          $('#pph_descriptionhidden').val(hasil);
           $('#pph_description').val(hasil1);

          }else{
          var  management=$('#asf_other_hidden').val();
          var hasil=Number(management)*0.02;
          var a=Math.ceil(hasil);
          var hasil1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
          $('#pph_descriptionhidden').val(hasil);
           $('#pph_description').val(hasil1);


          }

        
       

        }



//genere id

    function generet_quotation_event(){
      $.ajax({
          type:"post",
          url:'<?php echo base_url("Quotation/generet_quotation_event")?>',
          dataType:'json',
          success:function(hasil){
             console.log(hasil);
                  var date = new Date();
                  var tahun = date.getFullYear();
                  var t=tahun.toString()
                  var bulan = date.getMonth();
                  var tanggal = date.getDate();
                  var hari = date.getDay();
                         
                $('[name="Quatations_number_event"]').val("QE-D"+t.substring(2,4)+""+(bulan+1)+""+tanggal+hasil.data)
              
          },
          error:function(hasil){
            console.log(hasil);


                
          }
         

      });
  
}

    function generet_quotation_deposit(){
      $.ajax({
          type:"post",
          url:'<?php echo base_url("Quotation/generet_quotation_deposit")?>',
          dataType:'json',
          success:function(hasil){
             console.log(hasil);
                  var date = new Date();
                  var tahun = date.getFullYear();
                  var t=tahun.toString()
                  var bulan = date.getMonth();
                  var tanggal = date.getDate();
                  var hari = date.getDay();
                         
                $('[name="Quatations_number_deposit"]').val("QD-D"+t.substring(2,4)+""+(bulan+1)+""+tanggal+hasil.data)
              
          },
          error:function(hasil){


                
          }
         

      });
  
}


    function generet_quotation_other(){
      $.ajax({
          type:"post",
          url:'<?php echo base_url("Quotation/generet_quotation_other")?>',
          dataType:'json',
          success:function(hasil){
             console.log(hasil);
                  var date = new Date();
                  var tahun = date.getFullYear();
                  var t=tahun.toString()
                  var bulan = date.getMonth();
                  var tanggal = date.getDate();
                  var hari = date.getDay();
                         
                $('[name="Quatations_number_other"]').val("QO-D"+t.substring(2,4)+""+(bulan+1)+""+tanggal+hasil.data)
              
          },
          error:function(hasil){


                
          }
         

      });
  
}

//logic select



// /// simpan data quotation other
//       $('#SimpanData').submit(function(e) {
//                   e.preventDefault();
//                      save_quotation_other();
                    
//                  });


//     function save_quotation_other() {
                   
//                   $.ajax({
//                       url:$("#SimpanData").attr('action'),
//                       type:'post',
//                       cache:false,
//                       dataType:"json",
//                       data: $("#SimpanData").serialize(),
//                       success:function (data) {
//                           if (data.success == true) {
                        
                              
                              
//                                 $('#notif').fadeIn(800, function() {

//                                  $("#notif").html(data.notif).fadeOut(5000).delay(1000); 
                                
//                                 });
//                                  window.location.href = "<?php echo base_url("Quotation/manage_quotation_other")?>";

                    
         
//                           }else{
//                               $('#notif').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
//                           }
//                       },

//                       error:function (error) {
//                           window.location.href = "<?php echo base_url("Quotation/manage_quotation_other")?>";
//                       }

//                   });
//               }


/// simpan data quotation event
      // $('#SimpanData1').submit(function(e) {
      //             e.preventDefault();
      //                save_quotation_event();
                    
      //            });


    // function save_quotation_event() {
                   
    //               $.ajax({
    //                   url:$("#SimpanData1").attr('action'),
    //                   type:'post',
    //                   cache:false,
    //                   dataType:"json",
    //                   data: $("#SimpanData1").serialize(),
    //                   success:function (data) {
    //                       if (data.success == true) {
                        
                              
                              
    //                             $('#notif1').fadeIn(800, function() {

    //                              $("#notif1").html(data.notif).fadeOut(5000).delay(1000); 
                                
    //                             });
    //                              window.location.href = "<?php echo base_url("Quotation/manage_quotation")?>";

                    
         
    //                       }else{
    //                           $('#notif1').html('<div class="alert alert-danger">Data Gagal Disimpan</div>')
    //                       }
    //                   },

    //                   error:function (error) {
    //                      // alert(error);

    //                        window.location.href = "<?php echo base_url("Quotation/manage_quotation")?>";
    //                   }

    //               });
    //           }






    function ComissionableCost(){
        var hitung=0;
          <?php  foreach ($item as $k): ?>
      
         var total=$("#grandtotalcoshidden<?php echo(str_replace(' ', '', $k->name)); ?>").val();
      
        var hitung=Number(total)+Number(hitung);
         var a=Math.ceil(hitung); 
        var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
       
          <?php endforeach ?>
          $('[name="Comissionable_cost"]').val(hitung1);
          $('[name="Comissionable_costhidden"]').val(hitung);
          
          console.log("#grandtotalcos<?php echo(str_replace(' ', '', $k->name)); ?>");
          hitungasf();

       }
        function hitungasf(){
        var Comissionable=$('[name="Comissionable_costhidden"]').val();
        var asf_percen=$('[name="asf_percen"]').val();
        var hitung=Number(Comissionable)/100 *Number(asf_percen);
         var a=Math.ceil(hitung); 
        var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
         $('[name="asf"]').val(hitung1);
          $('[name="asf_hidden"]').val(hitung);
         totalsummary();
         pph();

       }
       function totalsummary(){
            var Comissionable=$('[name="Comissionable_costhidden"]').val();
            var asf=$('[name="asf_hidden"]').val();
            var totalnonfee=$('#non_feehidden').val();
            var hitung=Number(Comissionable)+Number(asf)+Number(totalnonfee);
             var a=Math.ceil(hitung); 
            var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
            $('#total_summary').val(hitung1);
            $('[name="total_summaryhidden"]').val(hitung);
            ppn();


       }

       function pph(){
        var karakteristikpph=$('[name="kpph"]').val();
        if (karakteristikpph=='nopph'){
          var asf=$('[name="asf_hidden"]').val();
        var hitung=asf*0;
         var a=Math.ceil(hitung); 
         var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('[name="pph_hidden"]').val(hitung);
           $('[name="pph"]').val(hitung1);

        }else{
          var asf=$('[name="asf_hidden"]').val();
        var hitung=asf*0.02;
         var a=Math.ceil(hitung); 
         var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('[name="pph_hidden"]').val(hitung);
           $('[name="pph"]').val(hitung1);


        }

        
       }

       function ppn(){
        var karakteristikPpn=$('[name="kppn"]').val();
        if (karakteristikPpn=='noppn'){
          var total_summary=$('[name="total_summaryhidden"]').val();
        var hitung=Number(total_summary)*0;
         var a=Math.ceil(hitung); 
         var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('[name="ppn"]').val(hitung1);
         $('[name="ppn_hidden"]').val(hitung);

        }else{

          var total_summary=$('[name="total_summaryhidden"]').val();
        var hitung=Number(total_summary)*0.1;
         var a=Math.ceil(hitung); 
         var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('[name="ppn"]').val(hitung1);
         $('[name="ppn_hidden"]').val(hitung);
        }

        

       }

         function Nonfee(){
        var hitung=0;
          <?php  foreach ($item_non as $k): ?>
      
         var total=$("#grandtotalnonhidden<?php echo(str_replace(' ', '', $k->name)); ?>").val();
      
        var hitung=Number(total)+Number(hitung);
      
       
          <?php endforeach ?>
            var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>';   var a=Math.ceil(hitung); 
            var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
          $('[name="non_fee"]').val(hitung1);
          $('[name="non_feehidden"]').val(hitung);
          
      
       }




    $("#imagenes").fileinput({

        overwriteInitial: true,
        maxFileSize: 2000,
        showClose: false,
        showCaption: false,
        browseLabel: 'browse',
        removeLabel: 'Remove',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif","pdf"]
    });

      $("#imagenesother").fileinput({

        overwriteInitial: true,
        maxFileSize: 2000,
        showClose: false,
        showCaption: false,
        browseLabel: 'browse',
        removeLabel: 'Remove',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif","pdf"]
    });

function isTGL() {
  var date_quotation_event=document.getElementById("date_quotation_event").value;
  var date_expired_event=document.getElementById("date_expired_event").value;
 if ( date_quotation_event <= date_expired_event ){
  alert(" tanggal  valid");
 }else{
  alert("tanggal tidak valid");

 }
 
}

  
  function expired(){


    startDate=new Date($('#date_quotation_event').val());
    endDate=new Date($('#date_expired_event').val());
    if (endDate<startDate){
    $('#date_expired_event').val("");

    }
     var d = new Date("This is not date."); 
      if (Object.prototype.toString.call(startDate) 
                                    === "[object Date]") 
        { 
        if ((startDate=='') || isNaN(startDate.getTime())) {  
        document.getElementById("date_expired_event").readOnly = true;
          } 
          else { 
        $("#date_expired_event").datepicker("destroy");
        document.getElementById("date_expired_event").readOnly = false;
        $('#date_expired_event').datepicker({

        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        buttonImageOnly: true,
        minDate: $('#date_quotation_event').val(),
        maxDate: '+30Y',
        yearRange: '1999:2030',
        inline: true
    });
                } 
            
            } 
    // if (startDate!=''){
   

    // }else{


    // }
     
  }
  

 


   $(function () {
    var dateToday = new Date();

    $('#date_quotation_event').datepicker({
        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
     
        buttonImageOnly: true,
        minDate: dateToday,
        maxDate: '+30Y',
        yearRange: '1999:2030',
        inline: true
    });
});
     function expiredOther(){


    startDate=new Date($('#date_quotation').val());
    endDate=new Date($('#date_expired_other').val());
    if (endDate<startDate){
    $('#date_expired_other').val("");

    }
   
      if (Object.prototype.toString.call(startDate) 
                                    === "[object Date]") 
        { 
        if ((startDate=='') || isNaN(startDate.getTime())) {  
        document.getElementById("date_expired_other").readOnly = true;
          } 
          else { 
        $("#date_expired_other").datepicker("destroy");
        document.getElementById("date_expired_other").readOnly = false;
        $('#date_expired_other').datepicker({

        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        buttonImageOnly: true,
        minDate:startDate,
        maxDate: '+30Y',
        yearRange: '1999:2030',
        inline: true
    });
                } 
            
            } 
    // if (startDate!=''){
   

    // }else{


    // }
     
  }
  

 


   $(function () {
    var dateToday = new Date();

    $('#date_quotation').datepicker({
        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
     
        buttonImageOnly: true,
        minDate: dateToday,
        maxDate: '+30Y',
        yearRange: '1999:2030',
        inline: true
    });
});
  
  
         

    $("#quotationMainNav").addClass('active');
  $("#addQuotationNav").addClass('active');
   $("#openQuotationNav").addClass('menu-open');         

</script>
 <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js')?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
 

