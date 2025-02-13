@extends("layouts.app3")
@section('content')

<div class="  d-flex justify-content-center offset-1">
<div class="col-md-15 mx-5 pt-3">
<div class="card mb-1 pb-2 shadow-lg">
<form action="{{route('manager_store')}}" method="POST">
    @csrf
<div class="card-header bg-primary text-light  "> <h3 class="text-center"> Daily Sales Record</h3></div>

<div class="card-body">
<table class="table table-hover">

<thead class="table-light">
<tr>
<th scope='col '>Meter#</th>
<th scope='col' class="table-danger text-danger ">OpeningMeter</th >
<th scope='col'> ClosingMeter</th >
<th scope='col'> Return_Tank </th >
<th scope='col'>DailySales</th >
<th scope='col'> OpeningStock</th >
<th scope='col'>ProductRecieved</th >
<th scope='col'>Total@Hand </th >
<th scope='col'> PhysicalStock</th >
</thead>
</tr>

<tbody id='entries'>
    @for($i= 1; $i <= 9; $i++)

<tr class="entry-row">
    <td class="text-align-center">{{$i}}</td>
    <td class="table-danger text-danger">
    <input class="text-danger text-center  col-10 border-0" type="number" id='opening' name='opening[]' onInput='calValues(event)' required></td>
    <td><input    class="col-10 text-center border-0 "type="number" id='closing' name='closing[]' onInput='calValues(event)' required ></td>
    <td><input  class="col-7 text-center border-0 "type="number" id='tank' name='retrn_tank[]' onInput='calValues(event)'></td>
    <td><input  class="col-10 text-center border-0" type="number"  id='Daily_sales'  name='Daily_sales[]' readonly ></td>
    <td><input  class="col-10 text-center border-0" type="number" id='stock' name='open_stock[]'onInput='calValues(event)' required></td>
    <td><input  class="col-10 text-center border-0" type="number" id='product' name='product_Recieved[]' onInput='calValues(event)' ></td>
    <td><input  class="col-10 text-center border-0" type="number" id='hand' name='total@Hand[]' readonly></td>
    <td><input  class="col-10 text-center border-0" type="number" id='physical' name='physical_Stock[]' readonly onInput='calValues(event)'></td>
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

<script>
//         function calValues(){
//             let open_meter = parseFloat(document.getElementById('opening').value) || 0;
//             let close_meter = parseFloat(document.getElementById('closing').value) || 0;
//             let tank = parseFloat(document.getElementById('tank').value) || 0;
//             let openStock = parseFloat(document.getElementById('stock').value) || 0;
//             let productRecieved = parseFloat(document.getElementById('product').value) || 0;

//             if(tank){
//                 let d_sales =  close_meter - open_meter - tank;
//                 document.getElementById('Daily_sales').value = d_sales;

//                 let t_hand = openStock + productRecieved;
//                 document.getElementById('hand').value = t_hand ;

//                 let phyStock = t_hand - d_sales;
//                 document.getElementById('physical').value = phyStock ;
//             }
//             else {
            
//                 let d_sales =  close_meter - open_meter;
//                 document.getElementById('Daily_sales').value = d_sales;

//                 let t_hand = openStock + productRecieved;
//                 document.getElementById('hand').value = t_hand ;

//                 let phyStock = t_hand - d_sales;
//                 document.getElementById('physical').value = phyStock ;
//     }
// };

function  calValues(event){
            let row = event.target.closest('.entry-row') //To get the closest row of the input field
            if(!row) return; //if no row then return.

            let open_meter = parseFloat(row.querySelector('#opening').value) || 0;
            let close_meter = parseFloat(row.querySelector('#closing').value) || 0;
            let tank = parseFloat(row.querySelector('#tank').value) || 0;
            let openStock = parseFloat(row.querySelector('#stock').value) || 0;
            let productRecieved = parseFloat(row.querySelector('#product').value) || 0;

            if(tank){
                let d_sales =  close_meter - open_meter - tank;
                row.querySelector('#Daily_sales').value = d_sales;

                let t_hand = openStock + productRecieved;
                row.querySelector('#hand').value = t_hand ;

                let phyStock = t_hand - d_sales;
                row.querySelector('#physical').value = phyStock ;
            }
            else {
            
                let d_sales =  close_meter - open_meter;
                row.querySelector('#Daily_sales').value = d_sales;

                let t_hand = openStock + productRecieved;
                row.querySelector('#hand').value = t_hand ;

                let phyStock = t_hand - d_sales;
                row.querySelector('#physical').value = phyStock ;
    }
            }
</script>
@endsection
