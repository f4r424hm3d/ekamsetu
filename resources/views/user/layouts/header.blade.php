<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="description" content="CRMS - Bootstrap Admin Template">
  <meta name="keywords"
    content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
  <meta name="author" content="Dreamguys - Bootstrap Admin Template">
  <meta name="robots" content="noindex, nofollow">
  @stack('title')

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/assets/img/favicon.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/css/bootstrap.min.css">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/css/font-awesome.min.css">

  <!-- Feathericon CSS -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/css/feather.css">

  <!--font style-->
  <link href="../css2?family=Inter:wght@200;300;400;500;600&display=swap" rel="stylesheet">

  <!-- Lineawesome CSS -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/css/line-awesome.min.css">

  <!-- Chart CSS -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/morris/morris.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/css/theme-settings.css">

  <!-- Wizard CSS -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/twitter-bootstrap-wizard/form-wizard.css">

  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css" class="themecls">

  <style>
    .hide-this {
      display: none;
    }

    .f-rgt {
      float: right;
    }

    .btn-xs,
    .btn-group-xs>.btn {
      padding: 1px 5px;
      font-size: 0.8571rem;
      line-height: 1.5;
      border-radius: 3px;
    }

    .float-right {
      float: right;
    }

    .chr {
      margin-top: 3px;
      margin-bottom: 3px
    }

    .just {
      text-align: justify;
      text-justify: inter-word;
    }

    .setBtn {
      margin-top: 31px;
    }

    .card {
      border: 1px solid #6d70738f !important;
    }
  </style>

</head>

<body>
  <!-- Main Wrapper -->
  <div class="main-wrapper">

    @include('user.layouts.top-bar')
    @include('user.layouts.sidebar')
