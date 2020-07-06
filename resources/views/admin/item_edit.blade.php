@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.includes.result_message')
        @if($item->exists)
            <form method="POST" action="{{route('admin.item.update',$item->id)}}">
                @else
                    <form method="POST" action="{{route('admin.item.store')}}">
                        @endif
                        @csrf
                        @php
                            /** @var \Illuminate\Support\ViewErrorBag $errors */
                        @endphp
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('admin.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('admin.includes.item_edit_add_col')
                            </div>
                        </div>
                    </form>
                    @if($item->exists)
                        <br>
                        <form method="POST" action="">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body ml-auto">
                                            <button type="submit" class="btn btn-link">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
        @endif
    </div>
@endsection
