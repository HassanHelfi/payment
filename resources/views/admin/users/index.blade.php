@extends('layouts.app')

@php $i = (isset($_GET['page'])) ? (($_GET['page'] - 1) * 20) + 1 : 1; @endphp

@section('content')
<h2 class="text-center">لیست کاربران </h2>
<div class="card">
    <div class="card-body">
        <div class="table-responsive" tabindex="1">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="align-middle text-center" scope="col" style="width: 100px;">#</th>
                    <th class="align-middle text-center" scope="col" >نام</th>
                    <th class="align-middle text-center" scope="col" >ایمیل</th>
                    <th class="align-middle text-center" scope="col" > نقش ها</th>
                    <th class="align-middle text-center" scope="col" style="width: 200px;">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="align-middle">
                        <th class="align-middle text-center" scope="row">{{$i++}}</th>
                        <th class="align-middle text-center" scope="row">{{$user->name}}</th>
                        <th class="align-middle text-center" scope="row">{{$user->email}}</th>
                        <th class="align-middle text-center" scope="row">
                            @foreach ($user->roles as $role)
                             {{$role->name}} 
                            @endforeach
                        </th>
                        <th class="align-middle text-center" scope="row">
                            <a class="btn btn-info" href="{{ route('account.create', ['user'=>$user->id]) }}">ایجاد حساب</a>
                            <a class="btn btn-info" href="{{ route('users.edit', ['user'=>$user->id]) }}">ویرایش</a>
                        </th>
                    </tr>
                @endforeach
            </table>
            <div style="margin: 40px !important;"
                 class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
            </div>
        </div>
    </div>
</div>
@endsection
