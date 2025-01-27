@extends("layouts.app3")
@section("content")

<div class="container m-4" >
<marquee behavior="" direction="rtl"> <h3 class="text-secondary text-center ">{{Auth()->user()->station}}, {{Auth()->user()->state}} State</h3> </marquee>

  <div class="info"><h3 class="offset-4 pb-3 text-primary">Showing Activities of <span class="text-secondary">{{$user->name}}</span></h3> </div>
  <table class="table table-bordered  table-responsive p-5 offset-1">
  <thead>
    <tr>
        <th class="col-1 text-primary fs-5" >S/N </th>
        <th  class='col-1 text-primary' scope='col'>Meter-No# </th>
        <th  class='col-1 text-primary' scope='col'>Product </th>
        <th  class='col-1 text-primary' scope='col'>Opening Meter </th>
        <th  class='col-1 text-primary' scope='col'>Closing Meter </th>
        <th  class='col-1 text-primary' scope='col'>Sales </th>
        <th  class='col-1 text-primary' scope='col'>Difference </th>
        <th  class='col-1 text-primary' scope='col'>Date </th>
    </tr>
  </thead>
  <tbody>
      @forelse($userActivities as $index=> $activity)
  <tr>
    <td>{{$userActivities->firstItem() +$index }}</td>
    <td>{{$activity->meterId}}</td>
    <td>{{$activity->type}}</td>
    <td>{{$activity->open}}</td>
    <td>{{$activity->close}}</td>
    <td>{{$activity->sales}}</td>
    <td>{{$activity->diffs}}</td>
    <td>{{$activity->created_at->format('F-d-Y  g:s a') }}</td>
</tr>
@empty
<tr>
    <td colspan='6'>No activity found for {{$user->name}}.</td>
</tr>
@endforelse

</tbody>
</table>
<div class="d-flex justify-content-center fs-6">
{{ $userActivities->links('pagination::default')}}
<!-- {{ $userActivities->links()}} -->

</div>
  </div>
  
  @endsection
