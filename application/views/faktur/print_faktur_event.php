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

     table tr td {
       font-size: 8px;
     }

     table tr th {
       font-size: 10px;
     }

     p {
       font-size: 8px;

     }

     #tbl1 th {
       padding-top: 5px;
       padding-bottom: 5px;
       text-align: left;
       color: black;
     }

     .footer{
       width: 50%;
    
    display: flex;
    justify-content: space-between; 

     }
     .footer{
       width: 50%;
    
    display: flex;
    justify-content: space-between; 

     }

     /*   .element {
     
       
        margin-right: 70px;
        top: 100px;
      
        border: 1px;
      
         border: 1px solid #000;
      
    }*/



     #tbl1 thead th {
       color: black;

     }
   </style>



 </head>

 <body>

   <section class="invoice">
     <div class="float-right">
       <h4 align="right"><b>Faktur Penjualan</b></h4>
       <br>
     </div>

     <img style="margin-top: -40px" id="imagedeposit" src="<?php echo base_url('images/logo.png') ?>" alt="" class="logo" width="150" height="40">


     <!-- /.col -->

     <!-- info row -->

     <div class="row invoice-info">
      
        
         <p>PT.Magenta Mediatama<br>
           Jl. Raya kebayoran Lama No.15 RT.04 RW.03 Grogol Utara,<br>
           Kebayoran Lama,Jakarta Selatan DKI Jakarta-12210
           <br>phone (021) 53660077-08;Fax(021)53660099
         </p>
         <font size="2">
           <table style=" font-size:10%" style="width:50%" >
             <tr>
               <td style="width: 15%;">Tagihan Ke</td>
               <td style="width: 35%;"><?php echo $nama; ?></td>

             </tr>
             <tr>

               <td style="height: 15%"></td>
               <td style="width: 35%;" text-align: justify;><?php echo $alamat; ?></td>



             </tr>

           </table>
         </font>


       
       <!-- /.col -->


       <!-- /.col -->
       <div class="float-right">
         <!-- <h2>Faktur Penjualan</h2> -->
         <br>
         <br>
         <br>
         <table align="right" style="margin-top: -180px;font-size:80%" >

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

             <td>Tgl Faktur</td>
             <td>:</td>
             <td><?php echo date('d F Y', strtotime($date_faktur))  ?></td>

           </tr>

           
           <tr style="margin-top: 40px">


             <td>NPWP</td>
             <td>:</td>
             <td><?php echo $npwp; ?> </td>

           </tr>
           <tr style="height: 100px;">
             <td style="height: 5px;"></td>
           </tr>
           <tr>

             <td>PO Number</td>
             <td>:</td>
             <td><?php echo  $po_number ?></td>

           </tr>
           <tr>

             <td>GR Number</td>
             <td>:</td>
             <td><?php echo  $gr_number ?></td>

           </tr>
           <tr>

             <td>Term of Payment</td>
             <td>:</td>
             <td><?php echo  $syarat_pembayaran ?></td>

           </tr>
         </table>
       </div>
     </div>
    
     <!-- Table row -->
     <div class="row" style="margin-top: 20px;">


       <div class="col-13 table-responsive justify-content">
         <table id="tbl1" align="center" border="1" align="center">
           <thead style="background-color: black">
             <tr>
               <th scope="col" style="width: 10%;">
                 <center>No</center>
               </th>
               <th scope="col" style="width: 50%;" colspan="4">
                 <center>Description</center>
               </th>
               <th scope="col" style="width: 40%;" colspan="1">
                 <center>Total</center>
               </th>

             </tr>

           </thead>
           <tbody>
             <tr>
               <td>
                 <center>1
               </td>

               <td colspan="4">Material-<?php echo $title; ?></td>

               <!--  <td align="right"><p align="right">IDR 
                    <?php

                    echo $material;

                    ?>
                   </p>
                      
                    </td> -->

               <td align="right">
                 <p align="right"><?php echo  $material; ?>
               </th>

             </tr>
             <tr>
               <td>
                 <center>2</center>
               </td>
               <td colspan="4">Jasa - ASF </td>
               <td align="right">
                 <p align="right"><?php echo  $asf ?>
               </td>

             </tr>



             <tr>

               <td style="border: none" colspan="4" rowspan="6" valign="top">
                 <p style="margin-top: -150px" style="font-size: 10px;">Terbilang : <?php terbilang(str_replace('.', '', $total_faktur))?>
               </td>
               <th style="width: 20%">Subtotal</th>

               <td style="width: 30%;" align="right">
                 <p align="right">
                   <?php

                    echo $sub_total;
                    ?>
               </td>
             </tr>
             <tr>

               <th>Discount

               </th>

               <td align="right">
                 <p align="right">
                   <?php
                    if ($diskon == "") {
                      echo "(0)";
                    } else {

                      echo '(' . number_format($diskon_harga, 0, ',', '.') . ')';
                    }


                    ?>


               </td>


             </tr>
             <tr>

               <th>Netto</th>

               <td align="right">
                 <p align="right">
                   <?php

                    echo  $netto2;



                    ?>


               </td>

             </tr>

             <tr>

               <th>PPN</th>

               <td align="right">
                 <p align="right">
                   <?php

                    echo number_format($ppn, 0, ',', '.')



                    ?>


               </td>

             </tr>
             <tr>

               <th>PPh23</th>

               <td align="right" s>
                 <p align="right">
                   <?php

                    echo "(" . number_format($pph23, 0, ',', '.') . ')'



                    ?>


               </td>

             </tr>

             <tr>

               <th>Total Faktur</th>

               <th align="right">
                 <p align="right">
                   <?php

                    echo  number_format($total_faktur, 0, ',', '.')



                    ?>
                 </p>


               </th>

             </tr>
           </tbody>
         </table>


         <div class="float-right"  >
           <br>

           <table align="right" style="width: 200px;font-size:80%">

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
           </table>
         </div>
       </div>
       <!-- /.col -->

       <!-- /.row -->
    
       <div class="row" style="margin-top: -110px;"  >
         <!-- accepted payments column -->
         <div class="footer" >
           <br>
           <br>
           <table style="width: 400px;font-size:80%" >
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
               <td style="width: 270px;">Jl. Mangga Dua Raya, Kom.ITC Mangga Dua LT.IV JKT</td>
             </tr>

             <tr>

               <td>Account Number</td>
               <td>:</td>
               <td style="width: 250px;">48017899999</td>
             </tr>
           </table>

         </div>
 

 
       </div>

       
      
   </section>
   
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
      echo $hasil." rupiah";
    }
    ?>



   <script type="text/javascript">
     $(document).ready(function() {
       var data = '<?php echo (str_replace('.', '', $total_faktur)) ?>';

       terbilang(data);
       //   $('#tbl1').hidden();
      


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

     function cekFaktur(id) {
       $.ajax({
         type: "post",
         url: '<?php echo base_url("Faktur/cekFaktur/") ?>',
         data: 'quotation_number=' + id,
         dataType: 'json',

         success: function(hasil) {

           if (hasil.status == 'tersedia') {
             <?php if (in_array('updateBast', $user_permission)) { ?>
               Swal.fire({
                 icon: 'info',
                 title: 'Oops...',
                 text: 'Data Faktur sudah tersedia',

               });


               //      Swal.fire({
               //     title: 'Oops',
               //     text: "Data Faktur sudah tersedia,Apakah mau lanjut ke Update Faktur?",
               //     icon: 'info',
               //     showCancelButton: true,
               //     confirmButtonColor: '#3085d6',
               //     cancelButtonColor: '#808080',
               //     cancelButtonText: 'Tidak',
               //     confirmButtonText: 'Iya'  
               //     }).then((result) => {
               //     if (result.value) {
               //       window.location = "<?php echo base_url('Faktur/edit_faktur/') ?>"+hasil.quotation_number;

               //   }
               // });
             <?php } else { ?>
               Swal.fire({
                 icon: 'info',
                 title: 'Oops...',
                 text: 'Data Faktur sudah tersedia',

               });
             <?php } ?>

           } else {
             window.location = "<?php echo base_url('Faktur/create_faktur/') ?>" + hasil.quotation_number + '/' + id;
           }


         },
         error: function(hasil) {



         }


       });


     }

     $("#fakturMainNav").addClass('active');

     $("#openFakturNav").addClass('menu-open');
   </script>