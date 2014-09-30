<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<?php 
/* Profile class*/
class Profile
{
	protected $nationalID;
	protected $registrationNumber;
	protected $fullname;
	protected $nameWithInitials;
	protected $emailAddress;
	protected $contactNumber;
	protected $personalAddress;
	
	function login()
	/*function for the login scenario*/
	{
		//session_start();
		require_once("../Database/DB_Connect.php");

	//variables for POST method 
	$username = $_POST["username"];
	$password = $_POST["password"];
	//$usertype = $_POST["usertype"];

	//check the username and password for correctness
	$Check_Details = ("SELECT username FROM profile WHERE username = '$username' AND password = '$password'") or die(mysql_error());
	$result = mysql_query($Check_Details);

	while($row=mysql_fetch_array($result))
		{
		$name=$row["0"];
		}
	if(mysql_affected_rows()==0) 
		{
		echo "<script language='javascript'>window.alert('Please Check Your Username, Password and the User Type!')</script>";
		}
	else
		{
		$_SESSION["username"] = $name;
		
		if($username == admin)
			{
			header("Location:../WebPages/Admin.php");
			}
		else{
		header("Location:../WebPages/home.html");
		exit;
			}
		}
		
		
	}
	
	function viewProfile(){
		
	}
	
}
$my= new Profile;
$my->login();


?>
</body>

</html>
