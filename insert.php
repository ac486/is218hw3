<?php
  if( $_POST["emp_no"] || $_POST["birth"] )
  {
     echo "Your submission has been added</br> ";
     echo "Welcome ". $_POST['emp_no']. "<br />";
     echo "You are ". $_POST['birth']. " years old.";
     exit();
  }
?>

<form action="" method = "POST">
Employee #:<br>
<input type="text" name="emp_no" value="#">
<br>
Birth Date:<br>
<input type="text" name="birth" value="#">
<br>
First Name:<br>
<input type="text" name="firstname" value="#">
<br>
Last Name:<br>
<input type="text" name="lastname" value="#">
<br>
Gender:<br>
<input type="text" name="sex" value="#">
<br>
Hire Date:<br>
<input type="text" name="hire" value="#">
<br><br>
<input type="submit" value="Submit">
</form>
<form action="index.php"> 
<input type="submit" value="Cancel">
</form>
