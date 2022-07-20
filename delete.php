<?php include_once("config.php"); ?>

<?php
if(isset($_POST['delete'])){
   
   $username = $_POST['username']; 
  

      
      if(empty($username)){
          echo "Some fileds are empty.";
      }
      else{
         
           $sql = "UPDATE `users` SET `flag` = '0' WHERE `username` = '$username'";
         
            if($mysqli->query($sql))
            {
                echo "Data successfully removed.";
                header("Location:delete.php");
            }
            else{
                  echo "Error....".$mysqli->error;
              }
        }
      }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    
<style>
    
  body {font-family: Arial, Helvetica, sans-serif;}
  * {box-sizing: border-box}
  input[type=text], input[type=password] {
  width: 100%;
  padding: 7px;
  margin: 2px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}    
    body{
        
        background-image: url(sign-up.jpeg);
        background-size:cover;
        background-attachment: fixed;
        color:white;
    }
  input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

.container {
  
    width: 35%;
    margin-left: 35%;
    
}
    #ddown{
        width: 100%;
        height: 30px;
       
    }
    
</style>
        </head>
<body>

<form action="delete.php" method="post">
   
  <div class="container">
    <h1 style="color:white; text-align: center;"><b>Remove Account</b></h1>
   
    
       <table>
     <tr>
       

    <tr>
        <td><b>User Name:</b></td>
        <td colspan="2">
    <input type="text" placeholder="Enter User Name" name="username" required> 
        </td></tr>
      
           
     
        <div class="clearfix">
            <tr><td>
                    <button type="submit" value="DELETE" name="delete"  class="btn btn-success">Delete</button>
                </td>
                <td>
                    <button onclick="signUp()" class="btn btn-default">Sign Up</button >
                </td>
            </tr>   
      </div>
           </table>
            <script type="text/javascript">
   function signUp() {
      window.location.replace("index.php");
    }
    
  </script>
     
  </div>
</form>
</body>
</html>