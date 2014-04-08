<?php
require_once('config.php');
	$host = $config['host'];
	$db = $config['db'];
	try{
		$dbh = new PDO("mysql:host=$host;dbname=$db", $config['user'], $config['password']);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e){
		echo $e->getMessage();
	}
	$sth = $dbh->prepare("SELECT * FROM orders");
	$sth->execute();
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	$basket = '<table><tr><th>Image</th><th>Name</th><th>Quantity</th><th>Price</th></tr>';
	foreach ( $result as $order){
		$basket .= $order['basket'];
	}
	$basket .= '</table>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	<style>
		a{
			padding: 10px 0px 10px 10px;
		}
		table tr, th, td{
			border: 1px solid #000;
			padding: 10px;
		}
		table{
			border-collapse: collapse;
			margin-top: 30px;
			margin-left: 10px;
		}
	</style>
</head>
<body>
	<a href="/getGadgets">Go Home </a>
	<?php	echo $basket; ?>
</body>
</html>
