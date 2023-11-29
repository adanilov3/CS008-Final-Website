<!-- connecting!!! -->
<?php
$databaseName = 'ADANILOV_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'adanilov_writer';
$password = 'N1ZhZQ3L781V';

$pdo = new PDO($dsn, $username, $password);
?>
<!-- connection complete i hope -->