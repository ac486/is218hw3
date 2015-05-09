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



?>
