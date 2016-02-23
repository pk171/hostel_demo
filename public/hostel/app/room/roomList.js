(function() {
  "use strict";
  angular.module('myApp.roomList', ['ngRoute'])

  .config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/roomList/:roomTypeId', {
      templateUrl: 'room/roomList.html',
      controller: 'roomListCtrl'
    });
  }])

  .controller('roomListCtrl', ['RoomService', '$routeParams', function(RoomService, $routeParams) {
    var that = this;
    RoomService.getRoomType($routeParams.roomTypeId).then(function(resp){
      that.roomType = resp;
      RoomService.showRooms(resp.id).then(function(roomList){
        that.rooms = roomList.data;
      });
    });

  }]);
})();
