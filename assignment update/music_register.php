<?php
session_start();
//if session start exists
//session Username gets value from text field named userid, shown in login.php
if(isset ($_SESSION["Username"])) 
{
?>

<!DOCTYPE HTML>
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

    a {
      color: rgb(255, 4, 171);
    }
}
</style>

<title>Hurrahooraay Songs Display</title> 

</head> 
<?php 
$title = $_POST["title"]; 
$artist = $_POST["artist"]; 
$link = $_POST["link"]; 
$genre = $_POST["genre"]; 
$bahasa = $_POST["bahasa"]; 
$releaseDate = $_POST["releaseDate"]; 
$detail = $_POST["detail"]; 
?> 
 
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
    <br><br> 
    <center>
    <table border="1"> 
        <tr> 
            <td>Title of the song: </td> 
            <td><b style="color:violet;"> <?php echo $title; ?> </b></td> 
        </tr> 
        <tr> 
            <td>Artist/Band Name: </td> 
            <td><b> <?php echo $artist; ?> </b></td> 
        </tr> 
        <tr> 
            <td>Audio OR Video of the song: </td> 
            <td><b> <a href="<?php echo $link; ?>" target="_blank"> <?php echo $link; ?> </a></b></td> 
        </tr> 
        <tr> 
            <td> Genre: </td> 
            <td><b> <?php echo $genre; ?> </b></td> 
        </tr> 
        <tr> 
            <td>Language: </td> 
            <td><b> <?php echo $bahasa; ?> </b></td> 
        </tr> 
        <tr> 
            <td>Release Date: </td> 
            <td><b> <?php echo $releaseDate; ?> </b></td> 
        </tr> 
        <tr> 
            <td>Detail: </td> 
            <td><b> <?php echo $detail; ?> </b></td> 
        </tr> 
    </table> 
    </center>
    <br><br> 
     
<?php  
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db = "music_collections"; 
 
$conn = new mysqli($host, $user, $pass, $db); 
if ($conn->connect_error){ 
    die("NEENOO NEENO, Error Error !".$conn->connect_error); 
} 
else  
{ 
    $DBquery = "INSERT INTO MUSIC (title, artist, link, genre, bahasa, releaseDate, detail, Owner_ID) 
    VALUES ('".$title."' , '".$artist."' , '".$link."' ,'".$genre."' , '".$bahasa."' , '".$releaseDate."' , '".$detail."', '".$_SESSION["Username"]."' )";  
 
    if ($conn->query($DBquery) === TRUE) { echo "<p style='color:purple;'>Congratulations! Success insert record</p>"; 
    } else { 
        echo "<p style='color:red;'> Sorry! Fail to insert" . $conn->error. "</p>"; 
    }    
}
 
$conn->close(); 
?> 
 
<p>Click <a href="music_register.html">here</a> to enter NEW music details.</p> 
<p>Click <a href="ViewMusic.php">here</a> to VIEW all music details.</p>
<p>Click <a href="music_editView.php">here</a> to EDIT music details.</p>
<br><br> 
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
