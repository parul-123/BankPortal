<html>
<head>
<title>Transaction</title>
<link type="text/css" rel="stylesheet" href="style/NewRegister.css" />
</head>


<body>
	<img src="images/Logo.png"/>
	<br>
	<br>
<?php
  session_start();
  $acredit = $_SESSION['AccCredited'];
  $adebit = $_SESSION['AccDebited'];
  $amount = $_SESSION['TransBal']; 
  
  
 $connect = mysqli_connect("mysql.hostinger.in","u867156667_root","******","u867156667_bank");
   if(!$connect){
   		die('Could not connect:'.mysqli_connect_error());
   	}
     
	
  $query=" SELECT MinSav , MinCur ,MinDep FROM Modification ORDER BY Sno DESC LIMIT 1";
  $run=mysqli_query($connect,$query);
      				
      			while($row=mysqli_fetch_array($run,MYSQLI_ASSOC)){
				     $mbs=$row['MinSav'];
					 $mbd=$row['MinDep'];
					 $mbc=$row['MinCur'];	
				}
	  
				
   $query="select AccBal,AccType from Customers where AccNum=$adebit";
   $run=mysqli_query($connect,$query);
      				
      			while($row=mysqli_fetch_array($run,MYSQLI_ASSOC)){
				      $A1=$row['AccBal'];
				      $AT1=$row['AccType'];	
				}   
		
				
      $query="select AccBal,AccType from Customers where AccNum=$acredit";
      $run=mysqli_query($connect,$query);
      				
      			while($row=mysqli_fetch_array($run,MYSQLI_ASSOC)){
				     $A2=$row['AccBal'];
					 $AT2=$row['AccType'];
				}  
		
					
    
     $A1=$A1-$amount;
     $A2=$A2+$amount;
     
     $flag = 0;
     
     
     if($AT1=="Current Account" && $A1>=$mbc)
           $flag = 1;
           
     else if($AT1=="Savings Account" && $A1>=$mbs)
     		 $flag = 1;
     
     else if($AT1=="Recurring Deposit Ac" && $A1>=$mbd)
     		$flag = 1;
     		
     	
     	if($flag){
           $connect = mysqli_connect("mysql.hostinger.in","u867156667_root","******","u867156667_bank");
   if(!$connect){
   		die('Could not connect:'.mysqli_connect_error());
   	}
      
           $query="Update Customers set AccBal=$A1 where AccNum=$adebit";	
           $run=mysqli_query($connect,$query);
      				 
         
           $query="Update Customers set AccBal=$A2 where AccNum=$acredit";
           $run=mysqli_query($connect,$query);
      				
		   $sql="INSERT INTO Transaction(AccCredited, AccDebited, TransBal ) VALUES($acredit,$adebit,$amount)";
		   if(!mysqli_query($connect,$sql)){
			   die('Error in making a transaction. Verify your details!'.mysqli_connect_error());}
          
          Header("Location:trans3.php");
        }
        
	else
	{	echo "<h3 style='color:#A52A2A;'>Transaction is not possible!</h3> <br><br>";
		echo "<img src='images/tryAgain.GIF' alt='tryAgain'>" ;
		
		if($AT1 == "Current Account")
			echo "<h3 style='color:#A52A2A;'>Transaction amount is disturbing the minimum deposit of Current Account<h3><br>";
		else if($AT1 == "Savings Account")
			echo "<h3 style='color:#A52A2A;'>Transaction amount is disturbing the minimum deposit of Savings Account<h3><br>";
		else
			echo "<h3 style='color:#A52A2A;'>Transaction amount is disturbing the minimum deposit of Recurring Deposit Account<h3><br>";
	}

    
 ?>   
   <h3><a href="home.php">Home</a>
	</body>
		</html>
