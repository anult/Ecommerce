<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}

require_once "connection.php";
$username = $password = "";
$username_err = $password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(trim($_POST["username"]))){
    $username_err = "Please enter username.";
  } else{
    $username = trim($_POST["username"]);
  }

  if(empty(trim($_POST["password"]))){
    $password_err = "Please enter your password.";
  } else{
    $password = trim($_POST["password"]);
  }

  if(empty($username_err) && empty($password_err)){ 
    $sql = "SELECT id, username, password FROM users WHERE username = ?";

    if($stmt = mysqli_prepare($connection, $sql)){
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      $param_username = $username;

      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt) == 1){    

          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if(mysqli_stmt_fetch($stmt)){
            // die( $password); 
            if($password==$hashed_password){
              session_start();
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;                            

              header("location: welcome.php");
            } else{
              $password_err = "The password you entered was not valid.";
            }
          }
        } else{
          $username_err = "No account found with that username.";
        }
      } else{
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

    mysqli_stmt_close($stmt);
  }

  mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <style type="text/css">
    body{
      font: 14px sans-serif; }
      .wrapper{ width: 350px; 
        padding: 20px; 
        background:skyblue;
      }
    </style>
  </head>
  <body>
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <div class="wrapper">
         <h2>LOGIN FORM</h2>
         <p>Please fill in your credentials to login.</p>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>UserName</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
          </div>    
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <span class="help-block"><?php echo $password_err; ?></span>
          </div>
          <div class="form-group">
           <input type="submit" class="btn btn-primary" value="Login">
         </div>

       </form>
     </div>
   </div>
 </div>
</div>   
</body>
</html>