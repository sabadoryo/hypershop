require('./bootstrap');
require('angular');
require('angularjs-slider/dist/rzslider.min');
require('angular-ui-bootstrap');
require('angular-animate');
require('angular-touch');
require('angularjs-toaster');

var myApp = angular.module('myApp', ['rzSlider', 'ui.bootstrap', 'ngAnimate', 'ngTouch','toaster'])
    .config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%=');
        $interpolateProvider.endSymbol('%>');
    });

myApp.controller('itemsController', function ($scope, toaster,$window,$http) {

    //--------------------------------------------------------TOASTER-------------------------------------------------------------------



    //slider
    $scope.slider = {
        value: 150,
        options: {
            floor: 50,
            ceil: 150,
            translate: function (value) {
                return '$' + value
            },
            onChange: function (sliderId, modelValue) {
                $scope.myFilter = function (item) {
                    return item.price < modelValue;
                }
            }
        },
    };


    //items

    $scope.items = [];
    $scope.init = function () {
        $http.get('/api/v1/getItems').then(successGetItems, errorCallback);

        function successGetItems(response) {
            $scope.items = response.data.items;
            console.log($scope.items);
            $scope.totalQty = response.data.totalQty;
        }

        function errorCallback(error) {
            //error code
        }
    };
    $scope.init();
    $http.get('/api/v1/getCategories').then(successGetCategories, errorGetCategories);

    function successGetCategories(response) {
        $scope.categories = response.data.categories;
    }

    function errorGetCategories(error) {

    }

    $http.get('/api/v1/getBrands').then(successGetBrands, errorGetBrands);

    function successGetBrands(response) {
        $scope.brands = response.data.brands;
    }

    function errorGetBrands(error) {

    }

    $scope.curBrandName = 'All brands';
    $scope.showBrandItems = function (brand) {
        $http.get('/api/v1/get-brand-items/' + $scope.curCategory.id + '/' + brand.id).then(successShowBrandItems, errorShowBrandItems);
        $scope.curBrandName = brand.title
    };

    function successShowBrandItems(response) {
        $scope.items = response.data.items;
    }

    function errorShowBrandItems(error) {

    }


    $scope.addToCart = function (item) {
        $http.get('/api/v1/add-to-card/' + item.id).then(successAddToCard, errorAddToCard);
    };

    function successAddToCard(response) {
        $scope.addToCartSuccess = response.data.success;
        $scope.totalQty = response.data.totalQty;
        toaster.success({title: "Added to cart", body:response.data.itemTitle});
    }

    function errorAddToCard(error) {

    }

    $scope.curCategoryName = "All items";
    $scope.showCategoryItems = function (category) {
        $scope.curBrandName = 'All brands';
        $scope.curCategoryName = category.title;
        $scope.curCategory = category;
        $http.get('/api/v1/get-category-items/' + category.id).then(successShowCategoryItems, errorShowCategoryItems);
    };

    function successShowCategoryItems(response) {
        console.log(response);
        $scope.items = response.data.items;
    }

    function errorShowCategoryItems() {

    }


    $scope.allItems = function () {
        $scope.init();
        $scope.curBrandName = "All brands";
        $scope.curCategoryName = "All items"
    };


    //-----------------------------------------------TYPEAHEAD-----------------------------------------------------------------------------------

    //List of countries to choose from
    var x;

    $scope.optSelected = function (value) {
        if (arguments.length) {
            x = value;
        } else {
            return x;
        }
    };

    $scope.onSelectCountry = function () {
        $scope.myFilter = function (item) {
            if(x !== '') {
                return item.title === x;
            }
            else
                return item;
        };
    };

    $scope.options = {
        debounce: {
            default: 500,
            blur: 250
        },
        getterSetter: true

    };

});
