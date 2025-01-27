@extends('layouts.app4')
@section('content')
<div class="container ">
  <div class="row justify-content-center offset-1">
  <div class="gridContainer  offset-5 my-5 d-flex gap-3 justify-content-between">
        <div class="gridItem col-7">
            <div class="card ">
                <div class="card-header bg-primary text-light fs-3 text-center">Entries</div>
                <div class="card-body py-3">
                    <p class="text-info">Make entry..?</p>
                <a id='link' href="/staffs/create" class='  d-flex justify-content-end  '> <p class='col-7 bg-primary text-light text-center'>Create... </p></a>
                </div>
            </div>
        </div>
        <div class="gridItem col-7">
            <div class="card ">
            <div class="card-header bg-primary text-light fs-3 text-center">Profile</div>
                <div class="card-body py-3">
                    <div class="d-flex justify-content-around">
                       <h3 class='text-primary'>User:</h3>
                       <h3 class='text-info'>{{ Auth::user()->name }} ...</h3>
                    </div>
                <a id='link' href="/staffs/profile" class='  d-flex justify-content-end  '> <p class='col-7 bg-primary text-light text-center'>View... </p></a>
            </div>
            </div>
        </div>
        <div class="gridItem col-7">
            <div class="card ">
            <div class="card-header bg-primary text-light fs-3 text-center">Records</div>
                <div class="card-body ">
                @php
                    if($count <= 1){
                        $record = "Record";
                    }elseif($count > 1){
                    $record = "Records";
                    }
                @endphp
                    <p class='text-info'> uploaded {{$count}} {{$record}}</p>
                    <a id='link' href="/staffs/show" class='  d-flex justify-content-end  '> <p class='col-7 bg-primary text-light text-center'>View... </p></a>
                </div>
            </div>
        </div>
      
    <!-- <div class="gridContainer my-5 d-flex gap-3 justify-content-between">
        
        
        <div class="gridItem col-7">
            <div class="card ">
            <div class="card-header bg-primary text-light fs-3 text-center">Activities</div>
                <div class="card-body py-3"> <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima quam totam quo.</p>
                </div>
            </div>
        </div>
    </div> -->
    </div>
  </div>
  <div class="m-3">  <marquee behavior="" direction="rtl"> <h3 class="text-secondary text-center "> {{Auth()->user()->station}}, {{Auth()->user()->state}} State.</h3> </marquee>
</div>
</div>
@endsection
