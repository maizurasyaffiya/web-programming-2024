<?php
session_start();
//if session start exists
//session Username gets value from text field named userid, shown in login.php
if(isset ($_SESSION["Username"])) 
{
?>
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
        width: 25%;
        margin: 0 auto;
        background-color: rgb(43, 43, 43); /* background color */
        padding: 20px; /* Padding around the container */
        border-radius: 20px;
    }
}
</style>

<title> Hurrahooraay Songs Display </title>

</head>

<body>

	<div id="navbar">
      <a href="welcome_page.html" class="logo">
        <img src="icon.png" width="200" height="54">
      </a>
      <div id="navbar-right">
        <a href="welcome_page.html">Home</a>
        <a href="aboutUs.html">About Us</a>
        <a href="contact.html">Contact</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>

<h2> Display Songs Collection </h2>

<p style="color:maroon;font-weight:bold;"> User Status Details </p>

<?php
$Username = $_POST["Username"];

$host = "localhost";
$user = "root";
$pass = "";
$db = "music_collections";

$conn = new mysqli ($host, $user, $pass, $db);

if ($conn->connect_error) {
	die("Connection failed: ".$conn->connect_error);
}
else
{
	$queryGet="SELECT * FROM USERS WHERE Username ='".$Username."'";

	$resultGet=$conn->query($queryGet);

	if ($resultGet->num_rows > 0) {
?>

<form action="music_blockedSave.php" name="Userstatusform" method="POST">

<?php
	while($row=$resultGet->fetch_assoc()) {
?>
  Username: <b><?php echo $row["Username"];?></b>
  <br><br>
  User Status: <?php $status = $row["user_status"];?> 
  <input type="radio" name="user_status" value="Active" <?php if ($status == "Active") echo "checked";?>> Active
  <input type="radio" name="user_status" value="Blocked" <?php if ($status == "Blocked") echo "checked";?>> Blocked
	
<br><br>
<input type="hidden" name="Username" value="<?php echo $row["Username"]; ?>">
<input type="Submit" value="Update New Details">
</form>

<?php
}
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
echo "No session exists or session has expired. Please log in again.<br>";
echo "<a href='login.html'> Login</a>";
}
?>