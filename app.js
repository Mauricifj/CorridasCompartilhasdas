var app = angular.module('myApp', []);

app.controller('driverCtrl', ['$scope', '$http', function ($scope, $http)
{
    $scope.drivers = [];

    // List Drivers
    $scope.listDrivers = function ()
    {
        $scope.loading = true;
        $http.post('actions.php',
            {
                action: 'list',
                who: 'driver'
            })
            .then(function success(e)
            {
                $scope.drivers = e.data.driversRead;
                $scope.loading = false;
            });

    };
    $scope.listDrivers();

    // Add new Driver
    $scope.addNewDriver = function ()
    {
        if($scope.formAddD.$valid)
        {
            var modal_element = angular.element('#modalAddNewDriver');
            modal_element.modal('hide');
            $scope.loading = true;
            $http.post('actions.php',
                {
                    action: 'add',
                    who: 'driver',
                    driver: $scope.addDriver
                })
                .then(function success()
                {
                    $scope.listDrivers();
                    $scope.addDriver = null;
                    $scope.loading = false;
                });
        }
        else
        {
            alert("Verifique o preenchimento!");
            alert($scope.addDriver.erro.status);
            $scope.addDriver.erro.status.show();
        }

    };


    // Open modal to edit Driver details
    $scope.editDriver = function (index)
    {
        $scope.updateDriver = $scope.drivers[index];
        var modal_element = angular.element('#updateDriver');
        modal_element.modal('show');
    };

    // Update the Driver after modal closes
    $scope.updateTheDriver = function ()
    {
        var modal_element = angular.element('#updateDriver');
        modal_element.modal('hide');
        $scope.loading = true;
        $http.post('actions.php', {
            action: 'update',
            who: 'driver',
            driver: $scope.updateDriver
        })
            .then(function success()
            {

                $scope.updateDriver = null;
                $scope.listDrivers();
                $scope.loading = false;
            });
    };

    // Delete the Driver
    $scope.deleteDriver = function (index) {
        var conf = confirm("Realmente gostaria de apagar?");
        if (conf == true)
        {
            $scope.loading = true;
            $http.post('actions.php',
            {
                action: 'delete',
                who: 'driver',
                cpf: $scope.drivers[index].cpfD
            })
            .then(function success()
            {
                $scope.loading = false;
                $scope.drivers.splice(index, 1);
            });
        }
    };

    // Add smooth scrolling to add and search
   /* $("#addSlide, #searchSlide").on('click', function (event) {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        // animate() to add smooth page scroll
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 900, function () { //milliseconds to scroll

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
        });
    });*/
}]);
