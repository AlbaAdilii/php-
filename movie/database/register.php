<?php 
  
include_once("config.php");
if(isset($_POST['submit']))
{
    $emri=$_POST['emri'];
    $mbiemri=$_POST['mbiemri'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $tempPass=$_POST['password'];
    $password=password_hash($tempPass, PASSWORD_DEFAULT);
    $repassword=$_POST['confirm_password'];


    
    if(empty($emri) || empty($mbiemri)|| empty($email) || empty($password) || empty($repassword))
    {
        echo "You need to fill all the fields";
       header("refresh:2 url=index.php");
    }
    else{
        if($tempPass!=$repassword){
            echo "Password donot much";
      header("refresh:2; url=index.php");
        }
       $sql="SELECT username FROM users WHERE username=:username";

        $tempSQL=$conn->prepare($sql);
        $tempSQL->bindParam(':username',$username);
        $tempSQL->execute();

        if($tempSQL->rowCount()>0){
            echo "Username eexist!";
      header("refresh:2; url=index.php");
        }
            else{
                $sql="insert into users (emri,mbiemri,username,email,password) values (:emri, :mbiemri, :username, :email, :password)";         
                $insertSql=$conn->prepare($sql);

                $insertSql->bindParam(":emri", $emri);
                $insertSql->bindParam(":mbiemri", $mbiemri);
                $insertSql->bindParam(":username", $username);
                $insertSql->bindParam(":email", $email);
                $insertSql->bindParam(":password", $password);
             
                $insertSql->execute();

                echo "Data saved suscessfully..";
            header("refresh:2; url=login.php");

            }
        }
    }
    




?>











































