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
    background-image: url("background.png") ;
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
<title> Hurrahooraay Songs Collections </title>
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

    <br><br><br><br>
    <h1> WELCOME, Hi <?php echo $_SESSION["Username"];?> !</h1>
    <div class="container">
    <p style="color:rgb(215, 0, 211);" > Choose your menu : </p><br>
    <?php
    if ($_SESSION["UserType"] == "admin") {
        ?>
        <a style="color: aliceblue; text-decoration: none;" href = "music_search.php"> Search Music Details</a> <br><br>
        <a style="color: aliceblue; text-decoration: none;" href = "ViewMusicAdmin.php"> View Music Collections</a> <br><br>
        <a style="color: aliceblue; text-decoration: none;" href = "music_editView2.php"> Edit Music Details</a> <br><br>
        <a style="color: aliceblue; text-decoration: none;" href = "music_blockedView.php"> User Status Details</a> <br><br>


        <?php
    }
    else {
        ?>
        <a style="color: aliceblue; text-decoration: none;" href = "music_form.php"> Register New Song </a> <br><br>
        <a style="color: aliceblue; text-decoration: none;" href = "music_editView.php"> Edit Music Details</a> <br><br>
        <a style="color: aliceblue; text-decoration: none;" href = "music_deleteView.php"> Delete Music Record</a> <br><br>
        <a style="color: aliceblue; text-decoration: none;" href = "ViewMusic.php"> View Music List</a> <br><br>
        <?php
    }
    ?>
    
</div>
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
