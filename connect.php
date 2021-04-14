<?php
//create a connection between php and mysqldb
//use a function called myql connect
/*
mysql -u root -p
username -root
password
db name
server - localhost/127.0.0.1

*/
//constant -PI =3,

define('username', 'root');
define('server', 'localhost');
define('password', '');
define('database', 'agri_tech');

$conn = mysqli_connect(server,username,password,database);

if ($conn){
//echo "connection success";

}else{
echo "failed to establish a connection" .mysqli_connect_error();
}




?>