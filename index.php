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



echo '<a href='.'"?sql=1"'.'>'.'1. Who is the highest paid employee?'.'</a>';
echo "</br></br>";
$sql1 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary from employees left join salaries on employees.emp_no=salaries.emp_no order by salary DESC limit 1';
if($_GET["sql"] === ""){//fix the link creation here
foreach($db->query($sql1) as $row){
   echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3];
}
}
print_r($_GET["sql"]);
echo "</br></br>";

echo "2. Who is the highest paid employee between 1985 and 1981?</br>";
$sql2 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary,  salaries.from_date, salaries.to_date from employees left join salaries on employees.emp_no=salaries.emp_no where salaries.from_date>=\'1981-01-01\' and salaries.to_date<=\'1985-12-31\' order by salary DESC limit 1';

echo "3. Which department currently has highest paid department manager?</br>";
$sql3 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary,  salaries.from_date, salaries.to_date from employees left join salaries on employees.emp_no=salaries.emp_no where salaries.from_date>=\'1981-01-01\' and salaries.to_date<=\'1985-12-31\' order by salary DESC limit 1';

echo "4. What are the titles of all the departments?</br>";
$sql4 = 'select * from departments order by departments.dept_no limit 9';

echo "5. Who are the current department heads?</br>";
$sql5 = 'select employees.emp_no, employees.first_name, employees.last_name, departments.dept_no, departments.dept_name, dept_manager.from_date, dept_manager.to_date from employees left join dept_manager on employees.emp_no=dept_manager.emp_no, departments where departments.dept_no=dept_manager.dept_no order by dept_manager.to_date desc limit 9';

echo "6. Who is highest paid employee that is not a department head?</br>";
$sql6 = 'select salaries.emp_no, employees.first_name, employees.last_name, salaries.salary from salaries left join employees on salaries.emp_no=employees.emp_no where salaries.emp_no not in (select dept_manager.emp_no from dept_manager) order by salary desc limit 1';

echo "7. Who is currently the lowest paid employee?</br>";
$sql7 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary, salaries.from_date, salaries.to_date from employees left join salaries on employees.emp_no=salaries.emp_no order by salaries.to_date desc, salaries.salary ASC limit 1';

echo "8. How many employees currently work in each department?</br>";
$sql8 = 'select dept_emp.dept_no, count(dept_emp.emp_no) as total_emp, departments.dept_name  from dept_emp left join departments on dept_emp.dept_no = departments.dept_no where dept_emp.to_date=\'1999-01-01\' group by dept_emp.dept_no limit 9';

echo "9. How much does each department currently spend on salaries?</br>";
$sql9 = 'select dept_emp.dept_no, sum(salaries.salary) as total_spent from dept_emp left join salaries on dept_emp.emp_no = salaries.emp_no where dept_emp.to_date=\'1999-01-01\' group by dept_emp.dept_no';

echo "10. How much is currently spent for all salaries?</br>";
$sql10 = 'select sum(salaries.salary) as total_spent from salaries where salaries.to_date=\'1999-01-01\'';

?>
</body>
</html>


