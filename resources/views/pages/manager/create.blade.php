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
    @for($i= 1; $i <= 6; $i++)

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
        @if ($i == 3 || $i ==6)
        <tr>
        <td><h5>TANK</h5></td>
        <td><h5>count</h5></td>
        <td><h5>TOTAL:</h5></td>
        <td><h5>Retrn_Tank</h5></td>
        <td><h5>DailySales</h5></td>
        <td><h5>openingStock</h5></td>
        <td><h5>ProductRecieved</h5></td>
        <td><h5>Total@Hand</h5></td>
        <td><h5>PhysicalStock</h5></td>
    </tr>
        <tr>
        <td><h5>*****</h5></td>
        <td><h5>*****</h5></td>
        <td><h5>*****</h5></td>
        <td><h5>*****</h5></td>
        <td><h5>*****</h5></td>
        <td><h5>*****</h5></td>
        <td><h5>*****</h5></td>
        <td><h5>*****</h5></td>
        <td><h5>*****</h5></td>
        </tr>
        @endif
        @php{
if ($i ==3){
   let count == 'ONE';
} elseif($i ==6){
    let count == 'TWO';

}
}@endphp

    
@endfor
</tbody>
</table>

<div class=" col-md-8 offset-md-5 ">
    <button type="text" class="btn btn-primary"> submit</button>
</div>
</div>
</form>
</div>

<div class="card offset-5 my-5 shadow-lg">
<div class="card-head">
    <h3 class=" bg-danger text-light text-center">TOTAL</h3>
</div>
<div class="totals card-body">
<table class="table table-hover">
    <thead>
        <tr>
            <th class=" text-primary ">Daily_Sales</th>
            <th class=" text-primary ">Opening Stock</th>
            <th class=" text-danger "> Product Recieved</th>
            <th class=" text-primary "> Total_At-Hand</th>
            <th class=" text-danger "> Physical Stock</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
</div>
</div>
<script>
document.addEventListener('input', function (event) {
        if (event.target.closest('.entry-row')) {
            calValues(event);
        }
    });

function  calValues(event){
            let rows = document.querySelectorAll('.entry-row'); // to get all the rows
            let row = event.target.closest('.entry-row') //To get the closest row of the input field
            if(!row) return; //if no row then return.


            let open_meter = parseFloat(row.querySelector('#opening').value) || 0;
            let close_meter = parseFloat(row.querySelector('#closing').value) || 0;
            let tank = parseFloat(row.querySelector('#tank').value) || 0;
            let openStock = parseFloat(row.querySelector('#stock').value) || 0;
            let productRecieved = parseFloat(row.querySelector('#product').value) || 0;
            
            let d_sales = close_meter - open_meter - (tank || 0);
            row.querySelector('#Daily_sales').value = d_sales;

        let t_hand = openStock + productRecieved;
        row.querySelector('#hand').value = t_hand;

        let phyStock = t_hand - d_sales;
        row.querySelector('#physical').value = phyStock;

        if (event.target.id === 'stock' || event.target.id === 'product') {
            // let firstTotalAtHand = document.querySelector('.entry-row #hand').value;
            // document.querySelectorAll('.entry-row #hand').forEach(input => {   //to get all the rows of the input field
            //     input.value = firstTotalAtHand; // Copy first row's value to all rows
            for (let i = 0; i < rows.length; i += 3) {
                let firstRowStock = rows[i].querySelector('#stock').value; // Get the first value in each group
                let firstRowProduct = rows[i].querySelector('#product').value; // Get the first value in each group
                for (let j = i; j < i + 3 && j < rows.length; j++) {
                    rows[j].querySelector('#stock').value = firstRowStock; // Apply to the group of 3
                    rows[j].querySelector('#product').value = firstRowProduct; // Apply to the group of 3
            };
        }}

}
</script>
@endsection
