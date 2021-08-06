
    
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
         <h3 class="box-title">Laporan</h3>
     
        <!-- ./row -->
       
        <!-- ./row -->
     
        <div class="row">
          <div class="col-md-12 col-xs-12">
              <div id="notif"></div>
            <div class="card card-primary card-tabs">

              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><b><h4>Per Tanggal</h4></b></a>
                  </li>
                
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false"><b><h4>Per Bulan</h4></b></a>
                  </li>
                    <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages1" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false"><b><h4>Per Tahun</h4></b></a>
                  </li>
                
                </ul>
              </div>

              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <div class="box">


<!-- ------------------------------------------------------------------------------------------------------------------------
                                                          per Tanggal
----------------------------------------------------------------------------------------------------------------------- -->

<form method="post" id="SimpanData" name="formid">


            <div class="col-md-6 col-xs-12 pull pull-left" >


                    <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-5 control-label">Laporan</label>
                    <div class="col-sm-12">
                    <select class="form-control" required="" id="laporanTgl"  name="laporan" style="width:99%;"  value="<?php echo set_value('pic')?>">
                  <?php if(in_array('printQuotation', $user_permission)): ?>
                   <option value="quotations">Quotation</option>
                    <?php endif; ?>  

                    <?php if(in_array('printQuotationother', $user_permission)): ?>
                      <option value="quotation_other"> Quotation Other </option>
                  
                    <?php endif; ?>
                    <?php if(in_array('printBast', $user_permission)): ?>
                      <option value="bast">BAST</option>
                  
                    <?php endif; ?>  
                    <?php if(in_array('printFaktur', $user_permission)): ?>
                         <option value="faktur">Faktur</option>
                  
                    <?php endif; ?>
                     <?php if(in_array('printDelivery', $user_permission)): ?>
                        <option value="delivery">Delivery</option>
                  
                    <?php endif; ?>       
                     
                      
      
                    
                    
                 
                    
                   
                    
                    
                  </select>
                  </div>
                   
                   </div>
                            <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-5 control-label">Status</label>
                    <div class="col-sm-12">
                         <select class="form-control" required="" id="statusTgl"  name="status" style="width:99%;"  value="<?php echo set_value('pic')?>">
                        
                         <option value="All">All</option>
                        <option value="Open">Open</option>
                        <option value="Reject"> Reject </option>
                        <option value="Close">Close</option>
                    
                    
                  </select>
                  </div>
                   
                   </div>
                     

                    <div class="form-group" id="qnumber" >

                     <label for="pid_event"  style="text-align:left;" class="col-sm-5 control-label">Jenis Laporan</label>
                    <div class="col-sm-8">
                    <div class="radio">

                    <label>
                    <input required="" type="radio" name="jenis_laporanTgl" id="jenis_laporanTgl" value="detail" checked="checked">
                      Detail
                    </label>
                    <label>
                      <input required="" type="radio" name="jenis_laporanTgl" id="jenis_laporanTgl" value="total" >
                      Total
                    </label>
                  </div>
                       <?= form_error('gender','<small class="text-danger pl-3">','</small>')?>
                  </div>
                   
                   </div>
            
                         <div class="form-group">
                          <table style="width: 730px;">
                            <tr>
                              <th><br>Pilih Tanggal</th>
                               <td> &ensp;<input id="mulaiTgl" readonly="" oninput="isTGL()" onchange="isTGL();" name="mulaiTgl" placeholder="yyyy-mm-dd" required=""  type="text" cols="30" class="form-control" autocomplete="off" ></td>
                                <td>&ensp;<br>Sampai</td>
                                <td><br><input id="sampaiTgl" readonly=""  placeholder="yyyy-mm-dd" name="sampaiTgl" required=""  type="text" cols="30" class="form-control" autocomplete="off" ></td>
                            </tr>
                          </table>
                          </div>


                          <br>
                          <br>
        


                     <div class="form-group text-left">
                      <a  class="btn btn-success"  onclick="getDatatgl();"> <font color="white">Laporan</font></a>
                                       
                                     

                                  </div>

      
   

                   <br>
                   <br>
                  <br>
                  <br>
              
                </div>
              </form>
                    <div id="target"></div>                    


           
         

          </div>

                  
</div>



<!-- ------------------------------------------------------------------------------------------------------------------------
                                                          perBulan
----------------------------------------------------------------------------------------------------------------------- -->
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="rcustom-tabs-one-messages-tab">
                   <form  method="post" id="SimpanData" name="formid">


            <div class="col-md-6 col-xs-12 pull pull-left" >


                    <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-5 control-label">Laporan</label>
                    <div class="col-sm-12">
                    <select class="form-control" required="" id="laporanBln" name="laporanBln" style="width:99%;"  value="<?php echo set_value('laporan')?>">
                   
                    
                      <option value="quotations">Quotation</option>
                      <option value="quotation_other"> Quotation Other </option>
      
                    <option value="bast">BAST</option>
                    
                    <option value="faktur">Faktur</option>
                    
                    <option value="delivery">Delivery</option>
                    
                    
                  </select>
                  </div>
                   
                   </div>
                               <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-5 control-label">Status</label>
                    <div class="col-sm-12">
                         <select class="form-control" required="" id="statusBln"  name="status" style="width:99%;"  value="<?php echo set_value('pic')?>">
                       
                         <option value="All">All</option>
                        <option value="Open">Open</option>
                        <option value="Reject"> Reject </option>
                        <option value="Close">Close</option>
                    
                    
                  </select>
                  </div>
                   
                   </div>

                    <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-5 control-label">Laporan</label>
                    <div class="col-sm-8">
             <div class="radio">
                    <label>
                    <input required="" type="radio" name="jenis_laporanBln" id="jenis_laporanBln" value="detail" value="<?php echo set_value('jenis_laporan')?>" checked="checked">
                      Detail
                    </label>
                    <label>
                      <input required="" type="radio" name="jenis_laporanBln" id="jenis_laporanBln" value="total" value="<?php echo set_value('jenis_laporan')?>">
                      Total
                    </label>
                  </div>
                 
                  </div>
                   
                   </div>
            
                         <div class="form-group">
                          <table style="width: 750px;">
                            <tr>
                              <th><br>Pilih Bulan</th>
                               <td> &ensp;<input required=""  type="month" cols="30" class="form-control"  id="mulaiBln" name="mulaiBln" autocomplete="off" value="<?php echo set_value('bulans')?>"></td>
                                <td>&ensp;<br>Sampai</td>
                                <td><br><input required="" name="sampaiBln" id="sampaiBln"  type="month" cols="30" class="form-control" id="total_cashin_event"autocomplete="off" value="<?php echo set_value('bulanm')?>"></td>
                            </tr>
                          </table>
                   </div>


                    <div class="form-group text-left">
                                    
                                      <a  class="btn btn-success" name="tombol" value="excel"><font color="white" onclick="getDatabln()"> Laporan </font></a>
                                       
                                    

                                  </div>
   

                   <br>
                   <br>
                  <br>
                  <br>
              
                </div>
              </form>
                <div id="targetBln"></div>  
          
                  </div>

                    <div class="tab-pane fade" id="custom-tabs-one-messages1" role="tabpanel" aria-labelledby="rcustom-tabs-one-messages-tab">
                   <form  method="post" id="SimpanData" name="formid">


            <div class="col-md-6 col-xs-12 pull pull-left" >


                    <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-5 control-label">Laporan</label>
                    <div class="col-sm-12">
                    <select class="form-control" required="" id="laporanThn" name="laporanThn" style="width:99%;"  value="<?php echo set_value('pic')?>">
                   
                    
                      <option value="quotations">Quotation</option>
                      <option value="quotation_other"> Quotation Other </option>
      
                    <option value="bast">BAST</option>
                    
                    <option value="faktur">Faktur</option>
                    
                    <option value="delivery">Delivery</option>
                    
                    
                  </select>
                  </div>
                   
                   </div>

                               <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-5 control-label">Status</label>
                    <div class="col-sm-12">
                         <select class="form-control" required="" id="statusThn"  name="statusThn" style="width:99%;"  value="<?php echo set_value('pic')?>">
                       
                         <option value="All">All</option>
                        <option value="Open">Open</option>
                        <option value="Reject"> Reject </option>
                        <option value="Close">Close</option>
                    
                    
                  </select>
                  </div>
                   
                   </div>

                    <div class="form-group" id="qnumber">

                     <label for="pid_event"  style="text-align:left;" class="col-sm-5 control-label">Jenis Laporan</label>
                    <div class="col-sm-8">
             <div class="radio">
                    <label>
                    <input required="" type="radio" name="jenis_laporanThn" id="jenis_laporanThn" value="detail" checked="checked">
                      Detail
                    </label>
                    <label>
                      <input required="" type="radio" name="jenis_laporanThn" id="jenis_laporanThn" value="total">
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
                               <td> &ensp;<input required=""  id="mulaiThn" name="mulaiThn" type="Number" cols="30" class="form-control" autocomplete="off" ></td>
                                <td>&ensp;<br>Sampai</td>
                                <td><br><input required="" name="sampaiThn"  type="Number" cols="30" class="form-control" id="sampaiThn"autocomplete="off" ></td>
                            </tr>
                          </table>
                   </div>


                    <div class="form-group text-left">
                                      <a class="btn btn-success" onclick="getDataThn();"><font color="white"> Laporan</font></a>
                                       
                                   

                                  </div>

                   <br>
                   <br>
                  <br>
                  <br>
              
                </div>
              </form>
                <div id="targetThn"></div>  
              
            
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

  <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.semanticui.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

              


