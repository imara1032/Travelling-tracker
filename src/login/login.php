<?
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>login</title>
  <meta name="description" content="">
  <meta name="author" content="admin">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    
  <script href="../bootstrap/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"></link>

</head>

<body>
  <div class= "container-fluid text-center">
  <h1>Traveling Tracker</h1>
    <form action="test.php" method="post">

           Username:<input type="text" name="name" id="uName">
              			
           </br>
           Password:<input type="password" id="password" name="password">
              </br>
  
              		<input type="submit" id="submit">
           </br>
       
    </form>
  
  <a href= "register.html" style = "text-decoration: none"> 
<button >Register</button> </a>
          <br/>   			
       <?php
       if(isset($_SESSION['error']))  {
  		    echo "Incorrect username/password";
  		    echo "<br />";
       }
       ?>
   				 

  </div>
</body>
</html>
