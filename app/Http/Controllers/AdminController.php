<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
         // get users created by Admin
         $admin = auth()->user();
         $totalManager = User::where('admin_id', $admin->id)->count();
        return view('pages.admin.index', compact('totalManager'));
    }
    public function profile(){
        return view('pages.admin.profile');
    }
    public function showManager(){
        $managers= User::where('role', 'Manager')
        ->where('admin_id',Auth::id())->paginate(5);
        return view('pages.admin.showManagers', compact('managers'));
    }
public function station(){
    $admin= Auth::user();
    $users = User::where('admin_id',$admin->id)->paginate(5);
    return view('pages.admin.station',compact('admin','users'));
}
    public function managerActivities(){
        $manager= User::where('role', 'Manager')
        ->where('admin_id',Auth::id())
        ->with(activities)->firstOrFail();
        return view('pages.admin.managerActivities', compact('manager'));
    }

    public function managerActions(User $manager){
        $managerActions = $manager->managerActivities()->paginate(9);
        return view('pages.admin.activities',compact('manager','managerActions'));
    }

}
