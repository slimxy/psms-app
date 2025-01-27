@extends("layouts.app3")
@section('content')

<div class="  d-flex justify-content-center offset-1">
<div class="col-md-10 ">
<marquee behavior="" direction="rtl"> <h3 class="text-secondary text-center ">{{Auth()->user()->state}}: {{Auth()->user()->station}}</h3> </marquee>
<div class="card mb-1 pb-2 shadow-lg">
<form action="{{route('manager_store')}}" method="POST">
    @csrf
<div class="card-header bg-primary text-light  "> <h3 class="text-center"> Daily Sales Record</h3></div>

<div class="card-body">
<table class="table table-hover">

<thead class="table-light">
<tr>
<th scope='col '>Meter#</th>
<th scope='col' class="table-danger text-danger ">Opening meter</th >
<th scope='col'> Closing Meter</th >
<th scope='col'> Opening Stock</th >
<th scope='col'>Product Recieved</th >
<th scope='col'>Total at Hand </th >
<th scope='col'>Daily Sales</th >
<th scope='col'> Physical stock</th >
</thead>
</tr>

<tbody>
    @for($i= 1; $i <= 9; $i++)

<tr>
    <td class="text-align-center">{{$i}}</td>
    <td class="table-danger text-danger">
    <input class="text-danger text-center  col-10 border-0" type="text" id='opening' name='opening[]'></td>
    <td><input  class="col-10 text-center border-0 "type="text" id='closing[]' name='closing[]'></td>
    <td><input  class="col-10 text-center border-0" type="text" id='stock[]' name='stock[]' ></td>
    <td><input  class="col-10 text-center border-0" type="text" id='product[]' name='product[]'></td>
    <td><input  class="col-10 text-center border-0" type="text" id='total[]' name='total[]'></td>
    <td><input  class="col-10 text-center border-0" type="text" id='sales[]' name='sales[]'></td>
    <td><input  class="col-10 text-center border-0" type="text" id='physical[]' name='physical[]'></td>
    
</tr>
@endfor
</tbody>
</table>

<div class=" col-md-8 offset-md-5 ">
    <button type="text" class="btn btn-primary"> submit</button>
</div>
</div>
</form>

</div>
</div>
</div>
@endsection
