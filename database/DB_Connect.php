<?php
$Registration_DB_Connect = mysql_connect("localhost","root","") or die("ERROR : Couldn't connect to the server");
mysql_select_db("sis",$Registration_DB_Connect) or die("ERROR : Couldn't connect to the Database");
?>
