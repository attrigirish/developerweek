app = angular.module('techknow', ['ngRoute']);

app.config(function ($routeProvider,$locationProvider) {            
    $locationProvider.hashPrefix('');   

    $routeProvider.when('/', {
        templateUrl: 'templates/home.html',
        controller: 'homeController'
    }).when('/category/:cid', {
        templateUrl: 'templates/category.html',
        controller: 'categoryController'
    }).when('/product/:pid', {
        templateUrl: 'templates/description.html',
        controller: 'productController'
    });
});


app.controller('homeController',function($scope,$http){
    
    //Category 
    $http({method:'get',url:'http://gadgetworld.000webhostapp.com/getcategories.php'})
    .then(function(response){
        $scope.categories=response.data;
    },function(error){
        console.log(error);
    });


    //Mobile
    $http({method:'get',url:'http://gadgetworld.000webhostapp.com/getproducts.php?cid=8'})
    .then(function(response){
        $scope.mobiles=response.data;
    },function(error){
        console.log(error);
    });

    //TV
    $http({method:'get',url:'http://gadgetworld.000webhostapp.com/getproducts.php?cid=9'})
    .then(function(response){
        $scope.tvs=response.data;
    },function(error){
        console.log(error);
    });


});


app.controller('categoryController',function($scope,$http,$routeParams){

     //Category 
    $http({method:'get',url:'http://gadgetworld.000webhostapp.com/getcategories.php'})
    .then(function(response){
        $scope.categories=response.data;
    },function(error){
        console.log(error);
    });

    //Products
    $http({method:'get',url:'http://gadgetworld.000webhostapp.com/getproducts.php?cid='+$routeParams.cid})
    .then(function(response){
        $scope.products=response.data;
    },function(error){
        console.log(error);
    });


});


app.controller('productController',function($scope,$http,$routeParams){

    //Product
    $http({method:'get',url:'http://gadgetworld.000webhostapp.com/getproduct.php?pid='+$routeParams.pid})
    .then(function(response){
        $scope.product=response.data;
    },function(error){
        console.log(error);
    });


});