<?php 

$con= mysqli_connect("localhost","u0311662_amzdb","20092524Poom@","u0311662_amzdb") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' "); 

if( !session_id() )
{
    session_start();
}



	if(isset($_POST['send'])){

		$arr= array();
		$cek_anggota = $_POST['credential'];

		$query = mysql_query("SELECT * FROM `member` where `qrkey`='$cek_anggota'", $con);
        $rows = mysql_num_rows($query);
            if ($rows == 1) {
	                $_SESSION['logged_in'] = true;
					$arr['success'] = true;
                } else {
                	$arr['success'] = false;
                }

            	echo json_encode($arr);
                mysql_close($con);
	}

?>