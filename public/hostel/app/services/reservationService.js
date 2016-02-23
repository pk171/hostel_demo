'use strict';
services.service('ReservationService', ['$http', function($http) {

    this.getAvability = function(dateHeads) {
       return $http.get("/reservation/" + dateHeads[0].format("YYYY-MM-DD HH:mm:ss") + "/" + dateHeads[dateHeads.length - 1]
                .format("YYYY-MM-DD HH:mm:ss"));
            };
    this.getReservationDetails = function(){
        
    }
}]);
