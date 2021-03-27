 
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
          <?php 

        $idd= substr($quotation_number,0,2);
       
        if ($idd=="QE"){
          ?>
           <div class="card-header">
                 <h3 class="box-title"><b>Send Quotation Event</b></h3>     
                <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
                <a href="<?php echo base_url('Quotation/manage_quotation') ?>" class="btn btn-secondary"><font color="white">Back</font></a>
          
          </div>
              </div>
              <?php

        }else{
          ?>
           <div class="card-header">
                 <h3 class="box-title"><b>Send Quotation Other</b></h3>     
                <div class="card-tools" style="margin-top: -35px;margin-right: 11px">
                <a href="<?php echo base_url('Quotation/manage_quotation_other') ?>" class="btn btn-secondary"><font color="white">Back</font></a>
          
          </div>
              </div>
              <?php

        }


           ?>
                
     
         <div class="card-body">
      <!-- Small boxes (Stat box) -->
      <div class="row">
                <div class="col-md-12 col-xs-12">
          
  

          <div class="box">
           
             <form action="<?php echo base_url('Quotation/send_email') ?>" method="post">
              <div class="box-body">
                   <div class="form-group">
                  <label for="name">Email PIC Event</label>
                  <input type="text" readonly="" class="form-control" id="email_event" name="email_event"  autocomplete="off" value="<?php echo $email_event ?>">
                </div>

            <div class="form-group">
                  <label for="name">Email PIC PO</label>
                  <input type="text" readonly="" class="form-control" id="email" name="email"  autocomplete="off" value="<?php echo $email_po ?>">
                </div>
              
                
               
                 <div class="form-group">
                  <label for="name">Quotation Number</label>
                  <input readonly="" type="text" class="form-control" id="quotation_number" name="quotation_number"  autocomplete="off" value="<?php echo $quotation_number ?>">
                </div>
                
              
            
                <div class="form-group">
                  <label for="name">Subject</label>
                  <input type="text" readonly="" class="form-control" id="subject" name="subject"  autocomplete="off" value="<?php echo $subject ?>">
                </div>
                
            
                
                 <div class="form-group">
                  <label for="address">Message</label>
                  <textarea id="basic-example" name="message">
 
    
</textarea>


  
            
                
                </div>
               
                 <br>

                  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send</button>
               
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

<!--  <script src="https://cdn.tiny.cloud/1/wdnv4hx3vqldbt8q5brjqotqsga81prpz5umzknsv64pnj91/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

<script src="<?php echo base_url('assets/lte/tiny/tinymce.min.js')?>" referrerpolicy="origin" referrerpolicy="origin"></script>

<script type="text/javascript">



tinymce.init({
  selector: 'textarea#basic-example',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});


   $("#quotationMainNav").addClass('active');
  
   $("#openQuotationNav").addClass('menu-open');  

       <?php 

        $idd= substr($quotation_number,0,2);
       
        if ($idd=="QE"){
          ?>
            $("#quotationMainNav").addClass('active');
  $("#manageQuotationeventNav").addClass('active');
  $("#openQuotationNav").addClass('menu-open'); 
              <?php

        }else{
          ?>
             
   $("#quotationMainNav").addClass('active');
  $("#manageQuotationotherNav").addClass('active');
   $("#openQuotationNav").addClass('menu-open');  

              <?php

        }

?>

</script>
