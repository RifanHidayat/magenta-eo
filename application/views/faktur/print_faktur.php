<!DOCTYPE html>
<html>

<head>
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
    

    .table_footer{
      page-break-inside: avoid;
    }

    #tbl1 th {
      padding-top: 5px;
      padding-bottom: 5px;
      text-align: left;

      color: black;
    }

    table tr td {
      
      
      font-size: 10px;
    }

    table tr th {
      font-size: 10px;
    }

    p {
      font-size: 10px;

    }




    #tbl1 thead th {
      color: black;

    }
  </style>

  </style>

</head>

<body>
  <div class="wrapper">

    <section class="invoice">
      <div class="float-right">
        <h4 style=" margin-top: 15px" align="right"><b>Faktur Penjualan</b></h4>
      </div>

      <img style="margin-top: -40px" id="imagedeposit" src="<?php echo base_url('images/logo.png') ?>" alt="" class="logo" width="160" height="40">

      <!-- info row -->

      <!-- /.row -->
      <div class="row invoice-info">
        <div class="col-9 invoice-col">
          
          <p>PT.Magenta Mediatama<br>


            Jl. Raya kebayon Lama No 15 RT.04 RW.03 Grogol Utara<br>
            Kebayon Lama Jakarta Selatan DKI Jakarta-12210
            <br>
            phone (021) 53660077-08;Fax(021)53660099
          </p>
          
          <table style="margin-top: 0px" style="width: 60%; " >
            <tr>

              <td style="width: 5%;">Tagihan Ke</td>
              <td style="width: 5%;"><?php echo $nama; ?></td>

            </tr>
            <tr>

              <td style="height: 10px"></td>
              <td style="height: 10px; width:150px;"><?php echo $alamat; ?></td>



            </tr>

          </table>


        </div>
        <!-- /.col -->


        <!-- /.col -->
        <div class="float-right">

          <br>
          <table align="right" style="margin-top: -120px">

            <tr>

              <td>No Faktur</td>
              <td>:</td>
              <td><?php echo $faktur_number ?></td>

            </tr>
            <tr>

              <td>No. Faktur Pajak</td>
              <td>:</td>
              <td><?php echo  $seri_faktur ?></td>

            </tr>
            <tr>

              <td>Tanggal Faktur</td>
              <td>:</td>
              <td><?php echo date('d F Y', strtotime($date_faktur))  ?></td>

            </tr>

            


            <tr>

              <td>NPWP</td>
              <td>:</td>
              <td><?php echo $npwp; ?></td>

            </tr>
            <tr style="height: 100px;">
              <td style="height: 10px;"></td>
            </tr>
            <tr>

              <td>PO Number</td>
              <td>:</td>
              <td><?php echo  $ref ?></td>

            </tr>
            <tr>

              <td>GR Number</td>
              <td>:</td>
              <td><?php echo  $ref ?></td>

            </tr>
            <tr>

              <td>Term of Payment</td>
              <td>:</td>
              <td><?php echo  $syarat_pembayaran ?></td>

            </tr>
          </table>
        </div>


        <div class="float-left">

          <!--  <p>&ensp; &ensp; &ensp;Nama Jalan</p> -->
          <br>

        </div>


       


      </div>
     

      <!-- Table row -->

      <div class="row invoice-info">

      </div>
      <div class="row">




        <div class="col-13 table-responsive justify-content">


          <table style="width: 92%;margin-left: 45px;" id="tbl1" align="center" style="margin: auto;" border="1" align="center">
            <thead class="thead-dark">
              <tr>
                <th style="width: 5%">
                  <center>No</center>
                </th>
                <th style="width: 10%">
                  <center>Barang</center>
                </th>
                <th style="width: 30%">
                  <center>Deskripsi Barang</center>
                </th>
                <th style="width: 20%">
                  <center>Keterangan
                </th>
                <th style="width: 5%">
                  <center>Quantity</center>
                </th>
                <th style="width: 5%">
                  <center>KTS</center>
                </th>
                <th style="width: 20%">
                  <center>Harga Satuan</center>
                </th>
                <th style="width: 20%">
                  <center>Amount</center>
                </th>
              </tr>
            </thead>

            <tbody>
              <?php $no = 0;
              if ($jml == '1') {
                foreach ($faktur_item as $k) {
                  $no++;

              ?>
                  <tr>
                    <td>
                      <center><?php echo $no ?></center>
                    </td>
                    <td><?php echo $k->barang ?></td>
                    <td><?php echo $k->deskripsi_barang ?></td>
                    <td><?php echo $k->keterangan ?></td>
                    <td>
                      <center><?php echo $k->quantity ?></center>
                    </td>
                    <td>
                      <center><?php echo $k->kts ?></center>
                    </td>
                    <td align="right">
                      <span align="right"><?php echo  number_format($k->harga_satuan, 0, ',', '.') ?></span>
                    </td>
                    <td hidden="" align="right">
                      <span align="right"><?php echo  number_format($k->amount, 0, ',', '.') ?></span>
                    </td>

                  </tr>



                <?php }
              } else {
                foreach ($faktur_item as $k) {
                  $no++;

                ?>
                  <tr>
                    <td>
                      <center><?php echo $no ?></center>
                    </td>
                    <td><?php echo $k->barang ?></td>
                    <td><?php echo $k->deskripsi_barang ?></td>
                    <td><?php echo $k->keterangan ?></td>
                    <td>
                      <center><?php echo $k->quantity ?></center>
                    </td>
                    <td>
                      <center><?php echo $k->kts ?></center>
                    </td>
                    <td align="right">
                      <span align="right"><?php echo  number_format($k->harga_satuan, 0, ',', '.') ?></span>
                    </td>


                  </tr>
              <?php }
              } ?>

              <tr>

                <td style="border: none" rowspan="7" colspan="6" valign="top">
                  <p style="margin-top: -150px">Terbilang : <?php terbilang(str_replace('.', '', $total_faktur)) ?></p>
                </td>

                <th style="width: 15%">Subtotal</th>
                <td style="width: 24%" align="right">
                  <span align="right"> <?php echo $sub_total ?></span>
                </td>
               

              </tr>
              <tr>
                <th>ASF</th>
                <td style="width: 20%" align="right">
                  <span align="right"> <?php echo  $asf ?></span>
                </td>


              </tr>
              <tr>
                <th>Discount

                <td align="right">
                  <span align="right">
                    <?php
                    if ($diskon == "") {
                      echo "(0)";
                    } else {
                      echo $discount;
                    }


                    ?>
                  </span>

                </td>

              </tr>
              <tr>
                <th>Netto</th>
                <td style="width: 20%" align="right">
                  <span align="right"> <?php echo  $netto ?></span>
                </td>


              </tr>

            <tfoot>

              <tr>
                <th>PPN</th>
                <td align="right">
                  <span align="right"> <?php echo $ppn ?></span>
                </td>

              </tr>
              <tr>
                <th>PPh23</th>
                <td align="right">
                  <span align="right"> <?php echo   $pph; ?></span>
                </td>

              </tr>
              <tr>
                <th>Total Faktur</th>
                <th align="right">
                  <span align="right"> <?php echo  $total_faktur; ?></span>
                </th>

              </tr>


            </tfoot>




            </tbody>
          </table>

        </div>
        <!-- /.col -->
      </div>


      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <br>
          <br>
          <table style="width: 400px;" class="table_footer">
            <tr>
              <td colspan="3">Pembayaran dapat ditransfer ke rekening</td>
            </tr>

            <tr>

              <td>Nama Account</td>
              <td>:</td>
              <td>PT.Magenta Mediatama</td>

            </tr>
            <tr>

              <td>Nama Bank</td>
              <td>:</td>
              <td>BCA KCP Mangga Dua ITC</td>

            </tr>
            <tr>

              <td>Alamat Bank</td>
              <td>:</td>
              <td style="width: 270px;">Jl Mangga Dua Raya, Kom.ITC Mangga Dua LT.IV JKT</td>
            </tr>

            <tr>

              <td>Account Number</td>
              <td>:</td>
              <td style="width: 250px;">48017899999</td>
            </tr>
          </table>
        </div>
        <table align="right" style="width: 200px;margin-top: -90px" class="table_footer">
          <tbody>
            <tr>
              <td style="width: 200px">
                <center>Hormat Kami</center>
              </td>
            </tr>
            <tr>
              <td style="width: 150px">
                <center>PT. Magenta Mediatama</center>
              </td>
            </tr>
            <tr>
              <td style="height: 50px;"></td>
            </tr>
            <tr>
              <td style="width: 150px">
                <center>Yo Tinco</center>
              </td>
            </tr>
          </tbody>
        </table>
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
      $hasil = trim(penyebut($nilai));
    }
    echo $hasil;
  }
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      var data = '<?php echo (str_replace('.', '', $total_faktur)) ?>';

      terbilang(data);
      window.addEventListener("load", window.print());



    });


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
  </script>



</body>

</html>