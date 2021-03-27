    
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
    <div class="content">

   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
  
          
            <div class="card">
              <div class="card-header">
                <h3 class="box-title"><b>Edit Quotation Event</b></h3>
                 <div class="card-tools" style="margin-top: -35px;margin-right: 13px">
             <a href="<?php echo base_url('Quotation/manage_quotation') ?>" class="btn btn-secondary"><font color="white"> Back</font></a>
          
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-12">
                      <div id="notif"></div>
                  </div>
                  <div class="col-md-12" style="margin: 10px;">
                      <div class="box box-solid">

                     
                          <form action="<?php echo base_url('Quotation/aksi_update_quotation') ?>" method="post"  name="formidevent" class="form-horizontal" enctype="multipart/form-data">



        
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
                  <input type="Number"  class=" col-sm-7 form-control" value="0" name="asf_percen"  id="asf_percen" oninput="hitungasf();"  name="asf_percen" autocomplete="off"  >
                   <label for="Quatations_number" style="text-align:left;" class="col-sm-1 control-label" >%</label>
                  
                </div>
              
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="col-sm-12 form-control" id="asf" name="asf" autocomplete="off" readonly="" value="0">

                   <input type="text" readonly="" class="form-control" id="asf_hidden" name="asf_hidden" autocomplete="off" readonly="" value="0" hidden="">
                </div>

                </div>
                   <div class="form-group" id="kanan">
                  <label for="total_summary"style="text-align:left;" class="col-sm-6 control-label">Sub Total</label>
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="form-control" id="total_summary"  readonly="" name="total_summary" autocomplete="off" value="0">

                   <input type="text" readonly="" class="form-control" id="total_summaryhidden"  readonly="" name="total_summaryhidden" autocomplete="off" value="0" hidden="">
                </div>
                </div>
                <div class="form-group" id="kanan">
                  <label id="asflabel" for="Quatations_number"  style="text-align:left;" class="col-sm-2 control-label" id>Discount</label>
                    <div class="col-sm-4" id="kananasf">
                  <input type="number"  class=" col-sm-7 form-control" placeholder="0" required="" name="discount_percent_event"   id="discount_percent_event" oninput="discount_event_function()"  name="discount_percen" autocomplete="off"  >
                   <label for="Quatations_number" style="text-align:left;" class="col-sm-1 control-label" >%</label>
                  
                </div>
              
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="col-sm-12 form-control" id="discount_event" name="discount_event" autocomplete="off" readonly="" value="0">
                   <input type="text" readonly="" class="form-control" id="discount_event_hidden" name="discount_event_hidden" autocomplete="off" readonly="" value="0" hidden="">
                </div>

                </div>

                <div class="form-group" id="kanan">
                  <label for="netto"style="text-align:left;" class="col-sm-6 control-label">Netto</label>
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="form-control" id="netto_event"  readonly="" name="netto_event" autocomplete="off" value="0">

                   <input type="text" readonly="" class="form-control" id="nettohidden"  readonly="" name="nettohidden" autocomplete="off" value="0" hidden="">
                </div>
              
                </div>

                <div class="form-group" id="kanan" hidden="">
                  <label for="Quatations_number"style="text-align:left;" class="col-sm-6 control-label">Image</label>
                   <div class="col-sm-12">
                  <input type="text" class="form-control" id="filequotation" name="filequotation" autocomplete="off" value="<?php echo set_value('Quatations_number')?>">
                </div>
                </div>

                  <div class="form-group" id="kanan">
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
                   <input type="Number" class="form-control" id="ppn_hidden" name="ppn_hidden" readonly=""  autocomplete="off" value="0" hidden="">
                </div>
              
                </div>
                    <div class="form-group" id="kanan">
                  <label for="total_summary"style="text-align:left;" class="col-sm-6 control-label">Grand Total</label>
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="form-control" id="grand_total"  readonly="" name="grand_total" autocomplete="off" value="0">

                   <input type="text" readonly="" class="form-control" id="grand_total_hidden"  readonly="" name="grand_total_hidden" autocomplete="off" value="0" hidden="">
                </div>
              
                </div>
                                          <div class="form-group" id="kanan">
                  <label for="pph"style="text-align:left;" class="col-sm-6 control-label" >File quotation event</label>
                   <div class="col-sm-12">
                <input accept=".jpg,.png,.jpeg,.pdf"  id="imagenes" name="imagenes" onchange="ValidateSize(this);" type="file" >
                </div>
              
                </div>
  <?php   
  $directory = "assets/images/";      
  $images = glob($directory . "*.*");
  ?>

              
              
        </div>

            <div class="col-md-6 col-xs-12 pull pull-left" >
               <div class="form-group" id="qnumber" hidden="">
                  <label for="Quatations_number"style="text-align:left;" class="col-sm-7 control-label">Revisi</label>
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="form-control" id="Quatations_number" name="update" autocomplete="off" value="<?php echo $revisi ?>" >
                </div>
                </div>
                 <div class="form-group" id="qnumber" hidden="">
                  <label for="Quatations_number"style="text-align:left;" class="col-sm-7 control-label">Revisi Lanjutan</label>
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="form-control" id="Quatations_number" name="revisi" autocomplete="off" value="<?php echo $revisi+1 ?>" >
                </div>
                </div>

                  <div class="form-group" id="qnumber" hidden="">
                  <label for="Quatations_number_other"style="text-align:left;" class="col-sm-7 control-label">Quotation Number Revisi</label>
                   <div class="col-sm-12">
                  <input readonly="" type="text" class="form-control" id="quotation_number_revisi" name="quotation_number_revisi"  autocomplete="off" value="<?= $quotation ?>">
                </div>
              
                </div>

    


                <div class="form-group" id="qnumber">
                  <label for="Quatations_number"style="text-align:left;" class="col-sm-7 control-label">Quotation Number</label>
                   <div class="col-sm-12">
                  <input type="text" readonly="" class="form-control" id="Quatations_number" name="Quatations_number" autocomplete="off" value="<?php echo $quotation_number ?>" >
                </div>
                </div>
                
                  <div class="form-group" id="qnumber">
                  <label for="Date_quotation" style="text-align:left;" class="col-sm-7 control-label">Date Quotation</label>
                  <div class="col-sm-12">
                  <input onkeypress="return false;" type="text" oninput="expired()" onchange="expired();" placeholder="yyyy-mm-dd" required="" class="form-control" id="date_quotation_event" name="date_quotation_event"  autocomplete="off" value="<?php echo set_value('Date_quotation')?>" >
                </div>
                
                   </div>
                    <?= form_error('date_quotation','<small class="text-danger pl-3">','</small>')?>
                  <div class="form-group" id="qnumber">
                  <label for="date_expired_event" style="text-align:left;"  class="col-sm-7 control-label" >Date Expired</label>
                  <div class="col-sm-12">
                  <input onkeypress="return false;" type="text" placeholder="yyyy-mm-dd" class="form-control" required="" id="date_expired_event" name="date_expired_event" autocomplete="off" value="<?php echo set_value('date_expired_event')?>" >
                </div>
                     <?= form_error('date_expired','<small class="text-danger pl-3">','</small>')?>
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

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-7 control-label">id customer</label>
                   <div class="col-sm-12">
                     <input type="text" readonly class="form-control" id="id_customer" name="id_customer" autocomplete="off" value="<?php echo set_value('id_customer')?>">
                
                </div>
               <?= form_error('customeEvent','<small class="text-danger pl-3">','</small>')?>
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
                      <option value="<?php echo $k->id ?>"><?php echo $k->pic_name.' | '. $k->customer ?></option>
                    <?php endforeach ?>
                  </select>
                  </div>
                   </div>

                                       <div class="form-group" id="qnumber" hidden="" >

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



                         <div class="form-group" id="qnumber" hidden="">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-7 control-label">PIC Name</label>
                   <div class="col-sm-12">
                     <input type="email" readonly class="form-control" id="pic_event1" name="pic_event1" autocomplete="off" value="<?php echo set_value('pic_event1')?>">
                
                </div>
               <?= form_error('customer_event','<small class="text-danger pl-3">','</small>')?>
                   </div>
                <div class="form-group" id="qnumber">

                   <label for="groups"id="qnumber" style="text-align:left;" class="col-sm-7 control-label">Customer</label>
                   <div class="col-sm-12">
                     <input type="email" readonly class="form-control" id="customer_event" name="customer_event" autocomplete="off" value="<?php echo set_value('customer_event')?>">
                
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
                  <input type="text" required="" class="form-control" id="title_event" name="title_event" placeholder="Titile Event" autocomplete="off" value="<?php echo set_value('title_event')?>">
                </div>
                </div>
                     <?= form_error('title_event','<small class="text-danger pl-10">','</small>')?>

                           <div class="form-group" id="qnumber">
                  <label for="venue_event" style="text-align:left;" class="col-sm-7 control-label">Venue Event</label>
                  <div class="col-sm-12">
                  <input  type="text" required="" class="form-control venue_event" id="venue_event" name="venue_event" placeholder="Venue Event" autocomplete="off" value="<?php echo set_value('vanue_event')?>">
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

                    
                   
                </div>
              
                <br>
                <br>
                <br>
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
                 <h3>Non-Fee Cost</h3>
                  <?php  foreach ($item_non as $k): ?>
                  <br>
                   <input style="width: 20%" type="button" class="btn btn-info btn-color-custom" value="<?php echo $k->name?>" id="btn<?php echo (str_replace(' ', '', $k->name)) ?>">
                   <br>
                   

                   <table class="table" border="0" id="table<?php echo (str_replace(' ', '', $k->name))?>">
                                           <thead>
                                          <tr>
                                             
                                                      <th style="width: 30%"><a style="width: 5" class="btn btn-sm bg-gradient-secondary" data-toggle="tooltip" title="Hapus Baris" id="hapusall<?php echo (str_replace(' ', '', $k->name)) ?>"><font color="white"> <i class="fa fa-times"><font color="white"></i></font></a></th>
                                             <th style="width: 5%">Quantity</th>
                                                <th style="width: 5%">Frequency</th>
                                               <th style="width: 20%">Rate</th>
                                                <th style="width: 20%">Sub Total</th>
                                        
                                              <th style="width: 5%" ><button  style="width: 5" class="btn btn-sm bg-gradient-secondary" id="tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><i class="fa fa-plus"></i> </button></th>
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
                <hr>
              
                <h3>Comissionable cost</h3>
                <?php  foreach ($item as $k): ?>
                  <br>
                   <input style="width: 20%" type="button" class="btn btn-info btn-color-custom" value="<?php echo $k->name?>" id="btn<?php echo (str_replace(' ', '', $k->name)) ?>">
                   <br>
                   

                   <table class="table" border="0" id="table<?php echo (str_replace(' ', '', $k->name))?>">
                                           <thead>
                                          <tr>
                                             
                                                      <th style="width: 30%"><a style="width: 5" class="btn btn-sm bg-gradient-secondary" data-toggle="tooltip" title="Hapus Baris" id="hapusall<?php echo (str_replace(' ', '', $k->name)) ?>"><font color="white"> <i class="fa fa-times"><font color="white"></i></font></a></th>
                                             <th style="width: 5%">Quantity</th>
                                                <th style="width: 5%">Frequency</th>
                                               <th style="width: 20%">Rate</th>
                                                <th style="width: 20%">Sub Total</th>
                                        
                                              <th style="width: 5%" ><button  style="width: 5" class="btn btn-sm bg-gradient-secondary" id="tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><i class="fa fa-plus"></i> </button></th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>

                                            <tfoot>
                                        <tr>
                                            <td></td>
                                          <td></td>
                                             <td></td>
                                         
                                          
                                          
                                             <th style="text-align:left;">Grand Total</th><th colspan="1" >

                                                <input id="grandtotalcos<?php echo(str_replace(' ', '', $k->name)); ?>" readonly="" style="width:100%" type="text" class="form-control" required=""> <input hidden="" id="grandtotalcoshidden<?php  echo (str_replace(' ', '', $k->name)) ?>"  readonly="" style="width:100%" type="text" class="form-control" required=""  ></th>
                                               </tr>
                                        </tfoot>
                                    </table>
                    <?php endforeach ?>
                    <br>
                   
                
                 
                    <br>
                      <hr>
                            <div class="form-group text-left">
                                      <button value="update" type="submit" name="btn" class="btn btn-primary"><i></i> Save Changes</button>

                                       <button value="rivisi" name="btn" type="submit" class="btn btn-success"><i></i>Save as  Revision</button>
                                    

                                  </div>
                      
                
            </form>
                 
               
        
            
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

  
  </div>
      <!-- /.container-fluid -->
    </section>


    <!-- /.content -->
  </div>




