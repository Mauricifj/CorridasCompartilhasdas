var app = angular.module('myApp', []);

app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {
    $scope.drivers = [];

    // List Drivers
    $scope.listDrivers = function() {
        $scope.loading = true;
        $http.post('actions.php', {
                action: 'list',
                who: 'driver'
            })
            .then(function success(e) {
                $scope.drivers = e.data.driversRead;
                $scope.loading = false;
            }, function error() {
                alert("Erro ao carregar passageiros!");
            });

    };
    $scope.listDrivers();

    // Add new Driver
    $scope.addNewDriver = function() {
        if ($scope.formAddD.$valid) {
            var modal_element = angular.element('#modalAddNewDriver');
            modal_element.modal('hide');
            $scope.loading = true;
            $http.post('actions.php', {
                action: 'add',
                who: 'driver',
                driver: $scope.addDriver
            }).then(function success() {
                $scope.listDrivers();
                $scope.addDriver = null;
                $scope.formAddD.$setPristine();
                $scope.formAddD.$setUntouched();
                $scope.loading = false;
            }, function error() {
                alert("CPF já cadastrado!");
                $scope.listDrivers();
            });
        } else {
            alert("Verifique o preenchimento!");
        }

    };

    // Open modal to edit Driver details
    $scope.editDriver = function(index) {
        $scope.updateDriver = $scope.drivers[index];
        var modal_element = angular.element('#modalUpdateDriver');
        modal_element.modal('show');

    };

    // Update the Driver after modal closes
    $scope.updateTheDriver = function() {
        if ($scope.formUpdateD.$valid) {
            var modal_element = angular.element('#modalUpdateDriver');
            modal_element.modal('hide');
            $scope.loading = true;
            $http.post('actions.php', {
                    action: 'update',
                    who: 'driver',
                    driver: $scope.updateDriver
                })
                .then(function success() {
                    $scope.listDrivers();
                    $scope.loading = false;
                });
        } else {
            alert("Verifique o preenchimento!");
        }
    };

    // Delete the Driver
    $scope.deleteDriver = function(index) {
        var conf = confirm("Realmente gostaria de apagar?");
        if (conf == true) {
            $scope.loading = true;
            $http.post('actions.php', {
                    action: 'delete',
                    who: 'driver',
                    cpf: $scope.drivers[index].cpfD
                })
                .then(function success() {
                    $scope.loading = false;
                    $scope.drivers.splice(index, 1);
                });
        } else {
            alert("Verifique o preenchimento!");
        }
    };

    $scope.passengers = [];

    // List Passengers passenger
    $scope.listPassengers = function() {
        $scope.loading = true;
        $http.post('actions.php', {
                action: 'list',
                who: 'passenger'
            })
            .then(function success(e) {
                $scope.passengers = e.data.passengersRead;
                $scope.loading = false;
            }, function error() {
                alert("Erro ao carregar passageiros!");
            });

    };
    $scope.listPassengers();

    // Add new Passenger
    $scope.addNewPassenger = function() {
        if ($scope.formAddP.$valid) {
            var modal_element = angular.element('#modalAddNewPassenger');
            modal_element.modal('hide');
            $scope.loading = true;
            $http.post('actions.php', {
                action: 'add',
                who: 'passenger',
                passenger: $scope.addPassenger
            }).then(function success() {
                $scope.addPassenger = null;
                $scope.formAddP.$setPristine();
                $scope.formAddP.$setUntouched();
                $scope.loading = false;
                $scope.listPassengers();
            }, function error() {
                alert("CPF já cadastrado!");
                $scope.listPassengers();
            });
        } else {
            alert("Verifique o preenchimento!");
        }

    };


    // Open modal to edit Passenger details
    $scope.editPassenger = function(index) {
        $scope.updatePassenger = $scope.passengers[index];
        var modal_element = angular.element('#modalUpdatePassenger');
        modal_element.modal('show');
    };
    // Update the Passenger after modal closes

    $scope.updateThePassenger = function() {
        if ($scope.formUpdateP.$valid) {
            var modal_element = angular.element('#modalUpdatePassenger');
            modal_element.modal('hide');
            $scope.loading = true;
            $http.post('actions.php', {
                    action: 'update',
                    who: 'passenger',
                    passenger: $scope.updatePassenger
                })
                .then(function success() {
                    $scope.listPassengers();
                    $scope.loading = false;
                });
        } else {
            alert("Verifique o preenchimento!");
        }
    };

    // Delete the Passenger
    $scope.deletePassenger = function(index) {
        var conf = confirm("Realmente gostaria de apagar?");
        if (conf == true) {
            $scope.loading = true;
            $http.post('actions.php', {
                    action: 'delete',
                    who: 'passenger',
                    cpf: $scope.passengers[index].cpfP
                })
                .then(function success() {
                    $scope.loading = false;
                    $scope.passengers.splice(index, 1);
                });
        } else {
            alert("Verifique o preenchimento!");
        }
    };

    $scope.ride = [];

    // Select driver to ride
    $scope.selectDriver = function(index) {
        $scope.cpfDriver = $scope.drivers[index].cpfD;
        $scope.nameDriver = $scope.drivers[index].nameD;
    };
    
    //Select passenger to ride
    $scope.selectPassenger = function(index) {
        $scope.cpfPassenger = $scope.passengers[index].cpfP;
        $scope.namePassenger = $scope.passengers[index].nameP;
    };
    
    // Deselect driver to ride
    $scope.deselectDriver = function() {
        $scope.cpfDriver = "";
        $scope.nameDriver = null;
    };
    
    //Deselect passenger to ride
    $scope.deselectPassenger = function() {
        $scope.cpfPassenger = "";
        $scope.namePassenger = null;
    };
    
    //Create Ride
    $scope.createRide = function() {
        $scope.loading = true;
        $http.post('actions.php', {
            action: 'add',
            who: 'ride',
            ride: {
                cpfDriver: $scope.cpfDriver,
                nameDriver: $scope.nameDriver,
                cpfPassenger: $scope.cpfPassenger,
                namePassenger: $scope.namePassenger,
                cost: $scope.ride.cost
            }
        }).then(function success() {
            $scope.formCost.$setPristine();
            $scope.formCost.$setUntouched()
            $scope.ride.cost = "";
            $scope.cpfDriver = "";
            $scope.cpfPassenger = "";
            $scope.loading = false;
            $scope.listRides();
        }, function error() {
            alert("Erro na criação da corrida!");
            $scope.listRides();
        });
    };

    //List Ride
    $scope.listRides = function() {
        $scope.loading = true;
        $http.post('actions.php', {
                action: 'list',
                who: 'ride'
            })
            .then(function success(e) {
                $scope.rides = e.data.ridesRead;
                $scope.loading = false;
            }, function error() {
                alert("Erro ao carregar corridas!");
            });

    };
    $scope.listRides();

    // Delete the Ride
    $scope.deleteRide = function(index) {
        var conf = confirm("Realmente gostaria de apagar?");
        if (conf == true) {
            $scope.loading = true;
            $http.post('actions.php', {
                    action: 'delete',
                    who: 'ride',
                    id: $scope.rides[index].id
                })
                .then(function success() {
                    $scope.loading = false;
                    $scope.rides.splice(index, 1);
                    $scope.listRides();
                });
        } else {
            alert("Verifique o preenchimento!");
        }
    };
}]);
