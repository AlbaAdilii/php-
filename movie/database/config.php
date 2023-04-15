<?php
$user="root";
$pass="";
$server="localhost";
$dbaname="mms";

try{
    $conn=new PDO("mysql:host=$server;dbname=$dbaname",$user.$pass);
} catch(PDOException $e){
    echo "error: ". $e->getMessage();
}




?>