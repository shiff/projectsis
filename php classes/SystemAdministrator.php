<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
//include("Profile.php");
class SystemAdministratorProfile
{
	private $educationQualification;
	
	function addNewProfile(){
		
	
		require_once("../Database/DB_Connect.php");
		$username = $_POST["username"];
		$password = $_POST["password"];
		$usertype = $_POST["usertype"];
		
		
		$check_user=("SELECT username FROM profile WHERE username='$username'");
		$result=mysql_query($check_user);
		
		while($row=mysql_fetch_array($result))
		{
		$name=$row["0"];
		}
		
		if(mysql_affected_rows()!=0){
			echo "User already exists.<br>";
			echo "<a href='../Admin.php'> Home page<br></a>";
			echo "<a href='Add_New_Profile.php'> Add another user</a>";
			exit;
		}
		
		else{
		$add_user = ("INSERT INTO profile(username,password,usertype) VALUES('$username','$password','$usertype')") or die(mysql_error());
		mysql_query($add_user);
		echo " User Added Successfully<br>.";
		echo "<a href='../Admin.php'>Home page<br></a>";
		echo "<a href='Add_New_Profile.php'> Add another user</a>";
		exit;
		}
	}
	
	/*function completeDataSheet(){
		session_start();
		
		require_once("../Database/DB_Connect.php");
		
		$first_name=$_POST["firstname"];
		$middle_name=$_POST["middlename"];
		$sur_name=$_POST["surname"];
		$national_id_number=$_POST["nicnumber"];
		$fixed_telephone_number=$_POST["fixednumber"];
		$mobile_number=$_POST["mobilenumber"];
		$address_permenent=$_POST["permanenataddress"];
		$address_temporary=$_POST["temporaryaddress"];
		$email_address=$_POST["emailaddress"];
		$degree=$_POST["degree"];
		$school_attended=$_POST["school"];
		$advanced_level_stream=$_POST["academicyear"];
		
		$insert_details=("INSERT INTO student(first_name,middle_name,sur_name,national_id_number,fixed_telephone_number,mobile_number,address_permenent,address_temporary,email_address,degree,school_attended,advanced_level_stream)VALUES('$first_name','$middle_name','$sur_name','$national_id_number','$fixed_telephone_number','$mobile_number','$address_permenent','$address_temporary','$email_address','$degree','$school_attended','$advanced_level_stream')");
		mysql_query($insert_details);
		
		echo "send to verify<br>";
	}*/
	}


$admin =new SystemAdministratorProfile;
$admin->addNewProfile();
?>
</body>
</html>
