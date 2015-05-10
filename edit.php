<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'pages.php';
      global $db;
if (isset($_POST['edit'])){
   $edit = "UPDATE employees SET birth_date = :bdate, first_name = :fname, last_name = :lname, hire_date = :hdate WHERE emp_no= :eid";
$qry = $db->prepare($edit);

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

<h2>Edit Employee Information</h2>
<form action="" method = "POST">
<br>
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
<input type="hidden" value="edit">
</form>
<form action="index.php">               
<input type="submit" value="Cancel">
</form>
