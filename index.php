<html>
<head>
<title>IS218 Homework 3</title>
</head>
<body>
<h2>IS218 Homework 3</h2>
<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include 'pages.php';

$db = new PDO('mysql:host=localhost;dbname=employees;charset=utf8',
   'root',
   'wildfoot',
   array(
      PDO::ATTR_EMULATE_PREPARES => false,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
   )
);



if(isset($_GET['page'])){
  $qry = new $_GET['page'];
} else{
echo '<a href="?page=sql1">1. Who is the highest paid employee?</a>';
echo "</br></br>";
echo '<a href="?page=sql2">2. Who is the highest paid employee between 1985 and 1981?</a>';
echo "</br></br>";
echo '<a href="?page=sql3">3. Which department currently has highest paid department manager?</a>';
echo "</br></br>";
echo '<a href="?page=sql4">4. What are the titles of all the departments?</a>';
echo "</br></br>";
echo '<a href="?page=sql5">5. Who are the current department heads?</a>';
echo "</br></br>";
echo '<a href="?page=sql6">6. Who is highest paid employee that is not a department head?</a>';
echo "</br></br>";
echo '<a href="?page=sql7">7. Who is currently the lowest paid employee?</a>';
echo "</br></br>";
echo '<a href="?page=sql8">8. How many employees currently work in each department?</a>';
echo "</br></br>";
echo '<a href="?page=sql9">9. How much does each department currently spend on salaries?</a>';
echo "</br></br>";
echo '<a href="?page=sql10">10. How much is currently spent for all salaries?</a>';
echo "</br></br>";
}


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

//use something with the $_GET array to communicate with pdo statements

?>
</body>
</html>


