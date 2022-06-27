<?php 
	include "include.html";
	include "connection_DB.php";

	if(@isset($_POST['submit'])){
		$cus_ID = $_POST['unum'];
		$cus_password = $_POST['pass'];
		$cus_message = $_POST['message'];

		$query="select CUSTOMER_ID,CUST_PASSWORD from CUSTOMER where CUSTOMER_ID='$cus_ID' ";
		$result1 = oci_parse($connect,$query);
		oci_execute($result1);
		if(oci_fetch_all($result1,$rst) > 0){
			$sql = "INSERT INTO CONTACT_INFO(CUSTOMER_ID , MESSEAGE , CUST_PASSWORD) VALUES('$cus_ID','$cus_message', '$cus_password')";
			$result = oci_parse($connect,$sql);
			oci_execute($result);
			if($result)
				header("Location: contact.php?success=Your message has been sent successfully");
			else 
				header("Location: contact.php?error=there is a problem in sending message");

				
		}else{
			header("Location: contact.php?error=You are not register in this website !!");
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Contact Us</title>
	</head>
	<body>
		<center>
		<br> <br> <br> <br>
		<div style="background-color: #C0C0C0;">
		<h1><b>website feedback</b></h1>
		<form action=" " method="POST">
			<label><b>User Name:</b></label>
			<br> <br>
			<input type="text" name="unum" required>
			<br> <br>
			<!--<label><b>Your email address:</b></label>
			<br> <br>
			<input type="email" name="email" required>
			<br> <br>-->
			<label><b>Your Password:</b></label>
			<br> <br>
			<input type="password" name="pass" required>
			<br> <br>
			<label><b>Message:</b></label>
			<br> <br>
			<textarea name="message" rows="12" cols="60" placeholder="Write a message" required ></textarea>
			<br> <br>
			<input type="submit" value="send" name="submit">
		</form>
		</div>
		<br> <br>
		<p ><b> We always strive to give our best to satisfy our customers</b></p>
		</center>
	</body>
</html>
