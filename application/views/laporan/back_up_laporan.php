
    
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
                   
                    
                      <option value="quotations">Quotation</option>
                      <option value="quotation_other"> Quotation Other </option>
      
                    <option value="bast">Bast</option>
                    
                    <option value="faktur">Faktur</option>
                    
                    <option value="delivery">Delivery</option>
                    
                    
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
      
                    <option value="bast">Bast</option>
                    
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
      
                    <option value="bast">Bast</option>
                    
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
  console.log(laporan);
  console.log(jenis_laporan);
  console.log(mulai);
  console.log(sampai);
   console.log(status);
      $.ajax({
          type:"post",
          url:'<?php echo base_url()?>Laporan/'+aksi,
          data:'laporan='+laporan+'&jenis_laporan='+jenis_laporan+'&mulai='+mulai+'&sampai='+sampai+'&status='+status,
          dataType:'json',
      
          success:function(data){
            var baris='';
         
              if (jenis_laporan=="total"){
                console.log(data);
                  if (data.length==0){
                      alert("data yang dicari kosong");

                          }else{

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
                            '<th>Total Commisionable Cost</th>'+
                            '<th>Total Non-Fee Cost</th>'+
                            '<th>PPh</th>'+
                           '<th>PPN</th>'+  
                            '<th>Total Summary</th>'+
                              '<th>Status</th>'+

                    
                            '</tr>'+
                            '</thead>'+
                            '<tbody>';
                        
                            
            
             


                      for (var i=0;i<data.length; i++){ 
                            //var asf=data[i].asf;
                            //var asff=asf.replace(/[^\w\s]/gi, '');

                               baris+='<tr>'+
                             '<td>'+data[i].quotation_number+'</td>'+
                              '<td>'+data[i].date_quotation+'</td>'+
                              '<td>'+data[i].date_expired+'</td>'+
                               
                                '<td>'+data[i].pic_event+'</td>'+
                              '<td>'+data[i].email_event+'</td>'+
                              '<td>'+data[i].pic_name+'</td>'+
                              '<td>'+data[i].pic_email+'</td>'+
                              '<td>'+data[i].customer+'</td>'+
                              '<td>'+data[i].tittle_event+'</td>'+
                              '<td>'+data[i].venue_event+'</td>'+
                              '<td>'+data[i].date_event+'</td>'+                           
                              '<td>'+data[i].asf+'</td>'+
                              '<td>'+data[i].comissionable_cost+'</td>'+
                              '<td>'+data[i].nonfee+'</td>'+
                              '<td>'+data[i].pph+'</td>'+
                              '<td>'+data[i].ppn+'</td>'+
                              '<td>'+data[i].total_summary+'</td>'+
                                 '<td>'+data[i].status+'</td>'+
                          '</tr>';
                      
                       }
                         baris+='</tbody>'+
                        '</table>';
                           document.getElementById(target).innerHTML = baris;

                            getdatatable("Laporan "+jenis_laporan+" Quotation "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status,table);
                        
      
                        }

                   
             

                                   }else{
                                              if (data.length==0){
                                          alert("data yang dicari kosong");

                                            }else{

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
                                              '<th>Total Commisionable Cost</th>'+
                                              '<th>Total Non-Fee Cost</th>'+
                                              '<th>PPh</th>'+
                                             '<th>PPN</th>'+  
                                              '<th>Total Summary</th>'+
                                                '<th>Status</th>'+ 



                        
                             
                               
                                                        
                              
          
                                             
             
                                            '</tr>'+
                                            '</thead>'+
                                            '</tbody>';
                                           

                                                for (var i=0;i<data.length; i++){ 
                                              baris+='<tr>'+
                                              '<td>'+data[i].quotation_number+'</td>'+
                                              '<td>'+data[i].date_quotation+'</td>'+
                                              '<td>'+data[i].date_expired+'</td>'+
                                              '<td>'+data[i].pic_event+'</td>'+
                                              '<td>'+data[i].email_event+'</td>'+
                                              '<td>'+data[i].pic_name+'</td>'+
                                              '<td>'+data[i].pic_email+'</td>'+
                                              '<td>'+data[i].customer+'</td>'+
                                             '<td>'+data[i].tittle_event+'</td>'+
                                              '<td>'+data[i].venue_event+'</td>'+
                                              '<td>'+data[i].date_event+'</td>'+ 
                                             '<td>'+data[i].name_item+'</td>'+
                                              '<td>'+data[i].item_value+'</td>'+
                                              '<td>'+data[i].quantity+'</td>'+
                                              '<td>'+data[i].frrequency+'</td>'+
                                              '<td>'+data[i].rate+'</td>'+
                                              '<td>'+data[i].subtotal+'</td>'+
                                              '<td>'+data[i].asf+'</td>'+
                                              '<td>'+data[i].comissionable_cost+'</td>'+
                                              '<td>'+data[i].nonfee+'</td>'+
                                              '<td>'+data[i].pph+'</td>'+
                                                '<td>'+data[i].ppn+'</td>'+
                                            '<td>'+data[i].total_summary+'</td>'+
                                                  '<td>'+data[i].status+'</td>'+
                                       
                                        '</tr>';
                      
                                          }
                            baris+='</tbody>'+
                          '</table>';
                          document.getElementById(target).innerHTML = baris;

                           getdatatable("Laporan "+jenis_laporan+" Quotation "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status,table);
                     
                                }
                      
                      }
                  
 
               


                    
          },
          error:function(hasil){
            console.log("error");
         
    
           
          }
         

      });

}

