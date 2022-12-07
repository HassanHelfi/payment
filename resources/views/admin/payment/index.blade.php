@extends('layouts.app')

@php $i = (isset($_GET['page'])) ? (($_GET['page'] - 1) * 20) + 1 : 1; @endphp
@section('content')
<h2 class="text-center">لیست درخواست ها </h2>
<div class="card">
    <div class="card-body">
        <div class="table-responsive" tabindex="1">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="align-middle text-center" scope="col" style="width: 100px;">#</th>
                    <th class="align-middle text-center" scope="col" >نام</th>
                    <th class="align-middle text-center" scope="col" >شماره حساب</th>
                    <th class="align-middle text-center" scope="col" > مبلغ</th>
                    <th class="align-middle text-center" scope="col" >عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paymentRrequests as $request)
                    <tr class="align-middle">
                        <th class="align-middle text-center" scope="row">{{$i++}}</th>
                        <th class="align-middle text-center" scope="row">{{$request->user->name}}</th>
                        <th class="align-middle text-center" scope="row">{{$request->account->account_number}}</th>
                        <th class="align-middle text-center" scope="row">{{$request->price}}</th>
                        <th class="align-middle text-center" scope="row">
                            @if($request->status == 0)
                                <a href="{{ route('payment.pay', ['request_id'=>$request->id]) }}" class="btn btn-info">پرداخت</a>
                            @else
                                <span class="badge bg-success">پرداخت شده</span>
                            @endif
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
