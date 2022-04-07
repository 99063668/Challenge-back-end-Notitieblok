<?php
function openDatabase(){
  $host = "localhost";
  $username = "root";
  $password = "mysql";
  $database = "notities";

  // $host = "bnrnjl4vfunlw6rzlb8q-mysql.services.clever-cloud.com";
  // $database = "bnrnjl4vfunlw6rzlb8q";
  // $username = "ueyaw8tc2soo8mhh";
  // $password = "eQzxlIgt0Om3elFTENb5";

  try {
    $connect = new PDO("mysql:host=$host;dbname=$database", $username, $password);
  //   $connect = new PDO(
  //   	"mysql:host=" . getenv("MYSQL_ADDON_HOST") . ";dbname=" . getenv("MYSQL_ADDON_DB"),
  //   	getenv("MYSQL_ADDON_USER"),
  //   	getenv("MYSQL_ADDON_PASSWORD")
  // );
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connect;
  } catch (PDOException $error) {
    die("kan geen verbiding maken met de db");
  }
}
?>
