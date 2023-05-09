<?php
session_start();
include_once('config.php');

$client_id=$_SESSION['id'];
$reservation_id=$_SESSION['reservation_id'];
$nr_people=$_POST['nr_people'];
$date=$_POST['date'];
$time=$_POST['time'];
$sql="INSERT INTO reservation(client_id, reservation_id, nr_people, date, time) 
VALUES (:client_id, :reservation_id,:nr_people,:date, :time)";

    $insertBookings=$conn->prepare($sql);
    $insertBookings->bindParam(":client_id", $client_id);
    $insertBookings->bindParam(":reservation_id", $reservation_id);
    $insertBookings->bindParam(":nr_people", $nr_people);
    $insertBookings->bindParam(":date", $date);
    $insertBookings->bindParam(":time", $time);

    $insertBookings->execute();
    header("Location: home.php");











?>