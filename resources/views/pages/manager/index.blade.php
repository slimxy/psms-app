@extends("layouts.app3")
@section("content")

<div class="container index ">
    <div class="row justify-content-center offset-1">
    <div class="gridContainer  my-5 d-flex gap-3 justify-content-between">
    <div class="gridItem col-4">
            <div class="card ">
            <div class="card-header bg-primary text-light fs-3 text-center">Records</div>
                <div class="card-body py-4">
                @php
                if($count <= 1 ){
                    $record = 'Record' ;
                    }elseif($count > 1){
                    $record = 'Records';

                    }
                    if($totalUser <= 1 ){
                    $staff = 'Staff' ;
                    $user = 'User' ;
                    }elseif($totalUser>1){
                    $staff = 'Staffs' ;
                      $user = 'Users';

            

                    }
                    @endphp
                   <h4 class='text-secondary'>Uploaded <span class="text-primary">{{$count}}</span>   {{$record}}   </h4>

                   <a id='link' href="/manager/show" class='  d-flex justify-content-end  '> <p class='col-7 bg-primary text-light text-center'>View... </p></a>

                </div>
            </div>
        </div>
        <div class="gridItem col-4">
            <div class="card ">
            <div class="card-header bg-primary text-light fs-3 text-center">Activities</div>
                <div class="card-body py-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate nulla sequi possimus, illum magni mollitia.</p>                </div>
            </div>
        </div>
        <div class="gridItem col-4">
            <div class="card ">
            <div class="card-header bg-primary text-light fs-3 text-center">Staffs</div>
                <div class="card-body py-4 ">
                <h4 class='text-secondary'> <span class="text-primary">{{$totalUser}}</span>  {{$staff}} </h4>
                <a id='link' href="/manager/staffs" class='  d-flex justify-content-end  '> <p class='col-7 bg-primary text-light text-center'>View... </p></a>
                             </div>
            </div>
        </div>
    </div>
    <div class="gridContainer my-55 d-flex gap-3 justify-content-between">
        <div class="gridItem col-4">
            <div class="card ">
                <div class="card-header bg-primary text-light fs-3 text-center">Users</div>
                <div class="card-body py-">
                <h4 class='text-secondary'> <span class="text-primary">{{$totalUser}}</span>  number of {{$user}} </h4>
                <a class="nav-link text-primary " href="{{ route('register') }}">{{ __('Register new users...') }}</a>
                <a id='link' href="/manager/users" class='  d-flex justify-content-end  '> <p class='col-7 bg-primary text-light text-center'>View... </p></a>

                </div>
            </div>
        </div>
        <div class="gridItem col-4">
            <div class="card ">
            <div class="card-header bg-primary text-light fs-3 text-center">Records</div>
                <div class="card-body py-4">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate nulla sequi possimus, illum magni mollitia.</p>                </div>
            </div>
        </div>
        <div class="gridItem col-4">
            <div class="card ">
            <div class="card-header bg-primary text-light fs-3 text-center">Profile</div>
                <div class="card-body py-4">
                    <div class="d-flex justify-content-around">
                       <h3 class='text-primary'>User:</h3>
                       <h3 class='text-info'>{{ Auth::user()->name }} ...</h3>
                       <h3 class='text-info'>{} ...</h3>
                    </div>
                <a id='link' href="/manager/profile" class='  d-flex justify-content-end  '> <p class='col-7 bg-primary text-light text-center'>View... </p></a>
            </div>
            </div>
        </div>
        <p class="mssg fs-6 ">{{session('mssg')}}</p>
    </div>
  </div>
<div class="m-3">  <marquee behavior="" direction="rtl"> <h3 class="text-secondary text-center "> {{Auth()->user()->station}}, {{Auth()->user()->state}} State.</h3> </marquee>
</div>
</div>
@endsection