<script type="text/javascript">




function getDatatgl(){

  var laporan=$('#laporanTgl').val();
  if (laporan=="quotations"){
    getDataquotation("Tgl","aksi_laporan_tanggal","target","Per tanggal","tableTgl");

  }else if (laporan=="quotation_other"){
    getDataquotationother("Tgl","aksi_laporan_tanggal","target","per tanggal","tableTgl");

  }else if (laporan=="faktur"){
    getDatafaktur("Tgl","aksi_laporan_tanggal","target","per tanggal","tableTgl");

  }else if (laporan=="bast"){
    getDatabast("Tgl","aksi_laporan_tanggal","target" ,"per tanggal","tableTgl");

  }else if (laporan=="delivery"){
    getDatadelivery("Tgl","aksi_laporan_tanggal","target","per tanggal","tableTgl");


  }



}
function getDatabln(){

  var laporan=$('#laporanBln').val();
  if (laporan=="quotations"){
    getDataquotation("Bln","aksi_laporan_bulan","targetBln","per bulan","tableBln");

  }else if (laporan=="quotation_other"){
    getDataquotationother("Bln","aksi_laporan_bulan","targetBln","per bulan","tableBln");

  }else if (laporan=="faktur"){
    getDatafaktur("Bln","aksi_laporan_bulan","targetBln","per bulan","tableBln");

  }else if (laporan=="bast"){
    getDatabast("Bln","aksi_laporan_bulan","targetBln","per bulan","tableBln");

  }else if (laporan=="delivery"){
    getDatadelivery("Bln","aksi_laporan_bulan","targetBln","per bulan","tableBln");


  }



}
function getDataThn(){

  var laporan=$('#laporanThn').val();
  if (laporan=="quotations"){
    getDataquotation("Thn","aksi_laporan_tahun","targetThn","per tahun","tableThn");

  }else if (laporan=="quotation_other"){
    getDataquotationother("Thn","aksi_laporan_tahun","targetThn","per tahun","tableThn");

  }else if (laporan=="faktur"){
    getDatafaktur("Thn","aksi_laporan_tahun","targetThn","per tahun","tableThn");

  }else if (laporan=="bast"){
    getDatabast("Thn","aksi_laporan_tahun","targetThn","per tahun","tableThn");

  }else if (laporan=="delivery"){
    getDatadelivery("Thn","aksi_laporan_tahun","targetThn","per tahun","tableThn");


  }



}

function getDataquotation(id,aksi,target,type,table){
  var laporan=$('#laporan'+id).val();
  var status=$('#status'+id).val();
  var jenis_laporan=$('input[id="jenis_laporan'+id+'"]:checked').val();
  var mulai=$('#mulai'+id).val();
  var sampai=$('#sampai'+id).val();
  var title="Laporan "+jenis_laporan+" Quotation Event "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status;
 
      if (jenis_laporan=="total"){
         getdatatablequotationtotal(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai);
        var baris='';
             
                            baris+='<table id="'+table+'"  class="table table-bordered table-striped" style="width: 100%">'+
                            '<thead>'+
                            '<tr>'+
                            '<th>Quotation Number</th>'+
                            '<th>Date Quotation</th>'+
                            '<th>Date Expired</th>'+
                            '<th>PIC Event</th>'+
                            '<th>Email PIC Event</th>'+
                            '<th>Pic PO</th>'+
                            '<th>Email PIC PO</th>'+
                            '<th>Customer</th>'+
                            '<th>Title Event</th>'+
                            '<th>Venue Event</th>'+
                            '<th>Date Event</th>'+                
                            '<th>ASF</th>'+
                            '<th>Total Comissionable Cost</th>'+
                            '<th>Total Non-Fee Cost</th>'+
                            '<th>Total Summary</th>'+
                            '<th>PPh</th>'+
                            '<th>PPN</th>'+  
                            '<th>Grand Total</th>'+
                            '<th>Status</th>'+
                            '</tr>'+
                            '</thead>'+
                            '</table>';
                           document.getElementById(target).innerHTML = baris;

                         
                        
      
                        

                   
             

                                   }else{
                                     getdatatablequotationdetail(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai);
                                    var baris='';
                                    baris+='<table id="'+table+'"   class="table table-bordered table-striped" style="width: 100%">'+
                                    '<thead>'+ 
                                    '<tr>'+
                                    '<th>Quotation Number</th>'+
                                    '<th>Date Quotation</th>'+
                                    '<th>Date Expired</th>'+
                                    '<th>PIC Event</th>'+
                                    '<th>Email PIC Event</th>'+
                                    '<th>Pic PO</th>'+
                                    '<th>Email PIC PO</th>'+
                                    '<th>Customer</th>'+
                                    '<th>Title Event</th>'+
                                    '<th>Venue Event</th>'+
                                    '<th>Date Event</th>'+ 
                                    '<th>Item Name</th>'+
                                    '<th>Item Value</th>'+
                                    '<th>Quantity</th>'+
                                    '<th>Frequency</th>'+
                                    '<th>Rate</th>'+
                                    '<th>Sub Total</th>'+
                                    '<th>ASF</th>'+  
                                    '<th>Total Comissionable Cost</th>'+
                                    '<th>Total Non-Fee Cost</th>'+
                                     '<th>Total Summary</th>'+
                                    '<th>PPh</th>'+
                                    '<th>PPN</th>'+  
                                     '<th>Grand Total</th>'+
                                   
                                    '<th>Status</th>'+                 
                                            '</tr>'+
                                            '</thead>'+
                                            '</table>';
                          document.getElementById(target).innerHTML = baris;

                     
                                
                      
                      }
                  



}

