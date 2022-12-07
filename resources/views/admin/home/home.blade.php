@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->isAdmin())
            <div class="table-responsive" tabindex="1">
                <table class="table table-borderless">
                        <tr class="align-middle">
                            <th class="align-middle text-center" scope="row">
                                <a class="btn btn-info" href="{{ route('users.index') }}">لیست کاربران</a>
                            </th>
                            <th class="align-middle text-center" scope="row">
                                <a class="btn btn-info" href="{{ route('users.index') }}">درخواست پرداختی ها</a>
                            </th>
                            <th class="align-middle text-center" scope="row">
                                <a class="btn btn-info" href="{{ route('users.index') }}">پرداخت شده ها</a>
                            </th>
                        </tr>
                </table>
            </div>
        @endif
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <form action="#" method="post">
                                @csrf
                                @method('PUT')
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
                                    <select name="account[]" id="account" class="form-control">
                                        {{-- @foreach($accounts as $account_id => $account_name)
                                            <option value="{{$account_id}}">
                                                {{$role_name}}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <div class="col-12 ">
                                    <div class="form-group d-inline-block mt-5">
                                        <button class="btn btn-outline-primary" type="submit">ثبت درخواست</button>
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
