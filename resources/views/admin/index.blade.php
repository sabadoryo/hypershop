@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card" style="width: 15rem; height: 10rem;">
            <div class="card-body">
                <h5 class="card-title">Total amount of items:</h5>
                <h6 class="card-subtitle mb-2 text-muted">until now</h6>
                <h2 class="card-text">{{$totalAmountOfItems}}</h2>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @include('admin.includes.result_message')
                    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                        <li class="nav nav-item">
                            <a class="btn btn-primary" href="{{route('admin.item.create')}}">Add product</a>
                        </li>
                        <li class="nav nav-item">
                            <a class="btn btn-primary" href="{{route('admin.category.create')}}">Add category</a>
                        </li>
                        <li class="nav nav-item">
                            <a class="btn btn-primary" href="{{route('admin.brand.create')}}">Add brand</a>
                        </li>
                    </nav>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($paginator as $item)
                                    <tr @if(!$item->in_stock) style="background-color: #ccc;" @endif>
                                        <td>{{$item->id}}</td>
                                        <td><img src="{{$item->image_url}}"></td>
                                        <td>{{$item->category->title}}</td>
                                        <td>{{$item->brand->title}}</td>
                                        <td><a href="{{route('admin.item.edit',$item->id)}}">{{$item->title}}</a></td>
                                        <td>{{$item->description}}</td>
                                        <td>{{$item->price}}$</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @if($paginator->total()>$paginator->count())
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{$paginator->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="card" style="width: 15rem; height: 10rem;">
            <div class="card-body">
                <h5 class="card-title">Totally received orders:</h5>
                <h6 class="card-subtitle mb-2 text-muted">until now</h6>
                <h2 class="card-text">{{$totalAmountOfOrders}}</h2>
            </div>
        </div>
    </div>
@endsection