function getDataquotationother(id,aksi,target,type,table){
  var laporan=$('#laporan'+id).val();
  var status=$('#status'+id).val();
  var jenis_laporan=$('input[id="jenis_laporan'+id+'"]:checked').val();
  var mulai=$('#mulai'+id).val();
  var sampai=$('#sampai'+id).val();
   var title="Laporan "+jenis_laporan+" Quotation Other "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status;
   var baris='';
         
              if (jenis_laporan=="total"){
                 getdatatablequotationothertotal(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai);
              
                      baris+='<table id="'+table+'"   class="table table-bordered table-striped" style="width: 100%">'+
                        '<thead>'+
                        '<tr>'+
                        '<th>Quotation Number</th>'+
                        '<th>Date Quotation</th>'+
                        '<th>Date Expired</th>'+
                        '<th>PIC Event</th>'+
                        '<th>Email</th>'+
                        '<th>PIC PO</th>'+
                        '<th>Email</th>'+
                         '<th>Customer</th>'+
                        '<th>Title Event</th>'+
                        '<th>Note</th>'+
                        '<th>ASF</th>'+
                        '<th>Netto</th>'+
                          '<th>Total</th>'+
                        '<th>PPh23</th>'+
                        '<th>PPN</th>'+
                        '<th>Grand Total</th>'+
                        '<th>Status</th>'+
                        '</tr>'+
              
                            '</thead>'+
                        
                        '</table>';
                           document.getElementById(target).innerHTML = baris;
                      
                          
                        }else{
                                             
                       baris+='<table id="'+table+'"   class="table table-bordered table-striped" style="width: 100%">'+
                          '<thead>'+ 
                          '<tr>'+
                                              '<th>Quotation Number</th>'+
                                              '<th>Date Quotation</th>'+
                                              '<th>Date Expired</th>'+
                                              '<th>PIC Event</th>'+
                                              '<th>Email</th>'+
                                              '<th>PIC PO</th>'+
                                              '<th>Email</th>'+
                                              '<th>Customer</th>'+
                                              '<th>Title Event</th>'+
                                              '<th>Note</th>'+
                                              '<th>Dekripsi</th>'+
                                              '<th>Frequency</th>'+
                                              '<th>Unit Price</th>'+
                                              '<th>Amount</th>'+
                                              '<th>ASF</th>'+
                                              '<th>Netto</th>'+
                                                '<th>Total</th>'+
                                              '<th>PPh23</th>'+
                                              '<th>PPN</th>'+
                                              '<th>Grand Total</th>'+
                                              '<th>Status</th>'+
                                              '</tr>'
                                              '</thead>'+
                                              '</table>';
                          document.getElementById(target).innerHTML = baris;
                           getdatatablequotationotherdetail(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai);
                           
                      
                      }
                         
}


function getDatafaktur(id,aksi,target,type,table){
  var laporan=$('#laporan'+id).val();
  var status=$('#status'+id).val();
  var jenis_laporan=$('input[id="jenis_laporan'+id+'"]:checked').val();
  var mulai=$('#mulai'+id).val();
  var sampai=$('#sampai'+id).val();
   var title="Laporan "+jenis_laporan+" Faktur "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status;
                if (jenis_laporan=="total"){
                  var baris='';
                      baris+='<table id="'+table+'"   class="table table-bordered table-striped" style="width: 100%">'+
                        '<thead>'+

                          '<tr>'+
                          '<th>Quotation Number</th>'+
                          '<th>Faktur Number</th>'+
                          '<th>Seri faktur </th>'+
                          '<th>REF</th>'+
                          '<th>Date Faktur</th>'+
                          '<th>Syarat Pembayaran</th>'+
                          '<th>Sub Total</th>'+
                          '<th>Diskon</th>'+
                          '<th>PPN</th>'+
                          '<th>PPh23</th>'+
                          '<th>Total Faktur</th>'+
                          '<th>Status</th>'+
                          '</tr>'+
                          '</thead>'+
                        '</table>';
                           document.getElementById(target).innerHTML = baris;
                             getdatatablefakturtotal(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai);
                        

                                   }else{
                                    var baris='';
                                            

                                          baris+='<table id="'+table+'"   class="table table-bordered table-striped" style="width: 100%">'+
                                            '<thead>'+ 
                                            '<tr>'+
                                                '<th>Quotation Number</th>'+
                                                '<th>Faktur Number</th>'+
                                                '<th>Date Faktur</th>'+

                                                '<th>Seri faktur </th>'+
                                                 '<th>REF</th>'+
                                                 '<th>Syarat Pembayaran</th>'+
                                                '<th>Barang</th>'+
                                                '<th>Deskripsi barang</th>'+
                                                '<th>Keterangan</th>'+
                                                '<th>KTS</th>'+
                                                '<th>Harga Satuan</th>'+
                                                '<th>Amount</th>'+
                                                

                                                '<th>Total Sub</th>'+
                                                 '<th>Diskon</th>'+
                            
                                                '<th>PPN</th>'+
                                                '<th>PPh23</th>'+
                                                '<th>Total Faktur</th>'+
                                                '<th>Status</th>'+

                                            '</tr>'+
                                            '</thead>'+
                                          
                                          '</table>';
                          document.getElementById(target).innerHTML = baris;
                           getdatatablefakturdetail(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai);
                                  
                      }
                          


}

function getDatadelivery(id,aksi,target,type,table){
  var laporan=$('#laporan'+id).val();
  var status=$('#status'+id).val();
  var jenis_laporan=$('input[id="jenis_laporan'+id+'"]:checked').val();
  var mulai=$('#mulai'+id).val();
  var sampai=$('#sampai'+id).val();
    var title="Laporan "+jenis_laporan+" Delivery "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status;


            var baris='';
         
              if (jenis_laporan=="total"){
                 var baris='';
                  baris+='<table id="'+table+'"   class="table table-bordered table-striped" style="width: 100%">'+
                   '<thead>'+
                    '<tr>'+
                    '<th>Quotation Number</th>'+
                    '<th>Delivery Number</th>'+
                    '<th>tanggal Pengiriman</th>'+
                    '<th>Gudang</th>'+
                    '<th>Tagihan</th>'+
                    '<th>Kirim</th>'+
                    '<th>Status</th>'+
                    '</tr>'+
                     '</thead>'+       
                     '</table>';
                        document.getElementById(target).innerHTML = baris;
                            getdatatabledeliverytotal(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai);
                                  
                      
                        }else{
                        var baris='';
                                            

                                          baris+='<table id="'+table+'"   class="table table-bordered table-striped" style="width: 100%">'+
                                            '<thead>'+
                           
                                            '<tr>'+
                                              '<th>Quotation Number</th>'+
                                              '<th>Delivery Number</th>'+
                                              '<th>tanggal Pengiriman</th>'+
                                              '<th>Gudang</th>'+
                                              '<th>Tagihan</th>'+
                                                '<th>Kirim</th>'+
                                              '<th>Barang</th>'+
                                              '<th>Deskripsi Barang</th>'+
                                               '<th>Keterangan</th>'+
                                               '<th>KTS</th>'+
                                               '<th>Satuan</th>'+
                                                '<th>Status</th>'+ 
                                            '</tr>'+
                                            '</thead>'+
                                           
                          '</table>';
                          document.getElementById(target).innerHTML = baris;
                              getdatatabledeliverydetail(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai);
                                  
                      
                            
                     

                                
                      
                      }
 

}

function getDatabast(id,aksi,target,type,table){
  var laporan=$('#laporan'+id).val();
  var status=$('#status'+id).val();
  var jenis_laporan=$('input[id="jenis_laporan'+id+'"]:checked').val();
  var mulai=$('#mulai'+id).val();
  var sampai=$('#sampai'+id).val();
    var title="Laporan  BAST "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status;
  var baris="";

                      baris+='<table id="'+table+'"   class="table table-bordered table-striped" style="width: 100%">'+
                        '<thead>'+
                        '<tr>'+
                        '<th>Quotation Number</th>'+
                        '<th>BAST Number</th>'+
                        '<th>GR Number</th>'+
                        '<th>PO Number</th>'+
                        '<th>Date Bast</th>'+
                        '<th>Date PO</th>'+
                        '<th>PIC Event</th>'+
                        '<th>Jabatan PIC Event</th>'+
                        '<th>PIC Magenta</th>'+
                        '<th>Jabatan Magenta</th>'+
                        '<th>Status</th>'+
                        '</tr>'+
                        '</thead>'+  
                         '</table>';
                          document.getElementById(target).innerHTML = baris;
                          getdatatablebast(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai);
                          
  
}


