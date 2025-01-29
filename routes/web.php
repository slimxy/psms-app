<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,PageController,StaffController,ManagerController,AdminController};
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/welcome', function () {return view('welcome');});
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();


Route::group(['middleware'=>'role:Admin'], function(){
    Route::get("/admin/index", [AdminController::class, "index"])->name('admin_index');
    Route::get("/admin/profile", [AdminController::class, "profile"])->name('admin_profile');
    Route::get("/admin/show",[AdminController::class, 'show']);
    Route::get("/admin/managers",[AdminController::class, 'showManager'])->name('admin_showManagers');
    Route::get("/admin/station",[AdminController::class, 'station'])->name('station');
    Route::get("/admin/manager/{manager}",[AdminController::class, 'managerActivities'])->name('admin_manager');


    Route::get("/admin/manager/{manager}",[AdminController::class, 'managerActions'])->name('admin_action');

   });


Route::middleware(['auth','role:Admin,Manager'])->group( function(){
Route::get("register",[RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post("register",[RegisterController::class, 'register']);
});


Route::middleware(['auth','role:Manager'])->group(function(){
    Route::get("/manager/index",[ManagerController::class, 'index'])->name('manager_index');
    Route::get("/manager/show",[ManagerController::class, 'show']);
    Route::get("/manager/create",[ManagerController::class, 'create']);
    Route::get("/manager/profile",[ManagerController::class, 'profile']);
    Route::get("/manager/users",[ManagerController::class, 'users'])->name('manager_users');
    Route::get("/manager/staffs",[ManagerController::class, 'staffs'])->name('manager_staffs');
    Route::get("/manager/staff/{user}",[ManagerController::class, 'userActivities'])->name('manager_user');

});

Route::post("/manager/create", [ManagerController::class, "store"])->name('manager_store');


Route::group(['middleware'=>'role:Staff'], function(){
    Route::get("/staffs/index", [StaffController::class, "index"])->name('staff_index');
    Route::get("/staffs/create",[StaffController::class, 'create'])->name('staff_create');
    Route::get("/staffs/profile", [StaffController::class, "profile"])->name('staff_profile');
    Route::get("/staffs/show",[StaffController::class, 'show']);

});

Route::post("/staffs/create", [StaffController::class, "store"])->name('staff_store');





