'use strict';

// Declare app level module which depends on views, and components
angular.module('myApp', [
    'ngRoute',
    'myApp.guest',
    'myApp.addGuest',
    'myApp.editGuest',
    'myApp.reservation',
    'myApp.room',
    'myApp.addRoomType',
    'myApp.addRoom',
    'myApp.roomList',
    'myApp.version',
    'angularUtils.directives.dirPagination',
    'myApp.services'
]).
config(['$routeProvider', function($routeProvider) {
    $routeProvider.otherwise({
        redirectTo: '/view1'
    });
}]);
