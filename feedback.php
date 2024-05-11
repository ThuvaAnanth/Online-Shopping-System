<?php
if(isset($_POST['sub']))
{
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$con1=new mysqli("localhost","root","","");
$sql="insert into feedback(name,email,feedback) values('".$name."','".$email."','".$message."')";
$con1->query($sql);
$con1->close();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Feedback Form</title>
  <link rel="stylesheet" type="text/css" href="feedback1.css">
</head>
<body>
  <h1>Feedback Form</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    
    <label for="email">Email:</label>
    <input type="text" name="email" required>
    
    <label for="message">Message:</label>
    <textarea name="message" required></textarea>
    
    <input type="submit" name="sub" value="Submit">
  </form>
</body>
</html>
