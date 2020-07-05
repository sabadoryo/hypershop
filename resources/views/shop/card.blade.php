@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!$msg)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5><span class="fa fa-shopping-cart"></span> Shopping Cart</h5>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3 align-items-end">
                                    <a type="button" href="{{route('home')}}" class="btn btn-primary btn-sm btn-block">
                                        <span class="fa fa-share-alt"></span> Continue shopping
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="post"></form>
                    @foreach($items as $item)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"><img class="img-responsive" src="{{$item['item']['image_url']}}">
                                </div>
                                <div class="col-md-4">
                                    <h4 class="product-name"><strong>{{$item['item']['title']}}</strong></h4>
                                    <h4><small>{{$item['item']['description']}}</small></h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 text-right">
                                            <h6><strong>{{$item['item']['price']}}$ <span
                                                        class="text-muted">x</span></strong></h6>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control input-sm" value="{{$item['qty']}}" ng-disabled="true">
                                        </div>
                                        <div class="col-md-2">
                                            <a type="button" class="btn btn-link btn-sm" href="{{route('item.reduceByOne',['id'=>$item['item']['id']])}}">
                                                <span class="fa fa-trash"> </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="card-footer">
                        <div class="row justify-content-end">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="text-right">Total: <strong>{{$totalPrice}}$</strong></h4>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{route('checkout')}}" type="button" class="btn btn-success">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @else
            <h3>{{$msg}}</h3>
            @endif
    </div>

@endsection
