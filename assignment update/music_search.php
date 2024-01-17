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
        width: 30%;
        margin: 0 auto;
        background-color: rgb(43, 43, 43); /* background color */
        padding: 20px; /* Padding around the container */
        border-radius: 20px;
    }
}
</style>

<title>Hurrahooraay Songs Display</title> 

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
<h1> Search Music Details </h1> 
 
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
    if (isset($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $queryView = "SELECT * FROM MUSIC 
                      WHERE title LIKE '%$search%' 
                         OR artist LIKE '%$search%' 
                         OR genre LIKE '%$search%' 
                         OR bahasa LIKE '%$search%' 
                         OR releaseDate LIKE '%$search%' 
                         OR detail LIKE '%$search%' 
                         OR Owner_ID LIKE '%$search%'
                         OR status LIKE '%$search%'";
} else {
    $queryView = "SELECT * FROM MUSIC "; 
    $resultQ = $conn->query($queryView);  
} 
}
?> 
 
<center>
<div class="container">
<form action="music_details.php" method="GET">
    <label for="search">Search:</label>
    <input type="text" name="search" placeholder="Enter keywords">
    <button type="submit">Search</button>
</form>
</div>
</center>

 
<?php 
$conn->close(); 
?> 
 
<br> 
Click <a href="menu.php">here</a> back to MENU page.    
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
