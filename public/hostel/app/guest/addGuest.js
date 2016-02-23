(function() {
    "use strict";
    angular.module('myApp.addGuest', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/guest/add', {
            templateUrl: 'guest/addGuest.html',
            controller: 'addGuestCtrl'
        });
    }])

    .controller('addGuestCtrl', ['GuestService', '$location', function(GuestService, $location) {
        this.addGuest = function() {
            var that = this;
            var data = {
                firstName: this.firstName,
                lastName: this.lastName
            };
            GuestService.addGuest(data).then(function() {
                $location.path('/guest');
            });
        };
    }]);
})();
