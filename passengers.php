<?php
    require_once("jsandcss.php");
?>
    <style>
        .bg-1 {
            background-color: #bd4147;
            color: #ffffff;
        }
        .bg-3 {
            background-color: #721c24;
            color: #ffffff;
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

<!-- Passengers Container -->
<div class="container-fluid bg-1 text-center">
    <h3 class="margin">PASSAGEIROS</h3><br>
    <div class="row">
        <a id="searchSlide" href="#search">
            <div class="col-sm-4">
                <img src="images/magGlass.png" class="img-responsive margin" alt="Consultar">
            </div>
        </a>
        <div class="col-sm-4">
        </div>
        <a id="addSlide" href="#add">
            <div class="col-sm-4">
                <img src="images/plus.png" class="img-responsive margin" alt="Cadastrar">
            </div>
        </a>
    </div>
</div>

<!-- Search Container -->
<div id="search" class="container-fluid bg-2 text-center">
    <h3 class="margin">CONSULTAR PASSAGEIROS</h3>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input id="consultDriver" type="text" class="form-control" name="consultDriver" placeholder="Consultar">
    </div>
</div>

<!-- Add Container -->

<div id="add" class="container-fluid bg-3 text-center">
    <form name="addDriver">
        <h3 class="margin">CADASTRAR PASSAGEIROS</h3>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="namePassenger" type="text" class="form-control" name="namePassenger" maxlength="50" placeholder="Nome" required>
        </div>
        <div class="spacer">
            <hr>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input id="birthPassenger" type="date" class="form-control" name="birthPassenger" min="1900-01-01" max="2017-12-12" required>
        </div>
        <div class="spacer">
            <hr>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
            <input id="cpfPassenger" type="text" class="form-control" name="cpfPassenger" placeholder="CPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: xxx.xxx.xxx-xx" required>
        </div>
        <div class="spacer">
            <hr>
        </div>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-warning active">
                <input type="radio" name="genderPassenger" id="genderPassenger1" autocomplete="off" checked>Sexo masculino
            </label>

            <label class="btn btn-warning">
                <input type="radio" name="genderPassenger" id="genderPassenger2" autocomplete="off">Sexo feminino
            </label>
        </div>
        <div class="spacer">
            <hr>
        </div>
        <div class="btn">
            <input type="submit" value="Cadastrar" class="btn btn-success">
        </div>
    </form>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
    <p>Corridas Compartilhadas Inc. &trade;</p>
</footer>

</body>
</html>
