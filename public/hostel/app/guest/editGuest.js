(function() {
    "use strict";
    angular.module('myApp.editGuest', ['ngRoute']).config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/guest/edit/:guestId', {
            templateUrl: 'guest/editGuest.html',
            controller: 'editGuestCtrl'
        });
    }]).controller('editGuestCtrl', ['GuestService', '$location', '$routeParams', function(GuestService, $location, $routeParams) {
        var that = this;
        GuestService.getGuest($routeParams.guestId).then(function(resp){
            that.guest = resp.data;
        });
        this.editGuest = function() {
            GuestService.editGuest(this.guest).then(function() {
                $location.path('/guest');
            });
        };
    }]);
})();
