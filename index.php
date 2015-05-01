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


?>
