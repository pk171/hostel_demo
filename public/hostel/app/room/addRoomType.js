(function() {
  "use strict";
  angular.module('myApp.addRoomType', ['ngRoute'])

  .config(['$routeProvider', function($routeProvider) {
    $routeProvider.when('/roomType/add', {
      templateUrl: 'room/addRoomType.html',
      controller: 'addRoomTypeCtrl'
    });
  }])

  .controller('addRoomTypeCtrl', ['RoomService', '$location', function(RoomService, $location) {
    this.addRoomType = function() {
      var that = this;
      var data = {
        name: this.name
      };
      RoomService.addRoomType(data).then(function() {
        that.name = "";
        $location.path('/room');
      });
    };
  }]);
})();
