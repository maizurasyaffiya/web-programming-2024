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

<form action="music_editSave.php" name="UpdateForm" method="POST">


<?php
	while($row=$resultGet->fetch_assoc()) {
?>
	Music ID: <b><?php echo $row["music_id"];?></b>
	<br><br>
	Title: <input type="text" name="title" value="<?php echo $row["title"];?>" max length="50" size="35" required>
	<br><br>
	Artist/Band Name: <input type="text" name="artist" value="<?php echo $row["artist"];?>" max length="50" size="35" required>
	<br><br>
	Audio OR Video of the song: <input type="url" name="link" maxlength="50" size="70" value=<?php echo $row["link"];?> required>
	<br><br>
	Genre: <?php $genre = $row["genre"];?>
	<select name = "genre" required>
		<option value=""> - Please Choose - </option>
		<option value="Lofi" <?php if ($genre == "Lofi") echo "selected"; ?>> Lofi </option>
		<option value="Rock" <?php if ($genre == "Rock") echo "selected"; ?>> Rock </option>
		<option value="Lullabies" <?php if ($genre == "Lullabies") echo "selected"; ?>> Lullabies </option>
		<option value="Classic" <?php if ($genre == "Classic") echo "selected"; ?>> Classic </option>
		<option value="Romantic" <?php if ($genre == "Romantic") echo "selected"; ?>> Romantic </option>
		<option value="Pop" <?php if ($genre == "Pop") echo "selected"; ?>> Pop </option>
		<option value="Jazz" <?php if ($genre == "Jazz") echo "selected"; ?>> Jazz </option>
		<option value="Alt" <?php if ($genre == "Alt") echo "selected"; ?>> Alt </option>
		<option value="RNB" <?php if ($genre == "RNB") echo "selected"; ?>> RNB </option>
	</select>
	<br><br>
	Language: <?php $bahasa = $row["bahasa"];?> 
	<input type="radio" name="bahasa" value="Malay" <?php if ($bahasa == "Malay") echo "checked";?>> Malay
	<input type="radio" name="bahasa" value="English" <?php if ($bahasa == "English") echo "checked";?>> English
  <input type="radio" name="bahasa" value="Korea" <?php if ($bahasa == "Korea") echo "checked";?>> Korea
	<br><br>
	Release Date: <input type="date" name="releaseDate" value="<?php echo $row["releaseDate"]; ?>" required>
	<br><br>
	Detail: <input type="text" name="detail" value="<?php echo $row["detail"]; ?>">
	<br><br>
	
<br><br>
<input type="hidden" name="music_id" value="<?php echo $row["music_id"]; ?>">
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
