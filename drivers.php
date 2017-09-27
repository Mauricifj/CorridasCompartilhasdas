<?php
    require_once("jsandcss.php");
?>
    <style>
        .bg-1 {
            background-color: #1abc9c;
            color: #ffffff;
        }
        .bg-3 {
            background-color: #138496;
            color: #fff;
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

<!-- Drivers Container -->
<div class="container-fluid bg-1 text-center">
    <h3 class="margin">MOTORISTAS</h3><br>
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
        <div class="spacer">
            <hr>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input id="birthDriver" type="date" class="form-control" name="birthDriver" min="1900-01-01" max="2000-01-01" required>
        </div>
        <div class="spacer">
            <hr>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
            <input id="cpfDriver" type="text" class="form-control" name="cpfDriver" placeholder="CPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: xxx.xxx.xxx-xx" required>
        </div>
        <div class="spacer">
            <hr>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
            <input id="carDriver" type="text" class="form-control" name="carDriver" placeholder="Modelo do carro" required>
        </div>
        <div class="spacer">
            <hr>
        </div>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary active">
                <input type="radio" name="statusDriver" id="statusDriver1" autocomplete="off" checked>Status ativo
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="statusDriver" id="statusDriver2" autocomplete="off">Status Inativo
            </label>
        </div>
        <div class="spacer">
            <hr>
        </div>
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-warning active">
                <input type="radio" name="genderDriver" id="genderDriver1" autocomplete="off" checked>Sexo masculino
            </label>

            <label class="btn btn-warning">
                <input type="radio" name="genderDriver" id="genderDriver2" autocomplete="off">Sexo feminino
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
    <p>Copyright © 2017 Corridas Compartilhadas Company - Todos os direitos reservados</p>
</footer>

</body>
</html>
