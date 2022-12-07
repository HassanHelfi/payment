@extends('layouts.app')
@section('content')
<h2 class="text-center">ایجاد حساب</h2>
@include('layouts.validation_errors', ['errors' => $errors])    
<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form action="{{route('account.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label> مبلغ : </label>
                            <input class="form-control" type="number" name="price">
                        </div>
                        <div class="form-group">
                            <label> نوع حساب : </label>
                            <select name="type" id="type" class="form-control">
                                <option value="1"> اصلی</option>
                                <option value="2">عادی</option>
                            </select>
                        </div>
                        <input type="hidden" name="user_id" value="{{app('request')->user}}">
                        <div class="col-12 ">
                            <div class="form-group d-inline-block mt-5">
                                <button class="btn btn-outline-primary" type="submit">ثبت</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection