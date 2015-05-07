<html>
<head>
<title>IS218 Homework 3</title>
</head>
<body>
<h2>IS218 Homework 3</h2>
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

$sql1 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary from employees left join salaries on employees.emp_no=salaries.emp_no order by salary DESC limit 1';

echo '1. Who is the highest paid employee?'.'</a>';
echo "</br></br>";
$sql1 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary from employees left join salaries on employees.emp_no=salaries.emp_no order by salary DESC limit 1';
foreach($db->query($sql1) as $row){
   echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3],'</br>';
}

echo "</br></br>";

echo "2. Who is the highest paid employee between 1985 and 1981?</br>";
$sql2 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary,  salaries.from_date, salaries.to_date from employees left join salaries on employees.emp_no=salaries.emp_no where salaries.from_date>=\'1981-01-01\' and salaries.to_date<=\'1985-12-31\' order by salary DESC limit 1';
echo "</br>";
foreach($db->query($sql2) as $row){
   echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5],'</br>';
}
echo "</br></br>";
echo "3. Which department currently has highest paid department manager?</br>";
echo "</br>";
$sql3 = 'select departments.dept_name, dept_manager.dept_no, max(salaries.salary) from departments, dept_manager left join salaries on dept_manager.emp_no=salaries.emp_no where salaries.to_date=\'9999-01-01\' and dept_manager.to_date=\'9999-01-01\' and dept_manager.dept_no=departments.dept_no group by dept_manager.dept_no order by salaries.salary desc limit 1';
foreach($db->query($sql3) as $row){
   echo $row[0].' '.$row[1].' '.$row[2].'</br>';
}
echo "</br></br>";

echo "4. What are the titles of all the departments?</br>";
echo "</br>";
$sql4 = 'select * from departments order by departments.dept_no limit 9';
foreach($db->query($sql4) as $row){
   echo $row[0].' '.$row[1].'</br>';
}
echo"</br></br>";

echo "5. Who are the current department heads?</br>";
echo "</br>";
$sql5 = 'select employees.emp_no, employees.first_name, employees.last_name, departments.dept_no, departments.dept_name, dept_manager.from_date, dept_manager.to_date from employees left join dept_manager on employees.emp_no=dept_manager.emp_no, departments where departments.dept_no=dept_manager.dept_no order by dept_manager.to_date desc limit 9';
foreach($db->query($sql5) as $row){
   echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5].' '.$row[6].'</br>';
}
echo"</br></br>";

echo "6. Who is highest paid employee that is not a department head?</br>";
echo"</br>";
$sql6 = 'select salaries.emp_no, employees.first_name, employees.last_name, salaries.salary from salaries left join employees on salaries.emp_no=employees.emp_no where salaries.emp_no not in (select dept_manager.emp_no from dept_manager) order by salary desc limit 1';
foreach($db->query($sql6) as $row){
   echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].'</br>';
}
echo "</br></br>";

echo "7. Who is currently the lowest paid employee?</br>";
echo "</br>";
$sql7 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary, salaries.from_date, salaries.to_date from employees left join salaries on employees.emp_no=salaries.emp_no order by salaries.to_date desc, salaries.salary ASC limit 1';
foreach($db->query($sql7) as $row){
   echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5].'</br>';
}
echo "</br></br>";

echo "8. How many employees currently work in each department?</br>";
echo"</br>";
$sql8 = 'select dept_emp.dept_no, count(dept_emp.emp_no) as total_emp, departments.dept_name  from dept_emp left join departments on dept_emp.dept_no = departments.dept_no where dept_emp.to_date=\'1999-01-01\' group by dept_emp.dept_no limit 9';
foreach($db->query($sql8) as $row){
   echo $row[0].' '.$row[1].' '.$row[2].'</br>';
}
echo "</br></br>";

echo "9. How much does each department currently spend on salaries?</br>";
echo "</br>";
$sql9 = 'select dept_emp.dept_no, sum(salaries.salary) as total_spent from dept_emp left join salaries on dept_emp.emp_no = salaries.emp_no where dept_emp.to_date=\'1999-01-01\' group by dept_emp.dept_no';
foreach($db->query($sql9) as $row){
   echo $row[0].' '.$row[1].'</br>';
}
echo "</br></br>";

echo "10. How much is currently spent for all salaries?</br>";
echo "</br>";
$sql10 = 'select sum(salaries.salary) as total_spent from salaries where salaries.to_date=\'1999-01-01\'';
foreach($db->query($sql10) as $row){
   echo $row[0].'</br>';
}
echo "</br></br>";

echo "<h3>Add or update this employee list</h3>";
$Sql = 'select * from employees limit 5';
foreach($db->query($Sql) as $row){
   echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5];
   echo '<form action="edit.php">';//displays edit button after each result
   echo '<input type="submit" value="Edit">';
   echo '</form>';
}

echo '<form action="insert.php">';//displays insert button
echo '<input type="submit" value="Add a new employee">';
echo '</form>';


?>
</body>
</html>