function getDataquotationother(id,aksi,target,type,table){
  var laporan=$('#laporan'+id).val();
  var status=$('#status'+id).val();
  var jenis_laporan=$('input[id="jenis_laporan'+id+'"]:checked').val();
  var mulai=$('#mulai'+id).val();
  var sampai=$('#sampai'+id).val();
  console.log(laporan);
  console.log(jenis_laporan);
  console.log(mulai);
  console.log(sampai);
      $.ajax({
          type:"post",
          url:'<?php echo base_url()?>Laporan/'+aksi,
          data:'laporan='+laporan+'&jenis_laporan='+jenis_laporan+'&mulai='+mulai+'&sampai='+sampai+'&status='+status,
          dataType:'json',
      
          success:function(data){
            console.log(data);
            var baris='';
         
              if (jenis_laporan=="total"){
                console.log(data);
                  if (data.length==0){
                      alert("data yang dicari kosong");

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
                        '<th>ASF</th>'+
                        '<th>Netto</th>'+
                        '<th>PPh23</th>'+
                        '<th>PPN</th>'+
                        '<th>Total</th>'+
                        '<th>Status</th>'+
                        '</tr>'+
              
                            '</thead>'+
                            '<tbody>';
                        
                      for (var i=0;i<data.length; i++){ 
                               baris+='<tr>'+
                             '<td>'+data[i].quotation_number+'</td>'+
                             '<td>'+data[i].date_quotation+'</td>'+
                             '<td>'+data[i].date_expired+'</td>'+
                             
                              '<td>'+data[i].pic_event+'</td>'+
                              '<td>'+data[i].email_event+'</td>'+
                              '<td>'+data[i].pic_name+'</td>'+
                              '<td>'+data[i].pic_email+'</td>'+
                              '<td>'+data[i].customer+'</td>'+
                              
                              '<td>'+data[i].tittle_event+'</td>'+
                              '<td>'+data[i].note+'</td>'+
                              '<td>'+data[i].asf+'</td>'+
                              '<td>'+data[i].netto+'</td>'+
                              '<td>'+data[i].pph23+'</td>'+
                              '<td>'+data[i].ppn+'</td>'+
                              '<td>'+data[i].total+'</td>'+
                              '<td>'+data[i].status+'</td>'+
                            
                          '</tr>';
                      
                       }
                         baris+='</tbody>'+
                        '</table>';
                           document.getElementById(target).innerHTML = baris;
                        getdatatable("Laporan "+jenis_laporan+" Quotation "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status,table);
                          

      
                        }

                   
             

                                   }else{
                                              if (data.length==0){
                                          alert("data yang dicari kosong");

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
                                              '<th>PPh23</th>'+
                                              '<th>PPN</th>'+
                                              '<th>Total</th>'+
                                              '<th>Status</th>'+
                                            '</tr>'+

                                              
                                            '</thead>'+
                                            '</tbody>';
                                            
                        
                             
                               
                                           

                                                for (var i=0;i<data.length; i++){ 
                                              baris+='<tr>'+
                                            '<td>'+data[i].quotation_number+'</td>'+
                                            '<td>'+data[i].date_quotation+'</td>'+
                                            '<td>'+data[i].date_expired+'</td>'+
                                            '<td>'+data[i].pic_event+'</td>'+
                                            '<td>'+data[i].email_event+'</td>'+
                                            '<td>'+data[i].pic_name+'</td>'+
                                            '<td>'+data[i].pic_email+'</td>'+
                                            '<td>'+data[i].customer+'</td>'+
                              
                                            '<td>'+data[i].tittle_event+'</td>'+
                                            '<td>'+data[i].note+'</td>'+
                                            '<td>'+data[i].desciption+'</td>'+
                                            '<td>'+data[i].frequency+'</td>'+
                                            '<td>'+data[i].unitprice+'</td>'+
                                            '<td>'+data[i].amount+'</td>'+
                                            '<td>'+data[i].asf+'</td>'+
                                            '<td>'+data[i].netto+'</td>'+
                                            '<td>'+data[i].pph23+'</td>'+
                                            '<td>'+data[i].ppn+'</td>'+
                                            '<td>'+data[i].total+'</td>'+
                                            '<td>'+data[i].status+'</td>'+
                                            
                                       
                                        '</tr>';
                      
                                          }
                            baris+='</tbody>'+
                          '</table>';
                          document.getElementById(target).innerHTML = baris;
                            getdatatable("Laporan "+jenis_laporan+" Quotation "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status,table);
                     

                                }
                      
                      }
                            
                     

               

                    
          },
          error:function(hasil){
            console.log("error");
         
    
           
          }
         

      });

}


