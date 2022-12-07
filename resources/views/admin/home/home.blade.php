@extends('layouts.app')

@section('content')
@include('layouts.validation_errors', ['errors' => $errors]) 
@include('layouts.session', ['errors' => $errors]) 

<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->isAdmin())
        <div class="table-responsive mb-3" tabindex="1">
            <div class="row">
                <div class="col-md-2">
                </div>
                <a class="col-md-3 btn btn-info ml-5" href="{{ route('users.index') }}">لیست کاربران</a>
                <div class="col-md-2"></div>
                <a class="col-md-3 btn btn-info mt-" href="{{ route('request.index') }}">درخواست ها</a>
                <div class="col-md-2"></div>
            </div>
        </div>
        @endif
        <h2 class="text-center mt-3">ثبت درخواست پرداخت </h2>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form action="{{ route('request.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label> مقدار مبلغ درخواست : </label>
                                    <input class="form-control" type="number" name="price">
                                </div>
                                <div class="form-group">
                                    <label> بارگزاری ضمائم : </label>
                                    <input class="form-control" type="file" name="file" accept="application/pdf,application/vnd.ms-excel">
                                </div>
        
                                <div class="form-group">
                                    <label for="account"> طرف حساب دریافت کننده مبلغ </label>
                                    <select name="account" id="account" class="form-control">
                                        @foreach($accounts as $account_number => $account_name)
                                            <option value="{{$account_number}}">
                                                {{$account_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-group d-inline-block mt-5">
                                        <button class="btn btn-primary" type="submit">ثبت درخواست</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
