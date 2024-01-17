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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the form
    $Username = $_POST["Username"];
    $UserPwd = $_POST["UserPwd"];

    // TODO: Perform authentication logic here (e.g., check against a database)

    // Example: Insert user data into a database (using MySQLi for illustration)
    $host = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "music_collections";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the username already exists
    $checkStmt = $conn->prepare("SELECT Username FROM users WHERE Username = ?");
    $checkStmt->bind_param("s", $Username);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
      echo "<p style='color:red;'>Error: Username already exists! <br> Please use another username.</p>";
      echo "Click <a href='login.html'> here </a> to login ";
  } else {
      // Username is unique, proceed with registration
      $UserType = 'user';
      $stmt = $conn->prepare("INSERT INTO users (Username, UserPwd, UserType) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $Username, $UserPwd, $UserType);

      if ($stmt->execute()) {
          echo "<p style='color:green;'>User registered successfully! </p>";
          echo "Click <a href='login.html'> here </a> to login ";
      } else {
          echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
      }

      $stmt->close();
  }

  $checkStmt->close();
  $conn->close();
}
?>