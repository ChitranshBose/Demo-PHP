<?php include_once("config.php"); ?>

<?php
if(isset($_POST['signup'])){
   $first_name=$_POST['first_name'];
   $last_name=$_POST['last_name']; 
   $username = $_POST['username']; 
   $password = $_POST['password'];

   echo 'The details entered by you are - UserName: '.$username ." Password: ".$password."<br>";
      

      
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
                echo "The file ". basename( $target_file). " has been uploaded.";
                $uploadOk=1;
            }
           else 
            {
                echo "Sorry, there was an error uploading your file.";
            }
      
      if(empty($first_name) ||empty($last_name) || empty($username) || empty($password) || empty($target) ){
          echo "Some fileds are empty.";
      }
      else{
         
           $sql = "INSERT INTO `users` (`first_name`, `last_name`,`username`, `password`,`flag`,`filename`) VALUES ('$first_name', '$last_name','$username','$password' ,'1','$target' )";
         
            if($mysqli->query($sql))
            {
                echo "Data successfully inserted.";
                header("Location:index.php");
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

<form action="index.php" method="post" enctype="multipart/form-data">
   
  <div class="container">
    <h1 style="color:white; text-align: center;"><b>Sign Up</b></h1>
    <p  style="color:white; text-align: center;"><b>Please fill in this form to create an account.</b></p>
    
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
                    <input type="file" name="uploadFile" id="uploadFile" style="color: white;" required>
                </td>
    </tr>   
 
           
        <div class="clearfix">
            <tr><td>
                    <button type="submit" value="SIGNUP" name="signup"  class="btn btn-success">Sign Up</button>
                </td>
                <td>
                    <button onclick="update()" class="btn btn-default">Update</button >
                </td>
                <td>
                    <button onclick="remove()" class="btn btn-default">Delete</button >
                </td>
            </tr>   
      </div>
           </table>
      <script type="text/javascript">
		function update() {
			window.location.replace("update.php");
		}
    function remove() {
      window.location.replace("delete.php");
    }
	</script>
  </div>
</form>
</body>
</html>