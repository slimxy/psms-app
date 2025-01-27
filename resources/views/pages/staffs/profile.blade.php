@extends("layouts.app4")
@section("content")
<div class="container  ">
    <div class="card offset-7 my-5  shadow col-12">
        <div class="card-header bg-primary fs-1 p-2 text-center text-light"> Profile</div>
        <div class="card-body text-left px-5">
            <h2> <span class='text-primary'>User: </span>{{ Auth::user()->uname }} </h2>
            <h2> <span class='text-primary'>Name: </span> {{ Auth::user()->name }}</h2>
            <h2> <span class='text-primary'>Role: </span> {{ Auth::user()->role }}</h2>
            <h2> <span class='text-primary'>Mail: </span>{{ Auth::user()->email }}</h2>
            <h2> <span class='text-primary'>State: </span>{{ Auth::user()->state }}</h2>
            <h2> <span class='text-primary'>Station: </span>{{ Auth::user()->station }}, <br/> {{ Auth::user()->state }} State.</h2>
        </div>
    </div>
</div>
@endsection
