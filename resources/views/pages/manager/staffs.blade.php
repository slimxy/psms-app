@extends("layouts.app3")
@section("content")

<div class="container m-4" >

  <div class="info "><h3 class=" pb-3 offset-4 w-100 text-center text-primary">Showing record of Users Register by <span class="text-secondary">{{$manager->name}}</span></h3> </div>
  <table class="table table-bordered offset-4  table-responsive p-5 offset-1">
  <thead>
  <tr>
    <th class="text-primary text-center fs-5" >S/N</th>
    <th class="text-primary text-center fs-5" >Name</th>
    <th class="text-primary text-center fs-5" >Email</th>
    <th class="text-primary text-center fs-5" >Role</th>
    <th class="text-primary text-center fs-5" >Uploaded At</th>
    <th class="text-primary text-center fs-5" >Actions</th>
  </tr>
  </thead>
  <tbody>
      @forelse($users as $index=> $user)
  <tr>
    <td>{{$users->firstItem() +$index }}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{ucfirst($user->role)}}</td>
    <td>{{$user->created_at->format('F-d-Y  g:s a') }}</td>
    <td><a href="{{route('manager_user', $user->id)}}" class="btn-primary">View Activities</a></td>
  </tr>
  @empty
  <tr>
    <td colspan='4'>No User registered by {{$manager->name}}.</td>
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
<marquee behavior="" direction="rtl"> <h3 class="text-secondary text-center ">{{Auth()->user()->station}},  {{Auth()->user()->state}} State.</h3> </marquee>

  </div>
  
  @endsection
