<?php
include "include.html";
include "connection_DB.php";

if (isset($_SESSION['booking'])) {
	echo $_SESSION['booking'];
	unset($_SESSION['booking']);
}
?>

</html>
<?php
if(isset($_POST['product1'])) {
	$type = "gas1";
	$wight = 12;
	$price = 50;


	$query = "select count(*) CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$num = oci_fetch_all($result, $res);
	$num = $res['CYLINDER_ID'][0];
	"<br>";


	$sql = "SELECT CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($num > 0) {
		$row = oci_fetch_assoc($res);
		$cylinderId = $row['CYLINDER_ID'];
		setcookie("cylinderid", $cylinderId, time() + 3600);
	}

	$custid = $_COOKIE['customerID'];
	$query = "select count(*) CUSTOMER_ID FROM customer WHERE CUSTOMER_ID='$custid'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$numb = oci_fetch_all($result, $res);
	$numb = $res['CUSTOMER_ID'][0];
	"<br>";

	$sql = "SELECT CUSTOMER_NAME FROM customer WHERE CUSTOMER_ID='$custid'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($numb > 0) {
		$row = oci_fetch_assoc($res);
		$custname = $row['CUSTOMER_NAME'];
		setcookie("custname", $custname, time() + 3600);
	}

	echo "<div style='color: darkslategrey'>";
	echo "<center>";
	echo "<br><br><br><br>";
	echo '<fieldset style="width:700px " >';
	echo "<legend>Your Shopping Cart</legend>";
	echo "<br><br><br><br>";
	echo "<form action='booking.php' method = post>\n";
	echo "<table border='1' style='width:500px''>\n";
	echo "<tr><th>Cylinder Type</th><th>Cylinder width</th><th>Cylinder Price</th><th>Cylinder Image</th></tr>\n";
	echo "<tr><th>$type</th><th>$wight Kg</th><th>$price</th><th><img src='image_gas/g1.jpg'></th></tr>\n";
	echo "</table>\n";
	echo "<br>";
	echo "<input type='submit' name='submit' value='Booking the cylinder' size='15'>";
	echo "</form>\n";
	echo "<br><br><br><br>";
	echo "</fieldset>";
	echo "</center>";
	echo "</div>";
}

if(isset($_POST['product2'])){
	$type = "gas2";
	$wight = 5;
	$price = 35;

	$query = "select count(*) CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$num = oci_fetch_all($result, $res);
	$num = $res['CYLINDER_ID'][0];
	"<br>";


	$sql = "SELECT CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($num > 0) {
		$row = oci_fetch_assoc($res);
		$cylinderId = $row['CYLINDER_ID'];
		setcookie("cylinderid", $cylinderId, time() + 3600);
	}

	$custid = $_COOKIE['customerID'];
	$query = "select count(*) CUSTOMER_ID FROM customer WHERE CUSTOMER_ID='$custid'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$numb = oci_fetch_all($result, $res);
	$numb = $res['CUSTOMER_ID'][0];
	"<br>";

	$sql = "SELECT CUSTOMER_NAME FROM customer WHERE CUSTOMER_ID='$custid'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($numb > 0) {
		$row = oci_fetch_assoc($res);
		$custname = $row['CUSTOMER_NAME'];
		setcookie("custname", $custname, time() + 3600);
	}

	echo "<div style='color: darkslategrey'>";
	echo "<center>";
	echo "<br><br><br><br>";
	echo '<fieldset style="width:700px " >';
	echo "<legend>Your Shopping Cart</legend>";
	echo "<br><br><br><br>";
	echo "<form action='booking.php' method = post>\n";
	echo "<table border='1' style='width:500px''>\n";
	echo "<tr><th>Cylinder Type</th><th>Cylinder width</th><th>Cylinder Price</th><th>Cylinder Image</th></tr>\n";
	echo "<tr><th>$type</th><th>$wight Kg</th><th>$price</th><th><img src='image_gas/g2.jpg'></th></tr>\n";
	echo "</table>\n";
	echo "<br>";
	echo "<input type='submit' name='submit' value='Booking the cylinder' size='15'>";
	echo "</form>\n";
	echo "<br><br><br><br>";
	echo "</fieldset>";
	echo "</center>";
	echo "</div>";
}

