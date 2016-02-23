'use strict';
var services = angular.module('myApp.services', []);
services.service('GuestService', ['$http', function($http) {
    this.getGuests = function(pageNumber) {
        var data = {
            guest: [],
            totalGuests: 0,
            currentPage: 0
        };
        var resp = $http.get("/guest", {
                params: {
                    page: pageNumber
                }
            })
            .then(function(response) {
                data.guest = response.data.data;
                data.totalGuests = response.data.total;
                data.pageNumber = response.data.current_page;
                return data;
            });

        return resp;
    };

    this.getGuest = function(guestId) {
        return $http.get("/guest/" + guestId);
    };

    this.addGuest = function(data) {
        return $http.post("/guest", data);
    };

    this.editGuest = function(data) {
        return $http.put("/guest/" + data.id, data);
    };

    this.removeGuest = function(guest) {
        return $http.delete("/guest/" + guest.id);
    };

}]);