function getDatafaktur(id,aksi,target,type,table){
  var laporan=$('#laporan'+id).val();
  var status=$('#status'+id).val();
  var jenis_laporan=$('input[id="jenis_laporan'+id+'"]:checked').val();
  var mulai=$('#mulai'+id).val();
  var sampai=$('#sampai'+id).val();
  console.log(laporan);
  console.log(jenis_laporan);
  console.log(mulai);
  console.log(sampai);
      $.ajax({
          type:"post",
          url:'<?php echo base_url()?>Laporan/'+aksi,
          data:'laporan='+laporan+'&jenis_laporan='+jenis_laporan+'&mulai='+mulai+'&sampai='+sampai+'&status='+status,
          dataType:'json',
      
          success:function(data){
       
            console.log(data);

            var baris='';
         
              if (jenis_laporan=="total"){
                console.log(data);
                  if (data.length==0){
                      alert("data yang dicari kosong");

                          }else{

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
                            '<tbody>';
                        
                      for (var i=0;i<data.length; i++){ 

                   
                               baris+='<tr>'+
                             '<td>'+data[i].quotation_number+'</td>'+
                             '<td>'+data[i].faktur_number+'</td>'+
                             '<td>'+data[i].ser_faktur+'</td>'+
                              '<td>'+data[i].REF+'</td>'+
                              '<td>'+data[i].date_faktur+'</td>'+
                              '<td>'+data[i].syarat_pembayaran+'</td>'+
                              '<td>'+data[i].total_sub+'</td>'+
                              '<td>'+data[i].diskon_harga+'</td>'+
                              '<td>'+data[i].ppn+'</td>'+
                              '<td>'+data[i].pph23+'</td>'+
                              '<td>'+data[i].total_faktur+'</td>'+
                              '<td>'+data[i].status+'</td>'+
                             
                            
                          '</tr>';
                      
                       }
                         baris+='</tbody>'+
                        '</table>';
                           document.getElementById(target).innerHTML = baris;
                            getdatatable("Laporan "+jenis_laporan+" Faktur "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status,table);
                          

      
                        }

                   
             

                                   }else{
                                              if (data.length==0){
                                          alert("data yang dicari kosong");

                                            }else{

                                          baris+='<table id="'+table+'"   class="table table-bordered table-striped" style="width: 100%">'+
                                            '<thead>'+ 
                                            '<tr>'+
                                                '<th>Quotation Number</th>'+
                                                '<th>Faktur Number</th>'+
                                                '<th>Date Faktur</th>'+

                                                // '<th>PIC Event</th>'+
                                                // '<th>Email</th>'+
                                                // '<th>jabatan</th>'+
                                                // '<th>Customer</th>'+
                                                // '<th>NPWP</th>'+
                                               // '<th>Title Event</th>'+
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
                                            '</tbody>';

                                             
                            
                                                var kts;
                                                for (var i=0;i<data.length; i++){ 
                                                  

                                              baris+='<tr>'+ 
                                            '<td>'+data[i].quotation_number+'</td>'+
                                            '<td>'+data[i].faktur_number+'</td>'+
                                            '<td>'+data[i].faktur_number+'</td>'+
                                            '<td>'+data[i].date_faktur+'</td>'+
                                            '<td>'+data[i].REF+'</td>'+
                                              '<td>'+data[i].syarat_pembayaran+'</td>'+
                                            '<td>'+data[i].barang+'</td>'+
                                            '<td>'+data[i].deskripsi_barang+'</td>'+
                                            '<td>'+data[i].keterangan+'</td>'+
                                            '<td>'+data[i].kts+'</td>'+
                                            '<td>'+data[i].harga_satuan+'</td>'+
                                            '<td>'+data[i].amount+'</td>'+
                                          
                                            '<td>'+data[i].total_sub+'</td>'+
                                            '<td>'+data[i].diskon_harga+'</td>'+
                                            '<td>'+data[i].ppn+'</td>'+
                                            '<td>'+data[i].pph23+'</td>'+
                                            '<td>'+data[i].total_faktur+'</td>'+
                                            '<td>'+data[i].status+'</td>'+
                                            
                                       
                                        '</tr>';
                      
                                          }
                            baris+='</tbody>'+
                          '</table>';
                          document.getElementById(target).innerHTML = baris;
                             getdatatable("Laporan "+jenis_laporan+" Faktur "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status,table);
                     
                     

                                }
                      
                      }
                            

               

                    
          },
          error:function(hasil){
            console.log("error");
         
    
           
          }
         

      });

}

function getDatadelivery(id,aksi,target,type,table){
  var laporan=$('#laporan'+id).val();
  var status=$('#status'+id).val();
  var jenis_laporan=$('input[id="jenis_laporan'+id+'"]:checked').val();
  var mulai=$('#mulai'+id).val();
  var sampai=$('#sampai'+id).val();
  console.log(laporan);
  console.log(jenis_laporan);
  console.log(mulai);
  console.log(sampai);
      $.ajax({
          type:"post",
          url:'<?php echo base_url()?>Laporan/'+aksi,
          data:'laporan='+laporan+'&jenis_laporan='+jenis_laporan+'&mulai='+mulai+'&sampai='+sampai+'&status='+status,
          dataType:'json',
      
          success:function(data){
            console.log(data);
            var baris='';
         
              if (jenis_laporan=="total"){
                console.log(data);
                  if (data.length==0){
                      alert("data yang dicari kosong");

                          }else{

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
                            '<tbody>';
                        
                      for (var i=0;i<data.length; i++){ 

                   
                               baris+='<tr>'+
                   
                             '<td>'+data[i].quotation_number+'</td>'+
                             '<td>'+data[i].Delivery_number+'</td>'+
                             '<td>'+data[i].date_pengiriman+'</td>'+
                              '<td>'+data[i].gudang+'</td>'+
                              '<td>'+data[i].tagihan+'</td>'+
                              '<td>'+data[i].kirim+'</td>'+
                              '<td>'+data[i].status+'</td>'+
                         
                             
                            
                          '</tr>';
                      
                       }
                         baris+='</tbody>'+
                        '</table>';
                           document.getElementById(target).innerHTML = baris;
                              getdatatable("Laporan "+jenis_laporan+" Delivery "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status,table);
                          

      
                        }

                   
             

                                   }else{
                                              if (data.length==0){
                                          alert("data yang dicari kosong");

                                            }else{

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
                                            '</tbody>';
                                            

                             
                              
                              

                                                for (var i=0;i<data.length; i++){ 
                                              baris+='<tr>'+
                     
                                             '<td>'+data[i].quotation_number+'</td>'+ 
                                             '<td>'+data[i].delivery_number+'</td>'+
                                             '<td>'+data[i].date_pengiriman+'</td>'+
                                              '<td>'+data[i].gudang+'</td>'+
                                              '<td>'+data[i].tagihan+'</td>'+
                                              '<td>'+data[i].kirim+'</td>'+
                                             '<td>'+data[i].barang+'</td>'+
                                             '<td>'+data[i].deskripsi_barang+'</td>'+
                                             '<td>'+data[i].keterangan+'</td>'+
                                             '<td>'+data[i].kts+'</td>'+
                                             '<td>'+data[i].satuan+'</td>'+
                                             '<td>'+data[i].status+'</td>'+
                                            
                                       
                                        '</tr>';
                      
                                          }
                            baris+='</tbody>'+
                          '</table>';
                          document.getElementById(target).innerHTML = baris;
                             getdatatable("Laporan "+jenis_laporan+" Delivery "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status,table);
                     

                                }
                      
                      }
                             
                     

               

                    
          },
          error:function(hasil){
            console.log("error");
         
    
           
          }
         

      });

}

