<html>
		<head>
		<title>Register</title>
		<link type="text/css" rel="stylesheet" href="style/ExistRegister.css" />
		</head>
		<body>
		<script type="text/javascript">
      	// Form validation code will come here.
      		function validate(){
         		if(document.acc.CustomerId.value==""){
            		alert( "Please provide customer id!" );
            		document.acc.CustomerId.focus() ;
            		return false;}
            	return true;
            }
         </script>
		<img src="images/Logo.png"/>
		</br>
		</br>
		<h2>Enter your Customer ID</h2>
			
		
			<form name="acc" onsubmit="return validate()" method="POST">
			<label for='CustomerId' >Customer ID*: </label>
			<br>
			<input type="number" name="CustomerId" placeholder="Customer ID">
			<br>
			<br>

			<input type='submit' name='submit' Value="Enter">
			</form>
			<br>
			<br>
			<br>
	

		</body>

<?php
if(isset($_POST['submit'])){
  //$ci = mysql_real_escape_string($_POST['CustomerId']);
	//if(empty($_POST['CustomerId'])){
   //echo "<br>OOPS! <br> FIELDS MARKED WITH AN ASTERISK ARE NECESSARY TO BE FILLED";
   //}
	//else{
	//$ci=$_POST['CustomerId'];
	//echo $_POST['CustomerId'];
	//echo $_POST['CustomerId'];
	    $connect = mysqli_connect("mysql.hostinger.in","u867156667_root","******","u867156667_bank");
   if(!$connect){
   		die('Could not connect:'.mysqli_connect_error());
   	}
	
	 $query="select Fname from Person where CustomerId=$_POST[CustomerId]";
	 $run= mysqli_query($connect,$query);
	 $p=0;
         while($row=mysqli_fetch_array($run,MYSQLI_ASSOC)){
				if($row['Fname'])
					$p=1;
				 } 
		
	if(!$p){
		echo '<script type="text/javascript">';
		echo 'alert("Error! Customer ID does not exist!!  CHECK CUSTOMER ID")';
		echo '</script>';
		//echo "Error! Customer ID doesn't exist!!  CHECK CUSTOMER ID";
		echo '<br><br><a href="home.php">Home</a>';}
	else{
	    session_start();
	    $_SESSION['CustomerId'] = $_POST['CustomerId'];
	    Header("Location:details2.php");}
	    //echo $_SESSION['CustomerId'];
		//echo '<a href="details2.php">Getting Details</a>'; }
	}
//}
?>
</html>

