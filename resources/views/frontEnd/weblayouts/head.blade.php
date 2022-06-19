<!DOCTYPE html>
<html lang="en">
<style type="text/css">
   * {
      box-sizing: border-box;
    }

    .footer {
      position:fixed;
      bottom:0px;
      left:0;
      width:100%;
      height: 50px;
      background-color: white;
      border: 1px;
      z-index: 10;
      border-top: 1px solid #A9A9A9;

    }

    .footer-text-left {
          font-size:30px;
          width:100%;
          padding-top:10px;
          float:center;
          /*word-spacing:5px;*/
          text-align: center;  
    }

    a.menu:hover {
      background-color:transparent;
      font-size:20px;
      color: #DCDCDC;
    }

    .icon-style {
          height:50px;
          margin-left:20px;
          margin-top:5px;
          color: #808080
    }

    .icon-style:hover {
      background-color:yellow;
      height:10px;
      color: orange;
    }

    #GFG {
      text-decoration: none;
    }

    .badge {
          padding-left: 0px;
          padding-right: 0px;
          -webkit-border-radius: 9px;
          -moz-border-radius: 9px;
          border-radius: 9px;
          color: #808080
    }

    #lblCartCount {
        font-size: 12px;
        background: transparent;
        color: black;
        padding-left: -200px;
        vertical-align: top;
        margin-left: -10px; 
        font-weight: bold;
        color: #808080
    }


    #home {
      font-size: 10px;
      background-color: transparent;
      color: black;
      vertical-align:bottom;
      right: 37px;
      bottom: -10px;
      text-align: center;
      position: relative;
  }

  #cart {
      font-size: 10px;
      background-color: transparent;
      color: black;
      vertical-align:bottom;
      right: 50px;
      bottom: -10px;
      text-align: center;
      position: relative;
      color: #808080
  }

  #test {
    width: 200px;
    height: 20px;
    margin: 0;
    background-color: transparent;
    display: absolute;
    text-align: left;
  }

  #descriptions {
    width: 100%;
    height: 120px;
    margin: 0;
    background-color: transparent;
    display: absolute;
    text-align: left;

  }

  #address {
    width: 100%;
    height: 50px;
    margin: 0;
    background-color: transparent;
    display: absolute;
    text-align: right;
    /*padding-left: 3000px;*/

  }

  .heading1 {
    border-bottom: 1px solid #aaa;
  }

  #imgfile {
    opacity: 1;
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
    height: 180px;
  }

  #imgfiledetail {
    opacity: 1;
    height: 300px;
    width: 100%;
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;

  }

  .div {
      width: 50%;
      height: 30px;
      background: transparent;
      border-radius: 10px;
      margin-left: 5px;
      font-family: 'Roboto-Regular';
      font-size: 20px;
  }

  .topdiv {
      font-family: 'Roboto-Regular';
      font-size: 20px;
  }

  .mySlides {display:none;}

  input:focus {
    outline: none;
    padding-right: 300px
 }


</style>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>JualinAja</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-chain-app-dev.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href='https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,400;0,500;0,700;1,400&family=Poppins:wght@400;500;700&family=Raleway:ital,wght@0,300;0,400;0,500;1,500&display=swap' rel='stylesheet'>

  </head>



  </html>