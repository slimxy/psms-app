@extends("layouts.app4")
@section("content")
<div class="container  my-4 pb-5 " style="heigt:100px;">
    @php
    if($count <= 1){
        $record = "Record";
    }elseif($count > 1){
        $record = "Records";
    }
    @endphp

    <div class="info text-center text-primary "><h3> showing {{$count}} {{$record}}</h3></div>
   <table class="table-striped offset-1 table shadow mb-5 table-responsive">
    <thead class='bg-primary text-light '>
        <tr>

            <th  class='col-sm-1  bg-primary text-light text-nowrap'  scope='col'>S/N</th>
            <th  class='col-1 p-2 bg-primary text-light' scope='col'>Meter-No#</th>
            <th  class='col-1 p-2 bg-primary text-light' scope='col'>Product</th>
            <th  class='col-1 p-2 bg-primary text-light' scope='col'>Opening Meter</th>
            <th  class='col-1 p-2 bg-primary text-light' scope='col'>Closing Meter</th>
            <th  class='col-1 p-2 bg-primary text-light' scope='col'>Sales</th>
            <th  class='col-1 p-2 bg-primary text-light' scope='col'>Date</th>
            <th  class='col-1 p-2 bg-primary text-light' scope='col'> Time </th>



        </tr>
    </thead>
    <tbody>
    @foreach ($staffs as $staff)

        <tr>
            <th scope='row'  class='px-2 col-sm-1 text-nowrap' >{{$staff->id}}</th>
            <td  class='col-1 px-2'>{{$staff->meterId}}</td>
            <td  class='col-1 px-2'>{{$staff->type}}</td>
            <td  class='col-1 px-2'>{{$staff->open}}</td>
            <td  class='col-1 px-2'>{{$staff->close}}</td>
            <td  class='col-1 px-2'>{{$staff->diffs}}</td>
            <td  class='col-1 px-2'>{{$staff->created_at->format('d-m-y')}}</td>
            <td  class='col-1 px-2'>{{$staff->updated_at->format('h:i:s')}}</td>
        </tr>
        @endforeach

    </tbody>
    <!-- {{ $staffs->links()}} -->
    {{ $staffs->links('pagination::default')}}

   </table>
   <div class="m-3">  <marquee behavior="" direction="rtl"> <h3 class="text-secondary text-center "> {{Auth()->user()->station}}, {{Auth()->user()->state}} State.</h3> </marquee>
</div>
</div>
@endsection
