<?php
$your_name = $_POST["your_name"];
$your_email = $_POST["your_email"];
$your_enquiry = $_POST["your_enquiry"];

//the database name created is contact, the table is named contactinfo
$dbname = "contact";
$tbname = "contactinfo";
$dbhost = "localhost:3306";
$dbuser = "root";
$dbpass = "";

$conn= mysqli_connect($dbhost, $dbuser, $dbpass);

if(!$conn)
{
	
	print "<p>Error: Couldn't connect to the database:" . mysqli_error()."</p>";
}
else
{
	print "<p> Connection successful!</p>";
	
}

mysqli_select_db($conn, $dbname);

$insertquery = "
insert into $tbname
(your_name, your_email, your_enquiry, date)
values
(\"$your_name\", \"$your_email\", \"$your_enquiry\", NOW())";

$retval = mysqli_query($conn, $insertquery);
if(! $retval)
{
	print "</p> Error inserting data" . mysqli_error($conn)."</p";
	
}
else
{
print "</p> Successfully submitted information!</p>";	
}
?>
