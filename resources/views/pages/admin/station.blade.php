@extends("layouts.app1")
@section("content")

<div class="container m-4" >

  <div class="info "><h3 class=" pb-3 offset-1 w-100 text-center text-primary">Showing Record of Stations </h3> </div>
  <table class="table table-bordered offset-1  table-responsive ">
  <thead>
  <tr>
    <th class="text-primary text-center fs-5" >S/N</th>
    <th class="text-primary text-center fs-5" >Station</th>
    <th class="text-primary text-center fs-5" >Manager</th>
    <th class="text-primary text-center fs-5" >Email</th>
    <th class="text-primary text-center fs-5" >State</th>
    <th class="text-primary text-center fs-5" >Registered by</th>
    <th class="text-primary text-center fs-5" >Registered On</th>
  </tr>
  </thead>
  <tbody>
      @forelse($users as $index=> $user)
  <tr>
    <td>{{$users->firstItem() +$index }}</td>
    <td><a href="" id="a" class="btn-primary"> {{$user->station}}, {{$user->state}} State.</a></td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->state}}</td>
    <td class="text-center">{{$admin->name}} </td>
    <td class="text-center">{{$user->created_at->format('F-d-Y  g:s a') }} </td>
  </tr>
  @empty
  <tr>
    <td colspan='4'>No User registered by {{$admin->name}}.</td>
  </tr>
  @php
  @endphp

  @endforelse

  </tbody>
  </table>
<div class="d-flex justify-content-center fs-6">
<!-- {{ $users->links()}} -->
{{ $users->links('pagination::default')}}

</div>
  </div>
  
  @endsection
