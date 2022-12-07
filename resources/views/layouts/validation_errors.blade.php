@if($errors->any())

    <div class="alert alert-danger" style="text-align: right;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif