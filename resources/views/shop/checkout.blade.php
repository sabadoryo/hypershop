@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
        </div>
        @if($errors->any())
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                        <ul>
                            @foreach($errors->all() as $errorTxt)
                                <li>{{$errorTxt}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach($items as $item)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{$item['item']['title']}}</h6>
                            <small class="text-muted">Amount:{{$item['qty']}} </small>
                        </div>
                        <span class="text-muted">{{$item['item']['price']}}$</span>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>${{$total}}</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" method="post" action="{{route('checkout')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Skip if email address same as current user)</span></label>
                        <input type="email" class="form-control" name="email" placeholder="you@example.com">
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Aksay-5,19 home,25 apt" required>
                    </div>

{{--                    <div class="row">--}}
{{--                        <div class="col-md-5 mb-1">--}}
{{--                            <label for="country">Country</label>--}}
{{--                            <select class="custom-select d-block w-100" id="country" required>--}}
{{--                                <option value="">Choose...</option>--}}
{{--                                <option>United States</option>--}}
{{--                            </select>--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                Please select a valid country.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 mb-3">--}}
{{--                            <label for="state">State</label>--}}
{{--                            <select class="custom-select d-block w-100" id="state" required>--}}
{{--                                <option value="">Choose...</option>--}}
{{--                                <option>California</option>--}}
{{--                            </select>--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                Please provide a valid state.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3 mb-3">--}}
{{--                            <label for="zip">Zip</label>--}}
{{--                            <input type="text" class="form-control" id="zip" placeholder="" required>--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                Zip code required.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <h4 class="mb-3">Payment</h4>--}}
{{--                    <div class="d-block my-3">--}}
{{--                        <div class="custom-control custom-radio">--}}
{{--                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>--}}
{{--                            <label class="custom-control-label" for="credit">Credit card</label>--}}
{{--                        </div>--}}
{{--                        <div class="custom-control custom-radio">--}}
{{--                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>--}}
{{--                            <label class="custom-control-label" for="debit">Cash</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6 mb-3">--}}
{{--                            <label for="cc-name">Name on card</label>--}}
{{--                            <input type="text" class="form-control" id="cc-name" placeholder="" required>--}}
{{--                            <small class="text-muted">Full name as displayed on card</small>--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                Name on card is required--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 mb-3">--}}
{{--                            <label for="cc-number">Credit card number</label>--}}
{{--                            <input type="text" class="form-control" id="cc-number" placeholder="" required>--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                Credit card number is required--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-3 mb-3">--}}
{{--                            <label for="cc-expiration">Expiration</label>--}}
{{--                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                Expiration date required--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3 mb-3">--}}
{{--                            <label for="cc-expiration">CVV</label>--}}
{{--                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                Security code required--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <hr class="mb-4">--}}
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Buy now</button>
                </form>
            </div>
        </div>
@endsection
