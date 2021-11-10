<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style type="text/css">
    #tbl1 {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #tbl1 td,
    #tbl1 th {
      border: 1px solid #808080;
      padding: 8px;
    }

    table tr td {
      font-size: 13px
    }

    table tr th {
      font-size: 14px
    }

    p {
      font-size: 13px
    }


    #tbl1 th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;

      color: black;
    }

    /*   .element {
     
       
        margin-right: 70px;
        top: 100px;
      
        border: 1px;
      
         border: 1px solid #000;
      
    }*/


    #tbl1 thead {
      background-color: #808080;


    }

    #tbl1 thead th {
      color: white;

    }
  </style>

</head>

<body>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-12">

          <img style="margin-left: 45px; margin-top: 10px;" id="imagedeposit" src="<?php echo base_url('images/logo.png') ?>" alt="" class="logo" width="200" height="50" style="top: 30px;">


          <!-- info row -->

          <!-- /.row -->
          <div class="row invoice-info">
            <div class="col-9 invoice-col">
              <br>
              <p>PT.Magenta Mediatama<br>
                Jl. Raya kebayon Lama No 15.RT.04 RW.03 Grogol Utara,<br>
                Kebayon Lama Jakarta Selatan DKI Jakarta-12210<br>
                phone (021) 53660077-08; Fax (021) 53660099</p>
            </div>
            <!-- /.col -->

            <!-- date('d F Y', strtotime($date)) -->
            <!-- /.col -->
            <div style="margin-top: -90px;">

              <table border="0" style="right: 0" align="right">
                <tr>
                  <td colspan="3">Jakarta,<?php echo date('d F Y', strtotime($date_quotation))?></td>
                </tr>
                <tr>
                  <td align="right"><b>No. Quotation</b></td>
                  <td align="right">:</td>
                  <td align="right"><?php echo $quotation_number; ?> </td>
                </tr>
              </table>





            </div>






          </div>
        <br>
        <br>
      
        
          
          <hr style="height: 3px; border-width: 6px; background-color:#696969; margin-left: 45px; margin-right: 45px;">

          <!-- Table row -->

          <div class="row invoice-info">
            <div class="col-sm-9 invoice-col" style="width: 60%;">

              <b>
                <p>Kepada Yth,</p>
              </b>

              <p style="margin-left: 60px;"><b><?php echo $customer; ?></b><br><?php echo $alamat; ?></p>
              

            </div>
            <!-- /.col -->


            <!-- /.col -->
            <div style="right: 0" class="element" align="right" style="margin-top: -100px;">
              <!--     
         <b>PIC Event : <?php echo $pic_name ?></b><br>
<b>Title Event :<?php echo $title; ?></b> -->
              <table style="right: 0" align="right" style="width: 25%;">
                <tr>
                  <td valign="top">Attn</td>
                  <td valign="top">:</td>:<td><?php echo $pic_name ?></td>
                </tr>
                <tr>
                  <td valign="top">Event</td>
                  <td valign="top">:</td>
                  <td><?php echo $title ?></td>
                </tr>    
              </table>



            </div>
            <br>
            <br>
           <br>
           




            <p> Dengan Hormat,<br>
              Bersama ini kami ingin menyampaikan penawaran harga, dengan detail sebagai beri :</p>
          </div>
          <div class="roqw">




            <div class="col-13 table-responsive justify-content">


              <table id="tbl1" align="center" style="width: 100%" border="1" align="center">
                <thead class="thead-dark">
                  <tr>
                    <th style="width: 5%;background-color: #808080" valign="top">
                      <center>No</center>
                    </th>
                    <th style="width: 35%;background-color: #808080" valign="top">Description</th>
                    <th style="width: 5%;background-color: #808080" valign="top">
                      <center>Quantity</center>
                    </th>
                    <th style="width: 5%;background-color: #808080" valign="top">
                      <center>Frequency</center>
                    </th>
                    <th style="width: 20%;background-color: #808080" valign="top">Unit Price</th>
                    <th style="width: 20%;background-color: #808080" valign="top">Amount</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $no = 0;
                  foreach ($quotation_other_item as $k) :
                    $no++;

                  ?>
                    <tr>
                      <td >
                        <center><?php echo $no ?></center>
                      </td>
                      <td><?php echo $k->desciption ?></td>
                      <td  style="width: 15px;">
                        <center><?php echo $k->quantity ?></center>
                      </td>
                      <td  style="width: 15px;">
                        <center><?php echo $k->frequency ?></center>
                      </td>
                      <td align="right"  style="width: 20px;"> <?php echo number_format($k->unitprice, 0, ',', '.') ?></td>
                      <td align="right"  style="width: 15px;"> <?php echo number_format($k->amount, 0, ',', '.') ?></td>
                    </tr>
                  <?php endforeach ?>
          

                  <tr>

                    <td rowspan="6" colspan="4" valign="top"><b>Note : </b><?php echo $note ?></p>
                    </td>
                    <th>Subtotal</th>
                    <tD align="right"> <?php echo  $total ?></tD>

                  </tr>
                  <tr>
                    <th>Discount</th>
                    <tD align="right">  <?php echo '(' . number_format($discount, 0, ',', '.') . ')' ?></tD>

                  </tr>
                  <tr>
                    <th>ASF</th>
                    <tD align="right"> <?php echo $asf ?></tD>

                  </tr>
                  <tr>
                    <th>Netto</th>
                    <td align="right"> <?php echo $netto; ?></td>

                  </tr>
                  <tr>
                    <th>PPN</th>
                    <td align="right"> <?php echo $ppn ?></td>

                  </tr>
                  <tr>
                    <th>PPh23</th>
                    <td align="right"> <?php echo '('.$pph23.')'; ?></td>

                  </tr>
                  <tr>
                    <th colspan="5">Grand Total</th>
                    <th align="right"> <?php echo $grand_total; ?></th>

                  </tr>
               

                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <br>
          



          <table style="width: 270px">

            <tr>

              <td style="width: 45px">Hormat Kami</td>


            </tr>
            <tr>

              <td style="width: 45px">PT. Magenta Mediatama</td>


            </tr>

          </table>

          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">


            </div>
            <!-- /.col -->
            <div class="col-6">



            </div>
            <!-- /.col -->
          </div>

          <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->

  <script type="text/javascript">
    window.addEventListener("load", window.print());
  </script>
</body>

</html>