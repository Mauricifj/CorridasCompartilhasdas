<!doctype html>
<html>

<head>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/apple-touch-icon-57x57.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114x114.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-144x144.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="images/apple-touch-icon-60x60.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/apple-touch-icon-120x120.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="images/apple-touch-icon-76x76.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="images/apple-touch-icon-152x152.png"/>
    <link rel="icon" type="image/png" href="images/favicon-196x196.png" sizes="196x196"/>
    <link rel="icon" type="image/png" href="images/favicon-96x96.png" sizes="96x96"/>
    <link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16"/>
    <link rel="icon" type="image/png" href="images/favicon-128.png" sizes="128x128"/>
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF"/>
    <meta name="msapplication-TileImage" content="images/mstile-144x144.png"/>
    <meta name="msapplication-square70x70logo" content="images/mstile-70x70.png"/>
    <meta name="msapplication-square150x150logo" content="images/mstile-150x150.png"/>
    <meta name="msapplication-wide310x150logo" content="images/mstile-310x150.png"/>
    <meta name="msapplication-square310x310logo" content="images/mstile-310x310.png"/>
    <title>Corridas Compartilhadas Company &trade;</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .bg-2 {
            background-color: #d39e00;
            color: #ffffff;
        }

        thead {
            background-color: #533f03;
            ;
        }

        tbody {
            background-color: #ffe8a1;
            color: black;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px inset yellow;
            vertical-align: middle;
            text-align: center;
        }
    </style>
</head>

<body ng-app="myApp" ng-controller="myCtrl">

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
    <!-- Content Section -->
    <!-- Search Container -->
    <div id="search" class="container-fluid bg-1 text-center">
        <div class="table-scrollable>
    <h3 class=" margin ">CONSULTAR PASSAGEIROS</h3>
    <div class="input-group ">
        <span class="input-group-addon "><i class="glyphicon glyphicon-search "></i></span>
        <input type="text " class="form-control " ng-model="searchPassenger " placeholder="Consultar ">
    </div>
    <h3 ng-if="searchPassenger.length> 0" class="margin">SELECIONE UM PASSAGEIRO:</h3>
            <table ng-if="searchPassenger.length > 0" class="table table-striped table-responsive ">
                <thead>
                    <tr>
                        <th>Selecionar</th>
                        <th>Nome</th>
                        <th>CPF</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="passenger in passengers | filter:cpfPassenger">
                        <td>{{ passenger.nameP }}</td>
                        <td>{{ passenger.cpfP.substring(0,3) + "." + passenger.cpfP.substring(3,6) + "." + passenger.cpfP.substring(6,9) + "-" + passenger.cpfP.substring(9,11) }}
                        </td>
                        <td>
                            <button ng-click="selectPassenger($index)" class="btn btn-success btn-xs" title="Selecionar">
                    <span class="glyphicon glyphicon-plus"></span></button>
                            <button ng-click="deselectPassenger()" class="btn btn-danger btn-xs" title="Selecionar">
                    <span class="glyphicon glyphicon-minus"></span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container-fluid bg-2">
        <div class="container">
            <!-- Passengers table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable>
                <h3 class=" margin ">SELECIONE UM PASSAGEIRO:</h3>
                <table ng-if="passengers.length> 0 && !loading" class="table table-striped table-responsive ">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Selecionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="passenger in passengers | filter: cpfPassenger">
                                <th>{{ $index + 1 }}</th>
                                <td>{{ passenger.nameP }}</td>
                                <td>{{ passenger.cpfP.substring(0,3) + "." + passenger.cpfP.substring(3,6) + "." + passenger.cpfP.substring(6,9) + "-" + passenger.cpfP.substring(9,11) }}
                                </td>
                                <td>
                                    <button ng-click="selectPassenger($index)" class="btn btn-success btn-xs" title="Selecionar">
                                <span class="glyphicon glyphicon-plus"></span></button>
                                    <button ng-click="deselectPassenger()" class="btn btn-danger btn-xs" title="Selecionar">
                                <span class="glyphicon glyphicon-minus"></span></button>
                                </td>

                            </tr>
                        </tbody>
                        </table>
                        <div ng-if="loading" class="jumbotron text-center vcenter"><span class="text-danger"><i
                                class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> LOADING...</span></div>
                    </div>
                </div>
            </div>
            <!-- // passengers table -->
        </div>

    </div>
    <!-- Search Container -->
    <div id="search" class="container-fluid bg-1 text-center">
        <div class="table-scrollable>
    <h3 class=" margin ">CONSULTAR MOTORISTAS</h3>
    <div class="input-group ">
        <span class="input-group-addon "><i class="glyphicon glyphicon-search "></i></span>
        <input type="text " class="form-control " ng-model="searchDriver " placeholder="Consultar ">
    </div>
    <h3 ng-if="searchDriver.length> 0" class="margin">SELECIONE UM MOTORISTA:</h3>
            <table ng-if="searchDriver.length > 0" class="table table-striped table-responsive ">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Carro</th>
                        <th>Status</th>
                        <th>Selecionar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="driver in drivers | filter: cpfDriver" ng-if="driver.statusD === '1'>
            <td>{{ driver.nameD }}</td>
            <td>{{ driver.cpfD.substring(0,3) + " . " + driver.cpfD.substring(3,6) + ". " + driver.cpfD.substring(6,9) + "- " + driver.cpfD.substring(9,11) }}</td>
        <td>{{ driver.carD }}</td>
        <td class="{{driver.statusD==='1' ? 'text-success' : 'text-danger'}} ">{{ driver.statusD === "1 " ? "Ativo " :
            "Inativo " }}
        </td>
        <td>
            <button ng-click="selectDriver($index) " class="btn btn-success btn-xs " title="Selecionar ">
                <span class="glyphicon glyphicon-plus "></span></button>
            <button ng-click="deselectDriver() " class="btn btn-danger btn-xs " title="Selecionar ">
                <span class="glyphicon glyphicon-minus "></span></button>
        </td>
        </tr>
        </tbody>
    </table>
