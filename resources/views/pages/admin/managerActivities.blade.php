@extends("layouts.app1")
@section("content")

<div class="container ">
<div class="info"><h3 class="offset-4 pb-3 text-primary">Showing Activities of  <span class="text-secondary">{{$user->name}}</span></h3> </div>
  <table class="table table-bordered  table-responsive p-5 offset-1">
  <thead>
  <tr>
    <th class="text-primary text-center fs-5" >S/N</th>
    <th class="text-primary text-center fs-5" >Name</th>
    <th class="text-primary text-center fs-5" >Email</th>
    <th class="text-primary text-center fs-5" >Password</th>
    <th class="text-primary text-center fs-5" >Role</th>
    <th class="text-primary text-center fs-5" >Created</th>
    <th class="text-primary text-center fs-5" >Activity</th>
  
  </tr>
  </thead>
  <tbody>
      @foreach($user as $index=> $userItem)
  <tr>
    <td>{{$userItems->firstItem() +$index }}</td>
    <td>{{$userItem->name}}</td>
    <td>{{$userItem->email}}</td>
    <td>{{$userItem->password}}</td>
    <td>{{ucfirst($userItem->role)}}</td>
    <td>{{$userItem->created_at->format('F-d-Y  g:s a') }}</td>
    <td>
        <a href="{{route('admin_user', $userItem->id)}}">View Activities</a>
    </td>
  </tr>

  @endforeach

  </tbody>
  </table>

  <div class="info my-5">                <a class="nav-link text-primary " href="{{ route('register') }}"><h4>{{ __('Register new userItem...?') }}</h4></a>
</div>
<div class="d-flex justify-content-center fs-6">
<!-- {{ $user->links()}} -->
{{ $user->links('pagination::default')}}

</div>
</div>
@endsection
