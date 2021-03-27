
    
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
      
            <h3 class="box-title">Laporan Per Tahun</h3>

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

<form action="<?php echo base_url('Laporan/aksi_laporan_tahun') ?>" method="post" id="SimpanData" name="formid">


            <div class="col-md-6 col-xs-12 pull pull-left" >


                    <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-5 control-label">Laporan</label>
                    <div class="col-sm-12">
                    <select class="form-control" required="" id="laporan" name="laporan" style="width:99%;" onchange="DataPICEvent()"> value="<?php echo set_value('pic')?>">
                    <option value=""></option>
                    
                      <option value="quotations">Quotation</option>
                      <option value="Quotation_other"> Quotation Other </option>
      
                    <option value="bast">Bast</option>
                    
                    <option value="faktur">Faktur</option>
                    
                    <option value="delivery">Delivery</option>
                    
                    
                  </select>
                  </div>
                   
                   </div>

                    <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-5 control-label">Jenis Laporan</label>
                    <div class="col-sm-8">
             <div class="radio">
                    <label>
                    <input required="" type="radio" name="jenis_laporan" id="detail" value="detail">
                      Detail
                    </label>
                    <label>
                      <input required="" type="radio" name="jenis_laporan" id="total" value="total">
                      Total
                    </label>
                  </div>
                       <?= form_error('gender','<small class="text-danger pl-3">','</small>')?>
                  </div>
                   
                   </div>
            
                         <div class="form-group">
                          <table style="width: 730px;">
                            <tr>
                              <th><br>Masukan Tahun</th>
                               <td> &ensp;<input required=""  id="tahunm" name="tahunm" type="text" cols="30" class="form-control" autocomplete="off" ></td>
                                <td>&ensp;<br>Sampai</td>
                                <td><br><input required="" name="tahuns"  type="text" cols="30" class="form-control" id="tahuns"autocomplete="off" ></td>
                            </tr>
                          </table>
                   </div>


                    <div class="form-group text-left">
                                      <button type="submit" class="btn btn-success" name="tombol" value="excel"> Laporan Excel</button>
                                        <button type="submit" class="btn btn-danger" name="tombol" value="excel"> Laporan PDF</button>
                                      <a href="<?php echo base_url('Laporan') ?>" class="btn btn-warning"><font color="white"> Back</font></a>

                                  </div>

                   <br>
                   <br>
                  <br>
                  <br>
              
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />


<script type="text/javascript">
  
var $example = $('#groups').select2();
//$("#groups").on("click", function () { $example.val("CA").trigger("change"); });

</script>
 

