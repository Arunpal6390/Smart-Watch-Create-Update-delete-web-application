<?php
// <?php
$host="localhost";
$dbname="heand_watch";
$user="postgres";
//$port="5432";
$password="2543";

$conn = pg_connect("host=$host dbname=$dbname user=$user  password=$password") or
die("Server issue ");

if(!$conn)
{
   echo"some issue";
}



