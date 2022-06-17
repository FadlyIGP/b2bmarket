<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 100px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  /*padding-top: 100px;*/
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 100%;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 1px;
  width: calc(100% / 2 - 10px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 30px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  /*padding-top: 10px;*/
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   /*display: ;*/
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 50%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, #71b7e6, #9b59b6);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }
 @media(max-width: 584px){
 .container{
  max-width: 50%;
}
form .user-details .input-box{
    margin-bottom: 1px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}

.alert {
  padding: 30px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin:0;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}

#floatingRectangle {
  z-index: 1;
  position: fixed;
  left: 0;
  right: 0;
  top: 20px;
  height: 50px;
  width: 50%;
  background-color: green;
  color: white;
  padding: 0;
  border-radius: 12px;
  padding-left: 20px;
  padding-right: 20px;
  padding-top: 10px;

}

a {
  width: 32px;
  height: 32px;
  background-color: red;
}
</style>

<body>
    <div class="container">
        <div class="title">Form Alamat</div>
        <div class="content">
            {!! Form::open(['url'=>url('/address'),'method'=>'POST', 'files'=>'true', 'class'=>'form-horizontal', 'autocomplete'=>'off','style'=>'margin-top:25px']) !!}
                <div class="user-details">
                    <div class="input-box">
                      <span class="details">Contact</span>
                      <input type="text" placeholder="Ex:08577776666" required name="contact">
                    </div>
                    <div class="input-box">
                      <span class="details">Nama Penerima</span>
                      <input type="text" placeholder="Ex:H. Nursalim" required name="name">
                    </div>
                    <div class="input-box">
                      <span class="details">Provinsi</span>
                      <input type="text" placeholder="Ex:Jawa Barat" required name="provinsi">
                    </div>
                    <div class="input-box">
                      <span class="details">Kabupaten</span>
                      <input type="text" placeholder="Ex:Bekasi" required name="kabupaten">
                    </div>
                    <div class="input-box">
                      <span class="details">Kecamatan</span>
                      <input type="text" placeholder="Ex:Babelan" required name="kecamatan">
                    </div>
                    <div class="input-box">
                      <span class="details">Kelurahan</span>
                      <input type="text" placeholder="Ex:Panati Harapan Jaya" required name="kelurahan">
                    </div>
                    <div class="input-box">
                      <span class="details">Alamat Komplit</span>
                      <input type="text" placeholder="Ex:Jl.Pondok Soga Rt 02/03" required name="komplit">
                    </div>

                    <div class="input-box">
                      <span class="details">Patokan</span>
                      <input type="text" placeholder="Ex:Masjid Almunawwaroh" required name="patokan">
                    </div>
                    <div class="input-box">
                      <span class="details">Kode Pos</span>
                      <input type="text" placeholder="Ex:17730" required name="kodepost">
                    </div>
                    <div class="input-box">
                      <span class="details">Jadikan Alamat Utama</span>
                      <table width="100%">
                        <tr>
                          <td width="25%">Ya</td>
                          <td width="15%" style="text-align: left;">
                            <input type="radio" name="prmary" value="1" checked style="height: 20px;">
                            
                          </td>
                           <td width="10%" style="">
                          </td>
                          <td width="25%">Tidak</td>
                          <td width="15%" style="">
                            <input type="radio" name="prmary" value="0" style="height: 20px;">
                          </td>
                          <td width="10%" style="">
                          </td>

                        </tr>
                      </table>

                    </div>

                     <div class="input-box">
                      <div class="button">
                       <input type="button" value="Go back!" onclick="history.back()">
                       
                      </div>
                    </div>

                    <div class="input-box">
                      <div class="button">

                        <input type="submit" value="Register">
                      </div>
                    </div>

                </div>
              
              {!! Form::close() !!}
        </div>
    </div>
@if($errors->any())
<center>
<div class="alert" id="floatingRectangle" style="">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>
    {{$errors->first()}}
  </strong> 
</div>
</center>
@endif
</body>

</html>
</script>