<script type="text/javascript">

  
  
  
  
      
     var value=0;
    $(document).ready(function() {
        DataQuotation($('[name="Quatations_number"]').val());  
        $('#image').hide();
      //function comminable 
     <?php  foreach ($item as $k): ?>
      //var tablehide="#table<?php echo $k->name;?>";
    
      //tambah baris
      $("#tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>").click(function(e) {
        e.preventDefault();
       <?php echo (str_replace(' ', '', $k->name)) ?> ();
        });                               
        <?php endforeach ?>
             //function comminable 
      <?php  foreach ($item_non as $k): ?>
      //var tablehide="#table<?php echo $k->name;?>";
      

      //tambah baris
      $("#tambahbaris<?php echo (str_replace(' ', '', $k->name)) ?>").click(function(e) {
        e.preventDefault();
       <?php echo (str_replace(' ', '', $k->name)) ?> ();
        });


      // <?php echo (str_replace(' ', '', $k->name)) ?> ()
      <?php endforeach ?>
      $("#classdeposit").hide();
   

    <?php  foreach ($item as $k): ?>
    defaul<?php echo (str_replace(' ', '', $k->name)) ?> ();
    hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>();
    <?php endforeach ?> 


     <?php  foreach ($item_non as $k): ?>
    defaulnon<?php echo (str_replace(' ', '', $k->name)) ?> ();
    hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name))?>();

    <?php endforeach ?> 

    // totalsummary();
    // ComissionableCost();
    // hitungasf();
    //  totalsummary();
    //  Nonfee();
     pph();
     ppn();

 



                        
           
    });


        
   
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



           
              function <?php echo (str_replace(' ', '', $k->name)) ?> () {
                  
       
                  $(document).ready(function() {
                      $("[data-toggle='tooltip']").tooltip(); 
                  });
                  var datta="#table<?php echo (str_replace(' ', '', $k->name)) ?>";
                  var idtr="<?php echo (str_replace(' ', '', $k->name)) ?>";
                  var Nomor = $(''+datta+' tbody tr').length + 1;
               
                  var Baris = '<tr id=tr<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'>';
                  Baris += '<td >  <div class="form-group"> ';
                  Baris += '<select class="form-control" name="item_value[]"  style="width:400px;" id="select<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"   onchange="cek<?php echo (str_replace(' ', '', $k->name)) ?>('+Nomor+');"> <option value="">Select <?php echo $k->name ?></option> <?php foreach ($core as $e): if ($k->name==$e->name) {?>  <option value="<?php echo $e->value ?>"><?php echo $e->value ?></option><?php }?> <?php endforeach ?> </select> ';
                  Baris += '</div></td>';
                  Baris += '<td>';
                  Baris += '<input  readonly class="form-control Quantity" oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>()"  type="Number" name="quantity[]" id="Quantity<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'" class="form-control Quantity" >';
                  Baris += '</td>';
                  Baris += '<td>';
                  Baris += '<input   readonly type="Number"   oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>()" name="frequency[]" id="Frequency<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control deposit" required=""  ready >';
                  Baris += '</td>';
                  Baris += '<td>';
                  Baris += '<input   readonly onkeyup="convertToRupiah(this);" class="form-control ratee" type="text"   oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>()" name="rate[]" id="Rate<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control deposit"  required=""    > ';
                  Baris += '</td>';
                  Baris += '<td>';
                  Baris += '<input  type="text"   readonly name="subtotal[]" id="subtotal<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal"  required="" readonly >  <input  type="text"  readonly name="subtotal<?php echo (str_replace(' ', '', $k->name)) ?>[]" id="subtotalhidden<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly hidden  >';
                  Baris += '</td>';

                       Baris += '<td hidden >';
                  Baris += '<input  type="text"  readonly name="name[]"  class="form-control subtotal_creative"  required="" readonly value="<?php echo $k->name ?>">';
                  Baris += '</td>';

                    Baris += '<td hidden>';
                  Baris += '<input  type="text"  readonly name="metode[]" id="metode<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="Comissionable Cost">';
                  Baris += '</td>';

                 
                  


                  Baris += '<td class="text-center">';
                  Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip"  id="hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><font color="white"><i class="fa fa-times"></font></i></a>';
                  Baris += '</td>';

                  Baris += '</tr>';

                  $(''+datta+' tbody').append(Baris);
                  $(''+datta+' tbody tr').each(function () {
                      $(this).find('td:nth-child(1) select').select2(); 
                    
                  });
                 
                      

              }
             


              $(document).on('click', '#hapusbaris<?php echo (str_replace(' ', '', $k->name))?>', function(e) {

                 e.preventDefault();
        
                 var Nomor = 1;
                 $(this).parent().parent().remove();
                 hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>();
                    Nonfee();
                      ComissionableCost();
                 $(''+datta+' tbody tr').each(function() {
                     $(this).find('td:nth-child(1)').html(Nomor);
                     Nomor++;


                 });
              });
                 <?php endforeach ?>
