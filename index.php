<html>
<head>
<title>IS218 Homework 3</title>
</head>
<body>
<?php
error_reporting(-1);
ini_set('display_errors', 'On');

$db = new PDO('mysql:host=localhost;dbname=employees;charset=utf8',
   'root',
   'wildfoot',
   array(
      PDO::ATTR_EMULATE_PREPARES => false,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
   )
);

$sql = 'select employees.emp_no, employees.first_name from dept_manager left join employees on dept_manager.emp_no = employees.emp_no where dept_manager.dept_no = \'d001\' limit 5';



foreach($db->query($sql) as $row) {
   print_r($row);
}


echo "</br></br>";
echo 'hello world';
echo "</br></br>";

echo "1. Who is the highest paid employee?</br>";
$sql1 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary from employees left join salaries on employees.emp_no=salaries.emp_no order by salary DESC limit 1';

foreach($db->query($sql1) as $row) {
   print_r($row);
}

?>
</body>
</html>

