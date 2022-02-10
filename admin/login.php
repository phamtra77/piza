<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/admin.css" />
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>
            <!-- Form login -->
            <form action="" method="POST" class="text-center">
                Username: <br>
                   <input type="text" name="username" placeholder="Enter Username"><br><br>
                Password:<br>
                   <input type="password" name="password" placeholder="Enter Password"><br><br>
                
                   <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
            </form>
            <p class="text-center">Create by <a href="#">Tra Pham</a></p>
        </div>
    </body>
</html>
<?php 
  if(isset($_POST['submit']))
  {
      //1. Get the data from login form
       $username = $_POST['username'];
       $password = $_POST['password'];

       //2. Sql to check the user, password exists or not
       $sql = "SELECT* FROM tbl_admin WHERE username = '$username' AND password = '$password'";
      }
?>