//-----------------------------------tabel non fee----------------------------------------------------  


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
                              Baris += '<input  type="text"  readonly name="subtotal[]" id="subtotalNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly >  <input  type="text"  readonly name="rate< id="subtotalhiddenNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly hidden > ';
                          Baris += '</td>';

                              Baris += '<td hidden>';
                              Baris += '<input hidden  type="text"  readonly name="name[]" id="name<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="<?php echo $k->name ?>">';
                          Baris += '</td>';
                        
                  


                            Baris += '<td hidden>';
                              Baris += '<input name="metode[]"  class="form-control subtotal_creative"  required="" readonly value="Non-Fee Cost"> ';
                          Baris += '</td>';



                          Baris += '<td class="text-center">';
                              Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip"  id="hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><font color="white"><i class="fa fa-times"></font></i></a>';
                          Baris += '</td>';
                      Baris += '</tr>';

                       // onkeyup="convertToRupiah(this);"

                  $(''+datta+' tbody').append(Baris);
                  $(''+datta+' tbody tr').each(function () {
                      $(this).find('td:nth-child(1) select').select2(); 
                    
                  });
                 

              }

              $(document).on('click', '#hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>', function(e) {

                 e.preventDefault();
        
                 var Nomor = 1;
                 $(this).parent().parent().remove();
                   hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name))?>()
              
                   Nonfee();
                      ComissionableCost();
                 $(''+datta+' tbody tr').each(function() {
                     $(this).find('td:nth-child(1)').html(Nomor);
                     Nomor++;


                 });
              });
                 <?php endforeach ?>


