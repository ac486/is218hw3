<?php

class sql1{
   function __construct(){
      global $db;
      $sql1 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary from employees left join salaries on employees.emp_no=salaries.emp_no order by salary DESC limit 1';
      
      $qry = $db->query($sql1);

      foreach($qry  as $row){
         echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3],'</br>';
      }
   }
} 

class sql2{
   function __construct(){
      global $db;
      $sql2 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary,  salaries.from_date, salaries.to_date from employees left join salaries on employees.emp_no=salaries.emp_no where salaries.from_date>=\'1981-01-01\' and salaries.to_date<=\'1985-12-31\' order by salary DESC limit 1';
      $qry = $db->query($sql2);

      foreach($qry  as $row){
         echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5],'</br>';
      }
   }
}

class sql3{
   function __construct(){
      global $db;
      $sql3 = 'select departments.dept_name, dept_manager.dept_no, max(salaries.salary) from departments, dept_manager left join salaries on dept_manager.emp_no=salaries.emp_no where salaries.to_date=\'9999-01-01\' and dept_manager.to_date=\'9999-01-01\' and dept_manager.dept_no=departments.dept_no group by dept_manager.dept_no order by salaries.salary desc limit 1';
      
      $qry = $db->query($sql3);

      foreach($qry  as $row){
         echo $row[0].' '.$row[1].' '.$row[2].'</br>';
      }
   }
}

class sql4{
   function __construct(){
      global $db;
      $sql4 = 'select * from departments order by departments.dept_no limit 9';

      $qry = $db->query($sql4);

      foreach($qry  as $row){
         echo $row[0].' '.$row[1].'</br>';
      }
   }
}

class sql5{
   function __construct(){
      global $db;
      $sql5 = 'select employees.emp_no, employees.first_name, employees.last_name, departments.dept_no, departments.dept_name, dept_manager.from_date, dept_manager.to_date from employees left join dept_manager on employees.emp_no=dept_manager.emp_no, departments where departments.dept_no=dept_manager.dept_no order by dept_manager.to_date desc limit 9';

      $qry = $db->query($sql5);

      foreach($qry  as $row){
         echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5].' '.$row[6].'</br>';

      }
   }
}

class sql6{
   function __construct(){
      global $db;
      $sql6 = 'select salaries.emp_no, employees.first_name, employees.last_name, salaries.salary from salaries left join employees on salaries.emp_no=employees.emp_no where salaries.emp_no not in (select dept_manager.emp_no from dept_manager) order by salary desc limit 1';

      $qry = $db->query($sql6);

      foreach($qry  as $row){
         echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3],'</br>';
      }
   }
}

class sql7{
   function __construct(){
      global $db;
      $sql7 = 'select employees.emp_no, employees.first_name, employees.last_name, salaries.salary, salaries.from_date, salaries.to_date from employees left join salaries on employees.emp_no=salaries.emp_no order by salaries.to_date desc, salaries.salary ASC limit 1';

      $qry = $db->query($sql7);

      foreach($qry  as $row){
         echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5].'</br>';

      }
   }
}

class sql8{
   function __construct(){
      global $db;
      $sql8 = 'select dept_emp.dept_no, count(dept_emp.emp_no) as total_emp, departments.dept_name  from dept_emp left join departments on dept_emp.dept_no = departments.dept_no where dept_emp.to_date=\'1999-01-01\' group by dept_emp.dept_no limit 9';

      $qry = $db->query($sql8);

      foreach($qry  as $row){
         echo $row[0].' '.$row[1].' '.$row[2].'</br>';
      }
   }
}

class sql9{
   function __construct(){
      global $db;
      $sql9 = 'select dept_emp.dept_no, sum(salaries.salary) as total_spent from dept_emp left join salaries on dept_emp.emp_no = salaries.emp_no where dept_emp.to_date=\'1999-01-01\' group by dept_emp.dept_no';

      $qry = $db->query($sql9);

      foreach($qry  as $row){
         echo $row[0].' '.$row[1].'</br>';
      }
   }
}

class sql10{
   function __construct(){
      global $db;
      $sql10 = 'select sum(salaries.salary) as total_spent from salaries where salaries.to_date=\'1999-01-01\'';

      $qry = $db->query($sql10);

      foreach($qry  as $row){
         echo $row[0].'</br>';
      }
   }
}
?>