function getdatatablequotationtotal(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai){
 $(document).ready(function() {
    $('#'+table).DataTable( {
       "scrollX": true,
       'searching':false,

          "ajax":{  
                 url:'<?php echo base_url()?>Laporan/'+aksi,
                data:{laporan:laporan,jenis_laporan:jenis_laporan,status:status,mulai:mulai,sampai:sampai},
                dataType:'json',
                type:"POST"        
           },
       columns: [
            { 'data': 'quotation_number' },
            { 'data': 'date_quotation' },
            { 'data': 'date_expired' },
            { 'data': 'pic_event' },
            { 'data': 'email_event' },
            { 'data': 'pic_name' },
            { 'data': 'pic_email' },
            { 'data': 'customer' },
            { 'data': 'tittle_event' },
            { 'data': 'venue_event' },
           { 'data': 'date_event' },
            { 'data': 'asf',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } } ,
            { 'data': 'comissionable_cost',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'nonfee',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
             { 'data': 'total_summary',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'pph',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace(/[^\w\s]/gi, '') :
                    data;
            } },
            { 'data': 'ppn',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace(/[^\w\s]/gi, '') :
                    data;
            } },
            { 'data': 'grand_total',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'status' }         
        ], 
        
        dom: 'Bfrtip',
        buttons: [
            // {
            //     extend: 'print',
            //     autoFilter: true,
            //       title:''+title,
               
            //       customize: function ( win ) {
            //         $(win.document.body)
            //             .css( 'font-size', '10pt' )
            //             .prepend(
            //                 '<img src="<?php echo base_url('images/logo.png') ?>" style="position:absolute; top:0; left:0;" />'
            //             );
 
            //         $(win.document.body).find( 'table' )
            //             .addClass( 'compact' )
            //             .css( 'font-size', 'inherit' );
            //     }

            // },
              {

                extend: 'excelHtml5',
               
                autoFilter: true,
                exportOptions: {
                columns: ':visible',
                orthogonal: 'export'
                },customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // Loop over the cells in column `C`
                var nomor=1;
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    nomor=nomor+1;
                  $('row c[r*="'+nomor+'"]', sheet).attr( 's', '25' );
                   
                   
                });
            }

            },
            {

                extend: 'pdfHtml5',
                download:'open',
                messageTop:''+title+'',
                title:''+title,       
                filename: 'custom PDF',
                orientation: 'landscape', //portrait
                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                exportOptions: {
                columns: ':visible',
                search: 'applied',
                order: 'applied'
              },
                customize: function (doc) {
                //Remove the title created by datatTables
                  doc.content.splice(0,1);
            
                var now = new Date();
                var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

         
               doc.pageMargins = [20,60,20,30];
           
                doc.defaultStyle.fontSize = 7;
            
                doc.styles.tableHeader.fontSize = 7;
          
                  doc['header']=(function() {
                    return {
                    columns: [
                
                  {
                    alignment: 'left',
                    italics: true,
                    text: "Magenta EO",
                    fontSize: 18,
                    margin: [10,0]
                  },
                  // {
                  //   alignment: 'right',
                  //   fontSize: 14,
                  //   text: 'Custom PDF export with dataTables'
                  // }
                ],
                margin: 20
              }
            });
            // Create a footer object with 2 columns
            // Left side: report creation date
            // Right side: current page and total pages
            doc['footer']=(function(page, pages) {
              return {
                columns: [
                  {
                    alignment: 'left',
                    text: ['Created on: ', { text: jsDate.toString() }]
                  },
                  {
                    alignment: 'right',
                    text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                  }
                ],
                margin: 20
              }
            });
            // Change dataTable layout (Table styling)
            // To use predefined layouts uncomment the line below and comment the custom lines below
           
            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
            var objLayout = {};
            objLayout['hLineWidth'] = function(i) { return .5; };
            objLayout['vLineWidth'] = function(i) { return .5; };
            objLayout['hLineColor'] = function(i) { return '#aaa'; };
            objLayout['vLineColor'] = function(i) { return '#aaa'; };
            objLayout['paddingLeft'] = function(i) { return 4; };
            objLayout['paddingRight'] = function(i) { return 4; };
            doc.content[0].layout = objLayout;
        },
                
                 // messageTop: ''+title+'',
                 
                
            },
              {
              extend: 'colvis',
            columnText: function ( dt, idx, title ) {
                return '<p style="text-align:left;">'+(idx+1)+': '+title+'</p>';
            }
            }
        ]
    } );

} );

}

function getdatatablequotationdetail(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai){
 $(document).ready(function() {
    $('#'+table).DataTable( {
       "scrollX": true,
       'searching':false,
          "ajax":{  
            url:'<?php echo base_url()?>Laporan/'+aksi,
            data:{laporan:laporan,jenis_laporan:jenis_laporan,status:status,mulai:mulai,sampai:sampai},
            dataType:'json',
            type:"POST"
           },
            columns: [
            { 'data': 'quotation_number' },
            { 'data': 'date_quotation' },
            { 'data': 'date_expired' },
            { 'data': 'pic_event' },
            { 'data': 'email_event' },
            { 'data': 'pic_name' },
            { 'data': 'pic_email' },
            { 'data': 'customer' },
            { 'data': 'tittle_event' },
            { 'data': 'venue_event' },
            { 'data': 'date_event' },
            { 'data': 'name_item' },
            { 'data': 'item_value' },
            { 'data': 'quantity' },
            { 'data': 'frrequency' },
            { 'data': 'rate',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'subtotal',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'asf',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } } ,
            { 'data': 'comissionable_cost',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'nonfee',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'total_summary',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'pph',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace(/[^\w\s]/gi, ''):
                    data;
            } },
            { 'data': 'ppn',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'grand_total',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'status' }         
        ], 
        
        dom: 'Bfrtip',
        buttons: [
            // {
            //     extend: 'print',
            //     autoFilter: true,
            //       title:''+title,
               
            //       customize: function ( win ) {
            //         $(win.document.body)
            //             .css( 'font-size', '10pt' )
            //             .prepend(
            //                 '<img src="<?php echo base_url('images/logo.png') ?>" style="position:absolute; top:0; left:0;" />'
            //             );
 
            //         $(win.document.body).find( 'table' )
            //             .addClass( 'compact' )
            //             .css( 'font-size', 'inherit' );
            //     }

            // },
              {

                extend: 'excelHtml5',
                title:''+title,
                autoFilter: true,
                exportOptions: {
                columns: ':visible',
                orthogonal: 'export'
                },customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // Loop over the cells in column `C`
                var nomor=1;
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    nomor=nomor+1;
                  $('row c[r*="'+nomor+'"]', sheet).attr( 's', '25' );
                   
                   
                });
            }

            },
           {

                extend: 'pdfHtml5',
                download:'open',
                messageTop:''+title+'',
                title:''+title,       
                filename: 'custom PDF',
                orientation: 'landscape', //portrait
                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                exportOptions: {
                columns: ':visible',
                search: 'applied',
                order: 'applied'
              },
                customize: function (doc) {
                //Remove the title created by datatTables
                  doc.content.splice(0,1);
            
                var now = new Date();
                var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

         
               doc.pageMargins = [20,60,20,30];
           
                doc.defaultStyle.fontSize = 7;
            
                doc.styles.tableHeader.fontSize = 7;
          
                  doc['header']=(function() {
                    return {
                    columns: [
                
                  {
                    alignment: 'left',
                    italics: true,
                    text: "Magenta EO",
                    fontSize: 18,
                    margin: [10,0]
                  },
                  // {
                  //   alignment: 'right',
                  //   fontSize: 14,
                  //   text: 'Custom PDF export with dataTables'
                  // }
                ],
                margin: 20
              }
            });
            // Create a footer object with 2 columns
            // Left side: report creation date
            // Right side: current page and total pages
            doc['footer']=(function(page, pages) {
              return {
                columns: [
                  {
                    alignment: 'left',
                    text: ['Created on: ', { text: jsDate.toString() }]
                  },
                  {
                    alignment: 'right',
                    text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                  }
                ],
                margin: 20
              }
            });
            // Change dataTable layout (Table styling)
            // To use predefined layouts uncomment the line below and comment the custom lines below
            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
            var objLayout = {};
            objLayout['hLineWidth'] = function(i) { return .5; };
            objLayout['vLineWidth'] = function(i) { return .5; };
            objLayout['hLineColor'] = function(i) { return '#aaa'; };
            objLayout['vLineColor'] = function(i) { return '#aaa'; };
            objLayout['paddingLeft'] = function(i) { return 4; };
            objLayout['paddingRight'] = function(i) { return 4; };
            doc.content[0].layout = objLayout;
        },
                
                 // messageTop: ''+title+'',
                 
                
            },
              {
              extend: 'colvis',
            columnText: function ( dt, idx, title ) {
                return '<p style="text-align:left;">'+(idx+1)+': '+title+'</p>';
            }
            }
        ]
    } );

} );

}

