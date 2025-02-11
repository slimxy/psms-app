<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\User;
use App\Models\Staff;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class ManagerController extends Controller
{
    

    public function create(){
        return view('pages.manager.create');
    }

    public function index(){
        $managers = Submission::all();
        $count = Submission::get()->count();
        $last = Submission::latest()->first();

        // get users created by Manager
        $manager = auth()->user();
        $totalUser = User::where('manager_id', $manager->id)->count();
        return view('pages.manager.index',['count'=>$count,'managers'=>$managers,'last'=>$last,'totalUser'=>$totalUser]);

    }

    public function profile(){
       return view('pages.manager.profile');
    }

    public function show(){
        $submissions = Submission::with('managers')->paginate(1);
        return view('pages.manager.show',['submissions'=>$submissions]);
    }

    public function store(Request $request){

        // To automatically cal DailySales, 
        $request->validate([
            'opening'=> 'required|numeric|min:0',
            'closing'=> 'required|numeric|min:0|gte:open',
            'stock'=> 'required|nemeric|min:0',
            'product'=> 'required|nemeric|min:0',
        ]);
        $submission = Submission::create();

    for($i = 0; $i < count($request->input('opening')) ;$i++){
            $manager= new Manager();

            $manager->submission_id=$submission->id;

            $manager->opening=request('opening')[$i];
            $manager->closing=request('closing')[$i];
            $manager->stock=request('stock')[$i];
            $manager->product=request('product')[$i];
            $manager->total=request('total')[$i];
            $manager->sales=request('sales')[$i];
            $manager->physical=request('physical')[$i];
            $manager->admin_id = Auth::id();
    
        // Calculations
        $manager->sales =$manager->closing - $manager->opening;


            $manager->save();
        }

        return redirect ('/manager/index');
    }

    public function users(){
        $manager = Auth::user();
        $users = User::where('manager_id',$manager->id)->paginate(5);

        return view('pages.manager.show_users',compact('users','manager'));
    }

    public function staffs(){
        $manager = Auth::user();
        $users = User::where('manager_id',$manager->id)->paginate(5);

        return view('pages.manager.staffs',compact('users','manager'));
    }

    public function userActivities(User $user){
        $userActivities = $user->userActivities()->paginate(5);
        return view('pages.manager.user_activities',compact('user','userActivities'));
    }



    }
