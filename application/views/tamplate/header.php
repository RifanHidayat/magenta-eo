<!DOCTYPE html>
<html>

<head>
  <style type="text/css">
    #qnumber {
      display: flex;
      margin-left: 0;
      width: 60%;
      flex-direction: row;
    }

    /* Make Select2 boxes match Bootstrap3 heights: */
    .select2-selection__rendered {
      line-height: 32px !important;
    }

    .select2-selection {
      height: 34px !important;
    }

    .switch {
      position: relative;

      width: 60px;
      height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked+.slider {
      background-color: #2196F3;
    }

    input:focus+.slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    .button1 {
      background-color: #4CAF50;
      /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
    }

    label {
      width: 50%;
      top: 18%;
    }

    div.dt-button.buttons-columnVisibility.active {
      background: red;

    }

    .table {
      border: none;
    }

    .label-success {
      background-color: #4CAF50;
    }

    .label-success {
      border-color: #4CAF50;
    }

    .label-warning {
      background-color: #FFD700;
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

    .infoo {
      background-color: #2196F3;
    }

    /* Blue */
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

    input {
      width: 50%;
    }

    #kanan {
      display: flex;
      margin-left: 20%;
      width: 40%;
      flex-direction: row;
      float: right;
      margin-top: 40% top: 10%
    }

    #kanan1 {

      margin-left: 30%;
      width: 45%;

      float: right;



    }

    #kanan2 {

      margin-left: 20%;
      width: 45%;

      float: right;



    }

    #kananimg {
      display: flex;
      margin-left: 50%;
      width: 40%;

      flex-direction: row;
      float: right;
      margin-top: 40% top: 10%
    }

    .ttd1 {
      float: right;


      width: 200px;
      /*   border: 1px solid #000;*/
    }

    #kananasf {
      display: flex;
      position: relative;
      flex-direction: row;
      float: left;

    }

    .table {
      margin: auto;

    }

    .satuan {
      display: flex;
      position: relative;
      flex-direction: row;
      float: right;

    }

    #labelasf {
      top: 20%;

    }
  </style>

  <link rel="stylesheet" href="">




  <meta charset="utf-8">

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>





  <link href="<?php echo base_url('assets/fileinput/css/fileinput.min.css') ?>" media="all" rel="stylesheet" type="text/css" />

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/fileinput/js/fileinput.min.js" type="text/javascript') ?>"></script>
  <!-- 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css"> -->



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.semanticui.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.semanticui.min.css">




  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Magenta EO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/fontawesome-free/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/fontawesome-free/css/all.min.css'); ?>">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


  <!-- 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>">



  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">


  <!--   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css"> -->


  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/jqvmap/jqvmap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/dist/css/adminlte.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/daterangepicker/daterangepicker.css') ?>">
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>


  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />


  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/summernote/summernote-bs4.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

 
  <link rel="stylesheet" href="<?php echo base_url('assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>"> -->

  <script src="<?php echo base_url('assets/sweetalert/sweetalert2.all.min.js') ?>"></script>


  <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
  <script src="<?php echo base_url('assets/lte/plugins/summernote/summernote-bs4.js') ?>"></script>


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

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->

        <!--   <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
      </ul>
    </nav>