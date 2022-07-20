<?php include_once("config.php"); ?>

<?php
if(isset($_POST['update'])){
   $first_name=$_POST['first_name'];
   $last_name=$_POST['last_name']; 
   $username = $_POST['username']; 
   $password = $_POST['password'];
   $target_dir = "uploads/";   
            $target_file=$_FILES['uploadFile']['name'];
            $target=$target_file;
            $target_file = $target_dir . basename($target_file);
            $tmpname=$_FILES['uploadFile']['tmp_name'];
         $uploadOk = 0;
          if(file_exists($target_file)){
            echo" File already exist";
          }
          elseif (move_uploaded_file($tmpname, $target_file))
            {
                //array_map('unlink', glob("uploads/*.jpeg"));
                array_walk(glob($target_dir . '/*'), function ($fn) {
                  if (is_file($fn))
                    unlink($fn);
                  });
                move_uploaded_file($tmpname, $target_file);
                echo "The file ". basename( $target_file). " has been uploaded.";
                $uploadOk=1;
            }
           else 
            {
                echo "Sorry, there was an error uploading your file.";
            }
      
      if(empty($first_name) ||empty($last_name) || empty($username) || empty($password)  ){
          echo "Some fileds are empty.";
      }
      else{
         
           $sql = "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name',`password` = '$password', `filename` = '$target' WHERE `username` = '$username'";
         
            if($mysqli->query($sql))
            {
                echo "Data successfully updated.";
                header("Location:update.php");
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

<form action="update.php" method="post"  enctype="multipart/form-data">>
   
  <div class="container">
    <h1 style="color:white; text-align: center;"><b>Update Details</b></h1>
    
    
       <table>
     <tr>
     <td><b>Name:</b></td>
    <td>    
    <input type="text" placeholder="First Name" name="first_name" autofocus required></td>
    <td>
    <input type="text" placeholder="Last Name" name="last_name" required>
    </td> </tr>

           
           

    <tr>
        <td><b>User Name:</b></td>
        <td colspan="2">
    <input type="text" placeholder="Enter User Name" name="username" required> 
        </td></tr>
      
           
     <tr>
         <td><b>Password:</b></td>
         <td colspan="2">
    <input type="password" placeholder="Enter Password" name="password" id="pass" required> 
         </td></tr>
           

    <tr>
        <td><b>Confirm Password:</b></td>
        <td colspan="2">
    <input type="password" placeholder="Confirm Password" name="confirmpass" id="reqpass" required>  
        </td></tr>
    <tr>
      <td>
                    <b>File:</b>
                </td>
                <td>
                    <input type="file" name="uploadFile" id="uploadFile" style="color: white;">
                </td>
    </tr>   
 
           
        <div class="clearfix">
            <tr><td>
                    <button type="submit" value="UPDATE" name="update"  class="btn btn-success">Update</button>
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
    function remove() {
      window.location.replace("delete.php");
    }
  </script>
     
  </div>
</form>
</body>
</html>