'use strict';

angular.module('myApp.reservation', ['ngRoute'])

.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/reservation', {
    templateUrl: 'reservation/reservation.html',
    controller: 'reservationCtrl'
  });
}])

.controller('reservationCtrl', ['ReservationService', function(ReservationService) {
  var that = this;
  this.dateHeads = [];
  this.avabilityArray = [];
  this.reservationInfo; //variable contains reservation details
  for (var i = 0; i < 14; i++) {
    var date = moment().add(i, 'days');
    this.dateHeads.push(date);
  }

  this.nextClicked = function() {
    angular.forEach(this.dateHeads, function(item) {
      item = item.add(11, 'days');
    }, this);
    this.getAvability();
  };

  this.prevClicked = function() {
    angular.forEach(this.dateHeads, function(item) {
      item = item.add(-11, 'days');
    }, this);
    this.getAvability();
  };

  this.getAvability = function(){
    ReservationService.getAvability(this.dateHeads).then(function(response){
      that.avabilityArray = response.data;
    });
  };

  this.roomNumberStyle = function(avability){
    //room number
    if(typeof avability == "string"){
      return true;
    }else{
      return false;
    }
  };

  this.avabilityReservedStyle = function(avability){
    if(typeof avability != "string" && avability){
      return true;
    }
    return false;
  };

  this.avabilityFreeStyle = function(avability){
    if(typeof avability != "string" && !avability){
      return true;
    }
    return false;
  };

  this.reservationDetails = function(reservation){
    console.log(reservation);
    that.reservationInfo = reservation;
  };
  this.getAvability();
  this.cellClass = function(avability){
     if(typeof avability != "string" && avability){
      return avability.resDay;
    }
    return "dayFree";
  };
}]);
