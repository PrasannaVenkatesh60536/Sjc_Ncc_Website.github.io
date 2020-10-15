<?php 
include "config.php";
?>

<html>
<head>
<title> Ncc_Requirement</title>
<link href="Nccstyle.css" rel="stylesheet" type="text/css"/>
 <script type="text/javascript" src="js\sliderman.1.3.7.js"></script>
 <?php 
$error_message = "";$success_message = "";

// Register user
if(isset($_POST['s1'])){
   $name = trim($_POST['name']);
   $depno = trim($_POST['depno']);
   $depmnt = trim($_POST['depmnt']);
   $gender = trim($_POST['gender']);
   $dob = trim($_POST['dob']);
   $height = trim($_POST['height']);
   $weight = trim($_POST['weight']);
   $bloodgrp = trim($_POST['bloodgrp']);
   $caste = trim($_POST['caste']);
   $religion = trim($_POST['religion']);
   $email = trim($_POST['email']);
   $phoneno = trim($_POST['phoneno']);
   $fatherno = trim($_POST['fatherno']);
   $address = trim($_POST['address']);
  

   $isValid = true;

   // Check fields are empty or not
   if( $name == '' || $depno == '' || $depmnt == '' || $gender == '' || $dob == '' || $height == '' || $weight == '' || $bloodgrp == '' || $caste == '' || $religion == '' || $email == '' || $phoneno == '' || $fatherno == '' || $address == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

   /* // Check if confirm password matching or not
   if($isValid && ($password != $confirmpassword) ){
     $isValid = false;
     $error_message = "Confirm password not matching";
   } */

   // Check if Email-ID is valid or not
   if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $error_message = "Invalid Email-ID.";
   }

   if($isValid){

     // Check if Email-ID already exists
     $stmt = $con->prepare("SELECT * FROM nccdetails WHERE email = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "Email-ID is already existed.";
     }

   }

   // Insert records
   if($isValid){
     $insertSQL = "INSERT INTO nccdetails(name,depno,depmnt,gender,dob,height,
	 weight,bloodgrp,caste,religion,email,phoneno,fatherno,address) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
     $stmt = $con->prepare($insertSQL);
     $stmt->bind_param("ssss",$name,$depno,$depmnt,$gender,$dob,$height,$weight,$bloodgrp,$caste,$religion,$email,$phoneno,$fatherno,$address);
     $stmt->execute();
     $stmt->close();

     $success_message = "Account created successfully.";
   }
}
?>
</head>
<body>
<div class="wrapper">
<div class="header">
<img class="logo2" src="Ncc_img\logo-m.png" title="image"/>
<div class="Sjc_title"> 
<h2> <mark style="color:white; background-color:brown;word-spacing:5px;"> <p style = "font-family:Perpetua; ">
</p>ST. JOSEPH'S  COLLEGE </p></h2>
<h3><mark style="color:yellow; background-color:brown; margin-left:35px;">(AUTONOMOUS) <br>    1COY2(TN)BN NCC INFANTRY</h3>
<!-- <P><mark style="color:yellow; background-color:brown; margin-left:35px;">1 COY 2(TN) BN NCC INFANTRY</p> -->

<h3> <mark style="color:white; background-color:brown;">
 <p class="adrs">Trichy,TamilNadu,India </p> </h3>
</div>
<img class="NccLogo1" src="Ncc_img\ncclogo1.jpg" title="image"/>
</div>

<div class="menu">
<ul class="nav">
<li><a href="index.php" title="Home">HOME</a></li>
<li><a href="about_us.php" title="About us">ABOUT US</a></li> 
<li><a href="service.php" title="service">SERVICE</a></li> 
<li><a href="portfolio.php" title="portfolio">PORTFOLIO</a></li>
<li><a href="contact.php" title="contact us">CONTACT US</a></li>
<li><a href="register.php" title="Register">REGISTER</a></li></ul></div>
<div class="content2"> 
<form name="form1" method="post" action="">
					<table align="center" cellpadding="10" cellspacing="0">
						
						<tr>
							<th colspan="2">Sign Up Here !</th>
						</tr>
						<?php 
            // Display Error message
            if(!empty($error_message)){
            ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> <?= $error_message ?>
            </div>

            <?php
            }
            ?>

            <?php 
            // Display Success message
            if(!empty($success_message)){
            ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?= $success_message ?>
            </div>

            <?php
            }
            ?>
						<tr>
							<td>Name </td>
							<td><input type="text" name="name" autocomplete="off" required/> </td>
						</tr>
						<tr>
							<td>Department number </td>
							<td><input type="text" name="depno" autocomplete="off" required/> </td>
						</tr>
						<tr>
							<td>Department </td>
							<td><input type="text" name="depmnt" autocomplete="off" required/> </td>
						</tr>
						
						<tr>
							<td>Gender </td>
							<td>
     <input type="radio" name="gender" value="m" required>Male
     <input type="radio" name="gender" value="f" required>Female
    </td>
						</tr>
						<tr>
							<td>Date of Birth </td>
							<td><input type="text" name="dob" autocomplete="off" required/> </td>
						</tr>
						<tr>
							<td>Height </td>
							<td><input type="text" name="height" autocomplete="off" required/> </td>
						</tr>
						<tr>
							<td>Weight </td>
							<td><input type="text" name="weight" autocomplete="off" required/> </td>
						</tr>
						<tr>
							<td>Blood Group </td>
							<td><input type="text" name="bloodgrp" autocomplete="off" required/> </td>
						</tr>
						<tr>
							<td>Caste </td>
							<td><input type="text" name="caste" autocomplete="off" required/> </td>
						</tr>
						<tr>
							<td>Religion </td>
							<td><input type="text" name="religion" autocomplete="off" required/> </td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" name="email" autocomplete="off" required/> </td>
						</tr>
						
						<tr>
							<td>Mobile </td>
							<td><input type="text" name="phoneno" autocomplete="off" required/> </td>
						</tr>
						
						<tr>
							<td>Father Phone Number</td>
							<td><input type="text" name="fatherno" autocomplete="off" required/> </td>
						</tr>
						
						<tr>
							<td>Address </td>
							<td><input type="text" name="address" required/> </td>
						</tr>
						
						
						
						<tr>
							<td> </td>
							<td><input type="submit" name="s1" value="Register" </td>
						</tr>
					</table>
					</form>	
					



</div>
<div class="footer"> <span><p>COPYRIGHT &copy; 2018.ALL RIGHTS RESERVED.</p></span></div></div>
</body>
</html>