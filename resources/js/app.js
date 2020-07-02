require('./bootstrap');
require('angular');
require('angularjs-slider/dist/rzslider.min');

var myApp = angular.module('myApp',['rzSlider'])
    .config(function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%=');
        $interpolateProvider.endSymbol('%>');
    });

myApp.controller('itemsController',function ($scope, $http) {

    $scope.priceSlider = 150;
    $scope.items = [];
    $scope.init = function() {
        $http.get('/getItems').then(successGetItems, errorCallback);

        function successGetItems(response) {
            $scope.items = response.data.items;
            $scope.totalQty = response.data.totalQty;
        }

        function errorCallback(error) {
            //error code
        }
    };
    $scope.init();
    $http.get('/getCategories').then(successGetCategories, errorGetCategories);

    function successGetCategories(response){
        $scope.categories = response.data.categories;
    }

    function errorGetCategories(error){

    }

    $http.get('/getBrands').then(successGetBrands, errorGetBrands);

    function successGetBrands(response){
        $scope.brands = response.data.brands;
    }

    function errorGetBrands(error){

    }

    $scope.curBrandName = 'All brands';
    $scope.showBrandItems = function(brand){
        $http.get('/get-brand-items/' + $scope.curCategory.id +'/'+ brand.id).then(successShowBrandItems,errorShowBrandItems);
        $scope.curBrandName = brand.title
    };

    function successShowBrandItems(response){
        $scope.items = response.data.items;
    }

    function errorShowBrandItems(error){

    }


    $scope.addToCart = function (item) {
       $http.get('/add-to-card/'+item.id).then(successAddToCard,errorAddToCard);
    };

    function successAddToCard(response){
        $scope.addToCartSuccess = response.data.success;
        $scope.totalQty = response.data.totalQty;
    }
    function errorAddToCard(error){

    }

    $scope.curCategoryName = "All items";
    $scope.showCategoryItems = function (category) {
        $scope.curBrandName = 'All brands';
        $scope.curCategoryName = category.title;
        $scope.curCategory = category;
        $http.get('/get-category-items/'+category.id).then(successShowCategoryItems,errorShowCategoryItems);
    };

    function successShowCategoryItems(response) {
        console.log(response);
        $scope.items = response.data.items;
    }

    function errorShowCategoryItems(){

    }


    $scope.allItems  = function () {
        $scope.init();
        $scope.curBrandName = "All brands";
        $scope.curCategoryName = "All items"
    }

});