function getdatatablequotationothertotal(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai){
 $(document).ready(function() {
    $('#'+table).DataTable( {
       "scrollX": true,
       'searching':false,

          "ajax":{  
                 url:'<?php echo base_url()?>Laporan/'+aksi,
                data:{laporan:laporan,jenis_laporan:jenis_laporan,status:status,mulai:mulai,sampai:sampai},
                dataType:'json',
                type:"POST"        
           },
              
            columns: [
            { 'data': 'quotation_number' },
            { 'data': 'date_quotation' },
            { 'data': 'date_expired' },
            { 'data': 'pic_event' },
            { 'data': 'email_event' },
            { 'data': 'pic_name' },
            { 'data': 'pic_email' },
            { 'data': 'customer' },
            { 'data': 'tittle_event' },
            { 'data': 'note' },
           
            { 'data': 'asf',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } } ,
            { 'data': 'netto' ,render: function (data, type, row) {
                return type === 'export' ?
                    data.replace(/[^\w\s]/gi, '') :
                    data;
            } },
           
            { 'data': 'pph23',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace(/[^\w\s]/gi, '') :
                    data;
            } },
             { 'data': 'total',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'ppn',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'grand_total',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'status' }         
        ], 
        
        
        dom: 'Bfrtip',
        buttons: [
            // {
            //     extend: 'print',
            //     autoFilter: true,
            //       title:''+title,
               
            //       customize: function ( win ) {
            //         $(win.document.body)
            //             .css( 'font-size', '10pt' )
            //             .prepend(
            //                 '<img src="<?php echo base_url('images/logo.png') ?>" style="position:absolute; top:0; left:0;" />'
            //             );
 
            //         $(win.document.body).find( 'table' )
            //             .addClass( 'compact' )
            //             .css( 'font-size', 'inherit' );
            //     }

            // },
              {

                extend: 'excelHtml5',
                title:''+title,
                autoFilter: true,
                exportOptions: {
                columns: ':visible',
                orthogonal: 'export'
                },customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // Loop over the cells in column `C`
                var nomor=1;
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    nomor=nomor+1;
                  $('row c[r*="'+nomor+'"]', sheet).attr( 's', '25' );
                   
                   
                });
            }

            },
           {

                extend: 'pdfHtml5',
                download:'open',
                messageTop:''+title+'',
                title:''+title,       
                filename: 'custom PDF',
                orientation: 'landscape', //portrait
                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                exportOptions: {
                columns: ':visible',
                search: 'applied',
                order: 'applied'
              },
                customize: function (doc) {
                //Remove the title created by datatTables
                  doc.content.splice(0,1);
            
                var now = new Date();
                var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

         
               doc.pageMargins = [20,60,20,30];
           
                doc.defaultStyle.fontSize = 7;
            
                doc.styles.tableHeader.fontSize = 7;
          
                  doc['header']=(function() {
                    return {
                    columns: [
                
                  {
                    alignment: 'left',
                    italics: true,
                    text: "Magenta EO",
                    fontSize: 18,
                    margin: [10,0]
                  },
                  // {
                  //   alignment: 'right',
                  //   fontSize: 14,
                  //   text: 'Custom PDF export with dataTables'
                  // }
                ],
                margin: 20
              }
            });
            // Create a footer object with 2 columns
            // Left side: report creation date
            // Right side: current page and total pages
            doc['footer']=(function(page, pages) {
              return {
                columns: [
                  {
                    alignment: 'left',
                    text: ['Created on: ', { text: jsDate.toString() }]
                  },
                  {
                    alignment: 'right',
                    text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                  }
                ],
                margin: 20
              }
            });
            // Change dataTable layout (Table styling)
            // To use predefined layouts uncomment the line below and comment the custom lines below
            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
            var objLayout = {};
            objLayout['hLineWidth'] = function(i) { return .5; };
            objLayout['vLineWidth'] = function(i) { return .5; };
            objLayout['hLineColor'] = function(i) { return '#aaa'; };
            objLayout['vLineColor'] = function(i) { return '#aaa'; };
            objLayout['paddingLeft'] = function(i) { return 4; };
            objLayout['paddingRight'] = function(i) { return 4; };
            doc.content[0].layout = objLayout;
        },
                
                 // messageTop: ''+title+'',
                 
                
            },
              {
              extend: 'colvis',
            columnText: function ( dt, idx, title ) {
                return '<p style="text-align:left;">'+(idx+1)+': '+title+'</p>';
            }
            }
        ]
    } );

} );

}

function getdatatablequotationotherdetail(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai){
 $(document).ready(function() {
    $('#'+table).DataTable( {
       "scrollX": true,
       'searching':false,

          "ajax":{  
                 url:'<?php echo base_url()?>Laporan/'+aksi,
                data:{laporan:laporan,jenis_laporan:jenis_laporan,status:status,mulai:mulai,sampai:sampai},
                dataType:'json',
                type:"POST"        
           },

            columns: [
            { 'data': 'quotation_number' },
            { 'data': 'date_quotation' },
            { 'data': 'date_expired' },
            { 'data': 'pic_event' },
            { 'data': 'email_event' },
            { 'data': 'pic_name' },
            { 'data': 'pic_email' },
            { 'data': 'customer' },
            { 'data': 'tittle_event' },
            { 'data': 'note' },

            { 'data': 'desciption' },
            { 'data': 'frequency',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'unitprice',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'amount',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },

           
            { 'data': 'asf',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } } ,
            { 'data': 'netto' ,render: function (data, type, row) {
                return type === 'export' ?
                    data.replace(/[^\w\s]/gi, '') :

                    data;
            } },
               { 'data': 'total',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
           
            { 'data': 'pph23',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace(/[^\w\s]/gi, '') :
                    data;
            } },
            { 'data': 'ppn',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'grand_total',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'status' }         
        ], 
        
        dom: 'Bfrtip',
        buttons: [
            // {
            //     extend: 'print',
            //     autoFilter: true,
            //       title:''+title,
               
            //       customize: function ( win ) {
            //         $(win.document.body)
            //             .css( 'font-size', '10pt' )
            //             .prepend(
            //                 '<img src="<?php echo base_url('images/logo.png') ?>" style="position:absolute; top:0; left:0;" />'
            //             );
 
            //         $(win.document.body).find( 'table' )
            //             .addClass( 'compact' )
            //             .css( 'font-size', 'inherit' );
            //     }

            // },
              {

                extend: 'excelHtml5',
                title:''+title,
                autoFilter: true,
                exportOptions: {
                columns: ':visible',
                orthogonal: 'export'
                },customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // Loop over the cells in column `C`
                var nomor=1;
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    nomor=nomor+1;
                  $('row c[r*="'+nomor+'"]', sheet).attr( 's', '25' );
                   
                   
                });
            }

            },
           {

                extend: 'pdfHtml5',
                download:'open',
                messageTop:''+title+'',
                title:''+title,       
                filename: 'custom PDF',
                orientation: 'landscape', //portrait
                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                exportOptions: {
                columns: ':visible',
                search: 'applied',
                order: 'applied'
              },
                customize: function (doc) {
                //Remove the title created by datatTables
                  doc.content.splice(0,1);
            
                var now = new Date();
                var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

         
               doc.pageMargins = [20,60,20,30];
           
                doc.defaultStyle.fontSize = 7;
            
                doc.styles.tableHeader.fontSize = 7;
          
                  doc['header']=(function() {
                    return {
                    columns: [
                
                  {
                    alignment: 'left',
                    italics: true,
                    text: "Magenta EO",
                    fontSize: 18,
                    margin: [10,0]
                  },
                  // {
                  //   alignment: 'right',
                  //   fontSize: 14,
                  //   text: 'Custom PDF export with dataTables'
                  // }
                ],
                margin: 20
              }
            });
            // Create a footer object with 2 columns
            // Left side: report creation date
            // Right side: current page and total pages
            doc['footer']=(function(page, pages) {
              return {
                columns: [
                  {
                    alignment: 'left',
                    text: ['Created on: ', { text: jsDate.toString() }]
                  },
                  {
                    alignment: 'right',
                    text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                  }
                ],
                margin: 20
              }
            });
            // Change dataTable layout (Table styling)
            // To use predefined layouts uncomment the line below and comment the custom lines below
            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
            var objLayout = {};
            objLayout['hLineWidth'] = function(i) { return .5; };
            objLayout['vLineWidth'] = function(i) { return .5; };
            objLayout['hLineColor'] = function(i) { return '#aaa'; };
            objLayout['vLineColor'] = function(i) { return '#aaa'; };
            objLayout['paddingLeft'] = function(i) { return 4; };
            objLayout['paddingRight'] = function(i) { return 4; };
            doc.content[0].layout = objLayout;
        },
                
                 // messageTop: ''+title+'',
                 
                
            },
              {
              extend: 'colvis',
            columnText: function ( dt, idx, title ) {
                return '<p style="text-align:left;">'+(idx+1)+': '+title+'</p>';
            }
            }
        ]
    } );

} );

}

