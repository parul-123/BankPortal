<html>
<head>
<title>Transaction</title>
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
      
         if(document.acc.AccCredited.value=="")
         {
            alert( "Please provide Account No. To Be Credited!" );
            document.acc.AccCredited.focus() ;
            return false;
         }
         if(document.acc.AccDebited.value=="")
         {
            alert( "Please provide Account No. To Be Debited!" );
            document.acc.AccDebited.focus() ;
            return false;
         }
         if(document.acc.TransBal.value=="")
         {
            alert( "Please provide Transaction Balance!" );
            document.acc.TransBal.focus() ;
            return false;
         }
         return true;
       }
     </script>
     
    <form name="acc"  onsubmit="return validate()" method="POST"> 
	<fieldset>
	<legend>Transaction Details</legend>
	<label for='AccCredited' >Account No. for Credit* </label>
	<br>
	<input type="text" name="AccCredited" placeholder="AccountToBeCredited" >
	<br>
	<br>
	<label for='AccDebited' >Account No. for Debit*</label>
	<br>
	<input type="text" name="AccDebited" placeholder="AccountToBeDebited">
	<br>
	<br>
	<label for='TransBal' >Transaction Balance*: </label>
	<br>
	<input type="number" name='TransBal' placeholder="Balance">
	<br>
	<br>
	<input type="submit" name="submit" Value="Do Transaction">

	</fieldset>
	</form>

</body>


<?php
	if(isset($_POST['submit'])){
	 $connect = mysqli_connect("mysql.hostinger.in","u867156667_root","******","u867156667_bank");
   if(!$connect){
   		die('Could not connect:'.mysqli_connect_error());
   	}
	 
	// echo $_POST['AccCredited'];
	 
	 $query="select AccNum from Customers where AccNum=$_POST[AccCredited]";
	 $query2="select AccNum from Customers where AccNum=$_POST[AccDebited]";
	 $run= mysqli_query($connect,$query);
	 $p=0;
	 $r=0;
         while($row=mysqli_fetch_array($run,MYSQLI_ASSOC)){
				if($row['AccNum'])
					$p=1;
				 }
		if($p){
		$run= mysqli_query($connect,$query2);		  
		while($row=mysqli_fetch_array($run,MYSQLI_ASSOC)){
				if($row['AccNum'])
					$r=1;
				 }
		} 	
		
	if(!$p){
		echo '<script type="text/javascript">';
		echo 'alert("Error! AccNumber to Be Credited does not exist!!  CHECK Account Number")';
		echo '</script>';
		//Header("Location: home.php");}
		//echo "Error! AccNumber to Be Credited doesn't exist!!  CHECK Account Number";
		echo '<br><br><a href="home.php">Home</a>';}
	else if(!$r){
		echo '<script type="text/javascript">';
		echo 'alert("Error! AccNumber to Be Debited does not exist!!  CHECK Account Number")';
		echo '</script>';
		//echo "Error! AccNumber to Be Debited doesn't exist!!  CHECK Account Number";
		echo '<br><br><a href="home.php">Home</a>';}
	else{
		$p=0;
		$query="select AccBal from Customers where AccNum=$_POST[AccDebited]";
		$run= mysqli_query($connect,$query);
		 while($row=mysqli_fetch_array($run,MYSQLI_ASSOC)){
				if($row['AccBal']<$_POST['TransBal']){
					$p=1;
					echo '<script type="text/javascript">';
					echo 'alert("Transaction Balance is more compared to AccountBalance!")';
					echo '</script>';
					//echo "Transaction Balance is more compared to AccountBalance!"; 
					break;}
				else if($_POST['TransBal']<0){
					$p=1;
					echo '<script type="text/javascript">';
					echo 'alert("Transaction Amount is undefined!")';
					echo '</script>';
					//echo "Transaction Amount is undefined!";
					break;}
				 }
		if(!$p){
	    	session_start();
	    	$_SESSION['AccCredited'] = $_POST['AccCredited'];
	    	$_SESSION['AccDebited'] = $_POST['AccDebited'];
	    	$_SESSION['TransBal'] = $_POST['TransBal'];
	    	//Header("Location: trans2.php");}
	    	print "<script language='Javascript'>document.location.href='trans2.php' ;</script>";}
			//echo '<a href="trans2.php">Account opening</a>'; }
	}
  }
?>
</html>
