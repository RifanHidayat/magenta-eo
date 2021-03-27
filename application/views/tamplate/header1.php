<!DOCTYPE html>
<html>
<head>
  <style type="text/css">

    #tbl1 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tbl1 td, #tbl1 th {
  border: 1px solid #808080;
  padding: 8px;
}
#tbl2 td, #tbl2 th {
  border: 1px solid #808080;
  padding: 8px;
}
@page {margin:0 -6cm}
html {margin:0 6cm}


#tbl1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  
  color: black;
}
#tbl12 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  
  color: black;
}


#tbl1 thead{
  background-color:#808080;
  

}
#tbl1 thead th{
  color: white;
  
}
    
 #qnumber{
  display: flex;
  margin-left: 0;
  width: 60%;
  flex-direction: row;
 }
 .button1 {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
 label{
  width: 50%;
  top: 18%;
 }
 div.dt-button.buttons-columnVisibility.active {
  background: red;

}
 .table{
  border: none;
 }
 .label-success {
    background-color: #4CAF50;
}
.label-success {
    border-color: #4CAF50;
}

 .label-warning {
    background-color:#FFD700;
}
.label-warning {
    border-color: #FFD700;
}

 .label-danger {
    background-color: #F44336;
}
.label-danger {
    border-color: #F44336;
}
.label {
    display: inline-block;
    font-weight: 500;
    padding: 2px 5px 1px 5px;
    line-height: 1.5384616;
    border: 1px solid transparent;
    text-transform: uppercase;
    font-size: 10px;
    letter-spacing: 0.1px;
    border-radius: 2px;
}
 .label {
    display: inline-block;
    font-weight: 500;
    padding: 2px 5px 1px 5px;
    line-height: 1.5384616;
    border: 1px solid transparent;
    text-transform: uppercase;
    font-size: 10px;
    letter-spacing: 0.1px;
    border-radius: 2px;
}

.label {
   display: inline; 
   padding: .2em .6em .3em; 
    font-size: 75%;
   font-weight: bold; 
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}
 
 .custom-select {
  position: relative;
  font-family: Arial;
}
 input{
  width: 50%;
 }
 #kanan{
  display: flex;
  margin-left: 20%;
  width: 40%;
  flex-direction: row;
  float: right;
  margin-top: 40%
  top: 10%

 }
  #kananimg{
  display: flex;
  margin-left: 50%;
  width: 40%;

  flex-direction: row;
  float: right;
  margin-top: 40%
  top: 10%

 }

  .ttd1 {
        float: right;
       
    
        width: 200px;
     /*   border: 1px solid #000;*/
    }
   #kananasf{
  display: flex;
  position: relative;
  flex-direction: row;
  float: left;

 }
 .table {
   margin: auto;

}
   .satuan{
  display: flex;
  position: relative;
  flex-direction: row;
  float: right;

 }
 #labelasf{
  top: 20%;

 }
</style>

  <link rel="stylesheet" href="">




  <meta charset="utf-8">
  
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--   <link rel="stylesheet" href="/resources/demos/style.css"> -->



    <link href="<?php echo base_url('assets/fileinput/css/fileinput.min.css')?>" media="all" rel="stylesheet" type="text/css" />
       
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/fileinput/js/fileinput.min.js" type="text/javascript')?>"></script>
 





  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Magenta EO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/fontawesome-free/css/all.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/fontawesome-free/css/all.min.css');?>">

 
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.jqueryui.min.css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


<!-- 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->
 <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>">



  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">


  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">


  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/jqvmap/jqvmap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/dist/css/adminlte.min.css')?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/daterangepicker/daterangepicker.css')?>">
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>





  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/summernote/summernote-bs4.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">

    <script src="<?php echo base_url('assets/sweetalert/sweetalert2.all.min.js')?>"></script>


    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url('assets/lte/plugins/summernote/summernote-bs4.js')?>"></script>


  <script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
  <!-- AdminLTE App -->  
  <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <!--  <script src="<?php echo base_url('assets/dist/js/pages/dashboard.js') ?>"></script> -->
  <!-- AdminLTE for demo purposes -->
 <!--  <script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script> -->
  <script src="<?php echo base_url('assets/plugins/fileinput/fileinput.min.js') ?>"></script>
  

  


  




</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

      
 
  
  


  


