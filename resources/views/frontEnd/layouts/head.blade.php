<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>JualinAja</title>
    <link rel="icon" href="https://i.ibb.co/PWDXyMq/JAminilogo.png" type="image/png">


    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">


    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/css/slick.css') }}">

    <link type="text/css" rel="stylesheet" href="{{ asset('asset/css/slick-theme.css') }}">


    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/css/nouislider.min.css') }}">


    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css') }}">


    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

{{--  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->  --}}
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        * {
            margin: 0px auto;
            /*supaya layer otomatis mengisi dan ke tengah*/
        }

        body {
            font-family: calibri, verdana, sans-serif;
        }

        #wrapper {
            width: 100%;
        }

        #header {
            background: #0CC3AD;
            padding: 10px;
            z-index: 1000;

        }

        #header a {
            color: white;
            padding: inherit;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }


        #header a.title {
            color: #ffffff;
            font-weight: bold;
            text-decoration: none;
            font-size: 30px;
            line-height: 60px;
            padding: 0px 20px;
            /*mengatur jarak antara di kiri dan kanan saja*/
        }

        /* #content {
            position: relative;
            background: #eee;
            min-height: 1500px;
            /*tujuannya supaya konten terlihat berisi. Kalau sudah diisi teks, baris ini harus dihapus.*/
        margin: 0px 20px;
        }

        */ #footer {
            position: relative;
            background: #FF0000;
            height: 40px;
        }

        #footer a.title {
            color: #ffffff;
            text-decoration: none;
            font-size: 30px;
            line-height: 40px;
            float: right;
            padding: 0px 20px;
        }
    </style>

</head>



