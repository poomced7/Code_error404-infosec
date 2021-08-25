<?php
	//BEGIN FUNCTION 
		
	function random_password($length,$validchars) {
	$numchars = mb_strlen ($validchars,'utf-8');
	$password = '';

	// each loop random 1 character
	for ($i = 0; $i < $length; $i++) {
		mt_srand();
		// random index of valid characters
		$index = mt_rand(0, $numchars - 1);
		// get character at index and append to password
		$password .= mb_substr($validchars, $index, 1,'utf-8');
		if(mb_strlen($password,'utf-8')==$length){
			break;	
		}
	}
	return $password;
}

?>




<div class="card mt-2 border border-primary shadow-lg">
  <div class="card-body">

<center><h3> ADMIN P.G.R. Machine</h3>
<img src="./img/login.png" style="width:300px;height:300px;"> </center>

<form class="was-validated" action="" method="POST">

<div class="input-group mt-5">
        <div class="input-group-prepend">
          <div class="input-group-text border border-dark"><i class="fa fa-user" style="font-size:24px"></i></div>
        </div>
        <input type="text" class="form-control border border-dark" placeholder="Username" name="username" id="username" autocomplete="off" required>
      </div>


<div class="input-group mt-3">
        <div class="input-group-prepend">
          <div class="input-group-text border border-dark"><i class="fa fa-key" style="font-size:17px"></i></div>
        </div>
        <input type="password" class="form-control border border-dark" placeholder="Password" name="password" id="password" autocomplete="off" required>
      </div>





<div class="row mt-5">

    
    <div class="col">
      <button type="submit" name="adminlogin" class="btn btn-block btn-outline-success">Login <i class="fa fa-sign-in"></i></button>
    </div>
 
  <div class="row mt-15">

  </div>
</div>




</form>


</div>
</div>

