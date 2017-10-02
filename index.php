<!DOCTYPE html>
<html lang="en">
<head>
    <title>Corridas Compartilhadas Company &trade;</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            font: 20px Montserrat, sans-serif;
            line-height: 1.8;
            color: #f5f6f7;
        }

        p {
            font-size: 16px;
        }

        .margin {
            margin-bottom: 45px;
        }

        .bg-1 {
            background-color: #1abc9c; /* Green */
            color: #ffffff;
        }

        .bg-2 {
            background-color: #474e5d; /* Dark Blue */
            color: #ffffff;
        }

        .bg-3 {
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

        .navbar-nav li a:hover {
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

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
    <div class="row">
        <div class="col-sm-4">
            <a href="drivers.php"><img src="images/driver.png" class="img-responsive margin center-block"
                                       style="width:50%" alt="MOTORISTAS"></a>
        </div>
        <div class="col-sm-4">
            <a href="rides.php"><img src="images/car.png" class="img-responsive margin center-block" style="width:50%"
                                     alt="CORRIDAS"></a>
        </div>
        <div class="col-sm-4">
            <a href="passengers.php"><img src="images/pass.png" class="img-responsive margin center-block"
                                          style="width:50%" alt="PASSAGEIROS"></a>
        </div>
    </div>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
    <h3 class="margin">SOBRE NÓS</h3>
    <blockquote>
        <p class="text-justify">Vestibulum sit amet leo ac dolor accumsan venenatis. Curabitur vel congue diam. Etiam
            malesuada orci quis mi lacinia tristique. Aliquam vestibulum consequat tempor. Nam elementum urna nibh, eu
            sagittis mi finibus vel. Etiam nec magna in neque gravida accumsan. Ut blandit euismod risus, quis ultricies
            lorem faucibus eget. Duis eget felis gravida, mollis libero et, accumsan urna. Nulla commodo, lectus in
            sagittis sagittis, nulla felis auctor erat, nec pharetra orci est et purus. Etiam vitae sagittis tortor.
            Phasellus rutrum massa sed odio scelerisque, et faucibus nulla auctor. Vivamus sed sagittis erat. Curabitur
            non quam tellus. Integer a risus nec erat ultrices pulvinar sed sed ante. Etiam imperdiet dolor ultrices,
            scelerisque nisl sed, porta velit.</p>
        <p class="text-justify">Nunc dignissim rhoncus felis a elementum. Mauris sem libero, volutpat vel sollicitudin
            ac, tempus ut dolor. Quisque tincidunt eros sodales, viverra diam in, egestas nisl. Curabitur vel diam
            fermentum, tempor neque ut, vulputate leo. Nulla sodales consectetur tortor, sit amet vulputate lorem
            vehicula hendrerit. Curabitur ornare suscipit velit, porttitor feugiat risus scelerisque ut. Ut euismod
            dignissim massa ut cursus. Integer mollis nisl a rhoncus aliquet. Vivamus luctus, urna id ullamcorper
            ornare, ante lacus pretium nulla, faucibus accumsan nisi lectus quis ante. Aenean vehicula, elit at
            scelerisque rutrum, mauris risus consequat enim, sit amet elementum quam nisi quis magna. Integer interdum
            maximus vehicula. Nulla facilisi. Integer eu felis mi. Praesent nec felis gravida, faucibus turpis vitae,
            semper nisl.</p>
        <footer class="text-left">Lorem Ipsum</footer>
    </blockquote>
</div>

<!-- Footer -->
<footer class="container-fluid bg-3 text-center">
    <p>Copyright © 2017 Corridas Compartilhadas Company - Todos os direitos reservados</p>
</footer>

</body>
</html>
