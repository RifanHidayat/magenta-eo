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
      color: black;
    }

    .tbl1 td,
    .tbl1 th {
   
      padding: 8px;
    }

    .tbl2 tr td{
      font-size: 13px

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


    .terbilang {
      font-family: "Times New Roman", Times, serif;
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

          <img style="margin-left: 45px; margin-top: 20px;" id="imagedeposit" src="<?php echo base_url('images/logo.png') ?>" alt="" class="logo" width="200" height="50" style="top: 30px;">


          <!-- info row -->

          <!-- /.row -->
          <div class="row invoice-info">
            <div class="col-9 invoice-col" >
              <br>
              <table style="width: 50%;" id="tbl1">
                <tr>
                <td style="width:20%" align="left" valign="top" >Received</td>
                <th valign="top" style="width: 5%;" >:</th>
                <td style="width: 90%;" ><?php echo $name ?><br>
               <p style="font-size: 11px;"> <?php echo $address ?></p>

                </td>
                <tr>

              
              </table>
              <table border="0" style="right: 0" align="right" style="margin-top: -100px;" class="tbl2">
  <tr>
    <th colspan="3"><h3>Penerimaan Pelanggan</h3></th>
  </tr>
  <tr>
    <td align="left" style="font-size: 12px;">Form No.</td>
    <td align="left" style="font-size: 12px;">:</td>
    <td align="left" style="font-size: 12px;"><?php echo $transaction_number?> </td>
  </tr>
  <tr>
    <td align="left" style="font-size: 12px;">Cheque Date</td>
    <td align="left" style="font-size: 12px;">:</td>
    <td align="left" style="font-size: 12px;"><?php echo date('d F Y', strtotime($date_payment))?> </td>
  </tr>

  <tr>
    <td align="left" style="font-size: 12px;">Cheque No.</td>
    <td align="left" style="font-size: 12px;">:</td>
    <td align="left" style="font-size: 12px;"><?php echo ""?> </td>
  </tr>

  <tr>
    <td align="left" style="font-size: 12px;">Bank</td>
    <td align="left" style="font-size: 12px;">:</td>
    <td align="left" style="font-size: 12px;"><?php echo $account_number.'-'.$bank_name?> </td>
  </tr>
</table>


            
            </div>
            <!-- /.col -->

            <!-- date('d F Y', strtotime($date)) -->
            <!-- /.col -->






          </div>
          <br>
        
         

          <div class="row">
            <div class="col-13 table-responsive justify-content">


            

            <table id="tbl1" align="center" style="width: 100%" border="1" align="center">
                <thead class="thead-dark">
                  <tr>
                    <th style="width: 15%">
                    <span style="color:black; font-size: 12px;" ><center>Invoide No.</center></span>
                    </th>
                    <th style="width: 15%">
                    <span style="color:black; font-size: 12px;" ><center>Date</center></span>
                    </th>
                    <th style="width: 15%">
                    <span style="color:black; font-size: 12px;" ></center>Due</center></span>
                    </th>
                    <th style="width: 20%">
                    <span style="color:black; font-size: 12px;" ><center>Amount<center></span>
                    </th>
                    <th style="width: 20%">
                    <span style="color:black;font-size: 12px; " >Payment Amount</span>
                    </th>
                   
                  </tr>
                </thead>
                <tbody>
             <?php $no=0;
             foreach ($transactions as $k):
              $no++;

              ?>
          <tr>
     
            <td align="left" style="font-size: 12px;"><?php echo $k->faktur_number ?></td>
            <td style="font-size: 12px;"><center ><?php echo date('d F Y', strtotime($k->date_faktur)) ?></center></td>
            <td style="font-size: 12px;"><center><?php echo date('d F Y ', strtotime($k->date_faktur. ' + '.$k->due_faktur.' days')); ?></center></td>
            <td align="right" style="font-size: 12px;"><?php echo number_format($k->total_faktur ,0,',','.')?></td>
             <td align="right" style="font-size: 12px;"> <?php echo number_format($k->amount ,0,',','.') ?></td>
         
          </tr>
           <?php endforeach ?>
          
          </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
         

          <div align="right" >
          <table style="width:30%"   align="right">
          <tr>
          <td>
          <span font-size: 12px;>Total Payment :</span>
          <td>
          <td align="right">
          <span font-size: 12px;><?php echo number_format($total_payment ,0,',','.')?></span>
          <td>
          </tr>
          </table>
          <div>

          
          



          <table style="width:100%" >

            <tr>

              <td style="width: 15px" >say</td>
              <td style="width: 10px">:</td>
              <td >
              <p class='terbilang' style="margin-top: -150px;">Terbilang : <?php terbilang($total_payment) ?>
              </td>


            </tr>
           
          </table>

          <!-- /.row -->

          <div class="float-right" >
        <br>
        
             <table align="right" id="tbl1" style="width: 100%;">
          
          <tr>
            
            <td style="font-size: 12px;" ><center><font size="50px" >Prepared By</center></td>
            <td style="font-size: 12px;" ><center>Reviewed By</center></td>
           
            <td style="font-size: 12px;" ><center>Received By</center></td>
          <tr >
            
            <td style="height: 50px;font-size: 12px;"><center></center></td>
               <td style="height: 50px;font-size: 12px;" ><center></center></td>
             
               <td style="height: 50px;font-size: 12px;"><center></center></td>
           

          </tr>
         
           

          </tr>
           <tr>
            
               <td style="width: 200px;font-size: 12px;" ><center><hr style="  border: 1px solid black; width: 50%"></center></td>
             
               <td style="width: 200px;font-size: 12px;"><center><hr style="  border: 1px solid black;  width: 50%"></center></td>
             <td style="width: 200px;font-size: 12px;" ><center><hr style="  border: 1px solid black;  width: 50%"></center></td>
           
             

          </tr>

          <tr>
            
            <td style="width: 200px;font-size: 12px;" ><center>Tanggal</center></td>
          
            <td style="width: 200px;font-size: 12px;" ><center>Tanggal</center></td>
            <td style="width: 200px;font-size: 12px;" ><center>Tanggal</center></td>
        
          

       </tr>
      
         
        </table>
        <br>
         <br>
             
         <br>
           <br>
     
        

    
      </div>
          <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
  <?php

function penyebut($nilai)
{
  $nilai = abs($nilai);
  $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  $temp = "";
  if ($nilai < 12) {
    $temp = " " . $huruf[$nilai];
  } else if ($nilai < 20) {
    $temp = penyebut($nilai - 10) . " belas";
  } else if ($nilai < 100) {
    $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
  } else if ($nilai < 200) {
    $temp = " seratus" . penyebut($nilai - 100);
  } else if ($nilai < 1000) {
    $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
  } else if ($nilai < 2000) {
    $temp = " seribu" . penyebut($nilai - 1000);
  } else if ($nilai < 1000000) {
    $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
  } else if ($nilai < 1000000000) {
    $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
  } else if ($nilai < 1000000000000) {
    $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
  } else if ($nilai < 1000000000000000) {
    $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
  }
  return $temp;
}

function terbilang($nilai)
{
  if ($nilai < 0) {
    $hasil = "minus " . trim(penyebut($nilai));
  } else {
    $hasil = '# '.trim(penyebut($nilai));
  }
  echo $hasil;
}
?>


  <script type="text/javascript">



function terbilang(bilangan) {

bilangan = String(bilangan);
var angka = new Array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
var kata = new Array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan');
var tingkat = new Array('', 'Ribu', 'Juta', 'Milyar', 'Triliun');

var panjang_bilangan = bilangan.length;

/* pengujian panjang bilangan */
if (panjang_bilangan > 15) {
  kaLimat = "Diluar Batas";
  return kaLimat;
}

/* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
for (i = 1; i <= panjang_bilangan; i++) {
  angka[i] = bilangan.substr(-(i), 1);
}

i = 1;
j = 0;
kaLimat = "";


/* mulai proses iterasi terhadap array angka */
while (i <= panjang_bilangan) {

  subkaLimat = "";
  kata1 = "";
  kata2 = "";
  kata3 = "";

  /* untuk Ratusan */
  if (angka[i + 2] != "0") {
    if (angka[i + 2] == "1") {
      kata1 = "Seratus";
    } else {
      kata1 = kata[angka[i + 2]] + " Ratus";
    }
  }

  /* untuk Puluhan atau Belasan */
  if (angka[i + 1] != "0") {
    if (angka[i + 1] == "1") {
      if (angka[i] == "0") {
        kata2 = "Sepuluh";
      } else if (angka[i] == "1") {
        kata2 = "Sebelas";
      } else {
        kata2 = kata[angka[i]] + " Belas";
      }
    } else {
      kata2 = kata[angka[i + 1]] + " Puluh";
    }
  }

  /* untuk Satuan */
  if (angka[i] != "0") {
    if (angka[i + 1] != "1") {
      kata3 = kata[angka[i]];
    }
  }

  /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
  if ((angka[i] != "0") || (angka[i + 1] != "0") || (angka[i + 2] != "0")) {
    subkaLimat = kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " ";
  }

  /* gabungkan variabe sub kaLimat (untuk Satu blok 3 angka) ke variabel kaLimat */
  kaLimat = subkaLimat + kaLimat;
  i = i + 3;
  j = j + 1;

}

/* mengganti Satu Ribu jadi Seribu jika diperlukan */
if ((angka[5] == "0") && (angka[6] == "0")) {
  kaLimat = kaLimat.replace("Satu Ribu", "Seribu");
}

$('[name="terbilang1"]').html(kaLimat + " Rupiah");
if (kaLimat == "") {
  return "0" + " Rupiah";

} else {
  return kaLimat + " Rupiah";


}


}
    window.addEventListener("load", window.print());
  </script>
</body>

</html>