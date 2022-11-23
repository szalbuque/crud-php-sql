<?php
    //define('HOST','localhost:3307');
    //define('USER','root');
    //define('PASS','12345');
    //define('BASE','cadastro');

    //$conn = new MySQLi(HOST,USER,PASS,BASE);

$host="172.17.0.2";
$port=3307;
$socket="";
$user="root";
$password="12345";
$dbname="cadastro";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
    