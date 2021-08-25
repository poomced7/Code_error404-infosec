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

 $sql = "SELECT * FROM member";
 $result = $conn->query($sql);





$token = $_GET["token"];
$showtoken = $conn->query("SELECT * FROM member WHERE token = '$token' ");
while ($row = $showtoken->fetch_array()) {
  $id = $row["qrkey"];
  $point = $row["point"];
  $name = $row["name"];
  $lastname = $row["lastname"];
  $user_status = $row["user_status"];
}



$showtotal = $conn->query("SELECT * FROM total WHERE id = '1' ");
while ($row = $showtotal->fetch_array()) {
  $branch = $row["branch"];
  $sum = $row["sum"];
  $machinename = $row["machine_name"];

}


$showtotal2 = $conn->query("SELECT * FROM total WHERE id = '2' ");
while ($row = $showtotal2->fetch_array()) {
  $branch2 = $row["branch"];
  $sum2 = $row["sum"];
  $machinename2 = $row["machine_name"];

}

$tokencheck = $conn->query("SELECT *FROM member WHERE token = '$token' ");
if($tokencheck->num_rows <= 0){
    $_SESSION["swal"] = "notify";
    $title ="Token ไม่ถูกต้อง";
    $text = "กรุณาลองใหม่อีกครั้ง";
    $icon ="error";
    $button = "ตกลง";
    $link = "./?app=home";
}else{
    if($user_status == "member"){
      $_SESSION["swal"] = "notify";
         $title ="ไม่มีสิทธิ์เข้าถึงหน้านี้..";
         $icon ="error";
         $link = "./?app=home";}
         else{

          $sql_list = $conn->query("SELECT count(user_status) as count,user_status FROM member GROUP BY user_status"); //หาว่ามี user กี่คน
          while($row = $sql_list->fetch_array()){
          $user_status = $row["user_status"];
          $user_num = $row["count"];
          }
          
          
           
          $add = $_GET["add"];
          if($add == "logout"){
        $tokenupdate = $conn->query("UPDATE member SET token = '$randomtoken' WHERE token = '$token'");
                $_SESSION["swal"] = "notify";
                $title ="ออกจากระบบ";
                $text = "กรุณารอสักครู่...";
                $icon ="error";
                $button = "ตกลง";
               $link = "./?app=home";
            
            }



        
        }
}


?>

<div class="container">
<div class="row">
  <div class="col-12 bg-dark text-white">
    <br>
    <center><h3>ระบบจัดการฐานข้อมูลของ P.G.R. Machine</h3>
    <h6><?php echo $output;?><?php echo $name;?> <?php echo $lastname;?> &nbsp; <span class="badge badge-pill badge-warning">ADMIN</span> </h6><center>
    <a href="./?admin=home&token=<?php echo $token;?>&add=logout" class="btn btn-danger btn-sm" role="button" aria-pressed="true">ออกจากระบบ</a></center><br>
  
  <br>
  </div>
  </div>

<div class="row">
  <div class="col-2 bg-dark" style="height:800px">
  <br>
  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active btn-outline-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
  <a class="nav-link btn-outline-light" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Member</a>
  <a class="nav-link btn-outline-light" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
  <a class="nav-link btn-outline-light" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
</div>
  </div>
  <div class="col-10  bg-secondary text-white">
    <br>
  <div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
  
 


<div class="container">
<div class="row">
  <div class="col-4">
    
  <div class="card text-white bg-primary">
<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
<div>
<div class="text-value-lg">
  <?php if($user_status == "member"){
echo $user_num ;
}else{
echo "0";
} ?>
</div>
<div>Members</div>
<div>ผู้ใช้/คน</div>
<br>
</div></div></div>


  </div>
  <div class="col-4">


  <div class="card text-white bg-danger">
<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
<div>
<div class="text-value-lg"><?php echo $sum;?>&nbsp;/ 200 ใบ </div>
<div>เครื่อง : <?php echo $machinename;?></div>
<div>ทั้งหมดที่เครื่องรับมา : <?php echo $machinename2;?>ใบ</div>
<br>
</div></div></div>
    
  </div>
  <div class="col-4">
    

  <div class="card text-white bg-danger">
<div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
<div>
<div class="text-value-lg"><?php echo $sum2;?>&nbsp;/ 200 ใบ </div>
<div>เครื่อง : <?php echo $machinename2;?></div>
<div>ทั้งหมดที่เครื่องรับมา : <?php echo $machinename2;?>ใบ</div>
<br>
</div></div></div>


  </div>
  </div></div>
   


  <div class="container">
<div class="row">
  <div class="col-12 ">

  

  </div>
  </div></div>




  </div>
  <!--หน้าที่2-->
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

  <div class="container">
<div class="row">
  <div class="col-12 ">

<center><h3>จัดการสมาชิก</h3></center>



  <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Status</th>
      <th scope="col">Point</th>
      <th scope="col">Setting</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php while($row = $result->fetch_assoc()): ?>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['lastname']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['user_status']; ?></td>
      <td><?php echo $row['point']; ?></td>
      <td>แก้ไขลบ</td>
    </tr>
    <?php endwhile ?>
  </tbody>
</table>


 </div>
  </div></div>



  </div> <!--หน้าที่2-->
  <!--หน้าที่3-->
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">.3..</div><!--หน้าที่3-->
  <!--หน้าที่4-->
  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">..4.</div><!--หน้าที่4-->
</div>
  </div>
  </div>
</div>





