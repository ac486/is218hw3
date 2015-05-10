<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'pages.php';
      global $db;
if (isset($_POST['add'])){ 
  $add = "INSERT INTO employees(emp_no, birth_date, first_name, last_name, gender, hire_date)
      VALUES (:eid, :bdate, :fname, :lname, :gen, :hdate)";
$qry = $db->prepare($add);

$qry->bindParam(':eid', $_POST['emp_no'], PDO::PARAM_STR);
$qry->bindParam(':bdate', $_POST['birth'], PDO::PARAM_STR);
$qry->bindParam(':fname', $_POST['firstname'], PDO::PARAM_STR);
$qry->bindParam(':lname', $_POST['lastname'], PDO::PARAM_STR);
$qry->bindParam(':gen', $_POST['sex'], PDO::PARAM_STR);
$qry->bindParam(':hdate', $_POST['hire'], PDO::PARAM_STR);
$qry->execute();
echo "Entry Submitted";
exit();
}
?>
<h2>Add Employee</h2>
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
<input type = "hidden" name = "add" value = "true">
</form>
<form action="index.php"> 
<input type="submit" value="Cancel">
</form>
