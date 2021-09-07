<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <style type="text/css">
    p.ratakanan {
      text-align: right;
      color: red;
      size: 40px;
      text-align-last: right;
    }


    #tbl1 {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    p {
      font-size: 10px;
    }

    h8 {
      font-size: 14;
    }



    
    #tbl1 td,
    #tbl1 th {
      border: 1px solid #808080;
      padding: 8px;
    }

    #imagedeposit {
      margin-top: -15px;
    }

    table tr th {
      font-size: 10px
    }

    span {
      font-size: 13px;
    }



    #tbl1 th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #808080;

      color: black;
    }

    #tbl1 thead {
      background-color: #808080;


    }

    #tbl1 thead th {
      color: white;

    }

    table tr td {
      font-size: 13px;
    }

    table tr th {
      font-size: 13px;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <img style="margin-top: 100px;" id="imagedeposit" src="<?php echo base_url('images/logo.png') ?>" alt="" class="logo" width="200" height="50" style="float: right; " />


    <section class="invoice">
      <!-- title row -->
      <div class="row">


        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-9 invoice-col ">

          <table class="col-sm-3" style="margin-top: -50px; width:50%" >
          <tr>
              
              <th colspan="3" align="left"><span style="font-size: 18px; width:30%"><?php echo $title_event; ?></span></tg>
            </tr>

            <tr>
              <td>Venue </td>
              <td>:</td>
              <td><?php echo $venue; ?></td>
            </tr>
            <tr>
              <td>Date </td>
              <td>:</td>
              <td><?php echo date('d F Y', strtotime($date)) ; ?></td>
            </tr>
            <tr>
              <td>To </td>
              <td>:</td>
              <td><?php echo $pic_name; ?></td>
            </tr>
            <tr>
              <td>Email </td>
              <td>:</td>
              <td><?php echo $pic_email; ?></td>
            </tr>
            <tr>
              <td>No.Ref </td>
              <td>:</td>
              <td><?php echo $quotation_number; ?></td>
            </tr>
          </table>

        </div>
        <!-- /.col -->
        <!-- /.col -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
      </div>
       <hr style="height: 3px; border-width: 6px; width: 99.5%; background-color:#696969;">

      <table id="tbl1" style=" width: 100%" align="center" border="3" align="center">
        <thead>
          <tr>
            <th scope="col" style="width: 8%">
              <center>No</center>
            </th>

            <th scope="col" colspan="3" style="width: 65%">
              <center>Description</center>
            </th>
            <th style="width: 40%" scope="col">
              <center>total</center>
            </th>

          </tr>

        </thead>
        <tbody>
          <tr>
            <td colspan="5"><b>Non-Fee Cost</b></td>
          </tr>

          <?php
          $no = 0;
          foreach ($quotation_sub_item as $k) :


          ?>
            <?php if ($k->metode == "Non-Fee Cost") {
              $no++;

            ?>
              <tr>
                <td style="width: 8%">
                  <center><?php echo $no; ?></center>
                </td>
                <td colspan="3" style="width: 65%;"><?php echo $k->name; ?></td>
                <td align="right" style="width: 50%;"><?php $controller->subtotal($k->name, $k->quotation_number); ?></td>

              </tr>


            <?php } ?>
          <?php endforeach ?>
          <tr>

            <td colspan="4"><b>Grand Total</b></td>
            <td align="right"><?php echo number_format($nonfee, 0, ",", ".");  ?></td>
          </tr>
          <tr>
            <td colspan="5"><b>Commissionable Cost</b></th>
          </tr>


          <?php
          $no = 0;
          foreach ($quotation_sub_item as $k) : ?>
            <?php if ($k->metode == "Comissionable Cost") {
              $no++;

            ?>
              <tr>
                <td>
                  <center><?php echo $no;; ?></center>
                </td>
                <td colspan="3"><?php echo $k->name; ?></td>
                <td align="right"><?php $controller->subtotal($k->name, $k->quotation_number); ?></td>

              </tr>
            <?php } ?>
          <?php endforeach ?>
          <tr>

            <td colspan="4"><b>Grand Total</b></td>
            <td align="right"> <?php echo   number_format($comissionable_cost, 0, ",", "."); ?></td>
          </tr>

          <tr>
            <td rowspan="7" colspan="3"></td>

            <td colspan="1" style="width: 20%"><b>ASF</b></td>
            <td style="width: 35%" align="right"><?php echo  number_format($asf, 0, ",", ".");; ?></td>
          </tr>
          <tr>

            <td colspan="1"><b>Subtotal</b></td>
            <td align="right"> <?php echo  number_format($total, 0, ",", ".");; ?></td>
          </tr></b>
          <tr>
            <td colspan="1" style=""><b>Discount</b></td>
            <td align="right">(<?php echo number_format($discount, 0, ",", ".");; ?>)</td>
          </tr>
          <tr>
            <td colspan="1" style=""><b>Netto</b></td>
            <td align="right"><?php echo number_format($netto, 0, ",", ".");; ?></td>
          </tr>
          <!-- <tr>
            <td colspan="1" style=""><b>PPN</b></td>
            <td align="right"><?php echo number_format($ppn, 0, ",", ".");; ?></td>
          </tr> -->
          <!-- <tr>
            <td colspan="1"><b>PPh</b></td>
            <td align="right">(<?php echo number_format($pph, 0, ",", ".");; ?>)</td>
          </tr> -->
          <!-- <tr>

            <td colspan="1"><b>Grand Total</b></td>
            <td align="right"><b> <?php echo  number_format($grand_total, 0, ",", "."); ?></b></td>
          </tr> -->




        </tbody>
        <!--  <tfoot>
           <tr>
            
            <td colspan="4"><b>Grand Total</b></td><td><b><?php echo  $comissionable_cost; ?></b></td>
           </tr>
         <tr>
              <th rowspan="4" style="width: 60%; " colspan="2" ></th>
            <td colspan="2" style="width: 20%"><b>ASF</b></td><td style="width: 100%" ><b><?php echo  $asf; ?></b></td>
           </tr>
          <tr>
           <td colspan="2" style=""><b>PPN</b></td><td><b><?php echo   $ppn; ?></b></td>
           </tr>
            <tr>
           <td colspan="2"><b>PPh</b></td><td><b>(<?php echo   $pph; ?>)</b></td>
           </tr>
           <tr>
          
            <td colspan="2"><b>Total Summary</b></td><td><b><?php echo   $total; ?></b></td>
           </tr></b>
             
            
          </tfoot> -->
      </table>
      </center>


              <!-- item quotation -->
     <div style="page-break-after:always"></div>         
     
      <h4 ><b>Non-Fee Cost</b></4>
        <?php
        foreach ($quotation_sub_item as $name) :
          $no = 0;
          if ($name->metode == "Non-Fee Cost") {

        ?>


            <!-- <center>
              <h6 align="center"><?php echo  $name->name ?></h6>
            </center> -->

          
           

            <table class="table" style="width: 100%;" id="tbl1" align="center" border="1" align="center" >
              <thead class="thead-dark">
              <tr>
              <td colspan="6"> <h6 align="center" style="font-size: 20px;"><?php echo  $name->name ?></h6></td>
              </tr>
                <tr>
                  <th style="width: 8%">
                    <center>No</center>
                  </th>
                  <th style="width: 25%">
                    <center>Description</center>
                  </th>
                  <th style="width: 12%">
                    <center>Quantity</center>
                  </th>
                  <th style="width: 12%">
                    <center>Frequency</center>
                  </th>
                  <th style="width: 15%">
                    <center>Rate </center>
                  </th>
                  <th>
                    <center style="width: 20%">Subtotal</center>
                  </th>
                </tr>
              </thead>

              <tbody>
                <?php
                $total = 0;
                foreach ($quotation_item as $k) :



                ?>

                  <?php if ($name->name == $k->name_item) {
                    $no++;
                    $subtotal = (str_replace('.', '', $k->subtotal));
                    $total = $total + $subtotal;



                  ?>
                    <tr>
                      <td style="width: 8%">
                        <center><?php echo $no; ?></center>
                      </td>
                      <td style="width: 25%"><?php echo $k->item_value; ?></td>
                      <td style="width: 2%">
                        <center><?php echo $k->quantity . " " . $k->satuanq; ?></center>
                      </td>
                      <td style="width: 2%">
                        <center><?php echo $k->frrequency . " " . $k->satuanf; ?></center>
                      </td>
                      <td style="width: 15%" align="right">
                        <right><?php echo number_format($k->rate, 0, ",", ".");; ?></right>
                      </td>
                      <td style="width: 20%" align="right"> <?php echo number_format($k->subtotal, 0, ",", "."); ?></td>
                    </tr>
                  <?php  } ?>
                <?php endforeach ?>

              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5"><b>Grand Total</b></td>

                  <td align="right"><b> <?php echo number_format($total, 0, ",", "."); ?></b></td>
                </tr>
              </tfoot>
            </table>
            </center>
            <?php $no = 0; ?>
          <?php } ?>
        <?php endforeach ?>
        <?php $total = 0; ?>
        






        <h4><b>Commissionable Cost</b></4>
        <?php
        foreach ($quotation_sub_item as $name) :
          $no = 0;
          if ($name->metode == "Comissionable Cost") {

        ?>


            <table style=" width: 100%" id="tbl1" align="center" border="1" align="center">
              <thead class="thead-dark">
              <tr>
              <td colspan="6"> <h6 align="center" style="font-size: 20px;"><?php echo  $name->name ?></h6></td>
              </tr>
                <tr>
                  <th scope="col" style="width: 8%">
                    <center>No</center>
                  </th>
                  <th scope="col" style="width: 25%">
                    <center>Description</center>
                  </th>
                  <th scope="col" style="width: 10%">
                    <center>Quantity</center>
                  </th>
                  <th scope="col" style="width: 10%">
                    <center>Frequency</center>
                  </th>
                  <th scope="col" style="width: 20%">
                    <center>Rate </center>
                  </th>
                  <th scope="col" style="width: 25%">
                    <center>Sub Total</center>
                  </th>
                </tr>
              </thead>

              <tbody>
                <?php
                $total = 0;
                foreach ($quotation_item as $k) :


                ?>

                  <?php if ($name->name == $k->name_item) {
                    $no++;
                    $subtotal = (str_replace('.', '', $k->subtotal));
                    $total = $total + $subtotal;


                  ?>
                    <tr>
                      <td style="width: 8%">
                        <center><?php echo $no; ?></center>
                      </td>
                      <td style="width: 25%"><?php echo $k->item_value; ?></td>
                      <td style="width: 12%">
                        <center><?php echo $k->quantity . " " . $k->satuanq; ?></center>
                      </td>
                      <td style="width: 12%">
                        <center><?php echo $k->frrequency . " " . $k->satuanf; ?></center>
                      </td>
                      <td style="width: 15%" align="right"> <?php echo number_format($k->rate, 0, ",", "."); ?></td>
                      <td style="width: 20%" align="right"><?php echo number_format($k->subtotal, 0, ",", "."); ?></td>
                    </tr>
                  <?php  } ?>
                <?php endforeach ?>


              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5"><b>Grand Total</b></td>

                  <td align="right"><b><?php echo number_format($total, 0, ",", "."); ?></b></td>
                  <?php $total = 0; ?>
                </tr>

              </tfoot>
            </table>
            </center>
            <?php $no = 0; ?>
          <?php } ?>
        <?php endforeach ?>





  </div>
  <!-- /.col -->
  </div>

  <!-- /.row -->
  </section>

  <!-- /.content -->
  </div>
  <!-- ./wrapper -->

</body>

</html>