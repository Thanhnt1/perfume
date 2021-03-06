<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}" />

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Custom fonts for this template-->
    <link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Custom styles for this template and Boostrap 4.0.7 -->
    <link href="/admin/css/sb-admin-2.css" rel="stylesheet">

    {{-- Jquery UI --}}
    <link rel="stylesheet" href="/admin/vendor/jquery-ui/jquery-ui.min.css">

    {{-- Datatable --}}
    <link rel="stylesheet" href="/admin/js/Datatables/datatables.min.css">

    <!-- Dropzone -->
    <link rel="stylesheet" href="/admin/vendor/dropzone/dropzone.css">

    {{-- Select2 --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" /> --}}

    {{-- Summernote --}}
    <link href="/admin/vendor/summernote/summernote.min.css" rel="stylesheet">
    
    {{-- Custom --}}
    <link rel="stylesheet" href="/admin/css/custom-css.css">

    @yield('custom-css')
</head>
