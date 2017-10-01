<!doctype html>
<html>
<head>
    <title>Corridas Compartilhadas Company &trade;</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .bg-1
        {
            background-color: #1abc9c;
            color: #ffffff;
        }
        .bg-3
        {
            background-color: #138496;
            color: #fff;
            text-align: center;
        }
        thead
        {
            background-color: #2222FF;;
        }
        tbody
        {
            background-color: #80bdff;
            color: black;
            border-collapse: collapse;
        }
        td, th
        {
            border: 2px inset blue;
            vertical-align: middle;
            text-align: center;
        }
    </style>
</head>
<body ng-app="myApp" ng-controller="driverCtrl">
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
<!-- // Add driver button -->
<!-- Search Container -->
<div id="search" class="container-fluid bg-2 text-center">
    <h3 class="margin">CONSULTAR MOTORISTAS</h3>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        <input type="text" class="form-control" ng-model="searchDriver" placeholder="Consultar">
    </div>
    <h3 ng-if="searchDriver.length > 0" class="margin">RESULTADO:</h3>
    <table ng-if="searchDriver.length > 0" class="table table-striped table-responsive ">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>CPF</th>
            <th>Carro</th>
            <th>Status</th>
            <th>Gênero</th>
            <th>Opções</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="driver in drivers | filter:searchDriver">
            <td>{{ driver.nameD }}</td>
            <td>{{ driver.birthD.substring(8,10) + "/" + driver.birthD.substring(5,7) + "/" + driver.birthD.substring(0,4) }}</td>
            <td>{{ driver.cpfD.substring(0,3) + "." + driver.cpfD.substring(3,6) + "." + driver.cpfD.substring(6,9) + "-" + driver.cpfD.substring(9,11) }}</td>
            <td>{{ driver.carD }}</td>
            <td class="{{driver.statusD === '1' ? 'text-success' : 'text-danger'}}">{{ driver.statusD === "1" ? "Ativo" : "Inativo" }}</td>
            <td>{{ driver.genderD === "m" ? "Masculino" : "Feminino" }}</td>
            <td>
                <button ng-click="editDriver($index)" class="btn btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-edit"></span></button>
                <button ng-click="deleteDriver($index)" class="btn btn-danger btn-xs" title="Apagar"><span class="fa fa-trash-o"></span></button>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="container-fluid bg-3">
    <!-- Content Section -->
    <div class="container">
        <!-- Add driver button -->
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddNewDriver">
                        <span class="fa fa-user-plus"></span> Adicionar Motorista
                    </button>
                </div>
            </div>
        </div>
        <!-- // Add driver button -->

        <!-- Drivers table -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="margin">MOTORISTAS:</h3>
                <table ng-if="drivers.length > 0 && !loading" class="table table-striped table-responsive ">
                    <thead>
                    <tr>
                        <th>Número</th>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>CPF</th>
                        <th>Carro</th>
                        <th>Status</th>
                        <th>Gênero</th>
                        <th>Opções</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="driver in drivers">
                        <th>{{ $index + 1 }}</th>
                        <td>{{ driver.nameD }}</td>
                        <td>{{ driver.birthD.substring(8,10) + "/" + driver.birthD.substring(5,7) + "/" + driver.birthD.substring(0,4) }}</td>
                        <td>{{ driver.cpfD.substring(0,3) + "." + driver.cpfD.substring(3,6) + "." + driver.cpfD.substring(6,9) + "-" + driver.cpfD.substring(9,11) }}</td>
                        <td>{{ driver.carD }}</td>
                        <td class="{{driver.statusD === '1' ? 'text-success' : 'text-danger'}}">{{ driver.statusD === "1" ? "Ativo" : "Inativo" }}</td>
                        <td>{{ driver.genderD === "m" ? "Masculino" : "Feminino" }}</td>
                        <td>
                            <button ng-click="editDriver($index)" class="btn btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-edit"></span></button>
                            <button ng-click="deleteDriver($index)" class="btn btn-danger btn-xs" title="Apagar"><span class="fa fa-trash-o"></span></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div ng-if="loading" class="jumbotron text-center"><span  class="text-danger"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> LOADING...</span></div>
            </div>
        </div>
        <!-- // Drivers table -->
    </div>
    <!-- /Content Section -->


    <!-- Bootstrap Modals -->

    <!-- Modal - Add New Driver -->
    <div class="modal fade text-center" id="modalAddNewDriver" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="h4 modal-title"><kbd>ADICIONAR MOTORISTA:</kbd></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ng-form name="formAddD" ng-model="formAddD">
                    <div class="input-group {{ formAddD.addDName.$error.required && formAddD.addDName.$touched === true ? 'has-error has-feedback' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="addDName" ng-model="addDriver.name" type="text" class="form-control danger" placeholder="Nome" ng-minlength="0" ng-maxlength="50" required>
                        <span ng-show="formAddD.addDName.$error.required && formAddD.addDName.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                    </div>
                    <div class="spacer">
                        <hr>
                    </div>
                    <div class="input-group   {{ formAddD.addDBirth.$error.required && formAddD.addDBirth.$touched === true ? 'has-error has-feedback' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input name="addDBirth" ng-model="addDriver.birth" type="date" class="form-control" min="1900-01-01" max="2000-01-01" required>
                        <span ng-show="formAddD.addDName.$error.required && formAddD.addDName.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                    </div>
                    <div class="spacer">
                        <hr>
                    </div>
                    <div class="input-group {{ formAddD.addDCpf.$error.required && formAddD.addDCpf.$touched === true ? 'has-error has-feedback' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                        <input name="addDCpf" ng-model="addDriver.cpf" type="text" class="form-control" placeholder="CPF (Somento os números ou X)" title="Formato: Somente números, sem pontos ou traço!" pattern="[0-9]{10}[0-9xX]{1}$" required maxlength="11">
                        <span ng-show="formAddD.addDCpf.$error.required && formAddD.addDCpf.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                    </div>
                    <div class="spacer">
                        <hr>
                    </div>
                    <div class="input-group {{ formAddD.addDCar.$error.required && formAddD.addDCar.$touched === true ? 'has-error has-feedback' : '' }}">
                        <span class="input-group-addon"><i class="fa fa-car"></i></span>
                        <input name="addDCar" ng-model="addDriver.car" type="text" class="form-control" placeholder="Modelo do carro" required>
                        <span ng-show="formAddD.addDCar.$error.required && formAddD.addDCar.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                    </div>
                    <div class="spacer">
                        <hr>
                    </div>
                    <div class="input-group {{ formAddD.addDStatus.$error.required === true ? 'has-error has-feedback' : '' }}">
                        <span class="input-group-addon"><input name="addDStatus" type="radio" ng-model="addDriver.status" value="1" required></span>
                        <span class="form-control"><i class="fa fa-briefcase"> Status Ativo</i></span>
                        <span class="input-group-addon"><input name="addDStatus" type="radio" ng-model="addDriver.status" value="0" required></span>
                        <span class="form-control"><i class="fa fa-bed"> Status Inativo</i></span>
                        <span ng-show="formAddD.addDStatus.$error.required" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                    </div>
                    <div class="spacer">
                        <hr>
                    </div>
                    <div class="input-group {{ formAddD.addDGender.$error.required === true ? 'has-error has-feedback' : '' }}">
                        <span class="input-group-addon"><input name="addDGender" id="gender1" type="radio" ng-model="addDriver.gender" value="m" required></span>
                        <span class="form-control"><i class="fa fa-mars"> Sexo Masculino</i></span>
                        <span class="input-group-addon"><input name="addDGender" id="gender2" type="radio" ng-model="addDriver.gender" value="f" required></span>
                        <span class="form-control"><i class="fa fa-venus"> Sexo Feminino</i></span>
                        <span ng-show="formAddD.addDGender.$error.required" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
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
                            <button type="button" class="btn btn-success" ng-click="addNewDriver()"><span class="fa fa-floppy-o"></span> Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal -->

    <!-- Modal - Update Driver -->
    <div class="modal fade text-center" id="updateDriver" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span class="h4 modal-title"><kbd>EDITAR MOTORISTA:</kbd></span>
                </div>
                <div class="modal-body">
                    <ng-form name="formUpdateD" ng-model="formUpdateD">
                            <div class="input-group {{ formUpdateD.updateDName.$error.required && formUpdateD.updateDName.$touched === true ? 'has-error has-feedback' : '' }}">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="updateDName" ng-model="updateDriver.nameD" type="text" class="form-control danger" placeholder="Nome" ng-minlength="0" ng-maxlength="50" required>
                                <span ng-show="formUpdateD.updateDName.$error.required && formUpdateD.updateDName.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                            </div>
                        <div class="spacer">
                            <hr>
                        </div>
                        <div class="input-group   {{ formUpdateD.updateDBirth.$error.required && formUpdateD.updateDBirth.$touched === true ? 'has-error has-feedback' : '' }}">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            <input name="updateDBirth" ng-model="updateDriver.birthD" type="date" class="form-control" min="1900-01-01" max="2000-01-01" required>
                            <span ng-show="formUpdateD.updateDBirth.$error.required && formUpdateD.updateDBirth.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                        </div>
                        <div class="spacer">
                            <hr>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                            <input ng-model="updateDriver.cpfD" type="text" class="form-control" required readonly>
                        </div>
                        <div class="spacer">
                            <hr>
                        </div>
                        <div class="input-group {{ formUpdateD.updateDCar.$error.required && formUpdateD.updateDCar.$touched === true ? 'has-error has-feedback' : '' }}">
                            <span class="input-group-addon"><i class="fa fa-car"></i></span>
                            <input name="updateDCar" ng-model="updateDriver.carD" type="text" class="form-control" placeholder="Modelo do carro" required>
                            <span ng-show="formUpdateD.updateDCar.$error.required && formUpdateD.updateDCar.$touched" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                        </div>
                        <div class="spacer">
                            <hr>
                        </div>
                        <div class="input-group {{ formAddD.addDStatus.$error.required === true ? 'has-error has-feedback' : '' }}">
                            <span class="input-group-addon"><input name="updateDStatus" type="radio" ng-model="updateDriver.statusD" value="1" required></span>
                            <span class="form-control"><i class="fa fa-briefcase"> Status Ativo</i></span>
                            <span class="input-group-addon"><input name="updateDStatus" type="radio" ng-model="updateDriver.statusD" value="0" required></span>
                            <span class="form-control"><i class="fa fa-bed"> Status Inativo</i></span>
                            <span ng-show="formAddD.addDStatus.$error.required" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
                        </div>
                        <div class="spacer">
                            <hr>
                        </div>
                        <div class="input-group {{ formAddD.addDGender.$error.required === true ? 'has-error has-feedback' : '' }}">
                            <span class="input-group-addon"><input name="updateDGender" id="gender1" type="radio" ng-model="updateDriver.statusD" value="m" required></span>
                            <span class="form-control"><i class="fa fa-mars"> Sexo Masculino</i></span>
                            <span class="input-group-addon"><input name="updateDGender" id="gender2" type="radio" ng-model="updateDriver.statusD" value="f" required></span>
                            <span class="form-control"><i class="fa fa-venus"> Sexo Feminino</i></span>
                            <span ng-show="formAddD.addDGender.$error.required" class="animate-show-hide form-control-feedback"><i class="fa fa-exclamation-triangle text-danger"></i></span>
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
                        <button type="button" class="btn btn-success" ng-click="updateTheDriver()"><i class="fa fa-refresh"></i> Atualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->

<footer class="container-fluid bg-4 text-center">
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