if(isset($_POST['product3'])){
	$type = "gas3";
	$wight = 12;
	$price = 50;

	$query = "select count(*) CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$num = oci_fetch_all($result, $res);
	$num = $res['CYLINDER_ID'][0];
	"<br>";


	$sql = "SELECT CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($num > 0) {
		$row = oci_fetch_assoc($res);
		$cylinderId = $row['CYLINDER_ID'];
		setcookie("cylinderid", $cylinderId, time() + 3600);
	}

	$custid = $_COOKIE['customerID'];
	$query = "select count(*) CUSTOMER_ID FROM customer WHERE CUSTOMER_ID='$custid'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$numb = oci_fetch_all($result, $res);
	$numb = $res['CUSTOMER_ID'][0];
	"<br>";

	$sql = "SELECT CUSTOMER_NAME FROM customer WHERE CUSTOMER_ID='$custid'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($numb > 0) {
		$row = oci_fetch_assoc($res);
		$custname = $row['CUSTOMER_NAME'];
		setcookie("custname", $custname, time() + 3600);
	}

	echo "<div style='color: darkslategrey'>";
	echo "<center>";
	echo "<br><br><br><br>";
	echo '<fieldset style="width:700px " >';
	echo "<legend>Your Shopping Cart</legend>";
	echo "<br><br><br><br>";
	echo "<form action='booking.php' method = post>\n";
	echo "<table border='1' style='width:500px''>\n";
	echo "<tr><th>Cylinder Type</th><th>Cylinder width</th><th>Cylinder Price</th><th>Cylinder Image</th></tr>\n";
	echo "<tr><th>$type</th><th>$wight Kg</th><th>$price</th><th><img src='image_gas/g3.jpg'></th></tr>\n";
	echo "</table>\n";
	echo "<br>";
	echo "<input type='submit' name='submit' value='Booking the cylinder' size='15'>";
	echo "</form>\n";
	echo "<br><br><br><br>";
	echo "</fieldset>";
	echo "</center>";
	echo "</div>";
}

if(isset($_POST['product4'])){
	$type = "gas4";
	$wight = 5;
	$price = 35;

	$query = "select count(*) CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$num = oci_fetch_all($result, $res);
	$num = $res['CYLINDER_ID'][0];
	"<br>";


	$sql = "SELECT CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($num > 0) {
		$row = oci_fetch_assoc($res);
		$cylinderId = $row['CYLINDER_ID'];
		setcookie("cylinderid", $cylinderId, time() + 3600);
	}

	$custid = $_COOKIE['customerID'];
	$query = "select count(*) CUSTOMER_ID FROM customer WHERE CUSTOMER_ID='$custid'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$numb = oci_fetch_all($result, $res);
	$numb = $res['CUSTOMER_ID'][0];
	"<br>";

	$sql = "SELECT CUSTOMER_NAME FROM customer WHERE CUSTOMER_ID='$custid'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($numb > 0) {
		$row = oci_fetch_assoc($res);
		$custname = $row['CUSTOMER_NAME'];
		setcookie("custname", $custname, time() + 3600);
	}

	echo "<div style='color: darkslategrey'>";
	echo "<center>";
	echo "<br><br><br><br>";
	echo '<fieldset style="width:700px " >';
	echo "<legend>Your Shopping Cart</legend>";
	echo "<br><br><br><br>";
	echo "<form action='booking.php' method = post>\n";
	echo "<table border='1' style='width:500px''>\n";
	echo "<tr><th>Cylinder Type</th><th>Cylinder width</th><th>Cylinder Price</th><th>Cylinder Image</th></tr>\n";
	echo "<tr><th>$type</th><th>$wight Kg</th><th>$price</th><th><img src='image_gas/g4.jpg'></th></tr>\n";
	echo "</table>\n";
	echo "<br>";
	echo "<input type='submit' name='submit' value='Booking the cylinder' size='15'>";
	echo "</form>\n";
	echo "<br><br><br><br>";
	echo "</fieldset>";
	echo "</center>";
	echo "</div>";
}

