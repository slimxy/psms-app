@extends("layouts.app3")
@section('content')

@php
$openStock = request('open_stock');
$openStock = $openStock ? $openStock : 0;
@endphp

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
        <td><h5>Number</h5></td>
        <td><h5>TOTAL:</h5></td>
        <td><h5>Retrn_Tank</h5></td>
        <td><h5>DailySales</h5></td>
        <td><h5>openingStock</h5></td>
        <td><h5>ProductRecieved</h5></td>
        <td><h5>Total@Hand</h5></td>
        <td><h5>PhysicalStock</h5></td>
    </tr>
        <tr>
        <td><h5 class="text-primary fs-3">TANk</h5></td>
        <td><h5 class="text-danger fs-3">{{ ceil($i / 3) }}</h5></td>
        <td><h5>*****</h5></td>
        <td><input type="number" id="total_tank_{{ $i }}" class="form-control total-tank text-primary fs-2" readonly placeholder="Tank {{ ceil($i / 3) }}">
        </td>
        <td><input type="number" id="total_sales_{{ $i }}" class="form-control total-sales text-primary fs-2" readonly placeholder="Sales {{ ceil($i / 3) }}">
        </td>
        <td><input type="number" id="opening-stock" class="form-control opening-stock text-primary fs-2" readonly placeholder="Stock ">
        </td>
        <td><input type="number" id="total-product" class=" form-control total-product text-primary fs-2" readonly placeholder="Product"></td>
<td><input type="number" id="last-total-at-hand" class="form-control last-total-at-hand text-primary fs-2" readonly placeholder="hand ">
</td>
<td><input type="number" id="last-physical" class="form-control last-physical text-primary fs-2" readonly placeholder="Physical ">
</td>
        </tr>

        @endif
    
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
            <th class=" text-primary ">Return-to-Tank</th>
            <th class=" text-primary ">Opening Stock</th>
            <th class=" text-danger "> Product Recieved</th>
            <th class=" text-primary "> Total_At-Hand</th>
            <th class=" text-danger "> Physical Stock</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><h3 id="finalTotalSales">0</h3></td>
            <td><h3 id="finalTotalTank">0</h3></td>
            <td><h3 id="finalTotalStock">0</h3></td>
            <td><h3 id="finalTotalProduct">0</h3></td>
            <td><h3 id="finalTotalAtHand">0</h3></td>
            <td><h3 id="finalTotalPhysical">0</h3></td>
            </tr>
    </tbody>
</table>
</div>
</div>

<script>
document.addEventListener('input', function (event) {
    if (event.target.closest('.entry-row')) {
        calValues();
    }
});

