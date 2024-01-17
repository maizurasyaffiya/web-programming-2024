<html>
<head>
<style>
body { 
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    color:white;
    text-align: center;
    background-image: url("bg2.jpg") ;
    background-size: 1600px 850px;

    * {box-sizing: border-box;}
    body { 
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }
    
    #navbar {
      overflow: hidden;
      background-color: rgb(43, 43, 43);
      padding: 20px 10px;
    }
    
    #navbar a {
      float: left;
      color: rgb(255, 255, 255);
      text-align: center;
      padding: 12px;
      text-decoration: none;
      font-size: 18px; 
      line-height: 25px;
      border-radius: 4px;
    }
    
    
    .navbar a.logo {
      font-size: 25px;
      font-weight: bold;
    }
    
    #navbar a:hover {
      background-color: #704b73;
      color: rgb(255, 255, 255);
    }
    
    #navbar a.active {
      background-color: rgb(215, 0, 211);
      color: rgb(0, 0, 0);
    }
    
    #navbar-right {
      float: right;
    }
    
    @media screen and (max-width: 500px) {
      #navbar a {
        float: none;
        display: block;
        text-align: left;
      }
      
      #navbar-right {
        float: none;
      }
    }
    
    #one {
        color:black;
        text-align: center;
        font-style: italic;
        font-size: 150px;
        font-weight: bold;
      }
    
    img {
      max-width: 100%;
      height: auto;
    }

    .container /* Class for Border */
    {
        width: 80%;
        margin: 0 auto;
        background-color: rgb(43, 43, 43); /* background color */
        padding: 20px; /* Padding around the container */
        border-radius: 20px;
    }
}
</style>
<?php
//this codes is for login process
//check userid & pwd is matched 
$Username = $_POST['Username']; 
$UserPwd = $_POST['UserPwd']; 
//declare DB connection variables
$host = "localhost";
$username = "root";
$password = ""; 
$dbname = "music_collections";
//create connections with DB
$link = new mysqli($host, $username, $password, $dbname);
if ($link->connect_error) { //to check if DB connection IS NOT OK
 die("Connection failed: " . $link->connect_error); // display MySQL error
}
else
{
 //connect successfully
 //check userID is exist
 $queryCheck = "select * from USERS where Username = '".$Username."' ";
 //execute query
 $resultCheck = $link->query($queryCheck);
 if ($resultCheck->num_rows == 0) {
 echo "<p style='color:red;'>User ID does not exists </p>";
 echo "<br>Click <a href='login.html'> here </a> to log-in again";
 }
 else
 {
 $row = $resultCheck->fetch_assoc();
 $user_status = $row["user_status"];
 
 if ($user_status === 'Blocked') 
 {
  header ("location: blocked.php");
  exit ();
 }

 else 
 {

 // check if password database = password user enter
 if( $row["UserPwd"] == $UserPwd )
 {

//calling the session_start() is compulsory
session_start();
//asign Username & usertype value to session variable
$_SESSION["Username"] = $Username ;
$_SESSION["UserType"] = $row["UserType"];

//redirect to file menu.php upon successful login
header("Location:menu.php");
} else { //if password not matched

echo "<p style='color:red;'>Wrong password!!! </p>";
echo "Click <a href='login.html'> here </a> to login again ";
}
}
}
}
$link->close();
?>
</head>
</html>