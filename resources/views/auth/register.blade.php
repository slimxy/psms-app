@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="content d-flex mx-5 justify-content-around ">
                        <div class="row mb-3">
                            <label for="uname" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                            <div class="col-md-8">
                                <input id="uname" type="text" class="form-control @error('uname') is-invalid @enderror" name="uname" value="{{ old('uname') }}" required  autofocus>

                                @error('uname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-8">
                            <select type="text" class="form-control" id="role" name='role' required>
                                   @if(Auth::user()->role === 'Admin')
                                    <option >Choose... </option>
                                    <option value='Admin' >Admin </option>
                                    <option value='Manager'>Manager </option>
                                    @endif
                                    @if(Auth::user()->role === 'Manager')
                                    <option >Choose... </option>
                                    <option value='Staff'>Staff </option>
                                    @endif
                            </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>

                        <div class="content d-flex mx-5  justify-content-around ">
                            <div class=" d-flex ">
                                <label for="state" class="row  m-3 form-label">{{ __('State') }}</label>

                                <div class="col-md-8 m-2">
                                    <select type='text' name="state" id="state" onchange="populateStations()" class=" form-control" required>
                                        <option value="">Choose...</option>
                                        
                                    </select>
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex">

                            <label for="station" class=" row m-3 form-label">{{ __('Station') }}</label>
                            <div class="col-md-8 m-2">
                                <select type="text" id="station" name="station" class="form-control " class=" form-control" required  >
                                    <option value="">Select Station</option>
                                    
                                </select>

                                @error('station')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>

                        <div class="row mb-3 mt-2">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

const stations = {
"Abia":["aaaaaa","aaaaaaaab"],
"Abuja": ["Main Station, Admin", "Wuse phase-II"],
"Adamawa":["aaaac","daaaaa"],
"Anambra":["eaaaa","faaaaaa"],
"Bauchi":["g","h"],
"Jigawa":["zaria bye-pass",  "s",  "hhh"],
"Kano":["i","j"],
"Kaduna":["k","l"],
"Kastina":["Along Yahaya Maidoki way","Along Daura Road","Along Kofar Kwaya Katsina"],
"Kogi":["o","p"],
"Lagos":["q","r"],
"Plateau":["bauchi Road","Terminus"],
"Taraba":["v","w"],
"Yobe":["x","y"],
"Zamfara":["z","za"]


};


document.addEventListener("DOMContentLoaded",function(){
  populateStates();

});

function populateStates(){
const stateSelect = document.getElementById("state");
for(const state in stations){
  const option = document.createElement("option");
  option.value = state;
  option.textContent =state;
  stateSelect.appendChild(option);
}
};


function populateStations(){
    const stateSelect = document.getElementById("state");
    const stationSelect = document.getElementById('station');

   stationSelect.innerHTML = "";     // clear the previous station
   const selectedState = stateSelect.value;
    if(selectedState){
    const myStations = stations[selectedState];
        myStations.forEach(function(myStation) {
        const option = document.createElement("option");
        option.value = myStation;
        option.textContent = myStation;
        stationSelect.appendChild(option);
    });
}
};

</script>

@endsection
