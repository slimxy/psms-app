@extends("layouts.app3")
@section("content")

<div class="container m-2 px-2   col-md-15" >
@if($submissions->isEmpty() )
<div class="info text-center mx-5 px-5  col-12 "><p class=" col-12 fs-1 mx-5 offset-1">Sorry!!..... No record found.</p></div>
@endif


@foreach($submissions as $submission)

  <div class="info"><h4 class="offset-4  text-primary">Showing record of {{$submission->created_at->format('F j,Y') }}</h4> </div>
  <table class="table table-border-1  table-responsive p-5   offset-3">
  <thead>
  <tr>
    <th>MeterId</th>
    <th>Date</th>
    <th>OpeningMeter</th>
    <th>ClosingMeter</th>
    <th>ReturnToTank</th>
    <th>Dailysales</th>
    <th>Openingstock</th>
    <th>ProductRcvd</th>
    <th>Total@hand</th>
  </tr>
  </thead>
  <tbody>
    <!-- to add the MeterId -->
    @php
    $index = 1;
    @endphp
  @foreach($submission->managers as  $manager)
           
  <tr>
    <td>{{$index }}</td>
    <td>{{$manager->created_at->format('F j,y') }}</td>
    <td>{{$manager->opening}}</td>
    <td>{{$manager->closing}}</td>
    <td>{{$manager->return}}</td>
    <td>{{$manager->sales}}</td>
    <td>{{$manager->stock}}</td>
    <td>{{$manager->product}}</td>
    <td>{{$manager->total}}</td>
  </tr>
  @php
  $index++;
  @endphp

  @endforeach

  </tbody>
  </table>
  <!-- {{ $submissions->links()}} -->
  {{ $submissions->links('pagination::default')}}

  <marquee behavior="" direction="rtl"> <h3 class="text-secondary text-center "> {{Auth()->user()->station}}, {{Auth()->user()->state}} State.</h3> </marquee>

  </div>
  @endforeach
  
  @endsection
