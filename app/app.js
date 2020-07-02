var myApp = angular.module("myApp", []);


myApp.controller("UserController", ["$scope", "$http", function ($scope, $http) {
    $scope.btnName = "Add";
    $scope.insertData = function () {
        if ($scope.btnName == "Update") {
            $http.post(
                "update.php",
                {
                    "id": $scope.id,
                    "first_name": $scope.first_name,
                    "last_name": $scope.last_name
                }
            ).then(function (response) {
                alert(response.data);
                $scope.first_name = "";
                $scope.last_name = "";
                $scope.id = "";
                $scope.btnName = "Add";
                $scope.displayData();

            })
        } else if ($scope.btnName == "Add") {


            $http.post(
                "insert.php",
                { "first_name": $scope.first_name, "last_name": $scope.last_name }
            ).then(function (response) {
                alert(response.data);
                $scope.first_name = "";
                $scope.last_name = "";
                $scope.displayData();
            });
        }
    }
    $scope.displayData = function () {
        $http.get("select.php")
            .then(function (response) {
                $scope.names = response.data;
            });
    }
    $scope.displayData();
    $scope.updateData = function (id, first_name, last_name) {
        $scope.id = id;
        $scope.first_name = first_name;
        $scope.last_name = last_name;
        $scope.btnName = "Update";


    }
    $scope.deleteData = function (id) {
        $http.post(
            "delete.php",
            {
                "id": id
            }
        ).then(function (response) {
            alert(response.data);

            $scope.displayData();

        })
    }


}]);