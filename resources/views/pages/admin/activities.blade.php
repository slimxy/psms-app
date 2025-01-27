@extends("layouts.app1")
@section("content")

<div class="container m-5 px-5  " >
<div class="info"><h3 class="offset-4 pb-3 text-primary">Showing Activities of <span class="text-secondary">{{$manager->name}} </span></h3> </div>

  <table class="table table-border-1  table-responsive p-5 offset-3">
  <thead>
  <tr>
    <th>MeterId</th>
    <th>Date</th>
    <th>opening</th>
    <th>closing</th>
    <th>stock</th>
    <th>product</th>
    <th>sales</th>
    <th>total</th>
  </tr>
  </thead>
  <tbody>
    <!-- to add the MeterId -->
    @php
    $index = 1;
    @endphp
  @forelse($managerActions as  $index => $action)
           
  <tr>
    <td>pump {{$managerActions->firstItem() +$index }}</td>
    <td>{{$action->created_at->format('F j,y') }}</td>
    <td>{{$action->opening}}</td>
    <td>{{$action->closing}}</td>
    <td>{{$action->stock}}</td>
    <td>{{$action->product}}</td>
    <td>{{$action->sales}}</td>
    <td>{{$action->total}}</td>
  </tr>
  @empty
<tr>
    <td colspan='6'>No activity found for {{$manager->name}}.</td>
</tr>

  @endforelse

  </tbody>
  </table>
  {{ $managerActions->links('pagination::default')}}

  </div>
  
  @endsection
