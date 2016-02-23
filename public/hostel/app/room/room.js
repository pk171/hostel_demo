(function() {
    "use strict";
    angular.module('myApp.room', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/room', {
            templateUrl: 'room/room.html',
            controller: 'RoomCtrl'
        });
    }])

    .controller('RoomCtrl', ['RoomService', function(RoomService) {

        this.roomTypes = [];
        var that = this;
        this.showRoomTypes = function() {
            RoomService.showRoomTypes()
                .then(function(response) {
                    that.roomTypes = response;
                });
        };

        this.removeRoomType = function(roomType) {
            RoomService.removeRoomType(roomType).then(function() {
                that.roomTypes();
            });
        };

        this.addRoomType = function() {
            var that = this;
            var data = {
                name: this.name
            };
            RoomService.addRoomType(data).then(function() {
                that.name = "";
            });
        };

        this.showRooms = function(roomType) {
            RoomService.showRooms(roomType.id)
                .then(function(response) {
                    that.rooms = response;
                    console.log(response);
                });
            that.selectedRoomType = roomType;
        };

        this.addRoom = function() {
            var data = {
                number: this.roomNumber,
                capacity: this.roomCapacity,
                roomType: this.selectedRoomType.id
            };
            RoomService.addRoom(data).then(function() {
                that.roomNumber = "";
                that.roomCapacity = "";
                that.showRooms(selectedRoomType.id);
            });
        };
        this.showRoomTypes();
        this.selectedRoomType = false;
    }]);
})();