function getdatatablebast(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai){
 $(document).ready(function() {
    $('#'+table).DataTable( {
       "scrollX": true,
       'searching':false,

          "ajax":{  
                 url:'<?php echo base_url()?>Laporan/'+aksi,
                data:{laporan:laporan,jenis_laporan:jenis_laporan,status:status,mulai:mulai,sampai:sampai},
                dataType:'json',
                type:"POST"        
           },
                
            columns: [
            { 'data': 'quotation_number' },
            { 'data': 'bast_number' },
            { 'data': 'gr_number' },
            { 'data': 'po_number' },
            { 'data': 'date_bast' },
            { 'data': 'date_po' },
            { 'data': 'pic_po' },
            { 'data': 'jabatan' },
            { 'data': 'pic_magenta' },
            { 'data': 'jabatan_magenta' },
            { 'data': 'status' }         
        ], 
        
        dom: 'Bfrtip',
        buttons: [
            // {
            //     extend: 'print',
            //     autoFilter: true,
            //       title:''+title,
               
            //       customize: function ( win ) {
            //         $(win.document.body)
            //             .css( 'font-size', '10pt' )
            //             .prepend(
            //                 '<img src="<?php echo base_url('images/logo.png') ?>" style="position:absolute; top:0; left:0;" />'
            //             );
 
            //         $(win.document.body).find( 'table' )
            //             .addClass( 'compact' )
            //             .css( 'font-size', 'inherit' );
            //     }

            // },
              {

                extend: 'excelHtml5',
                title:''+title,
                autoFilter: true,
                exportOptions: {
                columns: ':visible',
                orthogonal: 'export'
                },customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // Loop over the cells in column `C`
                var nomor=1;
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    nomor=nomor+1;
                  $('row c[r*="'+nomor+'"]', sheet).attr( 's', '25' );
                   
                   
                });
            }

            },
         {

                extend: 'pdfHtml5',
                download:'open',
                messageTop:''+title+'',
                title:''+title,       
                filename: 'custom PDF',
                orientation: 'landscape', //portrait
                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                exportOptions: {
                columns: ':visible',
                search: 'applied',
                order: 'applied'
              },
                customize: function (doc) {
                //Remove the title created by datatTables
                  doc.content.splice(0,1);
            
                var now = new Date();
                var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

         
               doc.pageMargins = [20,60,20,30];
           
                doc.defaultStyle.fontSize = 7;
            
                doc.styles.tableHeader.fontSize = 7;
          
                  doc['header']=(function() {
                    return {
                    columns: [
                
                  {
                    alignment: 'left',
                    italics: true,
                    text: "Magenta EO",
                    fontSize: 18,
                    margin: [10,0]
                  },
                  // {
                  //   alignment: 'right',
                  //   fontSize: 14,
                  //   text: 'Custom PDF export with dataTables'
                  // }
                ],
                margin: 20
              }
            });
            // Create a footer object with 2 columns
            // Left side: report creation date
            // Right side: current page and total pages
            doc['footer']=(function(page, pages) {
              return {
                columns: [
                  {
                    alignment: 'left',
                    text: ['Created on: ', { text: jsDate.toString() }]
                  },
                  {
                    alignment: 'right',
                    text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                  }
                ],
                margin: 20
              }
            });
            // Change dataTable layout (Table styling)
            // To use predefined layouts uncomment the line below and comment the custom lines below
            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
            var objLayout = {};
            objLayout['hLineWidth'] = function(i) { return .5; };
            objLayout['vLineWidth'] = function(i) { return .5; };
            objLayout['hLineColor'] = function(i) { return '#aaa'; };
            objLayout['vLineColor'] = function(i) { return '#aaa'; };
            objLayout['paddingLeft'] = function(i) { return 4; };
            objLayout['paddingRight'] = function(i) { return 4; };
            doc.content[0].layout = objLayout;
        },
                
                 // messageTop: ''+title+'',
                 
                
            },
              {
              extend: 'colvis',
            columnText: function ( dt, idx, title ) {
                return '<p style="text-align:left;">'+(idx+1)+': '+title+'</p>';
            }
            }
        ]
    } );

} );

}