function getDatabast(id,aksi,target,type,table){
  var laporan=$('#laporan'+id).val();
  var status=$('#status'+id).val();
  var jenis_laporan=$('input[id="jenis_laporan'+id+'"]:checked').val();
  var mulai=$('#mulai'+id).val();
  var sampai=$('#sampai'+id).val();
  console.log(laporan);
  console.log(jenis_laporan);
  console.log(mulai);
  console.log(sampai);
      $.ajax({
          type:"post",
          url:'<?php echo base_url()?>Laporan/'+aksi,
          data:'laporan='+laporan+'&jenis_laporan='+jenis_laporan+'&mulai='+mulai+'&sampai='+sampai+'&status='+status,
          dataType:'json',
      
          success:function(data){
            console.log(data);
            var baris='';
         
              if (jenis_laporan=="total"){
                console.log(data);
                  if (data.length==0){
                      alert("data yang dicari kosong");

                          }else{

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
                            '<tbody>';
                        
                      for (var i=0;i<data.length; i++){ 

                   
                               baris+='<tr>'+ 
                             '<td>'+data[i].quotation_number+'</td>'+
                             '<td>'+data[i].bast_number+'</td>'+
                             '<td>'+data[i].gr_number+'</td>'+
                              '<td>'+data[i].po_number+'</td>'+
                              '<td>'+data[i].date_bast+'</td>'+
                              '<td>'+data[i].date_po+'</td>'+
                               '<td>'+data[i].pic_po+'</td>'+
                              '<td>'+data[i].jabatan+'</td>'+
                              '<td>'+data[i].pic_magenta+'</td>'+
                              '<td>'+data[i].jabatan_magenta+'</td>'+
                              '<td>'+data[i].status+'</td>'+
                                                    
                          '</tr>';
                      
                       }
                         baris+='</tbody>'+
                        '</table>';
                        document.getElementById(target).innerHTML = baris;
                              getdatatable("Laporan "+jenis_laporan+" BAST "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status,table);
                          

      
                        }

                                   }else{
                                              if (data.length==0){
                                          alert("data yang dicari kosong");

                                            }else{

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
                                            '</tbody>';
                              

                                                for (var i=0;i<data.length; i++){ 
                                              baris+='<tr>'+

                                            '<td>'+data[i].quotation_number+'</td>'+ 
                                            '<td>'+data[i].bast_number+'</td>'+
                                            '<td>'+data[i].gr_number+'</td>'+
                                             '<td>'+data[i].po_number+'</td>'+
                                              '<td>'+data[i].date_bast+'</td>'+
                                            '<td>'+data[i].date_po+'</td>'+
                                             '<td>'+data[i].pic_po+'</td>'+
                                            '<td>'+data[i].jabatan+'</td>'+
                                            '<td>'+data[i].pic_magenta+'</td>'+
                                                '<td>'+data[i].jabatan_magenta+'</td>'+
                                            '<td>'+data[i].status+'</td>'+
                                            
      
                                        '</tr>';
                      
                                          }
                            baris+='</tbody>'+
                          '</table>';
                          document.getElementById(target).innerHTML = baris;
                            getdatatable("Laporan "+jenis_laporan+" BAST "+type+" "+mulai+" Sampai "+sampai+" dengan status "+status,table);
                     

                                }
                      
                      }
                            
                     

               

                    
          },
          error:function(hasil){
            console.log("error");
         
    
           
          }
         

      });

}






// function getdatatable(title,table){
 

