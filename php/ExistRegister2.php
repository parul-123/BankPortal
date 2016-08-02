<html>
<head>
<title>Register</title>
<link type="text/css" rel="stylesheet" href="style/NewRegister.css" />
</head>


<body>

<script type="text/javascript">
      // Form validation code will come here.
      function validate()
      {
         if(document.acc.AccNum.value=="")
         {
            alert( "Please provide Account no!" );
            document.acc.AccNum.focus() ;
            return false;
         }
         
         if(document.acc.AccType.value=="")
         {
            alert( "Please provide Account type!" );
            document.acc.AccType.focus() ;
            return false;
         }
         if(document.acc.AccBal.value=="")
         {
            alert( "Please provide Account balance!" );
            document.acc.AccBal.focus() ;
            return false;
         }
       
         return(true);
      }
      
     // function onSubmitForm() {
      		
   //-->
</script>


<img src="images/Logo.png"/>
</br>
</br>
	
	<form name="acc" onsubmit="return validate()" method="POST">
	<fieldset>
	<legend><strong>Account Details</strong> </legend>
	<label for='AccNum' >Account No.*: </label>
	<br>
	<input type="text" name="AccNum" placeholder="AccountNo.">
	<br>
	<br>
	<label for='AccType' >Choose Account Type*: </label>
	<br>
	<input type="radio" name="AccType" value="Current Account">Current Account
	<br>
	<input type="radio" name='AccType' value="Savings Account">Savings Account
	<br>
	<input type="radio" name='AccType' value="Recurring Deposit Account">Recurring Deposit Account
	<br>
	<br>
	<label for='AccBal' >Account Balance*: </label>
	<br>
	<input type="number" name='AccBal' placeholder="Balance">
	<br>
	<br>
	<input type='submit' name='submit' Value="Submit">
	
	</fieldset>
	</form>
</body>

<?php
   session_start();
   //echo $_SESSION['CustomerId'];
   if(isset($_POST['submit'])){
  $connect = mysqli_connect("mysql.hostinger.in","u867156667_root","******","u867156667_bank");
   if(!$connect){
   		die('Could not connect:'.mysqli_connect_error());
   	}
	$query2="INSERT INTO Customers(CustomerId,AccNum,AccType,AccBal) VALUES($_SESSION[CustomerId],'$_POST[AccNum]','$_POST[AccType]',$_POST[AccBal])";
	if(!mysqli_query($connect,$query2)){
		die('Error:'.mysqli_connect_error());}
	else{
		Header("Location:Record.php");}
		//echo 'One Record added'; } 
	mysqli_close($connect);}
?>

</html>
