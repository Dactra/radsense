<?php

if (!file_exists('installed.txt')) {

$servername = $_POST['server'];
$db = $_POST['dbname'];
$username = $_POST['dbuser'];
$dbpass = $_POST['dbpass'];

if(empty($servername) || empty($db) || empty($username) || empty($dbpass))
{
echo "You did not fill out the required fields.";
}

else {

$config='<?php $servername = "'.$servername.'";
$username = "'.$username.'";
$password = "'.$dbpass.'";
$db = "'.$db.'";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
} ?>';


//echo file_put_contents("test.txt","$config");

if(!file_put_contents("config.php", $config)){
    print 'The file could not be created.';
}
else{
//header("location: sql.php");
echo'<script>
setTimeout(function() {
  window.location.href = "sql.php";
});
</script>';
}
}

}
else {
echo "Radsense is already installed. To rerun the installation script delete the installed.txt file.";
}
