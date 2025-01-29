@extends("layouts.app4")
@section("content")
<div class="container my-5">
<div class="  row justify-content-center">
<marquee behavior="" direction="rtl"> <h3 class="text-secondary text-center ">Station A station:  {{Auth()->user()->state}}</h3> </marquee>

<div class="col-md-9 offset-2 px-5">
            <div class="card shadow-lg">
            <div class="card-header row g-0 text-light  bg-primary text-center p-3 "><h2>{{ __('Meter Reading') }}</h2>
                
            </div>

<div class="card-body ">
<form class="row g-3 " method='POST' action="{{route('staff_store')}}">
    @csrf
   <div class="content d-flex justify-content-around">
<div class="col-md-3  ">
    <label  class="form-label" for="type">Type</label>
    <select type="text" class="form-control" id="type" name='type'>
        <option selected>Choose... </option>
        <option value='Petrol'>Petrol </option>
        <option value='Desiel'>Desiel </option>
        <option value='Kerosine'>Kerosine </option>
</select>
@error('type')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
<div class="col-md-4">
    <label  class="form-label text-danger" for="open">Opening Meter</label>
    <input type="number" onInput="cal()" class="form-control text-danger" id="open"  name='open' require>
@error('open')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
<div class="col-md-2   ">
                 <label  class="form-label " for="meterId">Meter Id#</label>
                 <select type="text" class="form-control col-5 " id="meterId"  name='meterId' require>
        <option selected>Meter-#... </option>
        <option value='#1' >#1 </option>
        <option value='#2' >#2 </option>
        <option value='#3' >#3 </option>
        <option value='#4' >#4 </option>
        <option value='#5' >#5 </option>
        <option value='#6' >#6 </option>
        <option value='#7' >#7 </option>
        <option value='#8' >#8</option>
        <option value='#9' >#9</option>
                </select>
@error('meterId')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
@enderror
                </div>
</div>
<div class="col-md-6">
    <label  class="form-label" for="close">Closing Meter</label>
    <input type="number" onInput="cal()" class="form-control" id="close"  name='close' require>
@error('close')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
@enderror
</div>

<div class="col-md-6">
    <label  class="form-label" for="diff" >Sales</label>
    <input type="number" class="form-control"   value={{$diffs}}  id="diffs" name='diffs' readonly>
    
@error('diffs')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
@enderror
</div>

<div class="col-md-8 offset-md-5 ">
    <button type="submit"  onclick="cal()" class="btn btn-primary"> submit</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<script>
 
    function cal(){
        var open = document.getElementById('open').value;
        var close = document.getElementById('close').value;
        var diffs;
        if ( open < close){
            diffs = close - open;
        document.getElementById('diffs').value = diffs;
        }



};




    
</script>
@endsection
