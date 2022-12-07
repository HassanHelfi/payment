@if(Session::has('success'))
    <div class="alert alert-success">
        <div>{{session('success')}}</div>
    </div>
@endif