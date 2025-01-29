<?php
//Check request method....
// if($_SERVER['REQUEST_METHOD']=='POST'){
// if(isset($_POST['cityname'])){
//     echo "Your city name is ".$_POST['cityname'];
// }
// else{
//     echo 'error';
// }
// }



// if($_SERVER['REQUEST_METHOD']=='GET'){
//     if(isset($_GET['cityname'])){
//         echo "Your city name is ".$_GET['cityname'];
//     }
//     else{
//         echo 'error';
//     }
//     }
    
$host = 'localhost';
$username = 'root';
$password = '';

//Connect Mysql
$connection = mysqli_connect($host, $username, $password);

if(!$connection){
echo "Couldn't Connect to Database....";
die('Error');
}
else{
    echo "Connection Established";
}



$createDatabase = "CREATE DATABASE IF NOT EXISTS datacontainer";
$result = mysqli_query($connection, $createDatabase);
if($result){
    echo "Database Created Successfully...";
}
else{
    echo "Couldn't connect Database...";
}


mysqli_select_db($connection, "datacontainer");

$createTable = "CREATE TABLE IF NOT EXISTS Movies(Movie_Name varchar(20), Release_Year varchar(10), Posert_URL varchar(200) )";

$result = mysqli_query($connection, $createTable);
if($result){
    echo "Table Created...";
}
else{
    echo "Table cant be created...".mysqli_connect_error();
}




?>