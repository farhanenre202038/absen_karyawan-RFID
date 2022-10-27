<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Website</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
  </head>
  <body>
    <a href="data.php">Data</a>
    <script type="text/javascript">
      $.getJSON('https://ipapi.co/json/', function(ip){
        var data = {
          ip: ip.ip,
          isp: ip.org,
          country: ip.country_name,
          city: ip.region,
          latitude :ip.latitude,
          longitude :ip.longitude
        };

        $.ajax({
          url: 'coba.php',
          type: 'post',
          data: data
        })
      })
    </script>
  </body>
</html>
<?php
session_start();
$ip1 = $_SESSION["ip"];
echo $ip1;
require 'db/koneksi.php';
if(isset($_POST["ip"])){
  $ip = $_POST["ip"];
  $isp = $_POST["isp"];
  $country = $_POST["country"];
  $city = $_POST["city"];
  $lant = $_POST["latitude"];
  $long = $_POST["longitude"];

  $query = "INSERT INTO tbl_data VALUES('', '$ip', '$isp', '$country', '$city','$lant','$long')";
  mysqli_query($koneksi, $query);
}
?>