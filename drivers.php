<!DOCTYPE html>
<html>
<head>
    <title>Corridas Compartilhadas Company &trade;</title>
    <meta charset="utf-8">
    <!-- Bootstrap, jQuery, Angular etc -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
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

        .img-responsive {
            display: inline;
        }

        .margin {
            margin-bottom: 45px;
        }

        .bg-1 {
            background-color: #f4511e;
            color: #ffffff;
        }

        .bg-2 {
            background-color: #474e5d;
            color: #ffffff;
        }

        .bg-3 {
            background-color: #138496;
            color: #fff;
        }

        .bg-4 {
            background-color: #2f2f2f;
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
            <a class="navbar-brand" href="logout.php">SAIR</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="drivers.php">P&Aacute;GINA INICIAL</a></li>
                <li><a href="drivers.php">MOTORISTAS</a></li>
                <li><a href="rides.php">CORRIDAS</a></li>
                <li><a href="passengers.php">PASSAGEIROS</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Drivers Container -->
<div class="container-fluid bg-1 text-center">
    <h3 class="margin">MOTORISTAS</h3><br>
    <div class="row">
        <a href="#search">
            <div class="col-sm-4">
                <img src="images/magGlass.png" class="img-responsive margin" style="width:50%;" alt="Motoristas">
            </div>
        </a>
        <a href="#add">
            <div class="col-sm-4">

            </div>
        </a>
        <a href="#add">
            <div class="col-sm-4">
                <img src="images/plus.png" class="img-responsive margin" style="width:50%;" alt="Passageiros">
            </div>
        </a>
    </div>
</div>

<!-- Search Container -->
<div id="search" class="container-fluid bg-2 text-center">
    <h3 class="margin">CONSULTAR MOTORISTAS</h3>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input id="consultDriver" type="text" class="form-control" name="consultDriver" placeholder="Consultar">
    </div>
</div>

<!-- Add Container -->

<div id="add" class="container-fluid bg-3 text-center">
    <form name="addDriver">
        <h3 class="margin">CADASTRAR MOTORISTAS</h3>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="nameDriver" type="text" class="form-control" name="nameDriver" maxlength="50" placeholder="Nome" required>
        </div>
        <br />
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input id="birthDriver" type="date" class="form-control" name="birthDriver" min="1900-01-01" max="2000-01-01" required>
        </div>
        <br />
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
            <input id="cpfDriver" type="text" class="form-control" name="cpfDriver" placeholder="CPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: xxx.xxx.xxx-xx" required>
        </div>
        <br />
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
            <input id="carDriver" type="text" class="form-control" name="carDriver" placeholder="Modelo do carro" required>
        </div>
        <br />
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary active">
                <input type="radio" name="statusDriver" id="statusDriver1" autocomplete="off" checked>Status ativo
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="statusDriver" id="statusDriver2" autocomplete="off" >Status Inativo
            </label>
        </div>
        <br />
        <br />
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-warning active">
                <input type="radio" name="genderDriver" id="genderDriver1" autocomplete="off" checked>Sexo masculino
            </label>

            <label class="btn btn-warning">
                <input type="radio" name="genderDriver" id="genderDriver2" autocomplete="off" >Sexo feminino
            </label>
        </div>
        <br />
        <br />
        <div class="btn">
            <input type="submit" value="Cadastrar" class="btn btn-success">
        </div>
    </form>
</div>


<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
    <p>Copyright © 2017 Corridas Compartilhadas Company - Todos os direitos reservados</p>
</footer>

<script>
    $(document).ready(function () {
        // Add smooth scrolling to all links in navbar + footer link
        $("a, footer a[href='#']").on('click', function (event) {

            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        });

        // Slide in elements on scroll
        $(window).scroll(function () {
            $(".slideanim").each(function () {
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    });
</script>

</body>
</html>
