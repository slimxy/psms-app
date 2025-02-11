<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;


class StaffController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request){


          // to calculate the difference
          $input1 = $request->input('open');
          $input2 = $request->input('close');
          
        $diffs = $input1 -$input2;
          return view('pages.staffs.create', compact('diffs'));
     }

    public function index(string ...$role){
        // b4
        // $staffs = Staff::all();
        // $count = Staff::get()->count();

        $staff = Auth::user();
        $count = Staff::where('manager_id',$staff->id)->count();

        return view('pages.staffs.index', ['staff' => $staff,'count'=>$count]);
    }

    public function profile(){
        return view('pages.staffs.profile');
    }

    public function show(Request $request){
        // $staffs = Staff::all();
 // to get the total number of users
        $count = Staff::get()->count();
  // end total number

        // to calculate the difference
        $input1 = $request->input('open');
        $input2 = $request->input('close');
        
        $diffs = $input1 -$input2;

        $staffs = Staff::orderBy('id', 'Asc') ->paginate(5);
        return view('pages.staffs.show',['staffs' => $staffs,'count'=>$count], ['diffs'=>$diffs]);
     }

    public function store(Request $request){

        // $request->validate([
        //     'open'=>'required|numeric',
        //     'close'=>'required|numeric',
        //     'sales'=>'required|numeric',
        //     'type'=>'required|string',
        //     'meterId'=>'required|string',
        //     'diffs'=>'required|numeric',

        // ]);
        $request->validate([ 
            'open' => 'required|numeric|min:0',
            'close'=> 'required|numeric|min:' . $request->open,
        ], ['close.min'=> 'Closing meter must be greater than or equal to Opening meter.']);


        $staff= new Staff();
        $staff->open=request('open');
        $staff->close=request('close');
        $staff->type=request('type');
        $staff->meterId=request('meterId');
        $staff->diffs=request('diffs');
        $staff->manager_id=Auth::id();

         $staff->save();

      

        return redirect('/staffs/index')->with('success',"Staff entry added successfully. Thank you");
     }

    
}
