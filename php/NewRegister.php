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
      
         if(document.acc.CustomerId.value=="")
         {
            alert( "Please provide customer id!" );
            document.acc.CustomerId.focus() ;
            return false;
         }
         if(document.acc.Fname.value=="")
         {
            alert( "Please provide First Name!" );
            document.acc.Fname.focus() ;
            return false;
         }
         if(document.acc.Lname.value=="")
         {
            alert( "Please provide Last Name!" );
            document.acc.Lname.focus() ;
            return false;
         }
         if(document.acc.Age.value=="")
         {
            alert( "Please provide Age!" );
            document.acc.Age.focus() ;
            return false;
         }
         if(document.acc.Gender.value=="")
         {
            alert( "Please provide Gender!" );
            document.acc.Gender.focus() ;
            return false;
         }
         
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
   //-->
</script>


<img src="images/Logo.png"/>
</br>
</br>
	
	<form name="acc"  onsubmit="return validate()" method="POST">
	<fieldset>
	<legend><strong>Account Details</strong> </legend>
	<label for='CustomerId' >Customer ID*: </label>
	<br>
	<input type="number" name="CustomerId" placeholder="Customer ID">
	<br>
	<br>
	<label for='Fname' >First Name*: </label>
	<br>
	<input type="text" name="Fname" placeholder="First Name">
	<br>
	<br>
	<label for='Lname' >Last Name*: </label>
	<br>
	<input type="text" name="Lname" placeholder="Last Name">
	<br>
	<br>
	<label for='Age' >Age*: </label>
	<br>
	<input type="number" name="Age" placeholder="Age">
	<br>
	<br>
	<label for='Gender' >Gender*: </label>
	<br>
	<input type="radio" name="Gender" value="Female">Female
	<br>
	<input type="radio" name='Gender' value="Male">Male
	<br>
	<br>
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
   if(isset($_POST['submit'])){
   $connect = mysqli_connect("mysql.hostinger.in","u867156667_root","******","u867156667_bank");
   if(!$connect){
   		die('Could not connect:'.mysqli_connect_error());
   	}
	$query2="INSERT INTO Customers(CustomerId,AccNum,AccType,AccBal) VALUES($_POST[CustomerId],'$_POST[AccNum]','$_POST[AccType]',$_POST[AccBal])";
	$query1="INSERT INTO Person(CustomerId,Fname,Lname,Age,Gender) VALUES($_POST[CustomerId],'$_POST[Fname]','$_POST[Lname]',$_POST[Age],'$_POST[Gender]')";
	
	if(!mysqli_query($connect,$query1) || !mysqli_query($connect,$query2)){
		die('Error:'.mysqli_connect_error());}
	else{
		Header("Location: Record.php");; } 
	mysqli_close($connect);}
?>

</html>
