<?php
session_start();
//if session start exists
//session Username gets value from text field named userid, shown in login.php
if(isset ($_SESSION["Username"])) 
{
?>

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
        width: 25%;
        margin: 0 auto;
        background-color: rgb(43, 43, 43); /* background color */
        padding: 20px; /* Padding around the container */
        border-radius: 20px;
    }
}
</style>

<title>Hurrahooraay Songs Display</title> 
</head> 
 
 <?php
 $music_id = $_POST["music_id"];
 ?>

<body> 
<h2> Delete Song Data </h2> 
 
<?php 
$host="localhost"; 
$user="root"; 
$pass=""; 
$db = "music_collections"; 
 
$conn = new mysqli($host, $user, $pass, $db); 
 
if ($conn->connect_error) 
{ 
    die ("Connection failed: ".$conn->connect_error);   
} 
else  
{ 
    $queryDelete = "DELETE FROM MUSIC WHERE music_id = '".$music_id."' "; 

    if ($conn->query($queryDelete) === TRUE) 
    {
        echo "<p style='color:blue;'> Record has been deleted from database !</p>";
        echo "Click <a href='ViewMusic.php'> here </a> to view music list";
    } 
    else 
    {
        echo "<p style='color:red;'>Query problems! : " . $conn->error . "</p";
    }
}
$conn->close();
?>
</body>
</html>

<?php 
}
else
{
echo "No session exists or session has expired. Please 
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>