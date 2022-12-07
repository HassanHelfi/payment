@extends('layouts.app')
@section('content')
<h2 class="text-center">ویرایش کاربر </h2>
@include('layouts.validation_errors', ['errors' => $errors])    
<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form action="{{route('users.update' , $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label> نام : </label>
                            <input class="form-control" type="text" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label> ایمیل : </label>
                            <input class="form-control" type="email" name="email" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="roles">انتخاب نقش</label>
                            <select name="roles[]" id="roles" class="form-control select2-multiple" multiple>
                                @foreach($roles as $role_id => $role_name)
                                    <option
                                        value="{{$role_id}}" 
                                        @php if (in_array($role_id, $user->roles->pluck('id')->toArray())) echo 'selected' @endphp >
                                        {{$role_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 ">
                            <div class="form-group d-inline-block mt-5">
                                <button class="btn btn-outline-primary" type="submit">ویرایش</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection