'use strict';

//AngularJS
var App = angular.module('Micai', []);

App.controller('searchController', function($scope, $http){
  $scope.search = function(){
    $http.get('search',{
      params:{
        usuario: $scope.searchUsuario,
        tipo: $scope.searchTipo
      }
    }).success(function($data){
      $scope.users = $data;
    })
  }
});
App.controller('registerController', function($scope, $http){
  $scope.availableVendedor = false;
  $scope.procedimiento = false;

  $scope.showVendedor = function(){
    if($scope.tipo_procedencia == 'ittg')
      $scope.availableVendedor = true;
    else
      $scope.availableVendedor = false;

  };
  $scope.showProcedimiento = function(){
    if($scope.procedimiento)
      $scope.procedimiento = false;
    else
      $scope.procedimiento = true;
  };
});

App.controller('filtrosController', function($scope, $http) {
  
  $scope.userEmail = [];
  $scope.contenidos = [ {'1': 'Sin Taller'},
                        {'2': 'Laravel'}];

  $scope.addDeleteEmail = function ($email){ 
    var index = $scope.userEmail.indexOf($email)
    if( index == -1)
      $scope.userEmail.push($email);
    else
      $scope.userEmail.splice(index, 1);    
  };

  $http.get('searchusuarios',{
    params:{
      campo: "tipo",
      valor: "asistente"
    }
  }).success(function($data){
    $scope.users = $data;
    console.log($scope.contenidos);
  });

  $scope.orderBy = function(order){
    $scope.order = order;
  };
});


//Jquery
var $aviso = $('.aviso');
var $iconclose = $('.close');

$('header').on('click', $iconclose, cerrarAviso);
$('.ver-mas').on('click', verMasInfo);
$('.icon-menu').on('click',menuSwipeable);



$aviso.slideDown();  


function cerrarAviso(e){
  $aviso.slideUp();
};

function verMasInfo(e){  
  var $contenido = $(this).parent().find('.info-item');
  $($contenido).toggleClass('height-auto');
}

function menuSwipeable(){
  $('nav').toggleClass('swipeable');
  $('body').toggleClass('swipeable');
}