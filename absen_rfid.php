<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Absensi RFID</title>
  </head>
  <style>
    .navbar {
        padding: 0.5pc 0.5pc 0.5pc 1.5pc;
        border-style: none none solid none;
        border-color:#fdb606;
        border-width:5px;
    } 

    .card{
        border : 0;
        box-shadow: 3px 3px 10px -5px;
    }

    .container{
        margin-top: 70px;
    }
    .top-card{
        margin-top: 15vh;
    }
</style>
  <body>
  <nav class="navbar navbar-dark bg-dark">
        <a href="" class="navbar-brand">
            <h3>PERCETAKAN FARHAN ABADI</h3>
            <small>Aplikasi Absensi Karyawan Berbasis WEB</small>
        </a>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <!-- <div id="telegram"></div> -->
                <div id="ScanKartu"></div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://kit.fontawesome.com/8d6eb64095.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            setInterval(function(){
                $("#ScanKartu").load("get_kartu.php")
            }, 1000)
        });
        $(document).ready(function(){
            setInterval(function(){
                $("#telegram").load("get_telegram.php")
            }, 1000)
        });
        </script>
    </body>
</html>