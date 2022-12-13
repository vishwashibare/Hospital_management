<?php

session_start();
$con=mysqli_connect("localhost","root","","myhmsdb");
if(isset($_POST['docsub35'])){
	$usernamed=$_POST['usernamed'];
    $passwordd=$_POST['passwordd'];
  $emaild=$_POST['emaild'];
  $contactd=$_POST['contactd'];
  $specd=$_POST['specd'];
  $feesd=$_POST['feesd'];
  $hash = password_hash($passwordd , PASSWORD_DEFAULT);
  $query = "INSERT INTO `doctb` (`username`, `password`, `email`, `contact`, `spec`, `docFees`) VALUES ('$usernamed', '$hash', '$emaild', '$contactd', '$specd', '$feesd');";
  $result=mysqli_query($con,$query);
  if($result){
    $query="select * from doctb where username='$usernamed';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    
		      $_SESSION['dname']=$row['username'];
      
    }
		header("Location:doctor-panel.php");
	}
    // header("Location:doctor-panel.php");
  }else{
    echo("<script>alert('Data is not inserted. Try Again!');
          window.location.href = 'index.php';</script>");
  }


}




?>