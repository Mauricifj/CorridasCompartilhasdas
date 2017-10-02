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
            background-color: #721c24;
            color: #ffffff;
        }

        thead {
            background-color: #bd2130;
            ;
        }

        tbody {
            background-color: #f1b0b7;
            color: black;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px inset red;
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
        <div class="table-scrollable">
            <h3 class="margin">CONSULTAR PASSAGEIROS</h3>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                <input type="text" class="form-control" ng-model="searchPassenger" placeholder="Consultar">
            </div>
            <h3 ng-if="searchPassenger.length > 0" class="margin">RESULTADO:</h3>
            <table ng-if="searchPassenger.length > 0" class="table table-striped table-responsive ">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>CPF</th>
                        <th>Gênero</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="passenger in passengers | filter:searchPassenger">
                        <td>{{ passenger.nameP }}</td>
                        <td>{{ passenger.birthP.substring(8,10) + "/" + passenger.birthP.substring(5,7) + "/" + passenger.birthP.substring(0,4) }}</td>
                        <td>{{ passenger.cpfP.substring(0,3) + "." + passenger.cpfP.substring(3,6) + "." + passenger.cpfP.substring(6,9) + "-" + passenger.cpfP.substring(9,11) }}</td>
                        <td>{{ passenger.genderP === "m" ? "Masculino" : "Feminino" }}</td>
                        <td>
                            <button ng-click="editPassenger($index)" class="btn btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-edit"></span></button>
                            <button ng-click="deletePassenger($index)" class="btn btn-danger btn-xs" title="Apagar"><span class="fa fa-trash-o"></span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container-fluid bg-2">
        <div class="container">
            <!-- Add passenger button -->
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddNewPassenger">
                        <span class="fa fa-user-plus"></span> Adicionar Passageiro
                    </button>
                    </div>
                </div>
            </div>
            <!-- // Add passenger button -->

            <!-- Passengers table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <h3 class="margin">PASSAGEIROS:</h3>
                        <table ng-if="passengers.length > 0 && !loading" class="table table-striped table-responsive ">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Nome</th>
                                    <th>Nascimento</th>
                                    <th>CPF</th>
                                    <th>Gênero</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="passenger in passengers">
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ passenger.nameP }}</td>
                                    <td>{{ passenger.birthP.substring(8,10) + "/" + passenger.birthP.substring(5,7) + "/" + passenger.birthP.substring(0,4) }}</td>
                                    <td>{{ passenger.cpfP.substring(0,3) + "." + passenger.cpfP.substring(3,6) + "." + passenger.cpfP.substring(6,9) + "-" + passenger.cpfP.substring(9,11) }}</td>
                                    <td>{{ passenger.genderP === "m" ? "Masculino" : "Feminino" }}</td>
                                    <td>
                                        <button ng-click="editPassenger($index)" class="btn btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-edit"></span></button>
                                        <button ng-click="deletePassenger($index)" class="btn btn-danger btn-xs" title="Apagar"><span class="fa fa-trash-o"></span></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div ng-if="loading" class="jumbotron text-center vcenter"><span class="text-danger"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> LOADING...</span></div>
                    </div>
                </div>
            </div>
            <!-- // passengers table -->
        </div>
        <!-- /Content Section -->


        <!-- Bootstrap Modals -->

        <!-- Modal - Add New Passenger -->
        <div class="modal fade text-center" id="modalAddNewPassenger" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="h4 modal-title"><kbd>ADICIONAR PASSAGEIRO:</kbd></span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <ng-form name="formAddP" ng-model="formAddP">
                            <div class="input-group {{ formAddP.addPName.$error.required && formAddP.addPName.$touched === true ? 'has-error has-feedback' : '' }}">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="addPName" ng-model="addPassenger.name" type="text" class="form-control danger" placeholder="Nome" ng-minlength="0" ng-maxlength="50" required>
                                <span ng-show="formAddP.addPName.$error.required && formAddP.addPName.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                            </div>
                            <div class="spacer">
                                <hr>
                            </div>
                            <div class="input-group {{ formAddP.addPBirth.$error.required && formAddP.addPBirth.$touched === true ? 'has-error has-feedback' : '' }}">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input name="addPBirth" ng-model="addPassenger.birth" type="date" class="form-control" min="1900-01-01" max="2000-01-01" required>
                                <span ng-show="formAddP.addPBirth.$error.required && formAddP.addPBirth.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                            </div>
                            <div class="spacer">
                                <hr>
                            </div>
                            <div class="input-group {{ formAddP.addPCpf.$error.required && formAddP.addPCpf.$touched === true ? 'has-error has-feedback' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                                <input name="addPCpf" ng-model="addPassenger.cpf" type="text" class="form-control" placeholder="CPF (Somento os números ou X)" title="Formato: Somente números, sem pontos ou traço!" pattern="[0-9]{10}[0-9xX]{1}$" required maxlength="11">
                                <span ng-show="formAddP.addPCpf.$error.required && formAddP.addPCpf.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                            </div>
                            <div class="spacer">
                                <hr>
                            </div>
                            <div class="input-group {{ formAddP.addPGender.$error.required === true ? 'has-error has-feedback' : '' }}">
                                <span class="input-group-addon"><input name="addPGender" id="gender1" type="radio" ng-model="addPassenger.gender" value="m" required></span>
                                <span class="form-control"><i class="fa fa-mars"> Sexo Masculino</i></span>
                                <span class="input-group-addon"><input name="addPGender" id="gender2" type="radio" ng-model="addPassenger.gender" value="f" required></span>
                                <span class="form-control"><i class="fa fa-venus"> Sexo Feminino</i></span>
                                <span ng-show="formAddP.addPGender.$error.required" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                            </div>
                            <div class="spacer">
                                <hr>
                            </div>
                            <div class="spacer">
                                <br />
                            </div>
                        </ng-form>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-ban"></span> Cancelar</button>
                            <button type="button" class="btn btn-success" ng-click="addNewPassenger()"><span class="fa fa-floppy-o"></span> Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Modal -->

        <!-- Modal - Update Passenger -->
        <div class="modal fade text-center" id="modalUpdatePassenger" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                        <span class="h4 modal-title"><kbd>EDITAR PASSAGEIRO:</kbd></span>
                    </div>
                    <div class="modal-body">
                        <ng-form name="formUpdateP" ng-model="formUpdateP">
                            <div class="input-group {{ formUpdateP.updatePName.$error.required && formUpdateP.updatePName.$touched === true ? 'has-error has-feedback' : '' }}">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="updatePName" ng-model="updatePassenger.nameP" type="text" class="form-control danger" placeholder="Nome" ng-minlength="0" ng-maxlength="50" required>
                                <span ng-show="formUpdateP.updatePName.$error.required && formUpdateP.updatePName.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                            </div>
                            <div class="spacer">
                                <hr>
                            </div>
                            <div class="input-group {{ formUpdateP.updatePBirth.$error.required && formUpdateP.updatePBirth.$touched === true ? 'has-error has-feedback' : '' }}">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input name="updatePBirth" ng-model="updatePassenger.birthP" type="date" class="form-control" min="1900-01-01" max="2000-01-01" value="{{ updatePassenger.birthP }}">
                                <span ng-show="formUpdateP.updatePBirth.$error.required && formUpdateP.updatePBirth.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                            </div>
                            <div class="spacer">
                                <hr>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                                <input ng-model="updatePassenger.cpfP" type="text" class="form-control" readonly>
                            </div>
                            <div class="spacer">
                                <hr>
                            </div>
                            <div class="input-group {{ formUpdateP.updatePGender.$error.required === true ? 'has-error has-feedback' : '' }}">
                                <span class="input-group-addon"><input name="updatePGender" type="radio" ng-model="updatePassenger.genderP" value="m" required></span>
                                <span class="form-control"><i class="fa fa-mars"> Sexo Masculino</i></span>
                                <span class="input-group-addon"><input name="updatePGender" type="radio" ng-model="updatePassenger.genderP" value="f" required></span>
                                <span class="form-control"><i class="fa fa-venus"> Sexo Feminino</i></span>
                                <span ng-show="formUpdateP.updatePGender.$error.required" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                            </div>
                            <div class="spacer">
                                <hr>
                            </div>
                            <div class="spacer">
                                <br />
                            </div>
                        </ng-form>
                    </div>

                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cancelar</button>
                            <button type="button" class="btn btn-success" ng-click="updateThePassenger()"><i class="fa fa-refresh"></i> Atualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- // Modal -->

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
</body>

</html>
