<?php
    session_start();
    error_reporting(0);
    if ($_SESSION['status'] == "online") {
        header("location:beranda.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- /*Chrome*/ -->
    <meta name='theme-color' content='#343a40' />
    <!-- /*Windows Phone*/ -->
    <meta name="msapplication-navbutton-color" content='#343a40' />
    <!-- /*Safari iOS*/ -->
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta name="apple-mobile-web-app-status-bar-style" content='#343a40' />
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Absensi Karyawan | Mobile</title>
  </head>
    <style>
        body{
           background-color: #0000004f;
        }
        .card{
           border : 0;
           box-shadow: 3px 3px 10px -5px;
           border-radius: 20px;
           margin-top: 10vh;
        }
        .form-control{
            border: 0;
            border-style: none none solid none;
            border-style: none none solid none;
            border-color: darkgray;
            border-width:1px;
        }
        input.form-control:focus {
            box-shadow: inset 0 -1px 0 #ddd;
        }
        h1{
            margin-top: 10vh;
        }
    </style>
  <body>
    <div class="container">
        <div class="col-md-12">
            <center>
                <h1>Login Karyawan</h1>
                <p>Informasi Absensi Karyawan</p>
            </center>
            <div class="card">
                <div class="card-body">
                    <form action="proses/cek_login.php" method="POST">
                        <div class="form-group">
                            <label for=""><i class="fa-solid fa-envelope"></i> E-mail :</label>
                            <input type="email" name="email" placeholder="E-mail Anda" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for=""><i class="fa-solid fa-lock"></i> Password :</label>
                            <input type="password" name="password" class="form-control" placeholder="Kata Sandi Anda" required>
                        </div>
                        <center>
                            <small>
                            <a href="">Lupa Password?</a>
                        </small>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-dark bg-white navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom">
    <button name="login_karyawan" type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
    </form>
</nav>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://kit.fontawesome.com/8d6eb64095.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>