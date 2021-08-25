<?php ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>	
  


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
 
  <div class="container">
  <div class="row">
    <div class="col-2">
      
    </div>
    <div class="col-8">
    <center><div class="alert alert-success" role="alert">
<video id="preview"></video></div>


<div class="alert alert-primary" role="alert">
  <h2>กรุณานำ QR Code ของท่านมาสแกนที่นี่ !!<h2>

  <a class="btn btn-primary" href="../?app=home" role="button">ย้อนกลับ</a>
</div>




</center> 
    </div>
    <div class="col-2">
      
    </div>
  </div>
</div>

   

    <script>
        let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
        
            }
        );
        scanner.addListener('scan', function(token) {
            window.location = 'https://amz.jbtap.online/?app=dashboard&token='+token;
        });
        Instascan.Camera.getCameras().then(cameras => 
        {
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else {
                console.error("ไม่สามารถเข้าถึงกล้องได้");
            }
        });        
    </script>

 </body>
</html>