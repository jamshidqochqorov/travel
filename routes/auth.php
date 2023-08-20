<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Blade\AgentController;
use App\Http\Controllers\Blade\Permisson\PermissonController;
use App\Http\Controllers\Blade\Role\RoleController;
use App\Http\Controllers\Blade\User\UserController;
use App\Http\Controllers\Blade\User\UserProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
   return redirect()->route('home');
});

Route::middleware('guest')->group(function (){

    Route::get('login',[LoginController::class,'login'])->name('login');
    Route::post('login',[LoginController::class,'login_store'])->name('login_store');
    Route::get('reset',[LoginController::class,'reset'])->name('reset');
    Route::get('register',[RegisterController::class,'create'])->name('register');
    Route::post('register',[RegisterController::class,'store'])->name('store');
    Route::get('reset',[LoginController::class,'reset'])->name('reset');
});

Route::group(['middleware' => 'auth'],function (){
    Route::get('/home',[HomeController::class,'index'])->name('home');

    //user profile
    Route::get('/profile',[UserProfileController::class,'index'])->name('profile');
    // Users
    Route::get('/users',[UserController::class,'index'])->name('userIndex');
    Route::get('/user/add',[UserController::class,'add'])->name('userAdd');
    Route::post('/user/create',[UserController::class,'create'])->name('userCreate');
    Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('userEdit');
    Route::post('/user/update/{id}',[UserController::class,'update'])->name('userUpdate');
    Route::delete('/user/delete/{id}',[UserController::class,'destroy'])->name('userDestroy');
    Route::post('/profile',[UserProfileController::class,'store'])->name('profile_store');
    //logout
    Route::post('logout', [RegisterController::class, 'destroy'])->name('logout');
    // Permissions
    Route::get('/permission',[PermissonController::class,'index'])->name('permissionIndex');
    Route::get('/permission/add',[PermissonController::class,'add'])->name('permissionAdd');
    Route::post('/permission/create',[PermissonController::class,'create'])->name('permissionCreate');
    Route::get('/permission/{id}/edit',[PermissonController::class,'edit'])->name('permissionEdit');
    Route::post('/permission/update/{id}',[PermissonController::class,'update'])->name('permissionUpdate');
    Route::delete('/permission/delete/{id}',[PermissonController::class,'destroy'])->name('permissionDestroy');
    // Roles
    Route::get('/roles',[RoleController::class,'index'])->name('roleIndex');
    Route::get('/role/add',[RoleController::class,'add'])->name('roleAdd');
    Route::post('/role/create',[RoleController::class,'create'])->name('roleCreate');
    Route::get('/role/{role_id}/edit',[RoleController::class,'edit'])->name('roleEdit');
    Route::post('/role/update/{role_id}',[RoleController::class,'update'])->name('roleUpdate');
    Route::delete('/role/delete/{id}',[RoleController::class,'destroy'])->name('roleDestroy');

    //Agents
    Route::get('/agents',[AgentController::class,'index'])->name('agentIndex');
    Route::get('/agent/add',[AgentController::class,'add'])->name('agentAdd');
    Route::post('/agent/create',[AgentController::class,'create'])->name('agentCreate');
    Route::get('/agent/{id}/edit',[AgentController::class,'edit'])->name('agentEdit');
    Route::post('/agent/update/{id}',[AgentController::class,'update'])->name('agentUpdate');
    Route::delete('/agent/delete/{id}',[AgentController::class,'destroy'])->name('agentDestroy');

    //category
    Route::get('/category',[CategoryController::class,'index'])->name('categoryIndex');
    Route::get('/category/add',[CategoryController::class,'add'])->name('categoryAdd');
    Route::post('/category/create',[CategoryController::class,'create'])->name('categoryCreate');
    Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('categoryEdit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('categoryUpdate');
    Route::delete('/category/delete/{id}',[CategoryController::class,'destroy'])->name('categoryDestroy');

    //client
    Route::get('/client',[ClientController::class,'index'])->name('clientIndex');
    Route::get('/client/add',[ClientController::class,'add'])->name('clientAdd');
    Route::post('/client/create',[ClientController::class,'create'])->name('clientCreate');
    Route::get('/client/{id}/edit',[ClientController::class,'edit'])->name('clientEdit');
    Route::post('/client/update/{id}',[ClientController::class,'update'])->name('clientUpdate');
    Route::delete('/client/delete/{id}',[ClientController::class,'destroy'])->name('clientDestroy');

    //transaction
    Route::get('/transaction',[TransactionController::class,'index'])->name('transactionIndex');
    Route::get('/transaction/agent/{id}',[TransactionController::class,'history'])->name('transactionHistory');
    Route::post('/transaction/create',[TransactionController::class,'create'])->name('transactionCreate');
    Route::get('/transaction/{id}/edit',[TransactionController::class,'edit'])->name('transactionEdit');
    Route::post('/transaction/update/{id}',[TransactionController::class,'update'])->name('transactionUpdate');
    Route::delete('/transaction/delete/{id}',[TransactionController::class,'destroy'])->name('transactionDestroy');
});

