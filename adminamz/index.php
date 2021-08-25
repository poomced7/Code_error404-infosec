<?php
include ("./control/confix.php");



if($_GET["admin"] == "login"){
     include ("loginUser.php"); 
     }else
if($_GET["admin"] == "dashboard"){
      include ("dashboard/index.php"); 
     }else
     if($_GET["admin"] == "logout"){
          session_start();
          session_destroy();
          $_SESSION["swal"] = "notify";
          $title ="ออกจากระบบ";
          $icon ="success";
          $link = "./?app=home";
         }else
if($_GET["admin"] == "qrlogin"){
     include ("qrapp/index.php"); 
     }else
if($_GET["admin"] == "show"){
     include ("dashboard/show.php"); 
      }else


{
     $_SESSION["swal"] = "notify";
     $title ="กำลังโหลดข้อมูล..";
     $icon ="warning";
     $link = "./?admin=login";
}

include ("./control/swal.php");

?>
</center>
</div>
</body>
</html>