function calValues() {
    let rows = document.querySelectorAll('.entry-row'); // Get all rows
    let groupSize = 3; // Each group contains 3 rows
    let totalSalesFields = document.querySelectorAll('.total-sales'); // Get total sales fields
    let totalTankFields = document.querySelectorAll('.total-tank'); // Get total tank fields
    let totalProduct = document.querySelectorAll('.total-product'); // Get total product recieved fields
    let totalStock = document.querySelectorAll('.opening-stock'); // Get total opening  fields
    let totalPhysical = document.querySelectorAll('.last-physical'); // Get total physical stock  fields
    let totalHand = document.querySelectorAll('.last-total-at-hand'); // Get total total-At-Hand  fields
    
    let finalTotalSales= 0; // to store the final total of the daily sales
    let finalTotalTank = 0;  // to store the final total of the retun to tank value.
    let finalTotalProduct = 0;  // to store the final total of the product recieved.
    let finalTotalPhysical = 0;  // to store the final total of the physical stock.
    let finalTotalStock= 0;  // to store the final total of the opening stock.
    let finalTotalAtHand= 0;  // to store the final total of the TotalAtHand.

    // Loop through rows in groups of 3
    for (let i = 0; i < rows.length; i += groupSize) {
        let firstRow = rows[i]; // First row in the group

        let openStock = parseFloat(firstRow.querySelector('#stock').value) || 0;
        let productReceived = parseFloat(firstRow.querySelector('#product').value) || 0;

        let firstTotalHand = openStock + productReceived; // Calculate total@hand for the first row
        firstRow.querySelector('#hand').value = firstTotalHand;

        for (let j = 0; j < groupSize; j++) {
            let rowIndex = i + j; // Current row index
            if (rowIndex >= rows.length) break; // Prevent errors if rows are not in complete groups

            let row = rows[rowIndex];

            let open_meter = parseFloat(row.querySelector('#opening').value) || 0;
            let close_meter = parseFloat(row.querySelector('#closing').value) || 0;
            let tank = parseFloat(row.querySelector('#tank').value) || 0;

            // Calculate Daily Sales
            let d_sales = close_meter - open_meter - (tank || 0);
            row.querySelector('#Daily_sales').value = d_sales;

            // Use first row's Physical Stock as Total@Hand for the next two rows in the group
            if (j === 0) {
                row.querySelector('#hand').value = firstTotalHand;
            } else {
                let prevPhyStock = parseFloat(rows[rowIndex - 1].querySelector('#physical').value) || 0;
                row.querySelector('#hand').value = prevPhyStock;
            }

            // Calculate Physical Stock
            let phyStock = parseFloat(row.querySelector('#hand').value) - d_sales;
            row.querySelector('#physical').value = phyStock;
        }
    }
    // Summation of the totals for each group
    for (let i = 0; i < rows.length; i += 3) {
        let totalDailySales = 0;
        let totalReturnTank = 0;
        let lastProduct = 0;

        let lastStock = 0;
        let lastHand = 0;
        let lastPhysical = 0;

        for (let j = i; j < i + 3 && j < rows.length; j++) {
            totalDailySales += parseFloat(rows[j].querySelector('#Daily_sales').value) || 0;
            totalReturnTank += parseFloat(rows[j].querySelector('#tank').value) || 0;
        
            // To get the last row im the group
            if(j === i + groupSize -1 || j == rows.length -1 ){
                lastPhysical = parseFloat(rows[j].querySelector('#physical').value) || 0;
                lastStock = parseFloat(rows[j].querySelector('#stock').value) || 0;
                lastProduct = parseFloat(rows[j].querySelector('#product').value) || 0;
                lastHand = parseFloat(rows[j].querySelector('#hand').value) || 0;
            }
        }

        // Find the total field for the group and update it
        let groupIndex = Math.floor(i / 3);
        if (totalSalesFields[groupIndex]) {
            totalSalesFields[groupIndex].value = totalDailySales;
        }
        if (totalTankFields[groupIndex]) {
            totalTankFields[groupIndex].value = totalReturnTank;
        }
        if(totalStock[groupIndex]){
            totalStock[groupIndex].value = lastStock;
        }
        if(totalPhysical[groupIndex]){
            totalPhysical[groupIndex].value = lastPhysical;
        }
        if(totalHand[groupIndex]){
            totalHand[groupIndex].value = lastHand;
        }
        if(totalProduct[groupIndex]){
            totalProduct[groupIndex].value = lastProduct;
        }

        finalTotalSales += totalDailySales;
        finalTotalTank += totalReturnTank;
        finalTotalStock += lastStock;
        finalTotalProduct += lastProduct;
        finalTotalAtHand += lastHand;
        finalTotalPhysical += lastPhysical;

    }
    document.querySelector('#finalTotalSales').innerText = finalTotalSales;
    document.querySelector('#finalTotalTank').innerText = finalTotalTank;
    document.querySelector('#finalTotalStock').innerText = finalTotalStock;
    document.querySelector('#finalTotalProduct').innerText = finalTotalProduct;
    document.querySelector('#finalTotalAtHand').innerText = finalTotalAtHand;
    document.querySelector('#finalTotalPhysical').innerText = finalTotalPhysical;


    // Ensure first 3 rows share the same stock and productReceived values
    if (event.target.id === 'stock' || event.target.id === 'product') {
        for (let i = 0; i < rows.length; i += 3) {
            let firstRowStock = rows[i].querySelector('#stock').value; // Get first value
            let firstRowProduct = rows[i].querySelector('#product').value; // Get first value
            finalTotalProduct = firstRowProduct;
            for (let j = i; j < i + 3 && j < rows.length; j++) {
                rows[j].querySelector('#stock').value = firstRowStock; // Apply to group of 3
                rows[j].querySelector('#product').value = firstRowProduct; // Apply to group of 3
            }
        }}


}

</script>
@endsection
