<?php
$serverName = "localhost";
$userName= "root";
$password = "";
$conn = mysqli_connect($serverName, $userName, $password);
if($conn){
    // echo "Connection Successful <br>";
}
else{
    echo "Failed to connect".mysqli_connect_error();
}


$createDatabase = "CREATE DATABASE IF NOT EXISTS MOVIEAPP";
if (mysqli_query($conn, $createDatabase)) {
    // echo "Database Created or already Exists <br>";
} else {
    echo "Failed to create database <br>" . mysqli_connect_error();
}

// Select the created database
mysqli_select_db($conn, 'MOVIEAPP');
$createTable = "CREATE TABLE IF NOT EXISTS MOVIETABLE (  
       Movie_Name varchar(200) ,
       R_Year varchar(200),
       Poster varchar(200),
       Types varchar(200),
       Genre varchar(200),
       Actors varchar(200),
       Writer varchar(200),
       Director varchar(200),
       Awards varchar(200),
       Country varchar(200),
       Languages varchar(200),
       Rated varchar(200),
       Runtime varchar(200),
       TotalSeasons varchar(200),
       Descriptions varchar(200)
   );";

if (mysqli_query($conn, $createTable)) {
    //    echo "Table Created or already Exists <br>";
   } else {
       echo "Failed to create database <br>" . mysqli_connect_error();
   }

   if(isset($_GET['t'])){
    $movie = $_GET['t'];
    // echo $movie;
}else{
    $movie = "Viking";
}

$selectAllData = "SELECT * FROM MOVIETABLE where Movie_Name LIKE '%$movie%'";
$result = mysqli_query($conn, $selectAllData);
if (mysqli_num_rows($result) == 0) {
     $url = "http://www.omdbapi.com/?t=".$movie."&apikey=a911f08d";
    $response = file_get_contents($url);
    $data = json_decode($response, true); 
    $Title = $data['Title'];
    $Year = $data['Year'];
    $Poster = $data['Poster'];
    $types = $data['Type'];
    $genre= $data['Genre'];
    $actors= $data['Actors'];
    $writer= $data['Writer'];
    $director= $data['Director'];
    $awards= $data['Awards'];
    $country= $data['Country'];
    $language= $data['Language'];
    $rated= $data['Rated'];
    $runtime= $data['Runtime'];
    $totalseasons= $data['totalSeasons'];
    $description= $data['Plot'];
    $insertData = "INSERT INTO MOVIETABLE (Movie_Name, R_Year, Poster, Types, Genre, Actors, Writer, Director, Awards, Country, Languages, Rated, Runtime, TotalSeasons, Descriptions)
    VALUES ('$Title', '$Year', '$Poster', '$types', '$genre', '$actors', '$writer', '$director', '$awards', '$country', '$language', '$rated', '$runtime', '$totalseasons', '$description')";


if (mysqli_query($conn, $insertData)) {
    // echo "Data inserted Successfully";
} else {
    echo "Failed to insert data" . mysqli_error($conn);
}
}
// Fetching data from weather table based on city name again after insertion
$result = mysqli_query($conn, $selectAllData);
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
// Encoding fetched data to JSON and sending as response
$json_data = json_encode($rows);
header('Content-Type: application/json');
echo $json_data;
?>