if(isset($_POST['product5'])) {
	$type = "gas5";
	$wight = 12;
	$price = 50;

	$query = "select count(*) CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$num = oci_fetch_all($result, $res);
	$num = $res['CYLINDER_ID'][0];
	"<br>";


	$sql = "SELECT CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($num > 0) {
		$row = oci_fetch_assoc($res);
		$cylinderId = $row['CYLINDER_ID'];
		setcookie("cylinderid", $cylinderId, time() + 3600);
	}

	$custid = $_COOKIE['customerID'];
	$query = "select count(*) CUSTOMER_ID FROM customer WHERE CUSTOMER_ID='$custid'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$numb = oci_fetch_all($result, $res);
	$numb = $res['CUSTOMER_ID'][0];
	"<br>";

	$sql = "SELECT CUSTOMER_NAME FROM customer WHERE CUSTOMER_ID='$custid'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($numb > 0) {
		$row = oci_fetch_assoc($res);
		$custname = $row['CUSTOMER_NAME'];
		setcookie("custname", $custname, time() + 3600);
	}

	echo "<div style='color: darkslategrey'>";
	echo "<center>";
	echo "<br><br><br><br>";
	echo '<fieldset style="width:700px " >';
	echo "<legend>Your Shopping Cart</legend>";
	echo "<br><br><br><br>";
	echo "<form action='booking.php' method = post>\n";
	echo "<table border='1' style='width:500px''>\n";
	echo "<tr><th>Cylinder Type</th><th>Cylinder width</th><th>Cylinder Price</th><th>Cylinder Image</th></tr>\n";
	echo "<tr><th>$type</th><th>$wight Kg</th><th>$price</th><th><img src='image_gas/g5.jpg'></th></tr>\n";
	echo "</table>\n";
	echo "<br>";
	echo "<input type='submit' name='submit' value='Booking the cylinder' size='15'>";
	echo "</form>\n";
	echo "<br><br><br><br>";
	echo "</fieldset>";
	echo "</center>";
	echo "</div>";
}

if(isset($_POST['product6'])) {
	$type = "gas6";
	$wight = 5;
	$price = 35;

	$query = "select count(*) CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$num = oci_fetch_all($result, $res);
	$num = $res['CYLINDER_ID'][0];
	"<br>";


	$sql = "SELECT CYLINDER_ID FROM cylinder WHERE Type='$type' AND weight='$wight' AND price='$price'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($num > 0) {
		$row = oci_fetch_assoc($res);
		$cylinderId = $row['CYLINDER_ID'];
		setcookie("cylinderid", $cylinderId, time() + 3600);
	}

	$custid = $_COOKIE['customerID'];
	$query = "select count(*) CUSTOMER_ID FROM customer WHERE CUSTOMER_ID='$custid'";
	$result = oci_parse($connect, $query);
	oci_execute($result);
	$numb = oci_fetch_all($result, $res);
	$numb = $res['CUSTOMER_ID'][0];
	"<br>";

	$sql = "SELECT CUSTOMER_NAME FROM customer WHERE CUSTOMER_ID='$custid'";
	$res = oci_parse($connect, $sql);
	oci_execute($res);
	if ($numb > 0) {
		$row = oci_fetch_assoc($res);
		$custname = $row['CUSTOMER_NAME'];
		setcookie("custname", $custname, time() + 3600);
	}

	echo "<div style='color: darkslategrey'>";
	echo "<center>";
	echo "<br><br><br><br>";
	echo '<fieldset style="width:700px " >';
	echo "<legend>Your Shopping Cart</legend>";
	echo "<br><br><br><br>";
	echo "<form action='booking.php' method = post>\n";
	echo "<table border='1' style='width:500px''>\n";
	echo "<tr><th>Cylinder Type</th><th>Cylinder width</th><th>Cylinder Price</th><th>Cylinder Image</th></tr>\n";
	echo "<tr><th>$type</th><th>$wight Kg</th><th>$price</th><th><img src='image_gas/g6.jpg'></th></tr>\n";
	echo "</table>\n";
	echo "<br>";
	echo "<input type='submit' name='submit' value='Booking the cylinder' size='15'>";
	echo "</form>\n";
	echo "<br><br><br><br>";
	echo "</fieldset>";
	echo "</center>";
	echo "</div>";
}

?>

