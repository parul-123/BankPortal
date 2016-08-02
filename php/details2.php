<html>
		<head>
		<title>Details</title>
		<link type="text/css" rel="stylesheet" href="style/details2.css" />
		</head>
		<body>
			<img src="images/Logo.png"/>

			<h2>Account Details:</h2>
			

<?php
	session_start(); 
   $connect = mysqli_connect("mysql.hostinger.in","u867156667_root","******","u867156667_bank");
   if(!$connect){
   		die('Could not connect:'.mysqli_connect_error());
   	}
    $ac = $_SESSION['CustomerId']; 
	
	$sql="SELECT * FROM Person WHERE CustomerId=$ac";
	$query=mysqli_query($connect,$sql);
		
			//output data of each row
		if(!$query){
			die('Error:'.mysqli_connect_error());}
			
		while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
				echo "Customer Id: ".$row['CustomerId']. "<br> First Name: ".$row['Fname']."<br> Last Name: ".$row['Lname']."<br> Age: ".$row['Age']."<br> Gender: ".$row['Gender']."<br>";
	echo "<br> <br>";} 

		$sql="SELECT * FROM Customers WHERE CustomerId=$ac";
		$query=mysqli_query($connect,$sql);
	
		if(!$query){
			die('Error:'.mysqli_connect_error());}
			
		while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
				echo "Account Number: ".$row['AccNum']. "<br> Account Type: ".$row['AccType']."<br> Account Balance: ".$row['AccBal']."<br>"; 

			echo "<br> <br>";}
		
	
	mysqli_close($connect);
?>
	<h3><a href="http://bankportal.esy.es/BankPortal/home.php">Home</a>
	</body>
		</html>
