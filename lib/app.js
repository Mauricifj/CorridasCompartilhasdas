var app = angular.module('App', []);


app.controller('DriverController', ['$scope', '$http', function ($scope, $http) {
    $scope.addDriver = {
        "status": 'ativo',
        "gender": 'M'
    };
    // List Drivers
    $scope.drivers = [];

    $scope.listDrivers = function () {
        $http.get('script/listDriver.php', {})
            .then(function success(e) {
                $scope.drivers = e.data.drivers;
            }, function error(e) {

            });
    };
    $scope.listDrivers();

    // Add new Driver
    $scope.addNewDriver = function () {
        $http.post('script/createDriver.php',
        {
            driver: $scope.addDriver
        })
        .then(function success(e) {
            $scope.errors = [];

            $scope.drivers.push(e.driver);
            var modal_element = angular.element('#addNewDriver');
            modal_element.modal('hide');
        },
        function error(e) {
            $scope.errors = e.data.errors;
        });
    };
/*
    // Open modal to edit Driver details
    $scope.editDriver = function (index, idDriver) {
        $scope.driver_details = $scope.drivers[index];
        var modal_element = angular.element('#updateDriver');
        modal_element.modal('show');
    };

    // Update the Driver
    $scope.updateDriver = function () {
        alert($scope.drivers);
        alert($scope.driver_details);
        $http.post('script/updateDriver.php', {
            driver: $scope.driver_details
        })
            .then(function success(e) {e

                $scope.errors = [];

                var modal_element = angular.element('#updateDriver');
                modal_element.modal('hide');

            }, function error(e) {
                $scope.errors = e.data.errors;
            });
    };

    // Delete the Driver
    $scope.deleteDriver = function (index, cpf) {

        var conf = confirm("Realmente gostaria de apagar?");

        if (conf == true) {
            $http.post('script/deleteDriver.php', {
                driver: $scope.drivers[cpf]
            })
                .then(function success(e) {

                    $scope.errors = [];

                    $scope.drivers.splice(index, 1);

                }, function error(e) {
                    $scope.errors = e.data.errors;
                });
        }
    };*/

}]);