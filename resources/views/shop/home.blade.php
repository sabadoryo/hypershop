@extends('layouts.app')

@section('content')
    <div>
            <!-- NOTE: remove 'animation-class': 'toast-top-center' if you want it on the left top corner -->
            <toaster-container toaster-options="{'close-button':false, 'time-out':{ 'toast-warning': 2000, 'toast-error': 0 } }"></toaster-container>

    </div>
    <div class="container">
        @if(session('success'))
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                        {{ session()->get('success') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-9"></div>
            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" ng-model="optSelected" ng-model-options="options"
                           uib-typeahead="item.title for item in items | filter:$viewValue | limitTo:5" typeahead-on-select="onSelectCountry()" >
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">Search</button>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4"></div>
        </div>

        <div class="row">
            <div class="card col-md-2">
                <nav class="nav navbar">
                    <div class="nav-tabs ">
                        <button class="btn" ng-click="allItems()"><h3>Categories</h3></button>
                    </div>
                    <ul class="list-group-item-secondary breadcrumb">
                            <li class="nav-item " ng-repeat="category in categories">
                                <button class="btn btn-link" ng-click="showCategoryItems(category)"><%= category.title %></button>
                            </li>
                    </ul>
                </nav>
            </div>
            <div class="card col-md-10">
                <div class="row">
                    <div class="nav-tabs col-md-4"><h4><%=curCategoryName %>,<%=curBrandName %></h4></div>
                    <div class="dropdown col-md-4">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <%= curBrandName %>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" ng-repeat="brand in brands" ng-click="showBrandItems(brand)"><%= brand.title %></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <rzslider
                            rz-slider-model="slider.value"
                            rz-slider-options="slider.options"></rzslider>
                    </div>

                </div>
                <div class="row" style="margin-top:20px;" ng-if="items.length>0">
                    <div class="card col-md-4" style="width: 18rem;" ng-repeat="item in items | filter: myFilter">
                        <img ng-src="<%= item.image_url %>" class="card-img-top" height="250" alt="<%=item.title%>">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="col-md-8"
                                    style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;"><%=item.title %>
                                </h4>
                                <h5 class="card-subtitle col-md-4"><%= item.price %>$</h5>
                            </div>
                            <p class="card-text"><%=item.description%></p>
                            <button class="btn btn-primary" ng-click="addToCart(item)">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