//  $(document).ready(function() {
//   var buttonCommon = {
//         exportOptions: {
//             format: {
//                 body: function ( data, row, column, node ) {
//                     // Strip $ from salary column to make it numeric
//                       // var rate1 = rate.replace(/[^\w\s]/gi, '');
//                     // var column = table.column(':contains(ASF)');
//                       return node==='ASF' ?
//                         data.replace(/[^\w\s]/gi, '') :
//                       column ===19 ?
//                       data.replace(/[^\w\s]/gi, '') :
//                         data;
//                 }
//             }
//         }
//     };  var buttonCommon = {
//         exportOptions: {
//             format: {
//                 body: function ( data, row, column, node ) {
//                     // Strip $ from salary column to make it numeric
//                       // var rate1 = rate.replace(/[^\w\s]/gi, '');
//                     // var column = table.column(':contains(ASF)');
//                       return node==='ASF' ?
//                         data.replace(/[^\w\s]/gi, '') :
//                       column ===19 ?
//                       data.replace(/[^\w\s]/gi, '') :
//                         data;
//                 }
//             }
//         }
//     };

//     $('#'+table).DataTable( {
//        "scrollX": true,
//              "searching": false,
        
//         dom: 'Bfrtip',
//         buttons: [
//                $.extend( true, {}, buttonCommon, {
//                 extend: 'copyHtml5'
//             } ),
//             $.extend( true, {}, buttonCommon, {
//                 extend: 'excelHtml5',
//                  download: 'open'
//             } ),
//             $.extend( true, {}, buttonCommon, {
//                 extend: 'pdfHtml5',
//                  download: 'open'
//             } )
//         ]
//     } );
// } );

// }
function getdatatable(title,table){
 

 $(document).ready(function() {
   var buttonCommon = {
        exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                    // Strip $ from salary column to make it numeric
                      // var rate1 = rate.replace(/[^\w\s]/gi, '');
                    // var column = table.column(':contains(ASF)');
               return row === 5 ?
                        data.replace( /[.]/gi, '' ) :
                        data;
                }
            }
        }
    };

    $('#'+table).DataTable( {
       "scrollX": true,
             "searching": false,
        
        dom: 'Bfrtip',

        //stateSave: true,
        buttons: [
            {
                extend: 'print',
                autoFilter: true,
               
                  customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }

            },
             $.extend( true, {}, buttonCommon, {
                extend: 'excelHtml5',
                 title:''+title+'',
                exportOptions: {
                    columns: ':visible'
                }, customize: function(xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
 
                // Loop over the cells in column `C`
                var nomor=1;
                $('row c[r^="C"]', sheet).each( function () {
                    // Get the value
                    nomor=nomor+1;
                  $('row c[r*="'+nomor+'"]', sheet).attr( 's', '25' );
                   ///$(this).replace( /[.]/gi, '' );
                    var data=$(this).attr( 's', '20' );
                    //data.replace( /[.]/gi, '' );
                });
            }
            } ),
            {

                extend: 'pdfHtml5',
                download:'open',
                
                 // messageTop: ''+title+'',
                  title:''+title,
                exportOptions: {
                    columns: ':visible'
                }
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

function getdatatable1(title,table,aksi,jenis_laporan,){
 

 $(document).ready(function() {
   var buttonCommon = {
        exportOptions: {
            format: {
                body: function ( data, row, column, node ) {
                    // Strip $ from salary column to make it numeric
                      // var rate1 = rate.replace(/[^\w\s]/gi, '');
                    // var column = table.column(':contains(ASF)');
               return row === 5 ?
                        data.replace( /[.]/gi, '' ) :
                        data;
                }
            }
        }
    };

    $('#'+table).DataTable( {
       "scrollX": true,
        "searching": false,
          "ajax":{  
                url:"<?php echo base_url("Laporan/")?>"+aksi,  
                data:{id:<?php echo $id; ?>},
                dataType:'json',

                type:"POST"  
           }, 
        
        dom: 'Bfrtip',

        //stateSave: true,
        buttons: [
            {
                extend: 'print',
                autoFilter: true,
               
                  customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }

            },
              {

                extend: 'excelHtml5',
            
               
                  title:''+title,
                exportOptions: {
                    columns: ':visible'
                }
            },
            {

                extend: 'pdfHtml5',
                download:'open',
                
                 // messageTop: ''+title+'',
                  title:''+title,
                exportOptions: {
                    columns: ':visible'
                }
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


 


 

 {
            extend: 'excelHtml5',
            customize: function(xlsx) {
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