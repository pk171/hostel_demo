(function() {
  "use strict";
  var guestMod = angular.module('myApp.guest', ['ngRoute'])

  .config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/guest', {
      templateUrl: 'guest/guest.html',
      controller: 'GuestCtrl'
    });
  }])

  .controller('GuestCtrl', ['GuestService', function(GuestService) {
    var that = this;
    this.guests = [];
    this.totalGuests = 0;
    this.showAddGuest = false;
    // this.gestsPerPage = 25;
    this.pagination = {
      current: 1
    };
    this.pageChanged = function(newPage) {
      that.showGuests(newPage);
    };
    this.showGuests = function(pageNumber) {
      GuestService.getGuests(pageNumber).then(function(response) {
        that.guests = response.guest;
        that.totalGuests = response.totalGuests;
        that.pagination.current = response.pageNumber;
      });
    };

    this.removeGuest = function(guest) {
      GuestService.removeGuest(guest).then(function() {
        that.showGuests(that.pagination.current);
      });
    };
        this.showGuests(1);
  }]);
})();
