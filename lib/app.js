var app = angular.module('App', []);


app.controller('DriverController', ['$scope', '$http', function ($scope, $http) {

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
    $scope.addDriver = function () {
        $http.post('script/createDriver.php',
        {
            driver: $scope.driver
        })
        .then(function success(e) {
            //$scope.errors = [];

           // $scope.driver.push(e.data.driver);
            var modal_element = angular.element('#addDriver');
            modal_element.modal('hide');

        }, 
        function error(e) {
            //$scope.errors = e.data.errors;
        });
    };

    // open to edit driver details popup
    $scope.edit = function (index, idDriver) {
        $scope.driver_details = $scope.drivers[index];
        alert($scope.drivers[index].nameDriver);
        var modal_element = angular.element('#updateDriver');
        modal_element.modal('show');
    };

    // update the driver
    $scope.updateDriver = function () {
        $http.post('script/updateDriver.php', {
            driver: $scope.driver_details
        })
            .then(function success(e) {

                $scope.errors = [];

                var modal_element = angular.element('#updateDriver');
                modal_element.modal('hide');

            }, function error(e) {
                $scope.errors = e.data.errors;
            });
    };

    // delete the task
    $scope.delete = function (index) {

        var conf = confirm("Realmente gostaria de apagar?");

        if (conf == true) {
            $http.post('script/deleteDriver.php', {
                driver: $scope.drivers[index]
            })
                .then(function success(e) {

                    $scope.errors = [];

                    $scope.drivers.splice(index, 1);

                }, function error(e) {
                    $scope.errors = e.data.errors;
                });
        }
    };

}]);
