<html>
<head>
<title>Modification</title>
<link type="text/css" rel="stylesheet" href="style/NewRegister.css" />
</head>


<body>
	<img src="images/Logo.png"/>
	<br>
	<br>
	<script type="text/javascript">
      // Form validation code will come here.
      function validate()
      {
      
         if(document.acc.MinSav.value=="")
         {
            alert( "Please provide Minimum Savings Balance!" );
            document.acc.MinSav.focus() ;
            return false;
         }
         if(document.acc.MinCur.value=="")
         {
            alert( "Please provide Minimum Current Balance!" );
            document.acc.MinCur.focus() ;
            return false;
         }
         if(document.acc.MinDep.value=="")
         {
            alert( "Please provide Minimum Deposit Balance!" );
            document.acc.MinDep.focus() ;
            return false;
         }
         return true;
       }
     </script>
     
	<form name="acc" onsubmit="return validate()" method="POST"> 
	<fieldset>
	<legend>Modification</legend>
	<label for='MinSav' >Minimum Balance for Savings* </label>
	<br>
	<input type="number" name="MinSav" placeholder="Minimum For Savings"  >
	<br>
	<br>
	<label for='MinDep' >Minimum Balance for Deposit* </label>
	<br>
	<input type="number" name="MinDep" placeholder="Minimum For Deposit"  >
	<br>
	<br>
	<label for='MinCur' >Minimum Balance for Current* </label>
	<br>
	<input type="number" name="MinCur" placeholder="Minimum For Current">
	<br>
	<br>
	<input type="submit" name="submit" Value="Do Modification">

	</fieldset>
	</form>
	
	<?php
	if(isset($_POST['submit'])){
		$mbs=$_POST['MinSav'];
		$mbd=$_POST['MinDep'];
		$mbc=$_POST['MinCur'];
			


	$con = mysqli_connect("mysql.hostinger.in","u867156667_root","******","u867156667_bank");
	if(!$con){
		die('Could not connect:'.mysqli_connect_error());
	}
	$sql="INSERT INTO Modification(MinSav,MinDep,MinCur) VALUES('$mbs','$mbd','$mbc')";

	if(! mysqli_query($con,$sql)){
		die('Error:'.mysqli_connect_error());
	}
	else{
		Header("Location:Modify2.php");}
	
	mysqli_close($con);
  }
?>


</body>
</html>
