@extends("layouts.app1")
@section("content")

@php

if($totalManager <= 1 ){
                    $station = 'Station' ;
                    $manager = 'Manager' ;
                    }elseif($totalManager>1){
                        $station = 'Stations';
                        $manager = 'Managers';

                    }
                    @endphp
<div class="container ">
    <div class="row  offset-1 justify-content-center ">
            <div class="gridContainer  offset-2 my-5 d-flex gap-3 justify-content-between">
                <div class="gridItem col-6">
                    <div class="card ">
                        <div class="card-header bg-primary text-light fs-3 text-center">Stations</div>
                        <div class="card-body py-3">
                            <h4 class='text-secondary'> <span class="text-primary">{{$totalManager}}</span>  {{$station}} </h4>
                            <a id='link' href="{{route('station')}}" class='  d-flex justify-content-end  '> <p class='col-6 bg-primary text-light text-center'>Show... </p></a>
                        </div>
                    </div>
                </div>
                <div class="gridItem col-6">
                    <div class="card ">
                        <div class="card-header bg-primary text-light fs-3 text-center">Managers</div>
                        <div class="card-body py-3">
                            <h4 class='text-secondary'> <span class="text-primary">{{$totalManager}}</span>  {{$manager}} </h4>
                            <a id='link' href="/register" class='  d-flex justify-content-end  '> <p class='col-6 bg-primary text-light text-center'>Register... </p></a>
                        </div>
                    </div>
                </div>
                <div class="gridItem col-6">
                    <div class="card ">
                        <div class="card-header bg-primary text-light fs-3 text-center">Activities</div>
                        <div class="card-body ">
                            <p>Lorem ipsum dolor,in consequatur error!</p>
                            <a id='link' href="/admin/managers" class='  d-flex justify-content-end  '> <p class='col-6 bg-primary text-light text-center'>View... </p></a>
                        </div>
                    </div>
                </div>

        </div>
                
    </div>
    <div class="row  offset-1 justify-content-center ">
            <div class="gridContainer  offset-2  d-flex gap-3 justify-content-between">
                <div class="gridItem col-6">
                    <div class="card ">
                        <div class="card-header bg-primary text-light fs-3 text-center">Records</div>
                        <div class="card-body py-3">
                            <p>Lorem ipsum lit. Explicabo?</p>
                            <a id='link' href="/register" class='  d-flex justify-content-end  '> <p class='col-6 bg-primary text-light text-center'>Register... </p></a>
                        </div>
                    </div>
                </div>
                <div class="gridItem col-6">
                    <div class="card ">
                        <div class="card-header bg-primary text-light fs-3 text-center">Profile</div>
                        <div class="card-body py-3">
                            <div class="d-flex justify-content-around">
                                <h3 class='text-primary'>User:</h3>
                                <h3 class='text-info'>{{ Auth::user()->name }} ...</h3>
                            </div>
                                <a id='link' href="/admin/profile" class='  d-flex justify-content-end  '> <p class='col-6 bg-primary text-light text-center'>View... </p></a>
                        </div>
                    </div>
                </div>
                <div class="gridItem col-6">
                    <div class="card ">
                        <div class="card-header bg-primary text-light fs-3 text-center">Activities</div>
                        <div class="card-body ">
                        <p>Lorem ipsum dolor,in consequatur error!</p>
                            <a id='link' href="/admin/managers" class='  d-flex justify-content-end  '> <p class='col-6 bg-primary text-light text-center'>View... </p></a>
                        </div>
                    </div>
                </div>

        </div>
                
    </div>
</div>
@endsection