function getdatatablefakturtotal(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai){
 $(document).ready(function() {
    $('#'+table).DataTable( {
       "scrollX": true,
       'searching':false,

          "ajax":{  
                 url:'<?php echo base_url()?>Laporan/'+aksi,
                data:{laporan:laporan,jenis_laporan:jenis_laporan,status:status,mulai:mulai,sampai:sampai},
                dataType:'json',
                type:"POST"        
           },
          
              
            columns: [
            { 'data': 'quotation_number' },
            { 'data': 'faktur_number' },
            { 'data': 'ser_faktur' },
            { 'data': 'REF' },
            { 'data': 'date_faktur' },
            { 'data': 'syarat_pembayaran' },
            { 'data': 'total_sub',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'diskon_harga' ,render: function (data, type, row) {
                return type === 'export' ?
                    data.replace(/[^\w\s]/gi, '')  :
                    data;
            } },
            { 'data': 'ppn',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'pph23' ,render: function (data, type, row) {
                return type === 'export' ?
                    data.replace(/[^\w\s]/gi, '')  :
                    data;
            }},
            { 'data': 'total_faktur' ,render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            }},
           
            { 'data': 'status' }         
        ], 
        
        dom: 'Bfrtip',
        buttons: [
            // {
            //     extend: 'print',
            //     autoFilter: true,
            //       title:''+title,
               
            //       customize: function ( win ) {
            //         $(win.document.body)
            //             .css( 'font-size', '10pt' )
            //             .prepend(
            //                 '<img src="<?php echo base_url('images/logo.png') ?>" style="position:absolute; top:0; left:0;" />'
            //             );
 
            //         $(win.document.body).find( 'table' )
            //             .addClass( 'compact' )
            //             .css( 'font-size', 'inherit' );
            //     }

            // },
              {

                extend: 'excelHtml5',
                title:''+title,
                autoFilter: true,
                exportOptions: {
                columns: ':visible',
                orthogonal: 'export'
                },customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // Loop over the cells in column `C`
                var nomor=1;
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    nomor=nomor+1;
                  $('row c[r*="'+nomor+'"]', sheet).attr( 's', '25' );
                   
                   
                });
            }

            },
        {

                extend: 'pdfHtml5',
                download:'open',
                messageTop:''+title+'',
                title:''+title,       
                filename: 'custom PDF',
                orientation: 'landscape', //portrait
                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                exportOptions: {
                columns: ':visible',
                search: 'applied',
                order: 'applied'
              },
                customize: function (doc) {
                //Remove the title created by datatTables
                  doc.content.splice(0,1);
            
                var now = new Date();
                var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

         
               doc.pageMargins = [20,60,20,30];
           
                doc.defaultStyle.fontSize = 7;
            
                doc.styles.tableHeader.fontSize = 7;
          
                  doc['header']=(function() {
                    return {
                    columns: [
                
                  {
                    alignment: 'left',
                    italics: true,
                    text: "Magenta EO",
                    fontSize: 18,
                    margin: [10,0]
                  },
                  // {
                  //   alignment: 'right',
                  //   fontSize: 14,
                  //   text: 'Custom PDF export with dataTables'
                  // }
                ],
                margin: 20
              }
            });
            // Create a footer object with 2 columns
            // Left side: report creation date
            // Right side: current page and total pages
            doc['footer']=(function(page, pages) {
              return {
                columns: [
                  {
                    alignment: 'left',
                    text: ['Created on: ', { text: jsDate.toString() }]
                  },
                  {
                    alignment: 'right',
                    text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                  }
                ],
                margin: 20
              }
            });
            // Change dataTable layout (Table styling)
            // To use predefined layouts uncomment the line below and comment the custom lines below
            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
            var objLayout = {};
            objLayout['hLineWidth'] = function(i) { return .5; };
            objLayout['vLineWidth'] = function(i) { return .5; };
            objLayout['hLineColor'] = function(i) { return '#aaa'; };
            objLayout['vLineColor'] = function(i) { return '#aaa'; };
            objLayout['paddingLeft'] = function(i) { return 4; };
            objLayout['paddingRight'] = function(i) { return 4; };
            doc.content[0].layout = objLayout;
        },
                
                 // messageTop: ''+title+'',
                 
                
            },
              {
              extend: 'colvis',
            columnText: function ( dt, idx, title ) {
                return '<p style="text-align:left;">'+(idx+1)+': '+title+'</p>';
            }
            }
        ]
    } );

} );

}
function getdatatablefakturdetail(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai){
 $(document).ready(function() {
    $('#'+table).DataTable( {
       "scrollX": true,
       'searching':false,

          "ajax":{  
                 url:'<?php echo base_url()?>Laporan/'+aksi,
                data:{laporan:laporan,jenis_laporan:jenis_laporan,status:status,mulai:mulai,sampai:sampai},
                dataType:'json',
                type:"POST"        
           },
                   
            columns: [
            { 'data': 'quotation_number' },
            { 'data': 'faktur_number' },
            { 'data': 'date_faktur' },
            { 'data': 'ser_faktur' },
            { 'data': 'REF' },          
            { 'data': 'syarat_pembayaran' },
            { 'data': 'barang' },
            { 'data': 'deskripsi_barang' },
            { 'data': 'keterangan' },
            { 'data': 'kts' },
            { 'data': 'harga_satuan' },
            { 'data': 'amount' },
            { 'data': 'total_sub',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'diskon_harga' ,render: function (data, type, row) {
                return type === 'export' ?
                    data.replace(/[^\w\s]/gi, '')  :
                    data;
            } },
            { 'data': 'ppn',render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            } },
            { 'data': 'pph23' ,render: function (data, type, row) {
                return type === 'export' ?
                    data.replace(/[^\w\s]/gi, '')  :
                    data;
            }},
            { 'data': 'total_faktur' ,render: function (data, type, row) {
                return type === 'export' ?
                    data.replace( /[.]/g, '' ) :
                    data;
            }},
           
            { 'data': 'status' }         
        ], 
        
        dom: 'Bfrtip',
        buttons: [
            // {
            //     extend: 'print',
            //     autoFilter: true,
            //       title:''+title,
               
            //       customize: function ( win ) {
            //         $(win.document.body)
            //             .css( 'font-size', '10pt' )
            //             .prepend(
            //                 '<img src="<?php echo base_url('images/logo.png') ?>" style="position:absolute; top:0; left:0;" />'
            //             );
 
            //         $(win.document.body).find( 'table' )
            //             .addClass( 'compact' )
            //             .css( 'font-size', 'inherit' );
            //     }

            // },
              {

                extend: 'excelHtml5',
                title:''+title,
                autoFilter: true,
                exportOptions: {
                columns: ':visible',
                orthogonal: 'export'
                },customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // Loop over the cells in column `C`
                var nomor=1;
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    nomor=nomor+1;
                  $('row c[r*="'+nomor+'"]', sheet).attr( 's', '25' );
                   
                   
                });
            }

            },
       {

                extend: 'pdfHtml5',
                download:'open',
                messageTop:''+title+'',
                title:''+title,       
                filename: 'custom PDF',
                orientation: 'landscape', //portrait
                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                exportOptions: {
                columns: ':visible',
                search: 'applied',
                order: 'applied'
              },
                customize: function (doc) {
                //Remove the title created by datatTables
                  doc.content.splice(0,1);
            
                var now = new Date();
                var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

         
               doc.pageMargins = [20,60,20,30];
           
                doc.defaultStyle.fontSize = 7;
            
                doc.styles.tableHeader.fontSize = 7;
          
                  doc['header']=(function() {
                    return {
                    columns: [
                
                  {
                    alignment: 'left',
                    italics: true,
                    text: "Magenta EO",
                    fontSize: 18,
                    margin: [10,0]
                  },
                  // {
                  //   alignment: 'right',
                  //   fontSize: 14,
                  //   text: 'Custom PDF export with dataTables'
                  // }
                ],
                margin: 20
              }
            });
            // Create a footer object with 2 columns
            // Left side: report creation date
            // Right side: current page and total pages
            doc['footer']=(function(page, pages) {
              return {
                columns: [
                  {
                    alignment: 'left',
                    text: ['Created on: ', { text: jsDate.toString() }]
                  },
                  {
                    alignment: 'right',
                    text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                  }
                ],
                margin: 20
              }
            });
            // Change dataTable layout (Table styling)
            // To use predefined layouts uncomment the line below and comment the custom lines below
            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
            var objLayout = {};
            objLayout['hLineWidth'] = function(i) { return .5; };
            objLayout['vLineWidth'] = function(i) { return .5; };
            objLayout['hLineColor'] = function(i) { return '#aaa'; };
            objLayout['vLineColor'] = function(i) { return '#aaa'; };
            objLayout['paddingLeft'] = function(i) { return 4; };
            objLayout['paddingRight'] = function(i) { return 4; };
            doc.content[0].layout = objLayout;
        },
                
                 // messageTop: ''+title+'',
                 
                
            },
              {
              extend: 'colvis',
            columnText: function ( dt, idx, title ) {
                return '<p style="text-align:left;">'+(idx+1)+': '+title+'</p>';
            }
            }
        ]
    } );

} );

}

