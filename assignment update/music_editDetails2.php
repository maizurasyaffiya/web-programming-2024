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

<p style="color:maroon;font-weight:bold;"> Update Music details </p>

<?php
$music_id = $_POST["music_id"];

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
	$queryGet="SELECT * FROM MUSIC WHERE music_id ='".$music_id."'";

	$resultGet=$conn->query($queryGet);

	if ($resultGet->num_rows > 0) {
?>

<form action="music_editSave2.php" name="UpdateForm" method="POST">

<?php
	while($row=$resultGet->fetch_assoc()) {
?>
	Music ID: <b><?php echo $row["music_id"];?></b>
	<br><br>
	Title: <b><?php echo $row["title"];?></b>
	<br><br>
	Artist/Band Name: <b><?php echo $row["artist"];?></b>
	<br><br>
	Audio OR Video of the song: <b><?php echo $row["link"];?></b>
	<br><br>
	Genre: <b><?php echo $row["genre"];?></b>
	<br><br>
	Language: <b><?php echo $row["bahasa"];?></b>
	<br><br>
	Release Date: <b><?php echo $row["releaseDate"];?></b>
	<br><br>
	Detail: <b><?php echo $row["detail"];?></b>
	<br><br>
  Status: <?php $status = $row["status"];?> 
  <input type="radio" name="status" value="Approved" <?php if ($status == "Approved") echo "checked";?>> Approved
  <input type="radio" name="status" value="Rejected" <?php if ($status == "Rejected") echo "checked";?>> Rejected
	
<br><br>
<input type="hidden" name="musicid" value="<?php echo $row["music_id"]; ?>">
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