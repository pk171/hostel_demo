'use strict';
services.service('RoomService', ['$http', function($http) {

  this.showRoomTypes = function() {
    return $http.get("/roomType").then(function(response) {
      return response.data;
    });
  };

  this.removeRoomType = function(roomType) {
    return $http.delete("/roomType/" + roomType.id);
  };

  this.addRoomType = function(data) {
    return $http.post("/roomType", data);
  };

  this.addRoom = function(data){
    return $http.post("/room", data);
  };

  this.showRooms = function(roomType) {
    return $http.get("/room/" + roomType);
  };
  this.addRoom = function(data) {
    return $http.post("/room", data);
  };

  this.getRoomType = function(id){
    return $http.get("/roomType/" + id).then(function(resp){
      return resp.data;
    });
  };
}]);