</div>
</div>

<div class="container-fluid bg-2 ">
    <!-- Content Section -->
    <div class="container ">
        <!-- Drivers table -->
        <div class="row ">
            <div class="col-md-12 ">
<div class="table-scrollable>
                        <h3 class="margin">SELECIONE UM MOTORISTA:</h3>
                        <table ng-if="drivers.length > 0 && !loading" class="table table-striped table-responsive ">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Carro</th>
                                    <th>Status</th>
                                    <th>Selecionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="driver in drivers | filter: cpfDriver" ng-if="driver.statusD === '1'">
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ driver.nameD }}</td>
                                    <td>{{ driver.cpfD.substring(0,3) + "." + driver.cpfD.substring(3,6) + "." + driver.cpfD.substring(6,9) + "-" + driver.cpfD.substring(9,11) }}
                                    </td>
                                    <td>{{ driver.carD }}</td>
                                    <td class="{{driver.statusD === '1' ? 'text-success' : 'text-danger'}}">{{ driver.statusD === "1" ? "Ativo" : "Inativo" }}
                                    </td>
                                    <td>
                                        <button ng-click="selectDriver($index)" class="btn btn-success btn-xs" title="Selecionar">
                                <span class="glyphicon glyphicon-plus"></span></button>
                                        <button ng-click="deselectDriver()" class="btn btn-danger btn-xs" title="Selecionar">
                                <span class="glyphicon glyphicon-minus"></span></button>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
        </div>
        <div ng-if="loading" class="jumbotron text-center vcenter"><span class="text-danger"><i
                                class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> LOADING...</span></div>
    </div>
    </div>
    <!-- // Drivers table -->
    </div>
    <div class="container-fluid">
        <span class="col-md-4"></span>
        <ng-form class="col-md-4" name="formCost">
            <div class="input-group {{ formCost.cost.$error.required && formCost.cost.$touched || formCost.cost.value == 0 ? 'has-error has-feedback' : '' }}">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <input name="cost" ng-model="ride.cost" type="number" class="form-control" placeholder="Digite o valor da corrida" min="1" required>
                <span ng-show="formCost.cost.$error.required && formAddD.cost.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
            </div>
        </ng-form>
        <span class="col-md-4"> <button ng-click="createRide()" class="btn btn-success" title="Criar corrida" ng-disabled="!(cpfDriver != null && cpfPassenger != null && !(formCost.cost.$error.required) && ride.cost > 0)"><span
                    class="fa fa-check"> Criar corrida</span></button>
        </span>

    </div>
    </div>

    <div class="container-fluid bg-1 text-center">
        <div class="container">
            <!-- Rides table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable>
                <h3 class=" margin ">CORRIDAS:</h3>
                <table ng-if="rides.length> 0 && !loading" class="table table-striped table-responsive ">
                        <thead>
                            <tr>
                                <th>N</th>
                                <th>Registro</th>
                                <th>Motorista</th>
                                <th>CPF do motorista</th>
                                <th>Passageiro</th>
                                <th>CPF do passageiro</th>
                                <th>Valor</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="ride in rides">
                                <th>{{ $index + 1 }}</th>
                                <td>{{ ride.id }}</td>
                                <td>{{ ride.nameDriver }}</td>
                                <td>{{ ride.cpfDriver.substring(0,3) + "." + ride.cpfDriver.substring(3,6) + "." + ride.cpfDriver.substring(6,9) + "-" + ride.cpfDriver.substring(9,11) }}
                                </td>
                                <td>{{ ride.namePassenger }}</td>
                                <td>{{ ride.cpfPassenger.substring(0,3) + "." + ride.cpfPassenger.substring(3,6) + "." + ride.cpfPassenger.substring(6,9) + "-" + ride.cpfPassenger.substring(9,11) }}
                                </td>
                                <td>{{ ride.cost }}</td>
                                <td>
                                    <button ng-click="deleteRide($index)" class="btn btn-danger btn-xs" title="Excluir">
                                <span class="glyphicon glyphicon-minus"></span></button>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        <div ng-if="loading" class="jumbotron text-center vcenter"><span class="text-danger"><i
                                class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> LOADING...</span></div>
                    </div>
                </div>
            </div>
            <!-- // Rides table -->
        </div>
    </div>
    <!-- /Content Section -->

    <!-- Modal Tips -->
    <div class="modal fade" id="tipsToRides" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center"><kbd>Dicas para criar uma corrida:</kbd></h4>
                </div>
                <div class="modal-body">
                    <p>Após carregarem as listas...</p>
                    <p>1º: escolha um passageiro disponível;</p>
                    <p>2º: escolha um motorista disponível;</p>
                    <p>3º: define um valor para a corrida.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal Tips -->

    <footer class="container-fluid bg-3 text-center">
        <p>Copyright © 2017 Corridas Compartilhadas Company - Todos os direitos reservados</p>
    </footer>

    <!-- Jquery JS file -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- AngularJS file -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <!-- Bootstrap JS file -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/6e7b2ed95d.js"></script>

    <!-- Custom JS file -->
    <script type="text/javascript" src="app.js"></script>
    <script>
        $(document).ready(function() {
            alert("Após carregarem as listas...\n1º: escolha um passageiro disponível\n2º: escolha um motorista disponível;\n3º: define um valor para a corrida");
            var modal_element = angular.element('#tipsToRides');
            modal_element.modal('hide');
        });
    </script>
</body>

</html>
