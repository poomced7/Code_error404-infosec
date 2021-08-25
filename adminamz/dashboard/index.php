<?php

$n=50; 
    function getName($n) { 
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; 
        $randomString = ''; 
      
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
      
        return $randomString; 
    }
 $randomtoken = getName($n);


$token = $_GET["token"];
$tokencheck = $conn->query("SELECT *FROM member WHERE token = '$token' ");
if($tokencheck->num_rows <= 0){
    $_SESSION["swal"] = "notify";
    $title ="Token ไม่ถูกต้อง";
    $text = "กรุณาลองใหม่อีกครั้ง";
    $icon ="error";
    $button = "ตกลง";
    $link = "./?admin=login";
}else{

  $showtoken = $conn->query("SELECT * FROM member WHERE token = '$token' ");
    while ($row = $showtoken->fetch_array()) {
      $id = $row["qrkey"];
      $point = $row["point"];
      $name = $row["name"];
      $user_status = $row["user_status"];
    
    }

  
    if($user_status == "member"){
      $_SESSION["swal"] = "notify";
         $title ="กำลังโหลดข้อมูล..";
         $icon ="warning";
         $link = "./?admin=login";
         }
        
else{

  echo "$user_status";
}




}
?>