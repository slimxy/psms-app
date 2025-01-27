@extends("layouts.app1")
@section("content")

<div class="container">
<div class="info"><h3 class="offset-2 p-5 text-center text-primary">Showing Record of Managers Register by <span class="text-secondary">Admin</span></h3> </div>
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
      @foreach($managers as $index=> $manager)
  <tr>
    <td>{{$managers->firstItem() +$index }}</td>
    <td>{{$manager->name}}</td>
    <td>{{$manager->email}}</td>
    <td>{{$manager->password}}</td>
    <td>{{ucfirst($manager->role)}}</td>
    <td>{{$manager->created_at->format('F-d-Y  g:s a') }}</td>
    <td>
        <a href="{{route('admin_action',$manager->id)}}" class="btn-primary"> <btn->
          <button class="btn btn-sm   btn-primary"> View Activities</button>
        </btn-> </a>
    </td>
  </tr>

  @endforeach

  </tbody>
  </table>

  <div class="reg mx-5"> <a class="m-5 nav-link text-primary " href="{{ route('register') }}"><h4>{{ __('Register new manager...?') }}</h4></a>
</div>
<div class="d-flex justify-content-center fs-6">
<!-- {{ $managers->links()}} -->
{{ $managers->links('pagination::default')}}

</div>
</div>
@endsection