//-----------------------menampilkan data edit commisionable cost------------------------------------
  // ----------------------------------------------Menampilkan data edit----------------------   
 <?php  foreach ($item as $k): ?>
   function defaul<?php echo (str_replace(' ', '', $k->name)) ?> () {
    <?php  foreach ($quotationitem as $it): ?>

              <?php if ($k->name==$it->name_item) {?>
                  $(document).ready(function() {
                      $("[data-toggle='tooltip']").tooltip(); 
                  });
                  var datta="#table<?php echo (str_replace(' ', '', $k->name)) ?>";
                  var idtr="<?php echo (str_replace(' ', '', $k->name)) ?>";
                  var Nomor = $(''+datta+' tbody tr').length + 1;
                
                  var Baris = '<tr id=tr<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'>';
               
                             Baris += '<td >  <div class="form-group"> ';
                            Baris += '<select class="form-control" style="width:400px;" name="item_value[]" id="select<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"   onchange="cek<?php echo (str_replace(' ', '', $k->name)) ?>('+Nomor+');"> <option value="<?php echo $it->item_value ?>"><?php echo $it->item_value ?></option> <?php foreach ($core as $e): if ($k->name==$e->name) {?>  <option value="<?php echo $e->value ?>"><?php echo $e->value ?></option><?php }?> <?php endforeach ?> </select> ';
                          Baris += '</div></td>';
                  

                  Baris += '</div></td>';

                  Baris += '<td>';
                  Baris += '<input   class="form-control Quantity" oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>()"  type="Number" name="quantity[]" id="Quantity<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'" class="form-control Quantity" value="<?php echo $it->quantity ?>" >';
                  Baris += '</td>';

                  Baris += '<td>';
                  Baris += '<input   type="Number"   oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>()" name="frequency[]" id="Frequency<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control deposit" required=""  value="<?php echo $it->frrequency ?>" >';
                  Baris += '</td>';

                  Baris += '<td>';
                  Baris += '<input   onkeyup="convertToRupiah(this);" class="form-control ratee" type="text"   oninput="hitunggrandtotal<?php echo (str_replace(' ', '', $k->name))?>()" name="rate[]" id="Rate<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control deposit"  required="" value="<?php echo $it->rate ?>"   > ';
                  Baris += '</td>';

                  Baris += '<td >';
                  Baris += '<input  type="text"    name="subtotal[]" id="subtotal<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal"  required="" readonly >  <input  type="text"  readonly name="subtotal<?php echo (str_replace(' ', '', $k->name)) ?>[]" id="subtotalhidden<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly hidden>  ';

                  Baris += '</td>';

                  Baris += '<td hidden>';
                  Baris += '<input hidden  type="text"  readonly name="name[]" id="name<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="<?php echo $k->name ?>">';

                  Baris += '</td>';

                       Baris += '<td hidden>';
                  Baris += '<input  type="text"  readonly name="metode[]" id="metode<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="Comissionable Cost"> ';

                  Baris += '</td>';

                          Baris += '<td hidden>';
                  Baris += '<input  type="text"  readonly name="id[]" id="id<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="<?php echo $it->id ?>">';

                  Baris += '</td>';

                  Baris += '<td class="text-center">';
                  Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip"  id="hapusbaris<?php echo (str_replace(' ', '', $k->name)) ?>"><font color="white"><i class="fa fa-times"></font></i></a>';
                  Baris += '</td>';
                  Baris += '</tr>';
                    

                  $(''+datta+' tbody').append(Baris);

                  
                  $(''+datta+' tbody tr').each(function () {
                      $(this).find('td:nth-child(1) select').select2(); 
                     
                  });
                   
                <?php }else{?>
                   // $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").hide();
                   // console.log("<?php echo $k->name ?>");
                 <?php }?>
                       <?php endforeach ?>

              }
               <?php endforeach ?>


  // ----------------------------------------------Menampilkan data edit NON----------------------   
 <?php  foreach ($item_non as $k): ?>
   function defaulnon<?php echo (str_replace(' ', '', $k->name)) ?> () {
    <?php  foreach ($quotationitem as $it): ?>

  
              <?php if ($k->name==$it->name_item) {?>
                  $(document).ready(function() {
                      $("[data-toggle='tooltip']").tooltip(); 
                  });
                  var datta="#table<?php echo (str_replace(' ', '', $k->name)) ?>";
                  var idtr="<?php echo $k->name;?>";
                  var Nomor = $(''+datta+' tbody tr').length + 1;
               
                  var Baris = '<tr id=tr<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'>';

                     
                             Baris += '<td >  <div class="form-group"> ';
                            Baris += '<select class="form-control" style="width:400px;" name="item_value[]" id="select<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"   onchange="cek<?php echo (str_replace(' ', '', $k->name)) ?>('+Nomor+');"> <option value="<?php echo $it->item_value ?>"><?php echo $it->item_value ?></option> <?php foreach ($core as $e): if ($k->name==$e->name) {?>  <option value="<?php echo $e->value ?>"><?php echo $e->value ?></option><?php }?> <?php endforeach ?> </select> ';
                          Baris += '</div></td>';
                         

                            Baris += '<td>';
                              Baris += '<input  class="form-control QuantityNON oninput="hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name))?>()"  type="Number" name="quantity[]" id="QuantityNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'" class="form-control Quantity" value="<?php echo $it->quantity ?>"  >';
                          Baris += '</td>';

                    

                          Baris += '<td>';
                              Baris += '<input  type="Number"   oninput="hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name))?>()" name="frequency[]" id="FrequencyNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control deposit" required=""  value="<?php echo $it->frrequency ?>"  >';
                          Baris += '</td>';


                           Baris += '<td>';
                              Baris += '<input  onkeyup="convertToRupiah(this);" class="form-control ratee" type="text"   oninput="hitunggrandtotalnonfee<?php echo (str_replace(' ', '', $k->name))?>()" name="rate[]" id="RateNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control deposit"  required="" value="<?php echo $it->rate ?>" > ';
                          Baris += '</td>';


                            Baris += '<td>';
                              Baris += '<input  type="text"   name="subtotal[]" id="subtotalNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly >  <input  type="text"  readonly name="rate<?php echo (str_replace(' ', '', $k->name)) ?>[]" id="subtotalhiddenNON<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly hidden >';
                               Baris += '</td>';

                                 Baris += '<td hidden>';
                              Baris += '<input hidden  type="text"  readonly name="name[]" id="name<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="<?php echo $k->name ?>">';
                          Baris += '</td>'
                          Baris += '</td>';

                            Baris += '<td hidden>';
                              Baris += ' <input  type="text"  readonly name="metode[]" id="metode<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="Non-Fee Cost" hidden>';
                          Baris += '</td>'
                       

                            Baris += '<td hidden>';
                              Baris += '<input  type="text"  readonly name="id[]" id="id<?php echo (str_replace(' ', '', $k->name)) ?>'+Nomor+'"  class="form-control subtotal_creative"  required="" readonly value="<?php echo $it->id ?>" hidden >';
                          Baris += '</td>';

                          Baris += '<td class="text-center">';
                              Baris += '<a class="btn btn-sm btn-danger" data-toggle="tooltip"  id="hapusbaris<?php echo $k->name ?>"><font color="white"><i class="fa fa-times"></font></i></a>';
                          Baris += '</td>';
                      Baris += '</tr>';


                  $(''+datta+' tbody').append(Baris);
                  $(''+datta+' tbody tr').each(function () {
                     $(this).find('td:nth-child(1) select').select2(); 
                    
                  });
               


                <?php }else{?>
                  // $("#table<?php echo (str_replace(' ', '', $k->name)) ?>").hide();
                 <?php }?>
                       <?php endforeach ?>

              }
               <?php endforeach ?>
  //---------------------------menampilkan data deposit-------------------------------------------
             function function_deposit(){
                      $('#classdeposit').show();
                      var Quotation=$('#Quatations_number').val();
                      var data=Quotation+"-D";

                      $('#Quatations_number').val(data);


                    }
                    function hapus_deposit(){
                         $('#deposit_number_event').val("");
                         $('#total_cashin_event').val("");
                         $('#total_cashin_event').val("");
                         $('#classdeposit').hide();

                 


                    }
  //------------------------------
     function DataPICEvent(){
      var d=$( "#pic_event" ).val();
      if (d.trim()==''){
         $('[name="email_event"]').val('');
               $('[name="customer_event"]').val('');
               $('[name="pic_event1"]').val('');


      }else{
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
                 // $('[name="id_customer"]').val(hasil[0].id_customer);
               //   $('[name="kpph"]').val(hasil[0].karakteristik_pph);
               // $('[name="kppn"]').val(hasil[0].karakteristik_ppn);
               // pph();
               // ppn();
               validasiEvent();
              
             
              
          },
          error:function(hasil){
    
           
          }
         

      }); 

      }
      
  
}
//----------------perhitungan------------------------------------------------------

    function ComissionableCost(){
        var hitung=0;
          <?php  foreach ($item as $k): ?>
      
         var total=$("#grandtotalcoshidden<?php echo(str_replace(' ', '', $k->name)); ?>").val();
      
        var hitung=Number(total)+Number(hitung);
         var a=Math.round(hitung); 
        var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
       
          <?php endforeach ?>
          $('[name="Comissionable_cost"]').val(hitung1);
          $('[name="Comissionable_costhidden"]').val(hitung);
         
          hitungasf();

       }
        function hitungasf(){
        var Comissionable=$('[name="Comissionable_costhidden"]').val();
        var asf_percen=$('[name="asf_percen"]').val();
        var hitung=Number(Comissionable)/100 *Number(asf_percen);
         var a=Math.round(hitung); 
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
             var a=Math.round(hitung); 
            var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
            $('#total_summary').val(hitung1);
            $('[name="total_summaryhidden"]').val(hitung);
            discount_event_function();
            ppn();
            grand_total();
           


       }

       function pph(){
        var data=$('[name="kpph"]').val();
        if (data=='nopph'){
           var asf=$('[name="asf_hidden"]').val();
        var hitung=asf*0;
         var a=Math.round(hitung); 
         var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('[name="pph_hidden"]').val(hitung);
           $('[name="pph"]').val('('+hitung1+')');
           grand_total();


        }else{
           var asf=$('[name="asf_hidden"]').val();
        var hitung=asf*0.02;
         var a=Math.round(hitung); 
         var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('[name="pph_hidden"]').val(hitung);
           $('[name="pph"]').val('('+hitung1+')');
           grand_total();



        }

       
       }

       function ppn(){
        var data=$('[name="kppn"]').val();
        if (data=="noppn"){

        var total_summary=$('[name="total_summaryhidden"]').val();
        var hitung=Number(total_summary)*0;
         var a=Math.round(hitung); 
         var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('[name="ppn"]').val(hitung1);
         $('[name="ppn_hidden"]').val(hitung);
         grand_total();

        }else{

        var total_summary=$('[name="total_summaryhidden"]').val();
        var hitung=Number(total_summary)*0.1;
         var a=Math.round(hitung); 
         var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('[name="ppn"]').val(hitung1);
         $('[name="ppn_hidden"]').val(hitung);
         grand_total();


        }



       }
         function grand_total(){
          var total1=$('#netto_event').val();
        var total= total1.replace(/[^\w\s]/gi, '');
         var pph=$('[name="pph_hidden"]').val();
         var ppn=$('[name="ppn_hidden"]').val();
         var grand_total=Number(total)+Number(ppn)-Number(pph);
               var grand_total2=Math.round(grand_total);
         var grand_total1=grand_total2.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
          $('[name="grand_total"]').val(grand_total1);



       }

         function Nonfee(){
        var hitung=0;
          <?php  foreach ($item_non as $k): ?>
      
         var total=$("#grandtotalnonhidden<?php echo(str_replace(' ', '', $k->name)); ?>").val();
      
        var hitung=Number(total)+Number(hitung);
      
       
          <?php endforeach ?>
           var a=Math.round(hitung); 
            var hitung1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
          $('[name="non_fee"]').val(hitung1);
          $('[name="non_feehidden"]').val(hitung);
          totalsummary();
          
      
       }               

      function DataQuotation(id){
         var id=$('[name="Quatations_number"]').val();
      $.ajax({
          type:"post",
          url:'<?php echo base_url("Quotation/AmbilDataQuotation/")?>',
          data:'quotation_number='+id,

          dataType:'json',
      
          success:function(hasil){
            console.log(hasil);

   $('[name="pic_event"]').select2();
   $('[name="picEvent"]').select2();
         
               $('#customerEvent').val(hasil[0].customer_event);
               
                $('[name="Quatations_number"]').val(hasil[0].quotation_number);
                $('[name="date_expired_event"]').val(hasil[0].date_expired);
                $('[name="title_event"]').val(hasil[0].tittle_event);
                $('[name="venue_event"]').val(hasil[0].venue_event);
                $('[name="date_event"]').val(hasil[0].date_event);
                $('[name="pic_event"]').val(hasil[0].id).change();
                $('[name="pic_event1"]').val(hasil[0].pic_name);
                $('[name="customer_event"]').val(hasil[0].customer);
                $('[name="email_event"]').val(hasil[0].pic_email);
                $('[name="date_quotation_event"]').val(hasil[0].date_quotation);
                $('[name="asf_percen"]').val(hasil[0].asfp);

                $('[name="emailEvent"]').val(hasil[0].email_event);
                $('[name="picEvent"]').val(hasil[0].id_event).change();
                $('[name="id_customer"]').val(hasil[0].id_customer);
                $('#picEvent1').val(hasil[0].pic_event);
                $('#kpph').val(hasil[0].karakteristik_pph);
                $('#kppn').val(hasil[0].karakteristik_ppn);
                $('#filequotation').val(hasil[0].image);
                $('#discount_event').val(hasil[0].discount);
                $('#discount_percent_event').val(hasil[0].discount_percent);
                $('#netto_event').val(hasil[0].netto);




                $('#status').val(hasil[0].status);
                ppn();
                pph();
               


                hitungasf();

          },
          error:function(hasil){
         
    
           
          }
         

      });
  
}


  

 
    $("#imagenes").fileinput({

        overwriteInitial: true,
        maxFileSize: 20000,
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
        layoutTemplates: {main2: '{preview}   {remove} {browse}'},
          allowedFileExtensions: ["jpg", "png", "gif","pdf"],
    initialPreview: [
      '<object type="application/pdf" data="<?php echo base_url('assets/images/'.$img)?>" style="height: 30vh; width:50vh"><img style="width: 10%; height: 30% "  src="<?php echo base_url('assets/images/'.$img) ?>" ></object>'
  ],
    });
