(function() {
    "use strict";
    angular.module('myApp.addRoom', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/room/add', {
            templateUrl: 'room/addRoom.html',
            controller: 'addRoomCtrl'
        });
    }])

        .controller('addRoomCtrl', ['$scope', 'RoomService', '$location', function($scope, RoomService, $location) {
        var that = this;
        this.roomTypeSelect = null;
        this.avabileOptions = [];
        RoomService.showRoomTypes().then(function(resp) {
            that.avabileOptions = resp;
        });
        this.addRoom = function() {
            var that = this;
            var data = {
                number: this.number,
                capacity: this.capacity,
                room_type_id: this.selectedOption
            };
            RoomService.addRoom(data).then(function() {
                that.name = "";
                $location.path('/room');
            });
        };
        }]);
})();
