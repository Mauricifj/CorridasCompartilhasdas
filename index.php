<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AngularJS Task Application</title>

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
</head>
<body ng-app="App">

    <!-- Content Section -->
    <div ng-controller="DriverController">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDriver">
                            Adicionar Motorista
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Motoristas:</h3>
                    <table ng-if="drivers.length > 0" class="table table-bordered table-responsive table-striped">
                        <tr>
                            <th>Registro</th>
                            <th>Número</th>
                            <th>Nome</th>
                            <th>Nascimento</th>
                            <th>CPF</th>
                            <th>Carro</th>
                            <th>Status</th>
                            <th>Gênero</th>
                            <th>Opções</th>
                        </tr>
                        <tr ng-repeat="driver in drivers">
                            <td>{{ driver.idDriver }}</td>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ driver.nameDriver }}</td>
                            <td>{{ driver.birthDriver }}</td>
                            <td>{{ driver.cpfDriver }}</td>
                            <td>{{ driver.carDriver }}</td>
                            <td>{{ driver.statusDriver }}</td>
                            <td>{{ driver.genderDriver }}</td>
                            <td>
                                <button ng-click="edit($index, drivers.idDriver)"  class="btn btn-primary btn-xs">Editar</button>
                                <button ng-click="delete($index, drivers.idDriver)" class="btn btn-danger btn-xs">Apagar</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Content Section -->

    <!-- Bootstrap Modals -->
    <!-- Modal - Add New Driver -->
    <div class="modal fade" id="addDriver" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Adicionar motorista</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">


                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                    </ul>

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input ng-model="driver_details.nameDriver" id="nameDriver" type="text" class="form-control" name="nameDriver" maxlength="50" placeholder="Nome" required>
					</div>
					<div class="spacer">
						<hr>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input ng-model="driver_details.birthDriver" id="birthDriver" type="date" class="form-control" name="birthDriver" min="1900-01-01" max="2000-01-01" required>
					</div>
					<div class="spacer">
						<hr>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
						<input ng-model="driver_details.cpfDriver" id="cpfDriver" type="text" class="form-control" name="cpfDriver" placeholder="CPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: xxx.xxx.xxx-xx" required>
					</div>
					<div class="spacer">
						<hr>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
						<input ng-model="driver.carDriver" id="carDriver" type="text" class="form-control" name="carDriver" placeholder="Modelo do carro" required>
					</div>
					<div class="spacer">
						<hr>
					</div>
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-primary active">
							<input ng-model="driver.statusDriver" type="radio" name="statusDriver" id="statusDriver1" autocomplete="off" checked>Status ativo
						</label>
						<label class="btn btn-primary">
							<input ng-model="driver.statusDriver" type="radio" name="statusDriver" id="statusDriver2" autocomplete="off">Status Inativo
						</label>
					</div>
					<div class="spacer">
						<hr>
					</div>
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-warning active">
							<input ng-model="driver.genderDriver" type="radio" name="genderDriver" id="genderDriver1" autocomplete="off" checked>Sexo masculino
						</label>

						<label class="btn btn-warning">
							<input ng-model="driver.genderDriver" type="radio" name="genderDriver" id="genderDriver2" autocomplete="off">Sexo feminino
						</label>
					</div>
					<div class="spacer">
						<br />
					</div>
					<div class="modal-footer">
						<div class="btn-group">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-success" ng-click="addDriver()">Adicionar</button>
						</div>
					</div>
                </div>
			</div>
		</div>
    </div>
    <!-- // Modal -->

    <!-- Modal - Update Driver -->
    <div class="modal fade" id="updateDriver" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Editar motorista</h4>
                </div>
                <div class="modal-body">

                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                    </ul>

                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input ng-model="driver_details.name" id="nameDriver" type="text" class="form-control" name="nameDriver" maxlength="50" placeholder="Nome" required>
                </div>
                <div class="spacer">
                    <hr>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input ng-model="driver_details.birth" id="birthDriver" type="date" class="form-control" name="birthDriver" min="1900-01-01" max="2000-01-01" required>
                </div>
                <div class="spacer">
                    <hr>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                    <input ng-model="driver_details.cpf" id="cpfDriver" type="text" class="form-control" name="cpfDriver" placeholder="CPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: xxx.xxx.xxx-xx" required>
                </div>
                <div class="spacer">
                    <hr>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-dashboard"></i></span>
                    <input ng-model="driver_details.car" id="carDriver" type="text" class="form-control" name="carDriver" placeholder="Modelo do carro" required>
                </div>
                <div class="spacer">
                    <hr>
                </div>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input ng-model="driver_details.status" type="radio" name="statusDriver" id="statusDriver1" autocomplete="off" checked>Status ativo
                    </label>
                    <label class="btn btn-primary">
                        <input ng-model="driver_details.status" type="radio" name="statusDriver" id="statusDriver2" autocomplete="off">Status Inativo
                    </label>
                </div>
                <div class="spacer">
                    <hr>
                </div>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-warning active">
                        <input ng-model="driver_details.gender" type="radio" name="genderDriver" id="genderDriver1" autocomplete="off" checked>Sexo masculino
                    </label>

                    <label class="btn btn-warning">
                        <input ng-model="driver_details.gender" type="radio" name="genderDriver" id="genderDriver2" autocomplete="off">Sexo feminino
                    </label>
                </div>
                <div class="spacer">
                    <br />
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="updateDriver()">Atualizar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal -->





<!-- Jquery JS file -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- AngularJS file -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="lib/app.js"></script>

</body>
</html>