//get pic even even
 function DataPIC(){
      var d=$( "#picEvent" ).val();
      if (d.trim()==''){
        $('[name="emailEvent"]').val('');
        $('[name="customerEvent"]').val('');
        $('[name="picEvent1"]').val('');
        $('[name="kpph"]').val('');
        $('[name="kppn"]').val('');
        $('[name="id_customer"]').val('');

        pph();
        ppn();
        validasiEvent();


      }else{
        var pic=$('[name="customer_event"]').val();
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
               $('[name="picEvent1"]').val(hasil[0].pic_name);
                  $('[name="kpph"]').val(hasil[0].karakteristik_pph);
               $('[name="kppn"]').val(hasil[0].karakteristik_ppn);
                 $('[name="id_customer"]').val(hasil[0].id_customer);
               pph();
               ppn();
               if (pic.trim()!=''){
                validasiEvent();
               }

              
             
              
          },
          error:function(hasil){
    
           
          }
         

      }); 


      }
  
  
}
       function discount_event_function(){
        var total_summary=$('#total_summary').val();
        var discount_percent=$('#discount_percent_event').val();
       
        var total_summary1= total_summary.replace(/[^\w\s]/gi, '');
        
        var hasil=Number(total_summary1)*Number((discount_percent/100));
        var a=Math.round(hasil); 
        var hasil1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('#discount_event').val('('+hasil1+')');

        ppn();
        netto_event_function();
        grand_total();

       }
       function netto_event_function(){
        var discount=      $('#discount_event').val();
        var discount1= discount.replace(/[^\w\s]/gi, '');
        var total_summary=$('#total_summary').val();       
        var total_summary1= total_summary.replace(/[^\w\s]/gi, '');
        var hasil=Number(total_summary1)-Number(discount1);
        var a=Math.round(hasil); 
        var hasil1 =a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
        $('#netto_event').val(hasil1);


    
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
       
        maxDate: '+30Y',
        yearRange: '1999:2030',
        inline: true
    });
});

   $("#quotationMainNav").addClass('active');
  $("#manageQuotationeventNav").addClass('active');
   $("#openQuotationNav").addClass('menu-open');  

   function ValidateSize(file) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > 2) {
            alert('File size exceeds 2 MB');
            $('#imagenes').val(''); //for clearing with Jquery
        } else {

        }
    }

     function validasiEvent(){
    var picEvent=$('#picEvent').val();
    var picpo=$('#pic_event').val();
     var picnamepo=$('#pic_event1').val();
    var customerEvent= $('[name="customerEvent"]').val();
     var customerPO=$('[name="customer_event"]').val();

     var emailPO=$('#email_event').val();

     if (picEvent.trim()!=''){
  
      if (customerEvent.trim()!=customerPO.trim()){
        $('#email_event').val('');
        $('#customer_event').val('');
        $('#pic_event1').val('')
          $('[name="pic_event"]').val("").change();
              alert("Customer PIC PO harus sama dengan PIC Event");


      }

     }else{
        $('#email_event').val('');
        $('#customer_event').val('');
        $('#pic_event1').val('')
          $('#pic_event').val('').change();
         alert("Pilih terlebih dahulu PIC Event");

     }



   }       

</script>
 <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js')?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
 

