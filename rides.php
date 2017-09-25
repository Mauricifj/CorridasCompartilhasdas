<!DOCTYPE html>
<html>
<head>
    <title>Corridas Compartilhadas Inc. &trade;</title>
    <meta charset="utf-8">
    <!-- Bootstrap, jQuery, Angular etc -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        var MongoClient = require('mongodb');
        var url = "mongodb://adminCorridasCompartilhadas:senhadb0@ds149844.mlab.com:49844/heroku_qw0r27m5";

        MongoClient.connect(url, function(err, db) {
        if (err) throw err;
        console.log("Database created!");
        db.close();
        });
    </script>
    <style>
        body {
            font: 20px Montserrat, sans-serif;
            line-height: 1.8;
            color: #f5f6f7;
        }
        p {font-size: 16px;}
        .img-responsive {display: inline;}
        .margin {margin-bottom: 45px;}
        .bg-1 {
            background-color: #1abc9c; /* Green */
            color: #ffffff;
        }
        .bg-2 {
            background-color: #474e5d; /* Dark Blue */
            color: #ffffff;
        }
        .bg-3 {
            background-color: #ffffff; /* White */
            color: #555555;
        }
        .bg-4 {
            background-color: #2f2f2f; /* Black Gray */
            color: #fff;
        }
        .container-fluid {
            padding-top: 70px;
            padding-bottom: 70px;
        }
        .navbar {
            padding-top: 15px;
            padding-bottom: 15px;
            border: 0;
            border-radius: 0;
            margin-bottom: 0;
            font-size: 12px;
            letter-spacing: 5px;
        }
        .navbar-nav  li a:hover {
            color: #1abc9c !important;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">P&Aacute;GINA INICIAL</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="drivers.php">MOTORISTAS</a></li>
                <li><a href="rides.php">CORRIDAS</a></li>
                <li><a href="passengers.php">PASSAGEIROS</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Services Container -->
<div class="container-fluid bg-1 text-center">
    <h3 class="margin">SERVIÇOS</h3><br>
    <div class="row">
        <a href="drivers.php">
            <div class="col-sm-4">
                <img src="images/driver.png" class="img-responsive margin" style="width:50%;" alt="Motoristas">
            </div>
        </a>
        <a href="rides.php">
            <div class="col-sm-4">
                <img src="images/car.png" class="img-responsive margin" style="width:50%;" alt="Corridas">
            </div>
        </a>
        <a href="passengers.php">
            <div class="col-sm-4">
                <img src="images/pass.png" class="img-responsive margin" style="width:50%;" alt="Passageiros">
            </div>
        </a>
    </div>
</div>

<!-- About Container -->
<div class="container-fluid bg-2 text-center" id="about">

</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
    <p>Corridas Compartilhadas Inc. &trade;</p>
</footer>

</body>
</html>
