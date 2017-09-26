<?php
    require_once("jsandcss.php");
?>
    <style>
        .bg-1 {
            background-color: #007bff;
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

<!-- Services Container -->
<div class="container-fluid bg-1 text-center">
    <h3 class="margin">SERVIÇOS</h3><br>
    <div class="row">
        <a href="drivers.php">
            <div class="col-sm-4">
                <img src="images/driver.png" class="img-responsive margin" alt="Motoristas">
            </div>
        </a>
        <a href="rides.php">
            <div class="col-sm-4">
                <img src="images/car.png" class="img-responsive margin" alt="Corridas">
            </div>
        </a>
        <a href="passengers.php">
            <div class="col-sm-4">
                <img src="images/pass.png" class="img-responsive margin" alt="Passageiros">
            </div>
        </a>
    </div>
</div>

<!-- About Container -->
<div class="container-fluid bg-2 text-center" id="about">
    <h3 class="margin">QUEM SOMOS?</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae nibh non est tincidunt pulvinar a vel nisi. Nam accumsan mauris vel sollicitudin blandit. Phasellus vulputate tempor ex, sit amet sollicitudin risus sollicitudin vitae. Aenean dapibus pellentesque purus, vitae condimentum metus suscipit sed. Nam eu lectus accumsan arcu sagittis fringilla. Sed ut neque blandit, laoreet neque a, accumsan ipsum. Vestibulum risus augue, tempus in ullamcorper vitae, egestas eget ex. Duis nulla est, mollis ut scelerisque nec, lacinia et ante.</p>
    <p>Suspendisse vitae gravida diam. Praesent leo orci, rutrum vel lacus ac, hendrerit posuere ipsum. Vestibulum rutrum augue tincidunt, semper ex sed, accumsan ante. Donec lacus metus, porta quis rhoncus ultricies, vestibulum sed est. Donec eleifend ante odio, sit amet facilisis sapien vehicula sed. In nec iaculis arcu. Ut et ligula nibh. Cras non hendrerit magna. Nunc vel mauris at justo sodales porttitor. Donec vestibulum augue ac ante porta, id maximus enim auctor. Nulla varius urna nulla, et efficitur ex ultrices quis. Suspendisse potenti. Donec vehicula egestas est, vitae commodo sapien. Nam varius diam mauris, et efficitur dui porttitor nec.</p>
</div>



<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
    <p>Copyright © 2017 Corridas Compartilhadas Company - Todos os direitos reservados</p>
</footer>

</body>
</html>
