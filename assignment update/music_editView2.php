<?php
session_start();

if(isset($_SESSION["Username"]) && $_SESSION["UserType"] == "admin") {
?>

<!DOCTYPE html>
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
        width: 85%;
        margin: 0 auto;
        background-color: rgb(43, 43, 43); /* background color */
        padding: 20px; /* Padding around the container */
        border-radius: 20px;
    }
    a {
      color: rgb(255, 4, 171);
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

<h1> Display Songs Collection </h1>
<h5> *Admin can only update status </h5>

<form action = "music_editDetails2.php" method="POST" onsubmit="return confirm('Are you sure to update status of this record?')">
<center>
<div class="container">
<table border="2">
<tr>
  <th><a style="color: aliceblue; text-decoration: none;"> Choose </a></th>
	<th><a style="color: aliceblue; text-decoration: none;"> Music ID </a></th> 
	<th><a style="color: aliceblue; text-decoration: none;"> Title </a></th> 
	<th><a style="color: aliceblue; text-decoration: none;"> Artist/Band Name </a></th> 
	<th><a style="color: aliceblue; text-decoration: none;"> Audio OR Video of the song </a></th> 
	<th><a style="color: aliceblue; text-decoration: none;"> Genre </a></th> 
	<th><a style="color: aliceblue; text-decoration: none;"> Language </a></th> 
	<th><a style="color: aliceblue; text-decoration: none;"> Release Date </a></th> 
	<th><a style="color: aliceblue; text-decoration: none;"> Detail </a></th> 
	<th><a style="color: aliceblue; text-decoration: none;"> Owner ID </a></th>
  <th><a style="color: aliceblue; text-decoration: none;"> Status </a></th>
</tr>

<?php
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
	$queryView="SELECT * FROM music";
	$resultQ=$conn->query($queryView);

	if ($resultQ->num_rows > 0) {
	while($row = $resultQ->fetch_assoc()) {
?>
<tr>
    <td><input type="radio" name="music_id" value="<?php echo $row["music_id"];?>" required> </td>
    <td> <?php echo $row ["music_id"];?></td> 
    <td> <?php echo $row ["title"];?></td> 
    <td> <?php echo $row ["artist"];?></td> 
    <td> <a href="<?php echo $row ["link"];?>" target="_blank"><?php echo $row["link"];?></td> 
    <td> <?php echo $row["genre"]; ?></b></td> 
    <td> <?php echo $row ["bahasa"];?></td> 
    <td> <?php echo $row ["releaseDate"];?></td> 
    <td> <?php echo $row ["detail"];?></td> 
    <td> <?php echo $row["Owner_ID"];?> </td>
    <td> <?php echo $row["status"];?> </td>
</tr>

<?php
	}
	} else {
	echo "<tr><td colspan='8'>NO data have been selected </td></tr>";
	}
}
$conn->close();
?>
</table>
</div>
</center>
<br>
<input type="submit" value="View record to update status">
<br><br>
</form>
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
