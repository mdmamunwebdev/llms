@extends('llms.master')

@section('header')

    <!doctype html>
    <html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>LLMS |  Admin &  @yield("title")</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="llms abdullah al mamun" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset("/") }}llms/assets/images/favicon.ico">

        <link href="{{ asset("/") }}llms/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">

        <link href="{{ asset("/") }}llms/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset("/") }}llms/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/") }}llms/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset("/") }}llms/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset("/") }}llms/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset("/") }}llms/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset("/") }}llms/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!--LLMS Css-->
        <link rel="stylesheet" href="{{ asset("/") }}llms/assets/css/llms.css">

    </head>

@endsection