function getdatatabledeliverytotal(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai){
 $(document).ready(function() {
    $('#'+table).DataTable( {
       "scrollX": true,
       'searching':false,

          "ajax":{  
                 url:'<?php echo base_url()?>Laporan/'+aksi,
                data:{laporan:laporan,jenis_laporan:jenis_laporan,status:status,mulai:mulai,sampai:sampai},
                dataType:'json',
                type:"POST"        
           },
              
            columns: [
            { 'data': 'quotation_number' },
            { 'data': 'Delivery_number' },
            { 'data': 'date_pengiriman' },
            { 'data': 'gudang' },
            { 'data': 'tagihan' },
            { 'data': 'kirim' },   
            { 'data': 'status' }         
        ], 
        
        dom: 'Bfrtip',
        buttons: [
            // {
            //     extend: 'print',
            //     autoFilter: true,
            //       title:''+title,
               
            //       customize: function ( win ) {
            //         $(win.document.body)
            //             .css( 'font-size', '10pt' )
            //             .prepend(
            //                 '<img src="<?php echo base_url('images/logo.png') ?>" style="position:absolute; top:0; left:0;" />'
            //             );
 
            //         $(win.document.body).find( 'table' )
            //             .addClass( 'compact' )
            //             .css( 'font-size', 'inherit' );
            //     }

            // },
              {

                extend: 'excelHtml5',
                title:''+title,
                autoFilter: true,
                exportOptions: {
                columns: ':visible',
                orthogonal: 'export'
                },customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // Loop over the cells in column `C`
                var nomor=1;
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    nomor=nomor+1;
                  $('row c[r*="'+nomor+'"]', sheet).attr( 's', '25' );
                   
                   
                });
            }

            },
        {

                extend: 'pdfHtml5',
                download:'open',
                messageTop:''+title+'',
                title:''+title,       
                filename: 'custom PDF',
                orientation: 'landscape', //portrait
                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                exportOptions: {
                columns: ':visible',
                search: 'applied',
                order: 'applied'
              },
                customize: function (doc) {
                //Remove the title created by datatTables
                  doc.content.splice(0,1);
            
                var now = new Date();
                var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

         
               doc.pageMargins = [20,60,20,30];
           
                doc.defaultStyle.fontSize = 7;
            
                doc.styles.tableHeader.fontSize = 7;
          
                  doc['header']=(function() {
                    return {
                    columns: [
                
                  {
                    alignment: 'left',
                    italics: true,
                    text: "Magenta EO",
                    fontSize: 18,
                    margin: [10,0]
                  },
                  // {
                  //   alignment: 'right',
                  //   fontSize: 14,
                  //   text: 'Custom PDF export with dataTables'
                  // }
                ],
                margin: 20
              }
            });
            // Create a footer object with 2 columns
            // Left side: report creation date
            // Right side: current page and total pages
            doc['footer']=(function(page, pages) {
              return {
                columns: [
                  {
                    alignment: 'left',
                    text: ['Created on: ', { text: jsDate.toString() }]
                  },
                  {
                    alignment: 'right',
                    text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                  }
                ],
                margin: 20
              }
            });
            // Change dataTable layout (Table styling)
            // To use predefined layouts uncomment the line below and comment the custom lines below
            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
            var objLayout = {};
            objLayout['hLineWidth'] = function(i) { return .5; };
            objLayout['vLineWidth'] = function(i) { return .5; };
            objLayout['hLineColor'] = function(i) { return '#aaa'; };
            objLayout['vLineColor'] = function(i) { return '#aaa'; };
            objLayout['paddingLeft'] = function(i) { return 4; };
            objLayout['paddingRight'] = function(i) { return 4; };
            doc.content[0].layout = objLayout;
        },
                
                 // messageTop: ''+title+'',
                 
                
            },
              {
              extend: 'colvis',
            columnText: function ( dt, idx, title ) {
                return '<p style="text-align:left;">'+(idx+1)+': '+title+'</p>';
            }
            }
        ]
    } );

} );

}

function getdatatabledeliverydetail(title,table,aksi,laporan,jenis_laporan,status,mulai,sampai){
 $(document).ready(function() {
    $('#'+table).DataTable( {
       "scrollX": true,
       'searching':false,

          "ajax":{  
                 url:'<?php echo base_url()?>Laporan/'+aksi,
                data:{laporan:laporan,jenis_laporan:jenis_laporan,status:status,mulai:mulai,sampai:sampai},
                dataType:'json',
                type:"POST"        
           },
                    
              
            columns: [
            { 'data': 'quotation_number' },
            { 'data': 'Delivery_number' },
            { 'data': 'date_pengiriman' },
            { 'data': 'gudang' },
            { 'data': 'tagihan' },
            { 'data': 'kirim' }, 
            { 'data': 'barang' }, 
            { 'data': 'deskripsi_barang' }, 
            { 'data': 'keterangan' },
            { 'data': 'kts' },
            { 'data': 'satuan' },   
            { 'data': 'status' }         
        ], 
        
        dom: 'Bfrtip',
        buttons: [
            // {
            //     extend: 'print',
            //     autoFilter: true,
            //       title:''+title,
               
            //       customize: function ( win ) {
            //         $(win.document.body)
            //             .css( 'font-size', '10pt' )
            //             .prepend(
            //                 '<img src="<?php echo base_url('images/logo.png') ?>" style="position:absolute; top:0; left:0;" />'
            //             );
 
            //         $(win.document.body).find( 'table' )
            //             .addClass( 'compact' )
            //             .css( 'font-size', 'inherit' );
            //     }

            // },
              {

                extend: 'excelHtml5',
                title:''+title,
                autoFilter: true,
                exportOptions: {
                columns: ':visible',
                orthogonal: 'export'
                },customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                // Loop over the cells in column `C`
                var nomor=1;
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    nomor=nomor+1;
                  $('row c[r*="'+nomor+'"]', sheet).attr( 's', '25' );
                   
                   
                });
            }

            },
           {

                extend: 'pdfHtml5',
                download:'open',
                messageTop:''+title+'',
                title:''+title,       
                filename: 'custom PDF',
                orientation: 'landscape', //portrait
                pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                exportOptions: {
                columns: ':visible',
                search: 'applied',
                order: 'applied'
              },
                customize: function (doc) {
                //Remove the title created by datatTables
                  doc.content.splice(0,1);
            
                var now = new Date();
                var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();

         
               doc.pageMargins = [20,60,20,30];
           
                doc.defaultStyle.fontSize = 7;
            
                doc.styles.tableHeader.fontSize = 7;
          
                  doc['header']=(function() {
                    return {
                    columns: [
                
                  {
                    alignment: 'left',
                    italics: true,
                    text: "Magenta EO",
                    fontSize: 18,
                    margin: [10,0]
                  },
                  // {
                  //   alignment: 'right',
                  //   fontSize: 14,
                  //   text: 'Custom PDF export with dataTables'
                  // }
                ],
                margin: 20
              }
            });
            // Create a footer object with 2 columns
            // Left side: report creation date
            // Right side: current page and total pages
            doc['footer']=(function(page, pages) {
              return {
                columns: [
                  {
                    alignment: 'left',
                    text: ['Created on: ', { text: jsDate.toString() }]
                  },
                  {
                    alignment: 'right',
                    text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                  }
                ],
                margin: 20
              }
            });
            // Change dataTable layout (Table styling)
            // To use predefined layouts uncomment the line below and comment the custom lines below
            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
            var objLayout = {};
            objLayout['hLineWidth'] = function(i) { return .5; };
            objLayout['vLineWidth'] = function(i) { return .5; };
            objLayout['hLineColor'] = function(i) { return '#aaa'; };
            objLayout['vLineColor'] = function(i) { return '#aaa'; };
            objLayout['paddingLeft'] = function(i) { return 4; };
            objLayout['paddingRight'] = function(i) { return 4; };
            doc.content[0].layout = objLayout;
        },
                
                 // messageTop: ''+title+'',
                 
                
            },
              {
              extend: 'colvis',
            columnText: function ( dt, idx, title ) {
                return '<p style="text-align:left;">'+(idx+1)+': '+title+'</p>';
            }
            }
        ]
    } );

} );

}

     function isTGL(){


    startDate=new Date($('#mulaiTgl').val());
    endDate=new Date($('#sampaiTgl').val());
    if (endDate<startDate){
    $('#sampaiTgl').val("");

    }
   
      if (Object.prototype.toString.call(startDate) 
                                    === "[object Date]") 
        { 
        if ((startDate=='') || isNaN(startDate.getTime())) {  
        document.getElementById("sampaiTgl").readOnly = true;
        $('#sampaiTgl').val("");
          } 
          else { 
        $("#sampaiTgl").datepicker("destroy");
        document.getElementById("sampaiTgl").readOnly = true;
        $('#sampaiTgl').datepicker({

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

    $('#mulaiTgl').datepicker({
        dateFormat: 'yy-mm-dd',
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
     
        buttonImageOnly: true,
        minDate: "",
        maxDate: '+30Y',
        yearRange: '1999:2030',
        inline: true
    });
});
  
  

    $("#laporanMainNav").addClass('active');

   $("#openLaporanNav").addClass('menu-open');
</script>


 
 <script type="text/javascript" src="<?php echo base_url('assets/rupiah.js')?>"></script>


 

