@extends("layouts.app3")
@section("content")

<div class="container m-4" >

  <div class="info"><h3 class="offset-4 pb-3 text-primary">Showing record of Users Register by <span class="text-secondary">{{$manager->name}}</span></h3> </div>
  <table class="table table-bordered  table-responsive p-5 offset-1">
  <thead>
  <tr>
    <th class="text-primary text-center fs-5" >S/N</th>
    <th class="text-primary text-center fs-5" >Name</th>
    <th class="text-primary text-center fs-5" >Email</th>
    <th class="text-primary text-center fs-5" >Password</th>
    <th class="text-primary text-center fs-5" >Role</th>
    <th class="text-primary text-center fs-5" >Registered_on</th>
    <th class="text-primary text-center fs-5" >Registered_by</th>
  
  </tr>
  </thead>
  <tbody>
      @forelse($users as $index=> $user)
  <tr>
    <td>{{$users->firstItem() +$index }}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->password}}</td>
    <td>{{ucfirst($user->role)}}</td>
    <td>{{$user->created_at->format('F-d-Y  g:s a') }}</td>
    <td>{{$manager->email}}</td>
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

  <div class="info my-5">                <a class="nav-link text-primary " href="{{ route('register') }}"><h4>{{ __('Register new users...?') }}</h4></a>
</div>
<div class="d-flex justify-content-center fs-6">
<!-- {{ $users->links()}} -->
{{ $users->links('pagination::default')}}

</div>
  </div>
  
  @endsection
