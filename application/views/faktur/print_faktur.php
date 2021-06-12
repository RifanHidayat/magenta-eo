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



    #tbl1 th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;

      color: black;
    }

    table tr td {
      font-size: 8px;
    }

    table tr th {
      font-size: 10px;
    }

    p {
      font-size: 8px;

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

      <img style="margin-top: -50px" id="imagedeposit" src="<?php echo base_url('images/logo.png') ?>" alt="" class="logo" width="150" height="50">

      <!-- info row -->

      <!-- /.row -->
      <div class="row invoice-info">
        <div class="col-9 invoice-col">
          <br>
          <p>PT.Magenta Mediatama<br>


            Jl. Raya kebayon Lama No 15 RT.04 RW.03 Grppl Utara<br>
            Kebayon Lama Jakarta Selatan DKI Jakarta-12210
            <br>
            phone (021) 53660077-08;Fax(021)53660099
          </p>
          <br>
          <br>
          <table style="margin-top: -30px">
            <tr>

              <td style="width: 100px;">Tagihan Ke</td>
              <td style="width: 150px;"><?php echo $nama; ?></td>

            </tr>
            <tr>

              <td style="height: 70px"></td>
              <td style="height: 70px; width:150px;"><?php echo $alamat; ?></td>



            </tr>

          </table>


        </div>
        <!-- /.col -->


        <!-- /.col -->
        <div class="float-right">

          <br>
          <table align="right" style="margin-top: -180px">

            <tr>

              <td>No Faktur</td>
              <td>:</td>
              <td><?php echo $faktur_number ?></td>

            </tr>
            <tr>

              <td>No Seri Faktur Pajak</td>
              <td>:</td>
              <td><?php echo  $seri_faktur ?></td>

            </tr>
            <tr>

              <td>Tanggal Faktur</td>
              <td>:</td>
              <td><?php echo  $date_faktur ?></td>

            </tr>

            <tr style="height: 150px;">
              <td style="height: 30px;"></td>
            </tr>


            <tr>

              <td>NPWP</td>
              <td>:</td>
              <td><?php echo $npwp; ?></td>

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

              <td>Syarat Pembayaran</td>
              <td>:</td>
              <td><?php echo  $syarat_pembayaran ?></td>

            </tr>
          </table>
          <br>
          <br>




        </div>


        <div class="float-left">

          <!--  <p>&ensp; &ensp; &ensp;Nama Jalan</p> -->
          <br>

        </div>


        <br>


      </div>
      <hr style="height: 5px; border-width: 6px; background-color:#696969;">

      <!-- Table row -->

      <div class="row invoice-info">



        <!-- /.col -->









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
                <th style="width: 20%">
                  <center>Deskripsi Barang</center>
                </th>
                <th style="width: 20%">
                  <center>Keterangan
                </th>
                <th style="width: 5%">
                  <center>KTS</center>
                </th>
                <th style="width: 20%">
                  <center>Harga Satuan</center>
                </th>
                <th style="width: 30%">
                  <center>Ammount</center>
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
                    <td><?php echo $jml ?></td>
                    <td><?php echo $k->deskripsi_barang ?></td>
                    <td><?php echo $k->keterangan ?></td>
                    <td>
                      <center><?php echo $k->kts ?></center>
                    </td>
                    <td align="right">
                      <p align="right"><?php echo 'IDR ' . $k->harga_satuan ?></p>
                    </td>
                    <td hidden="" align="right">
                      <p align="right"><?php echo 'IDR ' . $k->amount ?></p>
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
                      <center><?php echo $k->kts ?></center>
                    </td>
                    <td align="right">
                      <p align="right"><?php echo 'IDR ' . $k->harga_satuan ?></p>
                    </td>


                  </tr>
              <?php }
              } ?>

              <tr>

                <td style="border: none" rowspan="7" colspan="5" valign="top">
                  <p style="margin-top: -150px">Terbilang : <?php terbilang(str_replace('.', '', $total_faktur)) ?></p>
                </td>

                <th style="width: 15%">Total Sub</th>
                <th style="width: 30%" align="right">
                  <p align="right"> <?php echo 'IDR ' . $jasa ?>
                </th>
                </p>

              </tr>
              <tr>
                <th>ASF</th>
                <th style="width: 20%" align="right">
                  <p align="right"> <?php echo 'IDR ' . $asf ?></p>
                </th>


              </tr>
              <tr>
                <th>Total</th>
                <th style="width: 20%" align="right">
                  <p align="right"> <?php echo 'IDR ' . $total ?></p>
                </th>


              </tr>
              <tr>
                <th>Discount <?php if ($diskon == "") {
                                echo "0%";
                              } else {
                                echo $diskon . "%";
                              } ?>

                <th align="right">
                  <p align="right">
                    <?php
                    if ($diskon == "") {
                      echo "(0)";
                    } else {
                      echo 'IDR ' . $diskon_harga;
                    }


                    ?>
                  </p>

                </th>

              </tr>
            <tfoot>

              <tr>
                <th>PPN</th>
                <th align="right">
                  <p align="right"> <?php echo 'IDR ' . $ppn ?></p>
                </th>

              </tr>
              <tr>
                <th>PPh23</th>
                <th align="right">
                  <p align="right"> <?php echo 'IDR ' . $pph23; ?></p>
                </th>

              </tr>
              <tr>
                <th>Total Faktur</th>
                <th align="right">
                  <p align="right"> <?php echo 'IDR ' . $total_faktur; ?></p>
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
          <table style="width: 400px;">
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





        <table align="right" style="width: 200px;margin-top: -90px">
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